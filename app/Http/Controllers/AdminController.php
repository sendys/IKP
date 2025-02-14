<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use App\Models\SettingLabel;
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
                    DB::raw('SUM(CASE WHEN a.rating = 3 THEN 1 ELSE 0 END) as tidak_puas'),
                    DB::raw('COUNT(a.id) as ctotal')
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
                    DB::raw('SUM(CASE WHEN a.rating = 3 THEN 1 ELSE 0 END) as tidak_puas'),
                    DB::raw('COUNT(a.id) as ctotal')
                )
                ->whereBetween(DB::raw('DATE(a.created_at)'), [$startDate, $endDate])
                ->where('b.name', 'LIKE', '%' . $search . '%');
        }

        $total = $query->count();
        $data = $query
            ->groupBy('a.user_id')
            ->orderBy('tanggal', 'asc')
            ->skip(($page - 1) * $perPage)
            ->take($perPage)
            ->get();

        $persentase = $query->first();

        $pagination = [
            'total' => $total,
            'per_page' => $perPage,
            'current_page' => $page,
            'last_page' => ceil($total / $perPage),
        ];

        $chartData = [
            'categories' => $data->pluck('name'),
            'sangat_puas' => $data->pluck('sangat_puas'),
            'puas' => $data->pluck('puas'),
            'tidak_puas' => $data->pluck('tidak_puas'),
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

        return view('admin.dashboard',compact('data', 'startDate', 'endDate','chartData', 'totsangatpuas', 'totpuas', 'tottidakpuas', 'tot','pagination', 'search', 'perPage', 'page', 'total'));
    }

    public function exportToExcel(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);

        $startDate = Carbon::parse($request->input('start_date'))->startOfDay();
        $endDate = Carbon::parse($request->input('end_date'))->endOfDay();

        $data = DB::table('penilaians as a')
            ->join('users as b', 'a.user_id', '=', 'b.id')
            ->select(
                DB::raw('MIN(a.created_at) as tanggal'),
                DB::raw('MIN(b.name) as name'),
                DB::raw('SUM(CASE WHEN a.rating = 1 THEN 1 ELSE 0 END) as sangat_puas'),
                DB::raw('SUM(CASE WHEN a.rating = 2 THEN 1 ELSE 0 END) as puas'),
                DB::raw('SUM(CASE WHEN a.rating = 3 THEN 1 ELSE 0 END) as tidak_puas'),
                DB::raw('COUNT(a.id) as ctotal')
            )
            ->whereBetween(DB::raw('DATE(a.created_at)'), [$startDate, $endDate])
            ->groupBy('a.user_id')
            ->get();

        if ($data->isEmpty()) {
            return response()->json(['message' => 'No data available for the selected date range.'], 404);
        }

        /* Export File Ke Excell */
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Add title
        $sheet->setCellValue('A1', 'Report Penilaian Karyawan');
        $sheet->mergeCells('A1:F1');
        $sheet->getStyle('A1')->applyFromArray([
            'font' => ['bold' => true, 'size' => 14],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ],
        ]);

        // Add headers
        $sheet->setCellValue('A3', 'Tanggal')
            ->setCellValue('B3', 'Name')
            ->setCellValue('C3', 'Sangat Puas')
            ->setCellValue('D3', 'Puas')
            ->setCellValue('E3', 'Tidak Puas')
            ->setCellValue('F3', 'Total');

        // Apply header styles
        $sheet->getStyle('A3:F3')->applyFromArray([
            'font' => ['bold' => true],
            'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER],
        ]);

        // Populate data
        $row = 4; // Start from row 4 to account for the title and headers
        foreach ($data as $item) {
            $sheet->setCellValue('A' . $row, $item->tanggal)
                ->setCellValue('B' . $row, $item->name)
                ->setCellValue('C' . $row, $item->sangat_puas)
                ->setCellValue('D' . $row, $item->puas)
                ->setCellValue('E' . $row, $item->tidak_puas)
                ->setCellValue('F' . $row, $item->ctotal);
            $row++;
        }

        // Add grand total
        $sheet->setCellValue('E' . $row, 'Grand Total:')
            ->setCellValue('F' . $row, '=SUM(F4:F' . ($row - 1) . ')');
        $sheet->getStyle('E' . $row . ':F' . $row)->applyFromArray([
            'font' => ['bold' => true],
            'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT],
        ]);

        // Adjust column widths
        foreach (range('A', 'F') as $columnID) {
            $sheet->getColumnDimension($columnID)->setAutoSize(true);
        }

        // Set date format for column A
        $sheet->getStyle('A4:A' . $row)->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_DDMMYYYY);

        // Freeze header row
        $sheet->freezePane('A4');

        // Set headers for download
        $filename = 'Penilaian_Report.xlsx';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
        exit;
    }

    public function edit($id)
    {
        $label = SettingLabel::findOrFail($id);
        return view('admin.edit', compact('label'));
    }

    public function update(Request $request, $id)
    {
        // Find the user by ID
        $label = SettingLabel::findOrFail($id);

        // Validate the request
        $request->validate([
            'namalabel' => 'required',
            // Add other fields as needed
        ]);

        $label->update([
            'namalabel' => $request->input('namalabel'),
        ]);

        return redirect()->back()->with('success', 'Label updated successfully');
        // Kembalikan respons JSON
        /* return response()->json([
            'message' => 'Terima kasih atas penilaian Anda!',
        ]); */
    }

}
