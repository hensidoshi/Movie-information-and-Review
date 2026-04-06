<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class SettingController extends Controller
{
    public function index()
    {
        return view('web.settings');
    }
    
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
