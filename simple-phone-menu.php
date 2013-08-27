<?php
/*
Plugin Name: Simple Phone Menu
Plugin URI: http://www.kelleypromedia.com/plugins/simple-phone-menu
Description: A simple, CSS and icon font driven phone icons widget for mobile menu.

Author: Ed Kelley
Author URI: http://www.kelleypromedia.com/


Created from: simple-social-icons
FirstAuthor: Nathan Rice
FirstAuthor URI: http://www.nathanrice.net/

Version: 1.0.2

License: GNU General Public License v2.0 (or later)
License URI: http://www.opensource.org/licenses/gpl-license.php
*/

class Simple_Phone_Menu_Widget extends WP_Widget {

	/**
	 * Default widget values.
	 *
	 * @var array
	 */
	protected $defaults;

	/**
	 * Default widget values.
	 *
	 * @var array
	 */
	protected $sizes;

	/**
	 * Default widget values.
	 *
	 * @var array
	 */
	protected $profiles;

	/**
	 * Constructor method.
	 *
	 * Set some global values and create widget.
	 */
	function __construct() {
	
		/**
		 * Default widget option values.
		 */
		$this->defaults = array(
			'title'							=> '',
			'new_window'			 		=> 0,
			'multicolor'					=> 0,
			'icon_label'					=> 0,
			'size'					 		=> 60,
			'border_radius'			 		=> 4,
			'icon_color'			 		=> '#FFFFFF',
			'icon_color_hover'			 	=> '#000000',
			'top_background_color'		 	=> '#A1A1A1',
			'bottom_background_color'	 	=> '#151515',
			'top_background_color_hover' 	=> '#151515',
			'bottom_background_color_hover'	=> '#A1A1A1',
			'alignment'					 	=> 'aligncenter',
			'home'					 		=> '',
			'phone'					 		=> '',
			'email'						 	=> '',
			'message'					 	=> '',
			'wordpress'				 		=> '',
			'hours'					 		=> '',	
			'findus'				 		=> '',
			'aboutus'				 		=> '',
			'facebook'				 		=> '',
			'gplus'					 		=> '',
			'pinterest'				 		=> '',
			'linkedin'				 		=> '',
			'twitter'				 		=> '',
			'youtube'				 		=> '',
			'instagram'				 		=> '',
			'rss'					 		=> '',
			'dribbble'						=> '',
			'flickr'						=> '',
			'github'						=> '',
			'stumbleupon'			 		=> '',
			'vimeo'					 		=> '',
			'tumblr'				 		=> '',
			'images'				 		=> '',
			'shopping'				 		=> '',
			'training'				 		=> '',
			'menu'					 		=> '',
		);			

		/**
		 * Phone profile choices.
		 */
		$this->profiles = array(
			'home' => array(
				'label'		  => __( 'Home URI', 'spmw' ),
				'pattern'	  => '<li title="Home" class="menu-home"><a href="%s" %s>&#xe001;</a></li>',
				'pattern2'	  => '<li title="Home" class="menu-home"><a href="%s" %s>&#xe001; <b class="menu-text">Home</b></a></li>',
					
			),
			'phone' => array(
				'label'		  => __( 'Phone tel', 'spmw' ),
				'pattern'	  => '<li title="Phone" class="menu-phone"><a href="%s" %s>&#xe002;</a></li>',
				'pattern2'	  => '<li title="Phone" class="menu-phone"><a href="%s" %s>&#xe002; <b class="menu-text">Phone</b></a></li>',
			),
			'email' => array(
				'label'		  => __( 'Email mailto', 'spmw' ),
				'pattern'	  => '<li title="Email" class="menu-email"><a href="%s" %s>&#xe003;</a></li>',
				'pattern2'	  => '<li title="Email" class="menu-email"><a href="%s" %s>&#xe003; <b class="menu-text">Email</b></a></li>',
			),
			'message' => array(
				'label'		  => __( 'Message sms', 'spmw' ),
				'pattern'	  => '<li title="Message" class="menu-message"><a href="%s" %s>&#xe004;</a></li>',
				'pattern2'	  => '<li title="Message" class="menu-message"><a href="%s" %s>&#xe004; <b class="menu-text">Message</b></a></li>',
			),
			'wordpress' => array(
				'label'		  => __( 'Blog URI', 'spmw' ),
				'pattern'	  => '<li title="Blog" class="menu-wordpress"><a href="%s" %s>&#xe005;</a></li>',
				'pattern2'	  => '<li title="Blog" class="menu-wordpress"><a href="%s" %s>&#xe005; <b class="menu-text">Blog</b></a></li>',
			),
			'hours' => array(
				'label'		  => __( 'Hours URI', 'spmw' ),
				'pattern'	  => '<li title="Hours" class="menu-hours"><a href="%s" %s>&#xe026;</a></li>',
				'pattern2'	  => '<li title="Hours" class="menu-hours"><a href="%s" %s>&#xe026; <b class="menu-text">Hours</b></a></li>',
			),
			'findus' => array(
				'label'		  => __( 'Find Us URI', 'spmw' ),
				'pattern'	  => '<li title="Find Us" class="menu-findus"><a href="%s" %s>&#xe006;</a></li>',
				'pattern2'	  => '<li title="Find Us" class="menu-findus"><a href="%s" %s>&#xe006; <b class="menu-text">FindUs</b></a></li>',
			),
			'aboutus' => array(
				'label'		  => __( 'About Us URI', 'spmw' ),
				'pattern'	  => '<li title="About Us" class="menu-aboutus"><a href="%s" %s>&#xe007;</a></li>',
				'pattern2'	  => '<li title="About Us" class="menu-aboutus"><a href="%s" %s>&#xe007; <b class="menu-text">AboutUs</b></a></li>',
			),
			'facebook' => array(
				'label'		  => __( 'Facebook URI', 'spmw' ),
				'pattern'	  => '<li title="Facebook" class="menu-facebook"><a href="%s" %s>&#xe008;</a></li>',
				'pattern2'	  => '<li title="Facebook" class="menu-facebook"><a href="%s" %s>&#xe008; <b class="menu-text">Facebook</b></a></li>',
			),
			'gplus' => array(
				'label'		  => __( 'Google+ URI', 'spmw' ),
				'pattern'	  => '<li title="Google +" class="menu-gplus"><a href="%s" %s>&#xe009;</a></li>',
				'pattern2'	  => '<li title="Google +" class="menu-gplus"><a href="%s" %s>&#xe009; <b class="menu-text">Gplus</b></a></li>',
			),
			'pinterest' => array(
				'label'		  => __( 'Pinterest URI', 'spmw' ),
				'pattern'	  => '<li title="Pinterest" class="menu-pinterest"><a href="%s" %s>&#xe012;</a></li>',
				'pattern2'	  => '<li title="Pinterest" class="menu-pinterest"><a href="%s" %s>&#xe012; <b class="menu-text">Pinterest</b></a></li>',
			),
			'linkedin' => array(
				'label'		  => __( 'Linkedin URI', 'spmw' ),
				'pattern'	  => '<li title="Linkedin" class="menu-linkedin"><a href="%s" %s>&#xe011;</a></li>',
				'pattern2'	  => '<li title="Linkedin" class="menu-linkedin"><a href="%s" %s>&#xe011; <b class="menu-text">Linkedin</b></a></li>',
			),
			'twitter' => array(
				'label'		  => __( 'Twitter URI', 'spmw' ),
				'pattern'	  => '<li title="Twitter" class="menu-twitter"><a href="%s" %s>&#xe014;</a></li>',
				'pattern2'	  => '<li title="Twitter" class="menu-twitter"><a href="%s" %s>&#xe014; <b class="menu-text">Twitter</b></a></li>',
			),
			'youtube' => array(
				'label'		  => __( 'YouTube URI', 'spmw' ),
				'pattern'	  => '<li title="Youtube" class="menu-youtube"><a href="%s" %s>&#xe015;</a></li>',
				'pattern2'	  => '<li title="Youtube" class="menu-youtube"><a href="%s" %s>&#xe015; <b class="menu-text">Youtube</b></a></li>',
			),
			'instagram' => array(
				'label'		  => __( 'Instagram URI', 'spmw' ),
				'pattern'	  => '<li title="Instagram" class="menu-instagram"><a href="%s" %s>&#xe010;</a></li>',
				'pattern2'	  => '<li title="Instagram" class="menu-instagram"><a href="%s" %s>&#xe010; <b class="menu-text">Instagram</b></a></li>',
			),
			'rss' => array(
				'label'		  => __( 'RSS URI', 'spmw' ),
				'pattern'	  => '<li title="RSS" class="menu-rss"><a href="%s" %s>&#xe013;</a></li>',
				'pattern2'	  => '<li title="RSS" class="menu-rss"><a href="%s" %s>&#xe013; <b class="menu-text">RSS</b></a></li>',
			),
			'dribbble' => array(
				'label'		  => __( 'Dribbble URI', 'spmw' ),
				'pattern'	  => '<li title="Dribbble" class="menu-dribbble"><a href="%s" %s>&#xe016;</a></li>',
				'pattern2'	  => '<li title="Dribbble" class="menu-dribbble"><a href="%s" %s>&#xe016; <b class="menu-text">Dribble</b></a></li>',
			),
			'flickr' => array(
				'label'		  => __( 'Flicker URI', 'spmw' ),
				'pattern'	  => '<li title="Flicker" class="menu-flickr"><a href="%s" %s>&#xe017;</a></li>',
				'pattern2'	  => '<li title="Flicker" class="menu-flickr"><a href="%s" %s>&#xe017; <b class="menu-text">Flicker</b></a></li>',
			),
			'github' => array(
				'label'		  => __( 'Github URI', 'spmw' ),
				'pattern'	  => '<li title="Github" class="menu-github"><a href="%s" %s>&#xe018;</a></li>',
				'pattern2'	  => '<li title="Github" class="menu-github"><a href="%s" %s>&#xe018; <b class="menu-text">Github</b></a></li>',
			),
			'stumbleupon' => array(
				'label'		  => __( 'Stumbleupon URI', 'spmw' ),
				'pattern'	  => '<li title="Stumbleupon" class="menu-stumbleupon"><a href="%s" %s>&#xe019;</a></li>',
				'pattern2'	  => '<li title="Stumbleupon" class="menu-stumbleupon"><a href="%s" %s>&#xe019; <b class="menu-text">Stumble</b></a></li>',
			),
			'vimeo' => array(
				'label'		  => __( 'Vimeo URI', 'spmw' ),
				'pattern'	  => '<li title="Vimeo" class="menu-vimeo"><a href="%s" %s>&#xe020;</a></li>',
				'pattern2'	  => '<li title="Vimeo" class="menu-vimeo"><a href="%s" %s>&#xe020; <b class="menu-text">Vimeo</b></a></li>',
			),
			'tumblr' => array(
				'label'		  => __( 'Tumbler URI', 'spmw' ),
				'pattern'	  => '<li title="Tumbler" class="menu-tumblr"><a href="%s" %s>&#xe029;</a></li>',
				'pattern2'	  => '<li title="Tumbler" class="menu-tumblr"><a href="%s" %s>&#xe029; <b class="menu-text">Tumbler</b></a></li>',
			),
			'images' => array(
				'label'		  => __( 'Images URI', 'spmw' ),
				'pattern'	  => '<li title="Images" class="menu-images"><a href="%s" %s>&#xe021;</a></li>',
				'pattern2'	  => '<li title="Images" class="menu-images"><a href="%s" %s>&#xe021; <b class="menu-text">Images</b></a></li>',
			),
			'shopping' => array(
				'label'		  => __( 'Shopping URI', 'spmw' ),
				'pattern'	  => '<li title="Shopping" class="menu-shopping"><a href="%s" %s>&#xe022;</a></li>',
				'pattern2'	  => '<li title="Shopping" class="menu-shopping"><a href="%s" %s>&#xe022; <b class="menu-text">Shopping</b></a></li>',
			),
			'training' => array(
				'label'		  => __( 'Training URI', 'spmw' ),
				'pattern'	  => '<li title="Training" class="menu-training"><a href="%s" %s>&#xe028;</a></li>',
				'pattern2'	  => '<li title="Training" class="menu-training"><a href="%s" %s>&#xe028; <b class="menu-text">Training</b></a></li>',
			),			
			'menu' => array(
				'label'		  => __( 'Menu URI', 'spmw' ),
				'pattern'	  => '<li title="Menu" class="menu-menu"><a href="%s" %s>&#xe023;</a></li>',
				'pattern2'	  => '<li title="Menu" class="menu-menu"><a href="%s" %s>&#xe023; <b class="menu-text">Menu</b></a></li>',
			),

		);
		

		$widget_ops = array(
			'classname'	  => 'simple-phone-menu',
			'description' => __( 'Displays simple phone menu icons.', 'spmw' ),
		);

		$control_ops = array(
			'id_base' => 'simple-phone-menu',
		);

		$this->WP_Widget( 'simple-phone-menu', __( 'Simple Phone Menu', 'spmw' ), $widget_ops, $control_ops );
		
		
	/** Enqueue icon font */
	add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_css' ) );

	/** Load CSS in <head> */
	add_action( 'wp_head', array( $this, 'css' ) );

	}

