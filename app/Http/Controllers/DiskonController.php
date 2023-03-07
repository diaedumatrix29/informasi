<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Diskon;
use Illuminate\Support\Facades\Storage;

class DiskonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $diskon = Diskon::all();
        return view('diskon.admin.dashboard', compact('diskon'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('diskon.admin.input');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $diskon = new Diskon;
            $diskon->link = $request->link;
            $imageName = time() . '.' . $request->file->extension();
            $request->file->storeAs('public/images/diskon', $imageName);
            $diskon->foto_diskon = $imageName;
            $diskon->save();
            return redirect('/diskon/input-data-diskon')->with('success', 'Diskon telah ditambahkan');
        }  catch (\Exception $e) {
            return redirect('/dashboard/diskon')->with('error', 'Diskon belum berhasil ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $data = Diskon::find($request->id);
        return view('diskon.admin.edit', compact('data'));
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
        try {
            $diskon = Diskon::find($request->id);
            $diskon->link = $request->link;
            if ($request->hasFile('file')) {
                Storage::delete('public/images/diskon/' . $diskon->foto_diskon);
                $imageName = time() . '.' . $request->file->extension();
                $request->file->storeAs('public/images/diskon', $imageName);
                $diskon->foto_diskon = $imageName;
            } else {
              $imageName = $diskon->foto_diskon;
            }
            $diskon->save();
            return redirect('/dashboard/diskon')->with('success','Diskon berhasil diperbarui');          
          } catch (\Exception $e) {
              return redirect('/dashboard/diskon')->with('error', 'Diskon belum berhasil diperbarui');
          }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $diskon = Diskon::find($id);
            Storage::delete('public/images/diskon/' . $diskon->foto_diskon);
            $diskon->delete();
            return redirect('/dashboard/diskon')->with('success', 'Diskon telah dihapus');
        } catch (\Exception $e) {
            return redirect('/dashboard/diskon')->with('error', 'Diskon belum berhasil dihapus');
        }
    }
}
