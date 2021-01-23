<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buildings;


class BuildingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
         try {
           $buildings = Buildings::paginate(10);
           if(count($buildings)) {
             return $buildings;
           } else {
             return response()->json(["msg" => "No data found"]);
           }
         } catch (\Exception $e) {
           return response()->json(["msg" => "An error occurred in the entry, contact an administrator"]);
         }


     }

     /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
      */
     public function create()
     {
         //
     }

     /**
      * Store a newly created resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */
     public function store(Request $request)
     {
         try {
           $building_created = Buildings::create($request->all());
           return response()->json(["msg" => "The building was created correctly"]);
         } catch (\Exception $e) {
           return response()->json(["msg" => "An error occurred in the entry, contact an administrator"]);
         }
     }

     /**
      * Display the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function show($id)
     {
         //
         $building_find = Buildings::find($id);
         return $building_find;
     }

     /**
      * Show the form for editing the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function edit($id)
     {

     }

     /**
      * Update the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function update(Request $request, $id)
     {
         //
         try {
           $building_update = Buildings::find($id);
           $building_update->update($request->all());
           return response()->json(["msg" => "Building has been edited successfully"]);
         } catch (\Exception $e) {
           return response()->json(["msg" => "An error occurred in the entry, contact an administrator"]);
         }

     }

     /**
      * Remove the specified resource from storage.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function destroy($id)
     {
         //
         try {
           $user_destroy = Buildings::destroy($id);
           return response()->json(["msg" => "Building has been deleted"]);
         } catch (\Exception $e) {
           return response()->json(["msg" => "An error occurred in the entry, contact an administrator"]);
         }

     }
}
