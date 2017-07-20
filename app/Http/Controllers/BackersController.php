<?php

namespace App\Http\Controllers;

use App\Finance;
use App\Http\Requests\Backersvalidator;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class BackersController extends Controller
{
    public function __construct()
    {
        $this->middleware('lang');
        $this->middleware('role:Admin');
        $this->middleware('banned');
    }

    public function index()
    {
        $data['backers'] = Finance::paginate(25);
        return view('backers.index', $data);
    }

    public function create()
    {
        return view('backers.create');
    }

    public function store(Backersvalidator $input)
    {

    }

    /**
     * Delete a transaction in the system.
     *
     *
     */
    public function destroy($id)
    {
        try {
            $transaction = Finance::findOrFail($id);

            if ($transaction->delete()) {
                flash('De transactie is verwijderd')->success();
            }

            return redirect()->route('backers');
        } catch (ModelNotFoundException $exception) {
            flash('Wij konden de transactie niet vinden.')->error();
            return redirect()->route('backers');
        }
    }
}
