<?php
get_header();
while (have_posts()) {
    the_post(); ?>

    <div class="page-banner">
        <div class="page-banner__bg-image" style="background-image: url(<?php
        echo get_theme_file_uri('/images/it1.jpg') ?>)"></div>
        <div class="page-banner__content container container--narrow">
            <h1 class="page-banner__title"><?php
                the_title(); ?></h1>
            <div class="page-banner__intro">
                <p>Learn how to become a better developer</p>
            </div>
        </div>
    </div>

    <div class="container container--narrow page-section">
        <?php
        $the_parent_id = wp_get_post_parent_id(get_the_ID());
        if ($the_parent_id) { ?>
            <div class="metabox metabox--position-up metabox--with-home-link">
                <p>
                    <a class="metabox__blog-home-link" href="<?php echo get_permalink($the_parent_id); ?>">
                        <i class="fa fa-home" aria-hidden="true"></i>
                        Back to <?php echo get_the_title($the_parent_id); ?>
                    </a>
                    <span class="metabox__main">
                        <?php the_title(); ?>
                    </span>
                </p>
            </div>
        <?php
        }
        ?>

        <?php
        $array = get_pages(array (
                'child_of' => get_the_ID()
        ));
        if ($the_parent_id or $array) { ?>
        <div class="page-links">
            <h2 class="page-links__title">
                <a href="<?php echo get_permalink($the_parent_id) ?>">
                    <?php echo get_the_title($the_parent_id) ?>
                </a>
            </h2>
            <ul class="min-list">
                <?php
                if($the_parent_id) {
                    $find_children_of = $the_parent_id;
                } else {
                    $find_children_of = get_the_ID();
                }
                    wp_list_pages(array(
                        'title_li' => NULL,
                        'child_of' => $find_children_of,
                        'sort_column' => 'menu_order'
                    ));
                ?>
            </ul>
        </div>
        <?php } ?>

        <div class="generic-content">
            <?php
            the_content(); ?>
        </div>
    </div>

    <?php
}
get_footer();
?>
