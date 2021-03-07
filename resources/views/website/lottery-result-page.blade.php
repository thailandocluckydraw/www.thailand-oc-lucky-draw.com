@extends('website.layouts.master')

{{-- @section('my-style')

@endsection --}}

@section('page-content')
<br /><br /><br />
<div class="payment-history-area area-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="section-headline text-center">
                    <h3>Lottery Results</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="deposite-content">
                    <div class="diposite-box">
                        <div class="deposite-table">
                            <table>
                                <tr>
                                    <th>Draw Date</th>
                                    <th>Lottery Number</th>
                                </tr>
                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{ date('M d, Y - h:i A', strtotime($item->created_at)) }}</td>
                                        <td>THAI-{{ $item->lottery_number }}</td>
                                    </tr>
                                @endforeach
                                
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

{{-- @section('my-script')

@endsection --}}