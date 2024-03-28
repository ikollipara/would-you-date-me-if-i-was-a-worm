<?php

namespace App\Http\Controllers;

use App\Http\Requests\WormRequest;
use App\Models\Worm;
use Inertia\Inertia;

class WormsController extends Controller
{
    public function create()
    {
        return Inertia::render('Worms/Create');
    }

    public function store(WormRequest $request)
    {
        $worm = new Worm($request->except('avatar'));
        if($path = $request->file('avatar')->store('avatars', 'public')) {
            $worm->avatar_url = $path;
        }
        if($worm->save()) {
            return redirect()->route('worms.show', $worm);
        } else {
            return redirect()->back()->withErrors('Unable to create worm.');
        }
    }

    public function show(Worm $worm)
    {
        return Inertia::render('Worms/Show', [
            'worm' => $worm
        ]);
    }
}
