<?php

namespace App\Http\Controllers;

use App\Models\Layout;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LayoutController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Layout  $layout
     * @return \Illuminate\Http\Response
     */
    public function show($layouts_id=null)
    {
        $layouts=Layout::first();

        if(!$layouts){
            $layouts= new Layout();
        }
        return view ('content.pages.layout-show' , ['layout'=>$layouts]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Layout  $layout
     * @return \Illuminate\Http\Response
     */
    public function edit(Layout $layout)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Layout  $layout
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $layouts= Layout::find($request->layout_id);
        
        if(!$layouts){
            $layouts=new Layout();
        }

            $layouts->link_fb=$request->link_fb;
            $layouts->link_ig=$request->link_ig;

            // Cargar las imágenes y guardar sus rutas
        if ($request->hasFile('logo_url')) {
            $file = $request->file('logo_url');    
            $name = time() . '.' . $file->getClientOriginalName();
            $filePath = 'public/images/' . $name; 
            Storage::put($filePath, file_get_contents($file));
            $layouts->logo_url = Storage::url($filePath);  // Guarda la URL pública
        }

        // Cargar las imágenes y guardar sus rutas
        if ($request->hasFile('footer_url')) {
            $file = $request->file('footer_url');    
            $name = time() . '.' . $file->getClientOriginalName();
            $filePath = 'public/images/' . $name; 
            Storage::put($filePath, file_get_contents($file));
            $layouts->footer_url = Storage::url($filePath);  // Guarda la URL pública
        }

        $layouts->save();

        return redirect()->route('pages-layout-show', ['layout_id' => $layouts->id]);
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Layout  $layout
     * @return \Illuminate\Http\Response
     */
    public function destroy(Layout $layout)
    {
        //
    }
}
