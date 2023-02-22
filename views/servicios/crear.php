<section class="contenedor_cita--admin">
<div class="contenedor__btn">
            <a href="/logout" class="btn--border btn__sing-off">Sign off</a>
        </div>
    <div class="contenido_admin">

        <p class="titulo_cita">Create services</p>


        <div id="contenido">
            <nav class="tabs tabs--admin">
                <a class="btn_panel--admin" href="/admin">Appointment</a>
                <a class="btn_panel--admin" href="/services"> Services</a>
                <a class="btn_panel--admin" href="/services/create">New service</a>
            </nav>
        </div>

        <form class="formulario--admin" action="/services/create" method="post">


        <?php include_once __DIR__ . '/formulario.php'; ?>

            <div class="contenedor__btn">
                <input type="submit" class="btn--border btn-crear" value="Save service">
            </div>

        </form>


    </div>
</section>