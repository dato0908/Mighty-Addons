<?php
namespace MightyAddons\Widgets;

use \MightyAddons\Classes\HelperFunctions as Helper;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Border;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Elementor MT_Mailchimp
 *
 * Elementor widget for MT_Mailchimp.
 *
 * @since 1.3.3
 */
class MT_Mailchimp extends Widget_Base {
	
	public function get_name() {
		return 'mt-mailchimp';
	}
	
	public function get_title() {
		return __( 'Mailchimp', 'mighty' );
	}
	
	public function get_icon() {
		return 'mf mf-testimonial';
	}

	public function get_categories() {
		return [ 'mighty-addons' ];
	}

	public function get_keywords() {
		return [ 'mighty', 'mail', 'chimp', 'form' ];
    }

	public function get_script_depends() {
		return [ 'mt-mailchimp' ];
	}

	public function get_style_depends() {
		return [ 'mt-common', 'mt-mailchimp' ];
	}
	
	protected function _register_controls() {
		
		$this->start_controls_section(
			'section_mailchimp',
			[
				'label' => __( 'Mailchimp', 'mighty' ),
			]
		);

			$this->add_control(
				'mailchimp_list',
				[
					'label' => __( 'Choose List', 'mighty' ),
					'type' => Controls_Manager::SELECT,
					'options' => array_merge( array( 0 => 'Select a List'), Helper::mailchimpLists() ),
					'default' => '0'
				]
			);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_mc_fields',
			[
				'label' => __( 'Fields', 'mighty' ),
			]
		);

			$this->add_control(
				'email_label',
				[
					'label' => __( 'Email Label', 'mighty' ),
					'type' => Controls_Manager::TEXT,
					'default' => __( 'Your Email', 'mighty' ),
					'placeholder' => __( 'Type your title here', 'mighty' ),
				]
			);

			$this->add_responsive_control(
				'email_column_width',
				[
					'label' => __( 'Column Width', 'mighty' ),
					'type' => Controls_Manager::SELECT,
					'options' => [
						'20'  => __( '20%', 'mighty' ),
						'25'  => __( '25%', 'mighty' ),
						'33'  => __( '33%', 'mighty' ),
						'40'  => __( '40%', 'mighty' ),
						'50'  => __( '50%', 'mighty' ),
						'60'  => __( '60%', 'mighty' ),
						'66'  => __( '66%', 'mighty' ),
						'75'  => __( '75%', 'mighty' ),
						'80'  => __( '80%', 'mighty' ),
						'100'  => __( '100%', 'mighty' ),
					],
					'default' => __( '50', 'mighty' ),
					'selectors' => [
						'{{ WRAPPER }} .mighty-mailchimp-wrapper .mailchimp-email' => 'width: {{VALUE}}%'
					]
				]
			);

			// First Name
			$this->add_control(
				'enable_first_name',
				[
					'label' => __( 'Enable First Name', 'mighty' ),
					'type' => Controls_Manager::SWITCHER,
					'label_on' => __( 'Enable', 'mighty' ),
					'label_off' => __( 'Disable', 'mighty' ),
					'return_value' => 'yes',
				]
			);

			$this->add_control(
				'fname_label',
				[
					'label' => __( 'First Name', 'mighty' ),
					'type' => Controls_Manager::TEXT,
					'placeholder' => __( 'Type your First Name', 'mighty' ),
					'default' => __( 'First Name', 'mighty' ),
					'condition' => [
						'enable_first_name' => 'yes'
					]
				]
			);

			$this->add_responsive_control(
				'fname_column_width',
				[
					'label' => __( 'First Name Column Width', 'mighty' ),
					'type' => Controls_Manager::SELECT,
					'options' => [
						'20'  => __( '20%', 'mighty' ),
						'25'  => __( '25%', 'mighty' ),
						'33'  => __( '33%', 'mighty' ),
						'40'  => __( '40%', 'mighty' ),
						'50'  => __( '50%', 'mighty' ),
						'60'  => __( '60%', 'mighty' ),
						'66'  => __( '66%', 'mighty' ),
						'75'  => __( '75%', 'mighty' ),
						'80'  => __( '80%', 'mighty' ),
						'100'  => __( '100%', 'mighty' ),
					],
					'default' => __( '50', 'mighty' ),
					'selectors' => [
						'{{ WRAPPER }} .mighty-mailchimp-wrapper .mailchimp-fname' => 'width: {{VALUE}}%'
					],
					'condition' => [
						'enable_first_name' => 'yes'
					]
				]
			);

