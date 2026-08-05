<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use App\Enums\ProductStatusEnum;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->unique(),
                TextInput::make('price')
                    ->required()
                    ->prefix('$')
                    ->rule('numeric'),
                Select::make('status')
                    ->options(ProductStatusEnum::class)
                    ->required(),
                // TextEditor::make('description'),
            ]);
    }
}
