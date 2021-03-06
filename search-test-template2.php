<?php
/*
Template Name: Search Test Template2
*/
get_header();
$search = new WP_Advanced_Search('my-form'); 
?>

    <div class="container">
        <div class="row">
            <div id="search-form" class="col-md-10 col-md-offset-1">

                <?php
            $temp = $wp_query;
            $wp_query = $search->query();
            ?>

                    <?php $search->the_form(); ?>

            </div>


            <div class="col-md-12">
                <h4 class="results-count">



                    <?php
                    if(isset($_GET["tax_category"])){
    $specialtyy = $_GET["tax_category"];
    if ($specialtyy === "music-teachers") {
        $specialtyy = "music teachers";
    } elseif ($specialtyy === "life-coaches") {
        $specialtyy = "life coaches";
    } elseif ($specialtyy === "personal-trainers") {
        $specialtyy = "personal trainers";
    } elseif ($specialtyy === "artists") {
        $specialtyy = "artists";
    } elseif ($specialtyy === "massage") {
        $specialtyy = "massage therapist";
    }
} 

?>

                        <!-- Displaying <?php echo $search->results_range( $args = array('marker' => '-') ); ?> of <?php echo $wp_query->found_posts; ?> results in Boston Area -->
                        <h1 class="search-results-heading">Displaying
                        <?php echo $wp_query->found_posts; str_repeat('&nbsp;', 3); ?>
                        <?php echo $specialtyy; ?> results in Boston Area</h1>

                </h4>
            </div>

            <?php
        if (have_posts()) :

            while (have_posts()) : the_post(); ?>
                <?php $post_type = get_post_type_object($post->post_type); ?>

                <div class="col-md-12 provider-result">
                    <div class="col-sm-5 provider-result-video">
                        <iframe src="https://player.vimeo.com/video/<?php the_field( 'vimeo_id' ); ?>?title=0&byline=0&portrait=0&badge=0" width="330"
                            height="186" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                    </div>
                    <div class="col-sm-7 provider-result-excerpt">
                        <article>
                            <h4>
                                <a href="<?php the_permalink(); ?>">
                                    <?php/* the_title(); */?>
                                </a>
                            </h4>

                            <?php the_excerpt(); ?>
                            <a href="<?php the_permalink(); ?>">Learn More About <?php the_title(); ?></a>
                        </article>
                    </div>

                </div>

                <?php
            endwhile;

        else :
            echo '<p></p>';
        endif;

        $search->pagination();

        $wp_query = $temp;
        wp_reset_query();

                ?>

        </div>
    </div>

    <?php get_footer(); ?>
