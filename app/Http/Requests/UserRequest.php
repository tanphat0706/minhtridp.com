<?php
namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Contracts\Validation\Validator;

class UserRequest extends Request
{

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
        $id = $this->route('id');
        $rules = [
            'name' => 'required|max:255',
        ];

        // If create new user
        if (empty($id)) {
            $rules['user_group'] = 'required';
            $rules['email'] = 'required|email|unique:users,email';
            $rules['password'] = 'required|min:3|confirmed';
            $rules['password_confirmation'] = 'required';

            // If update user
        } else {
            $rules['email'] = 'required|email|unique:users,email,'.$id;
            if(!$this->is_customer) {
                $rules['user_group'] = 'required';
            }
            if ($this->request->get('password')){
                $rules['password'] = 'min:3|confirmed';
                $rules['password_confirmation'] = 'required';
            }
        }

        return $rules;
    }

}
