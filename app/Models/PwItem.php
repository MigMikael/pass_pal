<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PwItem extends Model
{
    public $timestamps = true;
    protected $table = 'pwitems';

    protected $fillable = [
        'slug',
        'site',
        'username',
        'password',
        'note'
    ];

    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }

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
}
