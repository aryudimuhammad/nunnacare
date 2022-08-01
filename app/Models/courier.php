<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class courier extends Model
{
    use HasFactory;

    public function Pesanan()
    {
        return $this->BelongsTo(Pesanan::class);
    }
}
