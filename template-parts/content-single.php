<?php
/**
 * Template part for displaying single videos (Prime Video style)
 *
 * @package nota3-template
 */
$imagen = get_field('imagen_video');
$generos = get_the_terms(get_the_ID(), 'genero_videos');
$artista = get_field('nombre_artista');
$duracion = get_field('duracion');
$anio = get_field('anio_lanzamiento'); // Campo ACF que debes crear
$integrantes = get_field('integrantes_banda'); // Campo ACF (texto o repeater)
$album = get_field('album'); // Campo ACF que debes crear
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <!-- ===== HERO con video superpuesto ===== -->
    <div id="bd-single-hero" class="bd-single-hero">

        <!-- Imagen de fondo -->
        <img src="<?php echo esc_url($imagen['url']); ?>" alt="<?php echo esc_attr(get_the_title()); ?>"
            class="bd-single-hero__img">

        <!-- Video (inicialmente oculto) -->
        Single Prime Video
Simplificar jQuery
Título y meta tags
Explicación de idea
Loop no carga
Navegación por IDs
Overflow en video
IA en codigo
Ayuda ejercicio jQuery oración dinámica
解决WordPress zlib输出缓冲错误
Análisis de código HTML y jQuery
Guardar información sobre DOM
Análisis de informe técnico
Espera de planes para evitar colores repetidos
Explicación detallada del BOM
Modificar index con desplegables
Transformación HTML semántico de códigos HTTP
Análisis semántico W3C informe breve
Ayuda ejercicio 5 JavaScript
Corrección de error en código de repetición
Single loop layout for posts
Crear slider categorías WordPress nativo
Ayuda para verificar número par en JavaScript
WordPress blog homepage settings
Assistant acknowledges storing JavaScript info
Card layout adjustment for portfolio
Resolving phpMyAdmin privilege error
Fix blank page on delete due to header error
Static HTML recommended for student subdomain
HTML APA 7th Edition Styles Guide
MD5 hash login comparison
CRUD PHP MySQL Tutorial Analysis
Verificar envío de correo PHP
Single Prime Video

Vamos a ver: el usuario está preguntando si hay alguna forma de quitar el "overlay de YouTube" (es decir, los controles, el logo, el título, etc. que aparecen sobre el video incrustado) y que solo se vea el video limpio. Pero tenemos que interpretar bien: ¿se refiere al overlay de YouTube en el iframe? o ¿al overlay propio que hemos creado con CSS?

Si se refiere al overlay propio (el div .bd-single-hero__overlay), ya hemos establecido que se vuelve casi transparente cuando el video está activo, y solo se muestra el botón. Pero el usuario menciona "el overlay de youtube", es decir, los controles y elementos de la interfaz del reproductor de YouTube. Esos no se pueden quitar completamente, pero se pueden ocultar parcialmente con parámetros en la URL (como controls=0, modestbranding=1, rel=0, showinfo=0). Pero hay que tener cuidado porque algunos parámetros han quedado obsoletos.

El usuario está preguntando específicamente: "hay alguna forma de quitar el overlay de youtube? que sea solo el video?" Puede referirse a que cuando se reproduce, el iframe de YouTube muestra su propio overlay con el botón de reproducción/pausa, el logo, etc. Y probablemente quiere que no se vea nada más que el video. Podemos modificar la URL del iframe para incluir parámetros que oculten ciertos elementos.

Dado que ya estamos usando enablejsapi=1 y autoplay=1 en el JS, podemos añadir controls=0 para quitar los controles (aunque el usuario quiere que solo sea el video, pero aún necesita poder pausar/reproducir con su botón personalizado). También modestbranding=1, rel=0, showinfo=0 (aunque showinfo ya no funciona). Pero con la API de YouTube, podemos controlar la reproducción desde el botón personalizado, y si quitamos los controles, el video se ve más limpio.

Entonces, podemos modificar la función getIframe en custom.js para que al construir la URL del iframe, agregue controls=0 y modestbranding=1 para quitar el logo y el botón de YouTube. También podemos quitar la barra de progreso, pero eso podría ser contraproducente si el usuario quiere ver el progreso. El usuario dijo "que sea solo el video", así que probablemente quiere el video sin ningún elemento extra.

