<?php

namespace App\Http\Controllers\Message;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class MessageController extends Controller
{
    public function index(): View
    {
        return view('message.index');
    }
}
