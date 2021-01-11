<?php 

// on créé une zone pour le menu 
register_nav_menu( 'menuheader', 'Menu du Header' );
register_nav_menu( 'menufooter', 'Menu du Footer' );


function header_widgets_init() {
 
register_sidebar( array(

 'name' => 'Ma zone que je viens de créer',
 'id' => 'nouvelle-zone',
 'before_widget' => '<div class="mettez-ce-que-vous-voulez">',
 'after_widget' => '</div>',
 'before_title' => '<h2 class="mettez-ce-que-vous-voulez">',
 'after_title' => '</h2>',
 ) );
 
 
register_sidebar( array(

 'name' => 'Ma zone que je viens de créer 2',
 'id' => 'nouvelle-zone-2',
 'before_widget' => '<div class="mettez-ce-que-vous-voulez">',
 'after_widget' => '</div>',
 'before_title' => '<h2 class="mettez-ce-que-vous-voulez">',
 'after_title' => '</h2>',
 ) );
 
 }

add_action( 'widgets_init', 'header_widgets_init' );


//‘name’ = nom de la “widget area” qui apparaîtra dans votre administration WordPress
//‘id’ = identifiant unique de votre “widget area”
//‘before_widget’ = choisir une balise HTML à ouvrir avant votre widget (<div>, <li> etc…) et profitez-en pour y ajouter une classe qui pourra vous aider lors de la customisation CSS (étape 5)
//‘after_widget’ = fermer la balise (</div>, </li> etc…)
//‘before_title’ = choisir une balise pour le titre du widget (<h2>, <h3>, <h4> etc…) et, comme pour le ‘before_widget’, ajoutez une classe pour agir en CSS ultérieurement
//‘after_title’ = fermer la balise du titre (</h2>, </h3>, </h4> etc…)

/*
* On utilise une fonction pour créer notre custom post type 'Séries TV'
*/

function wpm_custom_post_type() {

	// On rentre les différentes dénominations de notre custom post type qui seront affichées dans l'administration
	$labels = array(
		// Le nom au pluriel
		'name'                => _x( 'Séries TV', 'Post Type General Name'),
		// Le nom au singulier
		'singular_name'       => _x( 'Série TV', 'Post Type Singular Name'),
		// Le libellé affiché dans le menu
		'menu_name'           => __( 'Séries TV'),
		// Les différents libellés de l'administration
		'all_items'           => __( 'Toutes les séries TV'),
		'view_item'           => __( 'Voir les séries TV'),
		'add_new_item'        => __( 'Ajouter une nouvelle série TV'),
		'add_new'             => __( 'Ajouter'),
		'edit_item'           => __( 'Editer la séries TV'),
		'update_item'         => __( 'Modifier la séries TV'),
		'search_items'        => __( 'Rechercher une série TV'),
		'not_found'           => __( 'Non trouvée'),
		'not_found_in_trash'  => __( 'Non trouvée dans la corbeille'),
	);
	
	// On peut définir ici d'autres options pour notre custom post type
	
	$args = array(
		'label'               => __( 'Séries TV'),
		'description'         => __( 'Tous sur séries TV'),
        'labels'              => $labels,
        'menu_icon'           => 'dashicons-video-alt2',
		// On définit les options disponibles dans l'éditeur de notre custom post type ( un titre, un auteur...)
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
		/* 
		* Différentes options supplémentaires
		*/
		'show_in_rest' => true,
		'hierarchical'        => false,
		'public'              => true,
		'has_archive'         => true,
		'rewrite'			  => array( 'slug' => 'series-tv'),

	);
	
	// On enregistre notre custom post type qu'on nomme ici "serietv" et ses arguments
	register_post_type( 'seriestv', $args );

}

add_action( 'init', 'wpm_custom_post_type', 0 );

add_action( 'init', 'wpm_add_taxonomies', 0 );

//On crée 3 taxonomies personnalisées: Année, Réalisateurs et Catégories de série.

