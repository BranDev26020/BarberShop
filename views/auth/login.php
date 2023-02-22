<form action="/" class="formulario" method="post">
<p class="formulario__bienvenida">Welcome back.</p>
<p class="formulario__descripcion">Please enter your details.</p>
<p class="formulario__descripcion <?php echo s(isset($verificando["error_confirmado"]) ? "alerta" : "")?> rbg-red">Lo sentimos, tu cuenta de correo electrónico aún no ha sido verificada. Por favor, verifica tu correo y sigue las instrucciones para activar tu cuenta y acceder a tus funciones</p>

<div class="formulario__campo">
    <label for="email" class="label">Email</label>
    <input type="text" name="email" id="email" placeholder="Enter your email." class="input <?php echo s(isset($errores[1]) ?  "input-incorrecto" : "")?>" value="<?php echo s($auth->email); ?>">
    <p class="<?php echo s(isset($errores["error"][0]) ? "alerta" : "")?> rbg-red">Sorry, your email is not registered.</p>

</div>

<div class="formulario__campo">
    <label for="pass" class="label">Password</label>
    <input type="password" name="password" id="pass" placeholder="Enter your password." class="input <?php echo s(isset($errores[2]) ?  "input-incorrecto" : "")  ?>">
    <p class="<?php echo s(isset($verificando["password_incorrecto"]) ? "alerta" : "")?> rbg-red">Invalid password. Please check and try again.</p>
</div>

<a class="olvide_pass" href="/forgot_password">Forgot password?</a>


<input type="submit" value="Sign in" class="boton">

<p class="crear-cuenta">Don't have an account? <a href="/create_account">Sign up</a> </p>
</form>