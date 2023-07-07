<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CardLog;
use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function getCustomers()
    {
        return Customer::where('end_date','>=',Carbon::today())->get(['card_number', 'end_date','quantity']);
    }

    public function insertLogs(Request $request)
    {
        $inp = $request->all();
        foreach($inp as $data){
//            return $data['card_number'];
            $date = $data['enter_date'];
            $data['enter_date'] = Carbon::parse($date)->tz('Asia/Tbilisi');
            $customer = Customer::where('card_number',$data['card_number'])->latest()->first();
            CardLog::create([
                'customer_id' => $customer->id,
                'card_number' => $data['card_number'],
                'enter_date' => $data['enter_date']
            ]); 
        }
    }
}
