<?php
/**
 * Dashboard
 *
 * Package: MightyAddons
 * @since 1.1.0
 */
namespace MightyAddons\Classes;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! class_exists( 'DashboardPanel' ) ) {
    class DashboardPanel {

        const PLG_SLUG = 'mighty-addons';

        const PLG_NONCE = 'mighty_addons_panel';

        public static $mighty_addons = [

            'testimonial' => [
                'title' => 'MT Testimonial',
                'description' => '',
                'enable' => true,
                'class' => 'MT_Testimonial',
                'slug' => 'testimonial',
                'icon' => 'mf mf-testimonial'
            ],
            'team' => [
                'title' => 'MT Team',
                'description' => '',
                'enable' => true,
                'class' => 'MT_Team',
                'slug' => 'team',
                'icon' => 'mf mf-team'
            ],
            'progressbar' => [
                'title' => 'MT Progress Bar',
                'description' => '',
                'enable' => true,
                'class' => 'MT_Progressbar',
                'slug' => 'progressbar',
                'icon' => 'mf mf-progressbar'
            ],
            'counter' => [
                'title' => 'MT Counter',
                'description' => '',
                'enable' => true,
                'class' => 'MT_Counter',
                'slug' => 'counter',
                'icon' => 'mf mf-counter'
            ],
            'buttongroup' => [
                'title' => 'MT Button Group',
                'description' => '',
                'enable' => true,
                'class' => 'MT_Buttongroup',
                'slug' => 'buttongroup',
                'icon' => 'mf mf-button'
            ],
            'accordion' => [
                'title' => 'MT Accordion',
                'description' => '',
                'enable' => true,
                'class' => 'MT_Accordion',
                'slug' => 'accordion',
                'icon' => 'mf mf-accordion'
            ],
            'beforeafter' => [
                'title' => 'MT Before After',
                'description' => '',
                'enable' => true,
                'class' => 'MT_Beforeafter',
                'slug' => 'beforeafter',
                'icon' => 'mf mf-beforeafter'
            ],
            'gradientheading' => [
                'title' => 'MT Gradient Heading',
                'description' => '',
                'enable' => true,
                'class' => 'MT_Gradientheading',
                'slug' => 'gradientheading',
                'icon' => 'mf mf-heading'
            ],
            'flipbox' => [
                'title' => 'MT Flip Box',
                'description' => '',
                'enable' => true,
                'class' => 'MT_Flipbox',
                'slug' => 'flipbox',
                'icon' => 'mf mf-flipbox'
            ],
            'openinghours' => [
                'title' => 'MT Opening Hours',
                'description' => '',
                'enable' => true,
                'class' => 'MT_Openinghours',
                'slug' => 'openinghours',
                'icon' => 'mf mf-openinghours'
            ],
        ];

        private static $ma_default_settings;

        private static $ma_settings;

        private static $ma_get_settings;
        
        public static function init() {
            
            add_action( 'admin_menu', [ __CLASS__, 'add_menu' ], 22 );

            add_action( 'admin_enqueue_scripts', [ __CLASS__, 'enqueue_scripts' ] );

            add_action( 'wp_ajax_save_mighty_addons_settings', [ __CLASS__, 'mighty_addons_status'] );

        }

        public static function add_menu() {
            add_menu_page(
                __( 'Mighty Addons Panel', 'mighty-addons' ),
                __( 'Mighty Addons', 'mighty-addons' ),
                'manage_options',
                'mighty-addons-home',
                [ __CLASS__, 'generate_homepage' ],
                MIGHTY_ADDONS_PLG_URL.'assets/admin/images/mighty-logo.svg',
                99
            );

            add_submenu_page(
                'mighty-addons-home',
                __( 'Mighty Widgets', 'mighty-addons' ),
                __( 'Widgets', 'mighty-addons' ),
                'manage_options',
                'admin.php?page=mighty-addons-home#widgets'
            );

            add_submenu_page(
                'mighty-addons-home',
                __( 'Mighty Extension', 'mighty-addons' ),
                __( 'Extensions', 'mighty-addons' ),
                'manage_options',
                'admin.php?page=mighty-addons-home#extensions'
            );

            add_submenu_page(
                'mighty-addons-home',
                __( 'Mighty Pro', 'mighty-addons' ),
                __( 'Go Pro 🔥', 'mighty-addons' ),
                'manage_options',
                'admin.php?page=mighty-addons-home#go-pro'
            );
        }

        public static function enqueue_scripts( $hook ) {
            
            if( strpos($hook, self::PLG_SLUG) !== false ) {
                // ⚠ Proceed with caution
            } else {
                return;
            }

            wp_enqueue_style(
                'mighty-icons',
                MIGHTY_ADDONS_PLG_URL . 'assets/css/mighty-icons.css',
                null,
                MIGHTY_ADDONS_VERSION
            );

            wp_enqueue_style(
                'mighty-styles',
                MIGHTY_ADDONS_PLG_URL . 'assets/admin/css/admin-styles.css',
                null,
                MIGHTY_ADDONS_VERSION
            );
            
            wp_enqueue_style(
                'mighty-font-roboto',
                'https://fonts.googleapis.com/css?family=Roboto:400,500,700,900&display=swap',
                null,
                MIGHTY_ADDONS_VERSION
            );
            

            wp_enqueue_script(
                'mighty-panel-js',
                MIGHTY_ADDONS_PLG_URL . 'assets/admin/js/admin-script.js',
                array('jquery'),
                MIGHTY_ADDONS_VERSION,
                true // in footer?
            );

            wp_localize_script(
                'mighty-panel-js',
                'MightyAddonsDashboard',
                [
                    'nonce' => wp_create_nonce( self::PLG_NONCE ),
                    'ajaxUrl' => admin_url( 'admin-ajax.php' ),
                    'action' => self::PLG_NONCE,
                    'yes' => esc_html__( 'Yes', 'mighty-addons' ),
                    'cancel' => esc_html__( 'Cancel', 'mighty-addons' ),
                ]
            );
        }

