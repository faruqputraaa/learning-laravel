<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


use App\Models\User;

class HomeController extends Controller
{
    public function index() {
        return view('index');
    }

    public function dashboard() {
        $data = User::get();
        return view('dashboard', compact('data'));
    }

    public function create() {
        return view('create');
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'photo' => 'required|mimes:png,jpg,jpeg|max:2048',
            'email' => 'required|email',
            'name'  => 'required',
            'password' => 'required'
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator->errors());
 

        $photo      = $request->file('photo');
        $filename   = date('d-m-Y').$photo->getClientOriginalName();
        $path       = 'photo-user/'.$filename;
        
        Storage::disk('public')->put($path,file_get_contents($photo));


        $data['email']      = $request->email;
        $data['name']       = $request->name;
        $data['password']   = Hash::make($request->password);
        $data['image']      = $filename;

        User::create($data);

        return redirect()->route('admin.dashboard');
    }

    public function edit(Request $request, $id){
        $data = User::find($id);

        return view('edit', compact('data'));
    }

    public function  update(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'name'  => 'required',
            'password' => 'nullable' //tidak wajib diisi
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator->errors());
        
        $data['email']   = $request->email;
        $data['name']    = $request->name;

        if($request->password){
            $data['password']= Hash::make($request->password);
        }

        User::whereId($id)->update($data);

        return redirect()->route('admin.dashboard');
    }

    public function delete(Request $request, $id) {
        $data = User::find($id);

        if($data){
            $data->delete();
        }

        return redirect()->route('admin.dashboard');
    }

    public function show($id)
{
    $user = User::find($id);
    return view('user.show', ['user' => $user]);
}
}