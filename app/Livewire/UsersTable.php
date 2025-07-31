<?php

namespace App\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\User;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;

class UsersTable extends DataTableComponent
{
    protected $model = User::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setSearchEnabled();
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")->searchable()->sortable(),
            Column::make("Name", "name")->searchable()->sortable(),
            Column::make("Email", "email")->searchable()->sortable(),
            Column::make("Created at", "created_at")->searchable()->sortable(),
            Column::make("Updated at", "updated_at")->searchable()->sortable(),
            LinkColumn::make('Action')
                ->title(fn($row) => 'View')
                ->location(fn($row) => route('users.show', $row))
                ->attributes(fn($row) => [
                    'class' => 'btn btn-info btn-sm',
                ]),
        ];
    }
}
