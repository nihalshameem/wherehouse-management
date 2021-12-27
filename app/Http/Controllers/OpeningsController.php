<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Opening;
use App\Models\Variety;
use App\Models\WHName;
use App\Models\WHSubName;
use DataTables;
use Illuminate\Http\Request;
use Session;

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
            $data = Opening::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $edit = '<a href=" ' . url('opening/edit/' . $row->id) . '" class="edit btn btn-sm btn-dark btn-sm"><i
        class="fa fa-pencil-square-o" aria-hidden="true"></i></a>';
                    $delete = '<a href="' . url('opening/delete/' . $row->id) . '" onclick="return confirm(\'Do you want to delete?\')"
    class="edit btn btn-sm btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i></a>';
                    $btn = '<div class="btn-group" role="group" aria-label="Basic example">' . $edit . $delete . '</div>';
                    return $btn;
                })
                ->addColumn('wh_name', function ($row) {
                    $wh = WHName::find($row->wh_id);
                    if ($wh) {
                        $data = $wh->name;
                    } else {
                        $data = '<i>Not found</i>';
                    }
                    return $data;
                })
                ->addColumn('lot_name', function ($row) {
                    $wh_sub = WHSubName::find($row->wh_sub_id);
                    if ($wh_sub) {
                        $data = $wh_sub->name;
                    } else {
                        $data = '<i>Not found</i>';
                    }
                    return $data;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        $locations = Location::all();
        $varieties = Variety::all();
        $wh_names = WHName::all();
        return view('opening.index', ['locations' => $locations, 'varieties' => $varieties, 'wh_names' => $wh_names]);
    }

    public function addPost(Request $request)
    {
        Opening::create([
            'wh_id' => $request->wh_id,
            'wh_sub_id' => $request->wh_sub_id,
            'quantity' => $request->quantity,
            'date' => $request->date,
        ]);
        Session::flash('success', 'Opening add successfully.');
        return back();
    }

    public function edit($id)
    {
        $opening = Opening::find($id);
        $wh_names = WHName::all();
        $wh_sub_names = WHSubName::all();
        return view('opening.edit', ['opening' => $opening, 'wh_names' => $wh_names, 'wh_sub_names' => $wh_sub_names]);
    }

    public function update(Request $request, $id)
    {
        $opening = Opening::find($id);
        $opening->wh_id = $request->wh_id;
        $opening->wh_sub_id = $request->wh_sub_id;
        $opening->quantity = $request->quantity;
        $opening->date = $request->date;
        $opening->save();
        Session::flash('success', 'Opening updated successfully.');
        return back();
    }

    public function delete($id)
    {
        $del = Opening::find($id);
        $del->delete();
        Session::flash('success', 'Deleted successfully.');
        return back();
    }
}
