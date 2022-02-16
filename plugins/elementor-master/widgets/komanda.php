<?php
namespace ElementorMaster\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

// Security Note: Blocks direct access to the plugin PHP files.
defined( 'ABSPATH' ) || die();


class Widget_Komanda extends Widget_Base {

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
		return 'komanda';
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
		return esc_html__( 'Komanda', 'elementor-master' );
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
				'default' => __( 'Title', 'elementor-master' ),
			)
		);

		$this->add_control(
			'description',
			array(
				'label'   => __( 'Description', 'elementor-master' ),
				'type'    => Controls_Manager::TEXTAREA,
				'default' => __( 'Description', 'elementor-master' ),
			)
		);
		$this->add_control(
			'link',
			array(
				'label'   => __( 'About us page', 'elementor-master' ),
				'type' => Controls_Manager::URL,
			)
		);

		$this->add_control(
			'team_amount',
			array(
				'label'   => __( 'Amount of team', 'elementor-master' ),
				'type'    => Controls_Manager::TEXT,
			)
		);
		$this->add_control(
			'team',
			array(
				'label'   => __( 'Team', 'elementor-master' ),
				'type'    => Controls_Manager::TEXT,
			)
		);
		$this->add_control(
			'teacher_amount',
			array(
				'label'   => __( 'Amount of teachers', 'elementor-master' ),
				'type'    => Controls_Manager::TEXT,
			)
		);
		$this->add_control(
			'teacher',
			array(
				'label'   => __( 'Teacher', 'elementor-master' ),
				'type'    => Controls_Manager::TEXT,
			)
		);
		$this->add_control(
			'project_amount',
			array(
				'label'   => __( 'Amount of project', 'elementor-master' ),
				'type'    => Controls_Manager::TEXT,
			)
		);
		$this->add_control(
			'project',
			array(
				'label'   => __( 'Project', 'elementor-master' ),
				'type'    => Controls_Manager::TEXT,
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
		?>
		<div class="container mb-6">
			<div class="flex team-block-wrap items-center flex-wrap -mx-3">
				<div class="w-full left-block">
					<h2 class="heading text-indigo"><?php echo wp_kses( $settings['title'], array() ); ?></h2>
					<p class="text-lg lg_text-xl text-indigo font-semibold mb-6"><?php echo wp_kses( $settings['description'], array() ); ?></p>
					<a class="link-more" href="<?php echo $settings['link']['url'];?>">
						<span class="font-semibold mr-3"><?php echo __("Read more", "elementor-master");?></span>
						<span class="triangle-to-right triangle-to-right__big inline-block"></span>
					</a>
				</div>
				<div class="w-full right-block">
					<div class="flex items-center mb-6">
						<h5 class="number">+<?php echo wp_kses( $settings['team_amount'], array() ); ?></h5>
						<p class="right-block__text"><?php echo wp_kses( $settings['team'], array() ); ?></p>
					</div>
					<div class="flex items-center mb-6">
						<h5 class="number">+<?php echo wp_kses( $settings['teacher_amount'], array() ); ?></h5>
						<p class="right-block__text"><?php echo wp_kses( $settings['teacher'], array() ); ?></p>
					</div>
					<div class="flex items-center mb-6">
						<h5 class="number">+<?php echo wp_kses( $settings['project_amount'], array() ); ?></h5>
						<p class="right-block__text"><?php echo wp_kses( $settings['project'], array() ); ?></p>
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
		#>
		<div class="container mb-6">
			<div class="flex items-center flex-wrap -mx-3">
				<div class="w-full md_w-1/2 px-3">
					<h2 class="text-3xl sm_text-4xl xl_text-5xl xl_text-titlemin font-extrabold mb-4 text-indigo">{{{ settings.title }}}</h2>
					<p class="text-lg lg_text-xl text-indigo font-semibold mb-6"><?php echo wp_kses( $settings['description'], array() ); ?></p>
					<a class="bg-indigo hover_bg-purple mb-12 inline-flex items-center px-8 md_px-10 py-3 rounded-xl duration-300 text-white" href="{{{ settings.link.url }}}">
						<span class="font-semibold mr-3"><?php echo __("Read more", "elementor-master");?></span>
						<span class="triangle-to-right triangle-to-right__big inline-block"></span>
					</a>
				</div>
				<div class="w-full md_w-1/2 px-3">
					<div class="flex items-center mb-6">
						<h5 class="text-indigo text-4xl sm_text-5xl font-extrabold mr-4 sm_w-28 sm_min-w-28 w-20 min-w-20">+{{{ settings.team_amont }}}</h5>
						<p class="text-indigo font-bold text-xl">{{{ settings.team }}}</p>
					</div>
					<div class="flex items-center mb-6">
						<h5 class="text-indigo text-4xl sm_text-5xl font-extrabold mr-4 sm_w-28 sm_min-w-28 w-20 min-w-20">+{{{ settings.teacher_amount}}}</h5>
						<p class="text-indigo font-bold text-xl">{{{ settings.teacher}}}</p>
					</div>
					<div class="flex items-center mb-6">
						<h5 class="text-indigo text-4xl sm_text-5xl font-extrabold mr-4 sm_w-28 sm_min-w-28 w-20 min-w-20">+{{{ settings.project_amount}}}</h5>
						<p class="text-indigo font-bold text-xl">{{{ settings.project}}}></p>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
}