	/**
	 * Widget Form.
	 *
	 * Outputs the widget form that allows users to control the output of the widget.
	 *
	 */
	function form( $instance ) {

		/** Merge with defaults */
		$instance = wp_parse_args( (array) $instance, $this->defaults );
		?>

		<p>
        <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
        <input class="widefat" 
        id="<?php echo $this->get_field_id( 'title' ); ?>" 
        name="<?php echo $this->get_field_name( 'title' ); ?>" 
        type="text" 
        value="<?php echo esc_attr( $instance['title'] ); ?>" />
        </p>

		<p>
        <label>
        <input id="<?php echo $this->get_field_id( 'new_window' ); ?>" 
        type="checkbox" 
        name="<?php echo $this->get_field_name( 'new_window' ); ?>" 
        value="1" <?php checked( 1, $instance['new_window'] ); ?>/> <?php esc_html_e( 'Open links in new window?', 'spmw' ); ?>
        </label>
        </p>
        
        <p>
        <label>
        <input id="<?php echo $this->get_field_id( 'multicolor' ); ?>" 
        type="checkbox" 
        name="<?php echo $this->get_field_name( 'multicolor' ); ?>" 
        value="1" <?php checked( 1, $instance['multicolor'] ); ?>/> <?php esc_html_e( 'Display Multicolored Icons?', 'spmw' ); ?>
        </label>
        </p>	
            
        <p>
        <label>
        <input id="<?php echo $this->get_field_id( 'icon_label' ); ?>" 
        type="checkbox" 
        name="<?php echo $this->get_field_name( 'icon_label' ); ?>" 
        value="1" <?php checked( 1, $instance['icon_label'] ); ?>/> <?php esc_html_e( "Display Icons Labels?", 'spmw' ); ?>
        </label>
        <i> (*50px Minimum) </i>
        </p>
        
		<p><label for="<?php echo $this->get_field_id( 'size' ); ?>"><?php _e( 'Icon Size', 'ssiw' ); ?>:</label> 
        <input id="<?php echo $this->get_field_id( 'size' ); ?>" 
        name="<?php echo $this->get_field_name( 'size' ); ?>" 
        type="text" 
        value="<?php echo esc_attr( $instance['size'] ); ?>" 
        size="2" />px
        </p>
        

 		<p>
        <label for="<?php echo $this->get_field_id( 'border_radius' ); ?>"><?php _e( 'Icon Border Radius:', 'spmw' ); ?></label> 
        <input id="<?php echo $this->get_field_id( 'border_radius' ); ?>" 
        name="<?php echo $this->get_field_name( 'border_radius' ); ?>" 
        type="text" 
        value="<?php echo esc_attr( $instance['border_radius'] ); ?>" 
        size="2" />px
        </p>

		<p>
        <label for="<?php echo $this->get_field_id( 'alignment' ); ?>"><?php _e( 'Alignment', 'spmw' ); ?>:</label>
        <select id="<?php echo $this->get_field_id( 'alignment' ); ?>" 
            name="<?php echo $this->get_field_name( 'alignment' ); ?>">
                <option value="alignleft" <?php selected( 'alignleft', $instance['alignment'] ) ?>><?php _e( 'Align Left', 'spmw' ); ?></option>
                <option value="aligncenter" <?php selected( 'aligncenter', $instance['alignment'] ) ?>><?php _e( 'Align Center', 'spmw' ); ?></option>
                <option value="alignright" <?php selected( 'alignright', $instance['alignment'] ) ?>><?php _e( 'Align Right', 'spmw' ); ?></option>
        </select>
		</p>

		<hr style="background: #ccc; border: 0; height: 1px; margin: 20px 0;" />
        
       	<p> Colors: <i> (*default) </i>
        </p>

		<p>
        <label for="<?php echo $this->get_field_id( 'icon_color' ); ?>"><?php _e( 'Icon Font:', 'spmw' ); ?></label> 
        <input id="<?php echo $this->get_field_id( 'icon_color' ); ?>" 
        name="<?php echo $this->get_field_name( 'icon_color' ); ?>" 
        type="text" 
        value="<?php echo esc_attr( $instance['icon_color'] ); ?>" 
        size="6" />
        </p>
        
		<p><label for="<?php echo $this->get_field_id( 'icon_color_hover' ); ?>"><?php _e( 'Icon Font Hover:', 'spmw' ); ?></label> 
        <input id="<?php echo $this->get_field_id( 'icon_color_hover' ); ?>" 
        name="<?php echo $this->get_field_name( 'icon_color_hover' ); ?>" 
        type="text" 
        value="<?php echo esc_attr( $instance['icon_color_hover'] ); ?>" 
        size="6" />
        </p>

		<p><label for="<?php echo $this->get_field_id( 'top_background_color' ); ?>"><?php _e( '*BG Top:', 'spmw' ); ?></label> 
        <input id="<?php echo $this->get_field_id( 'top_background_color' ); ?>" 
        name="<?php echo $this->get_field_name( 'top_background_color' ); ?>" 
        type="text" 
        value="<?php echo esc_attr( $instance['top_background_color'] ); ?>" 
        size="6" />
        </p>
        
        <p><label for="<?php echo $this->get_field_id( 'bottom_background_color' ); ?>"><?php _e( 'BG Bottom:', 'spmw' ); ?></label> 
        <input id="<?php echo $this->get_field_id( 'bottom_background_color' ); ?>" 
        name="<?php echo $this->get_field_name( 'bottom_background_color' ); ?>" 
        type="text" 
        value="<?php echo esc_attr( $instance['bottom_background_color'] ); ?>" 
        size="6" />
        </p>
                

		<p>
        <label for="<?php echo $this->get_field_id( 'top_background_color_hover' ); ?>"><?php _e( '*BG Top Hover:', 'spmw' ); ?></label> 
        <input id="<?php echo $this->get_field_id( 'top_background_color_hover' ); ?>" 
        name="<?php echo $this->get_field_name( 'top_background_color_hover' ); ?>" 
        type="text" 
        value="<?php echo esc_attr( $instance['top_background_color_hover'] ); ?>" 
        size="6" />
        </p>
        
        <p>
        <label for="<?php echo $this->get_field_id( 'bottom_background_color_hover' ); ?>"><?php _e( 'BG Bottom Hover:', 'spmw' ); ?></label> 
        <input id="<?php echo $this->get_field_id( 'bottom_background_color_hover' ); ?>" 
        name="<?php echo $this->get_field_name( 'bottom_background_color_hover' ); ?>" 
        type="text" 
        value="<?php echo esc_attr( $instance['bottom_background_color_hover'] ); ?>" 
        size="6" />
        </p>

		<hr style="background: #ccc; border: 0; height: 1px; margin: 20px 0;" />

		<?php
		foreach ( (array) $this->profiles as $profile => $data ) {

			printf( '<p><label for="%s">%s:</label>', esc_attr( $this->get_field_id( $profile ) ), esc_attr( $data['label'] ) );
			
			/* Skip Sanitize for Phone and Message Fields - allows phone dial and sms dial  */
			if((stripos($data['pattern'], 'phone') !== false) || (stripos($data['pattern'], 'message') !== false))
				printf( '<input type="text" id="%s" name="%s" value="%s" class="widefat" />', esc_attr( $this->get_field_id( $profile ) ), 
				esc_attr( $this->get_field_name( $profile ) ), $instance[$profile] );
			else
				printf( '<input type="text" id="%s" name="%s" value="%s" class="widefat" />', esc_attr( $this->get_field_id( $profile ) ), 
				esc_attr( $this->get_field_name( $profile ) ), esc_url( $instance[$profile] ) );
				
			printf( '</p>' );
		}
}

