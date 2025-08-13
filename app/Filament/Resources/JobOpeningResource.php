<?php
namespace App\Filament\Resources;
use App\Filament\Resources\JobOpeningResource\Pages;
use App\Filament\Resources\JobOpeningResource\RelationManagers;
use App\Models\JobOpening;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\DateColumn;
use Filament\Forms\Components\{TextInput, Textarea, Select, DatePicker, Toggle, RichEditor};
use Filament\Tables\Columns\{TextColumn, BadgeColumn, ToggleColumn};
class JobOpeningResource extends Resource
{
    protected static ?string $model = JobOpening::class;
    // protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    
    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document';
    protected static ?string $navigationGroup = 'HR Management';
    protected static ?string $label = 'Job Opening';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('job_title')->required(),
                TextInput::make('position')->required(),
                Select::make('job_area')
                    ->required()
                    ->options([
                        'Development' => 'Development',
                        'Design' => 'Design',
                        'HR' => 'HR',
                        'Marketing' => 'Marketing',
                        'Sales' => 'Sales',
                        'Analysis' => 'Analysis',
                        'Finance' => 'Finance',
                        'Support' => 'Support',
                        'Operations' => 'Operations',
                        'QA' => 'QA',
                        'Product' => 'Product',
                    ]),
                Select::make('time')
                    ->required()
                    ->options([
                        'Full Time' => 'Full Time',
                        'Part Time' => 'Part Time',
                        'Internship' => 'Internship',
                        'Contract' => 'Contract',
                    ]),
                Select::make('job_type')
                    ->required()
                    ->options([
                        'Offline' => 'Offline',
                        'Remote' => 'Remote',
                        'Hybrid' => 'Hybrid',
                    ]),
                TextInput::make('location')->maxLength(255),
                TextInput::make('salary')->maxLength(255),
                DatePicker::make('application_deadline'),
                Toggle::make('is_active')->label('Active'),
                RichEditor::make('description')
                    ->label('Job Description')
                    ->placeholder('Start writing...')
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
                    ])->columnSpanFull()
            ]);
    }
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('job_title')->sortable()->searchable(),
                TextColumn::make('position')->sortable()->searchable(),
                BadgeColumn::make('job_area'),
                BadgeColumn::make('time'),
                BadgeColumn::make('job_type'),
                TextColumn::make('location')->toggleable(),
                TextColumn::make('salary')->toggleable(),
                TextColumn::make('application_deadline')->label('Deadline')->date(),
                ToggleColumn::make('is_active')->label('Active'),
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
            'index' => Pages\ListJobOpenings::route('/'),
            'create' => Pages\CreateJobOpening::route('/create'),
            'edit' => Pages\EditJobOpening::route('/{record}/edit'),
        ];
    }
}
