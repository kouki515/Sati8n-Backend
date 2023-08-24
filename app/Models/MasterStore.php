<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterStore extends Model
{
    use HasFactory;

    public function master_dishes() {
        return $this->hasMany(MasterDishes::class);
    }
}
