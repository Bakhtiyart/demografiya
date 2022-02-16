<?php
namespace ElementorMaster\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

// Security Note: Blocks direct access to the plugin PHP files.
defined( 'ABSPATH' ) || die();


class Sliders extends Widget_Base {

	public function __construct( $data = array(), $args = null ) {
		parent::__construct( $data, $args );

		wp_register_style( 'owl', plugins_url( '/assets/css/owl.css', ELEMENTOR_MASTER ), array(), '1.0.0' );
		wp_register_style( 'master', plugins_url( '/assets/css/master.css', ELEMENTOR_MASTER ), array(), '1.0.0' );
		wp_register_script('owl', plugins_url( '/assets/js/owl.carousel.js', ELEMENTOR_MASTER ), array(), '1.0.0');
		wp_register_script('master', plugins_url( '/assets/js/master.js', ELEMENTOR_MASTER ), array(), '1.0.0');
	}
	
	/**
	 * Get widget name.
	 *
	 * Retrieve image box widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'sliders';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve image box widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Slider', 'elementor' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve image box widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-slides';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * Note that currently Elementor supports only one category.
	 * When multiple categories passed, Elementor uses the first one.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return array( 'basic' );
	}
	/**
	 * Enqueue styles.
	 */
	public function get_style_depends() {
		return array( 'master', 'owl' );
	}

	public function get_script_depends() {
		return array( 'owl','master');
	}
	/**
	 * Register image box widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 3.1.0
	 * @access protected
	 */
	protected function _register_controls() {
		$this->start_controls_section(
			'section_content',
			array(
				'label' => __( 'Content', 'elementor-master' ),
			)
		);

		$this->add_control(
			'title',
			array(
				'label'   => __( 'Title', 'elementor-master' ),
				'type'    => Controls_Manager::TEXT,
			)
		);	
		
		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'list_title', [
				'label' => __( 'Title', 'elementor-master' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'List Title' , 'elementor-master' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'list_content', [
				'label' => __( 'Content', 'elementor-master' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __( 'List Content' , 'elementor-master' ),
				'show_label' => false,
			]
		);
		$repeater->add_control(
			'list_link', [
				'label' => __( 'Link', 'elementor-master' ),
				'type' => \Elementor\Controls_Manager::URL,
			
			]
		);
		$repeater->add_control(
			'list_image', [
				'label' => __( 'Image', 'elementor-master' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
			]
		);

		$this->add_control(
			'list',
			[
				'label' => __( 'Repeater List', 'elementor-master' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'list_title' => __( 'Title #1', 'elementor-master' ),
					],
					
				],
				'title_field' => '{{{ list_title }}}',
			]
		);

		$this->end_controls_section();
	}

	/**
	 * Render image box widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();

		$this->add_inline_editing_attributes( 'title', 'none' );
		?>
		<div class="slider-wrap d-none d-lg-block">
            <div id="slider" class="owl-carousel main-slider">
			<?php 
			if ( $settings['list'] ) {
				
				foreach (  $settings['list'] as $item ) { ?>
			
				<div class="carousel-billboard--carousel-item">
					<div class="billboard-banner">
						<div class="billboard-banner--image-container--2LVH-">
							<img width="1340" height="400" src="<?php echo $item['list_image']['url'];?>">
						</div>
						<div class="billboard-banner--content-box--2LhRB">
							<h2 class="udlite-heading-serif-xxl "><?php echo $item['list_title'];?></h2>
							
							<?php echo $item['list_content'];?>
							<p>
								<a href="<?php echo $item['list_link']['url'];?>">
									<?php echo __('Read more', 'elementor-master');?>
								</a>
							</p>
						</div>
					</div>                  
                </div>
				<?php 
				}			
			}			
			?>                          
            </div>
        </div>
		
		<?php
	}

	/**
	 * Render the widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	
}