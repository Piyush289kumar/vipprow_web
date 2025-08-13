<?php

namespace App\Filament\Resources\SEOResource\Pages;

use App\Filament\Resources\SEOResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSEOS extends ListRecords
{
    protected static string $resource = SEOResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
