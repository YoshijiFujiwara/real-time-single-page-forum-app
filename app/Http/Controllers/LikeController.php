<?php

namespace App\Http\Controllers;

use App\Events\LikeEvent;
use App\Model\Like;
use Illuminate\Http\Request;
use App\Model\Reply;

class LikeController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('JWT');
    }

    public function likeIt(Reply $reply)
    {
        $reply->like()->create([
            'user_id' => auth()->id()
        ]);

        // https://laravel.com/docs/5.6/broadcasting#broadcasting-events より
        broadcast(new LikeEvent($reply->id, 'likeIt'))->toOthers();
    }

    public function unLikeIt(Reply $reply)
    {
        $reply->like()->where('user_id', auth()->id())->first()->delete();
        broadcast(new LikeEvent($reply->id, 'unLikeIt'))->toOthers();
    }
}
