<?php

namespace App\Filament\Resources\AppConfigurationResource\Pages;

use App\Filament\Resources\AppConfigurationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAppConfigurations extends ListRecords
{
    protected static string $resource = AppConfigurationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
