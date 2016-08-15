<?php
// Escondiendo la barra del administrador en la vista previa
add_filter('show_admin_bar', '__return_false');
function my_wp_nav_menu_args( $args = '' ) {
    $args['container'] = false;
    return $args;
}
add_filter( 'wp_nav_menu_args', 'my_wp_nav_menu_args' );

// Menus
add_theme_support('menus');
function register_theme_menus() {
    register_nav_menus(
            array(
                'menu-principal' => __('Menu principal'),
            )
    );
}
add_action('init', 'register_theme_menus');

if (!is_admin()) {
    // Cargar jQuery en template
    // wp_deregister_script('jquery');
    // wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"), false, '1.3.2', true);
    // wp_enqueue_script('jquery');

    // Añadir RSS en la sección <head>
    automatic_feed_links();

    // Limpiar tags auto generados de Wordpress
    function removeHeadLinks() {
        remove_action('wp_head', 'rsd_link');
        remove_action('wp_head', 'wlwmanifest_link');
    }
    add_action('init', 'removeHeadLinks');
    remove_action('wp_head', 'wp_generator');

    // Registrar menús de navegación
    register_nav_menus(array(
        //'primary' => __('Navegacion Principal', 'expreso')
        ));


    // Campos personalizados para cada post (no es necesario reutilizar todos)
    $key = "Caracteristicas";
    $meta_boxes_adicionales = array(
        "sombrero" => array(
            "nombre" => "sombrero",
            "titulo" => "Sombrero de la noticia",
            "descripcion" => "Descripción corta que se mostrará por sobre el título, en color rojo",
            "value" => 1,
            "type" => "text",
            'max' => 60,
            "field" => "form-field"),
        "ciudad" => array(
            "nombre" => "Ciudad",
            "titulo" => "Ubicación",
            "descripcion" => "Ciudad o ubicación donde se produjo la noticia, se mostrará al inicio de cada post.",
            "value" => 1,
            "type" => "text",
            'max' => 30,
            "field" => "form-field"),
    );
    $meta_boxes_slider = array(
        "tituloSlider" => array(
            "nombre" => "titulo_slider",
            "titulo" => "Titulo para slider",
            "descripcion" => "Titulo corto que aparecera al momento de mostrarse en el slider(30 caracteres maximo)",
            "value" => 1,
            "type" => "text",
            'max' => 30,
            "field" => "form-field"),
        "descripSlider" => array(
            "nombre" => "descri_slider",
            "titulo" => "Descipción para slider",
            "descripcion" => "Descripción corta que aparecera al momento de mostrarse en el slider(100 caracteres maximo)",
            "value" => 1,
            "type" => "text",
            'max' => 100,
            "field" => "form-field",),
        "slideVip" => array(
            "nombre" => "slide_vip",
            "titulo" => "Slider Seccion Destacada Superior",
            "descripcion" => "Mostrar en La seccion destacada superior del home.",
            "value" => 1,
            "type" => "checkbox",
            "field" => "form-check"),
        "slideHome" => array(
            "nombre" => "slide_home",
            "titulo" => "Slider Principal",
            "descripcion" => "Mostrar en slider principal.",
            "value" => 1,
            "type" => "checkbox",
            "field" => "form-check"),
        "SliderSeccion" => array(
            "nombre" => "slider_section",
            "titulo" => "Mostrar en Slider Principal de su Categoria",
            "descripcion" => "Mostrar en slider principal de su categoria.",
            "value" => 1,
            "type" => "checkbox",
            "field" => "form-check")
    );
    $meta_boxes_destacados = array(
        "titulo3" => array(
            "nombre" => "titulo_3",
            "titulo" => "Titulo para mostrar en 3 lineas",
            "descripcion" => "Titulo corto en las miniaturas en 3 lineas(45 caracteres maximo)",
            "value" => '',
            "type" => "text",
            'max' => 45,
            "field" => "form-field",
            "head" => true),
        "destacadoHome" => array(
            "nombre" => "destacado_home",
            "titulo" => "Destacado Principal",
            "descripcion" => "Mostrar como destacado en el home.",
            "value" => 1,
            "type" => "checkbox",
            "field" => "form-check"),
        "destacadoCategory" => array(
            "nombre" => "destacado_category",
            "titulo" => "Destacado Categoria",
            "descripcion" => "Mostrar como destacado en su categoria.",
            "value" => 1,
            "type" => "checkbox",
            "field" => "form-check")
    );
    $meta_boxes_especial = array(
        "tituloEspecial" => array(
            "nombre" => "titulo_especial",
            "titulo" => "Titulo para la seccion especial del día",
            "descripcion" => "Titulo que apareceráa constinuación de la palabra 'Especial' al momento de mostrarse la sección el especial del dia (Maximo 30 caracteres)",
            "value" => 1,
            "type" => "text",
            'max' => 30,
            "field" => "form-field"),
        "descripEspecial" => array(
            "nombre" => "descri_especial",
            "titulo" => "Descipción para la seccion especial del día",
            "descripcion" => "Descripción corta que aparecerá al momento de mostrarse la sección el especial del dia (Maximo 100 caracteres)",
            "value" => 1,
            "type" => "text",
            'max' => 100,
            "field" => "form-field"),
        "especialHome" => array(
            "nombre" => "especial_home",
            "titulo" => "Mostrar en Seccion especial del día de la pagina principal",
            "descripcion" => "Mostrar en sección especial del dia de la página principal.",
            "value" => 1,
            "type" => "checkbox",
            "field" => "form-check"),
        "especialSeccion" => array(
            "nombre" => "especial_seccion",
            "titulo" => "Mostrar en Seccion especial del día de su categoria",
            "descripcion" => "Mostrar en sección especial del dia de su categoria.",
            "value" => 1,
            "type" => "checkbox",
            "field" => "form-check")
    );
    $meta_boxes_cine = array(
        "tituloPelicula" => array(
            "nombre" => "titulo_pelicula",
            "titulo" => "Titulo de la película en cartelera",
            "descripcion" => "Es el titulo que aparecera en la ficha de la película",
            "value" => 1,
            "type" => "text",
            'max' => 80,
            "field" => "form-field"),
        "genero" => array(
            "nombre" => "genero_pelicula",
            "titulo" => "Genero al que pertenece la película",
            "descripcion" => "Ingrese el genero de la película",
            "value" => 1,
            "type" => "text",
            'max' => 80,
            "field" => "form-field"),
        "duracion" => array(
            "nombre" => "duracion_pelicula",
            "titulo" => "Duración de la película",
            "descripcion" => "Tiempo de duración de la película",
            "value" => 1,
            "type" => "text",
            'max' => 80,
            "field" => "form-field"),
        "pais" => array(
            "nombre" => "pais_pelicula",
            "titulo" => "Pais de procedencia de la película",
            "descripcion" => "El nombre del pais de donde procede la cinta",
            "value" => 1,
            "type" => "text",
            'max' => 40,
            "field" => "form-field"),
        "director" => array(
            "nombre" => "director_pelicula",
            "titulo" => "Director de la película",
            "descripcion" => "Nombre del director o directores del film",
            "value" => 1,
            "type" => "text",
            'max' => 80,
            "field" => "form-field"),
        "actores" => array(
            "nombre" => "actores_pelicula",
            "titulo" => "Actores Protagonistas",
            "descripcion" => "Ingrese los nombres de los protagonistas separados por comas(, )",
            "value" => 1,
            "type" => "text",
            'max' => 80,
            "field" => "form-field"),
        "censura" => array(
            "nombre" => "censura_pelicula",
            "titulo" => "Tipo de censura",
            "descripcion" => "Especificar si tiene censura o es apto para todo el publico",
            "value" => 1,
            "type" => "text",
            'max' => 80,
            "field" => "form-field"),
    );
    $meta_boxes_estrenos = array(
        "urlvideo" => array(
            "nombre" => "url_video",
            "titulo" => "Url del video de youtube",
            "descripcion" => "Ingrese la url del video que desea destacar",
            "value" => 1,
            "type" => "text",
            'max' => 150,
            "field" => "form-field")
    );

    // Función para registrar los campos personalizados en el template
    function crear_meta_box() {
        global $key;

        if (function_exists('add_meta_box')) {
            add_meta_box('meta-boxes-adicionales', 'Campos adicionales del Post', 'mostrar_meta_box', 'post', 'normal', 'high', 'meta_boxes_adicionales');
            add_meta_box('meta-boxes-slider', 'Carrusel de imagenes (Sliders)', 'mostrar_meta_box', 'post', 'normal', 'high', 'meta_boxes_slider');
            add_meta_box('meta-boxes-destacados', 'Destacados', 'mostrar_meta_box', 'post', 'normal', 'high', 'meta_boxes_destacados');
            add_meta_box('meta-boxes-especial', 'Sección Especial del día', 'mostrar_meta_box', 'post', 'normal', 'high', 'meta_boxes_especial');
            add_meta_box('meta-boxes-peliculas', 'Detalles para Cartelera', 'mostrar_meta_box', 'post', 'normal', 'high', 'meta_boxes_cine');
            add_meta_box('meta-boxes-estrenos', 'Video para estrenos', 'mostrar_meta_box', 'post', 'normal', 'high', 'meta_boxes_estrenos');
        }
    }

    // Función para mostrar los campos personalizados en la sección de administrador
    function mostrar_meta_box($post, $value) {
        global $post, $meta_boxes_adicionales,$meta_boxes_slider, $meta_boxes_destacados,
        $meta_boxes_especial, $meta_boxes_cine, $meta_boxes_estrenos;
        $meta_boxes = ${$value['args']};
        ?>

        <div class="form-wrap">
            <?php
            foreach ($meta_boxes as $meta_box) {
                wp_nonce_field(plugin_basename(__FILE__), $meta_box['nombre'] . '_wpnonce', false, true);
                $data = get_post_meta($post->ID, $meta_box['nombre'], true);
                $valor = (!isset($data)) ? '' : (($meta_box['nombre'] != 'url_video') ? htmlspecialchars($data) : $data);
                $checked = ($valor == 1) ? 'checked="checked"' : '';
                ?>
                <div class="<?php echo $meta_box['field']; ?> form-required">
                    <?php
                    switch ($meta_box['type']) {
                        case 'checkbox':
                            ?>
                            <input type="checkbox" name="<?php echo $meta_box['nombre'] ?>" <?php echo $checked ?> value="<?php echo $meta_box['value'] ?>"><?php echo $meta_box['descripcion'] ?><br/>
                            <?php
                            break;
                        case 'text':
                            ?>
                            <p>
                                <label class="label" for="<?php echo $meta_box['nombre'] ?>"><?php echo $meta_box['titulo'] ?></label>
                                <input  name="<?php echo $meta_box['nombre'] ?>" id="<?php echo 'id_' . $meta_box['nombre'] ?>" type="text" value="<?php echo $valor ?>" maxlength="<?php echo $meta_box['max'] ?>"/>
                            </p>
                            <p><?php echo $meta_box['descripcion'] ?></p>
                            <?php
                            break;
                    }
                    ?>
                </div>
            <?php }  ?>
        </div>
        <?php
    }

    // Función para grabar los campos personalizados de las noticias en la base de datos
    function grabar_meta_box($post_id) {
        global $post, $meta_boxes_adicionales, $meta_boxes_slider, $meta_boxes_destacados,
        $meta_boxes_especial, $key, $meta_boxes_cine, $meta_boxes_estrenos;
        $metaBoxes = array('meta_boxes_adicionales','meta_boxes_slider', 'meta_boxes_destacados', 'meta_boxes_especial', 'meta_boxes_cine', 'meta_boxes_estrenos');
        foreach ($metaBoxes as $meta) {
            $meta_boxes = ${$meta};
            foreach ($meta_boxes as $meta_box) {
                $data = $_POST[$meta_box['nombre']];
                if ($meta_box['nombre'] == 'url_video') {
                    preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+(?=\?)|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#", $_POST[$meta_box['nombre']], $videoId);
                    $data = $videoId[0];
                }

                if (!wp_verify_nonce($_POST[$meta_box['nombre'] . '_wpnonce'], plugin_basename(__FILE__)))
                    return $post_id;

                if (!current_user_can('edit_post', $post_id))
                    return $post_id;

                update_post_meta($post_id, $meta_box['nombre'], $data);
            }
        }
    }

    add_action('admin_menu', 'crear_meta_box');
    add_action('save_post', 'grabar_meta_box');

    // Campos personalizados para las categorías (Columnistas)
    function categorias_add_new_meta_fields() {
        ?>
        <div class="form-field">
            <label for="term_meta[nomb_colum]">Nombre de la Columna</label>
            <input type="text" name="term_meta[nomb_colum]" id="term_meta[texto01]" value="">
            <p class="description">Deberá llenar este campo cuando crea un columnista como categoria</p>
        </div>
        <?php
    }

    add_action('category_add_form_fields', 'categorias_add_new_meta_fields', 10, 2);

    function categorias_edit_meta_fields($term) {
        $t_id = $term->term_id;
        $term_meta = get_option("taxonomy_$t_id");
        ?>
        <tr class="form-field">
            <th scope="row" valign="top">
                <label for="term_meta[nomb_colum]">Nombre de la Columna</label>
            </th>
            <td>
                <input type="text" name="term_meta[nomb_colum]" id="term_meta[nomb_colum]" value="<?php echo esc_attr($term_meta['nomb_colum']) ? esc_attr($term_meta['nomb_colum']) : ''; ?>">
                <p class="description">Deberá llenar este campo cuando crea un columnista como categoria</p>
            </td>
        </tr>
        <?php
    }

    add_action('category_edit_form_fields', 'categorias_edit_meta_fields', 10, 2);

    function categorias_save_custom_meta($term_id) {
        if (isset($_POST['term_meta'])) {
            $t_id = $term_id;
            $term_meta = get_option("taxonomy_$t_id");
            $cat_keys = array_keys($_POST['term_meta']);
            foreach ($cat_keys as $key) {
                if (isset($_POST['term_meta'][$key])) {
                    $term_meta[$key] = $_POST['term_meta'][$key];
                }
            }
            update_option("taxonomy_$t_id", $term_meta);
        }
    }

    add_action('edited_category', 'categorias_save_custom_meta', 10, 2);
    add_action('create_category', 'categorias_save_custom_meta', 10, 2);
}

// --- PLUGINS ---
// Necesario para que funcione el plugin "Category Thumbnails"
add_theme_support('category-thumbnails');
