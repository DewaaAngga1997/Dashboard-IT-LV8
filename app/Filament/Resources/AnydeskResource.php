<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AnydeskResource\Pages;
use App\Filament\Resources\AnydeskResource\RelationManagers;
use App\Models\Anydesk;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use pxlrbt\FilamentExcel\Actions\Tables\ExportAction;
use pxlrbt\FilamentExcel\Exports\ExcelExport;
use Filament\Notifications\Notification;

class AnydeskResource extends Resource
{
    protected static ?string $model = Anydesk::class;

    protected static ?string $navigationIcon = 'heroicon-o-tv';

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
                Forms\Components\TextInput::make('anydesk_id')
                    ->required(),
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
                Tables\Columns\TextColumn::make('anydesk_id')
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
                // Tables\Actions\ViewAction::make(),
                Tables\Actions\Action::make('connectAnyDesk')
                    ->label('Connect AnyDesk')
                    ->icon('heroicon-o-computer-desktop')
                    ->color('success')
                    ->action(function ($record) {
                        $anydeskId = $anydeskId = $record->anydesk_id;
                        if ($anydeskId) {
                            // Jalankan AnyDesk dengan ID yang sesuai
                            exec("start anydesk:{$anydeskId}");
                        }
                    }),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            // ->bulkActions([
            //     Tables\Actions\BulkActionGroup::make([
            //         Tables\Actions\DeleteBulkAction::make(),
            //     ]),
            // ]);

            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->label('Add Anydesk')
                    ->icon('heroicon-o-plus')
                    ->color('primary'),

                ExportAction::make()
                    ->label('Export Data')
                    ->icon('heroicon-o-arrow-down-tray')
                    ->exports([
                        ExcelExport::make()
                            ->fromTable()
                            ->withFilename('Data Anydesk - ' . now()->format('j M Y'))
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
            'index' => Pages\ListAnydesks::route('/'),
            // 'create' => Pages\CreateAnydesk::route('/create'),
            // 'edit' => Pages\EditAnydesk::route('/{record}/edit'),
        ];
    }
}
