<?php

namespace App\Filament\Admin\Widgets;

use App\Filament\Admin\Resources\OrderResource;
use App\Models\Order;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;

class LatestOrders extends TableWidget
{
    protected static ?int $sort = 2;

    protected static ?string $pollingInterval = null;

    protected int|string|array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->heading('Pesanan Terbaru')
            ->description('Pesanan yang perlu dipantau')
            ->query(Order::query()->with(['user', 'vehicle'])->latest('tanggal_order')->limit(5))
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Pelanggan')
                    ->placeholder('-'),
                Tables\Columns\TextColumn::make('vehicle.nama')
                    ->label('Kendaraan')
                    ->placeholder('-'),
                Tables\Columns\TextColumn::make('tanggal_order')
                    ->label('Tanggal')
                    ->date('d M Y'),
                Tables\Columns\TextColumn::make('total_harga')
                    ->label('Total')
                    ->money('IDR'),
                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'pending' => 'Menunggu Pembayaran',
                        'proses' => 'Menunggu Verifikasi',
                        'dibayar' => 'Pembayaran Berhasil',
                        'ditolak' => 'Pembayaran Ditolak',
                        default => ucfirst($state),
                    })
                    ->color(fn (string $state): string => match ($state) {
                        'dibayar' => 'success',
                        'ditolak' => 'danger',
                        'proses' => 'warning',
                        default => 'gray',
                    }),
            ])
            ->actions([
                Tables\Actions\Action::make('lihat')
                    ->label('Lihat')
                    ->url(fn (Order $record): string => OrderResource::getUrl('edit', ['record' => $record])),
            ])
            ->paginated(false);
    }
}
