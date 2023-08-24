<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use HasFactory;
    
    protected $fillable = ['user_id', 'store_name', 'total_calory', 'meal_type'];

    public function dishes() {
        return $this->hasMany(Dish::class);
    }
}
