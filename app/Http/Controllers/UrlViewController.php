<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Links;
use App\Models\UrlView;

class UrlViewController extends Controller
{
    public function redirect($username, $link_id)
    {
        $user = User::where('name', $username)->first();

        if (!$user) {
            return redirect()->route('index');
        }

        $link = Links::where('user_id', $user->id)->where('id', $link_id)->first();

        if (!$link) {
            return redirect()->route('index');
        }

        $urlView = UrlView::where('link_id', $link->id)->first();

        if (!$urlView) {
            UrlView::create([
                'user_id' => $user->id,
                'link_id' => $link->id,
                'views' => 1,
            ]);
        } else {
            $urlView->increment('views');
        }

        $url = $link->url;

        return view('redirect', compact('url'));
    }
}
