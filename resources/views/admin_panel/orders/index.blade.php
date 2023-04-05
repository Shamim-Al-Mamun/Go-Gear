@extends('admin_panel.adminLayout') @section('content')

<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Orders List</h4>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>
                                        Id
                                    </th>
                                    <th>
                                        Name
                                    </th>

                                    <th>
                                        Contact Number
                                    </th>
                                    <th>
                                        Address
                                    </th>


                                    <th>
                                        Product Name
                                    </th>
                                    <th>
                                        Quantity
                                    </th>
                                    <th>
                                        Color
                                    </th>
                                    <th>
                                        Placed at
                                    </th>
                                    <th>
                                        Status
                                    </th>
                                    <th>
                                        Payment Status
                                    </th>

                                    <th>
                                        Bought Price
                                    </th>
                                    <th>
                                        Shipping Name
                                    </th>
                                    <th>
                                        Shipping Phone
                                    </th>
                                    <th>
                                        Shipping Address
                                    </th>
                                    <th>
                                        Update Status
                                    </th>
                                     <th>
                                        Payment Status
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sale as $s)


                                @foreach($all as $c)
                                        @if($c[0]==$s->id)
                                        @foreach($products as $p)
                                        @if($p)
                                        @if( $c[1]==$p->id)
                                <tr>
                                <td>{{$s->id}}</td>

                                        @foreach($users as $u)
                                            @if($u->id == $s->user_id)
                                            <td>{{$u->full_name}}</td>
                                              <td>{{$u->phone}}</td>
                                            <td>{{$u->area}}, {{$u->city}}, {{$u->zip}} ,Bangladesh</td>

                                            @break
                                            @endif
                                        @endforeach


                                    <td>

                                        {{$p->name}}

                                    </td>
                                   <td>
                                        {{$c[2]}}
                                    </td>
                                    <td>
                                        <div style="height:25px;width:25px;margin:5px;display:inline-block;background-color: {{$c[3]}}"></div>
                                    </td>

                                    <td>
                                        {{$s->created_at}}
                                    </td>

                                    <td>
                                    {{$s->order_status}}
                                    </td>
                                    <td>
                                    {{$s->payment_status}}
                                    </td>
                                    <td>
                                        {{$s->price}}
                                    </td>
                                              @foreach($order as $o)
                                            @if($o->user_id == $s->user_id && $o->sales_id == $s->id)
                                            <td>{{$o->name}}</td>
                                              <td>{{$o->phone}}</td>
                                            <td>{{$o->address}}, {{$o->state}},Bangladesh</td>

                                            @break
                                            @endif
                                        @endforeach
                                    <td>
                                        <form method="post" style="display:inline-block">
                                            {{csrf_field()}}
                                            <input type="hidden" value="{{$s->id}}" name="orderId">
                                            <select name="stat">
                                                @foreach($status as $x)
                                                @if($s->order_status!=$x)
                                                <option value="{{$x}}">{{$x}}</option>

                                                @endif

                                                @endforeach
                                            </select>
                                            <input type="submit" name="ord" class="btn btn-sm btn-warning" value="Update">
                                        </form>
                                    </td>
                                    <td>
                                        <form method="post" style="display:inline-block">
                                            {{csrf_field()}}
                                            <input type="hidden" value="{{$s->id}}" name="orderId">
                                            <select name="paystat">
                                                @foreach($paystatus as $x)
                                                @if($s->payment_status!=$x)
                                                <option value="{{$x}}">{{$x}}</option>

                                                @endif

                                                @endforeach
                                            </select>
                                            <input type="submit" name="pay" class="btn btn-sm btn-warning" value="Update">
                                        </form>
                                    </td>




                                    @break
                                    @endif

                                    @endif
                                    @endforeach
                                    @endif

                                    @endforeach
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
