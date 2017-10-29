<?php

namespace ActivismeBE\Http\Controllers;

use ActivismeBE\Http\Requests\NewsLetterValidator;
use ActivismeBE\Mail\UnsubscribeMail;
use ActivismeBE\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

/**
 * Class NewsletterController
 *
 * @package ActivismeBE\Http\Controllers
 */
class NewsletterController extends Controller
{
    /**
     * NewsletterController constructor.
     *
     * @return void
     */
    public function __construct()
    {
        $except = ['store'];

        $this->middleware(['banned', 'role:Admin'])->except($except);
        $this->middleware('lang');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  NewsLetterValidator $input
     * @return \Illuminate\Http\Response
     */
    public function store(NewsLetterValidator $input)
    {
        $input->merge(['token' => str_random(25), 'platform' => 'crowdfund']);

        if (Newsletter::create($input->except('_token'))) {
            flash('Je bent nu ingeschreven op onze nieuwsbrief.')->info();
        }

        return redirect()->back(302);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string $token
     * @return \Illuminate\Http\Response
     */
    public function destroy($token)
    {
        $address = Newsletter::where('token', $token);

        if ($address->count() === 1) { // Adres is gevonden en de data kan verwijerd worden.
            $recipient = $address->first();

            if ($address->delete()) {
                Mail::to($recipient->email)->queue(new UnsubscribeMail());
            }
        }

        return redirect()->route('index');
    }
}
