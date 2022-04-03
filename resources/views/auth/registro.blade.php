<form action="{{ route('registro') }}" method="POST">
    @csrf
    <div>
        <label for="name">Nombre de usuario</label>
        <input type="text" name="name" id="name">
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

    <input type="submit" name="enviar" value="Enviar">
</form>
