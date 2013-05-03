<?php get_header(); ?>

<?php
  $orientation = array('horizontal', 'vertical');
  $slice_rotation = array('-25', '-15', '3', '25', '10');
  $slice_scale = array('2', '1.5');
?>

<?php if ( have_posts() ) : ?>
  <?php while ( have_posts() ) : $index = 1; the_post(); ?>
    <?php
      $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'post-thumbnail' );
      $flickr = get_post_meta( $post->ID, 'flickr', true ); ?>

    <div
      <?php post_class("sl-slide"); ?>
      data-orientation="<?php echo $orientation[array_rand($orientation)]; ?>"
      data-slice1-rotation="<?php echo $slice_rotation[array_rand($slice_rotation)]; ?>"
      data-slice2-rotation="<?php echo $slice_rotation[array_rand($slice_rotation)]; ?>"
      data-slice1-scale="<?php echo $slice_scale[array_rand($slice_scale)]; ?>"
      data-slice2-scale="<?php echo $slice_scale[array_rand($slice_scale)]; ?>">
      <div class="sl-slide-inner">
        <div class="bg-img" style="background-image:url(<?php echo $thumb['0'];?>);"></div>
        <h2><?php the_title(); ?></h2>
        <div class="slide-content">
          <?php the_content(); ?>
        </div>
        <cite><a href="<?php echo $flickr; ?>" target="_new"><?php echo $flickr; ?></a></cite>
      </div>
    </div>
  <?php $index++; endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>