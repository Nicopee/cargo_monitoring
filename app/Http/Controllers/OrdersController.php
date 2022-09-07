<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Package;
use Illuminate\Support\Facades\Validator;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $validator = Validator::make($request->all(), [
            'destination' => 'required',
            'expected_delivery_date' => 'required',
            'sender_id' => 'required',
            "packages" => "required|array",
        ]);

        if (!$validator->fails()) {
            $data = $request['packages'];
            $orderModel = new Order();
            $orderModel->destination = $request->destination;
            $orderModel->expected_delivery_date = $request->expected_delivery_date;
            $orderModel->sender_id = $request->sender_id;
            $orderModel->save();
            foreach ($data as $Packages) {
                $packages = new Package;
                // $variation->variation_options_id = $productData['variation_options_id'];
                // $variation->price = $productData['price'];
                // $variation->description = $productData['description'];
                // $productModel->productVariations()->save($variation);
            }
        }

        // $flavours = $productRequest['flavours'];

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
