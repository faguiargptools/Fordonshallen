<?php

namespace App\Http\Controllers;

use App\Motoroptimering;

class MotorController extends Controller
{
	public function index(){
		return view('test');
	}

    public function getBrand($type)
    {
		$data = Motoroptimering::where('type', $type)->get(array('brand'));
		$data = array_unique($data->toArray(), SORT_REGULAR);
			echo "<option>Märke</option>";
		foreach($data as $row){
			echo "<option value=\"" . rawurlencode($row['brand']) . "\">" . $row['brand'] . "</option>";
		}
    }

	public function getModell($brand)
	{
		$data = Motoroptimering::where('brand', $brand)->get(array('model'));
		$data = $data = array_unique($data->toArray(), SORT_REGULAR);
		echo "<option>Modell</option>";
		foreach ($data as $row) {
			echo "<option value=\"" . rawurlencode($row['model']) . "\">" . $row['model'] . "</option>";
		}
	}

	public function getEngine($type, $brand, $model)
	{
		$data = Motoroptimering::where(['type' => $type, 'brand' => $brand, 'model' => $model])->get(array('engine'));
		$data = $data = array_unique($data->toArray(), SORT_REGULAR);
		echo "<option>Motor</option>";
		foreach ($data as $row) {
			echo "<option value=\"" . rawurlencode($row['engine']) . "\">" . $row['engine'] . "</option>";
		}
	}

	public function getHk($type, $brand, $model, $engine)
	{
		$data = Motoroptimering::where(['type' => $type, 'brand' => $brand, 'model' => $model, 'engine' => $engine])->get(array('prefx'));
		$data = $data = array_unique($data->toArray(), SORT_REGULAR);
		echo "<option value=\"hk\">HK Original</option>";
		foreach ($data as $row) {
			echo "<option value=\"" . rawurlencode($row['prefx']) . "\">" . $row['prefx'] . "</option>";
		}
	}

	/*
	public function getOptimization($type, $brand, $model){
		$data = Motoroptimering::where(['type' => $type, 'brand' => $brand, 'model' => $model])->first();
		echo "<tr><td>Effekt (hk)</td><td>" . $data->prefx . "</td><td>" . $data->postfx . "</td></tr>";
		echo "<tr><td>Vridmoment (Nm)</td><td>" . $data->prenm . "</td><td>" . $data->postnm . "</td></tr>";
	}
	*/

	public function getOptimization($type, $brand, $model, $engine){
		if($engine != "Motor"){
			$data = Motoroptimering::where(['type' => $type, 'brand' => $brand, 'model' => $model, 'engine' => $engine])->first();
			echo "<tr><td>Effekt (hk)</td><td>" . $data->prefx . "</td><td>" . $data->postfx . "</td></tr>";
			echo "<tr><td>Vridmoment (Nm)</td><td>" . $data->prenm . "</td><td>" . $data->postnm . "</td></tr>";
		}
	}

	public function getOptimization2($type, $brand, $model, $engine, $hk){
		if($hk != "hk"){
			$data = Motoroptimering::where(['type' => $type, 'brand' => $brand, 'model' => $model, 'engine' => $engine, 'prefx' => $hk])->first();
			echo "<tr><td>Effekt (hk)</td><td>" . $data->prefx . "</td><td>" . $data->postfx . "</td></tr>";
			echo "<tr><td>Vridmoment (Nm)</td><td>" . $data->prenm . "</td><td>" . $data->postnm . "</td></tr>";
		}
	}
}
