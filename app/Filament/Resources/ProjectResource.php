<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectResource\Pages;
use App\Filament\Resources\ProjectResource\RelationManagers;
use App\Models\Project;
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
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\IconColumn;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = 'CMS Management';
    protected static ?string $label = 'Projects';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('thumbnail')
                    ->image()
                    ->imagePreviewHeight('150')
                    ->directory('projects/thumbnails')
                    ->label('Thumbnail Image')
                    ->required(),

                FileUpload::make('gallery')
                    ->image()
                    ->multiple()
                    ->reorderable()
                    ->imagePreviewHeight('100')
                    ->directory('projects/gallery')
                    ->label('Image Gallery'),

                TextInput::make('title')
                    ->required()
                    ->maxLength(255),

                RichEditor::make('body')
                    ->label('Project Details')
                    ->required()
                    ->columnSpanFull(),

                TextInput::make('meta_title')->label('Meta Title')->maxLength(255),
                Textarea::make('meta_description')->label('Meta Description')->maxLength(500),
                TextInput::make('meta_keywords')->label('Meta Keywords')->maxLength(255),

                Toggle::make('is_active')->label('Active')->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('thumbnail')->label('Thumb'),
                TextColumn::make('title')->searchable()->sortable(),
                IconColumn::make('is_active')->boolean()->label('Status'),
                TextColumn::make('created_at')->dateTime('d M Y')->label('Created'),
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
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
        ];
    }
}
