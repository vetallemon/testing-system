</div>
<footer>
<div class="row bg-primary footer">
<div class="col-lg-4">
	<p>Розробив: Галімський Вітаілій</p>
</div>

<div class="col-lg-4">
<?php 
	echo "поточна дата: ".date("Y-m-d");
?>
</div>
<div class="col-lg-4">
	<p>дата розробки: 2017-01-09</p>
</div>
</div>
</footer>

</div>

<script>  
	$(document).ready(function(){
		var i = $('input').size()-3;
		$('#add').click(function() {
			$('<div><input type="radio"  class="radio-inline field_radio" name="answers" value="' + i + '"><input type="text" class="form-control input-block field" name="dynamic[]" value=" " /></div>').fadeIn('slow').appendTo('.inputs');
			i++;
		});
		$('#remove').click(function() {
			if(i > 1) {
				$('.field:last').remove();
				$('.field_radio:last').remove();
				i--;
			}
		});

		$('#reset').click(function() {
			while(i > 2) {
				$('.field:last').remove();
				$('.field_radio:last').remove();
				i--;
			}
		});

	});

</script>
<script>
	$(document).ready(function() {
		var owl = $('.owl-carousel');
		owl.owlCarousel({
			margin: 10,
			nav: true,
			loop: true,
			items:1,
			navText:['Попереднє','Слідуюче']
		})
	})
</script>
</body>
</html>