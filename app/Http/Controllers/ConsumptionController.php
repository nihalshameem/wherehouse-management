<?php

namespace App\Http\Controllers;

use App\Models\Consumption;
use App\Models\WHName;
use App\Models\Variety;
use App\Models\Location;
use App\Models\WHSubName;
use App\Models\PurchaseOrder;
use App\Models\Receipt;
use Session;
use Illuminate\Http\Request;
use DataTables;

class ConsumptionController extends Controller
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
        $data = Consumption::latest()->get();
        return Datatables::of($data)
        ->addIndexColumn()
        ->addColumn('action', function($row){
            $edit = '<a href=" '.url('consumption/edit/'.$row->id).'" class="edit btn btn-sm btn-dark btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>';
            $delete = '<a href="'.url('consumption/delete/'.$row->id).'" onclick="return confirm(\'Do you want to delete?\')" class="edit btn btn-sm btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i></a>';
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
        $receipts = Receipt::all()->groupBy('variety');
        $varieties = [];
        $op_ids = [];
        foreach ($receipts as $key => $item) {
            $variety = Variety::find($item[0]->variety);
            $op_ids[] = $item[0]->po_id;
            $varieties[] = $variety;
        }
        return view('consumption.index', [ 'locations' => $locations, 'varieties' => $varieties,'op_ids'=>$op_ids]);
    }

    public function addPost(Request $request)
    {
        // return $request->location_id;
        Consumption::create([
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
        Session::flash('success','Consumption add successfully.');
        return back();
    }

    public function edit($id)
    {
        $consumption = Consumption::find($id);
        $locations = Location::all();
        $wh_names = WHName::all();
        $lot_numbers = WHSubName::all();
        $varieties = Variety::all();
        return view('consumption.edit',['consumption'=>$consumption,'locations' => $locations, 'wh_names' => $wh_names,'lot_numbers'
        => $lot_numbers, 'varieties' => $varieties]);
    }

    public function update(Request $request,$id)
    {
        $consumption = Consumption::find($id);
        $consumption->wb_slip_no=$request->wb_slip_no;
        $consumption->date=$request->date;
        $consumption->location_id=$request->location_id;
        $consumption->wh_name=$request->wh_name;
        $consumption->lot_number=$request->lot_number;
        $consumption->variety=$request->variety;
        $consumption->truck_no=$request->truck_no;
        $consumption->bags=$request->bags;
        $consumption->weight=$request->weight;
        $consumption->save();
        Session::flash('success','Consumption updated successfully.');
        return back();
    }

    public function delete($id)
    {
    $del = Consumption::find($id);
    $del->delete();
    Session::flash('success','Deleted successfully.');
    return back();
    }
}
