@extends('layout')

@section('content')
<main class="mt-3">
    <div class="card">
        <div class="card-header">
            <h2 class="h5 mb-0">Lista de usuarios</h2>
        </div>
        <div class="card-body">
            <div class="d-flex mb-3">
                <input type="text" id="searchUserInput" class="form-control me-2" placeholder="Buscar...">
                <button class="btn btn-primary" id="searchUserButton">
                    <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-outline-primary ms-2" data-bs-toggle="modal" data-bs-target="#agregar_usuario">
                    <i class="fas fa-plus"></i>
                </button>
            </div>
            <div class="list-group" id="userList">
                @forelse ($usuarios as $usuario)
                    <div class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                        <div class="d-flex">
                            @php
                                $fotoPath = $usuario->foto ? asset('uploads/usuariosimg/' . $usuario->foto) : asset('img/0.jpg');
                            @endphp
                            <img src="{{ $fotoPath }}" alt="User Image" class="user-img rounded-circle me-3" style="width: 100px; height: 100px; object-fit: cover;">
                            <div>
                                <h5 class="mb-1">{{ $usuario->nombre }} {{ $usuario->apellido_1 }}</h5>
                                <p class="mb-1">ID: {{ $usuario->id }}</p>
                                <p class="mb-1">Correo: {{ $usuario->correo }}</p>
                                <p class="mb-1">Teléfono: {{ $usuario->telefono }}</p>
                            </div>
                        </div>
                        <div>
                            <button class="btn btn-outline-primary btn-sm me-1 btn-view-details" data-user-id="{{ $usuario->id }}"><i class="fas fa-search"></i></button>
                            <button class="btn btn-outline-warning btn-sm btn-edit-user" data-bs-toggle="modal" data-bs-target="#editar_usuario" data-user-id="{{ $usuario->id }}"><i class="fas fa-edit"></i></button>
                            <button class="btn btn-outline-danger btn-sm btn-delete-user" data-user-id="{{ $usuario->id }}"><i class="fas fa-trash"></i></button>
                        </div>
                    </div>
                @empty
                    <p>No hay usuarios registrados.</p>
                @endforelse
            </div>
        </div>
    </div>
</main>

<!-- Modal Agregar Usuario -->
<div class="modal fade" id="agregar_usuario" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addUserModalLabel">Agregar Usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addUserForm" action="{{ route('adm.create') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="apellido_1">Primer apellido:</label>
                        <input type="text" class="form-control" id="apellido_1" name="apellido_1" required>
                    </div>
                    <div class="form-group">
                        <label for="apellido_2">Segundo apellido:</label>
                        <input type="text" class="form-control" id="apellido_2" name="apellido_2">
                    </div>
                    <div class="form-group">
                        <label for="telefono">Número de teléfono:</label>
                        <input type="text" class="form-control" id="telefono" name="telefono" required>
                    </div>
                    <div class="form-group">
                        <label for="fecha_ingreso">Fecha de ingreso:</label>
                        <input type="date" class="form-control" id="fecha_ingreso" name="fecha_ingreso" required>
                    </div>
                    <div class="form-group">
                        <label for="correo">Correo electrónico:</label>
                        <input type="email" class="form-control" id="correo" name="correo" required>
                    </div>
                    <div class="form-group">
                        <label for="username">Usuario:</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña:</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto:</label>
                        <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
                    </div>
                    <div class="form-group">
                        <label for="id_tipo">Tipo de Usuario:</label>
                        <select class="form-control" id="id_tipo" name="id_tipo" required>
                            <option value="1">Administrador</option>
                            <option value="2">Empleado</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Editar Usuario -->
