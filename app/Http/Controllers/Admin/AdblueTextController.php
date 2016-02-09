<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\AdblueText;
use App\Http\Requests\CreateAdblueTextRequest;
use App\Http\Requests\UpdateAdblueTextRequest;
use Illuminate\Http\Request;



class AdblueTextController extends Controller {

	/**
	 * Display a listing of adbluetext
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $adbluetext = AdblueText::all();

		return view('admin.adbluetext.index', compact('adbluetext'));
	}

	/**
	 * Show the form for creating a new adbluetext
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.adbluetext.create');
	}

	/**
	 * Store a newly created adbluetext in storage.
	 *
     * @param CreateAdblueTextRequest|Request $request
	 */
	public function store(CreateAdblueTextRequest $request)
	{
	    
		AdblueText::create($request->all());

		return redirect()->route('admin.adbluetext.index');
	}

	/**
	 * Show the form for editing the specified adbluetext.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$adbluetext = AdblueText::find($id);
	    
	    
		return view('admin.adbluetext.edit', compact('adbluetext'));
	}

	/**
	 * Update the specified adbluetext in storage.
     * @param UpdateAdblueTextRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateAdblueTextRequest $request)
	{
		$adbluetext = AdblueText::findOrFail($id);

        

		$adbluetext->update($request->all());

		return redirect()->back();
	}

	/**
	 * Remove the specified adbluetext from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		AdblueText::destroy($id);

		return redirect()->route('admin.adbluetext.index');
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
            AdblueText::destroy($toDelete);
        } else {
            AdblueText::whereNotNull('id')->delete();
        }

        return redirect()->route('admin.adbluetext.index');
    }

}
