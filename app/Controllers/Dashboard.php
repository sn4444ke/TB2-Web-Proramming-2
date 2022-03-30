<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {

        $report = model('Report');
        $pendapatanBulanan = $report->getMonthlyEarn();
        $pendapatanTahunan = $report->getAnnualEarn();
        $progressPengembalian = $report->getCompleteProgress();
        $earningOverview = $report->getEarningOverview();
        $earningSource = $report->getEarningSource();

        return view('DashboardView', [
            'pendapatanBulanan' => "Rp ".number_format($pendapatanBulanan, 0, ',','.'),
            'pendapatanTahunan' => "Rp ".number_format($pendapatanTahunan, 0, ',','.'),
            'progressPengembalian' => ceil(($progressPengembalian->buku_dikembalikan / $progressPengembalian->buku_dipinjam) * 100),
            'bukuDipinjam' => $progressPengembalian->buku_dipinjam,
            'earningOverview' => $earningOverview,
            'earningSource' => $earningSource
        ]);
    }
}
