<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\document;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*public function index()
    {
        $documents = document::where('accepted', '!=', false)->paginate(3);
        return view('layouts.user.accueil',['documents'=> $documents]);

        
    }*/


    public function index(Request $request)
    {
        $user = Auth::user();
        $niveau = $request->input('niveau');
        $typeDoc = $request->input('typeDoc');
        $universite = $request->input('universite');

        $documents = Document::where('accepted', '!=', false)
                            ->when($universite, function ($query) use ($universite) {
                                return $query->where('universite', $universite);
                            })
                            ->when($niveau, function ($query) use ($niveau) {
                                return $query->where('niveau', $niveau);
                            })
                            ->when($typeDoc, function ($query) use ($typeDoc) {
                                return $query->where('typeDoc', $typeDoc);
                            })
                            ->paginate(10);

        return view('layouts.user.accueil', ['documents' => $documents])->with('user', $user);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $document = Document::findOrFail($id);
        $path = storage_path('app\public\\'.$document->path);

        return response()->file($path, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . $document->file_name . '"'
        ]);
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
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
    
    public function download($id)
    {   
        $document = Document::findOrFail($id);
        $pathToFile = storage_path('app\public\\'.$document->path);
        $success=true;
        $txtsuccess='Document a été telechargé avec succès';
        session()->flash('success', $success);
        session()->flash('txtsuccess', $txtsuccess);


        return response()->download($pathToFile, $document->name);

        
        
    }

    
}
