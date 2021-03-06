<?php
/**
 * Widgets class.
 *
 * @category   Class
 * @package    ElementorAwesomesauce
 * @subpackage WordPress
 * @author     Ben Marshall <me@benmarshall.me>
 * @copyright  2020 Ben Marshall
 * @license    https://opensource.org/licenses/GPL-3.0 GPL-3.0-only
 * @link       link(https://www.benmarshall.me/build-custom-elementor-widgets/,
 *             Build Custom Elementor Widgets)
 * @since      1.0.0
 * php version 7.3.9
 */

namespace ElementorMaster;

// Security Note: Blocks direct access to the plugin PHP files.
defined( 'ABSPATH' ) || die();

/**
 * Class Plugin
 *
 * Main Plugin class
 *
 * @since 1.0.0
 */
class Widgets {

	/**
	 * Instance
	 *
	 * @since 1.0.0
	 * @access private
	 * @static
	 *
	 * @var Plugin The single instance of the class.
	 */
	private static $instance = null;

	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return Plugin An instance of the class.
	 */
	public static function instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Include Widgets files
	 *
	 * Load widgets files
	 *
	 * @since 1.0.0
	 * @access private
	 */
	private function include_widgets_files() {
		
		require_once 'widgets/osnovateli.php';
		require_once 'widgets/komanda.php';
		require_once 'widgets/soobshestvo.php';
		require_once 'widgets/for_whom.php';
		require_once 'widgets/sliders.php';

		require_once 'widgets/banner_video.php';
		require_once 'widgets/partner_sliders.php';
		require_once 'widgets/post_sliders.php';
		require_once 'widgets/post_sliders_category.php';
	}

	/**
	 * Register Widgets
	 *
	 * Register new Elementor widgets.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function register_widgets() {
		// It's now safe to include Widgets files.
		$this->include_widgets_files();

		// Register the plugin widget classes.		
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Widget_Komanda() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Widget_Osnovatel() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Widget_Soobshestvo() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\For_Whom() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Sliders() );

		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Banner_Video() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Partner_Sliders() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Post_Sliders() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Post_Sliders_Category() );
	}

	/**
	 *  Plugin class constructor
	 *
	 * Register plugin action hooks and filters
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function __construct() {
		// Register the widgets.
		add_action( 'elementor/widgets/widgets_registered', array( $this, 'register_widgets' ) );
	}
}

// Instantiate the Widgets class.
Widgets::instance();
