<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<?php do_action( 'fl_head_open' ); ?>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<?php echo apply_filters( 'fl_theme_viewport', "<meta name='viewport' content='width=device-width, initial-scale=1.0' />\n" ); ?>
<?php echo apply_filters( 'fl_theme_xua_compatible', "<meta http-equiv='X-UA-Compatible' content='IE=edge' />\n" ); ?>
<link rel="profile" href="https://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />




<?php

$tax_category_exists = array_key_exists("tax_category", $_GET); 
$tax_category_name = ($_GET["tax_category"]);

if ( $tax_category_name == "massage" ) { 
	echo "$tax_category_name " . "results" . FLTheme::title();
} else {
	// echo FLTheme::title();
	echo "cat";
}


//   if (is_page_template( 'page-show.php' ) ) {
//       echo "$show_name - " . wp_title( '|', false, 'right' ) . " Leicester";
//   } else {
//       echo wp_title( '|', false, 'right' ) . ' Leicester';
//   }
  

// $slide = ($_GET["id"]);
// then an if statement to display content based on parameter

// <?php  if($slide == 'link1') { 
//    //content
//  } 

// EXAMPLE:
// $string_one = '';
// if ($string_one === 'cat'){
//   echo 'yes, values match.';
// } elseif ($string_one == "") {
//   echo 'it\'s an empty string.';  
// } else {
//   echo 'no, values don\'t match.';
// }

?>

<?php FLTheme::favicon(); ?>
<?php FLTheme::fonts(); ?>
<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5shiv.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/respond.min.js"></script>
<![endif]-->
<?php

wp_head();

// FLTheme::head();

?>
</head>

<body <?php body_class(); ?> itemscope="itemscope" itemtype="https://schema.org/WebPage">
<?php

FLTheme::header_code();

do_action( 'fl_body_open' );

?>
<div class="fl-page">
	<?php

	do_action( 'fl_page_open' );

	FLTheme::fixed_header();

	do_action( 'fl_before_top_bar' );

	FLTheme::top_bar();

	do_action( 'fl_after_top_bar' );
	do_action( 'fl_before_header' );

	FLTheme::header_layout();

	do_action( 'fl_after_header' );
	do_action( 'fl_before_content' );

	?>
	<div class="fl-page-content" itemprop="mainContentOfPage">

		<?php do_action( 'fl_content_open' ); ?>
