<h1 class="nombre-pagina">Olvidé Password</h1>
<p class="descripcion-pagina">Restablece tu contraseña escribiendo tu email</p>

<?php 
include_once __DIR__ . "/../templates/alertas.php";
?>

<form action="/olvide" method="POST" class="formulario">
    <div class="campo">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Tu email" />
    </div>
    <input type="submit" value="Restablecer Contraseña" class="boton">
</form>
<div class="acciones">
    <a href="/crear-cuenta">¿Aún no tienes una cuenta? Crear una</a>
    <a href="/">¿Ya tienes una cuenta? Inicia Sesión</a>
</div>