			$this->add_control(
				'fname_required',
				[
					'label' => __( 'First Name Required', 'mighty' ),
					'type' => Controls_Manager::SWITCHER,
					'label_on' => __( 'Enable', 'mighty' ),
					'label_off' => __( 'Disable', 'mighty' ),
					'return_value' => 'yes',
					'condition' => [
						'enable_first_name' => 'yes'
					]
				]
			);

			// Last Name
			$this->add_control(
				'enable_last_name',
				[
					'label' => __( 'Enable Last Name', 'mighty' ),
					'type' => Controls_Manager::SWITCHER,
					'label_on' => __( 'Enable', 'mighty' ),
					'label_off' => __( 'Disable', 'mighty' ),
					'return_value' => 'yes',
				]
			);

			$this->add_control(
				'lname_label',
				[
					'label' => __( 'Last Name', 'mighty' ),
					'type' => Controls_Manager::TEXT,
					'placeholder' => __( 'Type your Last Name', 'mighty' ),
					'default' => __( 'Last Name', 'mighty' ),
					'condition' => [
						'enable_last_name' => 'yes'
					]
				]
			);

			$this->add_responsive_control(
				'lname_column_width',
				[
					'label' => __( 'Last Name Column Width', 'mighty' ),
					'type' => Controls_Manager::SELECT,
					'options' => [
						'20'  => __( '20%', 'mighty' ),
						'25'  => __( '25%', 'mighty' ),
						'33'  => __( '33%', 'mighty' ),
						'40'  => __( '40%', 'mighty' ),
						'50'  => __( '50%', 'mighty' ),
						'60'  => __( '60%', 'mighty' ),
						'66'  => __( '66%', 'mighty' ),
						'75'  => __( '75%', 'mighty' ),
						'80'  => __( '80%', 'mighty' ),
						'100'  => __( '100%', 'mighty' ),
					],
					'default' => __( '50', 'mighty' ),
					'selectors' => [
						'{{ WRAPPER }} .mighty-mailchimp-wrapper .mailchimp-lname' => 'width: {{VALUE}}%'
					],
					'condition' => [
						'enable_last_name' => 'yes'
					]
				]
			);

			$this->add_control(
				'lname_required',
				[
					'label' => __( 'Required', 'mighty' ),
					'type' => Controls_Manager::SWITCHER,
					'label_on' => __( 'Enable', 'mighty' ),
					'label_off' => __( 'Disable', 'mighty' ),
					'return_value' => 'yes',
					'condition' => [
						'enable_last_name' => 'yes'
					]
				]
			);

			// Terms
			$this->add_control(
				'enable_terms',
				[
					'label' => __( 'Agree To Terms', 'mighty' ),
					'type' => Controls_Manager::SWITCHER,
					'label_on' => __( 'Enable', 'mighty' ),
					'label_off' => __( 'Disable', 'mighty' ),
					'return_value' => 'yes',
				]
			);

			$this->add_control(
				'terms_label',
				[
					'label' => __( 'Acceptance Text', 'mighty' ),
					'type' => Controls_Manager::WYSIWYG,
					'default' => __( 'I have read and agree to the terms & conditions.', 'mighty' ),
					'condition' => [
						'enable_terms' => 'yes'
					]
				]
			);

			$this->add_control(
				'checked_by_default',
				[
					'label' => __( 'Checked By Default', 'mighty' ),
					'type' => Controls_Manager::SWITCHER,
					'label_on' => __( 'Yes', 'mighty' ),
					'label_off' => __( 'No', 'mighty' ),
					'return_value' => 'yes',
					'condition' => [
						'enable_terms' => 'yes'
					]
				]
			);

