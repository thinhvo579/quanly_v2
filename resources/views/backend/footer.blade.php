    <!-- Bootstrap core JavaScript-->
 
    <script src="/layout/backend/vendor/jquery/jquery.min.js"></script>
    <script src="/layout/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="https://unpkg.com/moment@2.22.2/min/moment.min.js"></script>
    <script src="{{ URL::to('assets/js/feather.min.js') }}"></script>
    <script src="/layout/backend/js/phong-ban.js"></script>
    <script src="/layout/backend/js/nhan-vien.js"></script>
    <script>
        $.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

    </script>
    <script>
      feather.replace()
    </script>