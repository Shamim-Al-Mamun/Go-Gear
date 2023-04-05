@extends('admin_panel.adminLayout') @section('content')

<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Booking List</h4>
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
                                        Contact Numner
                                    </th>
                                    <th>
                                        Address
                                    </th>

                                    <th>
                                        Booking Date
                                    </th>
                                    <th>
                                        Booking Time
                                    </th>
                                    <th>
                                        Service Name
                                    </th>
                                    <th>
                                        Service Details
                                    </th>
                                    <th>
                                        Placed at
                                    </th>
                                    <th>
                                        Status
                                    </th>

                                    <th>
                                        Update
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($Service as $s)

                                @foreach($all as $c)
                                        @if($c[0]==$s->id)
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

                                        {{$s->booking_date}}

                                    </td>
                                    <td>
                                       {{$s->booking_time}}
                                    </td>
                                    <td>
                                        {{$s->service_cat}}
                                    </td>
                                     <td>
                                        {{$s->service_details}}
                                    </td>
                                    <td>
                                        {{$s->created_at}}
                                    </td>

                                    <td>
                                    {{$s->booking_status}}
                                    </td>
                                    <td>
                                        <form method="post" style="display:inline-block">
                                            {{csrf_field()}}
                                            <input type="hidden" value="{{$s->id}}" name="bookId">
                                            <select name="stat">
                                                @foreach($status as $x)
                                                @if($s->booking_status!=$x)
                                                <option value="{{$x}}">{{$x}}</option>

                                                @endif

                                                @endforeach
                                            </select>
                                            <input type="submit" class="btn btn-sm btn-warning" value="Update">
                                        </form>
                                    </td>
                                    @break

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
