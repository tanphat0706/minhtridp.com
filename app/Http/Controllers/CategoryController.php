<?php
/**
 * @author  Phat Le
 */
namespace App\Http\Controllers;

use App\Categories;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use Response;
use Datatables;
use Auth;
use App\Http\Requests;

class CategoryController extends Controller
{
    public function __construct(Categories $categories)
    {
        $this->_categories = $categories;
    }
    public function welcome()
    {
        $cates = Categories::where('status',1)->get();
        return view('welcome',compact('cates'));
    }
    /**
     * get list users to datatables
     *
     * @param
     *            Request
     * @return Response
     */
    public function getCategoriesJson()
    {
        if (! Auth::user()->hasRole('viewCategoryList')) {
            abort('403');
        }
        $cate = Categories::select('id','name', 'image_url', 'status', 'description', 'home_description','created_at');
        $buttons = array();
        return Datatables::of($cate)
            ->editColumn('status', function ($cate) {
                return '<span class="flat label status-label label-' . $cate->getStatusColor() . '">' . $cate->getStatus() . '</span>';
            })
            ->addColumn('action', function ($cate) {
                $buttons = array();
                if (Auth::user()->hasRole('editCategory')) {
                    $buttons[] = [
                        'href' => 'edit/' . e($cate->id),
                        'icon' => 'edit',
                        'type' => 'primary',
                        'label' => trans('system.edit')
                    ];
                }
                if (Auth::user()->hasRole('deleteCategory')) {
                    $formId = 'delete-category-' . e($cate->id);
                    $buttons[] = [
                        'href' => '#' . e($cate->id),
                        'icon' => 'remove',
                        'type' => 'danger',
                        'delete' => e($cate->id),
                        'id' => $formId,
                        'route' => 'category-del',
                        'label' => trans('system.del'),
                        'htmlOptions' => [
                            "onclick" => "confirmDelete('$formId')"
                        ]
                    ];
                }

                $action = view('partial.action', compact('buttons'))->render();
                return (string)$action;
            })
            ->make(true);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Auth::user()->hasRole('viewCategoryList')) {
            abort('403');
        }
        return view('category.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Auth::user()->hasRole('addCategory')) {
            abort('403');
        }
        $listStatus = $this->_categories->createListStatus();
        return view('category.create',compact('listStatus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        if (! Auth::user()->hasRole('addCategory')) {
            abort('403');
        }
        $cate = $request->all();
        $time = time();
        $trimSpace = str_replace(" ", "_", strtolower($cate['name']));
        $img_type = $request->file('image_url')->getClientOriginalExtension();
        $thumbs_type = $request->file('thumbs_img')->getClientOriginalExtension();
        $image = \Image::make($request->file('image_url')->getRealPath());
        $thumbs_img = \Image::make($request->file('thumbs_img')->getRealPath());
        $imageName = "img_" . $trimSpace . "_" . $time;

        $image->save(public_path('images/category_img/' . $imageName . "." . $img_type));
        $thumbs_img->save(public_path('images/category_img/thumbnail/' . $imageName . "-thumbs." . $thumbs_type));
//            $request->file('image_url')->move(base_path() . '/public/images/category_img/', $imageName);
        $cate['image_url'] = $imageName.".".$img_type;
        $cate['thumbs_img'] = $imageName. "-thumbs." . $thumbs_type;
        Categories::create($cate);
        return redirect()->route('category-list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function frontentDetail($id)
    {
        $cate = Categories::find($id);
        return view('category.frontend-detail',compact('cate'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Auth::user()->hasRole('editCategory')) {
            abort('403');
        }
        $cate = Categories::find($id);

        $listStatus = $this->_categories->createListStatus();

        return view('category.edit', compact('cate', 'listStatus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (! Auth::user()->hasRole('editCategory')) {
            abort('403');
        }
        $cateUpdate = $request->all();
        $cate = Categories::find($id);

        $cate->name = $cateUpdate['name'];
        $time = time();
        $trimSpace = str_replace(" ", "_", strtolower($cate['name']));
        $imageName = "img_" . $trimSpace . "_" . $time;
        if(isset($cateUpdate['image_url'])){
            $img_type = $request->file('image_url')->getClientOriginalExtension();
            $image = \Image::make($request->file('image_url')->getRealPath());
            $image->save(public_path('images/category_img/' . $imageName . "." . $img_type));
//            $request->file('image_url')->move(base_path() . '/public/images/category_img/', $imageName);
            \File::delete(public_path('images/category_img/' . $cate->image_url));
            $cate->image_url = $imageName. "." . $img_type;
        }elseif(isset($cateUpdate['thumbs_img'])){
            $thumbs_type = $request->file('thumbs_img')->getClientOriginalExtension();
            $thumbs_img = \Image::make($request->file('thumbs_img')->getRealPath());
            $thumbs_img->save(public_path('images/category_img/thumbnail/' . $imageName . "-thumbs." . $thumbs_type));
            \File::delete(public_path('images/category_img/thumbnail/' . $cate->thumbs_img));
            $cate->thumbs_img = $imageName. "-thumbs." . $thumbs_type;
        }
        $cate->status = $cateUpdate['status'];
        $cate->order_number = $cateUpdate['order_number'];
        $cate->description = $cateUpdate['description'];
        $cate->home_description = $cateUpdate['home_description'];

        $cate->save();
        return redirect()->route('category-list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Auth::user()->hasRole('deleteCategory')) {
            abort('403');
        }
        // find result by id and delete
        $cate=Categories::find($id);
        \File::delete(public_path('images/category_img/' . $cate->image_url));
        $cate->delete();
        // Redirecting to index() method
        return redirect()->route('category-list');
    }
}