	/**
	 * Form validation and sanitization.
	 *
	 * Runs when you save the widget form. Allows you to validate or sanitize widget options before they are saved.
	 *
	 */
	function update( $newinstance, $oldinstance ) {

		foreach ( $newinstance as $key => $value ) {

			/** Border radius and Icon size must not be empty, must be a digit */
			if ( ( 'border_radius' == $key || 'size' == $key ) && ( '' == $value || ! ctype_digit( $value ) ) ) {
				$newinstance[$key] = 0;
			}

			/** Validate hex code colors */
			elseif ( strpos( $key, '_color' ) && 0 == preg_match( '/^#(([a-fA-F0-9]{3}$)|([a-fA-F0-9]{6}$))/', $value ) ) {
				$newinstance[$key] = $oldinstance[$key];
			}
			

			/* Skip Sanitize for Phone and Message Fields */
			/** Sanitize Profile URIs */
			elseif ( array_key_exists( $key, (array) $this->profiles ) ) {
				if ( 'phone' !== $key && 'message' !== $key ) {
					$newinstance[$key] = esc_url( $newinstance[$key] );
				}
			}
			
			if ( ( 'icon_label' == $key ) && ( $newinstance['size'] < 50) ) {
				$newinstance[$key] = 0;
			}
			
			

		}
		
		return $newinstance;

	}
	
	

