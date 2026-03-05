<?php

namespace App\Filament\Resources\AssetAttachments\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;
use App\Models\Asset;

class AssetAttachmentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('asset_id')
                    ->label('Asset')
                    ->options(Asset::query()
                        ->orderBy('title')
                        ->pluck('title', 'id'))
                    ->searchable()
                    ->required(),

                FileUpload::make('preview_image')
                    ->label('Preview Image')
                    ->image()
                    ->directory('assets/previews'),

                TextInput::make('preview_link')
                    ->label('Preview Link')
                    ->url(),
            ]);
    }
}