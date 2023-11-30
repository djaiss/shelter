<?php

namespace App\Http\Controllers\Message;

use App\Http\Controllers\Controller;
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
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'visibility' => 'required|boolean',
        ]);

        $channel = (new CreateChannel(
            name: $validated['name'],
            description: $validated['description'],
            isPublic: $validated['visibility'],
        ))->execute();

        $request->session()->flash('status', __('The channel has been created'));

        Cache::forget('channels-' . auth()->user()->id);

        return redirect()->route('message.index');
    }
}
