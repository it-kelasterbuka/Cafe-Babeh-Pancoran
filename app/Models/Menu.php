<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = ['katagori_id', 'slug', 'name_menu', 'desc', 'price', 'img'];

    public function Katagori(): BelongsTo
    {
        return $this->belongsTo(Katagori::class);
    }
}
