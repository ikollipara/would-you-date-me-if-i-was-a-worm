<?php

namespace App\Http\Controllers;

use App\Http\Requests\WormMatchRequest;
use App\Models\Worm;
use App\Models\WormMatch;
use Illuminate\Http\Request;
use Inertia\Inertia;

class WormMatchesController extends Controller
{
    public function index(Worm $worm)
    {
        $match = Worm::query()->where('id', '!=', $worm->id)->get();
        $match = $match->filter(function ($match) use ($worm) {
            return !$worm->matches()->where('match_id', $match->id)->exists();
        })->first();
        return Inertia::render('Match/Index', [
            'worm' => $worm,
            'match' => $match,
        ]);
    }

    public function store(Worm $worm, WormMatchRequest $request)
    {
        $match = WormMatch::query()->where('match_id', $request->match_id)->where('worm_id', $worm->id)->first();
        if(!$match) {
            $match = new WormMatch($request->all());
            if($match->save()) {
                return redirect()->route('worms.matches.index', $worm);
            } else {
                return redirect()->back()->withErrors('Unable to create match.');
            }
        } else {
        if($match->update([
            'worm_approved' => $request->worm_approved,
        ])) {
            return redirect()->route('worms.matches.index', $worm);
        } else {
            return redirect()->back()->withErrors('Unable to create match.');
        }
        }
    }
}
