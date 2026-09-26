<?php

namespace App\Filament\Admin\Resources\PaymentAccountResource\Pages;

use App\Filament\Admin\Resources\PaymentAccountResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPaymentAccount extends EditRecord
{
    protected static string $resource = PaymentAccountResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
