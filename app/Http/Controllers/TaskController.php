<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Mckenziearts\Notify\Facades\Notify;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'state' => 'required|in:Pendiente,En Progreso,Completada,Cancelada',
            'priority' => 'required|in:Alta,Media,Baja',
            'type' => 'required|in:Personal,Laboral,Educativa',
            'reminder' => 'required|string',
            'f_creation' => 'required|date',
            'f_expiration' => 'required|date|after_or_equal:f_creation',
        ], [
            'f_expiration.after_or_equal' => 'La fecha de expiración debe ser igual o posterior a la fecha de creación'
        ]);

        Task::create($validated);

        Notify()->success('Tarea creada exitosamente', '¡Nueva tarea registrada!');
        return redirect()->route('tasks.index');
    }

    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'state' => 'required|in:Pendiente,En Progreso,Completada,Cancelada',
            'description' => 'nullable|string',
            'priority' => 'required|in:Alta,Media,Baja',
            'type' => 'required|in:Personal,Laboral,Educativa',
            'reminder' => 'required|string',
            'f_creation' => 'required|date',
            'f_expiration' => 'required|date|after_or_equal:f_creation',
        ], [
            'f_expiration.after_or_equal' => 'La fecha de expiración debe ser igual o posterior a la fecha de creación'
        ]);

        $task->update($validated);

        Notify()->success('Tarea actualizada correctamente', '¡Cambios guardados!');
        return redirect()->route('tasks.index');
    }

    public function destroy($id)
    {
        $task = Task::find($id);

        if (!$task) {
            Notify()->error('La tarea no existe', 'Error');
            return back();
        }

        $taskName = $task->name;
        $task->delete();

        Notify()->warning("La tarea' {$taskName}' fue eliminada permanentemente",'Tarea Eliminada');
        return redirect()->route('tasks.index');
    }
}
