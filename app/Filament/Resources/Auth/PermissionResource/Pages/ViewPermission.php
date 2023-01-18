<?php

namespace App\Filament\Resources\Auth\PermissionResource\Pages;

use App\Filament\Resources\Auth\PermissionResource;
use Filament\Resources\Pages\ViewRecord;
use Illuminate\Support\Facades\Config;

class ViewPermission extends ViewRecord
{
    protected static string $resource = PermissionResource::class;

}
