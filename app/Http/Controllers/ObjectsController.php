<?php

namespace App\Http\Controllers;

use App\Models\Flat;
use App\Models\Floor;
use App\Models\Objects;
use App\Http\Requests\StoreObjectsRequest;
use App\Http\Requests\UpdateObjectsRequest;
use App\Models\ObjectSection;
use App\Models\Section;

class ObjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $objects = Objects::all();

        $sections = Section::all();

        return view('admin.objects.index', compact('objects', 'sections'));
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
        $validated = $request->validated();

        $existsobjects = Objects::where('name', $validated['object_name'])->first();

        if (empty($existsobjects)) {
            $objects = Objects::create([
                'name' => $validated['object_name']
            ]);
        }
//        else {
//           return redirect()->back()->with('danger','Bu obyekt allaqachon mavjud');
//        }

        $parsedfloors = explode('/', $request->floors);

        for ($i = $parsedfloors[0]; $i <= $parsedfloors[1]; $i++) {
            $existsfloors = Floor::where('object_id', $existsobjects->id)
                ->where('number', $i)
                ->first();

            if (empty($existsfloors) && empty($existsobjects)) {
                $floors = Floor::create([
                    'object_id' => $existsobjects->id,
                    'number' => $i,
                    'surface' => 0,
                ]);
            }
            else {
                return redirect()->back()->with('danger', 'Bu qavatlar allaqachon mavjud');
            }

        }

        $parsedflats = explode('/', $request->rooms);

//        for ($j = $parsedflats[0]; $j <= $parsedflats[1]; $j++) {
//
//            $flats= Flat::create([
//                'object_id' => $object->id,
//                'number' => $j,
//
//            ]);
//        }
        exit();
//        return redirect()->route('objects.index')->with('success','Obyekt muvaffaqiyatli qo`shildi');

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
