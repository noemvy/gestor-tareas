<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProyectosResource\Pages;
use App\Filament\Resources\ProyectosResource\RelationManagers;
use App\Models\Materia;
use App\Models\Proyectos;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProyectosResource extends Resource
{
    protected static ?string $model = Proyectos::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nombre')
                ->label('Nombre Proyecto')
                ->required(),
                Forms\Components\DatePicker::make('fecha')
                ->label('Fecha de Entrega')
                ->required(),
                Forms\Components\Select::make('estado')
                ->label('Estado')
                ->options([
                    '😴No iniciado' => '😴No iniciado',
                    '👻En progreso' => '👻En progreso',
                    '⭐Finalizado' => '⭐Finalizado',

                ])->default('no_iniciado')
                ->required(),
                Forms\Components\Select::make('materia_id')
                ->label('Materia')
                ->options(Materia::all()->pluck('nombre','id'))
                ->required(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nombre')->label('Nombre')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('materia.nombre')->label('Materia')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('fecha')->label('Fecha de Entrega')->sortable()->searchable(),
                Tables\Columns\SelectColumn::make('estado')->label('Estado del Proyecto')
                ->options([
                    '😴No iniciado' => '😴No iniciado',
                    '👻En progreso' => '👻En progreso',
                    '⭐Finalizado' => '⭐Finalizado',

                ])
                ->sortable()->searchable(),
            ])
            ->filters([
                //
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
            'index' => Pages\ListProyectos::route('/'),
            'create' => Pages\CreateProyectos::route('/create'),
            'edit' => Pages\EditProyectos::route('/{record}/edit'),
        ];
    }
}
