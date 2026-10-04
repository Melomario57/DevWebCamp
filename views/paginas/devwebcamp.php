<main class="devwebcamp">
    <h2 class="devwebcamp__heading"><?php echo $titulo; ?></h2>
    <p class="devwebcamp__descripcion">Conoce la conferencia más importante de latinoamerica</p>
    <div class="devwebcamp__grid">
        <div <?php aos_animation(); ?> class="devwebcamp__imagen">
            <picture>
                <source srcset="build/img/sobre_devwebcamp.avif" type="image/avif" />
                <source srcset="build/img/sobre_devwebcamp.webp" type="image/webp" />
                <img loading="lazy" width="200" height="300" src="build/img/sobre_devwebcamp.jpg" alt="Imagen DevWebcamp" />
            </picture>
        </div>
        <div <?php aos_animation(); ?> class="devwebcamp__contenido">
            <p class="devwebcamp__texto">DevWebCamp es un punto de encuentro para quienes disfrutan crear en la web. Aprende de especialistas, descubre nuevas ideas y mantente al día con las últimas tendencias del desarrollo.</p>
            <p class="devwebcamp__texto">Vive una experiencia para compartir conocimientos, conectar con otros profesionales y llevar tus proyectos al siguiente nivel.</p>
        </div>
    </div>
</main>