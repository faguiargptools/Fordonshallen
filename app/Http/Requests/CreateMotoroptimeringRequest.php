<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateMotoroptimeringRequest extends Request {

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
            'type' => 'required|unique_with:motoroptimering,type,brand,model,engine,fuel',
            'brand' => 'required',
            'model' => 'required',
            
		];
	}

	public function messages()
	{
		return [
			'type.required' => 'Du måste välja fordonstyp!',
			'brand.required' => 'Du måste ange märke!',
			'model.required' => 'Du måste ange modell!',
			'type.unique_with' => 'Denna kombination av Fordonstyp, Märke, Modell, Motor, Bränsle finns redan inlagd!',
		];
	}
}
