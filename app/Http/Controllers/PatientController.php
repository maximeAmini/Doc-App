<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

use App\Models\Patient;
use Auth;

class PatientController extends Controller
{
    public function index(){
        $patients = Patient::orderBy('created_at', 'desc')->get();

        return Inertia::render('Receptionniste/Patients/Index', [
            'patients' => $patients
        ]);
    }

    public function create()
    {
        return Inertia::render('Receptionniste/Patients/Create');
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
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:'.Patient::class,
            'adress' => 'required|string|max:255',
            'civilite' => 'required|string|max:255',
            'tel' => 'required|string|max:14',
            'date_naiss' => 'required|date|max:14',
            'lieu_naiss' => 'required|string|max:255',
            'groupe_sang' => 'required|string|max:8',
            'taille' => 'required|integer|max:300',
            'poids' => 'required|integer|max:255',
        ]);

        Patient::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'adress' => $request->adress,
            'civilite' => $request->civilite,
            'tel' => $request->tel,
            'date_naiss' => $request->date_naiss,
            'lieu_naiss' => $request->lieu_naiss,
            'groupe_sang' => $request->groupe_sang,
            'taille' => $request->taille,
            'poids' => $request->poids,
        ]);

        return redirect('/receptionniste/patients');
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
        $patient = Patient::get()->where('id', $id)->first();
        return Inertia::render('Receptionniste/Patients/Edit', ['patient' =>$patient]);
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
        $med = Patient::get()->where('id', $id)->first();

        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'adress' => 'required|string|max:255',
            'civilite' => 'required|string|max:255',
            'tel' => 'required|string|max:14',
            'date_naiss' => 'required|date|max:14',
            'lieu_naiss' => 'required|string|max:255',
            'groupe_sang' => 'required|string|max:8',
            'taille' => 'required|integer|max:300',
            'poids' => 'required|integer|max:255',
        ]);

        
        Patient::where('id', $id)
        ->update([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'adress' => $request->adress,
            'civilite' => $request->civilite,
            'tel' => $request->tel,
            'date_naiss' => $request->date_naiss,
            'lieu_naiss' => $request->lieu_naiss,
            'groupe_sang' => $request->groupe_sang,
            'taille' => $request->taille,
            'poids' => $request->poids,
        ]);

        return redirect('/receptionniste/patients');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pro = Patient::where('id', $id)->delete();
    }


    public function orgnise($type){
        $Patients = Patient::orderBy('created_at', $type)->get();

        return $Patients;
    }

    public function search($keyword){
        $Patients = Patient::query()
        ->where('nom', 'LIKE', "%{$keyword}%")
        ->orWhere('prenom', 'LIKE', "%{$keyword}%")
        ->get();

        return $Patients;
    }

    public function nb(){
        $count = Patient::get()->count();
        return $count;
    }
}
