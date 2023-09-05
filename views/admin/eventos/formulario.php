<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Informacion Eventos</legend>
    
    <div class="formulario__campo">
        <label for="nombre" class="formulario__label">Nombre Evento</label>
        <input 
            type="text" 
            name="nombre" 
            id="nombre" 
            class="formulario__input" 
            placeholder="Nombre Evento"
            value="<?php echo $evento->nombre;?>"
        />
    </div>
    <div class="formulario__campo">
        <label for="descripcion" class="formulario__label">Descripcion</label>
        <textarea 
            name="descripcion" 
            id="descripcion" 
            class="formulario__input" 
            placeholder="descripcion Evento"
            rows="8"
        ><?php echo $evento->descripcion;?></textarea>
    </div>
    <div class="formulario__campo">
        <label for="categoria" class="formulario__label">Categoria o Tipo de evento</label>
        <select name="categoria_id" id="categoria" class="formulario__select">
            <option value="">- Seleccionar -</option>
            <?php foreach($categorias as $categoria) { ?>
                <option <?php echo ($evento->categoria_id === $categoria->id) ? 'selected' : ''?> value="<?php echo $categoria->id; ?>"><?php echo $categoria->nombre; ?></option>
            <?php } ?>
        </select>
    </div>

    <div class="formulario__campo">
        <label for="dias" class="formulario__label">Seleccionar Dia</label>
        <div class="formulario__radio">
            <?php foreach($dias as $dia) { ?>
                <div>
                    <label for="<?php echo strtolower($dia->nombre); ?>"><?php echo $dia->nombre; ?></label>
                    <input 
                        type="radio" 
                        name="dia" 
                        id="<?php echo strtolower($dia->nombre); ?>" 
                        value="<?php echo $dia->id; ?>"
                        <?php echo ($evento->dia_id === $dia->id) ? 'checked' : '' ?>
                    />
                </div>
            <?php } ?>
        </div>
        <input type="hidden" name="dia_id" value="<?php echo $evento->dia_id; ?>">
    </div>

    <div class="formulario__campo" id="horas">
        <label for="" class="formulario__label">Seleccionar Hora</label>
        <ul class="horas" id="horas">
            <?php foreach($horas as $hora) { ?>
                <li data-hora-id="<?php echo $hora->id; ?>" class="horas__hora horas__hora--deshabilitada"><?php echo $hora->hora; ?></li>
            <?php } ?>
        </ul>
        <input type="hidden" name="hora_id" value="<?php echo $evento->hora_id; ?>">
    </div>

</fieldset>

<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Información Extra</legend>

    <div class="formulario__campo">
        <label for="ponentes" class="formulario__label">Ponente</label>
        <input 
            type="text" 
            name="ponentes" 
            id="ponentes" 
            class="formulario__input" 
            placeholder="Buscar Ponente"
        />
        <ul class="listado-ponentes" id="listado-ponentes"></ul>
        <input type="hidden" name="ponente_id" value="<?php echo $evento->ponente_id; ?>">
    </div>

    <div class="formulario__campo">
        <label for="disponibles" class="formulario__label">Lugares Disponibles</label>
        <input 
            type="text" 
            name="disponibles" 
            id="disponibles" 
            class="formulario__input" 
            placeholder="Ej. 20"
            min="1"
            value="<?php echo $evento->disponibles; ?>"
        />
    </div>
</fieldset>