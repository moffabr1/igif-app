<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<head>
	<meta charset="utf-8"/>
	<title>IGIF (Golf Improvement App)</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport"/>
	<meta content="" name="description"/>
	<meta content="" name="author"/>

	<link rel="stylesheet" href="{{ asset("assets/stylesheets/styles.css") }}" />
	{{--<link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
	<link rel="stylesheet" href="{{ asset("assets/jquery-ui/jquery-ui.min.css") }}" />

	<script src="{{ asset("assets/scripts/jquery.min.js") }}" type="text/javascript"></script>


</head>
<body>
	@yield('body')

	{{--<script src="{{ asset("assets/scripts/jquery.min.js") }}" type="text/javascript"></script>--}}

	<script src="{{ asset("assets/scripts/bootstrap.min.js") }}" type="text/javascript"></script>
	<script src="{{ asset("assets/jquery-ui/jquery-ui.min.js") }}" type="text/javascript"></script>
	<script src="{{ asset("assets/scripts/moment.min.js") }}" type="text/javascript"></script>
	{{--<script src="{{ asset("assets/scripts/Chart.min.js") }}" type="text/javascript"></script>--}}
	<script src="{{ asset("assets/scripts/metisMenu.min.js") }}" type="text/javascript"></script>
	<script src="{{ asset("assets/scripts/bootstrap-datetimepicker.min.js") }}" type="text/javascript"></script>
	<script src="{{ asset("assets/scripts/sb-admin-2.js") }}" type="text/javascript"></script>
	{{--<script src="{{ asset("assets/scripts/frontend.js") }}" type="text/javascript"></script>--}}


	<script>
		$(function() {
			$("input[name=term]").autocomplete({
				source: "{{ route("igif.admin.clubs.autocomplete") }}",
				minLength: 3,
//				select: function(event, ui) {
//					$($this).val(ui.term.value);
//				}

			});

		});

	</script>

</body>
</html>