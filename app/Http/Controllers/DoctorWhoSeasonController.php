<?php

namespace App\Http\Controllers;

use App\Models\DoctorWhoSeason;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class DoctorWhoSeasonController extends Controller
{
    public function index()
    {
        $seasons = DoctorWhoSeason::orderBy('season')->get();
        return view('doctor_who.index', compact('seasons'));
    }

    public function create()
    {
        $user_id = Auth::id();
        if (!Gate::allows('add', $user_id)) abort(403);
        $season = new DoctorWhoSeason();
        $season['user_id'] = $user_id;
        return view('doctor_who.create', compact('season'));
    }

    public function store()
    {
        $data = request()->validate([
            'poster_url' => 'required',
            'year' => 'required|numeric|min:1',
            'season' => 'required|numeric|min:1',
            'doctorNumber' => 'required|numeric|min:1',
        ]);
        $data['user_id']=Auth::id();
        DoctorWhoSeason::create($data);
        return redirect('/users/' . Auth::user()->name);
    }

    public function show(DoctorWhoSeason $season)
    {
        $user = User::find($season->user_id);
        return view('doctor_who.show', compact('season', 'user'));
    }

    public function edit(DoctorWhoSeason $season)
    {
        if (!Gate::allows('update-or-delete', $season)) abort(403);
        return view('doctor_who.edit', compact('season'));
    }

    public function update(DoctorWhoSeason $season)
    {
        $data =request()->validate([
            'poster_url' => 'required',
            'year' => 'required|numeric|min:1',
            'season' => 'required|numeric|min:1',
            'doctorNumber' => 'required|numeric|min:1',
        ]);
        $user = Auth::user();
        if (!Gate::allows('update-or-delete', $season)) abort(403);
        $season->update($data);
        return redirect('/users/' . $user->name);
    }

    public function destroy(DoctorWhoSeason $season)
    {
        $user = User::find($season->user_id);
        if (!Gate::allows('update-or-delete', $season)) abort(403);
        $season->delete();
        return redirect('/users/' . $user->name);
    }

    public function restore()
    {
        if (!Gate::allows('restore-or-full-delete')) abort(403);
        $season = DoctorWhoSeason::withTrashed()->find(intval(request()['season']));
        $season->restore();
        return redirect('/users/' . Auth::user()->name);
    }

    public function forceDelete(DoctorWhoSeason $season)
    {
        if (!Gate::allows('update-or-delete', $season)) abort(403);
        $season->forceDelete();
        return redirect('/users/' . Auth::user()->name);
    }
}
