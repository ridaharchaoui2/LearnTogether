<?php

namespace App\Http\Controllers;

use App\Models\document;
use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documents = document::orderby('accepted')->paginate(10);
        return view('admin.documents',['documents'=> $documents]);

        

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
    public function update($id)
    {
        $document = Document::findOrFail($id);
        
        // Set the "accepted" boolean variable to true
        $document->accepted = true;
        $document->save();
        $success=true;
        $txtsuccess='Document accepté avec succès';
        return redirect()->route('documents.index')->with(['success'=> $success,
                                                            'txtsuccess'=>$txtsuccess]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        document::destroy($id);
        $success=true;
        $txtsuccess='Document supprimé avec succès';
        return redirect()->back()->with(['success'=> $success,
                                        'txtsuccess'=>$txtsuccess]);
    }
    
}
