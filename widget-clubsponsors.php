<?php

/**
 * Recent_Posts widget class
 *
 * @since 2.8.0
 * 
 */
 
function register_clubsponsors_widget() {
    register_widget( 'clubsponsorswidget' );
}
add_action( 'widgets_init', 'register_clubsponsors_widget' ); 
 
class clubsponsorswidget extends WP_Widget {

    function __construct() {
        $widget_ops = array('classname' => 'widget_clubsponsors', 'description' => __( "Displays your club's sponsors (as uploaded under: Appearance > Template Configuration > Footer)") );
        parent::__construct('recent-posts', __('Club Sponsors'), $widget_ops);
        $this->alt_option_name = 'widget_clubsponsors';

        add_action( 'save_post', array($this, 'flush_widget_cache') );
        add_action( 'deleted_post', array($this, 'flush_widget_cache') );
        add_action( 'switch_theme', array($this, 'flush_widget_cache') );
    }

    function widget($args, $instance) {
        $cache = wp_cache_get('widget_club_sponsors', 'widget');

        if ( !is_array($cache) )
            $cache = array();

        if ( ! isset( $args['widget_id'] ) )
            $args['widget_id'] = $this->id;

        if ( isset( $cache[ $args['widget_id'] ] ) ) {
            echo $cache[ $args['widget_id'] ];
            return;
        }

        ob_start();
        extract($args);

        $title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Club Sponsors' );
        $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
?>
        <?php echo $before_widget; ?>
        <?php if ( $title ) echo $before_title . $title . $after_title; ?>
        <ul>
        <?php while ( $r->have_posts() ) : $r->the_post(); ?>
        
            <a href="<?php the_permalink() ?>" class="ln-title" title="<?php echo esc_attr( get_the_title() ? get_the_title() : get_the_ID() ); ?>">
            
            <li>
                
                 
                
                <div class="ln-title">
                
               <div style="display: block !important;">
                  
                   <a href="<?php the_permalink() ?>" title="<?php echo esc_attr( get_the_title() ? get_the_title() : get_the_ID() ); ?>"><?php if ( get_the_title() ) the_title(); else the_ID(); ?></a>
            <?php if ( $show_date ) : ?>
                <span class="post-date"><?php echo get_the_date(); ?></span>
            <?php endif; ?> 
                   
               </div>    
                    
                </div>
            </li>
            
            </a>
            
        <?php endwhile; ?>
        </ul>
        <?php echo $after_widget; ?>
<?php
        // Reset the global $the_post as this query will have stomped on it
        wp_reset_postdata();

        endif;

        $cache[$args['widget_id']] = ob_get_flush();
        wp_cache_set('widget_club_sponsors', $cache, 'widget');
    }

    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $this->flush_widget_cache();

        $alloptions = wp_cache_get( 'alloptions', 'options' );
        if ( isset($alloptions['widget_clubsponsors']) )
            delete_option('widget_clubsponsors');

        return $instance;
    }

    function flush_widget_cache() {
        wp_cache_delete('widget_club_sponsors', 'widget');
    }

    function form( $instance ) {
        $title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
        $number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
        $show_date = isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : false;
?>
        <p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Widget Title:' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" /></p>

        <p>Displays your club's sponsors. To edit your list of sponsors, go to: <a href="<?php echo admin_url(); ?>"></a></p>

        <p><input class="checkbox" type="checkbox" <?php checked( $show_date ); ?> id="<?php echo $this->get_field_id( 'show_date' ); ?>" name="<?php echo $this->get_field_name( 'show_date' ); ?>" />
        <label for="<?php echo $this->get_field_id( 'show_date' ); ?>"><?php _e( 'Display article date?' ); ?></label></p>
<?php
    }
}