<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GoogleAnalytics;

class GoogleAnalyticsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $google_analytics = GoogleAnalytics::all();
        return view('google_analytics.admin.dashboard', compact('google_analytics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $google_analytics = GoogleAnalytics::all();
        return view('google_analytics.admin.input', compact('google_analytics'));
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
            $google_analytics = new GoogleAnalytics();
            $google_analytics->src = $request->src;
            $google_analytics->save();
            return redirect('/dashboard/google-SEO')->with('success', 'Google SEO telah ditambahkan'); 
        } catch (\Exception $e) {
            return redirect('/dashboard/google-SEO')->with('error', 'Google SEO gagal ditambahkan'); 
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
    public function edit($id)
    {
        $data= GoogleAnalytics::where('id', $id)->first();
        $google_analytics = GoogleAnalytics::all();
        return view('google_analytics.admin.edit', compact('google_analytics', 'data'));
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
                'src' => 'required',
            ]);
            $google_analytics = GoogleAnalytics::find($request->id);
            $google_analytics->src = $request->src;
            $google_analytics->save();
            return redirect('/dashboard/google-SEO')->with('success','Google SEO berhasil diperbarui');          
          } catch (\Exception $e) {
              return redirect('/dashboard/google-SEO')->with('error', 'Google SEO belum berhasil diperbarui');
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
            $google_analytics = GoogleAnalytics::find($id);
            $google_analytics->delete();
            return redirect('/dashboard/google-SEO')->with('success', 'Google SEO telah dihapus'); 
        } catch (\Exception $e) {
            return redirect('/dashboard/google-SEO')->with('error', 'Google SEO gagal dihapus'); 
        }
    }
}
