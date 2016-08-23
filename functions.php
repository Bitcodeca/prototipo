<?php
/*
	==========================================
	 Include scripts
	==========================================
*/
function prototipo_script_enqueue() {
	//css
     wp_enqueue_style('Bootstrap grid', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '1.0.0', 'all');
     wp_enqueue_style('Materializecss', 'https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css', array(), '0.97.7', 'all');
     wp_enqueue_style('material icons', 'https://fonts.googleapis.com/icon?family=Material+Icons', array(), '1.0.0', 'all');
     wp_enqueue_style('style', get_template_directory_uri() . '/css/style.css', array(), '1.0.1', 'all');
	
    //js
    wp_enqueue_script('jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js', array(), '3.1.0', true);
    wp_enqueue_script('Materialize js', 'https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js', array(), '0.97.6', true);
    wp_enqueue_script('Mixitupjs', 'https://cdnjs.cloudflare.com/ajax/libs/mixitup/2.1.11/jquery.mixitup.min.js', array(), '2.1.11', true);
    wp_enqueue_script('Mixituppaginationjs',  'http://tseoc.co.uk/chris/jquery.mixitup-pagination.min.js', array(), '1.0.0', true);
}
add_action( 'wp_enqueue_scripts', 'prototipo_script_enqueue');

function menunavbar() {
	add_theme_support('menus');
    register_nav_menu('admin', 'Administrador');
    register_nav_menu('user', 'Usuario');
    register_nav_menu('contributor', 'Analista');
	}
add_action('init', 'menunavbar');

////////////////////////
// TAXONOMIA GERENTE //
//////////////////////
add_action( 'init', 'taxonomiagerente', 0 );
function taxonomiagerente() {
  $labels = array(
    'name' => _x( 'Gerente', 'taxonomy general name' ),
    'singular_name' => _x( 'Gerente', 'taxonomy singular name' ),
    'search_items' =>  __( 'Buscar Gerente' ),
    'all_items' => __( 'Todos los Gerentes' ),
    'edit_item' => __( 'Editar Gerente' ), 
    'update_item' => __( 'Actualizar Gerente' ),
    'add_new_item' => __( 'Añadir Gerente' ),
    'new_item_name' => __( 'Nuevo Gerente' ),
    'menu_name' => __( 'Gerente' ),
  );    
  register_taxonomy('Gerente',array('post'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'gerente' ),
  ));

}

////////////////////////
// TAXONOMIA CAMPAÑA //
//////////////////////
add_action( 'init', 'taxonomiacampana', 0 );
function taxonomiacampana() {
  $labels = array(
    'name' => _x( 'Campaña', 'taxonomy general name' ),
    'singular_name' => _x( 'Campaña', 'taxonomy singular name' ),
    'search_items' =>  __( 'Buscar Campaña' ),
    'all_items' => __( 'Todos los Campañas' ),
    'edit_item' => __( 'Editar Campaña' ), 
    'update_item' => __( 'Actualizar Campaña' ),
    'add_new_item' => __( 'Añadir Campaña' ),
    'new_item_name' => __( 'Nueva Campaña' ),
    'menu_name' => __( 'Campaña' ),
  );    
  register_taxonomy('campaña',array('admin'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'campaña' ),
  ));

}
/////////////////////////////////////////////////////////////////////
// AGREGAR NOMBRE DE USUARIOS A TAXONOMIA GERENTE AUTOMATICAMENTE //
///////////////////////////////////////////////////////////////////
function termsgerente() {
        $blogusers = get_users( 'role=subscriber' );
        foreach ( $blogusers as $user ) {
            $usuario= esc_html( $user->user_login );
            if( !term_exists( $usuario , 'Gerente' ) ) {
               wp_insert_term(
                   $usuario,
                   'Gerente',
                   array(
                     'description' => 'Gerente',
                     'slug'        => $usuario
                   )
               );
           }
        }
 } add_action( 'init', 'termsgerente', 0 );

function termscampana() {
        $blogusers = get_users( 'role=subscriber' );
        foreach ( $blogusers as $user ) {
            $usuario= esc_html( $user->user_login );
            if( !term_exists( $usuario , 'campaña' ) ) {
               wp_insert_term(
                   $usuario,
                   'campaña',
                   array(
                     'description' => 'campaña',
                     'slug'        => $usuario
                   )
               );
           }
        }
 } add_action( 'init', 'termscampana', 0 );

