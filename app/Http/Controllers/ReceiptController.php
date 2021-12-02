<?php

namespace App\Http\Controllers;

use App\Models\Receipt;
use App\Models\Variety;
use App\Models\WHName;

class ReceiptController extends Controller
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
        $receipts = Receipt::all();
        $wh_names = WHName::all();
        $varieties = Variety::all();
        return view('receipt.index', ['receipts' => $receipts, 'wh_names' => $wh_names, 'varieties' => $varieties]);
    }
}
