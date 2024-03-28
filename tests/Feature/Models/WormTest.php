<?php

use App\Models\Worm;


it('should create a worm', function () {
    $worm = Worm::factory()->create();

    expect($worm->exists)->toBeTrue();
});

it('should update a worm', function () {
    $worm = Worm::factory()->create();

    $worm->update([
        'name' => 'New Name',
    ]);

    expect($worm->name)->toBe('New Name');
});

it('should delete a worm', function () {
    $worm = Worm::factory()->create();

    $worm->delete();

    expect($worm->exists)->toBeFalse();
});

it('should retrieve a worm', function () {
    $worm = Worm::factory()->create();

    $retrievedWorm = Worm::find($worm->id);

    expect($retrievedWorm->id)->toBe($worm->id);
});

it('should retrieve all worms', function () {
    Worm::factory()->count(3)->create();

    $worms = Worm::all();

    expect($worms->count())->toBe(3);
});

it('should have an avatar url', function () {
    $worm = Worm::factory()->create([
        'avatar_url' => '',
    ]);

    expect($worm->avatar_url)->toBe('https://upload.wikimedia.org/wikipedia/commons/thumb/3/30/Regenwurm1.jpg/300px-Regenwurm1.jpg');
});
