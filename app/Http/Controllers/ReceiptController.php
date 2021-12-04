<?php

namespace App\Http\Controllers;

use App\Models\Receipt;
use App\Models\WHName;
use App\Models\Variety;
use App\Models\Location;
use App\Models\WHSubName;
use Session;
use Illuminate\Http\Request;
use DataTables;

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

    public function index(Request $request)
    {
        if ($request->ajax()) {
        $data = Receipt::latest()->get();
        return Datatables::of($data)
        ->addIndexColumn()
        ->addColumn('action', function($row){
            $edit = '<a href=" '.url('receipt/edit/'.$row->id).'" class="edit btn btn-sm btn-dark btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>';
            $delete = '<a href="'.url('receipt/delete/'.$row->id).'" onclick="return confirm(\'Do you want to delete?\')" class="edit btn btn-sm btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i></a>';
            $btn = '<div class="btn-group" role="group" aria-label="Basic example">'.$edit.$delete.'</div>';
            return $btn;
        })
        ->editColumn('location_id', function($row){
        $result = Location::find($row->location_id)->name;
        return $result;
        })
        ->editColumn('wh_name', function($row){
        $result = WHName::find($row->wh_name)->name;
        return $result;
        })
        ->editColumn('wh_name', function($row){
        $result = WHSubName::find($row->lot_number)->name;
        return $result;
        })
        ->editColumn('wh_name', function($row){
        $result = Variety::find($row->variety)->name;
        return $result;
        })
        ->rawColumns(['action'])
        ->make(true);
        }
        $locations = Location::all();
        $varieties = Variety::all();
        return view('receipt.index', [ 'locations' => $locations, 'varieties' => $varieties]);
    }

    public function addPost(Request $request)
    {
        Receipt::create([
            'wb_slip_no'=>$request->wb_slip_no,
            'date'=>$request->date,
            'location_id'=>$request->location_id,
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

    public function edit($id)
    {
        $receipt = Receipt::find($id);
        $locations = Location::all();
        $wh_names = WHName::all();
        $lot_numbers = WHSubName::all();
        $varieties = Variety::all();
        return view('receipt.edit',['receipt'=>$receipt,'locations' => $locations, 'wh_names' => $wh_names,'lot_numbers'
        => $lot_numbers, 'varieties' => $varieties]);
    }

    public function update(Request $request,$id)
    {
        $receipt = Receipt::find($id);
        $receipt->wb_slip_no=$request->wb_slip_no;
        $receipt->date=$request->date;
        $receipt->location_id=$request->location_id;
        $receipt->wh_name=$request->wh_name;
        $receipt->lot_number=$request->lot_number;
        $receipt->variety=$request->variety;
        $receipt->truck_no=$request->truck_no;
        $receipt->bags=$request->bags;
        $receipt->weight=$request->weight;
        $receipt->save();
        Session::flash('success','Receipt updated successfully.');
        return back();
    }

    public function delete($id)
    {
    $del = Receipt::find($id);
    $del->delete();
    Session::flash('success','Deleted successfully.');
    return back();
    }
}
