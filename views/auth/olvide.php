<form action="/forgot_password" class="formulario" method="post">
    <p class="formulario__bienvenida">Forget password?.</p>
    <p class="formulario__descripcion">No worries, we'll send you reset instructions.</p>
    <p class=" <?php echo s(isset($alertas["exito"][0]) ? "alerta" : "") ?> rbg-green">A token has been sent to your email address to recover your account. Please check your inbox and follow the instructions to complete the recovery process.</p>
    <div class="formulario__campo">
        <label for="email" class="label">Email</label>
        <input type="text" name="email" id="email" placeholder="Enter your email." class="input">
        <p class="<?php echo s(isset($alertas[0]) ?  "alerta" : "") ?> rbg-red">Please enter a valid email address to complete the process</p>
        <p class="<?php echo s(isset($alertas[1]) ?  "alerta" : "") ?> rbg-red">Please provide an email address.</p>
        <p class="<?php echo s(isset($alertas["error"]) ?  "alerta" : "") ?> rbg-red">Sorry, your email is not registered.</p>
    </div>
   
    <input type="submit" value="Reset password" class="boton">

    <div class="contenedor__back">
        <a class="back" href="/">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-left" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <line x1="5" y1="12" x2="19" y2="12" />
                <line x1="5" y1="12" x2="11" y2="18" />
                <line x1="5" y1="12" x2="11" y2="6" />
            </svg>
            Back to log in</a>

    </div>
</form>