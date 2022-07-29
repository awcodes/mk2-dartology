<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SetupResource\Pages;
use App\Models\Setup;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class SetupResource extends Resource
{
    protected static ?string $model = Setup::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('score')
                    ->required(),
                Forms\Components\Textarea::make('details')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('score')->searchable(),
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
            'index' => Pages\ManageSetups::route('/'),
        ];
    }
}
