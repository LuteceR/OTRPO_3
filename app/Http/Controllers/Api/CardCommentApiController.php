<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CardComment;
use App\Models\CharacterCard;
use App\Models\User;
use App\Http\Resources\CardCommentResource;

class CardCommentApiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        $comments = CardComment::with(['characterCard.user', 'user'])->get();

        return CardCommentResource::collection($comments);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'character_card_id' => 'required|exists:character_cards,id',
            'comment' => 'required|string',
        ]);

        $data['user_id'] = auth()->id();

        $comment = CardComment::create($data);

        return new CardCommentResource($comment);
    }

    public function update(Request $request, CardComment $cardComment)
    {
        $user = auth()->user();

        if ($user->id !== $cardComment->user_id) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $data = $request->validate([
            'comment' => 'required|string',
        ]);

        $cardComment->update($data);

        return new CardCommentResource($cardComment);
    }

    public function destroy(CardComment $cardComment)
    {
        $user = auth()->user();

        if ($user->id !== $cardComment->user_id) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $cardComment->delete();

        return response()->json(['message' => 'Комментарий удалён']);
    }
}
