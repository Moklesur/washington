<div class="washington-portfoilo <?php echo $instance['heading_alignment']; ?>">
	<div class="<?php echo $instance['heading_alignment']; ?>-heading">
		<?php if ( ! empty( $instance['title'] ) ) : ?>
			<?php echo $args['before_title'] . esc_html( $instance['title'] ) . $args['after_title'] ?>
		<?php endif; ?>
	</div>
	<?php foreach( $instance['portfolio'] as $i => $portfolio ) : ?>
		<div class="washington-portfolio-list col-md-<?php echo esc_attr( $instance['per_row'] ); ?> col-sm-<?php echo esc_attr( $instance['per_row'] ); ?> col-xs-6">
			<?php
			$profile_picture = $portfolio['profile_picture'];
			$image_details = siteorigin_widgets_get_attachment_image_src(
				$profile_picture, '', ''
			);
			if ( ! empty( $image_details ) ) {
				echo '<a href="'.sow_esc_url( $portfolio['button_url'] ).'" class="portfolio-url" target="_blank"><img src="' . esc_url( $image_details[0] ) . '" class="img-responsive" /></a>';
			} ?>
		</div>
	<?php endforeach; ?>
</div>
