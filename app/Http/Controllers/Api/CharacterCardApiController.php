<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CharacterCard;

class CharacterCardApiController extends Controller
{
    public function index()
    {
        return CharacterCard::with('user')->get();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'tiny_desc' => 'nullable',
            'long_desc' => 'nullable',
        ]);

        $data['user_id'] = auth()->id();

        return CharacterCard::create($data);
    }

    public function update(Request $request, CharacterCard $card)
    {
        $card->update($request->all());
        return $card;
    }
}
