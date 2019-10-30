<?php
namespace MightyAddons\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use \Elementor\Utils as Utils;
use Elementor\Repeater as Repeater;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Typography;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Elementor MT_Team
 *
 * Elementor widget for MT_Team.
 *
 * @since 1.0.0
 */
class MT_Team extends Widget_Base {
	
	public function get_name() {
		return 'team';
	}
	
	public function get_title() {
		return __( 'MT Team', 'mighty' );
	}
	
	public function get_icon() {
		return 'fas fa-user-friends';
	}

	public function get_categories() {
		return [ 'mighty-addons' ];
	}

	public function get_style_depends() {
		return [ 'mt-team' ];
	}
	
	protected function _register_controls() {
		$this->start_controls_section(
			'section_content',
			[
				'label' => __( 'MT Team', 'mighty' ),
			]
		);

			$this->add_control(
				'name',
				[
					'label' => __( 'Name', 'mighty' ),
					'type' => Controls_Manager::TEXT,
					'default' => 'Darth Vader',
				]
			);

			$this->add_control(
				'image',
				[
					'label' => __( 'Team Avatar', 'mighty' ),
					'type' => Controls_Manager::MEDIA,
					'default' => [
						'url' => Utils::get_placeholder_image_src(),
					],
				]
			);

			$this->add_control(
				'designation',
				[
					'label' => __( 'Designation', 'mighty' ),
					'type' => Controls_Manager::TEXT,
					'default' => 'Digital Overlord',
				]
			);

			$this->add_control(
				'about',
				[
					'label' => __( 'About', 'mighty' ),
					'type' => Controls_Manager::TEXTAREA,
					'dynamic' => [
						'active' => true,
					],
					'rows' => '10',
					'default' => 'Lorem Ipsum dolor sit amet.',
				]
			);

		$this->end_controls_section();

		// Social Media Icons
        $this->start_controls_section(
            'mt_team_social_link',
            [
                'label' => __( 'Social Profiles', 'mighty' ),
            ]
        );

            $repeater = new Repeater();

            $repeater->add_control(
                'mt_social_title',
                [
                    'label'   => __( 'Title', 'mighty' ),
                    'type'    => Controls_Manager::TEXT,
                    'default' => 'Facebook',
                ]
            );

            $repeater->add_control(
                'mt_social_link',
                [
                    'label'   => __( 'Link', 'mighty' ),
                    'type'    => Controls_Manager::TEXT,
                    'default' => __( '#', 'mighty' ),
                ]
            );
			
			$repeater->add_control(
				'mt_social_icon',
				[
					'label' => __( 'Icon', 'elementor' ),
					'type' => Controls_Manager::ICONS,
					'fa4compatibility' => 'social',
					'label_block' => true,
					'default' => [
						'value' => 'fab fa-facebook',
						'library' => 'fa-brands',
					],
					'recommended' => [
						'fa-brands' => [
							'android',
							'apple',
							'behance',
							'bitbucket',
							'codepen',
							'delicious',
							'deviantart',
							'digg',
							'dribbble',
							'elementor',
							'facebook',
							'flickr',
							'foursquare',
							'free-code-camp',
							'github',
							'gitlab',
							'globe',
							'google-plus',
							'houzz',
							'instagram',
							'jsfiddle',
							'linkedin',
							'medium',
							'meetup',
							'mixcloud',
							'odnoklassniki',
							'pinterest',
							'product-hunt',
							'reddit',
							'shopping-cart',
							'skype',
							'slideshare',
							'snapchat',
							'soundcloud',
							'spotify',
							'stack-overflow',
							'steam',
							'stumbleupon',
							'telegram',
							'thumb-tack',
							'tripadvisor',
							'tumblr',
							'twitch',
							'twitter',
							'viber',
							'vimeo',
							'vk',
							'weibo',
							'weixin',
							'whatsapp',
							'wordpress',
							'xing',
							'yelp',
							'youtube',
							'500px',
						],
						'fa-solid' => [
							'envelope',
							'link',
							'rss',
						],
					],
				]
			);

            $repeater->add_control(
                'mt_icon_color',
                [
                    'label'     => __( 'Icon Color', 'mighty' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} {{CURRENT_ITEM}} i' => 'color: {{VALUES}}',
						'{{WRAPPER}} {{CURRENT_ITEM}} svg' => 'fill: {{VALUES}}',
					]
                ]
            );

