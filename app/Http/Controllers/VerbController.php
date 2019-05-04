<?php

namespace App\Http\Controllers;

use App\Verb;
use Illuminate\Http\Request;

class VerbController extends Controller
{

    private $rules = [
        'verb' => ['required', 'min:2', 'alpha'],
        'translation' => ['required', 'min:2', 'alpha']
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $verbs = Verb::all();
        return View('verbs.index', compact('verbs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('verbs.create');
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

        Verb::create($validated);
        
        return redirect('/verbs');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Verb  $verb
     * @return \Illuminate\Http\Response
     */
    public function show(Verb $verb)
    {
        return View('verbs.show', compact('verb'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Verb  $verb
     * @return \Illuminate\Http\Response
     */
    public function edit(Verb $verb)
    {
        return view('verbs.edit', compact('verb'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Verb  $verb
     * @return \Illuminate\Http\Response
     */
    public function update(Verb $verb)
    {
        $verb->update(request(['verb','translation']));

        return redirect('/verbs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Verb  $verb
     * @return \Illuminate\Http\Response
     */
    public function destroy(Verb $verb)
    {
        $verb->delete();

        return redirect('/verbs');
    }
}
