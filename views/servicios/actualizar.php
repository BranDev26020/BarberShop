<section class="contenedor_cita--admin">
    <div class="contenido_admin">

        <p class="titulo_cita">Update services</p>


        <div id="contenido">
            <nav class="tabs tabs--admin">
                <a class="btn_panel--admin" href="/admin">Appointment</a>
                <a class="btn_panel--admin" href="/services"> Services</a>
                <a class="btn_panel--admin" href="/services/create">New service</a>
            </nav>
        </div>

        <form class="formulario--admin"  method="post">

            <?php include_once __DIR__ . '/formulario.php'; ?>

            <div class="contenedor__btn">
                <input type="submit" class="btn--border" value="Update service">
            </div>

        </form>




    </div>
</section>