<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * \App\Models\WormMatch
 * @property int $id
 * @property int $worm_id
 * @property int $match_id
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property bool $worm_approved
 * @property bool $match_approved
 * @property-read bool $is_mutual
 */
class WormMatch extends Model
{
    use HasFactory;

    protected $fillable = [
        'worm_id',
        'match_id',
        'worm_approved',
        'match_approved',
    ];

    protected $casts = [
        'worm_approved' => 'bool',
        'match_approved' => 'bool',
        'is_mutual' => 'bool',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the worm that owns the WormMatch
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<\App\Models\Worm>
     */
    public function worm()
    {
        return $this->belongsTo(Worm::class);
    }

    /**
     * Get the match that owns the WormMatch
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<\App\Models\Worm>
     */
    public function match()
    {
        return $this->belongsTo(Worm::class, 'match_id');
    }
}
