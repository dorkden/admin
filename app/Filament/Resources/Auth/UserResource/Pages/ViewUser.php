<?php

namespace App\Filament\Resources\Auth\UserResource\Pages;

use Filament\Facades\Filament;
use Filament\Pages\Actions\Action;
use Filament\Resources\Pages\ViewRecord;
use Illuminate\Support\Facades\Config;
use Illuminate\Validation\UnauthorizedException;
use Phpsa\FilamentAuthentication\Actions\ImpersonateLink;

class ViewUser extends ViewRecord
{


    protected function getActions(): array
    {
        $user = Filament::auth()->user();
        if ($user === null) {
            throw new UnauthorizedException();
        }

        if (ImpersonateLink::allowed($user, $this->record)) {
            return array_merge([
                Action::make('impersonate')
                    ->button()
                    ->action(function () {
                        ImpersonateLink::impersonate($this->record);
                    }),
            ], parent::getActions());
        }

        return parent::getActions();
    }
}
