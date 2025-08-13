<?php
namespace App\Filament\Resources;
use App\Filament\Resources\JobApplicationResource\Pages;
use App\Filament\Resources\JobApplicationResource\RelationManagers;
use App\Models\JobApplication;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\{TextInput, Textarea, Select, FileUpload, DatePicker, Toggle, Grid, TagsInput};
use Filament\Tables\Columns\{TextColumn, BadgeColumn, BooleanColumn};
class JobApplicationResource extends Resource
{
    protected static ?string $model = JobApplication::class;
    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document';
    protected static ?string $navigationGroup = 'HR Management';
    protected static ?string $label = 'Job Application';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(2)->schema([
                    Select::make('job_opening_id')
                        ->label('Job Opening')
                        ->relationship('jobOpening', 'job_title', fn($query) => $query->where('is_active', true))
                        ->required(),
                    TextInput::make('full_name')->required(),
                    TextInput::make('email')->email()->required(),
                    TextInput::make('phone')->required(),
                ]),
                Grid::make(3)->schema([
                    Select::make('gender')
                        ->options([
                            'Male' => 'Male',
                            'Female' => 'Female',
                            'Other' => 'Other',
                            'Prefer not to say' => 'Prefer not to say',
                        ])
                        ->searchable()
                        ->native(false),
                    Select::make('marital_status')
                        ->options([
                            'Single' => 'Single',
                            'Married' => 'Married',
                            'Divorced' => 'Divorced',
                            'Widowed' => 'Widowed',
                            'Separated' => 'Separated',
                            'Prefer not to say' => 'Prefer not to say',
                        ])
                        ->searchable()
                        ->native(false),
                    DatePicker::make('date_of_birth'),
                ]),
                Grid::make(4)->schema([
                    TextInput::make('city'),
                    TextInput::make('state'),
                    TextInput::make('zip_code'),
                    TextInput::make('country'),
                ]),
                Textarea::make('address')->columnSpanFull(),
                Grid::make(3)->schema([
                     FileUpload::make('resume')
                    ->label('Resume')
                    ->directory('resumes')
                    ->preserveFilenames()
                    ->acceptedFileTypes(['application/pdf'])
                    ->downloadable(),
                    TextInput::make('linkedin'),
                    TextInput::make('github'),
                    TextInput::make('leetcode'),
                    TextInput::make('portfolio_link'),
                    TextInput::make('personal_website'),
                ]),
                Grid::make(2)->schema([
                    TextInput::make('highest_qualification'),
                    TextInput::make('university'),
                    TextInput::make('field_of_study'),
                    TextInput::make('passing_year'),
                ]),
                Textarea::make('experience'),
                TextInput::make('total_experience_years'),
                TextInput::make('current_employer'),
                TextInput::make('current_job_title'),
                TextInput::make('current_salary'),
                TextInput::make('notice_period'),
                TagsInput::make('skills')
                    ->dehydrateStateUsing(fn($state) => is_array($state) ? implode(', ', $state) : $state)
                    ->nullable(),
                Textarea::make('projects'),
                TagsInput::make('certifications')
                    ->dehydrateStateUsing(fn($state) => is_array($state) ? implode(', ', $state) : $state)
                    ->nullable(),
                TagsInput::make('languages_known')
                    ->dehydrateStateUsing(fn($state) => is_array($state) ? implode(', ', $state) : $state)
                    ->nullable(),
                Textarea::make('cover_letter'),
                Textarea::make('additional_info'),
                TextInput::make('expected_salary'),
                TextInput::make('preferred_job_type'),
                TextInput::make('preferred_location'),
                DatePicker::make('available_from'),
                TextInput::make('reference_name'),
                TextInput::make('reference_email'),
                TextInput::make('reference_phone'),
                TextInput::make('reference_relation'),
                Select::make('status')
                    ->options([
                        'Pending' => 'Pending',
                        'Reviewed' => 'Reviewed',
                        'Shortlisted' => 'Shortlisted',
                        'Rejected' => 'Rejected',
                        'Hired' => 'Hired',
                    ])
                    ->default('Pending'),
                Textarea::make('admin_notes'),
                Toggle::make('is_starred')->label('Starred by HR'),
            ]);
    }
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('full_name')->sortable()->searchable(),
                TextColumn::make('email')->searchable(),
                TextColumn::make('jobOpening.job_title')->label('Job Title')->sortable(),
                BadgeColumn::make('status')->colors([
                    'gray' => 'Pending',
                    'info' => 'Reviewed',
                    'warning' => 'Shortlisted',
                    'danger' => 'Rejected',
                    'success' => 'Hired',
                ]),
                BooleanColumn::make('is_starred')->label('Starred'),
                TextColumn::make('created_at')->label('Applied On')->dateTime('d M Y'),
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
            'index' => Pages\ListJobApplications::route('/'),
            'create' => Pages\CreateJobApplication::route('/create'),
            'edit' => Pages\EditJobApplication::route('/{record}/edit'),
        ];
    }
}
