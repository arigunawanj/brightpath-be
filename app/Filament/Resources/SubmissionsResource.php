<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SubmissionsResource\Pages;
use App\Filament\Resources\SubmissionsResource\RelationManagers;
use App\Models\SubmissionModel;
use App\Models\Submissions;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SubmissionsResource extends Resource
{
    protected static ?string $model = SubmissionModel::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationLabel = 'Kelola Submissions';
    public static ?string $label = 'Submissions';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Textarea::make('content'),
                Forms\Components\FileUpload::make('file_path'),
                Forms\Components\Select::make('assignment_id')
                    ->relationship('assignment', 'title')
                    ->required(),
                Forms\Components\Select::make('student_id')
                    ->relationship('student', 'name')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('assignment.title')->label('Assignment'),
                Tables\Columns\TextColumn::make('student.name')->label('Student'),
                Tables\Columns\TextColumn::make('created_at')->dateTime(),
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
            'index' => Pages\ListSubmissions::route('/'),
            'create' => Pages\CreateSubmissions::route('/create'),
            'edit' => Pages\EditSubmissions::route('/{record}/edit'),
        ];
    }
}
