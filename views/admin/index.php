<section class="contenedor_cita">
    <div class="contenido_admin">
        <div class="contenedor__btn">
            <a href="/logout" class="btn--border btn__sing-off">Sign off</a>
        </div>
        <p class="titulo_cita">Administration Panel</p>

        <p class="descripcion">Search for appointments.</p>



        <div id="contenido">
        <nav class="tabs">
            <a  class="btn_panel--admin" href="/admin">Appointment</a>
            <a  class="btn_panel--admin" href="/services"> Services</a>
            <a  class="btn_panel--admin" href="/services/create">New service</a>
        </nav>
        </div>

        <div class="busqueda">
            <form class="formulario formulario__admin">
                <div class="campo">
                    <label class="laber" for="date">Date</label>
                    <input class="input" type="date" id="date" name="fecha" value="<?php echo $fecha ?>">
                </div>
            </form>
        </div>

        <div id="citas-admin">
            <?php if (count($citas) == 0) : ?>
                <p class="alerta_sin_citas">There are no appointments</p>
            <?php endif; ?>
            <ul class="citas">
                <?php
                $total = 0;
                $idCita = 0;
                foreach ($citas as $key => $cita) : ?>
                    <?php if ($idCita !== $cita->id) : ?>
                        <li>
                            <p class="id_li">ID: <span><?php echo $cita->id ?></span></p>
                            <p>Name: <span><?php echo $cita->nombre ?></span></p>
                            <p>Phone: <span><?php echo $cita->telefono ?></span></p>
                            <p>Hour: <span><?php echo $cita->hora ?></span></p>
                            <?php $idCita = $cita->id; ?>

                            <p class="titulo__servicios">Services:</p>
                        <?php endif; ?>
                        <?php
                        if ($idCita == $cita->id) :
                        ?>
                            <p><?php echo $cita->servicio . " --- $" . $cita->precio ?></p>
                        <?php
                        endif;
                        ?>

                        <?php
                        $total = $total + $cita->precio;
                        $actual = $cita->id;
                        $proximo = $citas[$key + 1]->id ?? "";

                        if ($actual !== $proximo) { ?>
                            <p class="total_citas">Total: <?php echo $total; ?></p>
                            <?php $total = 0;
                            ?>

                            <form class="formulario__botones" action="/api/eliminar" method="post">
                                <input type="hidden" name="id" value="<?php echo $cita->id; ?>">
                                <input class="btn__eliminar " type="submit" value="Delete">
                            </form>

                        <?php  } ?>



                    <?php endforeach; ?>

            </ul>
        </div>
    </div>
</section>

<?php
$script = "<script src='build/js/buscador.js'></script>";
?>