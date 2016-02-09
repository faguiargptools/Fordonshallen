<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\News;
use App\Http\Requests\CreateNewsRequest;
use App\Http\Requests\UpdateNewsRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\FileUploadTrait;


class NewsController extends Controller {

	/**
	 * Display a listing of news
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $news = News::all();

		return view('admin.news.index', compact('news'));
	}

	/**
	 * Show the form for creating a new news
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.news.create');
	}

	/**
	 * Store a newly created news in storage.
	 *
     * @param CreateNewsRequest|Request $request
	 */
	public function store(CreateNewsRequest $request)
	{
	    $this->saveFiles($request);
		News::create($request->all());

		return redirect()->route('admin.news.index');
	}

	/**
	 * Show the form for editing the specified news.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$news = News::find($id);
	    
	    
		return view('admin.news.edit', compact('news'));
	}

	/**
	 * Update the specified news in storage.
     * @param UpdateNewsRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateNewsRequest $request)
	{
		$news = News::findOrFail($id);

        $this->saveFiles($request);

		$news->update($request->all());

		return redirect()->route('admin.news.index');
	}

	/**
	 * Remove the specified news from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		News::destroy($id);

		return redirect()->route('admin.news.index');
	}

    /**
     * Mass delete function from index page
     * @param Request $request
     *
     * @return mixed
     */
    public function massDelete(Request $request)
    {
        if ($request->get('toDelete') != 'mass') {
            $toDelete = json_decode($request->get('toDelete'));
            News::destroy($toDelete);
        } else {
            News::whereNotNull('id')->delete();
        }

        return redirect()->route('admin.news.index');
    }

}
