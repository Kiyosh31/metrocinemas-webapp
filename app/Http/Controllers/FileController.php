<?php

namespace Metrocinemas\Http\Controllers;

use Metrocinemas\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        // gets all the multiple files
        foreach($request->photos as $photo)
        {
            // validate the file is correctly uploaded
            if($photo->isValid())
            {
                $hashedName = $photo->store('');

                // save the registry in the DB
                $regFile = File::create([
                    'model_id' => $request->model_id,
                    'model_type' => 'App\\' . $request->model_type,
                    'name' => $file->getOriginalName(),
                    'hashed' => $hashedName,
                    'mime' => $file->getClientMime(),
                    'size' => $file->getClientSize(),
                ]);
                dd($regFile);

                $regFile->save();
            }
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \Metrocinemas\File  $file
     * @return \Illuminate\Http\Response
     */
    public function show(File $file)
    {
        $headers = ['Content-Type: ' . $file->mime];
        return Storage::download($file->hashed, $file->name, $headers);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Metrocinemas\File  $file
     * @return \Illuminate\Http\Response
     */
    public function edit(File $file)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Metrocinemas\File  $file
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, File $file)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Metrocinemas\File  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $file)
    {
        Storage::delete($file->hashed);
        $file->delete();
        return redirect()->back();
    }
}
