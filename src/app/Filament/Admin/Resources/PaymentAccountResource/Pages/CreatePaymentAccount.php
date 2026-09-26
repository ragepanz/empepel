<?php

namespace App\Filament\Admin\Resources\PaymentAccountResource\Pages;

use App\Filament\Admin\Resources\PaymentAccountResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePaymentAccount extends CreateRecord
{
    protected static string $resource = PaymentAccountResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
