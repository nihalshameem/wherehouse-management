<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    use HasFactory;
    protected $fillable = ['order_number','order_date','supplier','variety','quantity','loading_from','loading_to','mode','expected_loading','expected_arrival','loading_last_date'];
}
