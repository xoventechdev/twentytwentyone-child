<?php


class WSE_Hello_World_Widget_1 extends \Elementor\Widget_Base {

	public function get_name() {
		return 'hello_world_widget_1';
	}

	public function get_title() {
		return esc_html__( 'WSE Title', 'elementor-addon' );
	}

	public function get_icon() {
		return 'eicon-site-title';
	}

	public function get_categories() {
		return [ 'basic' ];
	}

	public function get_keywords() {
		return [ 'hello', 'world' ];
	}
	

		
	protected function register_controls() {

		$this->start_controls_section(
			'content',
			[
				'label' => esc_html__( 'Content', 'elementor-addon' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'title',
			[
				'label' => esc_html__( 'Title', 'elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Lorem lorem', 'elementor-addon' ),
			]
		);
		
		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Text Color', 'elementor-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wse-title' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
        'font_size',
        [
            'label' => esc_html__( 'Font Size', 'elementor-addon' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => ['px', 'em', '%'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 100,
                    'step' => 1,
                ],
                'em' => [
                    'min' => 0,
                    'max' => 10,
                    'step' => 0.1,
                ],
                '%' => [
                    'min' => 0,
                    'max' => 500,
                    'step' => 1,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .wse-title' => 'font-size: {{SIZE}}{{UNIT}};',
            ],
        ]
    );

		$this->end_controls_section();
	}
		

	protected function render() {
	    $settings = $this->get_settings_for_display();
		?>

		<p class='wse-title'><?php echo $settings['title']; ?></p>

		<?php
	}
}


