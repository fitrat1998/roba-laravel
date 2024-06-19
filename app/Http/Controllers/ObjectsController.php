<?php

namespace App\Http\Controllers;

use App\Models\Flat;
use App\Models\Floor;
use App\Models\Objects;
use App\Http\Requests\StoreObjectsRequest;
use App\Http\Requests\UpdateObjectsRequest;
use App\Models\ObjectSection;
use App\Models\Section;
use Illuminate\Support\Facades\DB;

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

//        dd($request);
        if (empty($existsobjects)) {
            $objects = Objects::create([
                'name' => $validated['object_name']
            ]);
            foreach ($request->ob_sec as $k => $ob) {
                $sec_ob = DB::table('object_has_section')
                    ->where('objects_id', $objects->id)
                    ->where('sections_id', $ob)
                    ->first();
                if (!$sec_ob) {
                    DB::table('object_has_section')->insert([
                        'objects_id' => $objects->id,
                        'sections_id' => $ob
                    ]);
                }
            }
        }
        $parsedfloors = explode('/', $request->get('floors'));
        $parsedflats = explode('/', $request->get('rooms'));


        $floors_end = $parsedfloors[1] ?? 0;
        $floors_start = $parsedfloors[0] ?? 0;
        dd($parsedfloors);

        if($floors_end && $floors_start){

             $floors_s = $floors_end - $floors_start + 1;
        }



// Check if $parsedflats[1] is numeric before proceeding
        if (isset($parsedflats[1]) && is_numeric($parsedflats[1])) {
            $floors_room = ($parsedflats[1] ?? 0) / $floors_s;
        } else {
            // Handle the case where $parsedflats[1] is not numeric
            // For example, set a default value or return an error message
            return redirect()->back()->with('danger', 'Invalid input for rooms.');
        }

        $c = 0;

        for ($i = $floors_start; $i <= $floors_end; $i++) {
            $existsobjects = ''; // Assuming this is defined elsewhere

    // Check if floor already exists for the object
    $floor = Floor::where('objects_id', $existsobjects->id)
        ->where('number', $i)
        ->first();

    if (!$floor) {
        // Create floor if it doesn't exist
        $floor = Floor::create([
            'objects_id' => $objects->id ?? $existsobjects->id,
            'number' => $i,
        ]);

        // Attach sections to the floor
        foreach ($request->floor_sec as $ob) {
            DB::table('floor_has_section')->updateOrInsert([
                'floors_id' => $floor->id,
                'sections_id' => $ob
            ]);
        }

        // Calculate number of flats for this floor
        $flats_start = ($i - 1) * $floors_room;
        $flats_end = $i * $floors_room;

        // Create flats for the current floor
        for ($j = $flats_start; $j < $flats_end; $j++) {
            Flat::create([
                'object_id' => $objects->id ?? $existsobjects->id,
                'floor_id' => $floor->id,
                'number' => $j + 1,
                'surface' => $i // Adjust as per your requirements
            ]);

            // Attach sections to the flat
            foreach ($request->flat_sec as $ob) {
                DB::table('flat_has_section')->updateOrInsert([
                    'flats_id' => $flat->id,
                    'sections_id' => $ob
                ]);
            }
        }
        $c++;
    } else {
        return redirect()->back()->with('danger', 'Floor already exists for this object.');
    }
}
//        return  $c;
        return redirect()->route('objects.index')->with('success', 'Obyekt muvaffaqiyatli qo`shildi');

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
    public function destroy($id)
    {
        Objects::find($id)->delete();
        return redirect()->route('objects.index')->with('success', 'Obyekt muvaffaqiyatli o`chirildi');

    }
}
