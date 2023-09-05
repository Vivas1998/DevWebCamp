<main class="registro">
    <h2 class="registro__heading"><?php echo $titulo; ?></h2>
    <p class="registro__descripcion">Elige tu plan</p>

    <div class="paquetes__grid">
        <div <?php aos_animacion(); ?> class="paquete">
            <h3 class="paquete__nombre">Pase Gratis</h3>
            <ul class="paquete__lista">
                <li class="paquete__elemento">Acceso Virtual a DevWebCamp</li>
            </ul>
            <p class="paquete__precio">0€</p>

            <form action="/finalizar-registro/gratis" method="POST">
                <input type="submit" class="paquetes__submit" value="Inscripción Gratis">
            </form>
        </div>

        <div <?php aos_animacion(); ?> class="paquete">
            <h3 class="paquete__nombre">Pase Presencial</h3>
            <ul class="paquete__lista">
                <li class="paquete__elemento">Acceso Presencial a DevWebCamp</li>
                <li class="paquete__elemento">Pase por 2 días</li>
                <li class="paquete__elemento">Acceso a talleres y conferencias</li>
                <li class="paquete__elemento">Acceso a las grabaciones</li>
                <li class="paquete__elemento">Camisa del evento</li>
                <li class="paquete__elemento">Comida y bebida</li>
            </ul>
            <p class="paquete__precio">199€</p>
            <div id="smart-button-container">
                <div style="text-align: center;">
                    <div id="paypal-button-container"></div>
                </div>
            </div>
        </div>
        
        <div <?php aos_animacion(); ?> class="paquete">
            <h3 class="paquete__nombre">Pase Virtual</h3>
            <ul class="paquete__lista">
                <li class="paquete__elemento">Acceso Virtual a DevWebCamp</li>
                <li class="paquete__elemento">Pase por 2 días</li>
                <li class="paquete__elemento">Acceso a talleres y conferencias</li>
                <li class="paquete__elemento">Acceso a las grabaciones</li>
            </ul>
            <p class="paquete__precio">49€</p>
            <div id="smart-button-container">
                <div style="text-align: center;">
                  <div id="paypal-button-container-virtual"></div>
                </div>
            </div>
        </div>
    </div>
</main>

<script src="https://www.paypal.com/sdk/js?client-id=AWHWXF4xFIXQtBuzfWld__IploIBjd3G9B9x_wNVzy-iM8LESun9xNcOEZCY2u4CW6cyV2ZMUEDGTIBa&currency=EUR" data-sdk-integration-source="button-factory"></script>

<script>
  function initPayPalButton() {
    paypal.Buttons({
      style: {
        shape: 'rect',
        color: 'blue',
        layout: 'vertical',
        label: 'pay',
      },

      createOrder: function(data, actions) {
        return actions.order.create({
          purchase_units: [{"description":"1","amount":{"currency_code":"EUR","value":199}}]
        });
      },

      onApprove: function(data, actions) {
        return actions.order.capture().then(function(orderData) {
          
              const datos = new FormData();
              datos.append('paquete_id', orderData.purchase_units[0].description);
              datos.append('pago_id', orderData.purchase_units[0].payments.captures[0].id);

              fetch('/finalizar-registro/pagar', {
                  method: 'POST',
                  body: datos
              })
              .then( respuesta => respuesta.json())
              .then(resultado => {
                  if(resultado.resultado) {
                      actions.redirect('http://localhost:8000/finalizar-registro/conferencias');
                  }
              })
          
        });
      },

      onError: function(err) {
        console.log(err);
      }
    }).render('#paypal-button-container');


    // Pase virtual
    paypal.Buttons({
      style: {
        shape: 'rect',
        color: 'blue',
        layout: 'vertical',
        label: 'pay',
      },

      createOrder: function(data, actions) {
        return actions.order.create({
          purchase_units: [{"description":"2","amount":{"currency_code":"EUR","value":49}}]
        });
      },

      onApprove: function(data, actions) {
        return actions.order.capture().then(function(orderData) {

              const datos = new FormData();
              datos.append('paquete_id', orderData.purchase_units[0].description);
              datos.append('pago_id', orderData.purchase_units[0].payments.captures[0].id);

              fetch('/finalizar-registro/pagar', {
                  method: 'POST',
                  body: datos
              })
              .then( respuesta => respuesta.json())
              .then(resultado => {
                  if(resultado.resultado) {
                      actions.redirect('http://localhost:8000/finalizar-registro/conferencias');
                  }
              })
              
        });
      },

      onError: function(err) {
        console.log(err);
      }
    }).render('#paypal-button-container-virtual');

  }
  initPayPalButton();
</script>