//////////////////////
// TAXONOMIA COSTO //
////////////////////
add_action( 'init', 'costo_taxonomy', 0 );
function costo_taxonomy() {
  $labels = array(
    'name' => _x( 'Costo', 'taxonomy general name' ),
    'singular_name' => _x( 'Costo', 'taxonomy singular name' ),
    'search_items' =>  __( 'Buscar Costo' ),
    'popular_items' => __( 'Costos frecuentes' ),
    'all_items' => __( 'Todas los Costos' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Editar Costo' ), 
    'update_item' => __( 'Actualizar Costo' ),
    'add_new_item' => __( 'Agregar nuevo Costo' ),
    'new_item_name' => __( 'Cantidad de nuevo Costo' ),
    'separate_items_with_commas' => __( '' ),
    'add_or_remove_items' => __( 'Agregar o Quitar Costo' ),
    'choose_from_most_used' => __( 'Escoger de los cosotos utilizados' ),
    'menu_name' => __( 'Costo' ),
  ); 
  register_taxonomy('costo','post',array(
    'hierarchical' => false,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'costo' ),
  ));
}

/////////////////////////
// TAXONOMIA CANTIDAD //
///////////////////////
add_action( 'init', 'cantidad_taxonomy', 0 );
function cantidad_taxonomy() {
  $labels = array(
    'name' => _x( 'Cantidad', 'taxonomy general name' ),
    'singular_name' => _x( 'Cantidad', 'taxonomy singular name' ),
    'search_items' =>  __( 'Buscar Cantidad' ),
    'popular_items' => __( 'Candidades frecuentes' ),
    'all_items' => __( 'Todas las Cantidades' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Editar Cantidad' ), 
    'update_item' => __( 'Actualizar Cantidad' ),
    'add_new_item' => __( 'Agregar nueva Cantidad' ),
    'new_item_name' => __( 'Nueva Cantidad' ),
    'separate_items_with_commas' => __( '' ),
    'add_or_remove_items' => __( 'Agregar o Quitar Cantidad' ),
    'choose_from_most_used' => __( 'Escoger de las Cantidades utilizadas' ),
    'menu_name' => __( 'Cantidad' ),
  ); 
  register_taxonomy('cantidad','post',array(
    'hierarchical' => false,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'cantidad' ),
  ));
}

///////////////////////////////////
// TAXONOMIA GANANCIA VENDENDOR //
/////////////////////////////////
add_action( 'init', 'gananciavendedor_taxonomy', 0 );
function gananciavendedor_taxonomy() {
  $labels = array(
    'name' => _x( 'Ganancia Vendedor', 'taxonomy general name' ),
    'singular_name' => _x( 'Ganancia Vendedor', 'taxonomy singular name' ),
    'search_items' =>  __( 'Buscar Ganancia Vendedor' ),
    'popular_items' => __( 'Ganancia Vendedor frecuentes' ),
    'all_items' => __( 'Todas las Ganancia Vendedor' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Editar Ganancia Vendedor' ), 
    'update_item' => __( 'Actualizar Ganancia Vendedor' ),
    'add_new_item' => __( 'Agregar nueva Ganancia Vendedor' ),
    'new_item_name' => __( 'Nueva Ganancia Vendedor' ),
    'separate_items_with_commas' => __( '' ),
    'add_or_remove_items' => __( 'Agregar o Quitar Ganancia Vendedor' ),
    'choose_from_most_used' => __( 'Escoger de las Cantidades utilizadas' ),
    'menu_name' => __( 'Ganancia Vendedor' ),
  ); 
  register_taxonomy('gananciavendedor','admin', array(
    'hierarchical' => false,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'gananciavendedor' ),
  ));
}

//////////////////////////////
// TAXONOMIA PREMIO BASICO //
////////////////////////////
add_action( 'init', 'premiobasico_taxonomy', 0 );
function premiobasico_taxonomy() {
  $labels = array(
    'name' => _x( 'Premio Básico', 'taxonomy general name' ),
    'singular_name' => _x( 'Premio Básico', 'taxonomy singular name' ),
    'search_items' =>  __( 'Buscar Premio Básico' ),
    'popular_items' => __( 'Premio Básico frecuentes' ),
    'all_items' => __( 'Todas los Premio Básico' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Editar Premio Básico' ), 
    'update_item' => __( 'Actualizar Premio Básico' ),
    'add_new_item' => __( 'Agregar nueva Premio Básico' ),
    'new_item_name' => __( 'Nuevo Premio Básico' ),
    'separate_items_with_commas' => __( '' ),
    'add_or_remove_items' => __( 'Agregar o Quitar Premio Básico' ),
    'choose_from_most_used' => __( 'Escoger de las Cantidades utilizadas' ),
    'menu_name' => __( 'Premio Básico' ),
  ); 
  register_taxonomy('premiobasico','admin', array(
    'hierarchical' => false,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'premiobasico' ),
  ));
}