Además, podemos añadir disablekb=1 para deshabilitar los atajos de teclado, etc.

Debemos tener en cuenta que controls=0 oculta los controles nativos, pero igual el usuario podrá pausar con el botón personalizado. Si queremos que solo sea el video y nada más, es la opción.

También podemos agregar iv_load_policy=3 para quitar las anotaciones.

Entonces, la respuesta sería modificar el código JavaScript para que al construir el src del iframe, añada controls=0&modestbranding=1&rel=0&iv_load_policy=3.

Pero hay que asegurarse de que la API de YouTube siga funcionando con controls=0. Sí, funciona.

Además, para ocultar el logo de YouTube, modestbranding=1 reduce el logo a texto pequeño.

El usuario ya tiene el overlay personalizado que se vuelve transparente, pero el overlay de YouTube es interno al iframe. No se puede quitar con CSS, solo con parámetros de URL.

Vamos a proponer modificar la función getIframe para agregar esos parámetros.

En la respuesta, vamos a explicar que se puede hacer mediante parámetros en la URL y daremos el código actualizado para custom.js.

También debemos considerar que si el usuario quiere mantener la capacidad de pausar/reproducir, con controls=0 pierde los controles nativos, pero los tiene personalizados, así que está bien.

Si el usuario no quiere perder el control, puede usar controls=1 pero con modestbranding y rel=0. Le daremos ambas opciones.

Vamos a redactar una respuesta clara, explicando cómo modificar el código para limpiar el reproductor de YouTube.

Sí, puedes quitar el overlay de YouTube (controles, logo, sugerencias, etc.) añadiendo parámetros a la URL del iframe. De esa forma, el video se ve completamente limpio y solo tú controlas la reproducción desde tu botón personalizado.
🔧 Parámetros de YouTube que limpian el reproductor
Parámetro	Efecto
controls=0	Oculta todos los controles nativos (reproducir/pausa, barra de progreso, volumen, etc.).
modestbranding=1	Reduce el logo de YouTube a un texto pequeño ("YouTube") en la esquina.
rel=0	Evita que se muestren videos relacionados al final.
iv_load_policy=3	Desactiva las anotaciones.
disablekb=1	Desactiva los atajos de teclado.

Con esto, el iframe solo muestra el video (y el botón de "YouTube" minúsculo), sin ningún otro elemento visual encima.
📝 Modifica tu custom.js

En la función getIframe() donde construyes la URL, agrega esos parámetros. Te dejo el código actualizado:
javascript

// Obtener el iframe y configurar la URL con enablejsapi y autoplay + limpieza
function getIframe() {
    if (!$iframe) {
        $iframe = $('#video-container').find('iframe');
        if ($iframe.length) {
            let src = $iframe.attr('src');
            // Base: añadir parámetros necesarios
            let separator = src.indexOf('?') !== -1 ? '&' : '?';
            
            // Parámetros para limpiar el reproductor
            let cleanParams = [
                'enablejsapi=1',          // necesario para controlar con postMessage
                'autoplay=1',             // reproducción automática
                'controls=0',             // oculta controles nativos
                'modestbranding=1',       // quita el logo grande de YouTube
                'rel=0',                  // no mostrar videos relacionados
                'iv_load_policy=3',       // desactivar anotaciones
                'disablekb=1'             // desactivar atajos de teclado
            ];
            
            // Si ya tiene algunos parámetros, los fusionamos sin duplicar
            let existingParams = [];
            let baseUrl = src.split('?')[0];
            let queryString = src.indexOf('?') !== -1 ? src.split('?')[1] : '';
            if (queryString) {
                existingParams = queryString.split('&').filter(p => p.trim() !== '');
            }
            
            // Combinar parámetros existentes con los nuevos (evitando duplicados)
            let allParams = [...existingParams];
            cleanParams.forEach(param => {
                let key = param.split('=')[0];
                if (!allParams.some(p => p.startsWith(key + '='))) {
                    allParams.push(param);
                }
            });
            
            // Reconstruir la URL
            let newSrc = baseUrl + '?' + allParams.join('&');
            $iframe.attr('src', newSrc);
        }
    }
    return $iframe;
}

