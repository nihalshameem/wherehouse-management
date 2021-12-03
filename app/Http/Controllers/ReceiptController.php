<?php

namespace App\Http\Controllers;

use App\Models\Receipt;
use App\Models\Variety;
use App\Models\Location;
use Session;
use Illuminate\Http\Request;

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
        $locations = Location::all();
        $varieties = Variety::all();
        return view('receipt.index', ['receipts' => $receipts, 'locations' => $locations, 'varieties' => $varieties]);
    }

    public function addPost(Request $request)
    {
        Receipt::create([
            'wb_slip_no'=>$request->wb_slip_no,
            'date'=>$request->date,
            'wh_name'=>$request->wh_name,
            'lot_number'=>$request->lot_number,
        'variety'=>$request->variety,
        'truck_no'=>$request->truck_no,
        'bags'=>$request->bags,
        'weight'=>$request->weight,
        ]);
        Session::flash('success','Receipt add successfully.');
        return back();
    }
}
