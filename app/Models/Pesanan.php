<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;
    public function pesanan_detail()
    {
        return $this->BelongsToMany(Pesanan_detail::class);
    }
    public function user()
    {
        return $this->BelongsTo(User::class);
    }
}
