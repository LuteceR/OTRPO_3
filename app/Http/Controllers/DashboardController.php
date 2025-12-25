<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $not_friends = User::where('id', '!=', Auth::user()->id);
        if (Auth::user()->friends->count()) {
            $not_friends->whereNotIn('id', Auth::user()->friends->modelKeys());
        }
        $not_friends = $not_friends->get();

        return view('dashboard.index', compact('not_friends'));
    }

    public function store($id)
    {
        $user = User::find($id);
        Auth::user()->addFriend($user);
        return redirect()->back();
    }

    public function destroy($id)
    {
        $user = User::find($id);
        Auth::user()->removeFriend($user);
        return redirect()->back();
    }
}
