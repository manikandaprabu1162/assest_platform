<?php

namespace App\Filament\Resources\AssetAttachments;

use App\Filament\Resources\AssetAttachments\Pages\CreateAssetAttachment;
use App\Filament\Resources\AssetAttachments\Pages\EditAssetAttachment;
use App\Filament\Resources\AssetAttachments\Pages\ListAssetAttachments;
use App\Filament\Resources\AssetAttachments\Schemas\AssetAttachmentForm;
use App\Filament\Resources\AssetAttachments\Tables\AssetAttachmentsTable;
use App\Models\AssetAttachment;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class AssetAttachmentResource extends Resource
{
    protected static ?string $model = AssetAttachment::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'AssesAttachment';

    public static function form(Schema $schema): Schema
    {
        return AssetAttachmentForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AssetAttachmentsTable::configure($table);
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
            'index' => ListAssetAttachments::route('/'),
            'create' => CreateAssetAttachment::route('/create'),
            'edit' => EditAssetAttachment::route('/{record}/edit'),
        ];
    }
}
