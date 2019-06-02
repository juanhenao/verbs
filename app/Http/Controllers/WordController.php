<?php

namespace App\Http\Controllers;

use App\Word;
use App\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Collection;
use Illuminate\Support\Facades\DB;

class WordController extends Controller
{

    private $rules = [
        'word' => ['required', 'min:2', 'alpha'],
        'translation' => ['required', 'min:2', 'alpha'],
        'type_id' => ['required', 'integer', 'exists:types,id'],
        'collection_id' => ['required'],
        'example' => ['string', 'nullable']
    ];

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$words = Word::where('collection_id', Auth::id())->get();
        $words = DB::table('words')
            ->join('collections', 'words.collection_id', 'collections.id')
            ->join('users', 'collections.user_id', 'users.id')
            ->select('words.*')
            ->where('users.id', Auth::id())
            ->get();
        return View('words.index', compact('words'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();
        $collections = Collection::where('user_id', Auth::id())->get();
        return View('words.create', compact('types', 'collections'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate($this->rules);
        Word::create($validated);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Word  $word
     * @return \Illuminate\Http\Response
     */
    public function show(Word $word)
    {
        $this->authorize('update', $word);
        return View('words.show', compact('word'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Word  $word
     * @return \Illuminate\Http\Response
     */
    public function edit(Word $word)
    {
        $this->authorize('update', $word);
        $types = Type::all();
        return view('words.edit', compact('word', 'types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $word = Word::find($id);
        $this->authorize('update', $word);
        $validated = $request->validate($this->rules);
        $word->update($request->all());

        return redirect('/words');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Word  $word
     * @return \Illuminate\Http\Response
     */
    public function destroy(Word $word)
    {
        $word->delete();

        return redirect('/words');
    }
}
