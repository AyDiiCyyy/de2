<?php

namespace App\Http\Controllers;

use App\Models\Musician;
use App\Http\Requests\StoreMusicianRequest;
use App\Http\Requests\UpdateMusicianRequest;

class MusicianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $musician = Musician::query()->latest('id')->paginate(10);
        return view('index',compact('musician'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMusicianRequest $request)
    {
        $data = $request->all();
        $data['profile_picture']= $request->file('profile_picture')->store('img','public');
        // dd($data);
        Musician::create($data);

        return redirect()->route('musician.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Musician $musician)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Musician $musician)
    {
        return view('edit',compact('musician'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMusicianRequest $request, Musician $musician)
    {
        $data = $request->all();
        $data['profile_picture']= $musician->profile_picture;
        if($request->hasFile('profile_picture')){
            $data['profile_picture']= $request->file('profile_picture')->store('img','public');
            if($musician->profile_picture != null){
                if(file_exists('storage/'.$musician->profile_picture)){
                    unlink('storage/'.$musician->profile_picture);
                }
            }
        }
        $musician->update($data);

        return redirect()->route('musician.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Musician $musician)
    {
        $musician->delete();
        return redirect()->route('musician.index');
    }
}
