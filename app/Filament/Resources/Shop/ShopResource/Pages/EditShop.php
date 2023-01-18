<?php

namespace App\Filament\Resources\Shop\ShopResource\Pages;

use App\Filament\Resources\Shop\ShopResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditShop extends EditRecord
{
    protected static string $resource = ShopResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
