<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PropertyResource\Pages;
use App\Filament\Resources\PropertyResource\RelationManagers;
use App\Models\Property;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\ActionGroup;

class PropertyResource extends Resource
{
    protected static ?string $model = Property::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
    return $table
        ->columns([
            TextColumn::make('name')
                ->label('Nom')
                ->sortable()
                ->searchable(),

            TextColumn::make('description')
                ->limit(50)
                ->label('Description'),

            TextColumn::make('price_per_night')
                ->label('Prix / nuit (€)')
                ->money('eur'),

            TextColumn::make('bookings_count')
                ->label('Nb Réservations')
                ->counts('bookings'),
        ])
        ->actions([
            DeleteAction::make(),
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
            'index' => Pages\ListProperties::route('/'),
        ];
    }
    public static function getEloquentQuery(): Builder{
    return parent::getEloquentQuery()->withCount('bookings');
    }
}
