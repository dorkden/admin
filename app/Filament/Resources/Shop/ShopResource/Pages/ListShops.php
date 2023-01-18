<?php

namespace App\Filament\Resources\Shop\ShopResource\Pages;

use App\Filament\Resources\Shop\ShopResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListShops extends ListRecords
{
    protected static string $resource = ShopResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
