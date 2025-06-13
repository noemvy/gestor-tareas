<?php

namespace App\Filament\Widgets;

use App\Models\Proyectos;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class ProyectosStats extends BaseWidget
{
    protected static ?string $heading = 'Proyectos Recientes';
    protected int | string | array $columnSpan = 'full';

    protected static ?int $sort = 2;
    public function table(Table $table): Table

    {
        return $table
            ->query(Proyectos::query()->latest('fecha'))
            ->columns([
                Tables\Columns\TextColumn::make('nombre')->label('Nombre')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('materia.nombre')->label('Materia')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('fecha')->label('Fecha de Entrega')->sortable()->searchable(),
                Tables\Columns\SelectColumn::make('estado')->label('Estado del Proyecto')
                    ->options([
                        '😴No iniciado' => '😴No iniciado',
                        '👻En progreso' => '👻En progreso',
                        '⭐Finalizado' => '⭐Finalizado',
                    ])->sortable()->searchable(),
            ])
            ->filters([
                //
            ])
            ->defaultSort('fecha', 'desc') ;// Ordena por fecha descendente, opcional
    }
}
