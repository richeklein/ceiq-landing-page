<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Represents a resource/newsletter request submission.
 * Stores contact information for users requesting the CEIQ Impact Brief.
 */
class ResourceRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'role',
        'organization',
        'wants_preview',
        'email_sent_at',
    ];

    protected function casts(): array
    {
        return [
            'wants_preview' => 'boolean',
            'email_sent_at' => 'datetime',
        ];
    }
}