🧹 Explicación

    controls=0 quita los botones nativos, por lo que tu botón personalizado (#bd-play-btn y #bd-pause-btn) será el único control visible.

    modestbranding=1 reduce el logo de YouTube a un texto pequeño y discreto.

    rel=0 evita que al final del video aparezcan sugerencias que tapen el contenido.

    iv_load_policy=3 desactiva anotaciones que podrían aparecer.

    disablekb=1 evita que el usuario use teclas (como espacio) para pausar, dejando el control exclusivo en tu botón.

El resto de tu lógica (play/pausa con postMessage) sigue funcionando perfectamente.
⚠️ Nota sobre controls=0

Si usas controls=0, el usuario perderá la barra de progreso y el volumen nativos. Pero como ya has implementado un botón de reproducción/pausa, es totalmente válido. Si prefieres mantener los controles nativos (por si el usuario quiere arrastrar la barra), puedes omitir controls=0 y solo usar modestbranding=1 y rel=0.
🔄 Si quieres mantener los controles nativos pero limpiar el resto

Usa:
javascript

let cleanParams = [
    'enablejsapi=1',
    'autoplay=1',
    'modestbranding=1',
    'rel=0',
    'iv_load_policy=3'
];

Así el video se ve más limpio, pero aún tiene la barra de progreso y los botones de YouTube.

Con estos cambios, el reproductor de YouTube mostrará solo el video (o casi), sin overlays molestos, y tu botón personalizado será el encargado de la reproducción.
y se puede hacer con esto? extraido de: https://www.advancedcustomfields.com/resources/oembed/

Display value with additional attributes.

This example demonstrates how to add extra attributes to both the iframe src and HTML.

<?php

// Load value.
$iframe = get_field('oembed');

// Use preg_match to find iframe src.
preg_match('/src="(.+?)"/', $iframe, $matches);
$src = $matches[1];

// Add extra parameters to src and replace HTML.
$params = array(
    'controls'  => 0,
    'hd'        => 1,
    'autohide'  => 1
);
$new_src = add_query_arg($params, $src);
$iframe = str_replace($src, $new_src, $iframe);

// Add extra attributes to iframe HTML.
$attributes = 'frameborder="0"';
$iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);

// Display customized HTML.
echo $iframe;
?>

El usuario quiere saber si se puede usar el método que encontró en la documentación de ACF para añadir parámetros al iframe de oEmbed y limpiar el overlay de YouTube. Necesito proporcionar una respuesta clara y útil. Para ello, primero debo comprender el código de ejemplo y luego explicar cómo se puede adaptar a su caso. También debo considerar si este método es compatible con su enfoque actual de usar JavaScript para modificar el iframe. Voy a buscar más información sobre los parámetros de YouTube y las prácticas recomendadas.
Se encontraron 16 páginas web

Los resultados de búsqueda incluyen la documentación de ACF y parámetros de YouTube. Para proporcionar una respuesta completa, necesito abrir la página de documentación de ACF y la de parámetros de YouTube.
Leer 2 páginas
ACF | oEmbed
YouTube Embedded Players and Player Parameters | YouTube IFrame Player API | Google for Developers

La documentación de ACF muestra el método para añadir parámetros. La de YouTube indica que algunos parámetros como 'modestbranding' están obsoletos. Mi respuesta debe explicar que se puede usar el método de ACF, pero que los parámetros efectivos pueden haber cambiado. Proporcionaré una solución PHP y también una alternativa con JavaScript.

Sí, se puede usar exactamente ese enfoque que muestras. De hecho, es una de las formas más limpias y recomendadas de hacerlo en WordPress con ACF.

