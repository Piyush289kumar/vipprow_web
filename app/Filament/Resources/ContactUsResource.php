<?php
namespace App\Filament\Resources;
use App\Filament\Resources\ContactUsResource\Pages;
use App\Filament\Resources\ContactUsResource\RelationManagers;
use App\Models\ContactUs;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
class ContactUsResource extends Resource
{
    protected static ?string $model = ContactUs::class;
    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-right';
    protected static ?string $navigationGroup = 'CMS Management';
    protected static ?string $label = 'Contact Us';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('first_name')->required()->maxLength(100),
                TextInput::make('last_name')->maxLength(100),
                TextInput::make('email')->email()->required()->maxLength(150),
                TextInput::make('phone')->maxLength(20),
                TextInput::make('subject')->maxLength(255),
                Textarea::make('message')->required()->rows(5)->maxLength(1000),
                TextInput::make('ip_address')->label('IP Address')->disabled(),
                Toggle::make('is_resolved')->label('Marked as Resolved')->default(false),
            ]);
    }
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('first_name')->searchable(),
                TextColumn::make('last_name')->searchable(),
                TextColumn::make('email')->copyable(),
                TextColumn::make('message')->limit(30),
                IconColumn::make('is_resolved')->boolean()->label('Resolved'),
                TextColumn::make('created_at')->dateTime('d M Y h:i A')->label('Submitted'),
            ])->defaultSort('created_at', 'desc')
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
            'index' => Pages\ListContactUs::route('/'),
            // 'create' => Pages\CreateContactUs::route('/create'),
            // 'edit' => Pages\EditContactUs::route('/{record}/edit'),
        ];
    }
}
