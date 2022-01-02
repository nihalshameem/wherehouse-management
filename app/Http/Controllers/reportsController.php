<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\PurchaseOrder;
use App\Models\Receipt;
use App\Models\Variety;
use App\Models\WHName;
use App\Models\WHSubName;
use DataTables;
use DB;
use Illuminate\Http\Request;
use Session;

class ReportsController extends Controller
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

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $receipts = DB::table('receipts')
                ->select(array(DB::Raw('sum(receipts.weight) as total'), DB::Raw('DATE(receipts.date) day')))
                ->groupBy('day')
                ->orderBy('receipts.created_at')
                ->get();

            $consumptions = DB::table('consumptions')
                ->select(array(DB::Raw('sum(consumptions.weight) as total'), DB::Raw('DATE(consumptions.date) day')))
                ->groupBy('day')
                ->orderBy('consumptions.created_at')
                ->get();
            $shiftings = DB::table('shiftings')
                ->select(array(DB::Raw('sum(shiftings.weight) as total'), DB::Raw('DATE(shiftings.date) day')))
                ->groupBy('day')
                ->orderBy('shiftings.created_at')
                ->get();
            $receipt_days = $receipts->pluck('day')->toArray();
            $consumption_days = $consumptions->pluck('day')->toArray();
            $shifting_days = $shiftings->pluck('day')->toArray();
            $days = array_unique(array_merge($receipt_days, $consumption_days, $shifting_days), SORT_REGULAR);
            $data = collect([]);
            foreach ($days as $key => $item) {
                if (!$data->contains('date', $item)) {
                    if ($receipts->contains('day', $item)) {
                        $r = $receipts->firstWhere('day', $item)->total;
                    } else {
                        $r = 0;
                    }
                    if ($consumptions->contains('day', $item)) {
                        $c = $consumptions->firstWhere('day', $item)->total;
                    } else {
                        $c = 0;
                    }
                    if ($shiftings->contains('day', $item)) {
                        $s = $shiftings->firstWhere('day', $item)->total;
                    } else {
                        $s = 0;
                    }
                    $data->push([
                        'date' => $item,
                        'receipt' => $r,
                        'consumption' => $c,
                        'shifting' => $s,
                    ]);
                }
            }

            return Datatables::of($data)
                ->addIndexColumn()
                ->make(true);
        }
        return view('report.index');
    }

    public function addForm(Request $request)
    {
        $pos = PurchaseOrder::where('balance_qty', '!=', 0)->get();
        $locations = Location::all();
        $varieties = Variety::all();
        return view('receipt.add', ['locations' => $locations, 'varieties' => $varieties, 'pos' => $pos]);
    }

    public function addPost(Request $request)
    {
        Receipt::create([
            'wb_slip_no' => $request->wb_slip_no,
            'po_id' => $request->po_id,
            'date' => $request->date,
            'location_id' => $request->location_id,
            'wh_name' => $request->wh_name,
            'lot_number' => $request->lot_number,
            'variety' => $request->variety,
            'truck_no' => $request->truck_no,
            'bags' => $request->bags,
            'weight' => $request->weight,
        ]);
        $po = PurchaseOrder::find($request->po_id);
        $po->received_qty = $po->received_qty + $request->weight;
        $po->balance_qty = $po->balance_qty - $request->weight;
        $po->save();
        Session::flash('success', 'Receipt add successfully.');
        return back();
    }

    public function edit($id)
    {
        $receipt = Receipt::find($id);
        $locations = Location::all();
        $wh_names = WHName::all();
        $lot_numbers = WHSubName::all();
        $varieties = Variety::all();
        $pos = PurchaseOrder::all();
        $selected_po = PurchaseOrder::find($receipt->po_id);
        return view('receipt.edit', ['receipt' => $receipt, 'locations' => $locations, 'wh_names' => $wh_names, 'lot_numbers' => $lot_numbers, 'varieties' => $varieties, 'pos' => $pos, 'selected_po' => $selected_po]);
    }

    public function update(Request $request, $id)
    {
        $receipt = Receipt::find($id);
        $receipt->wb_slip_no = $request->wb_slip_no;
        $receipt->po_id = $request->po_id;
        $receipt->date = $request->date;
        $receipt->location_id = $request->location_id;
        $receipt->wh_name = $request->wh_name;
        $receipt->lot_number = $request->lot_number;
        $receipt->variety = $request->variety;
        $receipt->truck_no = $request->truck_no;
        $receipt->bags = $request->bags;
        $receipt->weight = $request->weight;
        $receipt->save();
        $po = PurchaseOrder::find($request->po_id);
        $po->received_qty = $po->received_qty + $request->weight;
        $po->balance_qty = $po->balance_qty - $request->weight;
        $po->save();
        Session::flash('success', 'Receipt updated successfully.');
        return back();
    }

    public function delete($id)
    {
        $del = Receipt::find($id);
        $del->delete();
        Session::flash('success', 'Deleted successfully.');
        return back();
    }
}