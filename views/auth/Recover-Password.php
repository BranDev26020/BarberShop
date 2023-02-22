<form action="<?php echo "/recover_password?token=".$token.""?>" class="formulario" method="post">
    <p class="formulario__bienvenida">Choose a new password.</p>
    <p class="formulario__descripcion">Please choose a secure password of at least eight characters, combining letters, numbers, and optionally symbols for added protection.</p>

    <div class="formulario__campo">
        <label for="Password" class="label">Password</label>
        <input type="text" name="password" id="Password" placeholder="Enter your new password." class="input <?php echo s(isset($errores["falta_contrasena"]) ? "input-incorrecto" : "")?>">
        <p class="<?php echo s(isset($errores["contrasena_no-valida"]) ? "alerta" : "")?> rbg-red">Password must be 8 chars, with 1 upper case letter and 1 number.</p>

    </div>
    <input type="submit" value="Activate user account" class="boton">

</form>