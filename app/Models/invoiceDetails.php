<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invoiceDetails extends Model
{
    use HasFactory;
    protected $fillable = [
        'invoice_id',
        'invoice_number',
        'product',
        'section_id',
        'status',
        'value_status',
        'note',
        'user',
        'payment_date',
    ];
    public function section()
    {
        return $this->belongsTo('App\Models\Section');
    }
}