/////////////////////////////
// TAXONOMIA DISTRIBUCION //
///////////////////////////
add_action( 'init', 'distribucion_taxonomy', 0 );
function distribucion_taxonomy() {
  $labels = array(
    'name' => _x( 'Distribución', 'taxonomy general name' ),
    'singular_name' => _x( 'Distribución', 'taxonomy singular name' ),
    'search_items' =>  __( 'Buscar Distribución' ),
    'popular_items' => __( 'Distribución frecuentes' ),
    'all_items' => __( 'Todas las Distribuciones' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Editar Distribución' ), 
    'update_item' => __( 'Actualizar Distribución' ),
    'add_new_item' => __( 'Agregar nuevo Distribución' ),
    'new_item_name' => __( 'Nueva Distribución' ),
    'separate_items_with_commas' => __( '' ),
    'add_or_remove_items' => __( 'Agregar o Quitar Distribución' ),
    'choose_from_most_used' => __( 'Escoger de las Cantidades utilizadas' ),
    'menu_name' => __( 'Distribución' ),
  ); 
  register_taxonomy('distribucion','admin', array(
    'hierarchical' => false,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'distribucion' ),
  ));
}

/////////////////////////
// TAXONOMIA GERENCIA //
///////////////////////
add_action( 'init', 'gerencia_taxonomy', 0 );
function gerencia_taxonomy() {
  $labels = array(
    'name' => _x( 'Gerencia', 'taxonomy general name' ),
    'singular_name' => _x( 'Gerencia', 'taxonomy singular name' ),
    'search_items' =>  __( 'Buscar Gerencia' ),
    'popular_items' => __( 'Gerencia frecuentes' ),
    'all_items' => __( 'Todas las Gerencias' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Editar Gerencia' ), 
    'update_item' => __( 'Actualizar Gerencia' ),
    'add_new_item' => __( 'Agregar nuevo Gerencia' ),
    'new_item_name' => __( 'Nueva Gerencia' ),
    'separate_items_with_commas' => __( '' ),
    'add_or_remove_items' => __( 'Agregar o Quitar Gerencia' ),
    'choose_from_most_used' => __( 'Escoger de las Cantidades utilizadas' ),
    'menu_name' => __( 'Gerencia' ),
  ); 
  register_taxonomy('gerencia','admin', array(
    'hierarchical' => false,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'gerencia' ),
  ));
}

/////////////////////////
// TAXONOMIA INCENTIVO //
///////////////////////
add_action( 'init', 'incentivo_taxonomy', 0 );
function incentivo_taxonomy() {
  $labels = array(
    'name' => _x( 'Incentivo', 'taxonomy general name' ),
    'singular_name' => _x( 'Incentivo', 'taxonomy singular name' ),
    'search_items' =>  __( 'Buscar Incentivo' ),
    'popular_items' => __( 'Incentivo frecuentes' ),
    'all_items' => __( 'Todas los Incentivo' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Editar Incentivo' ), 
    'update_item' => __( 'Actualizar Incentivo' ),
    'add_new_item' => __( 'Agregar nuevo Incentivo' ),
    'new_item_name' => __( 'Nuevo Incentivo' ),
    'separate_items_with_commas' => __( '' ),
    'add_or_remove_items' => __( 'Agregar o Quitar Incentivo' ),
    'choose_from_most_used' => __( 'Escoger de las Cantidades utilizadas' ),
    'menu_name' => __( 'Incentivo' ),
  ); 
  register_taxonomy('incentivo','admin', array(
    'hierarchical' => false,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'incentivo' ),
  ));
}

////////////////////////
// CUSTOM POST ADMIN //
//////////////////////
function postadmin(){
   $args = array(
   'labels'=> array( 'name'=>'admin',
       'singular_name'=> 'admin',
       'menu_name'=>'Admin',
       'name_admin_bar'=> 'admin',
       'all_items' =>'Ver todas las publicaciones',
       'add_new'=> 'Añadir nueva publicación' ),
   'description' =>"Este tipo de post es para el admin",
   'public' => true,
   'exclude_from_search'=>false,
   'publicly_queryable'=> true,
   'show_ui' => true,
   'show_in_menu'=> true,
   'show_in_admin_bar'=> true,
   'menu_position'=>6,
   'capability_type'=> 'page',
   'supports'=> array( 'title'),
  'taxonomies' => array('gananciavendedor', 'premiobasico', 'distribucion', 'gerencia', 'Gerente', 'incentivo', 'campaña'),
   'query_var'=>true,
  );
  register_post_type( "admin", $args );
 }
 add_action("init","postadmin");

