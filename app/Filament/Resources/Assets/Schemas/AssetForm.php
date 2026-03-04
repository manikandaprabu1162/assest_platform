<?php

namespace App\Filament\Resources\Assets\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class AssetForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('user_id')
                    ->required()
                    ->numeric(),
                TextInput::make('category_id')
                    ->required()
                    ->numeric(),
                TextInput::make('title')
                    ->required(),
                TextInput::make('slug')
                    ->required(),
                Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->prefix('$'),
                TextInput::make('thumbnail')
                    ->required(),
                TextInput::make('preview_link'),
                TextInput::make('file_path')
                    ->required(),
                TextInput::make('downloads')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('rating')
                    ->required()
                    ->numeric()
                    ->default(0.0),
                Toggle::make('status')
                    ->required(),
            ]);
    }
}
