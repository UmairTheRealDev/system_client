<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'brand_id',
        'device_model_id',
        'day',
        'signboard',
        'showcase',
        'ldu_table',
        'promoter',
        'cabinet',
        'promotion_stand',
        'ldu_qty',
        'foc_soh',
        'date_till',
        'date_from',
        'sell_through',
        'sell_out',
        'stock_on_hand',
        'feedback',
    ];


    public function customer() {
        return $this->belongsTo(Customer::class);
    }

    public function brand() {
        return $this->belongsTo(Brand::class);
    }

    public function device_model() {
        return $this->belongsTo(DeviceModel::class);
    }
}
