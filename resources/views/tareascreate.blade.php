<form method="POST" action="{{ route('tareas.store') }}">
    @csrf

    <div>
        <label for="titulo">Título:</label>
        <input type="text" name="titulo" id="titulo">
    </div>

    <div>
        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion" id="descripcion"></textarea>
    </div>

    <div>
        <label for="fecha_creacion">Fecha de Creación:</label>
        <input type="date" name="fecha_creacion" id="fecha_creacion">
    </div>    

    <div>
        <label for="estado">Estado:</label>
        <select name="estado" id="estado">
            <option value="pendiente">Pendiente</option>
            <option value="completada">Completada</option>
        </select>
    </div>

    <div>
        <label for="usuario_id">Usuario:</label>
        <!-- Aquí puedes agregar un menú desplegable para seleccionar el usuario -->
        <input name="usuario_id" id="usuario_id">
        </select>
    </div>

    <button type="submit">Crear Tarea</button>
</form>
