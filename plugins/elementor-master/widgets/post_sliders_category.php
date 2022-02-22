<?php
namespace ElementorMaster\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

// Security Note: Blocks direct access to the plugin PHP files.
defined( 'ABSPATH' ) || die();


class Post_Sliders_Category extends Widget_Base {

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
		return 'post_sliders_category';
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
		return esc_html__( 'Post sliders Categories', 'elementor' );
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
			'post_type',
			[
				'label' => esc_html__( 'Query', 'elementor-master' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'solid',
				'options' => [
					'demografik-pasport' => esc_html__( 'Dempgraphic passport', 'elementor-master' ),
				],
			]
		);

		$this->add_control(
			'title',
			array(
				'label'   => __( 'Title', 'elementor-master' ),
				'type'    => Controls_Manager::TEXT,
			)
		);

		$this->add_control(
			'button_name',
			array(
				'label'   => __( 'Button text', 'elementor-master' ),
				'type'    => Controls_Manager::TEXT,
			)
		);

		$this->add_control(
			'button_link',
			[
				'label' => esc_html__( 'Button Link', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'plugin-name' ),
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
					'custom_attributes' => '',
				],
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
		$this->add_inline_editing_attributes( 'button_name', 'none' );
		?>

        <?php
			
            $categories = get_categories( [
            'taxonomy'     => 'demografik-category',
            'type'         => 'demografik-pasport',
            'child_of'     => 0,
            'orderby'      => 'name',
            'order'        => 'ASC',
            'hide_empty'   => false,
            'pad_counts'   => false,
            // полный список параметров смотрите в описании функции http://wp-kama.ru/function/get_terms
        ] );

        ?>
		
        
        <div class="section section__content-slider section__content-slider--pl section__content-slider--carousel section__bg--off-white">
            <div class="wrapper">
                <h2 class="section__title font__primary--31"><?php echo wp_kses( $settings['title'], array() ); ?></h2>
                <div class="main-carousel">
                    <?php 
             foreach( $categories as $cat ){
                    // Данные в объекте $cat

                    // $cat->term_id
                    // $cat->name (Рубрика 1)
                    // $cat->slug (rubrika-1)
                    // $cat->term_group (0)
                    // $cat->term_taxonomy_id (4)
                    // $cat->taxonomy (category)
                    // $cat->description (Текст описания)
                    // $cat->parent (0)
                    // $cat->count (14)
                    // $cat->object_id (2743)
                    // $cat->cat_ID (4)
                    // $cat->category_count (14)
                    // $cat->category_description (Текст описания)
                    // $cat->cat_name (Рубрика 1)
                    // $cat->category_nicename (rubrika-1)
                    // $cat->category_parent (0)
                    ?>
                    <div class="carousel-cell carousel-cell--resource carousel-cell--image">
                        <a href="#" target="_blank" class="block__img">
                            <span class="overlay">
                                <svg version="1.1" class="icon icon__plus" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="6px" height="6px"
                                    viewBox="0 0 6 6" style="enable-background:new 0 0 6 6;" xml:space="preserve">

                                    <polygon
                                        points="6,2.6 3.4,2.6 3.4,0 2.6,0 2.6,2.6 0,2.6 0,3.4 2.6,3.4 2.6,6 3.4,6 3.4,3.4 6,3.4 ">

                                    </polygon>

                                </svg>
                            </span>
                            <img src="<?php echo z_taxonomy_image_url($cat->term_id); ?>">
                            
                        </a>

                        <div class="content">
                            <h3 class="title"><a href="<?php echo $cat->slug; ?>" target="_blank"><?php echo $cat->name; ?></a></h3>
                        </div>
                    </div>

        <?php }?>



                </div>

                <a href="<?php echo $settings['button_link']['url'] ?>" class="btn btn__page btn__primary "><?php echo wp_kses( $settings['button_name'], array() ); ?>

                    <svg version="1.1" class="icon icon__arrow" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="12.9px" height="10.4px"
                        viewBox="0 0 12.9 10.4" style="enable-background:new 0 0 12.9 10.4;" xml:space="preserve">

                        <path class="st0"
                            d="M12.6,4.7L7.8,0l-1,1.1l3.5,3.4H0V6h10.2L6.7,9.4l1,1.1l4.8-4.7c0.1-0.1,0.2-0.3,0.2-0.5S12.8,4.8,12.6,4.7z">

                        </path>

                    </svg>

                </a>

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