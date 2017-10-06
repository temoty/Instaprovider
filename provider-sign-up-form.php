<?php /* Template Name: Provider Sign Up Form */ ?>
<?php if( 'POST' == $_SERVER['REQUEST_METHOD'] && !empty( $_POST['action'] ) &&  $_POST['action'] == "new_post") { 

    // Do some minor form validation to make sure there is content 
//    if ($_POST['title'] != '') { 
//        $title =  $_POST['title']; 
    if ($_POST['name'] != '') { 
          $title =  $_POST['name']; 
    } else { 
        echo 'Please enter your name';
        return false;
    } 
    if ($_POST['email'] != '') { 
          $email =  $_POST['email']; 
    } else { 
        echo 'Please enter your email';
        return false;
    } 
    if (isset ($_POST['description'])) { 
        $description = $_POST['description'];
    } else { 
        echo 'Please enter some notes'; 
    } 

    $tags = $_POST['post_tags']; 
    $winerating = $_POST['winerating']; 

    // ADD THE FORM INPUT TO $new_post ARRAY 
    $new_post = array( 
    'post_title'    =>   $title,  
    'post_content'  =>   $description, 
    'post_category' =>   array($_POST['cat']),  // Usable for custom taxonomies too 
    'tags_input'    =>   array($tags), 
    'post_status'   =>   'publish',           // Choose: publish, preview, future, draft, etc. 
//    'post_type' =>   'post',  //'post',page' or use a custom post type if you want to 
    'post_type' =>   'provider',  //'post',page' or use a custom post type if you want to 

    //'winerating'    =>   $winerating
    'email'         =>   $email
    ); 

    //SAVE THE POST 
        $pid = wp_insert_post($new_post); 



             //KEEPS OUR COMMA SEPARATED TAGS AS INDIVIDUAL 
    wp_set_post_tags($pid, $_POST['post_tags']); 

    wp_redirect( 'http://localhost:8888/Instaprovider/provider-sign-form-thank/' ); 

    //ADD OUR CUSTOM FIELDS 
    add_post_meta($pid, 'rating', $winerating, true);  

    //INSERT OUR MEDIA ATTACHMENTS 
    
//    if ($_FILES) { 
//        foreach ($_FILES as $file => $array) { 
//        $newupload = insert_attachment($file,$pid); 
            
            
        // $newupload returns the attachment id of the file that 
        // was just uploaded. Do whatever you want with that now. 
        } 

   // } // END THE IF STATEMENT FOR FILES 

//} // END THE IF STATEMENT THAT STARTED THE WHOLE FORM 

//POST THE POST YO 
do_action('wp_insert_post', 'wp_insert_post'); 
?>
<?php get_header(); ?>
<div class="fl-content-full container">
    <!--    <div id="container">-->
    <div id="content" role="main">

        <!-- WINE RATING FORM -->

        <!--<div class="wpcf7">-->
        <div class="providersignup">
            <form id="new_post" name="new_post" method="post" action="" class="providerform" enctype="multipart/form-data">
                <!-- post name -->
                <!--<fieldset name="name">-->
                <fieldset name="name">
                    <label for="name">Name:</label>
                    <input type="text" id="name" value="" tabindex="5" name="name" />
                </fieldset>

                <fieldset name="email">
                    <label for="email">Email:</label>
                    <input type="text" id="email" value="" tabindex="5" name="email" />
                </fieldset>

                <!-- post Category -->
                <fieldset class="category">
                    <label for="cat">Type:</label>
                    <?php wp_dropdown_categories( 'tab_index=10&taxonomy=category&hide_empty=0' ); ?>
                </fieldset>

                <!-- post Content -->
                <fieldset class="content">
                    <label for="description">Description and Notes:</label>
                    <textarea id="description" tabindex="15" name="description" cols="80" rows="10"></textarea>
                </fieldset>

                <!-- wine Rating -->
                <fieldset class="winerating">
                    <label for="winerating">Your Rating</label>
                    <input type="text" value="" id="winerating" tabindex="20" name="winerating" />
                </fieldset>

                <!-- images -->
                <fieldset class="images">
                    <label for="bottle_front">Front of the Bottle</label>
                    <input type="file" name="bottle_front" id="bottle_front" tabindex="25" />
                </fieldset>

                <fieldset class="images">
                    <label for="bottle_rear">Back of the Bottle</label>
                    <input type="file" name="bottle_rear" id="bottle_rear" tabindex="30" />
                </fieldset>

                <!-- post tags -->
                <fieldset class="tags">
                    <label for="post_tags">Additional Keywords (comma separated):</label>
                    <input type="text" value="" tabindex="35" name="post_tags" id="post_tags" />
                </fieldset>

                <fieldset class="submit">
                    <input type="submit" value="Post Review" tabindex="40" id="submit" name="submit" />
                </fieldset>

                <input type="hidden" name="action" value="new_post" />
                <?php wp_nonce_field( 'new-post' ); ?>
            </form>
        </div>
        <!-- END WPCF7 -->

    </div>
    <!-- #content -->
</div>
<!-- #container -->
<?php get_footer(); ?>