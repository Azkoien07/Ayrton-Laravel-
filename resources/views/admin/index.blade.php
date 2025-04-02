@extends('layouts.admin')
@section('admin-content')
<div class="container mx-auto p-6">
    <h2 class="text-2xl font-bold mb-4">Dashboard de Administrador</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        <div class="bg-white shadow-md rounded-lg p-4 text-center">
            <h3 class="text-lg font-semibold mb-2">Usuarios Registrados</h3>
            <p class="text-gray-700 text-xl" id="user-count">{{ $users->count() }}</p>
        </div>
    </div>

    <div class="mt-6 overflow-x-auto">
        <h3 class="text-xl font-bold mb-3">Lista de Usuarios</h3>
        <table class="w-full border-collapse bg-white shadow-md min-w-max">
            <thead>
                <tr class="bg-gray-200">
                    <th class="p-2 border">ID</th>
                    <th class="p-2 border">Nombre</th>
                    <th class="p-2 border">Email</th>
                    <th class="p-2 border">Rol</th>
                    <th class="p-2 border">Acciones</th>
                </tr>
            </thead>
            <tbody id="user-table">
                @foreach($users as $user)
                <tr class="text-center border-b" id="user-{{ $user->id }}">
                    <td class="p-2 border">{{ $user->id }}</td>
                    <td class="p-2 border">
                        <span id="name-{{ $user->id }}">{{ $user->name }}</span>
                        <input type="text" id="edit-name-{{ $user->id }}" class="hidden p-1 border rounded w-full" value="{{ $user->name }}">
                    </td>
                    <td class="p-2 border">
                        <span id="email-{{ $user->id }}">{{ $user->email }}</span>
                        <input type="email" id="edit-email-{{ $user->id }}" class="hidden p-1 border rounded w-full" value="{{ $user->email }}">
                    </td>
                    <td class="p-2 border">
                        <span id="role-{{ $user->id }}">{{ $user->role }}</span>
                        <select id="edit-role-{{ $user->id }}" class="hidden p-1 border rounded w-full">
                            <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>Usuario</option>
                            <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Administrador</option>
                        </select>
                    </td>
                   
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
// Function definitions for edit, cancel, save, and delete user actions
function editUser(id) {
    document.getElementById('name-' + id).classList.add('hidden');
    document.getElementById('email-' + id).classList.add('hidden');
    document.getElementById('role-' + id).classList.add('hidden');
    
    document.getElementById('edit-name-' + id)?.classList.remove('hidden');
    document.getElementById('edit-email-' + id)?.classList.remove('hidden');
    document.getElementById('edit-role-' + id)?.classList.remove('hidden');
    
    document.getElementById('save-btn-' + id)?.classList.remove('hidden');
    document.getElementById('cancel-btn-' + id)?.classList.remove('hidden');
    
    document.getElementById('edit-btn-' + id)?.classList.add('hidden');
    document.getElementById('delete-btn-' + id)?.classList.add('hidden');
}

function cancelEdit(id) {
    const originalName = document.getElementById('name-' + id).textContent;
    const originalEmail = document.getElementById('email-' + id).textContent;
    const originalRole = document.getElementById('role-' + id).textContent;
    
    document.getElementById('edit-name-' + id)?.value = originalName;
    document.getElementById('edit-email-' + id)?.value = originalEmail;
    document.getElementById('edit-role-' + id)?.value = originalRole;
    
    document.getElementById('name-' + id)?.classList.remove('hidden');
    document.getElementById('email-' + id)?.classList.remove('hidden');
    document.getElementById('role-' + id)?.classList.remove('hidden');
    
    document.getElementById('edit-name-' + id)?.classList.add('hidden');
    document.getElementById('edit-email-' + id)?.classList.add('hidden');
    document.getElementById('edit-role-' + id)?.classList.add('hidden');
    
    document.getElementById('edit-btn-' + id)?.classList.remove('hidden');
    document.getElementById('delete-btn-' + id)?.classList.remove('hidden');
    
    document.getElementById('save-btn-' + id)?.classList.add('hidden');
    document.getElementById('cancel-btn-' + id)?.classList.add('hidden');
}

function saveUser(id) {
    const nameInput = document.getElementById('edit-name-' + id);
    const emailInput = document.getElementById('edit-email-' + id);
    const roleInput = document.getElementById('edit-role-' + id);
    
    const name = nameInput.value;
    const email = emailInput.value;
    const role = roleInput.value;
    
    const csrfTokenElement = document.querySelector('meta[name="csrf-token"]');
    
    fetch('/admin/users/' + id, {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfTokenElement.getAttribute('content'),
            'Accept': 'application/json'
        },
        body: JSON.stringify({
            name: name,
            email: email,
            role: role,
            _method: 'PUT'
        })
    })
    .then(response => response.json())
    .then(data => {
        document.getElementById('name-' + id).textContent = name;
        document.getElementById('email-' + id).textContent = email;
        document.getElementById('role-' + id).textContent = role;
        cancelEdit(id);
        alert('Usuario actualizado correctamente');
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Hubo un error al actualizar el usuario: ' + error.message);
    });
}

function deleteUser(id) {
    if (!confirm('¿Estás seguro de que deseas eliminar este usuario?')) return;
    
    const csrfTokenElement = document.querySelector('meta[name="csrf-token"]');
    
    fetch('/admin/users/' + id, {
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': csrfTokenElement.getAttribute('content'),
            'Accept': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        const userRow = document.getElementById('user-' + id);
        userRow.remove();
        
        const userCount = document.getElementById('user-count');
        userCount.textContent = parseInt(userCount.textContent) - 1;
        
        alert('Usuario eliminado correctamente');
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Hubo un error al eliminar el usuario: ' + error.message);
    });
}
</script>
@endsection