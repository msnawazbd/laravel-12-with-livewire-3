<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = ['name'];

    public function invoice_items()
    {
        return $this->hasMany(InvoiceItem::class, 'invoice_id');
    }
}
