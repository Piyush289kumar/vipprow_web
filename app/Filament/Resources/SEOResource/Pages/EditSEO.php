<?php

namespace App\Filament\Resources\SEOResource\Pages;

use App\Filament\Resources\SEOResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSEO extends EditRecord
{
    protected static string $resource = SEOResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
