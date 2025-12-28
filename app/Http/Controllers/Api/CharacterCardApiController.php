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
        return response()->json(
            CharacterCard::with('user')->get()
        );
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'tiny_desc' => 'nullable|string',
            'long_desc' => 'nullable|string',
        ]);

        $data['user_id'] = auth()->id();

        return response()->json(
            CharacterCard::create($data),
            201
        );
    }

    public function update(Request $request, CharacterCard $card)
    {
        $card->update($request->all());

        return response()->json($card);
    }
}
