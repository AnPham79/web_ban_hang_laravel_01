<?php

namespace App\Http\Controllers;

use App\Models\shipping;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreshippingRequest;
use App\Http\Requests\UpdateshippingRequest;

class ShippingController extends Controller
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
     * @param  \App\Http\Requests\StoreshippingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreshippingRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\shipping  $shipping
     * @return \Illuminate\Http\Response
     */
    public function show(shipping $shipping)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\shipping  $shipping
     * @return \Illuminate\Http\Response
     */
    public function edit(shipping $shipping)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateshippingRequest  $request
     * @param  \App\Models\shipping  $shipping
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateshippingRequest $request, shipping $shipping)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\shipping  $shipping
     * @return \Illuminate\Http\Response
     */
    public function destroy(shipping $shipping)
    {
        //
    }
}
