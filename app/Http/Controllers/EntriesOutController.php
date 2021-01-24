<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EntriesOut;
use App\Models\BlockList;


class EntriesOutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      try {
        $entriesOuts = EntriesOut::paginate(10);
        if(count($entriesOuts)) {
          return $entriesOuts;
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
          $isBlock = $this->isBlock($request['fk_user_id']);
          if($isBlock) {
            return response()->json([
              'user_blocked' => true,
              'user' => $isBlock->user,
              'building_name' => $isBlock->building->name,
              'block_reason' =>  $isBlock->observation,
            ]);
          } else {
            $entries_created = EntriesOut::create($request->all());
            if($request['action'] == 0) {
              return response()->json(["msg" => "The entrance was registered at " .$entries_created->created_at]);
            } else {
              return response()->json(["msg" => "The exit was registered at ".$entries_created->created_at]);
            }
          }

        } catch (\Exception $e) {
          return response()->json(["msg" => "An error occurred in the entry, contact an administrator"]);
        }
    }


    public function isBlock($user_id) {

      try {
        $find_user = BlockList::where('fk_user_id', $user_id)
        ->with('user')
        ->with('building')
        ->first();
        return $find_user;
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
    }
}
