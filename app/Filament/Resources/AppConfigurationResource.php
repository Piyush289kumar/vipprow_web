<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AppConfigurationResource\Pages;
use App\Filament\Resources\AppConfigurationResource\RelationManagers;
use App\Models\AppConfiguration;
use Filament\Forms;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AppConfigurationResource extends Resource
{
    protected static ?string $model = AppConfiguration::class;

    protected static ?string $navigationIcon = 'heroicon-o-globe-alt';
    protected static ?string $navigationGroup = 'Settings';
    protected static ?string $label = 'App Config';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('app_name')->required()->maxLength(255),
                TextInput::make('phone')->maxLength(255),
                TextInput::make('email')->email()->maxLength(255),
                TextInput::make('address')->maxLength(255),
                TextInput::make('facebook_link')->url()->maxLength(255),
                TextInput::make('instagram_link')->url()->maxLength(255),
                TextInput::make('twitter_link')->url()->maxLength(255),
                TextInput::make('youtube_link')->url()->maxLength(255),
                TextInput::make('linkedin_link')->url()->maxLength(255),
                TextInput::make('whatsapp_link')->url()->maxLength(255),
                TextInput::make('playstore_link')->url()->maxLength(255),
                TextInput::make('appstore_link')->url()->maxLength(255),
                Textarea::make('about')->maxLength(1000),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('app_name')->searchable()->sortable(),
                TextColumn::make('email'),
                TextColumn::make('phone'),
                TextColumn::make('created_at')->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAppConfigurations::route('/'),
            // 'create' => Pages\CreateAppConfiguration::route('/create'),
            // 'edit' => Pages\EditAppConfiguration::route('/{record}/edit'),
        ];
    }
}
