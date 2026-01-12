<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DemoRequest extends Model
{
    /** @use HasFactory<\Database\Factories\DemoRequestFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'organization',
        'questions',
        'email_sent_at',
    ];

    protected function casts(): array
    {
        return [
            'email_sent_at' => 'datetime',
        ];
    }
}
