<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMusicianRequest;
use App\Http\Requests\UpdateMusicianRequest;
use App\Models\Musician;
use Illuminate\Http\Request;

class MusicianController extends Controller
{
    public function index()
    {   
        $musician = Musician::query()->latest('id')->paginate(10);
        return response()->json($musician);
    }
    public function show(Musician $musician)
    {
        return response()->json($musician);
    }
    public function store(StoreMusicianRequest $request)
    {
        $data = $request->all();
        $data['profile_picture']= $request->file('profile_picture')->store('img','public');
        // dd($data);
        $res=Musician::create($data);

        return response()->json($res);
    }
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

        return response()->json($musician);
    }
    public function destroy(Musician $musician)
    {
        $musician->delete();
        return response()->json('Đã xóa');
    }
}
