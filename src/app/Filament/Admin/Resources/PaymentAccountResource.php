<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\PaymentAccountResource\Pages;
use App\Models\PaymentAccount;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PaymentAccountResource extends Resource
{
    protected static ?string $model = PaymentAccount::class;

    protected static ?string $navigationIcon = 'heroicon-o-credit-card';

    protected static ?string $navigationLabel = 'Rekening Pembayaran';

    protected static ?string $modelLabel = 'Rekening Pembayaran';

    protected static ?string $navigationGroup = 'Keuangan';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Rekening Toko')
                    ->description('Kelola nomor rekening bank atau e-wallet yang ditampilkan kepada pembeli untuk transfer pembayaran.')
                    ->schema([
                        Forms\Components\Select::make('type')
                            ->label('Jenis Rekening / Pembayaran')
                            ->options([
                                'bank_transfer' => 'Transfer Bank',
                                'e_wallet' => 'E-Wallet',
                                'qris' => 'QRIS',
                            ])
                            ->default('bank_transfer')
                            ->required()
                            ->native(false),

                        Forms\Components\TextInput::make('bank_name')
                            ->label('Nama Bank / Provider')
                            ->placeholder('Contoh: BCA, Mandiri, BRI, GoPay')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\TextInput::make('account_number')
                            ->label('Nomor Rekening / Akun')
                            ->placeholder('Contoh: 1234567890')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\TextInput::make('account_name')
                            ->label('Atas Nama (Pemilik Rekening)')
                            ->placeholder('Contoh: PT MobilQuick Indonesia')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\Textarea::make('instructions')
                            ->label('Instruksi Pembayaran')
                            ->placeholder('Contoh: Mohon transfer tepat hingga 3 digit terakhir dan simpan bukti transfer.')
                            ->rows(3)
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('type')
                    ->label('Jenis')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'bank_transfer' => 'Bank Transfer',
                        'e_wallet' => 'E-Wallet',
                        'qris' => 'QRIS',
                        default => ucfirst($state),
                    })
                    ->color(fn (string $state): string => match ($state) {
                        'bank_transfer' => 'primary',
                        'e_wallet' => 'success',
                        'qris' => 'warning',
                        default => 'gray',
                    }),

                Tables\Columns\TextColumn::make('bank_name')
                    ->label('Bank / Provider')
                    ->searchable()
                    ->weight('bold'),

                Tables\Columns\TextColumn::make('account_number')
                    ->label('Nomor Rekening')
                    ->copyable()
                    ->copyMessage('Nomor rekening disalin ke clipboard')
                    ->searchable(),

                Tables\Columns\TextColumn::make('account_name')
                    ->label('Atas Nama')
                    ->searchable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y')
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('type')
                    ->label('Jenis')
                    ->options([
                        'bank_transfer' => 'Bank Transfer',
                        'e_wallet' => 'E-Wallet',
                        'qris' => 'QRIS',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPaymentAccounts::route('/'),
            'create' => Pages\CreatePaymentAccount::route('/create'),
            'edit' => Pages\EditPaymentAccount::route('/{record}/edit'),
        ];
    }
}
