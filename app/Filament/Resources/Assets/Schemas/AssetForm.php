<?php

namespace App\Filament\Resources\Assets\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\RichEditor;
use Filament\Schemas\Schema;
use App\Models\User;
use App\Models\Category;

class AssetForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('user_id')
                    ->label('User')
                    ->required()
                    ->relationship('user', 'name'), 

                Select::make('category_id')
                    ->label('Category')
                    ->required()
                    ->relationship('category', 'name'), 

                TextInput::make('title')->required(),
                TextInput::make('slug')->required(),
                RichEditor::make('description')
                    ->required()
                    ->columnSpanFull()
                    ->toolbarButtons([
                        'attachFiles',
                        'blockquote',
                        'bold',
                        'bulletList',
                        'codeBlock',
                        'h2',
                        'h3',
                        'italic',
                        'link',
                        'orderedList',
                        'redo',
                        'strike',
                        'undo',
                    ]),
                TextInput::make('price')->required()->numeric()->prefix('$'),

                FileUpload::make('thumbnail')
                    ->label('Thumbnail Image')
                    ->image()
                    ->directory('assets/thumbnails')
                    ->required(),

                TextInput::make('preview_link'),

                FileUpload::make('file_path')
                    ->label('Source Code ZIP')
                    ->directory('assets/files')
                    ->acceptedFileTypes(['application/zip'])
                    ->required(),

                TextInput::make('downloads')->numeric()->default(0),
                TextInput::make('rating')->numeric()->default(0),
                
                KeyValue::make('tech_json')
                    ->label('Technical Details (JSON)')
                    ->keyLabel('Property')
                    ->valueLabel('Value')
                    ->columnSpanFull(),

                Toggle::make('status')->required(),
            ]);
    }
}