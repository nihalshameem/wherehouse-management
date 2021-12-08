<?php

namespace App\Http\Controllers;

use App\Models\WHSubName;
use App\Models\WHName;
use App\Models\PurchaseOrder;

class CommonController extends Controller
{
    public function lot_numbers($id)
    {
        $lot_numbers = WHSubName::where('w_h_id', $id)->get();
        return json_encode($lot_numbers);
    }
    public function wh_names($id)
    {
        $wh_names = WHName::where('location_id', $id)->get();
        return json_encode($wh_names);
    }
    public function po_details($id)
    {
    $po_details = PurchaseOrder::find($id);
    return json_encode($po_details);
    }
}
