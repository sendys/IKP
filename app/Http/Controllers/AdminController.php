<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        // Ambil tanggal mulai dan tanggal akhir dari request, atau set default jika tidak ada
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        // Pastikan format tanggal yang diterima valid
        $startDate = Carbon::parse($startDate)->startOfDay();
        $endDate = Carbon::parse($endDate)->endOfDay();

        $data = DB::table('penilaians as a')
            ->join('users as b', 'a.user_id', '=', 'b.id')
            ->select(
                DB::raw('MIN(a.created_at) as tanggal'),
                DB::raw('MIN(b.name) as name'),
                DB::raw('SUM(CASE WHEN a.rating = 1 THEN 1 ELSE 0 END) as sangat_puas'),
                DB::raw('SUM(CASE WHEN a.rating = 2 THEN 1 ELSE 0 END) as puas'),
                DB::raw('SUM(CASE WHEN a.rating = 3 THEN 1 ELSE 0 END) as tidak_puas')
            )
            ->whereBetween(DB::raw('DATE(a.created_at)'), [$startDate, $endDate])
            ->groupBy('a.user_id')
            ->orderBy('a.id')
            ->get();

            //dd($data);
            //return response()->json($data);
            return view('admin.dashboard', compact('data', 'startDate', 'endDate'));
    }
}
