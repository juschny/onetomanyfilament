<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EstadoResource\Pages;
use App\Filament\Resources\EstadoResource\RelationManagers;
use App\Models\Estado;
use App\Models\Estudiante;
use App\Models\Materia;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Filters\SelectFilter;

class EstadoResource extends Resource
{
    protected static ?string $model = Estado::class;

    protected static ?string $navigationIcon = 'heroicon-o-receipt-percent';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\TextInput::make('nombre')
                    ->required()
                    ->maxLength(191),
                Forms\Components\TextInput::make('apellido')
                    ->required()
                    ->maxLength(191),

                Forms\Components\Select::make('materias_id')
                    ->relationship('materias', 'nombre')
                    ->required()
                    ->searchable()
                    ->preload(),
                 
                
                Select::make('condicion')-> options([
                        'aprobado'=> 'aprobado',
                        'desaprobado'=> 'desaprobado',
                        'regular'=> 'regular',
                        'libre'=> 'libre',
                ]),
                Forms\Components\DatePicker::make('fecha')
                    ->label('fecha')
                    ->required(),
                    
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nombre')
                ->searchable()
                ->sortable(),
                Tables\Columns\TextColumn::make('apellido')
                ->searchable()
                ->sortable(),

                Tables\Columns\TextColumn::make('materias.nombre')
                    ->searchable()
                    ->sortable(),
                
                
                Tables\Columns\TextColumn::make('condicion')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('fecha')
                    ->date()
                    ->searchable()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),    
            ])
            ->filters([
                
                SelectFilter::make('materias')->relationship('materias', 'nombre'),
                
    
                
                SelectFilter::make('condicion')
                ->options([
                            'aprobado' => 'Aprobado',
                            'desaprobado' => 'Desaprobado',
                            'regular' => 'Regular',
                            'libre' => 'Libre',
                            
                          ])
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListEstados::route('/'),
            'create' => Pages\CreateEstado::route('/create'),
            'edit' => Pages\EditEstado::route('/{record}/edit'),
        ];
    }
}
