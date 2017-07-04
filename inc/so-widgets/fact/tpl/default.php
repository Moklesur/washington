<div class="fact-widget widget-margin-fix <?php echo esc_attr($instance['alignment']); ?>">
	<?php if ( ! empty( $instance['title'] ) ) : ?>
		<h3 class="widget-title"><?php echo esc_html( $instance['title'] ); ?></h3>
	<?php endif; ?>
	<?php if ( ! empty( $instance['description'] ) ) : ?>
		<p><?php echo esc_html( $instance['description'] ); ?></p>
	<?php endif; ?>
	<ul class="fact-list list-inline">
		<?php foreach( $instance['fact'] as $i => $fact ) :
			if ( ! empty( $fact['icon'] ) ) :
				$icon_styles = array();
				if(!empty($fact['icon_size'])) $icon_styles[] = 'font-size: '.intval($fact['icon_size']).'px';
				if(!empty($fact['icon_color'])) $icon_styles[] = 'color: '.$fact['icon_color'];
			endif;
			echo '<li><div class="fact-inner"><div class="fact-icon">'.siteorigin_widget_get_icon( $fact['icon'], $icon_styles ).'</div><h4><span>'.esc_html($fact['title']).'</span></h4><div>'.wp_kses_post($fact['texteditor']).'</div></div></li>';
		endforeach; ?>
	</ul>
</div>