        private static function load_html( $page ) {
            $file = MIGHTY_ADDONS_DIR_PATH . 'panel/' . $page . '.php';
            if ( is_readable( $file ) ) {
                include( $file );
            }
        }

        public static function get_default_keys() {
        
            $default_keys = array_fill_keys( self::$mighty_addons, true );
            
            return $default_keys;
        }

        public static function generate_homepage() {
            $script = array(
                'ajaxurl'   => admin_url( 'admin-ajax.php' ),
                'nonce' 	=> wp_create_nonce( self::PLG_SLUG ),
            );

            wp_localize_script( 'mighty-panel-js', 'settings', $script );
            
            self::$ma_default_settings = self::$mighty_addons; // Default values i.e, mighty_addons() functions (predefined/static)

            self::$ma_get_settings = self::get_enabled_addons();

            $ma_new_addons = array_diff_key( self::$ma_default_settings, self::$ma_get_settings );

            if( ! empty ( $ma_new_addons ) ) {
                $ma_updated_settings = array_merge( self::$ma_get_settings, $ma_new_addons );

                update_option( 'mighty_addons_status', $ma_updated_settings );
            }

            self::$ma_get_settings = get_option( 'mighty_addons_status', self::$ma_default_settings );
            
            self::load_html( 'home' );
        }

        public static function get_enabled_addons() {

            $enable_addons = get_option( 'mighty_addons_status', self::$mighty_addons );
            
            return $enable_addons;

        }

        public static function mighty_addons_status() {
            
            check_ajax_referer( 'mighty-addons', 'security' );
            
            if( isset( $_POST['fields'] ) ) {
                parse_str( $_POST['fields'], $settings );
            } else {
                return;
            }

            // For compactness
            // foreach ( self::$ma_settings as $widget ) {
            //     self::$ma_settings[$settings[$widget['slug']]['enable']] = intval( $settings[$widget['slug']] ? 1 : 0 );
            // }
            
            self::$ma_settings = [

                'testimonial' => [
                    'title' => 'MT Testimonial',
                    'description' => '',
                    'enable' => intval( $settings['testimonial'] ? 1 : 0 ),
                    'class' => 'MT_Testimonial',
                    'slug' => 'testimonial',
                    'icon' => 'mf mf-testimonial'
                ],
                'team' => [
                    'title' => 'MT Team',
                    'description' => '',
                    'enable' => intval( $settings['team'] ? 1 : 0 ),
                    'class' => 'MT_Team',
                    'slug' => 'team',
                    'icon' => 'mf mf-team'
                ],
                'progressbar' => [
                    'title' => 'MT Progress Bar',
                    'description' => '',
                    'enable' => intval( $settings['progressbar'] ? 1 : 0 ),
                    'class' => 'MT_Progressbar',
                    'slug' => 'progressbar',
                    'icon' => 'mf mf-progressbar'
                ],
                'counter' => [
                    'title' => 'MT Counter',
                    'description' => '',
                    'enable' => intval( $settings['counter'] ? 1 : 0 ),
                    'class' => 'MT_Counter',
                    'slug' => 'counter',
                    'icon' => 'mf mf-counter'
                ],
                'buttongroup' => [
                    'title' => 'MT Button Group',
                    'description' => '',
                    'enable' => intval( $settings['buttongroup'] ? 1 : 0 ),
                    'class' => 'MT_Buttongroup',
                    'slug' => 'buttongroup',
                    'icon' => 'mf mf-button'
                ],
                'accordion' => [
                    'title' => 'MT Accordion',
                    'description' => '',
                    'enable' => intval( $settings['accordion'] ? 1 : 0 ),
                    'class' => 'MT_Accordion',
                    'slug' => 'accordion',
                    'icon' => 'mf mf-accordion'
                ],
                'beforeafter' => [
                    'title' => 'MT Before After',
                    'description' => '',
                    'enable' => intval( $settings['beforeafter'] ? 1 : 0 ),
                    'class' => 'MT_Beforeafter',
                    'slug' => 'beforeafter',
                    'icon' => 'mf mf-beforeafter'
                ],
                'gradientheading' => [
                    'title' => 'MT Gradient Heading',
                    'description' => '',
                    'enable' => intval( $settings['gradientheading'] ? 1 : 0 ),
                    'class' => 'MT_Gradientheading',
                    'slug' => 'gradientheading',
                    'icon' => 'mf mf-heading'
                ],
                'flipbox' => [
                    'title' => 'MT Flip Box',
                    'description' => '',
                    'enable' => intval( $settings['flipbox'] ? 1 : 0 ),
                    'class' => 'MT_Flipbox',
                    'slug' => 'flipbox',
                    'icon' => 'mf mf-flipbox'
                ],
                'openinghours' => [
                    'title' => 'MT Opening Hours',
                    'description' => '',
                    'enable' => intval( $settings['openinghours'] ? 1 : 0 ),
                    'class' => 'MT_Openinghours',
                    'slug' => 'openinghours',
                    'icon' => 'mf mf-openinghours'
                ],
            ];
            
            update_option( 'mighty_addons_status', self::$ma_settings );
            
            return true;
        }

    }
}

DashboardPanel::init();