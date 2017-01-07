<?php
/**
 * @author  Phat Le
 */
namespace App\Http\Requests;

use App\Http\Requests\Request as BaseRequest;

class CategoryRequest extends Request {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'name' => 'required',
            'image_url' => 'required',
            'status' => 'required'
        ];
    }

}