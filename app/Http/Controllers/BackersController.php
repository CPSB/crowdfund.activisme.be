<?php

namespace App\Http\Controllers;

use App\Finance;
use App\Http\Requests\Backersvalidator;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

/**
 * BackersController
 *
 * @package App\Http\Controllers
 */
class BackersController extends Controller
{
    /**
     * BackersController Constructor.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('lang');
        $this->middleware('role:Admin');
        $this->middleware('banned');
    }

    /**
     * Transaction index for the system.
     *
     * @param  App|Finance $finance
     * @return \Illuminate\Http\Response
     */
    public function index(Finance $finance)
    {
        $data['allTransactions'] = $finance->paginate(25);
        $data['vredesCaravan']   = $finance->where('finance_plan', 'vredescaravan')->paginate(25);
        $data['activisme']       = $finance->where('finance_plan', 'activisme')->paginate(25);

        $data['income']  = $finance->where('type', 'inkomsten')->sum('amount');
        $data['outcome'] = $finance->where('type', 'uitgaven')->sum('amount');

        return view('backers.index', $data);
    }


    /**
     * Create view for a new transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backers.create');
    }

    public function showTransaction($id)
    {
        try {
            $data['transaction'] = Finance::findOrFail($id); 
            return view('backers.show', $data);
        } catch (ModelNotFoundException $exception) {
            flash('Wij konden de transactie niet vinden in het systeem.')->error();
            return redirect()->route('backers'); 
        }
    }

    /**
     * Store a transaction inthe system.
     *
     * @param  Backersvalidator $input
     * @param  \App\Finance      $finance
     * @return \Illuminate\Http\Response
     */
    public function store(Backersvalidator $input, Finance $finance)
    {
        $input->merge([
            'creator_id' => auth()->user()->id, 
            'amount'     => str_replace(',', '.', $input->amount)
        ]);

        if ($finance->create($input->except(['_token']))) { // Transaction has been stored.
            flash('De transactie is opgeslagen in het systeem.');
        }

        return redirect()->route('backers');
    }

    /**
     * Delete a transaction in the system.
     *
     * @param  integer $id The id for the transaction in the database.
     * @return \Illuminate\Http\Response
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
