<?php
namespace ElementorMaster\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

// Security Note: Blocks direct access to the plugin PHP files.
defined( 'ABSPATH' ) || die();


class Post_Sliders extends Widget_Base {

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
		return 'post_sliders';
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
		return esc_html__( 'Post sliders', 'elementor' );
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

	

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'title', [
				'label' => __( 'Title', 'elementor-awesomesauce' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'List Title' , 'elementor-awesomesauce' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'link',
			[
				'label' => esc_html__( 'Link', 'plugin-name' ),
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

		$repeater->add_control(
			'image',
			[
				'label' => esc_html__( 'Choose Image', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
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
		$this->add_inline_editing_attributes( 'button_name', 'none' );
		?>


		


		<div class="section section__content-slider section__content-slider--pl section__content-slider--carousel section__bg--off-white">
            <div class="wrapper">
                <h2 class="section__title font__primary--31"><?php echo wp_kses( $settings['title'], array() ); ?></h2>
                <div class="main-carousel">
				<?php
				global $post;
				$postslist = get_posts( [
					'post_type' => 'infographics',
					'posts_per_page' => 10,
					'order'=> 'ASC',
					'orderby' => 'title'
				] );

				foreach( $postslist as $post ){
					setup_postdata($post);
					?>
                    <div class="carousel-cell carousel-cell--resource carousel-cell--image">
                        <a href="<?php the_permalink(); ?>" target="_blank" class="block__img">
                            <span class="overlay">
                                <svg version="1.1" class="icon icon__plus" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="6px" height="6px"
                                    viewBox="0 0 6 6" style="enable-background:new 0 0 6 6;" xml:space="preserve">

                                    <polygon
                                        points="6,2.6 3.4,2.6 3.4,0 2.6,0 2.6,2.6 0,2.6 0,3.4 2.6,3.4 2.6,6 3.4,6 3.4,3.4 6,3.4 ">

                                    </polygon>
                                </svg>
                            </span>
                            <?php
                            if (has_post_thumbnail() != null) {
                                the_post_thumbnail();
                            }else{
                             ?>
                             <div></div>
                            <?php }
                              ?>
                        </a>
                        <div class="content">
                            <h3 class="title"><a href="<?php the_permalink(); ?>" target="_blank"><?php the_title(); ?></a></h3>
                            <?php 
                                 if (has_post_thumbnail() == null) {?>
                                 
                                <?php the_excerpt(); ?>
                            <div class="partners">
                              <p> <?php echo get_post_meta( get_the_ID(), 'author_name', TRUE ) ?></p>
                            </div>
                                <?php
                            }else{
                             ?>
                             <div></div>
                            <?php } ?>
                        </div>
                    </div>
					<?php
				}

				wp_reset_postdata();
				?>
                    
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



		<div class="notsection section__content-slider nopade">

            <div class="my_slide ">

                <div class="wrapper">

                    <h2 class="section__title font__primary--31"><?php echo wp_kses( $settings['title'], array() ); ?></h2>

                    <div class="touch_slider">

                        <div id="owl-demo" class="owl-carousel">

                           <?php 
							if ( $settings['list'] ) {
								
								foreach (  $settings['list'] as $item ) { ?>
								<a href="<?php echo $item['link']['url'];?>" class="item nopade relative" target="_blank">

									<div class="img_class"><img src="<?php echo $item['image']['url'];?>"></div><span class="slide_text"><?php echo $item['title'];?></span>

                           		 </a>
								<?php }
							
							}			
							?>	



                        </div>

                    </div>

                    <a href="<?php echo $settings['button_link']['url'] ?>" class="btn btn__page btn__primary"><?php echo wp_kses( $settings['button_name'], array() ); ?>

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