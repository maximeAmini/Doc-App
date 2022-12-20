<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

use App\Models\Rdv;
use Auth;

class RdvController extends Controller
{
    public function index(){
        $rdvs = Rdv::with('patient')->orderBy('created_at', 'desc')->get();

        return Inertia::render('Receptionniste/Rdvs/Index', [
            'rdvs' => $rdvs
        ]);
    }

    public function create()
    {
        return Inertia::render('Receptionniste/Rdvs/Create');
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
            'date' => 'required|date',
            'heure' => 'required|date_format:H:i',
        ]);

        Rdv::create([
            'date' => $request->date,
            'heure' => $request->heure,
            'patient_id' => $request->patient_id,
        ]);

        return redirect('/receptionniste/rdvs');
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
        $rdv = Rdv::get()->where('id', $id)->first();
        return Inertia::render('Receptionniste/Rdvs/Edit', ['rdv' =>$rdv]);
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
        $med = Rdv::get()->where('id', $id)->first();

        $request->validate([
            'date' => 'required|date|max:14',
            'heure' => 'required|time|max:14',
        ]);

        
        Rdv::where('id', $id)
        ->update([
            'date' => $request->date,
            'heure' => $request->heure,
            'patient_id' => $request->patient_id,
        ]);

        return redirect('/receptionniste/rdvs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pro = Rdv::where('id', $id)->delete();
    }


    public function orgnise($type){
        $rdvs = Rdv::with('patient')->orderBy('created_at', $type)->get();

        return $rdvs;
    }

    public function search($keyword){
        $rdvs = Rdv::query()
        ->with('patient')
        ->where('date', 'LIKE', "%{$keyword}%")
        ->get();

        return $rdvs;
    }
}
