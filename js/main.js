var co = "andy";
var backdrop = "standard";
var mood = 'normal';
var alt = false;
var clientId = '46083a920d1f30a';

(function($) {
	$(document).ready(function() {
		$('#quote').submit(function(e) {
			e.preventDefault();
			$('#error').hide();
			$('#loading').show();
			$('#generated-quote').slideUp();
			var data = $(this).serialize();
			$.ajax({
				type: 'GET',
				url: 'quote.php',
				data: data
			}).done(function(responseText) {
				var image = responseText;
				$.ajax({
					url: 'https://api.imgur.com/3/image',
					method: 'POST',
					headers: {
						Authorization: 'Client-ID ' + clientId
					},
					data: {
						image: image,
						type: 'base64'
					}
				}).done(function(response) {
					var link = response.data.link;
					$('#loading').hide();
					$('#finished').html($('<img>').attr('src', link));
					$('#finished-url').val(link);
					$('#generated-quote').slideDown();
				}).fail(function() {
					$('#error').slideDown();
					$('#loading').hide();
				});
			}).fail(function() {
				$('#error').slideDown();
				$('#loading').hide();
			});
		});

		$('#co-select').change(function() {
			co = $(this).val();
			updateQuote();
		});

		$('#backdrop-select').change(function() {
			backdrop = $(this).val();
			updateQuote();
		});

		$('#expr-select').change(function() {
			mood = $(this).val();
			updateQuote();
		});

		$('#alt').click(function() {
			alt = !alt;
			$('#alt-value').val(alt);
			if(alt) {
				$(this).css('background-position', '0 -36px');
			}
			else {
				$(this).css('background-position', '0 0');
			}
			updateQuote();
		});

		$('#finished-url').click(function() {
			$(this).select();
		});

		function updateQuote() {
			$('#background').css('background-image', 'url(images/backdrop/' + backdrop + '.gif)');
			if(alt) {
				$('#portrait').css('background-image', 'url(images/co/' + co + '-alt.gif)');
			}
			else {
				$('#portrait').css('background-image', 'url(images/co/' + co + '.gif)');
			}

			switch(mood) {
				case 'normal':
					$('#portrait').css('background-position', '0 0');
					break;

				case 'win':
					$('#portrait').css('background-position', '-48px 0');
					break;

				case 'lose':
					$('#portrait').css('background-position', '-96px 0');
					break;

				default:
					$('#portrait').css('background-position', '0 0');
			}
		}
	});
})(jQuery);