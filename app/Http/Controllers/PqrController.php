<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Pqr;
use Illuminate\Http\Request;

class PqrController extends Controller
{
    public function index(Request $request)
    {
        $query = Pqr::with('users')->orderBy('created_at', 'desc');
        
        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->where('id', 'like', "%{$searchTerm}%")
                  ->orWhere('title', 'like', "%{$searchTerm}%")
                  ->orWhere('description', 'like', "%{$searchTerm}%");
            });
        }
        
        if ($request->has('type_pqr') && !empty($request->type_pqr)) {
            $query->where('type_pqr', $request->type_pqr);
        }
        
        if ($request->has('status') && !empty($request->status)) {
            $query->where('status', $request->status);
        }
        
        $pqrs = $query->paginate(10);
        
        $stats = [
            'total' => Pqr::count(),
            'pending' => Pqr::where('status', 'Pendiente')->count(),
            'in_progress' => Pqr::where('status', 'En Proceso')->count(),
            'resolved' => Pqr::where('status', 'Resuelto')->count(),
        ];
        
        return view('admin.pqrs.index', compact('pqrs', 'stats'));
    }
    
    public function create()
    {
        return view('pqrs.pqrs');
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'type_pqr' => 'required|in:Petición,Queja,Reclamo,Sugerencia',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'argument' => 'nullable|string',
        ]);
        
        $pqrs = new Pqr($validated);
        $pqrs->status = 'Pendiente';
        $pqrs->save();
        
        return redirect()->route('admin.pqrs')
            ->with('success', 'PQRS creado exitosamente.');
    }
    
    public function show(Pqr $pqrs)
    {
        return view('admin.pqrs', compact('pqrs'));
    }
    
    public function edit(Pqr $pqrs)
    {
        return view('admin.pqrs', compact('pqrs'));
    }
    
    public function update(Request $request, Pqr $pqrs)
    {
        $validated = $request->validate([
            'type_pqr' => 'required|in:Petición,Queja,Reclamo,Sugerencia',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'argument' => 'nullable|string',
            'answer' => 'nullable|string',
            'status' => 'required|in:Pendiente,En Proceso,Resuelto,Cerrado',
        ]);
        
        $pqrs->update($validated);
        
        return redirect()->route('admin.pqrs')
            ->with('success', 'PQRS actualizado exitosamente.');
    }
    
    public function updateStatus(Request $request, Pqr $pqrs)
    {
        $validated = $request->validate([
            'status' => 'required|in:Pendiente,En Proceso,Resuelto,Cerrado',
        ]);
        
        $pqrs->status = $validated['status'];
        $pqrs->save();
        
        return redirect()->back()
            ->with('success', 'Estado actualizado exitosamente.');
    }
    
    public function archive(Pqr $pqrs)
    {
        $pqrs->status = 'Cerrado';
        $pqrs->save();
        
        return redirect()->route('admin.pqrs')
            ->with('success', 'PQRS archivado exitosamente.');
    }
}
