<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan_detail extends Model
{
    use HasFactory;
    public function Produk()
    {
        return $this->BelongsTo(Produk::class);
    }
    public function Pesanan()
    {
        return $this->BelongsTo(Pesanan::class);
    }
}
