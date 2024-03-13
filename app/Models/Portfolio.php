<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function contestant()
    {
        return $this->belongsTo(Contestant::class);
    }

    public function judge()
    {
        return $this->belongsTo(Judge::class);
    }
}