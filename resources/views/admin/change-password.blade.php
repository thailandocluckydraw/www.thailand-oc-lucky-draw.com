@extends('customer.layouts.master')

{{-- @section('my-style')

@endsection --}}


@section('page-content')
    <div class="container-fluid">
        
        <div class="row pt-5">
            <div class="col-xl-4"></div>
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body table-responsive">
                        @if (session('error'))
                            <div class="alert alert-danger">
                            {{ session('error') }}
                            </div>
                        @endif
                        @if (session('success'))
                            <div class="alert alert-success">
                            {{ session('success') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger alert-dismissible fade show" id="alert-danger" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button> 
                                    <p class="m-0">{{$error}}</p>
                                </div>
                            @endforeach
                        @endif

                        <form id="changePasswordForm" method="POST" action="{{ route('/admin/customers/password') }}" class="form-horizontal">
                            @csrf
                            
                            <fieldset class="form-group{{ $errors->has('userID') ? ' has-error' : '' }} position-relative has-icon-left">
                                <input id="userID" type="password" class="form-control" placeholder="User ID" name="userID" data-parsley-type="digits" required>            
                            </fieldset>
                            
                            <fieldset class="form-group{{ $errors->has('newPassword') ? ' has-error' : '' }} position-relative has-icon-left">
                                <input id="newPassword" type="password" class="form-control" placeholder="New Password" name="newPassword" data-parsley-length="[5,20]" required>             
                            </fieldset>

                            <fieldset class="form-group position-relative has-icon-left">
                                <input id="newPasswordConfirm" type="password" class="form-control" placeholder="Confirm New Password" name="newPassword_confirmation"
                                 data-parsley-equalto="#newPassword" data-parsley-equalto-message="Password does not match! Please check and enter again." required>
                            </fieldset>
                            
                            <button type="submit" class="btn btn-info btn-lg btn-block" id="btnchangePassword"><i class="ft-lock"></i> Change Password</button>
                        </form>
                    </div>
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->
    </div>
@endsection


@section('my-script')
    <!-- Parsley js -->
    <script type="text/javascript" src="{{ asset('dashboard/assets/plugins/parsleyjs/parsley.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('form').parsley();
        });
    </script>
@endsection