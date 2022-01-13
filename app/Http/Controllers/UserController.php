<?php

namespace App\Http\Controllers;

use App\Models\DoctorWhoSeason;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('user.index', compact('users'));
    }

    public function show(User $user)
    {
        $seasons = DoctorWhoSeason::where('user_id', '=', $user->id)->orderBy('season')->get();
        $deleted_seasons = DoctorWhoSeason::onlyTrashed()->where('user_id', '=', $user->id)->orderBy('season')->get();
        return view('user.show', compact('user', 'seasons', 'deleted_seasons'));
    }
}
