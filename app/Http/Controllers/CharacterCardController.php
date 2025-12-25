<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\CharacterCard;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Events\CardDeleting;

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

        $login = session('login');
        $isAdmin = session('is_admin');


        $cards = CharacterCard::whereNull('deleted_at')
            ->orderBy('id')
            ->paginate(10);

        return view('character-cards.index', compact('cards', 'login', 'isAdmin'));
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
            'long_desc'  => 'nullable|string'
        ]);

        $data['user_id'] = (int) auth()->id();

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

        event(new CardDeleting($characterCard));

        // // проверка через Gate
        // if (Gate::denies('delete-card', $characterCard)) {
        //     return response()->json([
        //         'success' => false,
        //         'message' => 'Нет прав на удаление'
        //     ], 403);
        // }

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

    public function forceDelete($id)
    {
        $card = CharacterCard::onlyTrashed()->findOrFail($id);
        $card->forceDelete();

        return redirect()
            ->route('character-cards.deleted')
            ->with('success', 'Карточка удалена навсегда');
    }

    public function deleted() 
    {
        $cards = CharacterCard::onlyTrashed()->get();

        return view('character-cards.deleted', compact('cards'));
    }


    public function login()
    {
        if (auth()->check()) {
            return redirect()->route('character-cards.index');
        }

        return view('login');
    }

    public function tryAuth(Request $request) 
    {

        $request->validate([
                'login'    => 'required|string',
                'password' => 'required|string',
        ]);

        $loginInput = $request->input('login');
        $password = $request->input('password');
        $remember = $request->filled('remember');


        if (strpos($loginInput, '@') !== false && strpos($loginInput, '.') !== false) {
            $credentials = [
                'email' => $loginInput,
                'password' => $password,
            ];
        } else {
            $credentials = [
                'name' => $loginInput,
                'password' => $password,
            ];
        }

        $remember = $request->filled('remember');

        $request->session()->put('login', $loginInput);
        
        // Попытка авторизации
        if (Auth::attempt($credentials, $remember)) {
            $request->session()->put('is_admin', Auth::user()->is_admin);
            $request->session()->regenerate();
            return redirect()->route('character-cards.index'); // редирект после успешного логина
        }

        // Если данные неверные
        return back()->withErrors([
            'login' => 'Неверный email или пароль',
        ])->onlyInput('login');
    }

    public function registr() {
        return view('character-cards.registr');
    }

    public function tryRegistr(Request $request) 
    {
        $request->validate([
                'name'    => 'required|string|unique:users,name',
                'email' => 'required|string|email|unique:users,email',
                'password' => 'required|string',
        ]);

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password'))
        ]);

        $remember = $request->filled('remember');

        Auth::login($user, $remember);

        return redirect()->route('character-cards.index');
    }
}