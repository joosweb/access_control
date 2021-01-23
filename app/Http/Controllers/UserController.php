<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
          $users = User::paginate(10);
          if(count($users)) {
            return $users;
          } else {
            return response()->json(["msg" => "No data found"]);
          }
        } catch (\Exception $e) {
          return response()->json(["msg" => $e->getMessage()]);
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
          $request['password'] = bcrypt($request['password']);
          $user_created = User::create($request->all());
          return response()->json($user_created);
        } catch (\Exception $e) {
          return response()->json(["msg" => $e->getMessage()]);
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
        $user_find = User::find($id);
        return $user_find;
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
          if($request['password']) {
            $request['password'] = bcrypt($request['password']);
          }
          $user_update = User::find($id);
          $user_update->update($request->all());
          return response()->json(["msg" => "User has been edited successfully"]);
        } catch (\Exception $e) {
          return response()->json(["msg" => $e->getMessage()]);
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
          $user_destroy = User::destroy($id);
          return response()->json(["msg" => "User has been deleted"]);
        } catch (\Exception $e) {
          return response()->json(["msg" => $e->getMessage()]);
        }

    }
}
