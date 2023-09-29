<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tariff extends Model
{
    use HasFactory;

    public function tariffUsers() {
        return $this->hasMany(TariffUser::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
