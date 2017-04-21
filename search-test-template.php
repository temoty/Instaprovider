<?php
/*
Template Name: Search Test Template
*/
get_header();
$search = new WP_Advanced_Search('my-form'); ?>

    <div class="fl-content-full container">
        <div class="row">
            <div class="fl-content col-md-12">
                <?php $search->the_form(); ?>
            </div>

            <?php
            $temp = $wp_query;
            $wp_query = $search->query();
            ?>

            <h4 class="results-count">
                Displaying <?php echo $search->results_range(); ?> of <?php echo $wp_query->found_posts; ?> results
            </h4>
        </div>

        <?php
        if (have_posts()) :

            while (have_posts()) : the_post(); ?>
                <?php $post_type = get_post_type_object($post->post_type); ?>
                <article>
                    <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                    <p class="info"><strong>Post Type:</strong> <?php echo $post_type->labels->singular_name; ?> <strong>Date added:</strong> <?php the_time('F j, Y'); ?></p>
                    <?php the_excerpt(); ?>
                </article>

                <?php
            endwhile;

        else :
            echo '<p>Sorry, no results matched your search.</p>';
        endif;

        $search->pagination();

        $wp_query = $temp;
        wp_reset_query();

        ?>

    </div>

<?php get_footer(); ?>
