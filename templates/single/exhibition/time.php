<div class="single-exhibition-time | d-flex box gap-12">

	<div>
		<i class="iconsax"
		   icon-name="calendar-2"></i>
		<?= date_format( date_create( get_field( 'date' ) ), 'D d.m.Y' ) ?>
	</div>

	<div>
		<i class="iconsax"
		   icon-name="clock">
		</i>
		<?= get_field( 'begin_time' ) ?>
		-
		<?= get_field( 'end_time' ) ?>
	</div>

</div>