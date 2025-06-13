<?php

namespace App\Filament\Resources\ProyectosResource\Pages;

use App\Filament\Resources\ProyectosResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProyectos extends EditRecord
{
    protected static string $resource = ProyectosResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
