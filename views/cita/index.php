<section class="contenedor_cita">
    <div class="contenedor__btn">
    <a href="/logout" class="btn--border btn__sing-off">Sign off</a>
    </div>
    <p class="titulo_cita">Schedule your appointment now.</p>
    <p class="descripcion">Choose your services and complete your details now.</p>

    <div id="contenido">
        <nav class="tabs">
            <button type="button" class="desactivado" data-paso="1">Services</button>
            <button type="button" class="desactivado" data-paso="2">Book your appointment</button>
            <button type="button" class="desactivado" data-paso="3">Summary</button>
        </nav>
        <div id="paso-1" class="seccion">
            <section class="descripcion__servicios">
                <p class="sub_titulo">Services</p>
                <p class="text_info">Make a selection of your services below.</p>
            </section>
            <div class="listado-servicios" id="contenedor-servicios"></div>
        </div>

        <div id="paso-2" class="seccion">
            <p class="sub_titulo">Book your appointment</p>
            <p class="text_info">Make a reservation by entering your details and choosing a date.</p>
            <form action="" class="formulario center formulario_datos_servicios">


                <div class="formulario__campo">
                    <label for="nombre" class="label">Name</label>
                    <input type="nombre" disabled value="<?php echo s($_SESSION["nombre"]) ?>" name="nombre" id="nombre" placeholder="Enter your name." class="input">
                </div>


                <div class="formulario__campo date_contenedor">
                    <label for="fecha" class="label">Date</label>
                    <input type="date" name="fecha" id="fecha" class="input" min="<?php echo date("Y-m-d", strtotime("+1 day")) ?>">
                </div>

                <div class="formulario__campo hora_contenedor">
                    <label for="hora" class="label">Hour</label>
                    <input type="time" name="hora" id="hora" class="input">
                </div>
                <input type="hidden" id="id" value="<?php echo $id ?>">
            </form>
        </div>
        <div id="paso-3" class="seccion resumen_contenido">
            <p class="sub_titulo">Summary</p>
            <p class="text_info">Verify the information is correct</p>
            <div class="alerta_error"></div>
            <div class="resumen">

                <p class="total"></p>
            </div>
        </div>

    </div>

    <div class="paginacion">
        <button class="row btn--border anterior" href="/">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-narrow-left" width="32" height="32" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <line x1="5" y1="12" x2="19" y2="12" />
                <line x1="5" y1="12" x2="9" y2="16" />
                <line x1="5" y1="12" x2="9" y2="8" />
            </svg>
            Back</button>

        <button class="row btn--border siguiente">
            Next
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-narrow-right" width="32" height="32" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <line x1="5" y1="12" x2="19" y2="12" />
                <line x1="15" y1="16" x2="19" y2="12" />
                <line x1="15" y1="8" x2="19" y2="12" />
            </svg>

        </button>
    </div>

</section>

<?php $script = "
<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <script src='build/js/app.js'> </script>
"; ?>