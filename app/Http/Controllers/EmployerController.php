<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use Illuminate\Http\Request;

class EmployerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        // $user = Employer::factory(10)->create();
        $employers = Employer::orderBy('updated_at', 'desc')->paginate(10);
        $employer = new Employer();

        return view('employer.index', ['employer'=>$employer, 'employers'=>$employers]);
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
    public function store(Request $request)
    {

        $employer = new Employer();
        $employer->firstname = $request->firstname;
        $employer->lastname = $request->lastname;
        $employer->email = $request->email;
        $employer->card_number = $request->card_number;
        $employer->birthday = $request->birthday;
        $employer->address = $request->address;
        $employer->sexe = $request->sexe;
        $employer->matricule = $request->matricule;

        $employer->save();

        if(!isset($employer->id)){
            return redirect()->back()->with('error', "Erreur: l'employé n'a pas été enregistré");
        }
        return to_route('employe.index')->with('success', "L'employé à été ajouté avec succès");
    }

    /**
     * Display the specified resource.
     */
    public function show(Employer $employe)
    {
        return view('employer.show', ['employer'=>$employe]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employer $employe)
    {
        return view('employer.edit', ['employer'=>$employe]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employer $employe)
    {
        $input = [];
        $input['id'] = $employe->id;
        $input['firstname'] = $request->firstname;
        $input['lastname'] = $request->lastname;
        $input['email'] = $request->email;
        $input['card_number'] = $request->card_number;
        $input['birthday'] = $request->birthday;
        $input['address'] = $request->address;
        $input['sexe'] = $request->sexe;
        $input['matricule'] = $request->matricule;

        $re = $employe->update($input);
        if(!isset($re)){
            return redirect()->back()->with('error', "Erreur: l'employé n'a pas été modifié");
        }
        return to_route('employe.index')->with('success', "L'employé à été modifié avec succès");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employer $employe)
    {
        if($employe->delete()){
            return redirect()->back()->with('success', "L'employé a été supprimé avec succès");
        }
        return redirect()->back()->with('error', "Erreur: l'employé n'a pas été supprimé");
        
    }
}
