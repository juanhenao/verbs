<?php

namespace App\Http\Controllers;

use App\Word;
use App\Type;
use Illuminate\Http\Request;

class WordController extends Controller
{

    private $rules = [
        'word' => ['required', 'min:2', 'alpha'],
        'translation' => ['required', 'min:2', 'alpha'],
        'type_id' => ['required', 'integer', 'exists:types,id']
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
        $words = Word::all();
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
        return View('words.create', compact('types'));
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

        $validated['user_id'] = auth()->id();
        Word::create($validated);

        return redirect('/words');
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
