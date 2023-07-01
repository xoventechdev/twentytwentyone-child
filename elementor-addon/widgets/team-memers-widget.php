<?php


class WSE_Team_Members extends \Elementor\Widget_Base {

	public function get_name() {
		return 'team_members';
	}

	public function get_title() {
		return esc_html__( 'Team Member', 'elementor-addon' );
	}

	public function get_icon() {
		return 'eicon-user-circle-o';
	}

	public function get_categories() {
		return [ 'basic' ];
	}

	public function get_keywords() {
		return [ 'team', 'member' ];
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
			'name',
			[
				'label' => esc_html__( 'Name', 'elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Hosen', 'elementor-addon' ),
			]
		);
		
		$this->add_control(
			'designation',
			[
				'label' => esc_html__( 'Designation', 'elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'CEO', 'elementor-addon' ),
			]
		);
		
		$this->add_control(
			'about',
			[
				'label' => esc_html__( 'About', 'elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'About this man', 'elementor-addon' ),
			]
		);
		
		
		$this->add_control(
            'image',
            [
                'label' => esc_html__( 'Photo', 'elementor-addon' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );
        
        
        $this->add_control(
        	'style',
        	[
        		'label' => esc_html__( 'Style', 'elementor-addon' ),
        		'type' => \Elementor\Controls_Manager::SELECT,
        		'default' => 'style1',
        		'options' => [
        			'style1' => esc_html__( 'Style 1', 'elementor-addon' ),
        			'style2' => esc_html__( 'Style 2', 'elementor-addon' ),
        			'style3' => esc_html__( 'Style 3', 'elementor-addon' ),
        		],
        	]
        );
    	
	
	    $this->add_control(
        	'social_links',
        	[
        		'label' => esc_html__( 'Social Link', 'elementor-addon' ),
        		'type' => \Elementor\Controls_Manager::REPEATER,
        		'fields' => [
        			[
        				'name' => 'icon',
        				'label' => esc_html__( 'Icon', 'elementor-addon' ),
        				'type' => \Elementor\Controls_Manager::ICONS,
        			],
        			[
        				'name' => 'link',
        				'label' => esc_html__( 'Link', 'elementor-addon' ),
        				'type' => \Elementor\Controls_Manager::URL,
        				'placeholder' => esc_html__( 'https://example.com', 'elementor-addon' ),
        			],
        		]
        	]
        );


    

		$this->end_controls_section();
	}
		

	protected function render() {
	    $settings = $this->get_settings_for_display();
		?>


        <?php if($settings['style'] == 'style1') : ?>

            	<div class="card  border-0 shadow-lg pt-5 my-5 position-relative">
				    <div class="card-body p-4">
					    <div class="member-profile position-absolute w-100 text-center">
					        <div class="rounded-circle mx-auto d-inline-block shadow-sm">
					            <?php echo wp_get_attachment_image($settings['image']['id']); ?>
					            </div>
				        </div>
					    <div class="card-text pt-1">
						    <h5 class="member-name mb-0 text-center text-primary font-weight-bold"><?php echo $settings['name']; ?></h5>
						    <div class="mb-3 text-center text-dark designation-text"><?php echo $settings['designation']; ?></div>
						    <div class="text-secondary about-text"><?php echo $settings['about']; ?></div>
					    </div>
				    </div><!--//card-body-->
				    <div class="card-footer theme-bg-primary border-0 text-center">
					    <ul class="social-list list-inline mb-0 mx-auto">
					        <?php
					        foreach($settings['social_links'] as $link):
					         ?>
						    <li class="list-inline-item"><a class="text-dark" href="<?php echo $link['link']['url'] ?>"><i class="<?php echo $link['icon']['value'] ?>"></i></a></li>
						    <?php endforeach; ?>
			            </ul>
				    </div>
			    </div>
			    
        <?php endif; ?>
        <?php if($settings['style'] == 'style2') :
        ?>
		
		<div class="col">
            <div class="card radius-15 bg-primary">
                <div class="card-body text-center">
                    <div class="p-4 radius-15">
                        <img src="<?php echo $settings['image']['url'];  ?>" width="110" height="110" class="rounded-circle shadow p-1 bg-white" alt="">
                        <h4 class="mb-0 mt-5 text-dark"><?php echo $settings['name']; ?></h4>
                        <p class="mb-3 text-white designation-text "><?php echo $settings['designation']; ?></p>
                        <p class="about-text"><?php echo $settings['about']; ?></p>
                        <div class="list-inline contacts-social mt-3 mb-3"> 
                        
                            <?php
					        foreach($settings['social_links'] as $link):
					         ?>
					         <a href="<?php echo $link['link']['url'] ?>" class="list-inline-item border-0"><i class="<?php echo $link['icon']['value'] ?>"></i></a>
					       
						    <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
     
        <?php endif; ?>
        <?php if($settings['style'] == 'style3') :
        ?>
	            <div class="team-item">
                    <div class="mb-30 position-relative d-flex align-items-center">
                            <span class="socials d-inline-block">
                                <?php
    					        foreach($settings['social_links'] as $link):
    					         ?>
    					         <a href="<?php echo $link['link']['url'] ?>" class="list-inline-item border-0"><i class="<?php echo $link['icon']['value'] ?>"></i></a>
    					       
    						    <?php endforeach; ?>
                            </span>
                        <span class="img-holder d-inline-block">
                                <img src="<?php echo $settings['image']['url'];  ?>" alt="Team">
                            </span>
                    </div>
                    <div class="team-content">
                        <h5 class="mb-2"><?php echo $settings['name']; ?></h5>
                        <p class="text-uppercase mb-0 style3-d"><?php echo $settings['designation']; ?></p>
                        <p class="about-text"><?php echo $settings['about']; ?></p>
                    </div>
                </div>
	
        <?php endif; 
	}
}


