<main class="devwebcamp">
    <h2 class="devwebcamp__heading"><?php echo $titulo; ?></h2>
    <p class="devwebcamp__descripcion">Conoce la conferencia más importante de España</p>

    <div class="devwebcamp__grid">
        <div <?php aos_animacion(); ?> class="devwebcamp__imagen">
            <picture>
                <source srcset="build/img/sobre_devwebcamp.avif" type="img/avif">
                <source srcset="build/img/sobre_devwebcamp.webp" type="img/webp">
                <img loading="lazy" width="200" height="300" src="build/img/sobre_devwebcamp.jpg" alt="">
            </picture>
        </div>
        <div <?php aos_animacion(); ?> class="devwebcamp__contenido">
            <p class="devwebcamp__texto">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia, hic earum perferendis accusamus, sequi, quae velit cumque ipsa repellat eveniet voluptatum ex possimus obcaecati magnam alias beatae illo maiores minus.
                Ad, cumque debitis. Itaque sunt laborum, quam explicabo hic assumenda. Exercitationem velit minima, mollitia laborum ipsum corporis in quaerat sed. Optio, labore impedit quasi inventore minus ullam error iure obcaecati?
                Possimus et eligendi, repellendus quia architecto voluptates dolore, incidunt praesentium dolor quidem consequatur ducimus corrupti. Cum eligendi saepe eos quos perspiciatis laudantium itaque nulla, sit, sequi totam odit porro esse!
            </p>
            <p class="devwebcamp__texto">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia, hic earum perferendis accusamus, sequi, quae velit cumque ipsa repellat eveniet voluptatum ex possimus obcaecati magnam alias beatae illo maiores minus.
                Ad, cumque debitis. 
            </p>
        </div>
    </div>
</main>