<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TariffUser extends Model
{
    use HasFactory;

    /**
     * Атрибуты, для которых разрешено массовое присвоение значений.
     *
     * @var array
     */
    protected $fillable = [
        'tariff_id',
        'user_id',
        'name',
        'user_ram_mb',
    ];

    public function tariff() {
        return $this->belongsTo(Tariff::class);
    }
}
