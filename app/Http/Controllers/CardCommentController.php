<?php

namespace App\Http\Controllers;

use App\Models\CharacterCard;
use App\Models\CardComment;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CardCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($card_id)
    {
        $card = CharacterCard::findOrFail($card_id);
        $comments = $card->card_comments;

        return view('comments.index', compact('card', 'comments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($card_id)
    {
        $card = CharacterCard::findOrFail($card_id);
        return view('comments.create', compact('card'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|string|integer',
            'character_card_id' => 'required|integer',
            'comment' => 'required|string|max:1000',
        ]);

        CardComment::create($validated);
        $card_id = $validated['character_card_id'];
        return redirect()->route('card-comments.index', $card_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CharacterCard  $characterCard
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CharacterCard  $characterCard
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CharacterCard  $characterCard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CharacterCard  $characterCard
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        
    }

    public function restore() 
    {
        
    }

    public function deleted() 
    {
        
    }
}
