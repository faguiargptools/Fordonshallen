<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Motoroptimering;
use App\Http\Requests\CreateMotoroptimeringRequest;
use App\Http\Requests\UpdateMotoroptimeringRequest;
use Illuminate\Http\Request;



class MotoroptimeringController extends Controller {

	/**
	 * Display a listing of motoroptimering
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $motoroptimering = Motoroptimering::all();

		return view('admin.motoroptimering.index', compact('motoroptimering'));
	}

	/**
	 * Show the form for creating a new motoroptimering
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.motoroptimering.create');
	}

	/**
	 * Store a newly created motoroptimering in storage.
	 *
     * @param CreateMotoroptimeringRequest|Request $request
	 */
	public function store(CreateMotoroptimeringRequest $request)
	{
	    
		Motoroptimering::create($request->all());

		return redirect()->route('admin.motoroptimering.index');
	}

	/**
	 * Show the form for editing the specified motoroptimering.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$motoroptimering = Motoroptimering::find($id);
	    
	    
		return view('admin.motoroptimering.edit', compact('motoroptimering'));
	}

	/**
	 * Update the specified motoroptimering in storage.
     * @param UpdateMotoroptimeringRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateMotoroptimeringRequest $request)
	{
		$motoroptimering = Motoroptimering::findOrFail($id);

        

		$motoroptimering->update($request->all());

		return redirect()->route('admin.motoroptimering.index');
	}

	/**
	 * Remove the specified motoroptimering from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Motoroptimering::destroy($id);

		return redirect()->route('admin.motoroptimering.index');
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
            Motoroptimering::destroy($toDelete);
        } else {
            Motoroptimering::whereNotNull('id')->delete();
        }

        return redirect()->route('admin.motoroptimering.index');
    }

}
