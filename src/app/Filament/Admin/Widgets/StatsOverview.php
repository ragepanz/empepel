<?php

namespace App\Filament\Admin\Widgets;

use App\Models\Order;
use App\Models\User;
use App\Models\Vehicle;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Illuminate\Support\Facades\Cache;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected static ?string $pollingInterval = null;

    protected function getStats(): array
    {
        $stats = Cache::remember('admin-dashboard-stats', now()->addMinute(), fn (): array => [
            'users' => User::count(),
            'vehicles' => Vehicle::count(),
            'pending_orders' => Order::where('status', 'proses')->count(),
            'revenue' => Order::where('status', 'dibayar')->sum('total_harga'),
        ]);

        return [
            Stat::make('Total Pengguna', $stats['users'])
                ->description('Pelanggan aktif')
                ->icon('heroicon-o-users')
                ->color('info'),
            Stat::make('Total Kendaraan', $stats['vehicles'])
                ->description('Inventaris')
                ->icon('heroicon-o-truck')
                ->color('primary'),
            Stat::make('Pesanan Pending', $stats['pending_orders'])
                ->description('Menunggu verifikasi')
                ->icon('heroicon-o-clock')
                ->color('warning'),
            Stat::make('Total Pendapatan', 'Rp ' . number_format($stats['revenue'], 0, ',', '.'))
                ->description('Pesanan verified')
                ->icon('heroicon-o-banknotes')
                ->color('success'),
        ];
    }
}
