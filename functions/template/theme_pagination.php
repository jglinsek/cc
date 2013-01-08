<?php
/* ------------------------------------- */
/* BLOG PAGINATION by Patrick http://www.techspread.de/200/pagination-in-wordpress-theme-einbauen */
/* ------------------------------------- */

function pagination($start_end_links = 4, $middle_links = 4)
{
	global $wp_query;		
	// Keine Pagination auf Einzelseiten
	if(!is_single())	
	{			
		$current = get_query_var('paged') == 0 ? 1 : get_query_var('paged');	// Derzeitige Seite auslesen
		$total = $wp_query->max_num_pages;										// Gesamtanzahl Seiten
		$links_left = floor(($middle_links - 1) / 2);							// Anzahl Links am Anfang
		$links_right = ceil(($middle_links - 1) / 2);							// Anzahl Links am Ende
		// Pagination nur ausgeben, wenn mehr als eine Index-Seite besteht
		if($total > 1)	
		{				
			// Pagination-Anfang
			echo '<div class="blogpages"><ul>';
			// alle "Seiten" durchgehen
			for($i=1; $i<=$total; $i++)	
			{
				// Link auf die derzeitige Seite
				if($i == $current)
				{
					echo '<li><a href="#" class="selected">'.($current).'</a></li>';
				}
				// alle anderen Seiten-Links
				elseif($i >= ($current - $links_left) && $i <= ($current + $links_right) || $i <= $start_end_links || $i > ($total - $start_end_links))
				{
					echo '<li><a href="'.get_pagenum_link($i).'">'.$i.'</a></li>';
				}
				// auszulassene Seiten
				elseif($i == ($start_end_links + 1) && $i < ($current - $links_left + 1) || $i == ($total - $start_end_links) && $i > ($current + $links_right))
				{
					echo '<li>...</li>';
				}
			}
			// Pagination-Ende
			echo '</ul></div>';
		}
	}
}
?>