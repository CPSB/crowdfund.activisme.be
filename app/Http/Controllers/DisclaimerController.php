<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Class DisclaimerController
 *
 * If you building a project don't edit these file. Because this file will be overwritten.
 * When we are updated our project skeleton. And if you found an issue in this controller
 * User the following links.
 *
 * @url https://github.com/CPSB/Skeleton-project
 * @url https://github.com/CPSB/Skeleton-project/issues
 */
class DisclaimerController extends Controller
{
    /**
     * Disclaimer constrcutor
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('lang');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['backers']  = Finance::where('type', 'inkomsten');
        $data['daysLeft'] = $this->daysToGo();

        return view('disclaimer.index', $data);
    }

    /**
     * get the difference in days. 
     *
     * @return int
     */
    protected function daysToGo() : int
    {
        $start = date_create(date("Y-m-d"));
        $end   = date_create(config('platform.eind_datum'));
        $diff  = date_diff($start, $end);

        return $diff->format("%a");
    }
}
