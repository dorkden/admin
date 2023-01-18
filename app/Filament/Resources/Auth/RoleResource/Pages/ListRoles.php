<?php

namespace App\Filament\Resources\Auth\RoleResource\Pages;

use App\Filament\Resources\Auth\RoleResource;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Facades\Config;

class ListRoles extends ListRecords
{
    protected static string $resource = RoleResource::class;
}
