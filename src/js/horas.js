(function() {
    const horas = document.querySelector('#horas');

    if(horas) {

        const dias = document.querySelectorAll('[name="dia"]');
        const categoria = document.querySelector('[name="categoria_id"]');
        const InputHiddenDia = document.querySelector('[name="dia_id"]');
        const InputHiddenHora = document.querySelector('[name="hora_id"]');

        categoria.addEventListener('change', terminoBusqueda);
        dias.forEach(dia => dia.addEventListener('change', terminoBusqueda));


        // Recuperar el dia y la categoria en caso de estar editando un evento (+ transforma a int)
        let busqueda = {
            categoria_id: +categoria.value || '',
            dia: +InputHiddenDia.value || ''
        }

        if(!Object.values(busqueda).includes('')) {

            (async () => {
                await buscarEventos();

                // Resaltar la hora actual
                const horaSeleccionada = document.querySelector(`[data-hora-id="${InputHiddenHora.value}]`);
                horaSeleccionada.classList.remove('horas__hora--deshabilitada');
                horaSeleccionada.classList.remove('horas__hora--seleccionada');

                horaSeleccionada.onclick = seleccionarHora;
            })();
            
        }

        function terminoBusqueda(e) {
            busqueda[e.target.name] = e.target.value;

            // Reiniciar los campos ocultos y el selector de horas
            InputHiddenDia.value = '';
            InputHiddenHora.value = '';

            // Deshabilitar la hora previa
            const horaPrevia = document.querySelector('.horas__hora--seleccionada');
            if(horaPrevia) {
                horaPrevia.classList.remove('horas__hora--seleccionada');
            } 

            if(Object.values(busqueda).includes('')) return;
            
            
            buscarEventos();
        }

        async function buscarEventos() {
            const {dia, categoria_id} = busqueda;
            const url = `/api/eventos-horario?dia_id=${dia}&categoria_id=${categoria_id}`;

            const resultado = await fetch(url);
            const eventos = await resultado.json();

            obtenerHorasDisponibles(eventos);
        }

        function obtenerHorasDisponibles(eventos) {
            // Reiniciar las horas
            const listadoHoras = document.querySelectorAll('#horas li');
            listadoHoras.forEach(li => li.classList.add('horas__hora--deshabilitada'));

            // Comprobar Eventos ya tomados
            const horasTomadas = eventos.map(evento => evento.hora_id);

            const listadoHorasArray = Array.from(listadoHoras);
            const resultado = listadoHorasArray.filter(li => !horasTomadas.includes(li.dataset.horaId));

            resultado.forEach(li => li.classList.remove('horas__hora--deshabilitada'));


            const horasDisponibles = document.querySelectorAll('#horas li:not(.horas__hora--deshabilitada)');
            horasDisponibles.forEach(hora => hora.addEventListener('click', seleccionarHora));
        }

        function seleccionarHora(e) {

            // Deshabilitar la hora previa
            const horaPrevia = document.querySelector('.horas__hora--seleccionada');
            if(horaPrevia) {
                horaPrevia.classList.remove('horas__hora--seleccionada');
            } 
            
            // Agregar Clase de seleccionado
            e.target.classList.add('horas__hora--seleccionada');
            InputHiddenHora.value = e.target.dataset.horaId;

            // LLenar el campo oculto de dia
            InputHiddenDia.value = document.querySelector('[name="dia"]:checked').value;
        }
    }
})();