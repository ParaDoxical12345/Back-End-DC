<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecordOfSaving extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function monthlyIncome(){
        return $this->belongsTo(MonthlyIncome::class);
    }
}
