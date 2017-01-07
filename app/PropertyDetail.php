<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PropertyDetail extends Model
{
    protected $table = 'properties_details';
    protected $fillable = [
        'name',
        'description',
        'property_id',
        'created_at',
        'updated_at',
    ];
    public function getItemByPropertyID($id){
        $detail_list = PropertyDetail::where('property_id', $id)->select('id','name')->get();
        return $detail_list;
    }
}