	/**
	 * Widget Output.
	 *
	 * Outputs the actual widget on the front-end based on the widget options the user selected.
	 *
	 */
	function widget( $args, $instance ) {

		extract( $args );

		/** Merge with defaults */
		$instance = wp_parse_args( (array) $instance, $this->defaults );
		
		
		
		global $icon_label;
		$icon_label = $instance['icon_label'];
		
		
		echo $before_widget;

			if ( ! empty( $instance['title'] ) )
				echo $before_title . apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base ) . $after_title;

			$output = '';

			$new_window = $instance['new_window'] ? 'target="_blank"' : '';
			
			$profiles = (array) $this->profiles;

			foreach ( $profiles as $profile => $data ) {
				if ( ! empty( $instance[$profile] ) )
					
					/* Skip Sanitize for Phone and Message Fields - allows phone dial and sms dial  */
					if((stripos($data['pattern'], 'phone') !== false) || (stripos($data['pattern'], 'message') !== false))
						if ($icon_label == 1)
							$output .= sprintf($data['pattern2'],  $instance[$profile], $new_window );
						else
							$output .= sprintf($data['pattern'],  $instance[$profile], $new_window );
					else
						if ($icon_label == 1)
							$output .= sprintf($data['pattern2'], esc_url( $instance[$profile] ), $new_window );
						else
							$output .= sprintf($data['pattern'], esc_url( $instance[$profile] ), $new_window );
			}
			

