<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\PurchaseOrder;
use App\Models\Variety;
use DataTables;
use Illuminate\Http\Request;

class OpeningsController extends Controller
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
                ->addColumn('action', function ($row) {
                    $edit = '<a href=" ' . url('purchase-order/edit/' . $row->id) . '" class="edit btn btn-sm btn-dark btn-sm"><i
        class="fa fa-pencil-square-o" aria-hidden="true"></i></a>';
                    $delete = '<a href="' . url('purchase-order/delete/' . $row->id) . '" onclick="return confirm(\'Do you want to delete?\')"
    class="edit btn btn-sm btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i></a>';
                    $btn = '<div class="btn-group" role="group" aria-label="Basic example">' . $edit . $delete . '</div>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        $locations = Location::all();
        $varieties = Variety::all();
        return view('opening.index', ['locations' => $locations, 'varieties' => $varieties]);
    }
}
