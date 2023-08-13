<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barang';

    protected $fillable = [
        'product_name',
        'brand',
        'price',
        'model_no',
    ];

    public function nomorSeris()
    {
        return $this->hasMany(NomorSeri::class);
    }

    public function transaksis()
    {
        return $this->hasMany(Transaksi::class);
    }
}