			if ( $output )
				printf( '<ul class="%s">%s</ul>', $instance['alignment'], $output );

		echo $after_widget;
		
	}
	

	function enqueue_css() {
			wp_enqueue_style( 'simple-phone-menu-font', plugin_dir_url( __FILE__ ) . 'css/style.css', array(), '1.0.0' );
	}
	
	/**
	 * Custom CSS.
	 *
	 * Outputs custom CSS to control the look of the icons.
	 */
	function css() {
		
		/** Pull widget settings, merge with defaults */
		$all_instances = $this->get_settings();
		$instance = wp_parse_args( $all_instances[$this->number], $this->defaults );
		
				
		$font_size = round( (int) $instance['size'] / 2 );
		$icon_padding = round ( (int) $font_size / 2 );
		$icon_margin = round ( (int) $font_size / 6 );
		
		
		$icon_size = (round( (int) $instance['size']) -6);
		$multicolor = $instance['multicolor'];
		$icon_label = $instance['icon_label'];
		
		
		/** The CSS to output */
		$css = '
		.simple-phone-menu ul li a,
		.simple-phone-menu ul li a:hover {
			background-color: ' . $instance['top_background_color'] . ' !important;
			background: -moz-linear-gradient(top, ' . $instance['top_background_color'] . ', ' . $instance['bottom_background_color'] . ');
			background: -ms-linear-gradient(top, ' . $instance['top_background_color'] . ', ' . $instance['bottom_background_color'] . ');
			background: -webkit-linear-gradient(top, ' . $instance['top_background_color'] . ', ' . $instance['bottom_background_color'] . ');
			
			-moz-border-radius: ' . $instance['border_radius'] . 'px
			-webkit-border-radius: ' . $instance['border_radius'] . 'px;
			border-radius: ' . $instance['border_radius'] . 'px;
			color: ' . $instance['icon_color'] . ' !important;
			font-size: ' . $font_size . 'px;
			padding: ' . $icon_padding . 'px;
			margin-bottom: ' . $icon_margin . 'px;
			border: ' . "1px solid" . $instance['bottom_background_color'] . "!important" . ';
			text-shadow: ' . "0 2px 2px  #cfcdcc !important" . ';
		}
		
		.simple-phone-menu ul li a:hover {
			background-color: ' . $instance['top_background_color_hover'] . ' !important;
			background: -moz-linear-gradient(top, ' . $instance['bottom_background_color'] . ', ' . $instance['top_background_color'] . ');
			background: -ms-linear-gradient(top, ' . $instance['bottom_background_color'] . ', ' . $instance['top_background_color'] . ');
			background: -webkit-linear-gradient(top, ' . $instance['bottom_background_color'] . ', ' . $instance['top_background_color'] . ');
			border: ' . "1px solid" . $instance['bottom_background_color'] . "!important" . ';
			
			color: ' . $instance['icon_color_hover'] . ' !important;
		}
		.simple-phone-menu .menu-text {
			background: none !important;
			border: none !important;
			font-size: 10px;
			position: relative;
			top: -10px;
			right:2px;
						max-height: ' . $icon_size . 'px;
		}'; /* End css */




		/** The CSS to output if icon labels are selected */
		$css_label = '
		.simple-phone-menu ul li a,
		.simple-phone-menu ul li a:hover,
		.simple-phone-menu .menu-text {
		padding-top: ' . "8px" . ';			
		padding-bottom: ' . "0px" . ';
		max-height: ' . $icon_size . 'px;
		}'; /* End css */
		

		if ($icon_label !== 0) {
			$css = $css . $css_label;
		}


		
		/** The CSS to output for multi colored icons */
		$css_multicolor = '
		.simple-phone-menu .menu-phone a {
			background-color: #b10303; 
			background: -moz-linear-gradient(top, #e15d5d, #b10303);
			background: -ms-linear-gradient(top, #e15d5d, #b10303);
			background: -webkit-linear-gradient(top, #e15d5d, #b10303);
			border: 1px solid #b10303 !important;
		}
		.simple-phone-menu .menu-phone  a:hover {
			background: -moz-linear-gradient(top, #b10303, #e15d5d);
			background: -ms-linear-gradient(top, #b10303, #e15d5d);
			background: -webkit-linear-gradient(top, #b10303, #e15d5d);
			border: 1px solid #b10303 !important;
		}
		
		.simple-phone-menu .menu-email a {
			background-color: #f9a245; 
			background: -moz-linear-gradient(top, #fff, #cfcdcc);
			background: -ms-linear-gradient(top, #fff, #cfcdcc);
			background: -webkit-linear-gradient(top, #fff, #cfcdcc);
			border: 1px solid #cfcdcc !important;
		}
		.simple-phone-menu .menu-email  a:hover {
			background: -moz-linear-gradient(top, #cfcdcc, #fff);
			background: -ms-linear-gradient(top, #cfcdcc, #fff);
			background: -webkit-linear-gradient(top, #cfcdcc, #fff);
			border: 1px solid #cfcdcc !important;
		}
		
		.simple-phone-menu .menu-message a {
			background-color: #dfce15; 
			background: -moz-linear-gradient(top, #faf5ba, #dfce15);
			background: -ms-linear-gradient(top, #faf5ba, #dfce15);
			background: -webkit-linear-gradient(top, #faf5ba, #dfce15);
			border: 1px solid #dfce15 !important;
		}
		.simple-phone-menu .menu-message  a:hover {
			background: -moz-linear-gradient(top, #dfce15, #faf5ba);
			background: -ms-linear-gradient(top, #dfce15, #faf5ba);
			background: -webkit-linear-gradient(top, #dfce15, #faf5ba);
			border: 1px solid #dfce15 !important;
		}
		
		.simple-phone-menu .menu-wordpress a {
			background-color: #2a81c3; 
			background: -moz-linear-gradient(top, #6db1e5, #2a81c3);
			background: -ms-linear-gradient(top, #6db1e5, #2a81c3);
			background: -webkit-linear-gradient(top, #6db1e5, #2a81c3);
			border: 1px solid #2a81c3 !important;
		}
		.simple-phone-menu .menu-wordpress  a:hover {
			background: -moz-linear-gradient(top, #2a81c3, #6db1e5);
			background: -ms-linear-gradient(top, #2a81c3, #6db1e5);
			background: -webkit-linear-gradient(top, #2a81c3, #6db1e5);
			border: 1px solid #2a81c3 !important;
		}
		
		.simple-phone-menu .menu-hours a {
			background-color: #20914e; 
			background: -moz-linear-gradient(top, #05d559, #20914e);
			background: -ms-linear-gradient(top, #05d559, #20914e);
			background: -webkit-linear-gradient(top, #05d559, #20914e);
			border: 1px solid #20914e !important;
		}
		.simple-phone-menu .menu-hours  a:hover {
			background: -moz-linear-gradient(top, #20914e, #05d559);
			background: -ms-linear-gradient(top, #20914e, #05d559);
			background: -webkit-linear-gradient(top, #20914e, #05d559);
			border: 1px solid #20914e !important;
		}
		
		.simple-phone-menu .menu-findus a {
			background-color: #a49571; 
			background: -moz-linear-gradient(top, #eeddb5, #a49571);
			background: -ms-linear-gradient(top, #eeddb5, #a49571);
			background: -webkit-linear-gradient(top, #eeddb5, #a49571);
			border: 1px solid #a49571 !important;
		
		}
		.simple-phone-menu .menu-findus  a:hover {
			background: -moz-linear-gradient(top, #a49571, #eeddb5);
			background: -ms-linear-gradient(top, #a49571, #eeddb5);
			background: -webkit-linear-gradient(top, #a49571, #eeddb5);
			border: 1px solid #a49571 !important;
		}
		
		.simple-phone-menu .menu-facebook a {
			background-color: #2b4170;
			background: -moz-linear-gradient(top, #95ade0, #2b4170);
			background: -ms-linear-gradient(top, #95ade0, #2b4170);
			background: -webkit-linear-gradient(top, #95ade0, #2b4170);
			border: 1px solid #2b4170 !important;
		}
		.simple-phone-menu .menu-facebook a:hover {
			background: -moz-linear-gradient(top, #536da6, #95ade0);
			background: -ms-linear-gradient(top, #536da6, #95ade0);
			background: -webkit-linear-gradient(top, #536da6, #95ade0);
			border: 1px solid #2b4170 !important;
		}
		
		.simple-phone-menu .menu-gplus a {
			background-color: #c33219; 
			background: -moz-linear-gradient(top, #f38d81, #c33219);
			background: -ms-linear-gradient(top, #f38d81, #c33219);
			background: -webkit-linear-gradient(top, #f38d81, #c33219);
			border: 1px solid #c33219 !important;
		}
		.simple-phone-menu .menu-gplus  a:hover {
			background: -moz-linear-gradient(top, #c33219, #f38d81);
			background: -ms-linear-gradient(top, #c33219, #f38d81);
			background: -webkit-linear-gradient(top, #c33219, #f38d81);
			border: 1px solid #c33219 !important;
		}
		
		.simple-phone-menu .menu-instagram a {
			background-color: #326189; 
			background: -moz-linear-gradient(top, #199fdf, #326189);
			background: -ms-linear-gradient(top, #70b5f0, #326189);
			background: -webkit-linear-gradient(top, #70b5f0, #326189);
			border: 1px solid #326189 !important;
		}
		.simple-phone-menu .menu-instagram  a:hover {
			background: -moz-linear-gradient(top, #326189, #70b5f0);
			background: -ms-linear-gradient(top, #326189, #70b5f0);
			background: -webkit-linear-gradient(top, #326189, #70b5f0);
			border: 1px solid #326189 !important;
		}
		
		.simple-phone-menu .menu-linkedin a {
			background-color: #007ab5; 
			background: -moz-linear-gradient(top, #3bb7f2, #007ab5);
			background: -ms-linear-gradient(top, #3bb7f2, #007ab5);
			background: -webkit-linear-gradient(top, #3bb7f2, #007ab5);
			border: 1px solid #007ab5 !important;
		}
		.simple-phone-menu .menu-linkedin  a:hover {
			background: -moz-linear-gradient(top, #007ab5, #3bb7f2);
			background: -ms-linear-gradient(top, #007ab5, #3bb7f2);
			background: -webkit-linear-gradient(top, #007ab5, #3bb7f2);
			border: 1px solid #007ab5 !important;
		}
		
		.simple-phone-menu .menu-pinterest a {
			background-color: #b10303; 
			background: -moz-linear-gradient(top, #e15d5d, #b10303);
			background: -ms-linear-gradient(top, #e15d5d, #b10303);
			background: -webkit-linear-gradient(top, #e15d5d, #b10303);
			border: 1px solid #b10303 !important;
		}
		.simple-phone-menu .menu-pinterest  a:hover {
			background: -moz-linear-gradient(top, #b10303, #e15d5d);
			background: -ms-linear-gradient(top, #b10303, #e15d5d);
			background: -webkit-linear-gradient(top, #b10303, #e15d5d);
			border: 1px solid #b10303 !important;
		}
		
		.simple-phone-menu .menu-rss a {
			background-color: #e2733d; 
			background: -moz-linear-gradient(top, #facb98, #e2733d);
			background: -ms-linear-gradient(top, #facb98, #e2733d);
			background: -webkit-linear-gradient(top, #facb98, #e2733d);
			border: 1px solid #e2733d !important;
		
		}
		.simple-phone-menu .menu-rss  a:hover {
			background: -moz-linear-gradient(top, #e2733d, #facb98);
			background: -ms-linear-gradient(top, #e2733d, #facb98);
			background: -webkit-linear-gradient(top, #e2733d, #facb98);
			border: 1px solid #e2733d !important;
		}
		
		.simple-phone-menu .menu-twitter a {
			background-color: #2a81c3; 
			background: -moz-linear-gradient(top, #6db1e5, #2a81c3);
			background: -ms-linear-gradient(top, #6db1e5, #2a81c3);
			background: -webkit-linear-gradient(top, #6db1e5, #2a81c3);
			border: 1px solid #2a81c3 !important;
		}
		.simple-phone-menu .menu-twitter  a:hover {
			background: -moz-linear-gradient(top, #2a81c3, #6db1e5);
			background: -ms-linear-gradient(top, #2a81c3, #6db1e5);
			background: -webkit-linear-gradient(top, #2a81c3, #6db1e5);
			border: 1px solid #2a81c3 !important;
		}
		
		.simple-phone-menu .menu-youtube a {
			background-color: #62080a; 
			background: -moz-linear-gradient(top, #ad1f1b, #62080a);
			background: -ms-linear-gradient(top, #ad1f1b, #62080a);
			background: -webkit-linear-gradient(top, #ad1f1b, #62080a);
			border: 1px solid #62080a !important;
		}
		.simple-phone-menu .menu-youtube  a:hover {
			background: -moz-linear-gradient(top, #62080a, #ad1f1b);
			background: -ms-linear-gradient(top, #62080a, #ad1f1b);
			background: -webkit-linear-gradient(top, #62080a, #ad1f1b);
			border: 1px solid #62080a !important;
		}
		
		.simple-phone-menu .menu-dribble a {
			background-color: #c93764; 
			background: -moz-linear-gradient(top, #ea4c89, #c93764);
			background: -ms-linear-gradient(top, #ea4c89, #c93764);
			background: -webkit-linear-gradient(top, #ea4c89, #c93764);
			border: 1px solid #c93764 !important;
		}
		.simple-phone-menu .menu-dribble  a:hover {
			background: -moz-linear-gradient(top, #c93764, #ea4c89);
			background: -ms-linear-gradient(top, #c93764, #ea4c89);
			background: -webkit-linear-gradient(top, #c93764, #ea4c89);
			border: 1px solid #c93764 !important;
		}
		
		.simple-phone-menu .menu-flickr a {
			background-color: #1673ec; 
			background: -moz-linear-gradient(top, #f70482, #1673ec);
			background: -ms-linear-gradient(top, #f70482, #1673ec);
			background: -webkit-linear-gradient(top, #f70482, #1673ec);
			border: 1px solid #1673ec !important;
		}
		.simple-phone-menu .menu-flickr  a:hover {
			background: -moz-linear-gradient(top, #1673ec, #f70482);
			background: -ms-linear-gradient(top, #1673ec, #f70482);
			background: -webkit-linear-gradient(top, #1673ec, #f70482);
			border: 1px solid #1673ec !important;
		}
		
		.simple-phone-menu .menu-github a {
			background-color: #727071; 
			background: -moz-linear-gradient(top, #a8a7a7, #727071);
			background: -ms-linear-gradient(top, #a8a7a7, #727071);
			background: -webkit-linear-gradient(top, #a8a7a7, #727071);
			border: 1px solid #727071 !important;
		}
		.simple-phone-menu .menu-github  a:hover {
			background: -moz-linear-gradient(top, #727071, #a8a7a7);
			background: -ms-linear-gradient(top, #727071, #a8a7a7);
			background: -webkit-linear-gradient(top, #727071, #a8a7a7);
			border: 1px solid #727071 !important;
		}
		
		.simple-phone-menu .menu-stumbleupon a {
			background-color: #005e80; 
			background: -moz-linear-gradient(top, #69e897, #005e80);
			background: -ms-linear-gradient(top, #69e897, #005e80);
			background: -webkit-linear-gradient(top, #69e897, #005e80);
			border: 1px solid #005e80 !important;
		}
		.simple-phone-menu .menu-stumbleupon  a:hover {
			background: -moz-linear-gradient(top, #005e80, #69e897);
			background: -ms-linear-gradient(top, #005e80, #69e897);
			background: -webkit-linear-gradient(top, #005e80, #69e897);
			border: 1px solid #005e80 !important;
		}
		
		.simple-phone-menu .menu-vimeo a {
			background-color: #005e80; 
			background: -moz-linear-gradient(top, #3ba0c6, #005e80);
			background: -ms-linear-gradient(top, #3ba0c6, #005e80);
			background: -webkit-linear-gradient(top, #3ba0c6, #005e80);
			border: 1px solid #005e80 !important;
		}
		.simple-phone-menu .menu-vimeo a:hover {
			background: -moz-linear-gradient(top, #005e80, #3ba0c6);
			background: -ms-linear-gradient(top, #005e80, #3ba0c6);
			background: -webkit-linear-gradient(top, #005e80, #3ba0c6);
			border: 1px solid #005e80 !important
		}
		
		.simple-phone-menu .menu-tumblr a {
			background-color: #2c4762; 
			background: -moz-linear-gradient(top, #4f79a2, #2c4762);
			background: -ms-linear-gradient(top, #4f79a2, #2c4762);
			background: -webkit-linear-gradient(top, #4f79a2, #2c4762);
			border: 1px solid #2c4762 !important;
		}
		.simple-phone-menu .menu-tumblr a:hover {
			background: -moz-linear-gradient(top, #2c4762, #4f79a2);
			background: -ms-linear-gradient(top, #2c4762, #4f79a2);
			background: -webkit-linear-gradient(top, #2c4762, #4f79a2);
			border: 1px solid #2c4762 !important;
		}
		
		.simple-phone-menu .menu-training a {
			background-color: #20914e; 
			background: -moz-linear-gradient(top, #05d559, #20914e);
			background: -ms-linear-gradient(top, #05d559, #20914e);
			background: -webkit-linear-gradient(top, #05d559, #20914e);
			border: 1px solid #20914e !important;
		}
		.simple-phone-menu .menu-training  a:hover {
			background: -moz-linear-gradient(top, #20914e, #05d559);
			background: -ms-linear-gradient(top, #20914e, #05d559);
			background: -webkit-linear-gradient(top, #20914e, #05d559);
			border: 1px solid #20914e !important;
	}'; /* End $css_multicolor */
	
	
		if ($multicolor !== 0) {
			$css = $css . $css_multicolor;
		}
		
	
		/** Minify a bit */
		$css = str_replace( "\t", '', $css );
		$css = str_replace( array( "\n", "\r" ), ' ', $css );


		/** Echo the CSS */
		echo '<style type="text/css" media="screen">' . $css . '</style>';
		
	} /* end Function */
	
}

add_action( 'widgets_init', 'spmw_load_widget' );
/**
 * Widget Registration.
 *
 * Register Simple Phone Menu widget.
 *
 */
function spmw_load_widget() {

	register_widget( 'Simple_Phone_Menu_Widget' );

}