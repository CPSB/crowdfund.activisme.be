<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateValidator;
use App\Updates;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

/**
 * Class UpdatesController
 *
 * @package App\Http\Controllers
 */
class UpdatesController extends Controller
{
    /**
     * UpdatesController constructor.
     */
    public function __construct()
    {
        $except = ['show'];

        $this->middleware('banned')->except($except);
        $this->middleware('role:Admin')->except($except);
        $this->middleware('lang');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('updates.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @todo: Implementation validation on form.
     *
     * @param UpdateValidator $input
     * @return \Illuminate\Http\Response
     */
    public function store(UpdateValidator $input)
    {
        $input->merge(['author_id' => auth()->user()->id]);

        if (Updates::create($input->except(['_token']))) {
            flash('De update is opgeslagen in het systeem.')->success();
        }

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $data['update'] = Updates::findOrFail($id);
            return view('updates.show');
        } catch (ModelNotFoundException $exception) {
            return back(302);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $data['update'] = Updates::findOrFail($id);
            return view('updates.edit', $data);
        } catch (ModelNotFoundException $exception) {
            flash('De update die u wilt wijzigen kan niet worden gevonden.')->error();
            return redirect()->route('home');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @todo implementation validation on form.
     *
     * @param UpdateValidator $input
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateValidator $input, $id)
    {
        try {
            $data = Updates::findOrFail($id);

            if ($data->update($input->except(['_token']))) {
                flash('De update is aangepast.');
            }

            return back(302);
        } catch (ModelNotFoundException $exception) {
            flash('De update die u wilt wijzigen is niet gevonden.')->error();
            return back(302);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $update = Updates::findOrFail($id);

            if ($update->delete()) { // Update has been destroyed.
                flash('De update is verwijderd.')->success();
            }

            return redirect()->route('home');
        } catch (ModelNotFoundException $exception) {
            flash('Wij konden de update niet vinden die u probeerdt te verwijderen')->error();
            return redirect()->route('home');
        }
    }
}