<?php

namespace App\Http\Controllers;

use App\Property;
use App\PropertyDetail;
use Illuminate\Http\Request;
use Response;
use Datatables;
use Auth;
use App\Http\Requests;

class PropertyDetailController extends Controller
{
    public function __construct(PropertyDetail $propertyDetail)
    {
        $this->propertyDetail = $propertyDetail;
    }
    public function getPropertyDetailJson()
    {
        $propertyDetail = PropertyDetail::select('properties_details.id','properties_details.name', 'properties_details.description','property_id','properties_details.created_at','properties_details.updated_at','properties.name as property_name')
            ->leftJoin('properties', 'properties.id', '=', 'properties_details.property_id');;
        $buttons = array();
        return Datatables::of($propertyDetail)
            ->addColumn('action', function ($propertyDetail) {
                $buttons = array();

                $buttons[] = [
                    'href' => 'edit/' . e($propertyDetail->id),
                    'icon' => 'edit',
                    'type' => 'primary',
                    'label' => trans('system.edit')
                ];

                $formId = 'delete-propertydetail-' . e($propertyDetail->id);
                $buttons[] = [
                    'href' => '#' . e($propertyDetail->id),
                    'icon' => 'remove',
                    'type' => 'danger',
                    'delete' => e($propertyDetail->id),
                    'id' => $formId,
                    'route' => 'propertydetail-del',
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
        return view('propertydetail.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $property = Property::all()->lists('name','id');
        return view('propertydetail.create', compact('property'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $propertyDetail = $request->all();
        PropertyDetail::create($propertyDetail);
        return redirect()->route('propertydetail-list');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $propertydetail = PropertyDetail::find($id);
        $property = Property::all()->lists('name','id');
        return view('propertydetail.edit', compact('propertydetail','property'));
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
        $update = PropertyDetail::find($id);
        $input = $request->all();
        $update->fill($input)->save();
        return redirect()->route('propertydetail-list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $detroy = PropertyDetail::findOrFail($id);

        $detroy->delete();

        return redirect()->route('propertydetail-list');
    }
}
