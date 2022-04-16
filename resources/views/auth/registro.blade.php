<form action="{{ route('registro') }}" method="POST">
    @csrf
    <div>
        <input type="radio" id="cliente" name="typeUser" value="cliente">
        <label for="cliente">Cliente</label>

        <input type="radio" id="hotel" name="typeUser" value="hotel">
        <label for="hotel">Hotel</label>
    </div>
    <div>
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre">
    </div>

    <div>
        <label for="apellidos">Apellidos</label>
        <input type="text" name="apellidos" id="apellidos">
    </div>

    <div>
        <label for="email">Correo electronico</label>
        <input type="email" id="email" name="email">
    </div>

    <div>
        <label for="password">Contraseña</label>
        <input type="password" id="password" name="password">
    </div>

    <div>
        <label for="password_confirmation">Vuelve a introducir la contraseña</label>
        <input type="password_confirmation" id="password_confirmation" name="password">
    </div>

    <div>
        <label for="descripcion">descripcion</label>
        <textarea id="descripcion" name="descripcion"></textarea>
    </div>

    <input type="submit" name="enviar" value="Enviar">
</form>
