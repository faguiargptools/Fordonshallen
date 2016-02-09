<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\News;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Input;


class NewsController extends Controller {

	public function index()
    {
        $news = News::orderBy('id', 'desc')->get();

		return view('nyheter', compact('news'));
	}

	public function read($id)
	{
		$news = News::where('id', $id)->first();

		App::setLocale(LC_ALL, 'swedish');

		return view('nyheter_full', compact('news'));
	}

}
