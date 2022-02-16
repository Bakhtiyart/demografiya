<?php
namespace ElementorMaster\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

// Security Note: Blocks direct access to the plugin PHP files.
defined( 'ABSPATH' ) || die();


class For_Whom extends Widget_Base {

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
		return 'for_whom';
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
		return esc_html__( 'For whom', 'elementor' );
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
		return 'eicon-image-box';
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
		return array( 'master' );
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

		$this->add_control(
			'description',
			array(
				'label'   => __( 'Director', 'elementor-master' ),
				'type'    => Controls_Manager::TEXTAREA,
			)
		);
		
		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'list_title', [
				'label' => __( 'Title', 'elementor-awesomesauce' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'List Title' , 'elementor-awesomesauce' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'list_content', [
				'label' => __( 'Content', 'elementor-awesomesauce' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __( 'List Content' , 'elementor-awesomesauce' ),
				'show_label' => false,
			]
		);

		$this->add_control(
			'list',
			[
				'label' => __( 'Repeater List', 'elementor-awesomesauce' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'list_title' => __( 'Title #1', 'elementor-awesomesauce' ),
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
		$this->add_inline_editing_attributes( 'description', 'basic' );
		?>
		
		<div class="flex items-center flex-wrap padding-top-bottom"> 
			<div class="head-block">
				<h2 class="text-3xl sm_text-4xl xl_text-5xl xl_text-titlemin font-extrabold mb-4 text-indigo"><?php echo wp_kses( $settings['title'], array() ); ?></h2>
				<p class="text-lg lg_text-xl text-indigo font-semibold mb-6"><?php echo wp_kses( $settings['description'], array() ); ?></p>
			</div>			
		</div>

		<div class="md_flex flex-wrap pt-6 -mx-3">
			<?php 
			if ( $settings['list'] ) {
				
				foreach (  $settings['list'] as $item ) { ?>
				<div class="mb-6">
					<div class="rounded-xl border border-yellow px-4 py-8 min-h-lg h-full bg-yellow">
						<h5 class="text-indigo text-xl lg_text-2xl font-extrabold leading-tight mb-3"><?php echo $item['list_title'];?></h5>
						<?php echo $item['list_content'];?>
					</div>
				</div>
				<?php }
			
			}			
			?>			
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