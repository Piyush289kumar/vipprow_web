<?php

namespace App\Filament\Resources\AppConfigurationResource\Pages;

use App\Filament\Resources\AppConfigurationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAppConfiguration extends EditRecord
{
    protected static string $resource = AppConfigurationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
