<?php

namespace App\Http\Controllers;

use App\Models\Issue;
use Barryvdh\DomPDF\Facade as PDF; // Use this alias for PDF generation
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    // Show the form to select a date range
    public function showDateForm()
    {
        return view('pages.report.date');
    }

    // Generate PDF report based on selected date range
    public function generateDateReportPDF(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        // Get the selected start and end dates from the request
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        // Retrieve issues within the selected date range and with status 'complete'
        $issues = Issue::with(['departemen', 'teknisi', 'hardware'])
            ->where('status', 'complete') // Filter by status complete
            ->whereDate('created_at', '>=', $startDate)
            ->whereDate('created_at', '<=', $endDate)
            ->get();

        // Load the view and pass the issues to it
        $pdf = FacadePdf::loadView('pages.report.pdf', compact('issues', 'startDate', 'endDate'));

        // Download the generated PDF
        return $pdf->download("laporan_{$startDate}_to_{$endDate}.pdf");
    }
}
