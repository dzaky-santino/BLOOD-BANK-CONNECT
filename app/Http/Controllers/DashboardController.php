<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BankDarah;
use App\Models\Dokter;
use App\Models\User;
use DB;

class DashboardController extends Controller
{
    //
    public function index() {
        $bankDarah = BankDarah::count();
        $totalStock = BankDarah::sum('stok');
        $dokter = Dokter::count();
        $dataDarah = BankDarah::select('gol_darah', DB::raw('SUM(stok) as stok'))->groupBy('gol_darah')->get();
        $admin = User::where('role', 'admin')->count();
        $user = User::where('role', 'user')->count();

        return view('admin.dashboard', compact('bankDarah', 'totalStock', 'dokter', 'dataDarah', 'admin', 'user'));
    }
}
