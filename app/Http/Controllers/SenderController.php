<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SendersRequest;
use Illuminate\Support\Facades\Validator;
use App\Models\Sender;

class SenderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // returns a list of all senders
        $perPage = $request->has('per_page') ? $request->per_page : 10;
        return response()->json(Sender::paginate($perPage), 200);
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
            'firstname' => 'required',
            'lastname' => 'required',
            'contact' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        if (!$validator->fails()) {
            $sender = new Sender();
            $sender->firstname = $request->firstname;
            $sender->lastname = $request->lastname;
            $sender->contact = $request->contact;
            $sender->email = $request->email;
            $sender->password = $request->password;
            $sender->save();
            return response()->json(['message' => 'Sender Registered'], 200);
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
