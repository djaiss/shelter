<?php

namespace App\Http\Controllers\Message;

use App\Http\Controllers\Controller;
use App\Http\ViewModels\Message\ChannelViewModel;
use App\Http\ViewModels\Message\MessageLayoutViewModel;
use App\Services\CreateChannel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class ChannelController extends Controller
{
    public function new(): View
    {
        return view('message.channel.new');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'channel-name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'visibility' => 'required|boolean',
        ]);

        $channel = (new CreateChannel(
            name: $validated['channel-name'],
            description: $validated['description'],
            isPublic: $validated['visibility'],
        ))->execute();

        $request->session()->flash('status', __('The channel has been created'));

        Cache::forget('user-channels-' . auth()->user()->id);

        return redirect()->route('channel.show', [
            'channel' => $channel->id,
        ]);
    }

    public function show(Request $request): View
    {
        $channel = $request->attributes->get('channel');

        return view('message.channel.show', [
            'data' => [
                'layout' => MessageLayoutViewModel::index(),
                'channel' => ChannelViewModel::show($channel),
            ],
        ]);
    }
}
