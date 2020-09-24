<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Bookable;
use Illuminate\Http\Request;
use App\Http\Resources\BookableIndexResource  as BIResource;
use App\Http\Resources\BookableShowResource as BSResource;

class BookableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //  return Bookable::all();
         return BIResource::collection(Bookable::all()); 
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bookable  $bookable
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        //
        // return  Bookable::findorFail($id);
        return new BSResource(Bookable::findorFail($id));  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bookable  $bookable
     * @return \Illuminate\Http\Response
     */
    public function edit(Bookable $bookable)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bookable  $bookable
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bookable $bookable)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bookable  $bookable
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bookable $bookable)
    {
        //
    }
}