<div class="modal fade" id="editar_usuario" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editUserModalLabel">Editar Usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editUserForm" action="{{ route('adm.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="editUserId" name="id">
                    <div class="form-group">
                        <label for="nombre_edit">Nombre:</label>
                        <input type="text" class="form-control" id="nombre_edit" name="nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="apellido_1_edit">Primer apellido:</label>
                        <input type="text" class="form-control" id="apellido_1_edit" name="apellido_1" required>
                    </div>
                    <div class="form-group">
                        <label for="apellido_2_edit">Segundo apellido:</label>
                        <input type="text" class="form-control" id="apellido_2_edit" name="apellido_2" required>
                    </div>
                    <div class="form-group">
                        <label for="telefono_edit">Número de teléfono:</label>
                        <input type="text" class="form-control" id="telefono_edit" name="telefono" required>
                    </div>
                    <div class="form-group">
                        <label for="correo_edit">Correo electrónico:</label>
                        <input type="email" class="form-control" id="correo_edit" name="correo" required>
                    </div>
                    <div class="form-group">
                        <label for="username_edit">Usuario:</label>
                        <input type="text" class="form-control" id="username_edit" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="foto_edit">Foto:</label>
                        <input type="file" class="form-control" id="foto_edit" name="foto">
                    </div>
                    <div class="form-group">
                        <label for="id_tipo_edit">Tipo de Usuario:</label>
                        <select class="form-control" id="id_tipo_edit" name="id_tipo" required>
                            <option value="1">Administrador</option>
                            <option value="2">Empleado</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const userList = document.getElementById('userList');

        // Función para cargar usuarios
        function loadUsers() {
            // Aquí podrías hacer una llamada AJAX para obtener usuarios actualizados
        }

        // Manejo del formulario de agregar usuario
        document.getElementById('addUserForm').addEventListener('submit', function (event) {
            event.preventDefault();
            const formData = new FormData(this);
            fetch(this.action, {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Agregar el nuevo usuario a la lista
                    userList.innerHTML += `
                        <div class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            <div class="d-flex">
                                <img src="${data.fotoPath}" alt="User Image" class="user-img rounded-circle me-3" style="width: 100px; height: 100px; object-fit: cover;">
                                <div>
                                    <h5 class="mb-1">${data.nombre} ${data.apellido_1}</h5>
                                    <p class="mb-1">ID: ${data.id}</p>
                                    <p class="mb-1">Correo: ${data.correo}</p>
                                    <p class="mb-1">Teléfono: ${data.telefono}</p>
                                </div>
                            </div>
                            <div>
                                <button class="btn btn-outline-primary btn-sm me-1 btn-view-details" data-user-id="${data.id}"><i class="fas fa-search"></i></button>
                                <button class="btn btn-outline-warning btn-sm btn-edit-user" data-bs-toggle="modal" data-bs-target="#editar_usuario" data-user-id="${data.id}"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-outline-danger btn-sm btn-delete-user" data-user-id="${data.id}"><i class="fas fa-trash"></i></button>
                            </div>
                        </div>
                    `;
                    this.reset(); // Reiniciar el formulario
                    const modal = bootstrap.Modal.getInstance(document.getElementById('agregar_usuario'));
                    modal.hide(); // Cerrar el modal
                } else {
                    alert('Error al crear el usuario: ' + data.message); // Mensaje de error específico
                }
            })
            .catch(error => console.error('Error:', error));
        });

        // Manejo de la acción de editar usuario
        document.addEventListener('click', function (event) {
            if (event.target.matches('.btn-edit-user')) {
                const userId = event.target.getAttribute('data-user-id');
                // Lógica para cargar los datos del usuario y llenarlos en el formulario de edición
            }
        });

        // Manejo del formulario de editar usuario
        document.getElementById('editUserForm').addEventListener('submit', function (event) {
            event.preventDefault();
            const formData = new FormData(this);
            fetch(this.action, {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Actualizar el usuario en la lista
                    loadUsers(); // Volver a cargar la lista de usuarios
                    const modal = bootstrap.Modal.getInstance(document.getElementById('editar_usuario'));
                    modal.hide(); // Cerrar el modal
                } else {
                    alert('Error al editar el usuario: ' + data.message);
                }
            })
            .catch(error => console.error('Error:', error));
        });
    });
</script>
@endsection
