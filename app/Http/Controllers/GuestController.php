<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $user = Guest::factory(10)->create();

        $guests = Guest::orderBy('updated_at', 'desc')->paginate(10);

        return view('guest.index', ['guests' => $guests]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $guest = new Guest();
        $guest->sexe = 'Masculin';
        return view('guest.form', ['guest' => $guest]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $guest = new Guest();
        $guest->firstname = $request->firstname;
        $guest->lastname = $request->lastname;
        $guest->email = $request->email;
        $guest->birthday = $request->birthday;
        $guest->address = $request->address;
        $guest->sexe = $request->sexe;

        $text = 'Nom:' . $guest->firstname . ' ' . $guest->firstname . ' ' . 'Email:' . $guest->email . ' ' . 'adresse:' . $guest->address . ' ' . 'Né le:' . $guest->birthday . ' ' . 'Sexe:' . $guest->sexe;
        $qrCode = $this->generate($text);

        $guest->qr_code = $qrCode;

        $guest->save();

        if (!isset($guest->id)) {
            return redirect()->back()->with('error', "Erreur: le visiteur n'a pas été enregistré");
        }
        return view('guest.form', ['guest' => $guest])->with('success', "Le visiteur à été ajouté avec succès");
    }

    /**
     * Display the specified resource.
     */
    public function show(Guest $guest)
    {
        return view('guest.show', ['guest'=>$guest]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Guest $guest)
    {
        return view('guest.form', ['guest'=>$guest]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Guest $guest)
    {
        $input = [];
        $input['id'] = $guest->id;
        $input['firstname'] = $request->firstname;
        $input['lastname'] = $request->lastname;
        $input['email'] = $request->email;
        $input['birthday'] = $request->birthday;
        $input['address'] = $request->address;
        $input['sexe'] = $request->sexe;

        $text = 'Nom:' . $guest->firstname . ' ' . $guest->firstname . ' ' . 'Email:' . $guest->email . ' ' . 'adresse:' . $guest->address . ' ' . 'Né le:' . $guest->birthday . ' ' . 'Sexe:' . $guest->sexe;
        $qrCode = $this->generate($text);

        $input['qr_code'] = $qrCode;

        $re = $guest->update($input);

        if(!isset($re)){
            return redirect()->back()->with('error', "Erreur: le visiteur n'a pas été modifié");
        }
        return view('guest.form', ['guest' => $guest])->with('success', "Le visiteur à été modifié avec succès");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Guest $guest)
    {
        if($guest->delete()){
            return redirect()->back()->with('success', "Le visiteur a été supprimé avec succès");
        }
        return redirect()->back()->with('error', "Erreur: le visiteur n'a pas été supprimé");
    }

    public function generate($data)
    {

        $text = 'Nom: Darius    Prenom: Stone';
        $qrCodes = [];
        // $qrCodes['simple'] = QrCode::size(120)->generate($text);
        // $qrCodes['changeColor'] = QrCode::size(120)->color(255, 0, 0)->generate('https://www.binaryboxtuts.com/');
        // $qrCodes['changeBgColor'] = QrCode::size(120)->backgroundColor(255, 0, 0)->generate('https://www.binaryboxtuts.com/');

        // $qrCodes['styleDot'] = QrCode::size(120)->style('dot')->generate('https://www.binaryboxtuts.com/');
        // $qrCodes['styleSquare'] = QrCode::size(120)->style('square')->generate('https://www.binaryboxtuts.com/');
        // $qrCodes['styleRound'] = QrCode::size(120)->style('round')->generate('https://www.binaryboxtuts.com/');

        $qrCodes['withImage'] = QrCode::size(200)->format('png')->merge('/public/images/hero-img.png', .4)->generate($data);
        // Nom du fichier pour sauvegarder le code QR
        $filename = 'qr_code_' . time() . '.png';
        // Sauvegarder le code QR dans le dossier de stockage Laravel (storage/app/public par défaut)
        Storage::put('public/qrcodes/' . $filename, $qrCodes['withImage']);

        return $filename;

    }

    public function scanQrCode(){
        return view('guest.scan');
    }
}
