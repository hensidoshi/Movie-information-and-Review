<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserSettingController extends Controller
{
    public function update(Request $r)
    {
        $u = Auth::user();

        $u->name = $r->name;
        $u->email = $r->email;
        $u->dark_mode = $r->has('dark_mode');
        $u->email_notifications = $r->has('email_notifications');

        $u->save();

        return back()->with('success','Settings updated successfully');
    }
}
