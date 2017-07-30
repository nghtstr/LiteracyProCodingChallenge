<?php

namespace App\Http\Controllers;

use App\Models\Band;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BandController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index($id = null) {
  	$bands = Band::all();
	return view('bands', ['bands' => $bands]);
  }
  
  /**
   * Store a newly created resource in storage.
   *
   * @param  Request  $request
   * @return Response
   */
  public function store(Request $request) {
	$band = new Band;
	
	$band->name = $request->input('name');
	$band->website = $request->input('website');
	$band->start_date = Carbon::parse($request->input('start_date'));
	$band->still_active = $request->input('still_active');
	$band->save();
	
	return 'Band record successfully created with id ' . $band->id;
  }
  
  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id) {
	return Band::find($id);
  }
  
  /**
   * Update the specified resource in storage.
   *
   * @param  Request  $request
   * @param  int  $id
   * @return Response
   */
  public function update(Request $request, $id) {
	$band = Band::find($id);
 
	$band->name = $request->input('name');
	$band->website = $request->input('website');
	$band->start_date = Carbon::parse($request->input('start_date'));
	$band->still_active = $request->input('still_active');
	$band->save();
	
	return "Sucess updating band #" . $band->id;
  }
  
  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy(Request $request, $id) {
	$band = Band::find($id);
	
	$band->delete();
	
	return "Band record successfully deleted #" . $request->input('id');
  }
}
