<?php
	/* ------------------------------------- */
	/* PORTFOLIO POST TYPES */
	/* ------------------------------------- */
	
	$portfolio_slugs = get_option("dm_portfolio_slug");
	$portfolio_counter = 0;
	$portfolio_names = get_option("dm_portfolio_name");
	if(is_array($portfolio_slugs))
		foreach ( $portfolio_slugs as $slug ){
			add_action('init', 'create_portfolio');
			register_taxonomy("category_".$slug, array($slug), array("hierarchical" => true, "label" => $portfolio_names[$portfolio_counter]." Categories", "singular_label" => $portfolio_names[$portfolio_counter++]." Category", "rewrite" => true));
		}
			
	function create_portfolio() {
		$portfolio_slugs = get_option("dm_portfolio_slug");
		$portfolio_counter = 0;
		$portfolio_names = get_option("dm_portfolio_name");
		if(is_array($portfolio_slugs)){
			foreach ( $portfolio_slugs as $slug ){
				$portfolio_args = array(
					'label' => __("Portfolio '".$portfolio_names[$portfolio_counter]."'"),
					'singular_label' => __($portfolio_names[$portfolio_counter++]),
					'public' => true,
					'show_ui' => true,
					'capability_type' => 'post',
					'hierarchical' => false,
					'rewrite' => array('slug' => $slug, 'with_front' => true),
					'supports' => array('title', 'editor', 'thumbnail', 'author', 'comments', 'excerpt')
				);
				register_post_type($slug,$portfolio_args);
			}
		}
	}
	
	function portfolioSingleRedirect(){
	    global $wp_query;
	    $queryptype = $wp_query->query_vars["post_type"];
		$portfolio_slugs = get_option("dm_portfolio_slug");
		if(is_array($portfolio_slugs))
			foreach ( $portfolio_slugs as $slug ){
				if ($queryptype == $slug){
					if (have_posts()){
						global $pcat;
						$pcat = "category_".$slug;
						require(TEMPLATEPATH . '/single_portfolio.php');
						die();
					}else{
						$wp_query->is_404 = true;
					}
				}
			}
	}
	add_action("template_redirect", 'portfolioSingleRedirect');