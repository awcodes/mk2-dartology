<?php

namespace App\Filament\Resources;

use App\Enums\UserStatus;
use App\Filament\Resources\UserResource\Pages\CreateUser;
use App\Filament\Resources\UserResource\Pages\EditUser;
use App\Filament\Resources\UserResource\Pages\ListUsers;
use App\Models\User;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use FilamentAddons\Forms\Fields\PasswordGenerator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $label = 'User';

    protected static ?string $navigationGroup = 'Filament Shield';

    protected static ?string $navigationIcon = 'heroicon-o-user-circle';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Details')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required(),
                        Forms\Components\TextInput::make('username')
                            ->required(),
                        Forms\Components\TextInput::make('nick_name'),
                        Forms\Components\FileUpload::make('avatar'),
                        Forms\Components\TextInput::make('email')
                            ->required()
                            ->email()
                            ->unique(User::class, 'email', fn ($record) => $record),
                        Forms\Components\Toggle::make('reset_password')
                            ->columnSpan('full')
                            ->reactive()
                            ->dehydrated(false)
                            ->hidden(function ($livewire) {
                                if ($livewire instanceof CreateUser) {
                                    return true;
                                }
                            }),
                        PasswordGenerator::make('password')
                            ->columnSpan('full')
                            ->visible(function ($livewire, $get) {
                                if ($livewire instanceof CreateUser) {
                                    return true;
                                }

                                return $get('reset_password') == true;
                            })
                            ->rules(config('filament-breezy.password_rules', 'max:8'))
                            ->required()
                            ->dehydrateStateUsing(function ($state) {
                                return Hash::make($state);
                            }),
                        Forms\Components\Radio::make('status')
                            ->options(UserStatus::array())
                            ->columnSpan('full')
                            ->columns(4),
                        Forms\Components\CheckboxList::make('roles')
                            ->columnSpan('full')
                            ->relationship('roles', 'name', function (Builder $query) {
                                if (! auth()->user()->hasRole('super_admin')) {
                                    return $query->where('name', '<>', 'super_admin');
                                }

                                return $query;
                            })
                            ->getOptionLabelFromRecordUsing(function ($record) {
                                return Str::of($record->name)->headline();
                            })
                            ->columns(4),
                    ])->columns(['md' => 2]),
                Forms\Components\Section::make('Permissions')
                    ->description('Users with roles have permission to completely manage resources based on the permissions set under the Roles Menu. To limit a user\'s access to specific resources disable thier roles and assign them individual permissions below.')
                    ->collapsible()
                    ->collapsed()
                    ->schema([
                        Forms\Components\CheckboxList::make('permissions')
                            ->columnSpan('full')
                            ->relationship('permissions', 'name')
                            ->getOptionLabelFromRecordUsing(function ($record) {
                                return Str::of($record->name)->replace('::', ' ')->headline();
                            })
                            ->columns(['md' => 2, 'lg' => 3]),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('avatar_url')->size(32),
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\BadgeColumn::make('status')
                    ->enum(UserStatus::array())
                    ->colors(UserStatus::colors()),
                Tables\Columns\TextColumn::make('roles.name')
                    ->formatStateUsing(function ($state) {
                        return Str::of($state)->headline();
                    }),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('roles')->relationship('roles', 'name'),
                Tables\Filters\SelectFilter::make('status')->options(UserStatus::array()),
            ])
            ->actions([
                Tables\Actions\EditAction::make()->iconButton(),
                Tables\Actions\DeleteAction::make()->iconButton(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ])
            ->defaultSort('name', 'asc');
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListUsers::route('/'),
            'create' => CreateUser::route('/create'),
            'edit' => EditUser::route('/{record}/edit'),
        ];
    }

    protected static function getNavigationBadge(): ?string
    {
        return static::$model::count();
    }

    public static function getPermissions()
    {
        $permissions = Permission::get();
        $groups = [];

        $permissions->map(function ($p) {
            $name = explode(' ', $p->name);
        });
    }
}