El código que muestras de la documentación de ACF funciona perfectamente y es una solución muy elegante porque:

    Modifica el HTML del oEmbed desde el servidor, antes de que se renderice en el navegador.

    Usa add_query_arg(), que es la función nativa de WordPress para manejar parámetros en URLs de forma segura.

    Permite añadir atributos al iframe (como frameborder="0").

⚠️ Importante: parámetros de YouTube actualizados

Ten en cuenta que algunos parámetros de YouTube han quedado obsoletos desde 2018. La documentación oficial de Google indica que modestbranding, showinfo, autohide y theme ya no son funcionales.

Parámetros que sí funcionan actualmente:
Parámetro	Efecto
controls=0	Oculta los controles nativos (barra de progreso, volumen, etc.)
rel=0	No muestra videos relacionados al final
iv_load_policy=3	Desactiva anotaciones
enablejsapi=1	Permite control con JavaScript
autoplay=1	Reproducción automática

El parámetro modestbranding=1 ya no tiene efecto, por lo que el logo de YouTube siempre se mostrará (aunque sea pequeño).
🧩 Implementación en tu content-single.php

Adapta el código de la documentación a tu caso. Reemplaza esta parte:
php

<!-- ===== VIDEO (oculto hasta click en play) ===== -->
<div id="bd-single-video" class="d-none">
    <div class="embed-container" id="video-container">
        <?php the_field('url_video'); ?>
    </div>
</div>

Por esto:
php

<!-- ===== VIDEO (oculto hasta click en play) ===== -->
<div id="bd-single-video" class="d-none">
    <div class="embed-container" id="video-container">
        <?php
        // Cargar el iframe del campo oEmbed
        $iframe = get_field('url_video');
        
        if ($iframe) {
            // Extraer la URL src del iframe
            preg_match('/src="(.+?)"/', $iframe, $matches);
            $src = $matches[1];
            
            // Añadir parámetros personalizados a la URL
            $params = array(
                'controls'       => 0,        // Oculta controles nativos
                'rel'            => 0,        // No mostrar videos relacionados
                'iv_load_policy' => 3,        // Desactivar anotaciones
                'enablejsapi'    => 1,        // Permite control con JS
                // 'autoplay'    => 1,        // Opcional: reproducción automática
            );
            $new_src = add_query_arg($params, $src);
            $iframe = str_replace($src, $new_src, $iframe);
            
            // Añadir atributos adicionales al iframe
            $attributes = 'frameborder="0" allowfullscreen';
            $iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);
            
            // Mostrar el iframe modificado
            echo $iframe;
        }
        ?>
    </div>
