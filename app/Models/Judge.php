<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Judge extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function fullName()
    {
        return $this->firstname . ' ' . $this->lastname;
    }

    public function variety()
    {
        return $this->hasMany(Variety::class);
    }

    public function portfolio()
    {
        return $this->hasMany(Portfolio::class);
    }
}