			$this->add_control(
				'terms_required',
				[
					'label' => __( 'Required', 'mighty' ),
					'type' => Controls_Manager::SWITCHER,
					'label_on' => __( 'Enable', 'mighty' ),
					'label_off' => __( 'Disable', 'mighty' ),
					'return_value' => 'yes',
					'condition' => [
						'enable_terms' => 'yes'
					]
				]
			);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_mc_submit',
			[
				'label' => __( 'Submit', 'mighty' ),
			]
		);

			$this->add_control(
				'button_text',
				[
					'label' => __( 'Button Text', 'mighty' ),
					'type' => Controls_Manager::TEXT,
					'placeholder' => __( 'Button Text', 'mighty' ),
					'default' => __( 'Subscribe Now', 'mighty' ),
				]
			);

			$this->add_control(
				'loading_text',
				[
					'label' => __( 'Loading Text', 'mighty' ),
					'type' => Controls_Manager::TEXT,
					'placeholder' => __( 'Loading Text', 'mighty' ),
					'default' => __( 'Subscribing...', 'mighty' ),
				]
			);

			$this->add_responsive_control(
				'button_column_width',
				[
					'label' => __( 'Submit Column Width', 'mighty' ),
					'type' => Controls_Manager::SELECT,
					'options' => [
						'20'  => __( '20%', 'mighty' ),
						'25'  => __( '25%', 'mighty' ),
						'33'  => __( '33%', 'mighty' ),
						'40'  => __( '40%', 'mighty' ),
						'50'  => __( '50%', 'mighty' ),
						'60'  => __( '60%', 'mighty' ),
						'66'  => __( '66%', 'mighty' ),
						'75'  => __( '75%', 'mighty' ),
						'80'  => __( '80%', 'mighty' ),
						'100' => __( '100%', 'mighty' ),
					],
					'default' => __( '50', 'mighty' ),
					'selectors' => [
						'{{ WRAPPER }} .mighty-mailchimp-wrapper .mailchimp-submit' => 'width: {{VALUE}}%'
					],
				]
			);

			$this->add_control(
				'button_size',
				[
					'label' => __( 'Size', 'mighty' ),
					'type' => Controls_Manager::SELECT,
					'options' => [
						'ma-btn-sm'  => __( 'Small', 'mighty' ),
						'ma-btn-md'  => __( 'Medium', 'mighty' ),
						'ma-btn-lg'  => __( 'Large', 'mighty' )
					],
					'default' => 'ma-btn-md'
				]
			);

			$this->add_control(
				'enable_icon',
				[
					'label' => __( 'Enable Icon', 'mighty' ),
					'type' => Controls_Manager::SWITCHER,
					'label_on' => __( 'Yes', 'mighty' ),
					'label_off' => __( 'No', 'mighty' ),
					'return_value' => 'yes',
				]
			);

			$this->add_control(
				'button_icon',
				[
					'label' => __( 'Icon', 'mighty' ),
					'type' => Controls_Manager::ICONS,
					'default' => [
						'value' => 'fas fa-star',
						'library' => 'solid',
					],
					'condition' => [
						'enable_icon' => 'yes'
					]
				]
			);

			$this->add_responsive_control(
				'icon_position',
				[
					'label' => __( 'Icon Position', 'mighty' ),
					'type' => Controls_Manager::SELECT,
					'options' => [
						'icon-before'  => __( 'Before', 'mighty' ),
						'icon-after'  => __( 'After', 'mighty' ),
					],
					'default' => 'icon-before',
					'condition' => [
						'enable_icon' => 'yes'
					]
				]
			);

			$this->add_control(
				'icon_spacing',
				[
					'label' => __( 'Icon Spacing', 'mighty' ),
					'type' =>  Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 50,
							'step' => 1,
						]
					],
					'default' => [
						'unit' => 'px',
						'size' => 10,
					],
					'selectors' => [
						'{{ WRAPPER }} .mighty-mailchimp-wrapper .mailchimp-field .icon-before .submit-icon' => 'margin-right: {{SIZE}}{{UNIT}}',
						'{{ WRAPPER }} .mighty-mailchimp-wrapper .mailchimp-field .icon-after .submit-icon' => 'margin-left: {{SIZE}}{{UNIT}}'
					],
					'condition' => [
						'enable_icon' => 'yes'
					]
				]
			);

			$this->add_control(
				'after_submission',
				[
					'label' => __( 'After submission', 'mighty' ),
					'type' => Controls_Manager::SELECT,
					'options' => [
						'same' => __( 'Same Page', 'mighty' ),
						'different' => __( 'Different Page', 'mighty' ),
					],
					'default' => 'same',
					'description' => __( 'Keep user on the same page and show notification or redirect to different page after submission.')
				]
			);

			$this->add_control(
				'page_link',
				[
					'label' => __( 'Page Link', 'mighty' ),
					'type' => \Elementor\Controls_Manager::URL,
					'placeholder' => __( 'https://example.com', 'mighty' ),
					'show_external' => false,
					'default' => [
						'url' => '',
						'is_external' => false,
						'nofollow' => false,
					],
					'condition' => [
						'after_submission' => 'different'
					]
				]
			);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_mc_message',
			[
				'label' => __( 'Message', 'mighty' ),
			]
		);

			$this->add_control(
				'error_message',
				[
					'label' => __( 'Error Message', 'mighty' ),
					'type' => Controls_Manager::TEXT,
					'placeholder' => __( 'Error Message', 'mighty' ),
					'default' => __( 'Something went wrong!', 'mighty' )
				]
			);

			$this->add_control(
				'success_message',
				[
					'label' => __( 'Successful Message', 'mighty' ),
					'type' => Controls_Manager::TEXT,
					'placeholder' => __( 'Success Message', 'mighty' ),
					'default' => __( 'You are subscribed!', 'mighty' )
				]
			);

		$this->end_controls_section();

		// Styling
		$this->start_controls_section(
			'section_general_styling',
			[
				'label' => __( 'General', 'mighty' ),
				'tab' =>  Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_group_control(
				Group_Control_Background::get_type(),
				[
					'name' => 'mc_background',
					'label' => __( 'Background', 'mighty' ),
					'types' => [ 'classic', 'gradient' ],
					'selector' => '{{ WRAPPER }} .mighty-mailchimp-wrapper',
				]
			);

			$this->add_responsive_control(
				'mc_margin',
				[
					'label' => __( 'Margin', 'mighty' ),
					'type' =>  Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{ WRAPPER }} .mighty-mailchimp-wrapper .mighty-maichimp-form' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'mc_padding',
				[
					'label' => __( 'Padding', 'mighty' ),
					'type' =>  Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{ WRAPPER }} .mighty-mailchimp-wrapper .mighty-maichimp-form' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' => 'mc_border',
					'label' => __( 'Border', 'mighty' ),
					'selector' => '{{ WRAPPER }} .mighty-mailchimp-wrapper',
				]
			);

			$this->add_responsive_control(
				'mc_border_radius',
				[
					'label' => __( 'Border Radius', 'mighty' ),
					'type' =>  Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{ WRAPPER }} .mighty-mailchimp-wrapper' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Box_Shadow::get_type(),
				[
					'name' => 'mc_box_shadow',
					'label' => __( 'Box Shadow', 'mighty' ),
					'selector' => '{{ WRAPPER }} .mighty-mailchimp-wrapper',
				]
			);

		$this->end_controls_section();


		$this->start_controls_section(
			'section_fields_styling',
			[
				'label' => __( 'Form Fields', 'mighty' ),
				'tab' =>  Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_control(
				'fields_columns_gap',
				[
					'label' => __( 'Columns Gap', 'mighty' ),
					'type' =>  Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 1000,
							'step' => 5,
						],
						'%' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'default' => [
						'unit' => '%',
						'size' => 50,
					],
					'selectors' => [
						'{{ WRAPPER }} .mighty-mailchimp-wrapper .mighty-maichimp-form .mailchimp-field' => 'margin-top: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_control(
				'fields_rows_gap',
				[
					'label' => __( 'Rows Gap', 'mighty' ),
					'type' =>  Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 1000,
							'step' => 5,
						],
						'%' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'default' => [
						'unit' => '%',
						'size' => 50,
					],
					'selectors' => [
						'' => 'margin: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->start_controls_tabs(
				'form_styling'
			);

				$this->start_controls_tab(
					'form_label',
					[
						'label' => __( 'Label', 'mighty' ),
					]
				);

					$this->add_control(
						'label_spacing',
						[
							'label' => __( 'Spacing', 'mighty' ),
							'type' =>  Controls_Manager::SLIDER,
							'size_units' => [ 'px', '%' ],
							'range' => [
								'px' => [
									'min' => 0,
									'max' => 1000,
									'step' => 5,
								],
								'%' => [
									'min' => 0,
									'max' => 100,
								],
							],
							'default' => [
								'unit' => 'px',
								'size' => 10,
							],
							'selectors' => [
								'{{ WRAPPER }} .mighty-mailchimp-wrapper .mighty-maichimp-form label' => 'margin-bottom: {{SIZE}}{{UNIT}};',
							],
						]
					);

					$this->add_control(
						'label_color',
						[
							'label' => __( 'Label Color', 'mighty' ),
							'type' => Controls_Manager::COLOR,
							'selectors' => [
								'{{ WRAPPER }} .mighty-mailchimp-wrapper .mighty-maichimp-form' => 'color: {{VALUE}}',
							],
						]
					);

					$this->add_group_control(
						\Elementor\Group_Control_Typography::get_type(),
						[
							'name' => 'label_typography',
							'label' => __( 'Typography', 'mighty' ),
							'selector' => '{{ WRAPPER }} .mighty-mailchimp-wrapper .mighty-maichimp-form label',
						]
					);

				$this->end_controls_tab();

				$this->start_controls_tab(
					'form_fields',
					[
						'label' => __( 'Fields', 'mighty' ),
					]
				);

					$this->add_control(
						'field_text_color',
						[
							'label' => __( 'Text Color', 'mighty' ),
							'type' => Controls_Manager::COLOR,
							'selectors' => [
								'{{ WRAPPER }} .mighty-mailchimp-wrapper .mighty-maichimp-form input' => 'color: {{VALUE}}',
							],
						]
					);

					$this->add_control(
						'field_placeholder_color',
						[
							'label' => __( 'Placeholder Color', 'mighty' ),
							'type' => Controls_Manager::COLOR,
							'selectors' => [
								'{{ WRAPPER }} .mighty-mailchimp-wrapper .mighty-maichimp-form input::placeholder' => 'color: {{VALUE}}',
							],
						]
					);

					$this->add_group_control(
						\Elementor\Group_Control_Typography::get_type(),
						[
							'name' => 'field_typography',
							'label' => __( 'Typography', 'mighty' ),
							'selector' => '{{ WRAPPER }} .mighty-mailchimp-wrapper .mighty-maichimp-form input',
						]
					);

					$this->add_control(
						'field_padding',
						[
							'label' => __( 'Padding', 'mighty' ),
							'type' =>  Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', '%', 'em' ],
							'selectors' => [
								'{{ WRAPPER }} .mighty-mailchimp-wrapper .mighty-maichimp-form input' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);

					$this->add_group_control(
						Group_Control_Background::get_type(),
						[
							'name' => 'field_background',
							'label' => __( 'Background', 'mighty' ),
							'types' => [ 'classic' ],
							'selector' => '{{ WRAPPER }} .mighty-mailchimp-wrapper .mighty-maichimp-form input',
						]
					);

					$this->add_control(
						'field_border_color',
						[
							'label' => __( 'Border Color', 'mighty' ),
							'type' => Controls_Manager::COLOR,
							'selectors' => [
								'{{ WRAPPER }} .mighty-mailchimp-wrapper .mighty-maichimp-form input' => 'border-color: {{VALUE}}',
							],
						]
					);

					$this->add_responsive_control(
						'field_border_width',
						[
							'label' => __( 'Border Width', 'mighty' ),
							'type' =>  Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', '%', 'em' ],
							'selectors' => [
								'{{ WRAPPER }} .mighty-mailchimp-wrapper .mighty-maichimp-form input' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);

					$this->add_responsive_control(
						'field_border_radius',
						[
							'label' => __( 'Border Radius', 'mighty' ),
							'type' =>  Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', '%', 'em' ],
							'selectors' => [
								'{{ WRAPPER }} .mighty-mailchimp-wrapper .mighty-maichimp-form input' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);

				$this->end_controls_tab();

			$this->end_controls_tabs();

		$this->end_controls_section();


		$this->start_controls_section(
			'section_button_styling',
			[
				'label' => __( 'Button', 'mighty' ),
				'tab' =>  Controls_Manager::TAB_STYLE,
			]
		);

			$this->start_controls_tabs(
				'button_styling'
			);

				$this->start_controls_tab(
					'button_normal',
					[
						'label' => __( 'Normal', 'mighty' ),
					]
				);

					$this->add_control(
						'button_bg_color',
						[
							'label' => __( 'Background Color', 'mighty' ),
							'type' => Controls_Manager::COLOR,
							'selectors' => [
								'{{ WRAPPER }} .mighty-mailchimp-wrapper .mighty-maichimp-form button' => 'background-color: {{VALUE}}',
							],
						]
					);

					$this->add_control(
						'button_text_color',
						[
							'label' => __( 'Text Color', 'mighty' ),
							'type' => Controls_Manager::COLOR,
							'selectors' => [
								'{{ WRAPPER }} .mighty-mailchimp-wrapper .mighty-maichimp-form button' => 'color: {{VALUE}}',
							],
						]
					);

					$this->add_group_control(
						Group_Control_Typography::get_type(),
						[
							'name' => 'button_typography',
							'selector' => '{{ WRAPPER }} .mighty-mailchimp-wrapper .mighty-maichimp-form button',
						]
					);
					
					$this->add_group_control(
						Group_Control_Border::get_type(),
						[
							'name' => 'button_border',
							'label' => __( 'Border', 'mighty' ),
							'selector' => '{{ WRAPPER }} .mighty-mailchimp-wrapper .mighty-maichimp-form button',
						]
					);

					$this->add_responsive_control(
						'button_border_radius',
						[
							'label' => __( 'Border Radius', 'mighty' ),
							'type' =>  Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', '%', 'em' ],
							'selectors' => [
								'{{ WRAPPER }} .mighty-mailchimp-wrapper .mighty-maichimp-form button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);
		
					$this->add_group_control(
						\Elementor\Group_Control_Box_Shadow::get_type(),
						[
							'name' => 'button_box_shadow',
							'label' => __( 'Box Shadow', 'mighty' ),
							'selector' => '{{ WRAPPER }} .mighty-mailchimp-wrapper .mighty-maichimp-form button',
						]
					);
					
					$this->add_control(
						'button_padding',
						[
							'label' => __( 'Padding', 'mighty' ),
							'type' =>  Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', '%', 'em' ],
							'selectors' => [
								'{{ WRAPPER }} .mighty-mailchimp-wrapper .mighty-maichimp-form button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);

				$this->end_controls_tab();


				$this->start_controls_tab(
					'button_hover',
					[
						'label' => __( 'Hover', 'mighty' ),
					]
				);

					$this->add_group_control(
						Group_Control_Background::get_type(),
						[
							'name' => 'button_hover_background',
							'label' => __( 'Background Color', 'mighty' ),
							'types' => [ 'classic' ],
							'selector' => '{{ WRAPPER }} .mighty-mailchimp-wrapper .mighty-maichimp-form button:hover',
						]
					);

					$this->add_control(
						'button_text_hover_color',
						[
							'label' => __( 'Text Color', 'mighty' ),
							'type' => Controls_Manager::COLOR,
							'selectors' => [
								'{{ WRAPPER }} .mighty-mailchimp-wrapper .mighty-maichimp-form button:hover' => 'color: {{VALUE}}',
							],
						]
					);

					$this->add_control(
						'button_hover_animation',
						[
							'label' => __( 'Hover Animation', 'mighty' ),
							'type' => Controls_Manager::HOVER_ANIMATION,
							'prefix_class' => 'mighty-animation-',
						]
					);

				$this->end_controls_tab();

			$this->end_controls_tabs();

		$this->end_controls_section();

		$this->start_controls_section(
			'section_message_styling',
			[
				'label' => __( 'Message', 'mighty' ),
				'tab' =>  Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'message_typography',
					'label' => __( 'Typography', 'mighty' ),
					'selector' => '{{ WRAPPER }} .mighty-mailchimp-wrapper .mighty-maichimp-form .mailchimp-message',
				]
			);

			$this->add_control(
				'success_message_color',
				[
					'label' => __( 'Success Message Color', 'mighty' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{ WRAPPER }} .mighty-mailchimp-wrapper .mighty-maichimp-form .mailchimp-success' => 'color: {{VALUE}}',
					],
				]
			);

			$this->add_control(
				'error_message_color',
				[
					'label' => __( 'Error Message Color', 'mighty' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{ WRAPPER }} .mighty-mailchimp-wrapper .mighty-maichimp-form .mailchimp-error' => 'color: {{VALUE}}',
					],
				]
			);

			$this->add_control(
				'inline_message_color',
				[
					'label' => __( 'Inline Message Color', 'mighty' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'' => 'color: {{VALUE}}',
					],
				]
			);

		$this->end_controls_section();

	}
	
	protected function render() {
		$settings = $this->get_settings_for_display();
		
		$this->add_render_attribute( 'mt-mailchimp', 'class', 'mighty-maichimp-form' );
		$this->add_render_attribute( 'mt-mailchimp', 'id', 'mighty-mailchimp-form-' . esc_attr( $this->get_id() ) );
		$this->add_render_attribute( 'mt-mailchimp', 'method', 'POST' );
		$this->add_render_attribute( 'mt-mailchimp', 'data-mclist', $settings['mailchimp_list'] );
		$this->add_render_attribute( 'mt-mailchimp', 'data-error-msg', $settings['error_message'] );
		$this->add_render_attribute( 'mt-mailchimp', 'data-success-msg', $settings['success_message'] );
		$this->add_render_attribute( 'mt-mailchimp', 'data-after-submission', $settings['after_submission'] );
		if ( $settings['after_submission'] == "different" ) {
			$this->add_render_attribute( 'mt-mailchimp', 'data-link', $settings['page_link']['url'] );
			$this->add_render_attribute( 'mt-mailchimp', 'data-external', $settings['page_link']['is_external'] );
			$this->add_render_attribute( 'mt-mailchimp', 'data-nofollow', $settings['page_link']['nofollow'] );
		}
		
		if ( ! empty( $settings['mailchimp_list'] ) ) {

			echo "<div class='mighty-mailchimp-wrapper'>";
			echo "<form method='post' " . $this->get_render_attribute_string('mt-mailchimp') . ">";
			?>

			<p>
				<label for="email-<?php echo $this->get_id(); ?>"><?php echo $settings['email_label']; ?></label><br>
				<span class="mailchimp-field">
					<input id="email-<?php echo $this->get_id(); ?>" type="email" name="email" class="mailchimp-email" placeholder="Your Email" required />
				</span>
			</p>

			<?php if ( $settings['enable_first_name'] == "yes" ) : ?>
			<p>
				<label for="fname-<?php echo $this->get_id(); ?>"><?php echo $settings['fname_label']; ?></label><br>
				<span class="mailchimp-field">
					<input id="fname-<?php echo $this->get_id(); ?>" type="text" name="fname" class="mailchimp-fname" <?php echo $settings['fname_required'] == "yes" ? 'required' : ''; ?> />
				</span>
			</p>
			<?php endif; ?>

			<?php if ( $settings['enable_last_name'] == "yes" ) : ?>
			<p>
				<label for="lname-<?php echo $this->get_id(); ?>"><?php echo $settings['lname_label']; ?></label><br>
				<span class="mailchimp-field">
					<input id="lname-<?php echo $this->get_id(); ?>" type="text" name="lname" class="mailchimp-lname" <?php echo $settings['lname_required'] == "yes" ? 'required' : ''; ?> />
				</span>
			</p>
			<?php endif; ?>

			<?php if ( $settings['enable_terms'] == "yes" ) : ?>
			<p>
				<span class="mailchimp-field">
					<input id="terms-<?php echo $this->get_id(); ?>" type="checkbox" name="terms" class="mailchimp-terms" <?php echo $settings['checked_by_default'] == "yes" ? ' checked' : ''; ?><?php echo $settings['terms_required'] == "yes" ? ' required' : ''; ?> />
				</span>
				<label for="terms-<?php echo $this->get_id(); ?>"><?php echo $settings['terms_label']; ?></label>
			</p>
			<?php endif; ?>

			<p>
				<span class="mailchimp-field">
					<button class="mailchimp-submit <?php echo "elementor-animation-".$settings['button_hover_animation']; ?> <?php echo $settings['enable_icon'] == "yes" ? $settings['icon_position'] : ''; ?> <?php echo $settings['button_size']; ?>" type="submit">
						<?php if ( $settings['enable_icon'] == "yes" ) : ?>
						<span class="submit-icon">
							<?php \Elementor\Icons_Manager::render_icon( $settings['button_icon'], [ 'aria-hidden' => 'true' ] ); ?>
						</span>
						<?php endif; ?>
						<?php echo $settings['button_text']; ?>
					</button>
				</span>
			</p>

			<?php
			echo "</form>";
			echo "</div>";

		} else {
			echo "<h3 align='center'> Choose a Mailchimp list to get started. </h3>";
		}
		
	}
	
	protected function _content_template() {
	}
}
