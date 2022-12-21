<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

use App\Models\User;
use App\Models\Medecin;
use Auth;

class MedecinController extends Controller
{
    public function index(){
        $medecins = Medecin::orderBy('created_at', 'desc')->with('user')->get();

        return Inertia::render('Admin/Medecins/Index', [
            'medecins' => $medecins
        ]);
    }

    public function create()
    {
        return Inertia::render('Admin/Medecins/Create');
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
            'specialite' => 'required|string|max:255',
            'adress' => 'required|string|max:255',
            'tel' => 'required|string|max:14',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'medecin'
        ]);

        Medecin::create([
            'civilite' => $request->civilite,
            'specialite' => $request->specialite,
            'adress' => $request->adress,
            'tel' => $request->tel,
            'user_id' => $user->id
        ]);

        return redirect('/admin/medecins');
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
        $medecin = Medecin::with('user')->get()->where('id', $id)->first();
        return Inertia::render('Admin/Medecins/Edit', ['medecin' =>$medecin]);
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
        $med = Medecin::with('user')->get()->where('id', $id)->first();

        $request->validate([
            'name' => 'required|string|max:255',
            'civilite' => 'required|string|max:255',
            'specialite' => 'required|string|max:255',
            'adress' => 'required|string|max:255',
            'tel' => 'required|string|max:14',
        ]);

        
        Medecin::where('id', $id)
        ->update([
            'civilite' => $request->civilite,
            'specialite' => $request->specialite,
            'adress' => $request->adress,
            'tel' => $request->tel
        ]);

        User::where('id', $med->user_id)
        ->update([
            'name' => $request->name,
        ]);

        return redirect('/admin/medecins');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $medecin = Medecin::get()->where('id', $id)->first();
        $user_id = $medecin->user_id;
        $pro = Medecin::where('id', $id)->delete();
        $pro = User::where('id', $user_id)->delete();
    }


    public function orgnise($type){
        $medecins = Medecin::orderBy('created_at', $type)->with('user')->get();

        return $medecins;
    }

    public function search($keyword){
        $medecins = Medecin::query()
        ->with('user')
        ->where('name', 'LIKE', "%{$keyword}%")
        ->get();

        return $medecins;
    }

    public function nb(){
        $count = Medecin::get()->count();
        return $count;
    }
}
