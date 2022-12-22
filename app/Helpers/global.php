<?php

use App\Models\Pesanan;

function total()
{
    return Pesanan::count();
}

