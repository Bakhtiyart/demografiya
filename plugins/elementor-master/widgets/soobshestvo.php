<?php
namespace ElementorMaster\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

// Security Note: Blocks direct access to the plugin PHP files.
defined( 'ABSPATH' ) || die();


class Widget_Soobshestvo extends Widget_Base {

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
		return 'soobshestvo';
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
		return esc_html__( 'Soobshestvo', 'elementor' );
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
				'label' => __( 'Title', 'elementor-master' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'List Title' , 'elementor-master' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'list_content', [
				'label' => __( 'Content', 'elementor-master' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => __( 'List Content' , 'elementor-master' ),
				'show_label' => false,
			]
		);

		$repeater->add_control(
			'list_button', [
				'label' => __( 'Button text', 'elementor-master' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

		$repeater->add_control(
			'list_url', [
				'label' => __( 'Button link', 'elementor-master' ),
				'type' => \Elementor\Controls_Manager::TEXT,
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
						'list_content' => __( 'Item content. Click the edit button to change this text.', 'elementor-master' ),
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
		
		<div class="flex flex-wrap items-start">
			<div class="w-full">
				<h2 class="text text-indigo"><?php echo wp_kses( $settings['title'], array() ); ?></h2>
			</div>
			<div class="w-full">
				<p><?php echo wp_kses( $settings['description'], array() ); ?></p>
			</div>
		</div>

		<div class="flex social-wrap">
			<?php 
			if ( $settings['list'] ) {
				
				foreach (  $settings['list'] as $item ) { ?>
			<div class="social-wrap-item">
				<div class="rounded-sm flex social">
					<div class="social-content">
						<h5 class="text-xl text-indigo"><?php echo $item['list_title'];?></h5>
						<p class="text-sm"><?php echo $item['list_content'];?></p>
						<?php if($item['list_button']){?>
						<a class="w-full" href="<?php echo $item['list_url'];?>" target="_blank">
							<span class="font-semibold sm_underline"><?php echo $item['list_button'];?></span>
						</a>
						<?php }?>
					</div>
					<div class="social-img">
						<img class="social-img" src="<?php echo $item['list_image']['url'];?>">
					</div>
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