function wpm_add_taxonomies() {
	
	// Taxonomie Année

	// On déclare ici les différentes dénominations de notre taxonomie qui seront affichées et utilisées dans l'administration de WordPress
	$labels_annee = array(
		'name'              			=> _x( 'Années', 'taxonomy general name'),
		'singular_name'     			=> _x( 'Année', 'taxonomy singular name'),
		'search_items'      			=> __( 'Chercher une année'),
		'all_items'        				=> __( 'Toutes les années'),
		'edit_item'         			=> __( 'Editer l année'),
		'update_item'       			=> __( 'Mettre à jour l année'),
		'add_new_item'     				=> __( 'Ajouter une nouvelle année'),
		'new_item_name'     			=> __( 'Valeur de la nouvelle année'),
		'separate_items_with_commas'	=> __( 'Séparer les réalisateurs avec une virgule'),
		'menu_name'         => __( 'Année'),
	);

	$args_annee = array(
	// Si 'hierarchical' est défini à false, notre taxonomie se comportera comme une étiquette standard
		'hierarchical'      => false,
		'labels'            => $labels_annee,
		'show_ui'           => true,
		'show_in_rest'      => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'annees' ),
	);

	register_taxonomy( 'annees', 'seriestv', $args_annee );

	// Taxonomie Réalisateurs
	
	$labels_realisateurs = array(
		'name'                       => _x( 'Réalisateurs', 'taxonomy general name'),
		'singular_name'              => _x( 'Réalisateur', 'taxonomy singular name'),
		'search_items'               => __( 'Rechercher un réalisateur'),
		'popular_items'              => __( 'Réalisateurs populaires'),
		'all_items'                  => __( 'Tous les réalisateurs'),
		'edit_item'                  => __( 'Editer un réalisateur'),
		'update_item'                => __( 'Mettre à jour un réalisateur'),
		'add_new_item'               => __( 'Ajouter un nouveau réalisateur'),
		'new_item_name'              => __( 'Nom du nouveau réalisateur'),
		'separate_items_with_commas' => __( 'Séparer les réalisateurs avec une virgule'),
		'add_or_remove_items'        => __( 'Ajouter ou supprimer un réalisateur'),
		'choose_from_most_used'      => __( 'Choisir parmi les plus utilisés'),
		'not_found'                  => __( 'Pas de réalisateurs trouvés'),
		'menu_name'                  => __( 'Réalisateurs'),
	);

	$args_realisateurs = array(
		'hierarchical'          => false,
		'labels'                => $labels_realisateurs,
		'show_ui'               => true,
		'show_in_rest'			=> true,
		'show_admin_column'     => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var'             => true,
		'rewrite'               => array( 'slug' => 'realisateurs' ),
	);

	register_taxonomy( 'realisateurs', 'seriestv', $args_realisateurs );
	
	// Catégorie de série

	$labels_cat_serie = array(
		'name'                       => _x( 'Catégories de série', 'taxonomy general name'),
		'singular_name'              => _x( 'Catégories de série', 'taxonomy singular name'),
		'search_items'               => __( 'Rechercher une catégorie'),
		'popular_items'              => __( 'Catégories populaires'),
		'all_items'                  => __( 'Toutes les catégories'),
		'edit_item'                  => __( 'Editer une catégorie'),
		'update_item'                => __( 'Mettre à jour une catégorie'),
		'add_new_item'               => __( 'Ajouter une nouvelle catégorie'),
		'new_item_name'              => __( 'Nom de la nouvelle catégorie'),
		'add_or_remove_items'        => __( 'Ajouter ou supprimer une catégorie'),
		'choose_from_most_used'      => __( 'Choisir parmi les catégories les plus utilisées'),
		'not_found'                  => __( 'Pas de catégories trouvées'),
		'menu_name'                  => __( 'Catégories de série'),
	);

	$args_cat_serie = array(
	// Si 'hierarchical' est défini à true, notre taxonomie se comportera comme une catégorie standard
		'hierarchical'          => true,
		'labels'                => $labels_cat_serie,
		'show_ui'               => true,
		'show_in_rest'			=> true,
		'show_admin_column'     => true,
		'query_var'             => true,
		'rewrite'               => array( 'slug' => 'categories-series' ),
	);

	register_taxonomy( 'categoriesseries', 'seriestv', $args_cat_serie );
}

