<?php

namespace App\Filament\Resources\Auth\UserResource\Pages;

use App\Filament\Resources\Auth\UserResource;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Facades\Config;

class ListUsers extends ListRecords
{
    protected static string $resource = UserResource::class;
}
