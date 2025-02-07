<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SettingLabel;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $data = SettingLabel::find(1);
        return view('user.dashboard')->with('data', $data);
    }
}
