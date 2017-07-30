<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Band;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index($id = null) {
	$albums = Album::all();
	return view('albums', ['albums' => $albums, 'bands' => Band::all()]);
  }
  
  /**
   * Store a newly created resource in storage.
   *
   * @param  Request  $request
   * @return Response
   */
  public function store(Request $request) {
	$album = new Album;
 
	$album->name = $request->input('name');
	$album->band_id = $request->input('band_id');
	$album->number_of_tracks = $request->input('number_of_tracks');
	$album->label = $request->input('label');
	$album->producer = $request->input('producer');
	$album->genre = $request->input('genre');
	$album->recorded_date = Carbon::parse($request->input('recorded_date'));
	$album->release_date = Carbon::parse($request->input('release_date'));
	$album->save();
	
	return 'Album record successfully created with id ' . $album->id;
  }
  
  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id) {
	return Album::find($id);
  }
  
  /**
   * Update the specified resource in storage.
   *
   * @param  Request  $request
   * @param  int  $id
   * @return Response
   */
  public function update(Request $request, $id) {
	$album = Album::find($id);
 
	$album->name = $request->input('name');
	$album->band_id = $request->input('band_id');
	$album->number_of_tracks = $request->input('number_of_tracks');
	$album->label = $request->input('label');
	$album->producer = $request->input('producer');
	$album->genre = $request->input('genre');
	$album->recorded_date = Carbon::parse($request->input('recorded_date'));
	$album->release_date = Carbon::parse($request->input('release_date'));
	$album->save();
	
	return "Sucess updating album #" . $album->id;
  }
  
  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy(Request $request, $id) {
	$album = Album::find($id);
 
	$album->delete();
	
	return "Album record successfully deleted #" . $request->input('id');
  }
}
