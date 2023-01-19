<?php

namespace App\Models;

use App\Models\Provinsi;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    use HasFactory;

    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class);
    }
}
