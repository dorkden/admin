<?php

namespace App\Filament\Resources\Auth\UserResource\Pages;

use App\Filament\Resources\Auth\UserResource;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Event;
use Phpsa\FilamentAuthentication\Events\UserUpdated;

class EditUser extends EditRecord
{

    protected static string $resource = UserResource::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        if (empty($data['password'])) {
            unset($data['password']);
        }

        return $data;
    }

    protected function afterSave(): void
    {
        Event::dispatch(new UserUpdated($this->record));
    }
}
