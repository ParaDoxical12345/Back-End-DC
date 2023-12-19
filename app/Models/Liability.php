<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Liability extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function expenditure(){
        return $this->belongsTo(Expenditure::class);
    }
}