<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CharacterCard;
use App\Http\Resources\CardCommentResource;

class CharacterCardApiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        $user = auth()->user();
        $friendIds = $user->friends()->pluck('id')->toArray();

        $cards = CharacterCard::with(['user', 'card_comments'])->get();

        $cards->transform(function($card) use ($friendIds) {
            $card->card_comments = CardCommentResource::collection($card->card_comments);
            $card->is_friend = in_array($card->user_id, $friendIds);
            return $card;
        });

        return response()->json($cards);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'tiny_desc' => 'required|string',
            'long_desc' => 'required|string',
            'img_url' => 'required|string',
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
            'name' => 'required|string',
            'tiny_desc' => 'required|string',
            'long_desc' => 'required|string',
            'img_url' => 'required|string',
        ]);

        $card->update($data);
        return response()->json($card);
    }
}
