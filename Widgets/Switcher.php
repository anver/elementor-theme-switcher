<?php
namespace SmaartWeb\Elementor\ThemeSwitcher\Widgets;

use Elementor\Core\Kits\Controls\Repeater as SwRepeater;
use Elementor\Widget_Base;
use Elementor\Repeater;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Typography;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Language Switcher
 *
 * Elementor widget for Language Switcher.
 *
 * @since 1.0.0
 */
class Switcher extends Widget_Base {

	/**
	 * Retrieve the widget name.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'theme-switcher';
	}

	/**
	 * Retrieve the widget title.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Theme Switcher', 'swswitcher' );
	}

	/**
	 * Retrieve the widget icon.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'fa fa-language';
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
		return array( 'general-elements' );
	}

	/**
	 * Register the widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function _register_controls() {
		$this->start_controls_section(
			'section_content',
			array(
				'label' => __( 'Content', 'swswitcher' ),
			)
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'title',
			array(
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'required'    => true,
			)
		);

		// Color Value.
		$repeater->add_control(
			'color',
			array(
				'type'        => Controls_Manager::COLOR,
				'label_block' => true,
				'dynamic'     => array(),
				'selectors'   => array(
					'{{WRAPPER}}' => '--e-global-color-{{_id.VALUE}}: {{VALUE}}',
				),
				'global'      => array( 'active' => false ),
			)
		);

		$this->add_control(
			'sw_colors',
			array(
				'type'   => SwRepeater::CONTROL_TYPE,
				'fields' => $repeater->get_controls(),
			)
		);

		$this->end_controls_section();
	}

	/**
	 * Render the widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_active_settings();
		if ( isset( $settings['sw_colors'] ) && ! empty( $settings['sw_colors'] ) ) {
			$colors = array();
			foreach ( $settings['sw_colors'] as $setting ) {
				$colors[ $setting['title'] ] = $setting['color'];
			}
		} else {
			$colors = array();
		}

		echo '<div class="theme-switch-wrapper">';
		echo '<label class="theme-switch" for="sw-switcher-checkbox">';
		echo '<input type="checkbox" id="sw-switcher-checkbox" />';
		echo '<div class="slider round"></div>';
		echo '</label>';
		// echo '<em>Enable Dark Mode!</em>';
		echo '</div>';
		?>
			<script type="text/javascript">
			var sw_colors = <?php echo json_encode( $colors ); ?>;
			</script>
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
	protected function _content_template() {}
}
