<form action="/create_account" class="formulario" method="post">
<p class="formulario__bienvenida">Create an account.</p>

<div class="formulario__campo">
    <label for="name" class="label">Name</label>
    <input type="text" id="name" placeholder="Enter your name." value="<?php echo s($usuario->nombre); ?>" class="input <?php echo s(isset($errores[1]) ?  "input-incorrecto" : "")  ?>" name="nombre">
</div>

<div class="formulario__campo">
    <label for="Last" class="label">Last name</label>
    <input type="text" id="Last" placeholder="Enter your last name." class="input <?php echo s(isset($errores[2])  ?  "input-incorrecto" : "")  ?>" name="apellido"  value="<?php echo s($usuario->apellido); ?>" >
</div>

<div class="formulario__campo">
    <label for="Phone" class="label">Phone</label>
    <input type="tel" id="Phone" maxlength="10" placeholder="Enter your last name." class="input <?php echo s(isset($errores[3]) ?  "input-incorrecto" : "")  ?>" name="telefono"  value="<?php echo s($usuario->telefono); ?>" >
</div>


<div class="formulario__campo">
    <label for="email" class="label">Email</label>
    <input type="text" id="email" placeholder="Enter your email." class="input <?php echo s(isset($errores[4]) ?  "input-incorrecto" : "")  ?>  <?php echo s(isset($errores[8]) ? "input-incorrecto" : "")?>" name="email" value="<?php echo s($usuario->email); ?>">
    <p class="<?php echo s(isset($errores[5])  ? "alerta" : "")?> rbg-red">Please enter a valid email address..</p>
    <p class="<?php echo s(isset($errores[8])  ? "alerta" : "")?> rbg-red">The email is already registered in the system.</p>
</div>

<div class="formulario__campo">
    <label for="pass" class="label">Password</label>
    <input type="password" id="pass" placeholder="Enter your password." 
    class="input <?php echo s(isset($errores[6])  ?  "input-incorrecto" : "")  ?>" name="password">
    <p class="<?php echo s(isset($errores[7]) ? "alerta" : "")?> rbg-red">Password must be 8 chars, with 1 upper case letter and 1 number.</p>
</div> 


<input type="submit" value="Create account" class="boton">
<p class="crear-cuenta">Already have an account? <a href="/">Log in</a> </p>

</form>