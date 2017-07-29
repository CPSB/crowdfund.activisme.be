<?php

namespace ActivismeBE\Http\Controllers;

use Share;
use ActivismeBE\Countries;
use ActivismeBE\Updates;
use ActivismeBE\Finance;
use Illuminate\Http\Request;

/**
 * Class HomeController
 *
 * If you building a project don't edit these file. Because this file will be overwritten.
 * When we are updated our project skeleton. And if you found an issue in this controller
 * User the following links.
 *
 * @url https://github.com/CPSB/Skeleton-project
 * @url https://github.com/CPSB/Skeleton-project/issues
 */
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $routes = ['backend'];

        $this->middleware('banned')->only($routes);
        $this->middleware('role:Admin')->only($routes);
        $this->middleware('lang');
    }

    /**
     * The application front-page.
     *
     * @return void
     */
    public function index()
    {
        $data['updates']  = Updates::all();
        $data['backers']  = Finance::where('type', 'inkomsten');
        $data['percent']  = ($data['backers']->sum('amount') / config('platform.needed-money')) * 100;
        $data['daysLeft'] = $this->daysToGo();
        $data['share']    = Share::load(url('/'), 'Activisme_BE crowdfund')
            ->services('facebook', 'twitter');

        return view('welcome', $data);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function backend()
    {
        $data['updates'] = Updates::with('author')->paginate(15);
        return view('home', $data);
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
