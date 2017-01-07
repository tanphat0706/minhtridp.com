<?php

namespace App\Http\Controllers;

use App\Property;
use Illuminate\Http\Request;
use Response;
use Datatables;
use Auth;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class PropertyController extends Controller
{
    public function __construct(Property $property)
    {
        $this->property = $property;
    }

    public function getPropertyJson()
    {
        $property = Property::select('id','name', 'description','created_at','updated_at');
        $buttons = array();
        return Datatables::of($property)
            ->addColumn('action', function ($property) {
                $buttons = array();

                $buttons[] = [
                    'href' => 'edit/' . e($property->id),
                    'icon' => 'edit',
                    'type' => 'primary',
                    'label' => trans('system.edit')
                ];

                $formId = 'delete-property-' . e($property->id);
                $buttons[] = [
                    'href' => '#' . e($property->id),
                    'icon' => 'remove',
                    'type' => 'danger',
                    'delete' => e($property->id),
                    'id' => $formId,
                    'route' => 'property-del',
                    'label' => trans('system.del'),
                    'htmlOptions' => [
                        "onclick" => "confirmDelete('$formId')"
                    ]
                ];


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
        return view('property.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('property.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $property = $request->all();
        Property::create($property);
        return redirect()->route('property-list');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $property = Property::find($id);
        return view('property.edit', compact('property'));
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
        $update = Property::findOrFail($id);

        $input = $request->all();

        $update->fill($input)->save();

        \Session::flash('flash_message', 'Property successfully added!');

        return redirect()->route('property-list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $property = Property::findOrFail($id);

        $property->delete();

        return redirect()->route('property-list');
    }
}
