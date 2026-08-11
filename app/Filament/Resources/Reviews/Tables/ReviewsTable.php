<?php

namespace App\Filament\Resources\Reviews\Tables;

use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\DeleteAction;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ReviewsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nama Pengulas')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('rating')
                    ->label('Rating Bintang')
                    ->sortable()
                    ->formatStateUsing(fn ($state) => str_repeat('⭐', (int) $state) . " ({$state}/5)"),

                TextColumn::make('comment')
                    ->label('Komentar Pengunjung')
                    ->limit(40)
                    ->searchable(),

                TextColumn::make('admin_reply')
                    ->label('Balasan Admin')
                    ->limit(40)
                    ->placeholder('Belum dibalas')
                    ->badge(fn ($state) => filled($state))
                    ->color(fn ($state) => filled($state) ? 'success' : 'gray'),

                TextColumn::make('reviewable_type')
                    ->label('Kategori Item')
                    ->formatStateUsing(function ($state) {
                        return match ($state) {
                            'App\Models\Homestay' => 'Homestay',
                            'App\Models\UmkmProduct' => 'Produk UMKM',
                            default => $state,
                        };
                    })
                    ->badge()
                    ->color(fn ($state) => $state === 'App\Models\Homestay' ? 'info' : 'warning'),

                TextColumn::make('reviewable.name')
                    ->label('Nama Item')
                    ->searchable()
                    ->default('-'),

                TextColumn::make('created_at')
                    ->label('Tanggal')
                    ->dateTime('d M Y, H:i')
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->recordActions([
                Action::make('reply')
                    ->label('Balas Ulasan')
                    ->icon('heroicon-o-chat-bubble-left-right')
                    ->color('success')
                    ->modalHeading('Balas Ulasan Pengunjung')
                    ->modalSubmitActionLabel('Simpan Balasan')
                    ->fillForm(fn ($record): array => [
                        'admin_reply' => $record->admin_reply,
                    ])
                    ->form([
                        Placeholder::make('reviewer')
                            ->label('Pengulas')
                            ->content(fn ($record) => "{$record->name} (" . str_repeat('⭐', (int) $record->rating) . " / 5)"),
                        Placeholder::make('user_comment')
                            ->label('Komentar Pengunjung')
                            ->content(fn ($record) => "\"{$record->comment}\""),
                        Textarea::make('admin_reply')
                            ->label('Balasan Resmi Admin / Pengelola')
                            ->placeholder('Tuliskan tanggapan atau ucapan terima kasih dari pengelola Kampung Saporkren...')
                            ->required()
                            ->rows(4),
                    ])
                    ->action(function ($record, array $data): void {
                        $record->update([
                            'admin_reply' => $data['admin_reply'],
                            'replied_at' => now(),
                        ]);
                    }),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
