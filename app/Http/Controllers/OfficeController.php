<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Office;

class OfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $office = Office::all();
        return view('office.admin.dashboard', compact('office'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        try {
            $office = new Office;
            $office->judul_office = $request->judul_office;
            $office->isi_office = $request->isi_office;
            $office->save();
            return redirect('/dashboard/office')->with('success', 'Alamat office telah ditambahkan');
        } catch (\Exception $e) {
            return redirect('/dashboard/office')->with('error', 'Alamat office gagal ditambahkan');
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return view('office.admin.input');
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
    public function edit($name)
    {
        $data= Office::where('judul_office', $name)->first();

        $office = Office::all();
        return view('office.admin.edit', compact('data', 'office'));
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
            $office = Office::find($request->id);
            $office->judul_office = $request->judul_office;
            $office->isi_office = $request->isi_office;
            $office->save();
            return redirect('/dashboard/office')->with('success','data berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect('/dashboard/office')->with('error', 'data gagal diperbarui');
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
            $Office = Office::find($id);
            $Office->delete();
            return redirect('/dashboard/office')->with('success', 'alamat office telah dihapus');
        } catch (\Exception $e) {
            return redirect('/dashboard/office')->with('error', 'alamat office belum berhasil dihapus');
        }
    }
}
