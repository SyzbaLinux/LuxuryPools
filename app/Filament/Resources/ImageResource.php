<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ImageResource\Pages;
use App\Filament\Resources\ImageResource\RelationManagers;
use App\Models\Image;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ImageResource extends Resource
{
    protected static ?string $model = Image::class;

    protected static ?string $navigationIcon = 'image';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

              Forms\Components\Section::make()->schema([

                  Forms\Components\FileUpload::make('image')
                      ->required()
                      ->columnSpan(1),

                  Forms\Components\Select::make('project_id')
                      ->relationship('project','project_name')
                      ->preload()
                      ->searchable()
                      ->required()
                      ->columnSpan(1),



                  Forms\Components\RichEditor::make('description')
                      ->required()
                      ->columnSpan(2)


              ])->columns(2)

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
               Tables\Columns\TextColumn::make('project.project_name'),
               Tables\Columns\ImageColumn::make('image'),
               Tables\Columns\TextColumn::make('description')->html(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make()->button()->slideOver(),
                Tables\Actions\EditAction::make()->button(),
                Tables\Actions\DeleteAction::make()->button(),
            ]);
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
            'index' => Pages\ListImages::route('/'),
            'create' => Pages\CreateImage::route('/create'),
            'edit' => Pages\EditImage::route('/{record}/edit'),
        ];
    }
}
