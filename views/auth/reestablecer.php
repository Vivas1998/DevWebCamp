<main class="auth">
    <h2 class="auth__heading"><?php echo $titulo; ?></h2>
    <p class="auth__texto">Coloca tu nuevo Password</p>

    <?php require_once __DIR__ . '/../templates/alertas.php'; ?>

    <?php if($token_valido) { ?>

        <form method="POST" class="formulario">
            <div class="formulario__campo">
                <label for="password" class="formulario__label">Nuevo Password</label>
                <input type="password" name="password" id="password" class="formulario__input" placeholder="Tu nuevo password">
            </div>
            <input type="submit" value="Guardar Password" class="formulario__submit">
        </form>

    <?php } ?>
</main>