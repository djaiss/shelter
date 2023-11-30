<?php

namespace App\Http\Controllers\Message;

use App\Http\Controllers\Controller;
use App\Http\ViewModels\Message\UserChannelViewModel;
use Illuminate\View\View;

class MessageController extends Controller
{
    public function index(): View
    {
        $channels = UserChannelViewModel::index();

        return view('message.index', [
            'data' => [
                'channel_list' => $channels,
            ],
        ]);
    }
}
