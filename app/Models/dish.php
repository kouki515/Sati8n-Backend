<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    use HasFactory;

    protected $fillable = ['record_id', 'amount', 'calory'];

    public function record() {
        return $this->belongsTo(Record::class);
    }
}
