<main class="auth">
    <h2 class="auth__heading"><?php echo $titulo; ?></h2>
    <p class="auth__texto">Inicia Sesion en DevWebCamp</p>
    
    <?php require_once __DIR__ . '/../templates/alertas.php'; ?>

    <form action="/login" method="POST" class="formulario">
        <div class="formulario__campo">
            <label for="email" class="formulario__label">Email</label>
            <input type="email" name="email" id="email" class="formulario__input" placeholder="Tu email">
        </div>
        <div class="formulario__campo">
            <label for="password" class="formulario__label">Password</label>
            <input type="password" name="password" id="password" class="formulario__input" placeholder="Tu password">
        </div>
        <input type="submit" value="Iniciar Sesion" class="formulario__submit">
    </form>

    <div class="acciones">
        <a href="/registro" class="acciones__enlace">¿Aun no tienes una cuenta? Crea una</a>
        <a href="/olvide" class="acciones__enlace">¿Olvidaste tu password?</a>
    </div>
</main>