<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NomorSeri extends Model
{
    use HasFactory;

    protected $fillable = [
        'serial_no',
        'warranty_start',
        'warranty_duration',
        'used',
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}
