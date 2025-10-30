<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Site extends Model
{
    public $timestamps = true;
    protected $table = 'sites';

    protected $fillable = [
        'slug',
        'user_id',
        'name',
        'url',
    ];

    public function pwItems(): HasMany
    {
        return $this->hasMany(PwItem::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
