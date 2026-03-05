<?php

namespace App\Filament\Resources\AssetAttachments\Pages;

use App\Filament\Resources\AssetAttachments\AssetAttachmentResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAssetAttachments extends ListRecords
{
    protected static string $resource = AssetAttachmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