</div>

        <!-- Overlay con contenido -->
        <div class="bd-single-hero__overlay" id="bd-overlay">
            <div class="row bd-single-hero__body">

                <!-- Columna izquierda: botón de reproducción (visible siempre) -->
                <div class="col-md-3">
                    <button id="bd-play-btn" class="tm-hero-btn">
                        <i class="bi bi-play-fill"></i> Reproducir
                    </button>
                    <button id="bd-pause-btn" class="tm-hero-btn" style="display:none;">
                        <i class="bi bi-pause-fill"></i> Pausa
                    </button>
                </div>

                <!-- Resto del contenido (se oculta al reproducir) -->
                <div class="col-md-9">
                    <h1 class="tm-hero-title"><?php the_title(); ?></h1>
                    <div class="tm-hero-excerpt"><?php the_excerpt(); ?></div>
                    <div class="row">
                        <div class="col-md-6">
                            <?php if (!empty($generos) && !is_wp_error($generos)): ?>
                                <div class="d-flex flex-wrap gap-1">
                                    <?php foreach ($generos as $g): ?>
                                        <a href="<?php echo esc_url(get_term_link($g)); ?>" class="bd-tag me-2">
                                            <?php echo esc_html($g->name); ?>
                                        </a>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="col-md-6">
                            <div class="bd-single-meta">
                                <span><i class="bi bi-clock"></i> <?php echo esc_html($duracion); ?></span>
                                <span><i class="bi bi-calendar"></i> <?php echo esc_html($anio); ?></span>
                                <span><i class="bi bi-disc"></i> <?php echo esc_html($album); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mt-2">
                        <strong
                            style="color:var(--breakdown-text); font-size:0.8rem; text-transform:uppercase; letter-spacing:1px;">Integrantes</strong>
                        <ul class="bd-cast-list">
                            <?php if ($integrantes && is_array($integrantes)): ?>
                                <?php foreach ($integrantes as $integrante): ?>
                                    <li><?php echo esc_html($integrante); ?></li>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <li><strong>Vocalista</strong> (placeholder)</li>
                                <li><strong>Guitarrista</strong> (placeholder)</li>
                                <li><strong>Bajista</strong> (placeholder)</li>
                                <li><strong>Baterista</strong> (placeholder)</li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>

            </div><!-- /.bd-single-hero__body -->
        </div><!-- /.bd-single-hero__overlay -->

    </div><!-- /#bd-single-hero -->

    <!-- ===== CARRUSEL RELACIONADOS ===== -->
    <section class="container-fluid mt-5 mb-5">
        <div class="section-header-border pb-2 mb-2 ms-3">
            <h2 class="section-header-title text-uppercase fw-bold">Más videos</h2>
        </div>
        <?php include get_template_directory() . '/assets/modulos/modulo-video/loop-mp-carrusel-single.php'; ?>
    </section>
    <section class="container-fluid py-4">
        <div class="row mx-5 gap-5 justify-content-center"> <!-- gap-2 (0.5rem) -->

            <!-- Columna principal: col-md-7 -->
            <div class="col-md-7 d-flex flex-column border border-secondary rounded-3 p-3">
                <h2 class="h3 fw-bold mb-2"><?php echo get_the_title(); ?></h2>

                <div class="mb-2">
                    <?php if (!empty($generos) && !is_wp_error($generos)): ?>
                        <div class="d-flex flex-wrap gap-1">
                            <?php foreach ($generos as $g): ?>
                                <a href="<?php echo esc_url(get_term_link($g)); ?>" class="bd-tag me-2">
                                    <?php echo esc_html($g->name); ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="bd-single-meta d-flex flex-wrap gap-3 small text-secondary mb-2">
                    <span><i class="bi bi-clock"></i> <?php echo esc_html($duracion); ?></span>
                    <span><i class="bi bi-calendar"></i> <?php echo esc_html($anio); ?></span>
                </div>

                <p class="mb-0"><?php echo get_the_excerpt(); ?></p>
            </div>

            <!-- Columna derecha: col-md-3 -->
            <div class="col-md-3 d-flex flex-column border border-secondary rounded-3 p-3">
                <strong class="text-uppercase small fw-bold mb-2"
                    style="color:var(--breakdown-text); letter-spacing:1px;">
                    Integrantes
                </strong>
                <ul class="bd-cast-list list-unstyled mb-0">
                    <?php if ($integrantes && is_array($integrantes)): ?>
                        <?php foreach ($integrantes as $integrante): ?>
                            <li><?php echo esc_html($integrante); ?></li>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <li><strong>Vocalista</strong> (placeholder)</li>
                        <li><strong>Guitarrista</strong> (placeholder)</li>
                        <li><strong>Bajista</strong> (placeholder)</li>
                        <li><strong>Baterista</strong> (placeholder)</li>
                    <?php endif; ?>
                </ul>
            </div>

            <!-- Fila siguiente: descripción canción (col-md-7) -->
            <div class="col-md-7 border border-secondary rounded-3 p-3">
                <?php echo the_content(); ?>
            </div>

            <!-- Fila siguiente: álbum (col-md-3) -->
            <div class="col-md-3 border border-secondary rounded-3 p-3">
                <div class="row align-items-center g-2">
                    <div class="col-4 col-md-12 col-xl-4">
                        <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>"
                            alt="<?php echo esc_html($album); ?>" class="img-fluid rounded-circle">
                    </div>
                    <div class="col-8 col-md-12 col-xl-8">
                        <p class="mb-0"><?php echo get_field('desc_album'); ?></p>
                    </div>
                </div>
            </div>

        </div> <!-- /.row -->
    </section> <!-- /.container -->

</article>