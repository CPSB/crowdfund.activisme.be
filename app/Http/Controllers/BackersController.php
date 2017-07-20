<?php

namespace App\Http\Controllers;

use App\Finance;
use App\Http\Requests\Backersvalidator;
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

    public function destroy($id)
    {

    }
}
