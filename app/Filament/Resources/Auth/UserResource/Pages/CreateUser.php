<?php

namespace App\Filament\Resources\Auth\UserResource\Pages;


use App\Filament\Resources\Auth\UserResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Event;
use Phpsa\FilamentAuthentication\Events\UserCreated;

class CreateUser extends CreateRecord
{

    protected static string $resource = UserResource::class;

    protected function afterCreate(): void
    {
        Event::dispatch(new UserCreated($this->record));
    }
}
