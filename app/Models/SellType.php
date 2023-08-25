<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SellType extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'title',
        'code'
    ];

    public function plans(): HasMany
    {
        return $this->hasMany(Plan::class, 'sell_type_id', 'id');
    }
}
