<section class="contenedor_cita--admin">
<div class="contenedor__btn">
            <a href="/logout" class="btn--border btn__sing-off">Sign off</a>
        </div>
    <div class="contenido_admin">
 
        <p class="titulo_cita">Services</p>
        <p class="descripcion">Management of services.</p>

        <div id="contenido">
        <nav class="tabs tabs--admin">
            <a  class="btn_panel--admin" href="/admin">Appointment</a>
            <a  class="btn_panel--admin" href="/services"> Services</a>
            <a  class="btn_panel--admin" href="/services/create">New service</a>
        </nav>
        </div>

        <div class="contendor--servicios">
        <?php  
               $categoria = "";
        foreach ($servicios as $key => $servicio) : ?>
        
            <?php if ($categoria !== $servicio->categoria) : ?>
            <div class="categoria-servicio"><?php  echo $servicio->categoria ?></div>
         
            <?php $categoria = $servicio->categoria; ?>

            <?php endif; ?>
            <div class="servicio--admin">
                <p>Name: <span><?php  echo $servicio->nombre ?></span></p>
                <p>Price: <span>$<?php echo $servicio->precio?></span></p>
                <div class="acciones">
                    <a class="btn--border actualizar" href="/services/update?id=<?php echo $servicio->id?>">Update</a>

                    <form action="/services/delete" method="post">
                    <input type="hidden" name="id" value="<?php echo $servicio->id?>">
                    <input class="btn--border eliminar" type="submit"  value="Delete">
                    </form>
                </div>
            </div>
          <?php endforeach;?>
       
        </div>
    </div>
</section>

