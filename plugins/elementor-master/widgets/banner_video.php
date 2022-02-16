<?php
namespace ElementorMaster\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

// Security Note: Blocks direct access to the plugin PHP files.
defined( 'ABSPATH' ) || die();


class Banner_Video extends Widget_Base {

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
		return 'banner_video';
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
		return esc_html__( 'Banner with video', 'elementor' );
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
			'video',
			[
				'label' => esc_html__( 'Choose video', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'media_types'=>['video'],
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		
		$this->add_control(
			'global',
			array(
				'label'   => __( 'Global text', 'elementor-master' ),
				'type'    => Controls_Manager::TEXT,
			)
		);

		$this->add_control(
			'desc_global',
			array(
				'label'   => __( 'Global description', 'elementor-master' ),
				'type'    => Controls_Manager::TEXTAREA,
			)
		);

		$this->add_control(
			'uzbekistan',
			array(
				'label'   => __( 'Uzbekistan text', 'elementor-master' ),
				'type'    => Controls_Manager::TEXT,
			)
		);

		$this->add_control(
			'desc_uz',
			array(
				'label'   => __( 'Uzbekistan description', 'elementor-master' ),
				'type'    => Controls_Manager::TEXTAREA,
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
		$this->add_inline_editing_attributes( 'global', 'basic' );
		$this->add_inline_editing_attributes( 'desc_global', 'basic' );
		$this->add_inline_editing_attributes( 'uzbekistan', 'basic' );
		$this->add_inline_editing_attributes( 'desc_global', 'basic' );
		?>

		<div class="section section__page-banner">
            <video autoplay muted loop id="myVideo">
                <source src="<?php echo $settings['video']['url'] ?>" type="video/mp4">
            </video>

            <div class="wrapper">


                <div class="hero-body">

                    <div class="container">

                        <div class="big-counter">

                            <div class="counter-main">

                                <div class="counter is-size-2-mobile">
                                    <div id="worldpop" class="active"></div>
                                    <div id="uzbekistan"></div>
                                </div>

                                <h2 class="counter-title is-size-3-mobile"><?php echo wp_kses( $settings['title'], array() ); ?></h2>

                                <div class="counter-options columns">

                                    <div class="column">

                                        <div>
                                            <button data-desc="<?php echo wp_kses( $settings['desc_global'], array() ); ?>" class="button is-outlined is-white is-small is-rounded border-25 space-right-10 ng-star-inserted"><?php echo wp_kses( $settings['global'], array() ); ?></button>
                                            <button data-desc="<?php echo wp_kses( $settings['desc_uz'], array() ); ?>" class="button is-outlined is-white is-small is-rounded border-25 active ng-star-inserted"><?php echo wp_kses( $settings['uzbekistan'], array() ); ?></button>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

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
	
}