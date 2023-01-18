<?php

namespace App\Filament\Resources\Auth\PermissionResource\Pages;

use App\Filament\Resources\Auth\PermissionResource;
use Filament\Forms\Components\Select;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables\Actions\BulkAction;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Config;

class ListPermissions extends ListRecords
{
    protected static string $resource = PermissionResource::class;

    protected function getTableBulkActions(): array
    {
        $roleClass = config('filament-authentication.models.Role');

        return [
            BulkAction::make('Attach Role')
            ->action(function (Collection $records, array $data): void {
                // dd($data);
                foreach ($records as $record) {
                    $record->roles()->sync($data['role']);
                    $record->save();
                }
            })
            ->form([
                Select::make('role')
                    ->label(strval(__('filament-authentication::filament-authentication.field.role')))
                    ->options((new $roleClass)::query()->pluck('name', 'id'))
                    ->required(),
            ])->deselectRecordsAfterCompletion(),
        ];
    }
}
