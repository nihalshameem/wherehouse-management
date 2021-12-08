<?php

namespace App\Http\Controllers;

use App\Models\PurchaseOrder;
use App\Models\WHName;
use App\Models\Variety;
use App\Models\Location;
use App\Models\WHSubName;
use Session;
use Illuminate\Http\Request;
use DataTables;

class PurchaseOrderController extends Controller
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
        $data = PurchaseOrder::latest()->get();
        return Datatables::of($data)
        ->addIndexColumn()
        ->addColumn('action', function($row){
            $edit = '<a href=" '.url('purchase-order/edit/'.$row->id).'" class="edit btn btn-sm btn-dark btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>';
            $delete = '<a href="'.url('purchase-order/delete/'.$row->id).'" onclick="return confirm(\'Do you want to delete?\')" class="edit btn btn-sm btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i></a>';
            $btn = '<div class="btn-group" role="group" aria-label="Basic example">'.$edit.$delete.'</div>';
            return $btn;
        })
        ->rawColumns(['action'])
        ->make(true);
        }
        $locations = Location::all();
        $varieties = Variety::all();
        return view('purchaseOrder.index', [ 'locations' => $locations, 'varieties' => $varieties]);
    }

    public function addPost(Request $request)
    {
        PurchaseOrder::create([
            'order_number'=>$request->order_number,
            'order_date'=>$request->order_date,
            'supplier'=>$request->supplier,
            'variety'=>$request->variety,
            'quantity'=>$request->quantity,
            'balance_qty'=>$request->quantity,
            'loading_from'=>$request->loading_from,
            'loading_to'=>$request->loading_to,
            'mode'=>$request->mode,
            'expected_loading'=>$request->expected_loading,
            'expected_arrival'=>$request->expected_arrival,
            'loading_last_date'=>$request->loading_last_date,
        ]);
        Session::flash('success','Purchase Order add successfully.');
        return back();
    }

    public function edit($id)
    {
        $purchaseOrder = PurchaseOrder::find($id);
        $locations = Location::all();
        $varieties = Variety::all();
        return view('purchaseOrder.edit',['purchaseOrder'=>$purchaseOrder,'locations' => $locations,'varieties' => $varieties]);
    }

    public function update(Request $request,$id)
    {
        $purchaseOrder = PurchaseOrder::find($id);
        $purchaseOrder->order_number=$request->order_number;
        $purchaseOrder->order_date=$request->order_date;
        $purchaseOrder->supplier=$request->supplier;
        $purchaseOrder->variety=$request->variety;
        $purchaseOrder->quantity=$request->quantity;
        $purchaseOrder->loading_from=$request->loading_from;
        $purchaseOrder->loading_to=$request->loading_to;
        $purchaseOrder->mode=$request->mode;
        $purchaseOrder->expected_loading=$request->expected_loading;
        $purchaseOrder->expected_arrival=$request->expected_arrival;
        $purchaseOrder->loading_last_date=$request->loading_last_date;
        $purchaseOrder->save();
        Session::flash('success','Purchase Order updated successfully.');
        return back();
    }

    public function delete($id)
    {
    $del = PurchaseOrder::find($id);
    $del->delete();
    Session::flash('success','Deleted successfully.');
    return back();
    }
}
