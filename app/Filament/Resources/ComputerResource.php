<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ComputerResource\Pages;
use App\Models\Computer;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use pxlrbt\FilamentExcel\Actions\Tables\ExportAction;
use pxlrbt\FilamentExcel\Exports\ExcelExport;
use Filament\Notifications\Notification;

class ComputerResource extends Resource
{
    protected static ?string $model = Computer::class;

    protected static ?string $navigationIcon = 'heroicon-o-computer-desktop';

    protected static ?string $navigationGroup = 'Data Asets';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('department_id')
                    ->label('Department')
                    ->relationship('department', 'department_name')
                    ->reactive()
                    ->required(),

                Forms\Components\Select::make('department_users_id')
                    ->label('Department User')
                    ->options(function (callable $get) {
                        $departmentId = $get('department_id');
                        if (!$departmentId) return [];
                        return \App\Models\DepartmentUser::where('department_id', $departmentId)
                            ->pluck('department_user_name', 'id');
                    })
                    ->required()
                    ->searchable()
                    ->disabled(fn(callable $get) => !$get('department_id'))
                    ->loadingMessage('Loading...'),
                Forms\Components\DatePicker::make('tanggal_pembelian'),
                Forms\Components\TextInput::make('specifications')
                    ->required(),
                Forms\Components\TextInput::make('operating_system')
                    ->required(),
                Forms\Components\Select::make('ket_pc')
                    ->options([
                        'Baik' => 'Baik',
                        'Perlu Maintenance' => 'Perlu Maintenance',
                        'Rusak' => 'Rusak',
                    ])
                    ->required(),
                Forms\Components\TextInput::make('monitor')
                    ->required(),
                Forms\Components\Select::make('ket_monitor')
                    ->options([
                        'Baik' => 'Baik',
                        'Rusak' => 'Rusak',
                    ])
                    ->required(),
                Forms\Components\TextInput::make('keyboard')
                    ->required(),
                Forms\Components\Select::make('ket_keyboard')
                    ->options([
                        'Baik' => 'Baik',
                        'Rusak' => 'Rusak',
                    ])
                    ->required(),
                Forms\Components\TextInput::make('mouse')
                    ->required(),
                Forms\Components\Select::make('ket_mouse')
                    ->options([
                        'Baik' => 'Baik',
                        'Rusak' => 'Rusak',
                    ])
                    ->required(),
                Forms\Components\Textarea::make('keterangan')
                    ->rows(3)
                    ->columnSpan('full')
                    ->required()
                    ->extraAttributes(['style' => 'text-transform: uppercase;'])
                    ->afterStateUpdated(fn($state, callable $set) => $set('keterangan', strtoupper($state))),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('No')
                    ->rowIndex(),
                Tables\Columns\TextColumn::make('department.department_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('departmentUser.department_user_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tanggal_pembelian')
                    ->date('j M Y')
                    ->searchable(),
                Tables\Columns\TextColumn::make('specifications')
                    ->searchable(),
                Tables\Columns\TextColumn::make('operating_system')
                    ->searchable(),
                Tables\Columns\TextColumn::make('ket_pc')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'Baik' => 'success',
                        'Perlu Maintenance' => 'warning',
                        'Rusak' => 'danger',
                    })
                    ->searchable(),
                Tables\Columns\TextColumn::make('monitor')
                    ->searchable(),
                Tables\Columns\TextColumn::make('ket_monitor')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'Baik' => 'success',
                        'Rusak' => 'danger',
                    })
                    ->searchable(),
                Tables\Columns\TextColumn::make('keyboard')
                    ->searchable(),
                Tables\Columns\TextColumn::make('ket_keyboard')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'Baik' => 'success',
                        'Rusak' => 'danger',
                    })
                    ->searchable(),
                Tables\Columns\TextColumn::make('mouse')
                    ->searchable(),
                Tables\Columns\TextColumn::make('ket_mouse')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'Baik' => 'success',
                        'Rusak' => 'danger',
                    })
                    ->searchable(),
                Tables\Columns\TextColumn::make('keterangan')
                    ->searchable(),
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
                SelectFilter::make('department_id')
                    ->label('Department')
                    ->relationship('department', 'department_name')

            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            // ->bulkActions([
            //     Tables\Actions\BulkActionGroup::make([
            //         Tables\Actions\DeleteBulkAction::make(),
            //     ]),
            // ])
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->label('Add Computer')
                    ->icon('heroicon-o-plus')
                    ->color('primary'),

                ExportAction::make()
                    ->label('Export Data')
                    ->icon('heroicon-o-arrow-down-tray')
                    ->exports([
                        ExcelExport::make()
                            ->fromTable()
                            ->withFilename('Data Computer - ' . now()->format('j M Y'))
                            ->except(['No'])
                    ])
                    ->after(function () {
                        // Notifikasi muncul setelah download selesai
                        Notification::make()
                            ->title('Export Berhasil')
                            ->body('Data berhasil di export')
                            ->success()
                            ->duration(5000)
                            ->send();
                    })
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
            'index' => Pages\ListComputers::route('/'),
            // 'view' => Pages\ViewComputer::route('/{record}'),
            // 'create' => Pages\CreateComputer::route('/create'),
            // 'edit' => Pages\EditComputer::route('/{record}/edit'),
        ];
    }
}
