<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CharacterCard;

class CharacterCardApiController extends Controller
{
    public function __construct()
    {
        // 🔐 защита всех методов
        $this->middleware('auth:sanctum');
    }

    public function index()
    {

        return CharacterCard::with('user')->get();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'tiny_desc' => 'string|required',
            'long_desc' => 'string|required',
            'img_url' => 'string|required',
        ]);

        $data['user_id'] = auth()->id();

        return response()->json(
            CharacterCard::create($data),
            201
        );
    }

    public function update(Request $request, CharacterCard $card)
    {
        $data = $request->validate([
            'name' => 'required',
            'tiny_desc' => 'string|required',
            'long_desc' => 'string|required',
            'img_url' => 'string|required',
        ]);

        $card->update($data->all());
        return $card;
    }
}
