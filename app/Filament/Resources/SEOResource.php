<?php
namespace App\Filament\Resources;
use App\Filament\Resources\SEOResource\Pages;
use App\Filament\Resources\SEOResource\RelationManagers;
use App\Models\SEO;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\{TextInput, Textarea, Toggle, Select, FileUpload, Grid, KeyValue, Tabs, Tabs\Tab};
use Filament\Tables\Columns\{TextColumn, IconColumn, BooleanColumn};
class SEOResource extends Resource
{
    protected static ?string $model = SEO::class;
    protected static ?string $navigationIcon = 'heroicon-o-globe-alt';
    protected static ?string $navigationGroup = 'Settings';
    protected static ?string $label = 'SEO Settings';
    public static function form(Form $form): Form
    {
        return $form->schema([
            Tabs::make('SEO Configuration')
                ->columnSpanFull()
                ->tabs([
                    Tab::make('General')->schema([
                        Grid::make(3)->schema([
                            TextInput::make('page_name')
                                ->required()
                                ->unique(ignoreRecord: true),
                            TextInput::make('route_name')
                                ->label('Route Name')
                                ->nullable(),
                            Select::make('locale')->options([
                                'en' => 'English',
                                'hi' => 'Hindi',
                                'fr' => 'French',
                            ])->default('en'),
                            FileUpload::make('favicon_icon')
                                ->image()
                                ->directory('seo/favicons')
                                ->nullable()
                                ->columnSpan(3),
                        ])->columnSpanFull()
                    ]),
                    Tab::make('Meta')->schema([
                        TextInput::make('meta_title')->maxLength(255)->nullable()->columnSpanFull(),
                        Textarea::make('meta_description')->nullable()->columnSpanFull(),
                        TextInput::make('canonical_url')->nullable()->columnSpanFull(),
                        TextInput::make('meta_keywords')->placeholder('keyword1, keyword2')->nullable()->columnSpanFull(),
                    ]),
                    Tab::make('Open Graph')->schema([
                        TextInput::make('og_title')->nullable()->columnSpanFull(),
                        Textarea::make('og_description')->nullable()->columnSpanFull(),
                        TextInput::make('og_type')->default('website')->columnSpanFull(),
                        TextInput::make('og_url')->nullable()->columnSpanFull(),
                        FileUpload::make('og_image')
                            ->image()
                            ->directory('seo/og_images')
                            ->nullable()
                            ->columnSpanFull(),
                    ]),
                    Tab::make('Twitter')->schema([
                        TextInput::make('twitter_card')->default('summary_large_image')->columnSpanFull(),
                        TextInput::make('twitter_title')->nullable()->columnSpanFull(),
                        Textarea::make('twitter_description')->nullable()->columnSpanFull(),
                        FileUpload::make('twitter_image')
                            ->image()
                            ->directory('seo/twitter_images')
                            ->nullable()
                            ->columnSpanFull(),
                    ]),
                    Tab::make('Advanced')->schema([
                        Toggle::make('no_index')->columnSpanFull(),
                        Toggle::make('no_follow')->columnSpanFull(),
                        KeyValue::make('custom_meta')
                            ->label('Custom Meta Tags')
                            ->keyLabel('Meta Name')
                            ->valueLabel('Meta Content')
                            ->nullable()
                            ->columnSpanFull(),
                        Textarea::make('schema_markup')
                            ->rows(10)
                            ->placeholder('{ "@context": "https://schema.org", ... }')
                            ->nullable()
                            ->columnSpanFull(),
                    ]),
                    Tab::make('Sitemap')->schema([
                        Toggle::make('include_in_sitemap')->columnSpanFull(),
                        TextInput::make('priority')->numeric()->default(0.5)->step(0.1)->columnSpanFull(),
                        Select::make('change_frequency')->options([
                            'always' => 'Always',
                            'hourly' => 'Hourly',
                            'daily' => 'Daily',
                            'weekly' => 'Weekly',
                            'monthly' => 'Monthly',
                            'yearly' => 'Yearly',
                            'never' => 'Never',
                        ])->default('monthly')->columnSpanFull(),
                    ])
                ]),
        ]);
    }
    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('page_name')->searchable(),
            TextColumn::make('locale')->sortable(),
            BooleanColumn::make('no_index')->label('No Index'),
            BooleanColumn::make('include_in_sitemap')->label('Sitemap'),
            TextColumn::make('priority')->label('Priority')->sortable(),
            TextColumn::make('updated_at')->dateTime()->sortable(),
        ])
            ->defaultSort('updated_at', 'desc')
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
            'index' => Pages\ListSEOS::route('/'),
            // 'create' => Pages\CreateSEO::route('/create'),
            // 'edit' => Pages\EditSEO::route('/{record}/edit'),
        ];
    }
}
