@extends('store.storeLayout')
@section('content')
<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <h1>Order History</h1>
        <br>
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <th>Order Id</th>
                        <th>Image </th>
                        <th>Name</th>
                        <th>Quanity</th>
                        <th>Color</th>
                        <th>Status</th>
                        <th>Price</th>
                    </thead>
                    <tbody>
                        @foreach($sale as $s)
                            @foreach($all as $c)
                            @if($c[0]==$s->id)
                            @foreach($products as $p)
                            @if(session('user')->id == $s->user_id)
                                @if($c[1]==$p->id)
                                <tr>
                                <td>{{$s->id}}</td>
                                <td><img src="uploads/products/{{$p->id}}/{{$p->image_name}}" height="50px" width="50px"></td>
                                <td>{{$p->name}}</td>
                                <td>{{$c[2]}}</td>
                                <td><div style="height:25px;width:25px;margin:5px;display:inline-block;background-color: {{$c[3]}}"></div></td>
                                <td>{{$s->order_status}}</td>
                                <td>{{$s->price}}</td>
                                </tr>

                                @break
                                @endif
                                @endif
                            @endforeach
                        @endif
                        @endforeach
                        @endforeach
                        </tbody>
                </table>
            </div>
        </div>
        <!-- /Billing Details -->
    </div>

</div>

<div class="section">
    <!-- container -->
    <div class="container">
          <h1>Booking History</h1>
        <br>
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <th>Booking Id</th>
                        <th>Booking Date</th>
                        <th>Booking Time</th>
                        <th>Service Name</th>
                        <th>Service Details</th>
                        <th>Status</th>

                    </thead>
                    <tbody>
                        @foreach($Service as $s)
                            @foreach($all as $c)
                                @if($c[0]==$s->id)
                                    {{-- @foreach($products as $p) --}}
                                    @if(session('user')->id == $s->user_id)
                                        @if($c[1]==$p->id)
                                            <tr>
                                            <td>{{$s->id}}</td>
                                            <td>{{$s->booking_date}}</td>
                                            <td>{{$s->booking_time}}</td>
                                            <td>{{$s->service_cat}}</td>
                                            <td>{{$s->service_details}}</td>
                                            <td>{{$s->booking_status}}</td>

                                            </tr>

                                            @break
                                        @endif
                                    @endif
                                    {{-- @endforeach --}}
                                @endif
                            @endforeach
                        @endforeach
                        </tbody>
                </table>
            </div>
        </div>
        <!-- /Billing Details -->
    </div>

</div>

@endsection
