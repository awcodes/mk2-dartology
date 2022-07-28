<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RoutineResource\Pages;
use App\Models\Routine;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class RoutineResource extends Resource
{
    protected static ?string $model = Routine::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('targets')
                    ->maxLength(65535),
                Forms\Components\Textarea::make('goal')
                    ->maxLength(65535),
                Forms\Components\Textarea::make('instructions'),
                Forms\Components\Toggle::make('published')->inline(false),
                Forms\Components\TextInput::make('form')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('slug'),
                Tables\Columns\TextColumn::make('skills.name'),
                Tables\Columns\BooleanColumn::make('published')->alignCenter(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime('m/d/Y'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()->iconButton(),
                Tables\Actions\DeleteAction::make()->iconButton(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageRoutines::route('/'),
        ];
    }
}
