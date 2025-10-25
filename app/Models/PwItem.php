<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PwItem extends Model
{
    public $timestamps = true;
    protected $table = 'pwitems';

    protected $fillable = [
        'slug',
        'site_id',
        'username',
        'password',
        'note'
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'username' => 'encrypted',
            'password' => 'encrypted',
        ];
    }

    public function site(): BelongsTo
    {
        return $this->belongsTo(Site::class);
    }
}
