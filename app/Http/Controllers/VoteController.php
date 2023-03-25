<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vote;

class VoteController extends Controller
{
    public function showAllVotes()
    {
        $votes = Vote::all();
        $context = ['votes' => $votes];
        return view('index', $context);
    }

    public function createVote(Request $request)
    {
        $vote = new Vote;
        $vote->title = $request->title;
        $vote->description = $request->description;
        $vote->negative = 0;
        $vote->positive = 0;
        $vote->save();

        return redirect('/');
    }

    public function showVote($id)
    {
        $vote = Vote::find($id);
        $context = ['vote' => $vote];
        return view('show_vote', $context); 
    }

    public function increasePositive($id)
    {
        $vote = Vote::find($id);
        $vote->positive++;
        $vote->save();
        return back();
    }

    public function increaseNegative($id)
    {
        $vote = Vote::find($id);
        $vote->negative++;
        $vote->save();
        return back();
    }
}
