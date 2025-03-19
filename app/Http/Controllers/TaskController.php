<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // Mostrar la lista de tareas
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }
    
    public function create()
    {
        return view('tasks.create');
    }

    // Guardar una nueva tarea
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'state' => 'required|in:Pendiente,En Progreso,Completada,Cancelada',
            'priority' => 'required|in:Alta,Media,Baja',
            'type' => 'required|in:Personal,Laboral,Educativa',
            'reminder' => 'required|string',
            'f_creation' => 'required|date',
            'f_expiration' => 'required|date',
        ]);

        // Crear la tarea en la base de datos
        Task::create([
            'name' => $request->name,
            'description' => $request->description,
            'state' => $request->state,
            'priority' => $request->priority,
            'type' => $request->type,
            'reminder' => $request->reminder,
            'f_creation' => $request->f_creation,
            'f_expiration' => $request->f_expiration,
        ]);
        return redirect()->route('tasks.index')->with('success', 'Tarea creada correctamente.');
    }

    // Mostrar los detalles de una tarea
    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    // Mostrar el formulario para editar una tarea
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    // Actualizar una tarea
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'state' => 'required|in:Pendiente,En Progreso,Completada,Cancelada',
            'priority' => 'required|in:Alta,Media,Baja',
            'type' => 'required|in:Personal,Laboral,Educativa',
            'reminder' => 'required|string',
            'f_creation' => 'required|date',
            'f_expiration' => 'required|date',
        ]);

        $task->update($request->all());

        return redirect()->route('tasks.index')->with('success', 'Tarea actualizada correctamente.');
    }

    // Eliminar una tarea
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Tarea eliminada correctamente.');
    }
}
