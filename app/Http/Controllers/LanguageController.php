<?php

namespace ActivismeBE\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Class LanguageController
 *
 * @package ActivismeBE\Http\Controllers
 */
class LanguageController extends Controller
{
    /**
     * LanguageController constructor.
     */
    public function __construct()
    {
        $this->middleware('lang');
    }

    /**
     * Display the users language settings page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('language');
    }
}
