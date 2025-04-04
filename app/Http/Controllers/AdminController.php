<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pqr;
use App\Models\Ranking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    /**
     * Display a listing of users with pagination
     */
    public function index()
    {
        $users = User::with('role') // Si tienes relación de roles
                   ->orderBy('created_at', 'desc')
                   ->paginate(10);
        
        return view('admin.index', compact('users'));
    }

    /**
     * Display PQRS with pagination
     */
    public function pqrs()
    {
        $pqrs = Pqr::with(['user', 'category']) // Si tienes relaciones
                 ->latest()
                 ->paginate(10);
        
        return view('admin.pqrs', compact('pqrs'));
    }

    /**
     * Display ranking with pagination
     */
    public function ranking()
    {
        $ranking = Ranking::with('user') // Si tienes relación con usuario
                     ->orderBy('score', 'desc')
                     ->paginate(10);
        
        return view('admin.ranking', compact('ranking'));
    }

    /**
     * Update user information
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        
        $validated = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,'.$user->id,
            'role' => 'required|in:user,admin' // Asegurar valores válidos
        ])->validate();
        
        $user->update($validated);
        
        return response()->json([
            'success' => true,
            'message' => 'Usuario actualizado correctamente',
            'user' => $user->fresh() // Devuelve los datos actualizados
        ]);
    }
    
    /**
     * Disable user (soft delete if enabled in model)
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        
        // Alternativa para deshabilitar en lugar de eliminar
        // $user->update(['is_active' => false]);
        
        $user->delete();
        
        return response()->json([
            'success' => true,
            'message' => 'Usuario deshabilitado',
            'userCount' => User::count(),
            'deletedUserId' => $id
        ]);
    }
    
    /**
     * Restore disabled user (if using soft deletes)
     */
    public function restore($id)
    {
        $user = User::withTrashed()->findOrFail($id);
        $user->restore();
        
        return response()->json([
            'success' => true,
            'message' => 'Usuario restaurado correctamente'
        ]);
    }
}