<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * \App\Models\Worm
 * @property int $id
 * @property string $name
 * @property string $species
 * @property int $age
 * @property int $number_of_segments
 * @property int $number_of_hearts
 * @property string $about_me
 * @property string $habitat
 * @property string $hobbies
 * @property string $graditude
 * @property string $passion
 * @property string $ideal_match
 * @property string $email
 * @property string $avatar_url
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 */
class Worm extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'species',
        'age',
        'number_of_segments',
        'number_of_hearts',
        'about_me',
        'habitat',
        'hobbies',
        'graditude',
        'passion',
        'ideal_match',
        'email'
    ];

    protected $casts = [
        'age' => 'int',
        'number_of_segments' => 'int',
        'number_of_hearts' => 'int',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    protected function avatarUrl(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $value === '' ? 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/30/Regenwurm1.jpg/300px-Regenwurm1.jpg' : $value,
        );
    }

    public function matches()
    {
        return $this->hasMany(WormMatch::class, 'worm_id');
    }

    public function matchesWithMatch()
    {
        return $this->hasMany(WormMatch::class, 'worm_id')->with('match');
    }
}
