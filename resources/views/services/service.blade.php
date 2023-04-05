@extends('store.storeLayout')
@section('content')
<script src="{{asset('js/lib/jquery.js')}}"></script>
<script src="{{asset('js/dist/jquery.validate.js')}}"></script>

<link type="text/css" rel="stylesheet" href="{{asset('css/style_for_quantity.css')}}" />
<style>
label.error {
  color: #a94442;
  background-color: #f2dede;
  border-color: #ebccd1;
  padding:1px 20px 1px 20px;
}

    .rTable {

    display: block;
    width:100%;

}
.rTableHeading, .rTableBody, .rTableFoot, .rTableRow{
    clear: both;
}
.rTableHead, .rTableFoot{
    background-color: #DDD;
    font-weight: bold;
}
.rTableCell, .rTableHead {

    float: left;
    overflow: hidden;
    padding: 3px 1.8%;
    width:20%;

}
.rTable:after {
    visibility: hidden;
    display: block;
    font-size: 0;
    content: " ";
    clear: both;
    height: 0;
}

</style>

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->


            <!-- Order Details -->
            <div class="col-md-5 order-details" style="width: 100%;">
                <div class="section-title text-center">
                    <h3 class="title">Booking for our service</h3>
                </div>

                <div class="payment-method">
                    <div class="input-radio">
                        <input type="radio" name="payment" id="payment-2" checked>
                        <label for="payment-2">
                            <span></span>
                            How to Book for Our Service
                        </label>
                        <div class="caption">
                            <p>Please fill up the information and point out your service category. We accept both digital payment & Cash on delivery at this moment.</p>
                        </div>
                    </div>
                </div>
        <div class="row">
        <form method="post" id="swerviceForm">
            {{csrf_field()}}
            <div class="col-md-7">
                <!-- Billing Details -->
                <div class="billing-details">
                    <div class="section-title">
                        <h3 class="title">Service Information</h3>
                    </div>
                    <div class="form-group">
                        <input class="input" type="date" name="date" id="date" placeholder="Select date">
                    </div>
                    {!! $errors->first('date', '<label class="error">:message</label>') !!}
                     <div class="form-group">
                            <select class="input" id="service" name="time">
                                <option selected>Select Time...</option>
                                <option value="10:00 AM - 01:00 PM">10:00 AM - 01:00 PM</option>
                                <option value="01:00 PM - 04:00 PM">01:00 PM - 04:00 PM</option>
                                <option value="04:00 PM - 07:00 PM">04:00 PM - 07:00 PM</option>
                                <option value="07:00 AM - 10:00 PM">07:00 AM - 10:00 PM</option>
                        </select>
                    </div>
                    {!! $errors->first('time', '<label class="error">:message</label>') !!}

                    <div class="form-group">
                            <select class="input" id="service" name="service">
                                <option selected>Choose Service...</option>
                                <option value="General Service">General Service</option>
                                <option value="Premium Service">Premium Service</option>
                                <option value="Engine Overhauling">Engine Overhauling</option>
                                <option value="Wash">Wash</option>
                                <option value="Checkup">Checkup</option>
                        </select>
                    </div>
                    {!! $errors->first('service', '<label class="error">:message</label>') !!}

                    <div class="form-group">
                        <input class="input" type="text" name="details" id="details" style="height: 120px" placeholder="In details.....">
                    </div>

                     {!! $errors->first('details', '<label class="error">:message</label>') !!}

                        <input type="submit"  name="book" class="primary-btn order-submit" value="Book">

                    </div>
                <!-- /Billing Details -->
            </div></form>
               </div>






            <!-- /Order Details -->

        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

<script>

   //TO DO: ajax will take place





    //validation

    $(document).ready(function() {
		// validate the comment form when it is submitted
		//$("#commentForm").validate();

		// validate signup form on keyup and submit
		$("#swerviceForm").validate({
			rules: {

				date: {
					required: true,
					date: true
				},
                time: "required",
                service: "required",
                details: "required",
			},
			messages: {
				date: "Please enter your suitable date",
				time: "Please select your suitable time",
                service: "Please enter your necessary service",
                details: "Please enter your problems in details...",


			}



        });
	});

</script>
<script>

</script>
@endsection
