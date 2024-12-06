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
        $page = $request->input('page', 1);
        $perPage = $request->input('perPage', 10);
        $search = $request->input('search', '');

        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        // Pastikan format tanggal yang diterima valid
        $startDate = Carbon::parse($startDate)->startOfDay();
        $endDate = Carbon::parse($endDate)->endOfDay();

        if (empty($search)) {
            $query = DB::table('penilaians as a')
                ->join('users as b', 'a.user_id', '=', 'b.id')
                ->select(
                    DB::raw('MIN(a.created_at) as tanggal'),
                    DB::raw('MIN(b.name) as name'),
                    DB::raw('SUM(CASE WHEN a.rating = 1 THEN 1 ELSE 0 END) as sangat_puas'),
                    DB::raw('SUM(CASE WHEN a.rating = 2 THEN 1 ELSE 0 END) as puas'),
                    DB::raw('SUM(CASE WHEN a.rating = 3 THEN 1 ELSE 0 END) as tidak_puas')
                )
                ->whereBetween(DB::raw('DATE(a.created_at)'), [$startDate, $endDate]);
        }else{
            $query = DB::table('penilaians as a')
                ->join('users as b', 'a.user_id', '=', 'b.id')
                ->select(
                    DB::raw('MIN(a.created_at) as tanggal'),
                    DB::raw('MIN(b.name) as name'),
                    DB::raw('SUM(CASE WHEN a.rating = 1 THEN 1 ELSE 0 END) as sangat_puas'),
                    DB::raw('SUM(CASE WHEN a.rating = 2 THEN 1 ELSE 0 END) as puas'),
                    DB::raw('SUM(CASE WHEN a.rating = 3 THEN 1 ELSE 0 END) as tidak_puas')
                )
                ->whereBetween(DB::raw('DATE(a.created_at)'), [$startDate, $endDate])
                ->where('b.name', 'LIKE', '%' . $search . '%');
        }

        $total = $query->count();
        $data = $query
            ->skip(($page - 1) * $perPage)
            ->take($perPage)
            ->groupBy('a.user_id')
            ->orderBy('a.id')
            ->get();

        $pagination = [
            'total' => $total,
            'per_page' => $perPage,
            'current_page' => $page,
            'last_page' => ceil($total / $perPage),
        ];

        //Count Total Sangat Puas
        $sangatpuas = DB::table('penilaians as a')
            ->select(
                DB::raw('SUM(CASE WHEN a.rating = 1 THEN 1 ELSE 0 END) as sangat_puas')
            )
            ->whereBetween(DB::raw('DATE(a.created_at)'), [$startDate, $endDate])
            ->first();

            if (empty($sangatpuas->sangat_puas)) {
                $totsangatpuas = 0;
            } else {
                $totsangatpuas = $sangatpuas->sangat_puas;
            }

        //Count Total Puas
        $puas = DB::table('penilaians as a')
            ->select(
                DB::raw('SUM(CASE WHEN a.rating = 2 THEN 1 ELSE 0 END) as puas')
            )
            ->whereBetween(DB::raw('DATE(a.created_at)'), [$startDate, $endDate])
            ->first();

            if (empty($puas->puas)) {
                $totpuas = 0;
            } else {
                $totpuas = $puas->puas;
            }

        //Count Total tidak puas
        $tidakpuas = DB::table('penilaians as a')
            ->select(
                DB::raw('SUM(CASE WHEN a.rating = 3 THEN 1 ELSE 0 END) as tidak_puas')
            )
            ->whereBetween(DB::raw('DATE(a.created_at)'), [$startDate, $endDate])
            ->first();

            if (empty($tidakpuas->tidak_puas)) {
                $tottidakpuas = 0;
            } else {
                $tottidakpuas = $tidakpuas->tidak_puas;
            }

        //Count Total All
        $total = DB::table('penilaians as a')
            ->select(
                DB::raw('COUNT(*) as total')
            )
            ->whereBetween(DB::raw('DATE(a.created_at)'), [$startDate, $endDate])
            ->first();

            if (empty($total->total)) {
                $tot = 0;
            } else {
                $tot = $total->total;
            }

        return view('admin.dashboard', compact('data', 'startDate', 'endDate', 'totsangatpuas', 'totpuas', 'tottidakpuas', 'tot','pagination', 'search', 'perPage', 'page', 'total'));
    }
}
