<?php

namespace App\Http\Controllers;

use App\Models\FloorSection;
use App\Http\Requests\StoreFloorSectionRequest;
use App\Http\Requests\UpdateFloorSectionRequest;

class FloorSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.floorsections.index');
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
    public function store(StoreFloorSectionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(FloorSection $floorSection)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FloorSection $floorSection)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFloorSectionRequest $request, FloorSection $floorSection)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FloorSection $floorSection)
    {
        //
    }
}
