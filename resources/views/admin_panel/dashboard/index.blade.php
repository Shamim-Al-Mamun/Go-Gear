@extends('admin_panel.adminLayout')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Orders</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>
                                       Time
                                    </th>
                                    <th>
                                        Status
                                    </th>
                                    <th>
                                        Amount
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sales as $s)
                                <tr>
                                    <td class="font-weight-medium">
                                        {{$s->created_at}}
                                    </td>
                                    <td class="font-weight-medium">
                                        {{$s->order_status}}
                                    </td>
                                    <td class="font-weight-medium">
                                        {{$s->price}}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Sales & Revenue</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>
                                       Time
                                    </th>
                                    <th>
                                        Total Sell (In Total by items)
                                    </th>
                                    <th>
                                        Bought Price (In Total by items)
                                    </th>
                                    <th>
                                        Total Profit (In Total by items)
                                    </th>

                                </tr>



                            </thead>
                            <tbody>
                                @foreach($sales as $s)
                                <tr>
                                    <td class="font-weight-medium">
                                        {{$s->created_at}}
                                    </td>
                                    <td class="font-weight-medium">
                                          {{$s->price}}
                                    </td>
                                    <td class="font-weight-medium">
                                        {{$s->bought_price}}
                                    </td>
                                    <td class="font-weight-medium">
                                        {{$s->price - $s->bought_price}}
                                    </td>

                                </tr>
                                @endforeach

                                <tr>
                                    <td style="font-size: 20px">
                                        Total:
                                    </td>
                                    <td style="font-size: 25px">
                                        {{$sales->sum('price')}} TK
                                    </td>
                                    <td style="font-size: 25px">
                                         {{$sales->sum('bought_price')}} TK
                                    </td>
                                    <td style="font-size: 25px">
                                        {{$sales->sum('price') - $sales->sum('bought_price')}} TK
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
