<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Worker;
use App\Http\Requests\StoreWorkerRequest;
use App\Http\Requests\UpdateWorkerRequest;
use Database\Seeders\WorkerSeeder;

class WorkerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $workers = Worker::all();

        return view('admin.workers.index', compact('workers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.workers.add');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWorkerRequest $request)
    {
        $validated = $request->validated();
//        dd($validated);
        $worker = Worker::create([
            'fullname' => $validated['name'],
            'phone' => $validated['phone']
        ]);

        $user = User::create([
            'name'          => $validated['name'],
            'login'         => $request->login,
            'password'      => $request->password,
            'faculty_id'    => $worker->id,
        ]);

        return redirect()->route('workers.index')->with('success', 'Ishchi muvvafaqiyatli qo`shildi');
    }

    /**
     * Display the specified resource.
     */
    public function show(Worker $worker)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Worker $worker)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWorkerRequest $request, Worker $worker)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
//        $worker = User::where('faculty_id',$id)->first();
        User::where('faculty_id',$id)->delete();
        Worker::find($id)->delete();

        return redirect()->route('workers.index')->with('success', 'Ishchi muvvafaqiyatli o`chirildi');

    }
}
