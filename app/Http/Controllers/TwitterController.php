<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use Validator;

class TwitterController extends Controller
{
    public function index()
    {
        $tweet = DB::table('tweets')
            ->select('id', 'tweet')
            ->orderBy('id', 'desc')
            ->get();
        return view('index', [
            'tweet' => $tweet
        ]);
    }

    public function destroy($tweetID)
    {
        DB::table('tweets')
            ->where('id', '=', $tweetID)
            ->delete();

        return redirect('/')
            ->with('successStatus', 'Tweet successfully deleted!');
    }

    public function id($tweetID)
    {
        $viewTweet = DB::table('tweets')
            ->select('id', 'tweet')
            ->where('id', '=', $tweetID)
            ->get();


        return view('tweets.id', [
            'tweets' => $viewTweet
        ]);

    }

public function store(Request $request)
{
    $validation = Validator::make($request->all(), [
    'tweet' => 'required|max:140'
]);
    if ($validation->passes()) {
        DB::table('tweets')->insert([
            'tweet' => request('tweet')
        ]);

        return redirect('/')
            ->with('successStatus', 'Tweet successfully created!');

    } else {
    return redirect('/')
    ->withErrors($validation);
    }
}
}
