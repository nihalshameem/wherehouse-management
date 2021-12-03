<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shifting extends Model
{
    use HasFactory;
    protected $fillable = ['wb_slip_no', 'date', 'wh_name','lot_number','variety','truck_no','bags','weight'];
}