<?php namespace App\Http\Controllers;

use App\Produkter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use LukePOLO\LaraCart\Facades\LaraCart;


class ShopController extends Controller {

	public function index()
    {
		$produkter = Produkter::get();
		return view('shop.index', ['produkter' => $produkter]);
	}

	public function product($id)
	{
		$produkt = Produkter::where('id', '=', $id)->first();
		return view('shop.product', ['produkt' => $produkt]);
	}

	public function addToCart(Request $req){

		//$rules = $req->has('variation') ? ['specs' => 'required', 'variation' => 'min:5'] : ['specs' => 'required'];
		if($req->has('variation')){
			$rules = ['specs' => 'required', 'variation' => 'required|min:2'];
		} else {
			$rules = ['specs' => 'required'];
		}
		$messages = [
			'specs.required' => 'Du måste ange minst ett fordons Märke, Modell och Registreringsnummer',
			'variation.required' => 'Du måste välja produktvariant',
			'variation.min' => 'Du måste välja produktvariant',
		];

		$this->validate($req, $rules, $messages);

		//LaraCart::add('id', 'namn', 'antal', 'pris', ['attribut' => '1', 'attribut2' => '2']);
		LaraCart::add($req->input('id'), $req->input('article_number'), $req->input('quantity'), $req->input('price'), ['specs' => $req->input('specs')]);
		return Redirect::back();
	}

	public function checkout(){
		return view('shop.checkout');
	}

	public function removeItem(){
		LaraCart::removeItem(Input::get('item'));
		return Redirect::back();
	}

}
