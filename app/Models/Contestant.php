<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contestant extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function variety()
    {
        return $this->hasMany(Variety::class);
    }

    public function portfolio()
    {
        return $this->hasMany(Portfolio::class);
    }
}