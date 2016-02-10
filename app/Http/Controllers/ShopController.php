<?php namespace App\Http\Controllers;

use App\Produkter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use LukePOLO\LaraCart\Facades\LaraCart;
use Illuminate\Support\Facades\Mail;


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

	public function placeOrder(Request $req){

		if(LaraCart::count($withItemQty = true) < 1){
			return Redirect::back()->with($errors = ['produkter' => 'Du har inga produkter i kundvagnen']);
		} else {

			if ($req->input('paymentOption') == 'Faktura') {
				$rules = [
						'firstname' => 'required',
						'surname' => 'required',
						'adress' => 'required',
						'city' => 'required',
						'zipcode' => 'required',
						'email' => 'required',
						'phone' => 'required',
						'company' => 'required',
						'corpid' => 'required',
						'paymentOption' => 'required'
				];
			} else {
				$rules = [
						'firstname' => 'required',
						'surname' => 'required',
						'adress' => 'required',
						'city' => 'required',
						'zipcode' => 'required',
						'email' => 'required',
						'phone' => 'required',
						'paymentOption' => 'required'
				];
			}

			$messages = [
					'firstname.required' => 'Du måste ange ditt förnamn',
					'surname.required' => 'Du måste ange ditt efternamn',
					'adress.required' => 'Du måste ange din adress',
					'city.required' => 'Du måste ange din stad',
					'zipcode.required' => 'Du måste ange ditt postnummer',
					'email.required' => 'Du måste ange din e-postadress',
					'phone.required' => 'Du måste ange ditt telefonnummer',
					'company.required' => 'Du måste ange ditt företagsnamn',
					'corpid.required' => 'Du måste ange ditt företags organisationsnummer',
					'paymentOption.required' => 'Du måste välja ett betalningsalternativ'
			];

			$this->validate($req, $rules, $messages);

			Mail::send('emails.order', ['items' => LaraCart::getItems(), 'buyer' => $req->all()], function ($message) use ($req) {
				$message->from(env('MAIL_FROM_ADRESS'), env('MAIL_FROM_NAME'));
				$message->to(env('ORDER_MAIL'));
				$message->subject('Ny beställning från Fordonshallen.se!');
			});

			LaraCart::destroyCart();

			return \Redirect::action('ShopController@orderPlaced')->with('placed', true);
		}
	}

	public function orderPlaced(){

		$placed = \Session::get('placed');

		if(!$placed){
			return Redirect::to('/');
		}

		return view('shop.success');
	}
}
