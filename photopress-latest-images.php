<?php

/*
Plugin Name: PhotoPress - Latest Images
Plugin URI: http://www.photopressdev.com
Description: Adds a shortcode that will display the latest image attachments.
Author: Peter Adams
Author URI: http://www.photopressdev.com
License: GPL v3
Version: 1.1
*/

/**
 * PhotoPress Image Taxonomies
 *
 * Copyright Peter Adams - peter@photopressdev.com
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 */

function photopress_showLatestImages( $atts ) {

	extract( shortcode_atts( array(

		'num_images' 			=> 50,
		'size' 					=> 'thumbnail',
		'exclude_taxonomy' 		=> '',
		'exclude_term'			=> '',
		'show_title'			=> false,
		'container_class'		=> 'gallery',
		'item_class'			=> 'gallery-item',
		'item_tag'				=> 'dl',
		'icon_class'			=> 'gallery-icon',
		'icon_tag'				=> 'dt',
		'columns'				=> 4,
		'pagination'			=> true

	), $atts ) );
	
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	
	$args = array(
	'post_type' 		=> 'attachment', 
	'post_status'		=> 'inherit', 
	'showposts' 		=> $num_images,
	//'posts_per_page'	=> 10,
	'paged' 			=> $paged
	
	);
	
	if ($exclude_taxonomy && $exclude_term ) {
		
		$args['tax_query'] =  array(
							  	//'relation' => 'AND',
								array(
									'taxonomy' => $exclude_taxonomy,
									'field' => 'slug',
									'terms' =>  $exclude_term,
									'operator' => 'NOT IN'
								)
							);
		
	}
	
	//$temp = $wp_query;
	//$wp_query = null;
	//$wp_query = new WP_Query( $args );
	query_posts( $args );
	
	if ( have_posts() ) {
		
		$items = sprintf( '<div class="%s %s-columns-%s">', $container_class, $container_class, $columns );	
		$i = 0;
		
		while ( have_posts() ) {
		
			the_post();
			
			$i++;
			
			$icon = sprintf(
				'<%s class="%s"><a class="nofancybox" href="%s">%s</a></%s>',
				$icon_tag,
				$icon_class,
				get_attachment_link( $post->ID ),
				wp_get_attachment_image( $post->ID, $size ),
				$icon_tag
				
			
			);
			
			$title = '';
			if ($show_title) {
				$title = '<div class="image-title-overlay" style="display: none;>';
				$title .= '<p class="image-title-overlay-content">';	
				$title .= sprintf(
					'<a class="image-title-overlay-content-link" href="%s">%s</a>',
					get_permalink( $post->ID ),
					get_the_title( $post->ID )
					
				);
				
				$title .= '</p></div>';
			}
			
			$item = sprintf( '<%s class="%s ">%s %s</%s>', $item_tag, $item_class, $icon, $title, $item_tag );
			
			if ( $i === $columns ) {
				$item .= '<br style="clear:both;">';
				$i = 0;
			}
			
			
			$items .= $item;
		}
		
		$items .= '<br style="clear:both;">';
		$items .= '</div>';
	
	
		if ( $pagination ) {
			// pagination
			//posts_nav_link();
			$items .= '<div class="pagination">';
			$items .= '<span class="alignleft">';
			$items .= get_previous_posts_link('&laquo; Previous Page');
			$items .= '</span>&nbsp;';
			$items .= '<span class="alignright">';
			$items .= get_next_posts_link('Next Page &raquo;','');
			$items .= '</span>';
			$items .= '</div>';
		}		
		
	}
	//reset global query
	wp_reset_query();
	
	return $items;
}


add_shortcode('photopress-latest-images', 'photopress_showLatestImages');

?>