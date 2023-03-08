<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PromosiHomePage;
use Illuminate\Support\Facades\Storage;

class PromosiHomePageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $promosi_home_page = PromosiHomePage::all();
        return view('promosi_home_page.admin.dashboard', compact('promosi_home_page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('promosi_home_page.admin.input');
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
            $promosi_home_page = new PromosiHomePage();
            $promosi_home_page->judul_promosi = $request->judul_promosi;
            $promosi_home_page->isi_promosi = $request->isi_promosi;
            $imageName = time() . '.' . $request->file->extension();
            // $request->image->move(public_path('images'), $imageName);
            $request->file->storeAs('public/images/icon_promosi_home_page', $imageName);
            $promosi_home_page->foto_icon = $imageName;
            $promosi_home_page->save();
            return redirect('/dashboard/promosi-home-page')->with('success', 'Promosi belum berhasil ditambahkan');
        } catch (\Exception $e) {
              return redirect('/dashboard/promosi-home-page')->with('error', 'Promosi belum berhasil ditambahkan');
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
    public function edit($name)
    {
        $data = PromosiHomePage::where('judul_promosi', $name)->first();
        return view('promosi_home_page.admin.edit', compact('data'));
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
            $request->validate([
                'judul_promosi' => 'required',
                'isi_promosi' => 'required',
            ]);
            $promosi_home_page = PromosiHomePage::find($request->id);
            $promosi_home_page->judul_promosi = $request->judul_promosi;
            $promosi_home_page->isi_promosi = $request->isi_promosi;
            if ($request->hasFile('file')) {
                Storage::delete('public/images/icon_promosi_home_page/' . $promosi_home_page->foto_icon);
                $imageName = time() . '.' . $request->file->extension();
                $request->file->storeAs('public/images/icon_promosi_home_page', $imageName);
                $promosi_home_page->foto_icon = $imageName;
            } else {
              $imageName = $promosi_home_page->foto_icon;
            }
            $promosi_home_page->save();
            return redirect('/dashboard/promosi-home-page')->with('success','Promosi berhasil diperbarui');          
          } catch (\Exception $e) {
              return redirect('/dashboard/promosi-home-page')->with('error', 'Promosi belum berhasil diperbarui');
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
            $promosi_home_page = PromosiHomePage::find($id);
            $promosi_home_page->delete();
            return redirect('/dashboard/promosi-home-page')->with('success', 'Promosi berhasil dihapus');
        }catch (\Exception $e) {
            return redirect('/dashboard/promosi-home-page')->with('error', 'Promosi belum berhasil dihapus');
        }
    }
}
