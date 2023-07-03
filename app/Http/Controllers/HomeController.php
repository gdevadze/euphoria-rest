<?php

namespace App\Http\Controllers;

use App\Models\CardLog;
use App\Models\Company;
use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $customersCount = Customer::count();
        $companiesCount = Company::count();
        $cardLogsToday = CardLog::whereDate('created_at',Carbon::today())->get();
        return view('dashboard',compact('customersCount','companiesCount','cardLogsToday'));
    }
}
