<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,minimal-ui">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>Login</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('website/img/logo/favicon.png') }}">
    <link href="{{ asset('dashboard/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('dashboard/assets/css/icons.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('dashboard/assets/css/style.css') }}" rel="stylesheet" type="text/css">
</head>

<body>
	<!-- Begin   -->
	<div class="wrapper-page">
		<div class="card">
			<div class="card-body">
				<div class="text-center mt-2 mb-4">
					<a href="{{ route('login') }}" class="logo logo-admin"><img src="{{ asset('website/img/logo/logo.png') }}" height="80" alt="logo"></a>
                </div>
                
				<div class="px-3 pb-3">
                    
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger alert-dismissible fade show" id="alert-danger" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button> 
                                <p class="m-0"><strong>Oh snap!</strong> {{$error}}</p>
                            </div>
                        @endforeach
					@endif
					
					@if(Session::has('error'))
						<div class="alert alert-danger alert-dismissible fade show" id="alert-danger" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button> 
							<p class="m-0"><strong>Oh snap!</strong> {!! session('error') !!}</p>
						</div>
					@endif

					@if (Session::has('success'))
						<div class="alert alert-success alert-dismissible fade show" id="alert-success" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<p class="m-0">{{ Session::get('success') }}</p>
						</div>
					@endif
                    
					<form autocomplete="off" method="POST" action="{{ route('login') }}">
                        @csrf
						<div class="form-group row">
							<div class="col-12">
								<input class="form-control" name="email" type="email" required="" placeholder="Email Address">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-12">
								<input class="form-control" name="password" type="password" required="" placeholder="Password">
							</div>
						</div>
						<div class="form-group text-center row m-t-20">
							<div class="col-12">
								<button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Log In</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- jQuery  -->
    <script src="{{ asset('dashboard/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/modernizr.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/waves.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/jquery.nicescroll.js') }}"></script>
	<!-- App js -->
	<script src="{{ asset('dashboard/assets/js/app.js') }}"></script>
	    <!-- Parsley js -->
    <script type="text/javascript" src="{{ asset('dashboard/assets/plugins/parsleyjs/parsley.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('form').parsley();
        });
    </script>
</body>

</html>