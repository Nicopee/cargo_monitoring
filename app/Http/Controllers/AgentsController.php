<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Agent;


class AgentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $perPage = $request->has('per_page') ? $request->per_page : 10;
        return response()->json(Agent::paginate($perPage), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'branch' => 'required',
            'location' => 'required',
            'contact' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        if (!$validator->fails()) {
            $agent = new Agent();
            $agent->username = $request->username;
            $agent->branch = $request->branch;
            $agent->location = $request->location;
            $agent->contact = $request->contact;
            $agent->email = $request->email;
            $agent->password = $request->password;
            $agent->save();
            return response()->json(['message' => 'Agent Registered'], 200);
        } else {
            return $validator->errors();
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
