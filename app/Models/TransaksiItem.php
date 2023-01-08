<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiItem extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function produk()
    {
        return $this->hasOne(Produk::class, "produks_id");
    }
}
