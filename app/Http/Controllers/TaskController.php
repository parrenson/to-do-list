<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Task;
use App\Models\State;

use App\Exports\TaskExport;
use Maatwebsite\Excel\Facades\Excel;

class TaskController extends Controller
{
    /**
     * Obtiene todas las tareas ordenadas por fecha de creación descendente.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getTask()
    {
        $tasks = Task::orderBy('created_at', 'desc')->with('state')->get();

        $formattedTasks = $tasks->map(function ($task) {
            return [
                'id' => $task->id,
                'name' => $task->name,
                'stateName' => $task->state->name,
                'formatDate' => $task->created_at->format('d-m-Y'),
            ];
        });

        return response()->json([
            'status' => 200,
            'tasks' => $formattedTasks,
        ]);
    }

    /**
     * Valida campos vacios y si cumple con los validadores crea una nueva tarea, de lo contrario retorna un error.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createTask(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'task' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'message' => 'El campo no puede estar vacío',
            ], 200);
        }

        $task = new Task;
        $task->name = $request->task;
        $task->state_id = State::where('name', 'Pendiente')->first()->id;
        $task->save();

        return response()->json([
            'status' => 201,
        ], 201);
    }

    /**
     * Valida si la tarea existe en la DB y si aplica actualiza el estado de la tarea, de lo contrario retorna un error.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateTask(Request $request)
    {
        $task = Task::find($request->taskId);

        if ($task === null) {
            return response()->json([
                'status' => '400',
            ], 200);
        }

        if ($request->status == 'eliminar') {
            $task->delete();
            return response()->json([
                'status' => 200,
            ]);
        }

        $state = State::where('name', $request->status)->first()->id;
        $task->update([
            'state_id' => $state,
        ]);

        return response()->json([
            'status' => 200,
        ]);
    }

    /**
     * Descarga un archivo Excel con las tareas realizadas.
     *
     * @return \Illuminate\Http\Response
     */
    public function download_file()
    {
        $state = State::where('name', 'Realizada')->first()->id;
        $tasks = Task::where('state_id', $state)->with('state')->orderBy('created_at', 'desc')->get();

        if ($tasks->isEmpty()) {
            return response()->json([
                'status' => 400,
                'message' => 'No hay tareas realizadas',
            ], 200);
        }

        return Excel::download(new TaskExport, 'tasks.xlsx');
    }
}
