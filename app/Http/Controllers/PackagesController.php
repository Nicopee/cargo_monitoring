<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\PackageRequest;
use App\Models\Package;

class PackagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $perPage = $request->has('per_page') ? $request->per_page : 10;
        return response()->json(Package::where(['sender_id' => $request->user()->id])->paginate($perPage), 200);
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
            'package_name' => 'required',
            'qantity' => 'nullable',
            'category_id' => 'nullable',
            'package_status' => 'nullable',
            'receiver_name' => 'required',
            'receiver_email' => 'required',
            'receiver_contact' => 'required',
            'delivery_location' => 'required'
        ]);

        if (!$validator->fails()) {
            $package = new Package();
            $package->package_name = $request->package_name;
            $package->receiver_name = $request->receiver_name;
            $package->receiver_email = $request->receiver_email;
            $package->receiver_contact = $request->receiver_contact;
            $package->delivery_location = $request->delivery_location;
            $package->sender_id = $request->user()->id;
            $package->save();
            return response()->json(['message' => 'Package Added'], 200);
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
