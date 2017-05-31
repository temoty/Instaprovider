<?php
global $query_string;

$query_args = explode("&", $query_string);
$search_query = array();

if( strlen($query_string) > 0 ) {
	foreach($query_args as $key => $string) {
		$query_split = explode("=", $string);
		$search_query[$query_split[0]] = urldecode($query_split[1]);
	} // foreach
} //if

$search = new WP_Query($search_query);
?>



<?php
/*
Template Name: Search Page
*/
?>



<?php get_header(); ?>

<div>
<h1>Search Posts TEST</h1>

<?php get_search_form(); ?>
</div>

<?php get_footer(); ?>



<?php
global $wp_query;
$total_results = $wp_query->found_posts;
?>

<a href="index.php?page_id=131" title="Search Page">Search Page</a>





