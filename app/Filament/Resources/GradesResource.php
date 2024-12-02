<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GradesResource\Pages;
use App\Filament\Resources\GradesResource\RelationManagers;
use App\Models\Grades;
use App\Models\GradesModel;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GradesResource extends Resource
{
    protected static ?string $model = GradesModel::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    protected static ?string $navigationLabel = 'Kelola Grades';
    public static ?string $label = 'Grades';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('score')->numeric()->required(),
                Forms\Components\Textarea::make('feedback'),
                Forms\Components\Select::make('submission_id')
                    ->relationship('submission', 'id')
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
                Tables\Columns\TextColumn::make('submission.id')->label('Submission'),
                Tables\Columns\TextColumn::make('student.name')->label('Student'),
                Tables\Columns\TextColumn::make('score'),
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
            'index' => Pages\ListGrades::route('/'),
            'create' => Pages\CreateGrades::route('/create'),
            'edit' => Pages\EditGrades::route('/{record}/edit'),
        ];
    }
}
