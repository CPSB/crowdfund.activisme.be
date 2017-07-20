<?php

namespace App\Http\Controllers;

use App\Countries;
use App\Updates;
use App\Finance;
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
        $data['updates'] = Updates::all();
        $data['backers'] = Finance::where('type', 'inkomsten');

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
}
