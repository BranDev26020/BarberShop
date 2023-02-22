<form action="<?php echo "/confirm_account?id=".$id.""?>" class="formulario" method="post">
    <p class="formulario__bienvenida">Activate your user account</p>
    <p class="formulario__descripcion">We have sent the necessary instructions to confirm your account to your email address.</p>

    <div class="formulario__campo">
        <label for="token" class="label">Token</label>
        <input type="text" name="token" value="<?php echo $token?>" id="token" placeholder="Enter your token." class="input <?php echo s(isset($errores["error"]) ? "input-incorrecto" : "")?>">
        <p class="<?php echo s(isset($errores["error_token"][0]) ? "alerta" : "")?> rbg-red">Enter the authentication code sent to your email</p>
        <p class=" <?php echo s(isset($errores["error"]) ? "alerta" : "")?> rbg-red">The token is incorrect.</p>
    </div>
  <input class="generar-token" type="submit" name="submit1" value="Generate a new token.">
    <input type="submit" value="Activate user account" class="boton">

</form>