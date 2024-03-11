<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Application extends Model
{
    use HasUuids, HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'First_name',
        'Last_name',
        'Club',
        'Race_ID',
    ];

    protected $visible = [
        'id',
        'First_name',
        'Last_name',
        'Club',
        'Race_ID'];

    public $timestamps = false;
    /**
     * Get the race associated with the Application.
     */
    public function race(): BelongsTo
    {
        return $this->belongsTo(Race::class);
    }
}
