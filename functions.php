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
                'menu-sitetop' => __('Menu Sitie Top')
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
// add_theme_support('category-thumbnails');


/*-------------------[ Resumen del blog y longitud ]----------------------*/
function wpdocs_excerpt_more( $more ) {
    return sprintf( '... <a class="" title="Leer más" href="%1$s">Leer más</a>',
        get_permalink( get_the_ID() ),
        __( 'Leer más', 'textdomain' )
    );
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );

function wpdocs_custom_excerpt_length( $length ) {
    return 16;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 10 );

/*-------------------[ Fin - Resumen del blog y longitud ]----------------------*/


/*-------------------[ Imagen Destacada]----------------------*/
add_theme_support('post-thumbnails');//imagen destacada
add_image_size('small-thumbnail',180,120,true);
add_image_size('img-post-box',348,210,true);
add_image_size('banner-image',920,210,array('left','top'));
/*-------------------[ Fin - Imagen Destacada ]----------------------*/

/*------------------| Thumbnails |-------------------*/
if(function_exists('add_theme_support')) {
    add_theme_support('category-thumbnails');
}
/*------------------| Fin - Thumbnails |-------------------*/

/*------------------| Template Sub - category opinion |-------------------*/
function sub_category_opinion( $template ) {
    if ( cat_is_ancestor_of( 18, get_queried_object_id() /* The current category ID */ ) ){
        $template = locate_template( 'subcat_colum.php' );
    }
    return $template;
}

add_filter( 'category_template', 'sub_category_opinion' );
/*------------------| Fin - Template Sub - category opinion |-------------------*/

/*------------------| Template Sub - category opinion |-------------------*/
function sub_category_bloguero( $template ) {
    if ( cat_is_ancestor_of( 131, get_queried_object_id() /* The current category ID */ ) ){
        $template = locate_template( 'subcat_blog.php' );
    }
    return $template;
}

add_filter( 'category_template', 'sub_category_bloguero' );
/*------------------| Fin - Template Sub - category opinion |-------------------*/

/*------------------| Fin - Single Sub - category opinion y blogueros |-------------------*/
if ( ! function_exists( 'post_is_in_descendant_category' ) ) {
    function post_is_in_descendant_category( $cats, $_post = null ) {
        foreach ( (array) $cats as $cat ) {
            // get_term_children() accepts integer ID only
            $descendants = get_term_children( (int) $cat, 'category' );
            if ( $descendants && in_category( $descendants, $_post ) )
                return true;
        }
        return false;
    }
}
/*------------------| Fin - Single Sub - category opinion y blogueros |-------------------*/
