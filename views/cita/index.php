<h1 class="nombre-pagina">Crear nueva cita</h1>
<p class="descripcion-pagina">Elige tus servicios y coloca tus datos</p>

<div id="app">
        <nav class="tabs">
            <button class="actual" type="button" data-paso="1">Servicios</button>
            <button type="button" data-paso="2">Infgormación Cita</button>
            <button type="button" data-paso="3">Resumen</button>
        </nav>
    <div id="paso1" class="seccion">
        <h2>Servicios</h2>
        <p class="text-center">Elige tus servicios a continuación</p>
        <div id="servicios" class="listado-servicios">

        </div>
    </div>
    <div id="paso2" class="seccion">
        <h2>Servicios</h2>
        <p class="text-center">Elige tus servicios a continuación</p>
        <form class="formulario">
            <div class="campo">
                <label for="nombre">Nombre:</label>
                <input 
                id="nombre"
                type="text"
                placeholder="<?php echo $nombre; ?>"
                disabled
                />
            </div>
            <div class="campo">
                <label for="fecha">Fecha:</label>
                <input 
                id="fecha"
                type="date"
                />
            </div>
            <div class="campo">
                <label for="hora">Hora:</label>
                <input 
                id="hora"
                type="time"
                />
            </div>
        </form>
    </div>
    <div id="paso3" class="seccion">
        <h2>Resumen</h2>
        <p>Verifica que la información sea correcta</p>
        <div id="servicios" class="listado-servicios">

        </div>
    </div>
    <div class="paginacion">
        <button
            id="anterior"
            class="boton"
        >&laquo; Anterior</button>
        <button
            id="siguente"
            class="boton"
        >Siguiente &raquo;</button>
    </div>
</div>

<?php 
    $script = "
    
    <script src='build/js/app.js'></script>
    ";

?>