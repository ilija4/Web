<?php

namespace App\Http\Controllers;

use App\Models\DoctorWhoSeason;
use Illuminate\Http\Request;

class DoctorWhoSeasonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $seasons = \App\Models\DoctorWhoSeason::orderBy('season')->get();
        return view('doctor_who.index', compact('seasons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('doctor_who.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store()
    {
        $data = request()->validate([
            'poster_url' => 'required',
            'year' => 'required|numeric|min:1',
            'season' => 'required|numeric|min:1',
            'doctorNumber' => 'required|numeric|min:1',
        ]);
        DoctorWhoSeason::create($data);
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DoctorWhoSeason  $doctorWhoSeason
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(DoctorWhoSeason $season)
    {
        return view('doctor_who.show', compact('season'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DoctorWhoSeason  $doctorWhoSeason
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(DoctorWhoSeason $season)
    {
        return view('doctor_who.edit', compact('season'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DoctorWhoSeason  $doctorWhoSeason
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(DoctorWhoSeason $season)
    {
        $data =request()->validate([
            'poster_url' => 'required',
            'year' => 'required|numeric|min:1',
            'season' => 'required|numeric|min:1',
            'doctorNumber' => 'required|numeric|min:1',
        ]);

        $season->update($data);
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DoctorWhoSeason  $doctorWhoSeason
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function destroy(DoctorWhoSeason $season)
    {
        $season->delete();
        return redirect('/');
    }
}
