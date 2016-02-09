<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Produkter;
use App\Http\Requests\CreateProdukterRequest;
use App\Http\Requests\UpdateProdukterRequest;
use Illuminate\Http\Request;



class ProdukterController extends Controller {

	/**
	 * Display a listing of produkter
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $produkter = Produkter::all();

		return view('admin.produkter.index', compact('produkter'));
	}

	/**
	 * Show the form for creating a new produkter
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.produkter.create');
	}

	/**
	 * Store a newly created produkter in storage.
	 *
     * @param CreateProdukterRequest|Request $request
	 */
	public function store(CreateProdukterRequest $request)
	{
	    
		Produkter::create($request->all());

		return redirect()->route('admin.produkter.index');
	}

	/**
	 * Show the form for editing the specified produkter.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$produkter = Produkter::find($id);
	    
	    
		return view('admin.produkter.edit', compact('produkter'));
	}

	/**
	 * Update the specified produkter in storage.
     * @param UpdateProdukterRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateProdukterRequest $request)
	{
		$produkter = Produkter::findOrFail($id);

        

		$produkter->update($request->all());

		return redirect()->route('admin.produkter.index');
	}

	/**
	 * Remove the specified produkter from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Produkter::destroy($id);

		return redirect()->route('admin.produkter.index');
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
            Produkter::destroy($toDelete);
        } else {
            Produkter::whereNotNull('id')->delete();
        }

        return redirect()->route('admin.produkter.index');
    }

}
