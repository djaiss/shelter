<?php

namespace App\Models;

use App\Traits\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Level extends Model
{
    use HasFactory, Translatable;

    protected $table = 'levels';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'role_id',
        'label',
        'label_translation_key',
    ];

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }
}
