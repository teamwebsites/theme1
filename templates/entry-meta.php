<?php if( get_post_type() == 'event' ) : ?>
<?php $date = get_post_meta($post->ID, 'Date', true); ?><time class="updated" datetime="<?php echo $date; ?>"><i style="margin-right: 6.5px;" class="fa fa-calendar-o" aria-hidden="true"></i><?php if($date != ''){echo date("l jS F Y", strtotime($date));} ?></time>
<?php else: ?>
<time class="updated" datetime="<?= get_post_time('c', true); ?>"><?= get_the_date(); ?></time>
<?php endif; ?>

<p class="byline author vcard"><?= __('By', 'sage'); ?> <a href="<?= get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author" class="fn"><?= get_the_author(); ?></a></p>
