<form action="{{ route('login') }}" method="POST">

    @csrf
    <div>
        <label for="email">Correo electronico</label>
        <input type="text" id="email" name="email">
    </div>

    <div>
        <label for="password">Contraseña</label>
        <input type="password" id="password" name="password">
    </div>

    <input type="submit" name="enviar" value="Enviar">

</form>
