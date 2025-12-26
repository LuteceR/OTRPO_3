<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\CharacterCard;


class UserController extends Controller
{
    public function index()
    {
        abort_if(!auth()->user()->is_admin, 403);

        $users = User::orderBy('id')->paginate(10);

        return view('users.index', compact('users'));
    }

    public function show(User $user)
    {
        $cards = CharacterCard::where('user_id', $user->id)->get();

        return view('users.show', compact('user', 'cards'));
    }
}
