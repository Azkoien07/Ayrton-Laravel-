<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mckenziearts\Notify\Facades\Notify;
use Illuminate\Support\Facades\Mail;
use App\Mail\TaskReminderMailable;
use App\Models\User;
use Carbon\Carbon;
class TaskController extends Controller
{
    public function index(Request $request)
    {
        $query = Task::query();
        
      
        if ($request->filled('name')) {
            $query->where('name', 'like', '%'.$request->name.'%');
        }
        
        if ($request->filled('state')) {
            $query->where('state', $request->state);
        }
        
        if ($request->filled('priority')) {
            $query->where('priority', $request->priority);
        }
        
        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }
        
        // Filtros por fechas
        if ($request->filled('f_creation_from')) {
            $query->where('f_creation', '>=', $request->f_creation_from);
        }
        
        if ($request->filled('f_creation_to')) {
            $query->where('f_creation', '<=', $request->f_creation_to);
        }
        
        if ($request->filled('f_expiration_from')) {
            $query->where('f_expiration', '>=', $request->f_expiration_from);
        }
        
        if ($request->filled('f_expiration_to')) {
            $query->where('f_expiration', '<=', $request->f_expiration_to);
        }
        
        // Filtros por relaciones (asumiendo que existen estas relaciones en el modelo Task)
        
        // Ejemplo: Filtrar por usuario asignado (relación belongsTo)
        if ($request->filled('user_name')) {
            $query->whereHas('user', function($q) use ($request) {
                $q->where('name', 'like', '%'.$request->user_name.'%');
            });
        }
        
        // Ejemplo: Filtrar por etiquetas (relación belongsToMany)
        if ($request->filled('tag_name')) {
            $query->whereHas('tags', function($q) use ($request) {
                $q->where('name', 'like', '%'.$request->tag_name.'%');
            });
        }
        
        // Ejemplo: Filtrar por comentarios (relación hasMany)
        if ($request->filled('comment_text')) {
            $query->whereHas('comments', function($q) use ($request) {
                $q->where('text', 'like', '%'.$request->comment_text.'%');
            });
        }
        
        // Ordenamiento
        $sortField = $request->get('sort_by', 'f_creation');
        $sortDirection = $request->get('sort_order', 'desc');
        $query->orderBy($sortField, $sortDirection);
        
        $tasks = $query->paginate(15)->withQueryString();
        
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
            'reminder' => 'required|date',
            'f_creation' => 'required|date',
            'f_expiration' => 'required|date|after_or_equal:f_creation',
        ], [
            'f_expiration.after_or_equal' => 'La fecha de expiración debe ser igual o posterior a la fecha de creación'
        ]);
    
        
        $task = Task::create($validated);
    
       
        $user = Auth::user();
        
       
        if ($user && Carbon::parse($validated['reminder'])->isToday()) {
            Mail::to($user->email)->send(new TaskReminderMailable($task));
        }
    
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

        Notify()->warning("La tarea '{$taskName}' fue eliminada permanentemente", 'Tarea Eliminada');
        return redirect()->route('tasks.index');
    }
}