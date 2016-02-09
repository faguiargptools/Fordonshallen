<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class UpdateProdukterRequest extends Request {

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
            'name' => 'required', 
            'short_desc' => 'required', 
            'long_desc' => 'required', 
            'article_number' => 'required', 
            'type' => 'required', 
            'price' => 'numeric|required', 
            
		];
	}
}