////////////////////////////////////////////
// BUSQUEDA DE TAXONOMIA GERENTE EN POST //
//////////////////////////////////////////
function buscargerente() {
    global $typenow;
    $post_type = 'post';
    $taxonomy = 'Gerente';
    if ($typenow == $post_type) {
        $selected = isset($_GET[$taxonomy]) ? $_GET[$taxonomy] : '';
        $info_taxonomy = get_taxonomy($taxonomy);
        wp_dropdown_categories(array(
            'show_option_all' => __("Mostrar todos los {$info_taxonomy->label}"),
            'taxonomy' => $taxonomy,
            'name' => $taxonomy,
            'orderby' => 'name',
            'selected' => $selected,
            'show_count' => true,
            'hide_empty' => true,
        ));
    };
}
add_action('restrict_manage_posts', 'buscargerente');
function buscargerentetabla($query) {
    global $pagenow;
    $post_type = 'post';
    $taxonomy = 'Gerente';
    $q_vars = &$query->query_vars;
    if ($pagenow == 'edit.php' && isset($q_vars['post_type']) && $q_vars['post_type'] == $post_type && isset($q_vars[$taxonomy]) && is_numeric($q_vars[$taxonomy]) && $q_vars[$taxonomy] != 0) {
        $term = get_term_by('id', $q_vars[$taxonomy], $taxonomy);
        $q_vars[$taxonomy] = $term->slug;
    }
}
add_filter('parse_query', 'buscargerentetabla');


if( ! class_exists( 'Materialize_Walker_Desktop_Nav_Menu' ) ) :

    class Materialize_Walker_Desktop_Nav_Menu extends Walker_Nav_Menu {

        private $curItem;

        /**
         * Starts the list before the elements are added.
         *
         * Adds classes to the unordered list sub-menus.
         *
         * @param string $output Passed by reference. Used to append additional content.
         * @param int    $depth  Depth of menu item. Used for padding.
         * @param array  $args   An array of arguments. @see wp_nav_menu()
         */
        function start_lvl( &$output, $depth = 0, $args = array() ) {

            // Depth-dependent classes.
            $indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
            $display_depth = ( $depth + 1); // because it counts the first submenu as 0
            $classes = array(
                'sub-menu',
                ( $display_depth % 2  ? 'menu-odd' : 'menu-even' ),
                ( $display_depth >=2 ? 'sub-sub-menu' : '' ),
                'menu-depth-' . $display_depth
            );
            $class_names = implode( ' ', $classes );

            // Build HTML for output.
            $output .= "\n" . $indent . '<ul id="' . $this->curItem->post_name . '" class="' . $class_names . ' dropdown-content">' . "\n";
        }

        /**
         * Start the element output.
         *
         * Adds main/sub-classes to the list items and links.
         *
         * @param string $output Passed by reference. Used to append additional content.
         * @param object $item   Menu item data object.
         * @param int    $depth  Depth of menu item. Used for padding.
         * @param array  $args   An array of arguments. @see wp_nav_menu()
         * @param int    $id     Current item ID.
         */
        function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
            global $wp_query;
            $this->curItem = $item;
            $indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent

            // Depth-dependent classes.
            $depth_classes = array(
                ( $depth == 0 ? 'main-menu-item' : 'sub-menu-item' ),
                ( $depth >=2 ? 'sub-sub-menu-item' : '' ),
                ( $depth % 2 ? 'menu-item-odd' : 'menu-item-even' ),
                'menu-item-depth-' . $depth
            );

            $depth_class_names = esc_attr( implode( ' ', $depth_classes ) );

            // Passed classes.
            $classes = empty( $item->classes ) ? array() : (array) $item->classes;
            $class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );

            // Build HTML.
            $output .= $indent . '<li id="nav-menu-item-'. $item->ID . '" class="' . $depth_class_names . ' ' . $class_names . '">';
            if( in_array( 'menu-item-has-children', $item->classes ) ) {$dropdown='dropdown-button ';}else{$dropdown='';}
            // Link attributes.
            $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
            $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
            $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
            $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
            $attributes .= ' class="menu-link ' .$dropdown. ( $depth > 0 ? 'sub-menu-link' : 'main-menu-link' ) . '"';

            if( in_array( 'menu-item-has-children', $item->classes ) ) 
                $attributes .= ' data-activates="' . $item->post_name . '"';

            // Build HTML output and pass through the proper filter.
            $item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
                $args->before,
                $attributes,
                $args->link_before,
                apply_filters( 'the_title', $item->title, $item->ID ),
                $args->link_after,
                $args->after
            );
            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
        }
    }

endif;
?>