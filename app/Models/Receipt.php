<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    use HasFactory;
    protected $fillable = ['wb_slip_no','location_id', 'date',
    'wh_name','lot_number','variety','truck_no','bags','weight'];
}
