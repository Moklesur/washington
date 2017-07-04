<div class="icon-boxes-widget widget-margin-fix <?php echo esc_attr($instance['alignment']); ?>">
	<div class="row">
		<?php foreach( $instance['icon_boxes'] as $i => $icon_boxes ) : ?>
			<div class="col-md-<?php echo esc_attr( $instance['per_row'] ); ?> col-sm-6 col-xs-12 icon-fix">
				<?php if ( ! empty( $icon_boxes['icon'] ) ) : ?>
					<div class="icon-boxes">
						<?php $icon_styles = array();
						if(!empty($icon_boxes['icon_color'])) $icon_boxes[] = 'color: '.$icon_boxes['icon_color'];
						echo  siteorigin_widget_get_icon( $icon_boxes['icon'], $icon_styles );
						?>
					</div>
				<?php endif; ?>
				<div class="icon-boxes-details">
					<?php if ( ! empty( $icon_boxes['title'] ) ) : ?>
						<h4 class="icon-boxes-header"><?php echo esc_html( $icon_boxes['title'] ); ?></h4>
					<?php endif; ?>
					<?php if ( ! empty( $icon_boxes['texteditor'] ) ) : ?>
						<div class="icon-boxes-inner">
							<?php echo $icon_boxes['texteditor']; ?>
						</div>
					<?php endif; ?>
					<?php if ( ! empty( $icon_boxes['button_text'] ) ) : ?>
						<div class="icon-boxes-button"><a href="<?php echo  sow_esc_url($icon_boxes['button_url']); ?>" class="btn <?php echo  $icon_boxes['button_style']; ?>"><?php echo esc_html( $icon_boxes['button_text'] ); ?></a></div>
					<?php endif; ?>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</div>