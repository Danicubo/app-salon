<h1 class="nombre-pagina">Recuperar Password</h1>
<p class="descripcion-pagina">Coloca tu nuevo password</p>

<?php 
include_once __DIR__ . "/../templates/alertas.php";
?>
<?php if($error) return; ?>
<form class="formulario" method="POST">
<div class="campo">
    <label for="password">Password</label>
    <input 
    type="password" 
    name="password" 
    id="password"
    placeholder="Tu nuevo password"
    >
</div>
<input type="submit" class="boton" value="Guardar nuevo password">

</form>

<div class="acciones">
    <a href="">¿Tienes Cuenta? Inicia Sesión</a>
    <a href="/crear-cuenta">¿Aún no tienes cuenta? Crea una</a>
</div>