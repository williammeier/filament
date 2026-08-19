<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use App\Enums\ProductStatusEnum;
use Filament\Forms\Components\ModalTableSelect;
use App\Filament\Tables\CategoriesTable;

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
                ModalTableSelect::make('category_id')
                    ->relationship('category', 'name')
                    ->tableConfiguration(CategoriesTable::class),
                // Select::make('category_id')
                //     ->relationship('category', 'name'),
                // TextEditor::make('description'),
            ]);
    }
}
