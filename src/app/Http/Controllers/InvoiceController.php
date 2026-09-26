<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Services\InvoiceService;
use Barryvdh\DomPDF\Facade\Pdf;

class InvoiceController extends Controller
{
    protected function authorizeAccess(Order $order): void
    {
        $user = auth()->user();

        if (! $user) {
            abort(401, 'Silakan login terlebih dahulu');
        }

        // Izinkan super_admin atau pembeli pemilik order
        if (! $user->hasRole('super_admin') && $order->user_id !== $user->id) {
            abort(403, 'Anda tidak memiliki hak akses untuk melihat invoice ini');
        }

        if ($order->status !== 'dibayar') {
            abort(403, 'Invoice hanya tersedia untuk pesanan yang sudah lunas (dibayar)');
        }
    }

    public function download(Order $order)
    {
        $this->authorizeAccess($order);

        $pdf = Pdf::loadView('admin.invoice', [
            'order' => $order->load(['user', 'vehicle']),
            'date' => now()->format('d/m/Y'),
        ]);

        return $pdf->download('Invoice-MobilQuick-' . $order->id . '.pdf');
    }

    public function preview(Order $order)
    {
        $this->authorizeAccess($order);

        $pdf = Pdf::loadView('admin.invoice', [
            'order' => $order->load(['user', 'vehicle']),
            'date' => now()->format('d/m/Y'),
        ]);

        return $pdf->stream('Invoice-MobilQuick-' . $order->id . '.pdf');
    }
}