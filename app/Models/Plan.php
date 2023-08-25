<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'percent',
        'sell_type_id',
        'start_date',
        'end_date'
    ];

    public function sellType(): BelongsTo
    {
        return $this->belongsTo(SellType::class, 'sell_type_id', 'id');
    }
}
