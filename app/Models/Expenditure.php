<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expenditure extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function bill(){
        return $this->hasOne(Bill::class,'expenditure_id');
    }

    public function liability(){
        return $this->hasOne(Liability::class,'expenditure_id');
    }
}
