<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Alat;
use App\Models\Peminjaman;
use App\Models\PeminjamanDetail;
use App\Models\Pengembalian;
use App\Models\Mahasiswa;
use App\Models\Dosen;

class AdminController extends Controller
{
    /**
     * Show the admin dashboard.
     */
    public function dashboard(Request $request)
    {
        // Get selected year from request, default to 2025 (where sample data is)
        $selectedYear = $request->get('year', '2025');
        
        // Get available years - show both 2025 and 2026
        $availableYears = [2026, 2025];

        // Get real dashboard statistics from database
        $stats = [
            'total_tools' => Alat::count(),
            'active_borrowings' => Peminjaman::whereIn('status', ['disetujui', 'dipinjam'])->count(),
            'total_mahasiswa' => Mahasiswa::count(),
            'total_dosen' => Dosen::count(),
            'monthly_borrowings' => $this->getMonthlyBorrowings($selectedYear),
            'popular_tools' => $this->getPopularTools(),
            'recent_activities' => $this->getRecentActivities(),
            'selected_year' => $selectedYear,
            'available_years' => $availableYears,
        ];

        return view('admin.dashboard', compact('stats'));
    }

    /**
     * Get monthly borrowing statistics for the specified year
     */
    private function getMonthlyBorrowings($year = '2025')
    {
        $monthlyData = [];
        for ($month = 1; $month <= 12; $month++) {
            $count = Peminjaman::whereYear('tanggal_pinjam', $year)
                ->whereMonth('tanggal_pinjam', $month)
                ->count();
            $monthlyData[] = $count;
        }
        return $monthlyData;
    }

    /**
     * Get most popular tools based on borrowing frequency
     */
    private function getPopularTools()
    {
        return PeminjamanDetail::select('alat.nama', DB::raw('SUM(peminjaman_detail.jumlah) as total_borrowed'))
            ->join('alat', 'peminjaman_detail.alat_id', '=', 'alat.id')
            ->join('peminjaman', 'peminjaman_detail.peminjaman_id', '=', 'peminjaman.id')
            ->groupBy('alat.id', 'alat.nama')
            ->orderBy('total_borrowed', 'desc')
            ->limit(5)
            ->get()
            ->map(function ($item) {
                return [
                    'name' => $item->nama,
                    'borrowed' => $item->total_borrowed
                ];
            })
            ->toArray();
    }

    /**
     * Get recent borrowing and return activities
     */
    private function getRecentActivities()
    {
        $activities = [];
        
        // Get recent borrowings
        $recentBorrowings = Peminjaman::with(['mahasiswa', 'dosen', 'peminjamanDetails.alat'])
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();

        foreach ($recentBorrowings as $peminjaman) {
            $userName = $peminjaman->mahasiswa ? $peminjaman->mahasiswa->nama : 
                       ($peminjaman->dosen ? $peminjaman->dosen->nama : 'Unknown');
            
            $itemName = $peminjaman->peminjamanDetails->first()?->alat->nama ?? 'Unknown';
            $timeAgo = $peminjaman->created_at->diffForHumans();
            
            $activities[] = [
                'user' => $userName,
                'action' => 'Meminjam',
                'item' => $itemName,
                'time' => $timeAgo
            ];
        }
        
        // Get recent returns
        $recentReturns = Pengembalian::with(['peminjaman.mahasiswa', 'peminjaman.dosen', 'peminjaman.peminjamanDetails.alat'])
            ->orderBy('created_at', 'desc')
            ->limit(2)
            ->get();

        foreach ($recentReturns as $pengembalian) {
            $peminjaman = $pengembalian->peminjaman;
            $userName = $peminjaman->mahasiswa ? $peminjaman->mahasiswa->nama : 
                       ($peminjaman->dosen ? $peminjaman->dosen->nama : 'Unknown');
            
            $itemName = $peminjaman->peminjamanDetails->first()?->alat->nama ?? 'Unknown';
            $timeAgo = $pengembalian->created_at->diffForHumans();
            
            $activities[] = [
                'user' => $userName,
                'action' => 'Mengembalikan',
                'item' => $itemName,
                'time' => $timeAgo
            ];
        }
        
        // Sort by time and limit to 5 activities
        usort($activities, function($a, $b) {
            return strtotime($b['time']) - strtotime($a['time']);
        });
        
        return array_slice($activities, 0, 5);
    }

    /**
     * Show the manager dashboard.
     */
    public function managerDashboard()
    {
        return view('manager.dashboard');
    }

    /**
     * Show the user dashboard.
     */
    public function userDashboard()
    {
        return view('user.dashboard');
    }
}
