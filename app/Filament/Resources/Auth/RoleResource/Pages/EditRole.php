<?php

namespace App\Filament\Resources\Auth\RoleResource\Pages;

use App\Filament\Resources\Auth\RoleResource;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Config;
use Spatie\Permission\Contracts\Role;
use Spatie\Permission\PermissionRegistrar;

class EditRole extends EditRecord
{

    protected static string $resource = RoleResource::class;

    public function afterSave(): void
    {
        if (! $this->record instanceof Role) {
            return;
        }

        app(PermissionRegistrar::class)->forgetCachedPermissions();
    }
}
