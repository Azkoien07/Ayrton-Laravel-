<?php

namespace App\Contracts;

use App\Models\User;

interface AdminServiceInterface{
    
    //Listar usuarios
    public function ListarUsuarios();
    
    //Obtener  usuario
    public function obtenerUsuario( int $id);
    //Desactivar doctor;
    public function eliminarDoctor(User $user);
    
}