            $repeater->add_control(
                'mt_icon_background',
                [
                    'label'     => __( 'Icon Background', 'mighty' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} {{CURRENT_ITEM}} i' => 'background-color: {{VALUES}}'
					]
                ]
            );

            $repeater->add_control(
                'mt_icon_hover_color',
                [
                    'label'     => __( 'Icon Hover Color', 'mighty' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} {{CURRENT_ITEM}} i:hover' => 'color: {{VALUES}}'
					]
                ]
            );

            $repeater->add_control(
                'mt_icon_hover_background',
                [
                    'label'     => __( 'Icon Hover Background', 'mighty' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} {{CURRENT_ITEM}} i:hover' => 'background-color: {{VALUES}}'
					]
                ]
            );

            $repeater->add_control(
                'mt_icon_hover_border_color',
                [
                    'label'     => __( 'Icon Hover border color', 'mighty' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} {{CURRENT_ITEM}} i:hover' => 'border-color: {{VALUES}}'
					]
                ]
            );

            $this->add_control(
                'mt_team_social_link_list',
                [
                    'type'    => Controls_Manager::REPEATER,
                    'fields'  => array_values( $repeater->get_controls() ),
                    'default' => [

                        [
                            'mt_social_title'      => 'Facebook',
                            'mt_social_icon'       => 'fab fa-facebook-f',
                            'mt_social_link'       => __( '#', 'mighty' ),
                        ],
					],
					'title_field' => '{{{ mt_social_title }}}',
                ]
            );

        $this->end_controls_section();

		$this->start_controls_section(
			'section_style',
			[
				'label' => __( 'Style', 'mighty' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_group_control(
				Group_Control_Background::get_type(),
				[
					'name' => 'team_background',
					'label' => __( 'Background', 'mighty' ),
					'types' => [ 'classic', 'gradient' ],
					'selector' => '{{WRAPPER}} .mighty-team',
				]
			);

		$this->end_controls_section();

		// Image Styling
		$this->start_controls_section(
			'mtteam_image_style',
			[
				'label' => __( 'Image', 'mighty' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_responsive_control(
				'mt_image_spacing',
				[
					'label' => __( 'Image Spacing', 'mighty' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range' => [
						'px' => [
							'min' => 1,
							'max' => 200,
						],
					],
					'default' => [
						'unit' => 'px',
						'size' => 20,
					],
					'selectors' => [
						'{{WRAPPER}} .mighty-team .person-avatar' => 'margin-bottom: {{SIZE}}{{UNIT}}',
					]
				]
			);

			$this->add_responsive_control(
				'image_border_radius',
				[
					'label' => __( 'Border Radius', 'mighty' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px', 'em', 'rem' ],
					'range' => [
						'px' => [
							'min' => 1,
							'max' => 200,
						],
					],
					'default' => [
						'unit' => 'px',
						'size' => 0,
					],
					'selectors' => [
						'{{WRAPPER}} .mighty-team .person-avatar' => 'border-radius: {{SIZE}}{{UNIT}}',
					],
				]
			);

			$this->add_responsive_control(
				'image_width',
				[
					'label' => __( 'Image Width', 'mighty' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%' ],
					'range' => [
						'px' => [
							'min' => 1,
							'max' => 1000,
						],
						'%' => [
							'min' => 1,
							'max' => 100,
						],
					],
					'default' => [
						'unit' => 'px',
						'size' => 300,
					],
					'selectors' => [
						'{{WRAPPER}} .mighty-team .person-avatar' => 'width: {{SIZE}}{{UNIT}}',
					],
				]
			);

			$this->add_responsive_control(
				'team_image_align',
				[
					'label' => __( 'Alignment', 'mighty' ),
					'type' => Controls_Manager::CHOOSE,
					'options' => [
						'left' => [
							'title' => __( 'Left', 'mighty' ),
							'icon' => 'fa fa-align-left',
						],
						'center' => [
							'title' => __( 'Center', 'mighty' ),
							'icon' => 'fa fa-align-center',
						],
						'right' => [
							'title' => __( 'Right', 'mighty' ),
							'icon' => 'fa fa-align-right',
						],
						'justify' => [
							'title' => __( 'Justified', 'mighty' ),
							'icon' => 'fa fa-align-justify',
						],
					],
					'selectors' => [
						'{{WRAPPER}} .mighty-team .avatar-wrapper' => 'text-align: {{VALUE}};',
					],
					'default' => 'center',
					'separator' =>'before',
				]
			);

		$this->end_controls_section();
		
		// Name Styling
		$this->start_controls_section(
			'mt_team_name_style',
			[
				'label' => __( 'Name', 'mighty' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'name!' => '',
				],
			]
		);

			$this->add_responsive_control(
				'team_name_margin',
				[
					'label' => __( 'Spacing', 'mighty' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px', 'em', 'rem' ],
					'range' => [
						'px' => [
							'min' => 1,
							'max' => 200,
						],
					],
					'default' => [
						'unit' => 'px',
						'size' => 0,
					],
					'selectors' => [
						'{{WRAPPER}} .mighty-team .person-name' => 'margin-bottom: {{SIZE}}{{UNIT}}',
					],
				]
			);

			$this->add_control(
				'mt_name_htmltag',
				[
					'label' => __( 'HTML Tag', 'mighty' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => 'h3',
					'options' => [
						'h1'  => __( 'H1', 'mighty' ),
						'h2' => __( 'H2', 'mighty' ),
						'h3' => __( 'H3', 'mighty' ),
						'h4' => __( 'H4', 'mighty' ),
						'h5' => __( 'H5', 'mighty' ),
						'h6' => __( 'H6', 'mighty' ),
						'p' => __( 'P', 'mighty' ),
						'div' => __( 'DIV', 'mighty' ),
					],
				]
			);

			$this->add_control(
				'team_name_color',
				[
					'label' => __( 'Color', 'mighty' ),
					'type' => Controls_Manager::COLOR,
					'scheme' => [
						'type' => Scheme_Color::get_type(),
						'value' => Scheme_Color::COLOR_1,
					],
					'default' => '#343434',
					'selectors' => [
						'{{WRAPPER}} .mighty-team .person-name' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'team_name_typography',
					'scheme' => Scheme_Typography::TYPOGRAPHY_1,
					'selector' => '{{WRAPPER}} .mighty-team .person-name',
				]
			);

			$this->add_responsive_control(
				'team_name_align',
				[
					'label' => __( 'Alignment', 'mighty' ),
					'type' => Controls_Manager::CHOOSE,
					'options' => [
						'left' => [
							'title' => __( 'Left', 'mighty' ),
							'icon' => 'fa fa-align-left',
						],
						'center' => [
							'title' => __( 'Center', 'mighty' ),
							'icon' => 'fa fa-align-center',
						],
						'right' => [
							'title' => __( 'Right', 'mighty' ),
							'icon' => 'fa fa-align-right',
						],
						'justify' => [
							'title' => __( 'Justified', 'mighty' ),
							'icon' => 'fa fa-align-justify',
						],
					],
					'selectors' => [
						'{{WRAPPER}} .mighty-team .person-name' => 'text-align: {{VALUE}};',
					],
					'default' => 'center',
					'separator' =>'before',
				]
			);

		$this->end_controls_section();

		// Designation Styling
		$this->start_controls_section(
			'mt_team_designation_style',
			[
				'label' => __( 'Designation', 'mighty' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'designation!' => '',
				],
			]
		);

			$this->add_responsive_control(
				'team_designation_margin',
				[
					'label' => __( 'Spacing', 'mighty' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px', 'em', 'rem' ],
					'range' => [
						'px' => [
							'min' => 1,
							'max' => 200,
						],
					],
					'default' => [
						'unit' => 'px',
						'size' => 0,
					],
					'selectors' => [
						'{{WRAPPER}} .mighty-team .person-designation' => 'margin-bottom: {{SIZE}}{{UNIT}}',
					],
				]
			);

			$this->add_control(
				'team_designation_color',
				[
					'label' => __( 'Color', 'mighty' ),
					'type' => Controls_Manager::COLOR,
					'scheme' => [
						'type' => Scheme_Color::get_type(),
						'value' => Scheme_Color::COLOR_1,
					],
					'default' => '#343434',
					'selectors' => [
						'{{WRAPPER}} .mighty-team .person-designation' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'team_designation_typography',
					'scheme' => Scheme_Typography::TYPOGRAPHY_1,
					'selector' => '{{WRAPPER}} .mighty-team .person-designation',
				]
			);

			$this->add_responsive_control(
				'team_designation_align',
				[
					'label' => __( 'Alignment', 'mighty' ),
					'type' => Controls_Manager::CHOOSE,
					'options' => [
						'left' => [
							'title' => __( 'Left', 'mighty' ),
							'icon' => 'fa fa-align-left',
						],
						'center' => [
							'title' => __( 'Center', 'mighty' ),
							'icon' => 'fa fa-align-center',
						],
						'right' => [
							'title' => __( 'Right', 'mighty' ),
							'icon' => 'fa fa-align-right',
						],
						'justify' => [
							'title' => __( 'Justified', 'mighty' ),
							'icon' => 'fa fa-align-justify',
						],
					],
					'selectors' => [
						'{{WRAPPER}} .mighty-team .person-designation' => 'text-align: {{VALUE}};',
					],
					'default' => 'center',
					'separator' =>'before',
				]
			);

		$this->end_controls_section();

		// About Styling
		$this->start_controls_section(
			'mt_team_about_style',
			[
				'label' => __( 'About', 'mighty' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'about!' => '',
				],
			]
		);

			$this->add_responsive_control(
				'team_about_margin',
				[
					'label' => __( 'Spacing', 'mighty' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px', 'em', 'rem' ],
					'range' => [
						'px' => [
							'min' => 1,
							'max' => 200,
						],
					],
					'default' => [
						'unit' => 'px',
						'size' => 0,
					],
					'selectors' => [
						'{{WRAPPER}} .mighty-team .person-about' => 'margin-bottom: {{SIZE}}{{UNIT}}',
					],
				]
			);

			$this->add_control(
				'team_about_color',
				[
					'label' => __( 'Color', 'mighty' ),
					'type' => Controls_Manager::COLOR,
					'scheme' => [
						'type' => Scheme_Color::get_type(),
						'value' => Scheme_Color::COLOR_1,
					],
					'default' => '#343434',
					'selectors' => [
						'{{WRAPPER}} .mighty-team .person-about' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'team_about_typography',
					'scheme' => Scheme_Typography::TYPOGRAPHY_1,
					'selector' => '{{WRAPPER}} .mighty-team .person-about',
				]
			);

			$this->add_responsive_control(
				'team_about_align',
				[
					'label' => __( 'Alignment', 'mighty' ),
					'type' => Controls_Manager::CHOOSE,
					'options' => [
						'left' => [
							'title' => __( 'Left', 'mighty' ),
							'icon' => 'fa fa-align-left',
						],
						'center' => [
							'title' => __( 'Center', 'mighty' ),
							'icon' => 'fa fa-align-center',
						],
						'right' => [
							'title' => __( 'Right', 'mighty' ),
							'icon' => 'fa fa-align-right',
						],
						'justify' => [
							'title' => __( 'Justified', 'mighty' ),
							'icon' => 'fa fa-align-justify',
						],
					],
					'selectors' => [
						'{{WRAPPER}} .mighty-team .person-about' => 'text-align: {{VALUE}};',
					],
					'default' => 'center',
					'separator' =>'before',
				]
			);

		$this->end_controls_section();

		// Social Icons Styling
		$this->start_controls_section(
			'mt_team_socialicons_style',
			[
				'label' => __( 'Social Icons', 'mighty' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_responsive_control(
				'team_socialicons_fontsize',
				[
					'label' => __( 'Font Size', 'mighty' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px', 'em', 'rem' ],
					'range' => [
						'px' => [
							'min' => 1,
							'max' => 200,
						],
					],
					'default' => [
						'unit' => 'px',
						'size' => 15,
					],
					'selectors' => [
						'{{WRAPPER}} .mighty-team .social-icons-wrapper a i' => 'font-size: {{SIZE}}{{UNIT}}',
					],
				]
			);

			$this->add_responsive_control(
				'team_socialicons_margin',
				[
					'label' => __( 'Spacing', 'mighty' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px', 'em', 'rem' ],
					'range' => [
						'px' => [
							'min' => 1,
							'max' => 200,
						],
					],
					'default' => [
						'unit' => 'px',
						'size' => 1,
					],
					'selectors' => [
						'{{WRAPPER}} .mighty-team .social-icons-wrapper a i' => 'margin: 0 {{SIZE}}{{UNIT}}',
					],
				]
			);

			$this->add_responsive_control(
				'team_socialicons_align',
				[
					'label' => __( 'Alignment', 'mighty' ),
					'type' => Controls_Manager::CHOOSE,
					'options' => [
						'left' => [
							'title' => __( 'Left', 'mighty' ),
							'icon' => 'fa fa-align-left',
						],
						'center' => [
							'title' => __( 'Center', 'mighty' ),
							'icon' => 'fa fa-align-center',
						],
						'right' => [
							'title' => __( 'Right', 'mighty' ),
							'icon' => 'fa fa-align-right',
						],
						'justify' => [
							'title' => __( 'Justified', 'mighty' ),
							'icon' => 'fa fa-align-justify',
						],
					],
					'selectors' => [
						'{{WRAPPER}} .mighty-team .social-icons-wrapper' => 'text-align: {{VALUE}};',
					],
					'default' => 'center',
					'separator' =>'before',
				]
			);
			
			$this->add_control(
				'mt_icon_position',
				[
					'label' => __( 'Icons Position', 'mighty' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => 'after-bio',
					'options' => [
						'before-bio'  => __( 'Before Bio', 'mighty' ),
						'after-bio' => __( 'After Bio', 'mighty' ),
					],
				]
			);

			$this->add_control(
				'icon_color_type',
				[
					'label' => __( 'Icon Color Type', 'mighty' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => 'default',
					'options' => [
						'default'  => __( 'Brand Colors', 'mighty' ),
						'custom' => __( 'Custom', 'mighty' ),
					],
				]
			);

			$this->add_control(
                'icon_color',
                [
                    'label' => __( 'Icon Color', 'mighty' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'selectors' => [
						'{{WRAPPER}} .mighty-team .social-icons-wrapper a i' => 'color: {{VALUES}}',
						'{{WRAPPER}} .mighty-team .social-icons-wrapper a svg' => 'fill: {{VALUES}}'
					],
					'condition' => [
						'icon_color_type' => 'custom',
					],
                ]
			);
			
			$this->add_control(
                'icon_background',
                [
                    'label'     => __( 'Icon Background', 'mighty' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .mighty-team .social-icons-wrapper a i' => 'background-color: {{VALUES}}'
					],
					'condition' => [
						'icon_color_type' => 'custom',
					],
                ]
            );

            $this->add_control(
                'icon_hover_color',
                [
                    'label'     => __( 'Icon Hover Color', 'mighty' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .mighty-team .social-icons-wrapper a i:hover' => 'color: {{VALUES}}'
					],
					'condition' => [
						'icon_color_type' => 'custom',
					],
                ]
            );

            $this->add_control(
                'icon_hover_background',
                [
                    'label'     => __( 'Icon Hover Background', 'mighty' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .mighty-team .social-icons-wrapper a i:hover' => 'background-color: {{VALUES}}'
					],
					'condition' => [
						'icon_color_type' => 'custom',
					],
                ]
			);
			
			$this->add_control(
				'mt_border_style',
				[
					'label' => __( 'Border Style', 'mighty' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => 'none',
					'options' => [
						'none'  => __( 'None', 'mighty' ),
						'border-solid' => __( 'Solid', 'mighty' ),
						'border-dashed' => __( 'Dashed', 'mighty' ),
						'border-dotted' => __( 'Dotted', 'mighty' ),
						'border-double' => __( 'Double', 'mighty' ),
						'border-groove' => __( 'Groove', 'mighty' ),
					],
				]
			);

			$this->add_control(
				'mt_border_width',
				[
					'label' => __( 'Border Width', 'mighty' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .mighty-team .social-icons-wrapper a i' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
					'condition' => [
						'mt_border_style!' => 'none'
					]
				]
			);

			$this->add_control(
                'mt_border_color',
                [
                    'label'     => __( 'Border Color', 'mighty' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .mighty-team .social-icons-wrapper a i' => 'border-color: {{VALUES}}'
					],
					'condition' => [
						'mt_border_style!' => 'none'
					],
                ]
			);

			$this->add_control(
                'mt_border_hovercolor',
                [
                    'label'     => __( 'Border Hover Color', 'mighty' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .mighty-team .social-icons-wrapper a i:hover' => 'border-color: {{VALUES}}'
					],
					'condition' => [
						'mt_border_style!' => 'none'
					],
                ]
			);

			$this->add_control(
				'mt_border_radius',
				[
					'label' => __( 'Border Radius', 'mighty' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .mighty-team .social-icons-wrapper a i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					]
				]
			);

		$this->end_controls_section();
	}
	
	protected function render() {
		$settings = $this->get_settings_for_display();

		echo '<div class="mighty-team text-center">';

			echo '<div class="avatar-wrapper">';
				echo '<img class="person-avatar" src="' . $settings['image']['url'] .'" alt="' .$settings['name'] . '">';
			echo '</div>';

			if ( $settings['name'] !== "" ) {
				echo '<' . $settings['mt_name_htmltag'] .' class="person-name">' . $settings['name'] . '</'. $settings['mt_name_htmltag'] .'>';
			}

			if ( $settings['designation'] !== "" ) {
				echo '<div class="person-designation">' . $settings['designation'] . '</div>';
			}
			
			if ( $settings['mt_icon_position'] == "after-bio") {
				if ( $settings['about'] !== "" ) {
					echo '<div class="person-about">' . $settings['about'] . '</div>';
				}
			}
			echo '<ul class="social-icons-wrapper">';
				foreach ( $settings['mt_team_social_link_list'] as $socialprofile ) :
					echo '<li class="elementor-repeater-item-'. $socialprofile['_id'] .'" >
					<a href="'. esc_url( $socialprofile['mt_social_link'] ) .'">';
					\Elementor\Icons_Manager::render_icon( $socialprofile['mt_social_icon'], [ 'aria-hidden' => 'true', 'class' => $settings['mt_border_style'] ] );
					echo '</a></li>';
				endforeach;
			echo '</ul>';
			if ( $settings['mt_icon_position'] == "before-bio") {
				if ( $settings['about'] !== "" ) {
					echo '<div class="person-about">' . $settings['about'] . '</div>';
				}
			}
		echo '</div>';
	}
	
	protected function _content_template() {
	}
}
