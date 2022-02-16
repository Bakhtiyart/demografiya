<?php
namespace ElementorMaster\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

// Security Note: Blocks direct access to the plugin PHP files.
defined( 'ABSPATH' ) || die();


class Widget_Osnovatel extends Widget_Base {

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
		return 'osnovateli';
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
		return esc_html__( 'Osnovatel', 'elementor' );
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
				'type'    => Controls_Manager::TEXTAREA,
				'default' => __( 'Title', 'elementor-master' ),
			)
		);

		$this->add_control(
			'description',
			array(
				'label'   => __( 'Director', 'elementor-master' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Director', 'elementor-master' ),
			)
		);

		$this->add_control(
			'content',
			array(
				'label'   => __( 'Content', 'elementor-master' ),
				'type'    => Controls_Manager::WYSIWYG,
				'default' => __( 'Content', 'elementor-master' ),
			)
		);
		$this->add_control(
			'mask_image',
			array(
				'label' => __( 'Director image', 'elementor-master' ),
				'type' => Controls_Manager::MEDIA,        		
			)
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
		$this->add_inline_editing_attributes( 'content', 'advanced' );
		?>
		<div class="container pt-10"> 
			<div class="flex flex-wrap founders">
				<div class="founders-item">
					<blockquote class="text-blockquote blockquote">
						<span class="text-indigo"><?php echo wp_kses( $settings['title'], array() ); ?></span>
					</blockquote>
				</div>
				<div class="founders-item-img">
					<img class="founder-image" src="<?php echo $settings['mask_image']['url'];?>" ></div>
					<div class="founders-item">
						<h4 class="founders-header"><?php echo wp_kses( $settings['description'], array() ); ?></h4>
						<p class="text-indigo font-semibold mb-8"><?php echo wp_kses( $settings['content'], array() ); ?></p>
						
					</div>
				</div>
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
	protected function _content_template() {
		?>
		<#
		view.addInlineEditingAttributes( 'title', 'none' );
		view.addInlineEditingAttributes( 'description', 'basic' );
		view.addInlineEditingAttributes( 'content', 'advanced' );
		#>
		<div class="container pt-10"> 
			<div class="flex flex-wrap founders">
				<div class="founders-item">
					<blockquote class="text-blockquote blockquote">
						<span class="text-indigo">{{{ settings.title }}}</span>
					</blockquote>
				</div>
				<div class="founders-item-img">
					<img class="founder-image" src="{{{ settings.mask_image.url }}}" alt=""></div>
					<div class="founders-item">
						<h4 class="founders-header">{{{ settings.description }}}</h4>
						<p class="text-indigo font-semibold mb-8">{{{ settings.content }}}</p>
					</div>
				</div>
			</div>
		</div>		
		<?php
	}
}