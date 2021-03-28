@extends('layouts.app')

@section('content')
<div class="container">
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> 
                <p class="m-0"><strong>Oh snap!</strong> {{$error}}</p>
            </div>
        @endforeach
    @endif
    
    @if(Session::has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button> 
            <p class="m-0"><strong>Oh snap!</strong> {!! session('error') !!}</p>
        </div>
    @endif

    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <p class="m-0">{{ Session::get('success') }}</p>
        </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Daily Draw</div>

                <div class="card-body">

                    <form method="POST" action="{{ route('save-lottery') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="lottery_number" class="col-md-4 col-form-label text-md-right">{{ __('Lottery Number') }}</label>

                            <div class="col-md-6">
                                <input id="lottery_number" type="number" class="form-control{{ $errors->has('lottery_number') ? ' is-invalid' : '' }}" name="lottery_number" value="{{ old('lottery_number') }}" autofocus>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#confirmRegModal">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </div>

                        <div class="modal fade" id="confirmRegModal" tabindex="-1" role="dialog" aria-labelledby="confirmRegModal" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-body text-center p-5" id="confirmRegModalBody">
                                        <h3 class="text-dark">Confirm submission ?</h3>
                                        <p class="pt-2 pb-3">You cannot change the draw number after submitting.</p>

                                        <button class="btn btn-secondary waves-effect waves-light" data-dismiss="modal" aria-label="Close">No</button>
                                        <button type="submit" class="btn btn-success waves-effect waves-light">Yes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    @if (count($data) > 0)                    
                        <br /><br /><br />
                    
                        <h4><b>Today released draw number</b></h4>
                        <div class="row">
                            @foreach ($data as $item)
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <h5>
                                        <span>Draw Date: {{ date('M d, Y - h:i A', strtotime($item->created_at)) }}</span>
                                        <span>|</span>
                                        <span>Draw Number: THAI-{{ $item->lottery_number }} </span>
                                    </h5>
                                </div>
                            @endforeach                        
                        </div>
                    @endif
                    
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Weekly Draw</div>

                <div class="card-body">                   

                    <form method="POST" action="{{ route('save-lottery-weekly') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="lottery_number_week" class="col-md-4 col-form-label text-md-right">{{ __('Lottery Number') }}</label>

                            <div class="col-md-6">
                                <input id="lottery_number_week" type="number" class="form-control{{ $errors->has('lottery_number_week') ? ' is-invalid' : '' }}" name="lottery_number_week" value="{{ old('lottery_number') }}" autofocus>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#confirmRegModalWeek">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </div>

                        <div class="modal fade" id="confirmRegModalWeek" tabindex="-1" role="dialog" aria-labelledby="confirmRegModalWeek" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-body text-center p-5" id="confirmRegModalWeekBody">
                                        <h3 class="text-dark">Confirm submission ?</h3>
                                        <p class="pt-2 pb-3">You cannot change the draw number after submitting.</p>

                                        <button class="btn btn-secondary waves-effect waves-light" data-dismiss="modal" aria-label="Close">No</button>
                                        <button type="submit" class="btn btn-success waves-effect waves-light">Yes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    @if (count($dataWeek) > 0)                    
                        <br /><br /><br />
                    
                        <h4><b>Today released draw number</b></h4>
                        <div class="row">
                            @foreach ($dataWeek as $items)
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <h5>
                                        <span>Draw Date: {{ date('M d, Y - h:i A', strtotime($items->created_at)) }}</span>
                                        <span>|</span>
                                        <span>Draw Number: THAI-{{ $items->lottery_number }} </span>
                                    </h5>
                                </div>
                            @endforeach                        
                        </div>
                    @endif
                    
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
