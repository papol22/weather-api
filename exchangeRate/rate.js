$(function() {
	var a = '';
		$('#aText').keyup(function(){
			convert();
		});

		$('#from').change(function(){
			convert();
		});

		$('#to').change(function(){
			convert();
		});
		


		$('.switch').on('click',function(){
			var from = $('#from').val();
			var to = $('#to').val();

			$('#from').val(to);
			$('#to').val(from);

			convert();
		});







		function convert() {
			var amount = $('#aText').val();

			if (amount == ''){
				$('.oText').text('');
			}else{

				var from = $('#from').val();
				var to = $('#to').val();
				

				$.ajax({
					type:'POST',
					url: 'array.get.php?from='+from+'&to='+to+'&amount='+amount,
					success: function( data ) {
						$('.oText').text(data);
					},
					error: function() {
						alert('error on ajax');
					}
				});
			}
				
		};


	});