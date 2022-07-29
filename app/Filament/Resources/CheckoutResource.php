<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CheckoutResource\Pages;
use App\Models\Checkout;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class CheckoutResource extends Resource
{
    protected static ?string $model = Checkout::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('out')
                    ->required(),
                Forms\Components\TextInput::make('primary')
                    ->maxLength(255),
                Forms\Components\TextInput::make('secondary')
                    ->maxLength(255),
                Forms\Components\TextInput::make('tertiary')
                    ->maxLength(255),
                Forms\Components\Textarea::make('details')
                    ->maxLength(16777215),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('out')->searchable(),
                Tables\Columns\TextColumn::make('primary'),
                Tables\Columns\TextColumn::make('secondary'),
                Tables\Columns\TextColumn::make('tertiary'),
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
            'index' => Pages\ManageCheckouts::route('/'),
        ];
    }
}
