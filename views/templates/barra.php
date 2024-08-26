<div class="barra">
    <p>Hola: <?php echo $nombre ?? '';?></p>
    <a class="boton" href="/logout">Cerrar Sesión</a>
</div>

<?php if(isset($_SESSION['admin'])){?>

    <div class="barra-servicios">
        <a href="" class="boton" href="/admin">Ver citas</a>
        <a href="" class="boton" href="/servicios">Ver servicios</a>
        <a href="" class="boton" href="/servicios/crear">Nuevo Servicio</a>
    </div>

        
<?php } ?>