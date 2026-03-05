<?php

namespace App\Filament\Resources\AssetAttachments\Pages;

use App\Filament\Resources\AssetAttachments\AssetAttachmentResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditAssetAttachment extends EditRecord
{
    protected static string $resource = AssetAttachmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
