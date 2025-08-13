<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TestimonialResource\Pages;
use App\Filament\Resources\TestimonialResource\RelationManagers;
use App\Models\Testimonial;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TestimonialResource extends Resource
{
    protected static ?string $model = Testimonial::class;
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = 'CMS Management';
    protected static ?string $label = 'Testimonial';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('profile')
                    ->image()
                    ->imageEditor()
                    ->imagePreviewHeight('100')
                    ->directory('testimonials')
                    ->label('Profile Image')
                    ->nullable(),

                TextInput::make('name')
                    ->required()
                    ->maxLength(255),

                TextInput::make('designation')
                    ->maxLength(255),

                Textarea::make('review')
                    ->required()
                    ->maxLength(1000)
                    ->rows(5),

                Toggle::make('is_active')
                    ->label('Active')
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('profile')->circular(),
                TextColumn::make('name')->searchable()->sortable(),
                TextColumn::make('designation')->searchable(),
                TextColumn::make('review')->limit(50),
                IconColumn::make('is_active')->boolean()->label('Status'),
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
            'index' => Pages\ListTestimonials::route('/'),
            // 'create' => Pages\CreateTestimonial::route('/create'),
            // 'edit' => Pages\EditTestimonial::route('/{record}/edit'),
        ];
    }
}
