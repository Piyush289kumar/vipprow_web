<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BlogResource\Pages;
use App\Filament\Resources\BlogResource\RelationManagers;
use App\Models\Blog;
use Filament\Forms;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
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
use Illuminate\Support\Str;

class BlogResource extends Resource
{
    protected static ?string $model = Blog::class;
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = 'CMS Management';
    protected static ?string $label = 'Blogs';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->required()
                    ->maxLength(255)
                    ->reactive()
                    ->afterStateUpdated(
                        fn($state, callable $set) =>
                        $set('slug', Str::slug($state))
                    ),

                TextInput::make('slug')
                    ->unique(ignoreRecord: true)
                    ->required()
                    ->maxLength(255),

                Select::make('category_id')
                    ->label('Category')
                    ->relationship('category', 'name')
                    ->searchable()
                    ->preload()
                    ->nullable(),

                CheckboxList::make('group_tags')
                    ->options([
                        'Latest News' => 'Latest News',
                        'Build' => 'Build',
                        'Thinks' => 'Thinks',
                        'Informational' => 'Informational',
                    ])
                    ->label('Group Tags')
                    ->columns(2),

                FileUpload::make('image')
                    ->image()
                    ->imagePreviewHeight('150')
                    ->directory('blogs')
                    ->label('Featured Image'),

                FileUpload::make('gallery_images')
                    ->multiple()
                    ->image()
                    ->imagePreviewHeight('100')
                    ->directory('blogs/gallery')
                    ->label('Gallery Images'),

                TextInput::make('video_url')
                    ->url()
                    ->label('YouTube / Video Link')
                    ->nullable(),

                TextInput::make('read_time')
                    ->label('Blog Read Time')
                    ->required()
                    ->maxLength(255),

                RichEditor::make('body')
                    ->label('Blog Content')
                    ->placeholder('Start writing your blog...')
                    ->required()
                    ->toolbarButtons([
                        'attachFiles',
                        'bold',
                        'italic',
                        'underline',
                        'strike',
                        'link',
                        'blockquote',
                        'h2',
                        'h3',
                        'bulletList',
                        'orderedList',
                        'codeBlock',
                        'undo',
                        'redo',
                        'horizontalRule'
                    ])
                    ->columnSpanFull()
                    ->extraAttributes(['style' => 'min-height: 300px;']),

                TextInput::make('meta_title')->maxLength(255),
                Textarea::make('meta_description')->maxLength(500),
                TextInput::make('meta_keywords')->maxLength(255),
                Toggle::make('is_active')->label('Publish')->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')->label('Thumbnail')->circular(),
                TextColumn::make('title')->searchable()->sortable(),
                TextColumn::make('category.name')->label('Category'),
                TextColumn::make('group_tags')->label('Group Tab'),
                IconColumn::make('is_featured')->boolean()->label('Featured'),
                IconColumn::make('is_active')->boolean()->label('Status'),
                TextColumn::make('created_at')->dateTime('d M Y')->label('Posted On'),
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
            'index' => Pages\ListBlogs::route('/'),
            'create' => Pages\CreateBlog::route('/create'),
            'edit' => Pages\EditBlog::route('/{record}/edit'),
        ];
    }
}
