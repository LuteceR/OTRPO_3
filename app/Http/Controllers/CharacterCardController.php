<?php

namespace App\Http\Controllers;

use App\Models\CharacterCard;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CharacterCardController extends Controller
{
    // /**
    //  * Gettin' blade.php with all cards and their modules
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function GetCardsnModules() 
    // {
    //     $cards = CharacterCard::all();

    //     return view('characterCard', compact('cards'));
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $cards = CharacterCard::all();

        
        // dd(CharacterCard::all());
        // $cards = CharacterCard::all();
        // dd($cards); 

        $cards = CharacterCard::query()
            ->orderBy('id')
            ->paginate(10);

        return view('character-cards.index', compact('cards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('character-cards.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'       => 'required|string|max:255',
            'img_url'    => 'nullable|string',
            'tiny_desc'  => 'nullable|string|max:255',
            'long_desc'  => 'nullable|string',
        ]);

        $card = CharacterCard::create($data);

        return redirect()
            ->route('character-cards.index')
            ->with('success', 'Character card created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CharacterCard  $characterCard
     * @return \Illuminate\Http\Response
     */
    public function show(CharacterCard $characterCard)
    {
        $card = $characterCard;
        $cards = CharacterCard::all();

        return view('character-cards.show', compact('card', 'cards'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CharacterCard  $characterCard
     * @return \Illuminate\Http\Response
     */
    public function edit(CharacterCard $characterCard)
    {
        return view('character-cards.edit', compact('characterCard'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CharacterCard  $characterCard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CharacterCard $characterCard)
    {
        $data = $request->validate([
            'name'       => 'required|string|max:255',
            'img_url'    => 'nullable|string',
            'tiny_desc'  => 'nullable|string|max:255',
            'long_desc'  => 'nullable|string',
        ]);

        $characterCard->update($data);

        return redirect()
            ->route('character-cards.index')
            ->with('success', 'Character card updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CharacterCard  $characterCard
     * @return \Illuminate\Http\Response
     */
    public function destroy(CharacterCard $characterCard)
    {
        $characterCard->delete();

        return redirect()
            ->route('character-cards.index')
            ->with('success', 'Карта удалена');
    }

    public function restore($id) 
    {
        $card = CharacterCard::onlyTrashed()->findOrFail($id);
        $card->restore();

        return redirect()
            ->route('character-cards.index')
            ->with('success', 'Карта восстановлена');
    }

    public function deleted() 
    {
        $cards = CharacterCard::onlyTrashed()->get();

        return view('character-cards.deleted', compact('cards'));
    }
}
