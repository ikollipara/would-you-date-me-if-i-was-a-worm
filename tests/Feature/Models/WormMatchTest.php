<?php

use App\Models\Worm;
use App\Models\WormMatch;

it('can create a worm match', function () {
    $worm = Worm::factory()->create();
    $match = Worm::factory()->create();

    $wormMatch = WormMatch::create([
        'worm_id' => $worm->id,
        'match_id' => $match->id,
    ]);

    $wormMatch->refresh();
    expect($wormMatch->exists)->toBeTrue();
});

it('can approve a worm match', function () {
    $worm = Worm::factory()->create();
    $match = Worm::factory()->create();

    $wormMatch = WormMatch::create([
        'worm_id' => $worm->id,
        'match_id' => $match->id,
    ]);

    $wormMatch->update([
        'worm_approved' => true,
        'match_approved' => true,
    ]);

    $wormMatch->refresh();
    expect($wormMatch->is_mutual)->toBeTrue();
});

it('can disapprove a worm match', function () {
    $worm = Worm::factory()->create();
    $match = Worm::factory()->create();

    $wormMatch = WormMatch::create([
        'worm_id' => $worm->id,
        'match_id' => $match->id,
    ]);

    $wormMatch->update([
        'worm_approved' => false,
        'match_approved' => false,
    ]);

    $wormMatch->refresh();
    expect($wormMatch->is_mutual)->toBeFalse();
});

it('can not approve a worm match if not mutual', function () {
    $worm = Worm::factory()->create();
    $match = Worm::factory()->create();

    $wormMatch = WormMatch::create([
        'worm_id' => $worm->id,
        'match_id' => $match->id,
    ]);


    $wormMatch->update([
        'worm_approved' => true,
        'match_approved' => false,
    ]);

    $wormMatch->refresh();

    expect($wormMatch->is_mutual)->toBeFalse();
});
