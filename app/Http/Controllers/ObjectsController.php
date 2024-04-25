<?php

namespace App\Http\Controllers;

use App\Models\Objects;
use App\Http\Requests\StoreObjectsRequest;
use App\Http\Requests\UpdateObjectsRequest;

class ObjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $objects = Objects::all();

        return view('admin.objects.index',compact('objects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreObjectsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Objects $objects)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Objects $objects)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateObjectsRequest $request, Objects $objects)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Objects $objects)
    {
        //
    }
}
