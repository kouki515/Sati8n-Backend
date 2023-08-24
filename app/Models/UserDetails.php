<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetails extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'height', 'weight', 'sex', 'age', 'bio', 'user_name'];

    public function user() {
        return $this->belongsTo('App\User');
    }
}
