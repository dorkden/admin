<?php

namespace App\Filament\Resources\Auth\PermissionResource\Pages;

use App\Filament\Resources\Auth\PermissionResource;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Config;
use Spatie\Permission\Contracts\Permission;
use Spatie\Permission\PermissionRegistrar;

class EditPermission extends EditRecord
{
    protected static string $resource = PermissionResource::class;


    public function afterSave(): void
    {
        if (! $this->record instanceof Permission) {
            return;
        }

        app(PermissionRegistrar::class)->forgetCachedPermissions();
    }
}
