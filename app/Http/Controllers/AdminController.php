<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $data = DB::table('penilaians')
            ->select('SELECT a.created_at AS tanggal,b.name,SUM(CASE WHEN a.rating = 1 THEN 1 ELSE 0 END) AS sangat_puas,SUM(CASE WHEN a.rating = 2 THEN 1 ELSE 0 END) AS puas,SUM(CASE WHEN a.rating = 3 THEN 1 ELSE 0 END) AS tidak_puas FROM penilaians a JOIN users b ON a.user_id=b.id GROUP BY a.user_id ORDER BY a.id')
            ->get();

            dd($data);
        //return response()->json($data);
        return view('admin.dashboard', ['data' => $data]);
    }
}
