<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;use Inertia\Inertia;

use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

use App\Models\User;
use App\Models\Receptionniste;
use Auth;

class ReceptionnisteController extends Controller
{
    public function index(){
        $receptionnistes = Receptionniste::orderBy('created_at', 'desc')->with('user')->get();
        
        return Inertia::render('Admin/Receptionnistes/Index', [
            'receptionnistes' => $receptionnistes
        ]);
    }

    public function create()
    {
        return Inertia::render('Admin/Receptionnistes/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:'.User::class,
            'password' => ['required', 'confirmed', Rules\Password::defaults()],

            'civilite' => 'required|string|max:255',
            'adress' => 'required|string|max:255',
            'tel' => 'required|string|max:14',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'receptionniste'
        ]);

        Receptionniste::create([
            'civilite' => $request->civilite,
            'adress' => $request->adress,
            'tel' => $request->tel,
            'user_id' => $user->id
        ]);

        return redirect('/admin/receptionnistes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $receptionniste = Receptionniste::with('user')->get()->where('id', $id)->first();
        return Inertia::render('Admin/Receptionnistes/Edit', ['receptionniste' =>$receptionniste]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $med = Receptionniste::with('user')->get()->where('id', $id)->first();

        $request->validate([
            'name' => 'required|string|max:255',
            'civilite' => 'required|string|max:255',
            'adress' => 'required|string|max:255',
            'tel' => 'required|string|max:14',
        ]);

        
        Receptionniste::where('id', $id)
        ->update([
            'civilite' => $request->civilite,
            'adress' => $request->adress,
            'tel' => $request->tel
        ]);

        User::where('id', $med->user_id)
        ->update([
            'name' => $request->name,
        ]);

        return redirect('/admin/receptionnistes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Receptionniste = Receptionniste::get()->where('id', $id)->first();
        $user_id = $Receptionniste->user_id;
        $pro = Receptionniste::where('id', $id)->delete();
        $pro = User::where('id', $user_id)->delete();
    }


    public function orgnise($type){
        $Receptionnistes = Receptionniste::orderBy('created_at', $type)->with('user')->get();

        return $Receptionnistes;
    }

    public function search($keyword){
        $Receptionnistes = Receptionniste::query()
        ->with('user')
        ->where('name', 'LIKE', "%{$keyword}%")
        ->get();

        return $Receptionnistes;
    }

    public function nb(){
        $count = Receptionniste::get()->count();
        return $count;
    }
}
