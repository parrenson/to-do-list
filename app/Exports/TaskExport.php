<?php

namespace App\Exports;

use App\Models\Task;
use App\Models\State;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TaskExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $state = State::where('name', 'Realizada')->first()->id;
        $tasks = Task::where('state_id', $state)->with('state')->orderBy('created_at', 'desc')->get();
        
        return $tasks->map(function ($task) {
            return [
                'ID' => $task->id,
                'Tarea' => $task->name,
                'Estado' => $task->state->name,
                'Fecha de Creación' => $task->created_at->format('d-m-Y'),
                'Fecha de Actualización' => $task->updated_at->format('d-m-Y'),
            ];
        });
    }
    public function headings(): array
    {
        return [
            'ID',
            'Tarea',
            'Estado',
            'Fecha de Creación',
            'Fecha de Actualización'
        ];
    }
}
