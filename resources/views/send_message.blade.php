<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Send new message</title>
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="p-4 col-12">
				<h1 class="h3 text-center">
					Enter Your message
				</h1>
			</div>
		</div>

		<div class="row">
			<div class="p-4 col-12">
				<form>
					
					<div class="form-group">
						<label for="name">Username:</label>
						<input type="text" id="name" name="name" class="form-control">
					</div>

					<div class="form-group">
						<label for="message">Enter Message:</label>
						<input type="text" id="message" name="message" class="form-control">
					</div>
					<button class="btn btn-primary">Send message</button>
				</form>
			</div>
		</div>
	</div>

	<script src="{{ asset('js/app.js') }}"></script>
	<script>
		$('form').on('submit', function(e){
			e.preventDefault();
			var form = $(this);
			var data =  form.serialize();
			form.find('#message').val('');

			axios.post('send-message', data).then(resp => {
				form.append(`<div id="success" class="mt-4 alert alert-success"> Message sented successfully. </div>`);
				setTimeout(() => {
					$('#success').remove();
				}, 1500);
			});

		})
	</script>
</body>
</html>