<?php
namespace App\Filament\Resources;
use App\Filament\Resources\CategoryResource\Pages;
use App\Filament\Resources\CategoryResource\RelationManagers;
use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\{FileUpload, Select, TextInput, Textarea, Toggle};
use Filament\Tables\Columns\{BooleanColumn, ImageColumn, TextColumn};
class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = 'CMS Management';
    protected static ?string $label = 'Categories';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255)
                    ->reactive()
                    ->afterStateUpdated(fn($state, callable $set) => $set('slug', \Str::slug($state))),
                TextInput::make('slug')
                    ->required()
                    ->unique(ignoreRecord: true),
                Select::make('parent_id')
                    ->relationship('parent', 'name')
                    ->label('Parent Category')
                    ->searchable()
                    ->nullable(),
                FileUpload::make('icon')
                    ->directory('category-icons')
                    ->image()
                    ->label('Icon')
                    ->nullable(),
                FileUpload::make('image')
                    ->directory('category-images')
                    ->image()
                    ->imagePreviewHeight('150')
                    ->label('Thumbnail Image')
                    ->nullable(),
                Textarea::make('description')
                    ->rows(4)
                    ->maxLength(500),
                Toggle::make('is_featured')->label('Featured'),
                Toggle::make('is_active')->label('Active')->default(true),
            ]);
    }
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')->label('Thumbnail')->circular(),
                TextColumn::make('name')->searchable()->sortable(),
                TextColumn::make('slug')->toggleable()->limit(30),
                BooleanColumn::make('is_featured')->label('Featured'),
                BooleanColumn::make('is_active')->label('Active'),
                TextColumn::make('created_at')->date('d M Y')->label('Created'),
            ])
            ->defaultSort('created_at', 'desc')
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
            'index' => Pages\ListCategories::route('/'),
            // 'create' => Pages\CreateCategory::route('/create'),
            // 'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }
}
