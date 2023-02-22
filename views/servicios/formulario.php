
<div class="campo">
    <label class="label" for="name">Name</label>
    <input type="text" value="<?php echo s($servicio->nombre)?>" class="input <?php echo s(isset($errores[1])?  "input-incorrecto" : "")?>" id="name" placeholder="Service name" name="nombre">

</div>


<div class="campo">
    <label class="label" for="category">Category</label>
    <input type="text" value="<?php echo s($servicio->categoria)?>" class="input <?php echo s(isset($errores[3])?  "input-incorrecto" : "")?>" id="category" placeholder="Category name" name="categoria">

</div>

<div class="campo">
    <label class="label" for="price">Price service</label>
    <input type="number" value="<?php echo s($servicio->precio)?>" class="input <?php echo s(isset($errores[2])?  "input-incorrecto" : "")?>" id="price" placeholder="Service price" name="precio">

</div>