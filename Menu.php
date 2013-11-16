<?php

	function MenuPrincipal($langage){
		//$menus = get_nav_menu_locations();

		//$menu = $menus['Menu_principal'];
		$liste = wp_get_nav_menu_items('13');
		//$liste = wp_get_nav_menu_items($menu);
		foreach($liste as $elm){
			$cl = (EstMenuCourant($elm)) ? 'active' : '';
			$r .= '<li class="'.$cl.'"><a href="'.$elm->url.'" class="bouton-nav">'.$elm->title.'</a></li>';
			
		}
	
		echo $r;
	}
	function EstMenuCourant($elm){
		global $post;
		$actif = false;
		if(is_singular()&&(		
				($post->ID==$elm->object_id||$post->post_type==$elm->post_type)	
				||(0!=$post->post_parent&&$post->post_parent==$elm->object_id)
				)){			
			$actif = true;		
		}		
		elseif(is_home()&&get_option('page_for_posts')==$elm->object_id){		
			$actif = true;;			
		}	
		elseif('post'==$post->post_type&&get_option('page_for_posts')==$elm->object_id){		
			$actif = true;;			
		}			
		elseif('museomix'==$post->post_type&&'1074'==$elm->object_id){		
			$actif = true;;			
		}
		elseif('prototype'==$post->post_type&&'1493'==$elm->object_id){		
			$actif = true;;			
		}
		elseif('prototype'==$post->post_type&&'1638'==$elm->object_id){		
			$actif = true;;			
		}
		elseif(	'post'==$post->post_type&&'2091'==$elm->object_id){		
			$actif = true;;			
		}
		elseif(	'museomix'==$post->post_type&&'804'==$elm->object_id){		
			$actif = true;;			
		}
		return $actif;
	}
	

?>
<div id="big_header">
<?php if (is_front_page()) : ?>
	<div id="museomix_banner">
		<a href="<?php echo get_bloginfo('url'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/museomix_banner.png" alt="Museomix" />
		<img src="<?php echo get_template_directory_uri(); ?>/images/museomix_banner_circle.png" alt="People make museum" id="museomix_circle" /></a>
	</div>
<?php endif; ?>
	<div class="navbar navbar-inverse navbar-fixed-top" style="">
	  <div class="navbar-inner" style="background: #FFEC00; border-color: #d4d4d4;">
			 
		<div class="container nav<?php if(is_front_page()) echo ' menu-accueil';  ?>">


				<a class="bouton-nav bouton-nav-accueil brand" href="<?php 

				if(get_field("langage")=="en") {
					echo get_permalink(580);
				} else echo home_url();  

				echo '"><img src="'.get_template_directory_uri().'/images/logo-museomix-2.png" alt="Museomix 2013" class="logoHeader"/>';

				if(get_field("langage")=="en") {
					echo ' <em class="eventDate">November 8-9-10 2013</em>';
				} else echo ' <em class="eventDate">8-9-10 novembre 2013</em>';  
				
				echo '</a>';

			 #MenuGeneral(); ?>    

		<div class="nav-collapse collapse">
		<ul class="nav">
		
		<?php MenuPrincipal(ICL_LANGUAGE_CODE); ?>
		<li><?php do_action('icl_language_selector'); ?></li>
		</ul>
		</div>
		</div>
		<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			  </button>
	  </div>
	   
	</div>
</div>