<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Application extends Model
{
    use HasUuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'First name',
        'Last name',
        'Club',
        'Race ID',
    ];
    /**
     * Get the race associated with the user.
     */
    public function race(): BelongsTo
    {
        return $this->belongsTo(Race::class);
    }
}
