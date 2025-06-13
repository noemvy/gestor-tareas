<?php

namespace App\Filament\Widgets;

use App\Models\Tareas;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class TareasStat extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';
    protected static ?int $sort = 2;
    protected static ?string $heading = 'Tareas Recientes';

    public function table(Table $table): Table
    {
        return $table
            ->query(Tareas::query()->latest('fecha'))
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
