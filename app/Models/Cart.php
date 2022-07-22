<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    public function Produk()
    {
        return $this->belongsTo(Produk::class);
    }
    public function Pesanan()
    {
        return $this->belongsTo(Pesanan::class);
    }
}
