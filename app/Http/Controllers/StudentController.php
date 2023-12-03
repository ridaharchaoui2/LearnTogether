<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\document;
use App\Models\User;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $userID = $user->id;
        $documents = Document::where('userID', '=', $userID)->paginate(4);

        return view('layouts.user.profil', ['documents' => $documents])->with('user', $user);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'file' => ['required','mimes:pdf', 'max:2048'],
            'titre' => ['required', 'string', 'max:255'],
            'desc' => [ 'max:255'],
            'universite' => ['required', 'string', 'max:255'],
            'filiere' => ['required', 'string', 'max:255'],
            'typeDoc' => ['required', 'string', 'max:255'],
            'niveau' => ['required', 'string', 'max:255'],
        ]);

        $user = Auth::user();
        $document = new document();

        //$document->name = $request->file('file')->getClientOriginalName();
        $document->file = $request->file('file')->getClientOriginalName();
        $document->userID = $user->id; // Assign the ID of the authenticated user
        $document->titre = $request->titre;
        $document->desc = $request->desc;
        $document->universite = $request->universite;
        $document->filiere = $request->filiere;
        $document->typeDoc = $request->typeDoc;
        $document->niveau = $request->niveau;

        $path = $request->file('file')->store('public/documents');

        $document->path = str_replace('public/', '', $path);

        $document->save();
        $success=true;
        $txtsuccess='Document a été partagé avec succès';
        //return redirect('/etudiant/accueil')->with('success', 'Document uploaded successfully!');
        return redirect()->back()->with(['success'=> $success,
                                            'txtsuccess'=>$txtsuccess]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->input('id');

        $user = User::findOrFail($id);

        $request->validate([
            'nom' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            //'email' => ['required', 'string', 'email', 'max:255'],
        ]);

        $user->nom = $request->input('nom');
        $user->prenom = $request->input('prenom');
        //$user->email = $request->input('email');
        $user->save();

        $success = true;
        $txtsuccess = 'Informations modifiées avec succès';
        return redirect()->Route('etudiant.profile.index')->with(['success' => $success, 'txtsuccess' => $txtsuccess]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $document = document::find($id);

        $document->delete();
        $success = true;
        $txtsuccess = 'Document supprimé avec succès';
        return redirect()->Route('etudiant.profile.index')->with(['success' => $success, 'txtsuccess' => $txtsuccess]);
    }
}
