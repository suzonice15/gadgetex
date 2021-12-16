@extends('fontend.layout.master')
@section('content')
<div class="container d-flex justify-content-center" style="background: white;padding: 50px 50px">

    @if (count($errors) > 0)
        <div class=" alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-ban"></i> Alert!</h4>
            <ul>

                @foreach ($errors->all() as $error)

                    <li style="list-style: none">{{ $error }}</li>

                @endforeach

            </ul>
        </div>
    @endif
                    <form class="well form-horizontal" action="{{url('/')}}/signup" method="post" id="contact_form">

                        <div class="form-group">
                            <div class="col-12 ">
                                @if(Session::has('success'))

                                    <div class="alert alert-success">

                                        {{ Session::get('success') }}

                                        @php

                                        Session::forget('success');

                                        @endphp

                                    </div>

                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-12 ">
                                @if(Session::has('error'))
                                    <div class="alert alert-danger">
                                        {{ Session::get('error') }}
                                        @php
                                        Session::forget('error');
                                        @endphp
                                    </div>
                                @endif
                            </div>
                        </div>

                        @csrf


                        <div style="border: 1px solid #ddd;">
                <!-- Form Name -->
                 <h2 style="font-size: 22px;background: #ddd;text-align: center;padding: 5px 11px;">Customer Registration Form</h2>
                <!-- Text input-->
<div style="padding: 10px;">

    <div class="form-group">
        <div class="col-12 ">
                    </div>
    </div>

    <div class="form-group">
        <div class="col-12 ">
                    </div>
    </div>

    <div class="before">
    <div class="form-group">
        <label class="col-12 control-label">Full Name</label>
        <div class="col-12 ">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input style="width:320px" name="name" id="name" placeholder="Enter Name" class="form-control" type="text">
            </div>

        </div>
        <p style="color:red" id="name_error"></p>


    </div>

    <div class="form-group">
        <label class="col-12 control-label">Contact No.</label>
        <div class="col-12 ">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                <input name="phone" id="phone" placeholder="01738000000" class="form-control" type="number">
            </div>
        </div>
        <p style="color:red" id="phone_error"></p>

    </div>



        <div class="form-group">
            <label class="col-12 control-label"></label>
            <div class="col-12"><br>
                <button type="button" id="requestForOtp" class="btn btn-info form-control">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Next<span class="glyphicon glyphicon-send"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
                <a href="" class="btn btn-success mt-3 form-control">Already member? Login here.</a>
            </div>
        </div>

        </div>


     

    <div class="after" style="display: none;">

        <div class="form-group">
            <label class="col-12 control-label">Otp</label>
            <div class="col-12 ">
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input style="width:320px" required="" name="otp" id="otp" placeholder="Enter Your Otp" class="form-control" type="text">
                </div>
            </div>

            <p id="otp_error" style="color:red"></p>


        </div>


    <div class="form-group">
        <label class="col-12 control-label">Password</label>
        <div class="col-12 ">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input required="" name="password" id="password" placeholder="Password" class="form-control" type="password">

            </div>
        </div>

        <p id="password_error" style="color:red"></p>

        <input type="hidden" id="server_otp" value="">


    </div>


        <div class="form-group">
            <label class="col-12 control-label">Confirm Password</label>
            <div class="col-12 ">
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input required="" name="cpassword" id="cpassword" placeholder="Confirm Password" class="form-control" type="password">
                </div>
            </div>

            <p id="cpassword_error" style="color:red"></p>

        </div>

        <div class="form-group">


            <p id="cpassword_error" style="color:red"></p>

        </div>
        <div class="form-group">
            <label class="col-12 control-label"></label>
            <div class="col-12"><br>
                <button type="button" id="formSubmit" class="btn btn-info">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Confirm <span class="glyphicon glyphicon-send"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>

            </div>
        </div>
        </div>
</div>


            </div>



        </form>
    </div>





<script>
    //  loan_amt.value.replace(/[^0-9]/g, '')

    $(document).ready(function () {
        $(".after").hide();






        $("#requestForOtp").click(function () {
            let name= $("#name").val();
            let phone= $("#phone").val();
            if(name==''){
                $("#name_error").html("Enter Your Name")

            } else {
                $("#name_error").html("")
            }



            if (!/^01\d{9}$/.test(phone)) {
                $('#phone_error').text('Invalid phone number');
            } else {

                $(this).prop("disabled",true);

                $('#phone_error').text('');

                $.ajax({
                    url:"{{url('/')}}/otp/request/"+phone,
                    success:function (data) {

                        if(data.success){

                            $(".after").show();
                            $(".before").hide();
                            $("#server_otp").val(data.otp)
                        } else {
                            $("#requestForOtp").prop("disabled",false);

                            $('#phone_error').text(data.message);
                        }

                        console.log(data)


                    }
                })

            }

        })

        $("#formSubmit").click(function () {
            var submit="ok"
            let cpassword= $("#cpassword").val();
            let password= $("#password").val();
            let otp= $("#otp").val();
            let server_otp= $("#server_otp").val();
            if(server_otp != otp){
                $("#otp_error").html("<strong>Your Otp does not matched</strong>")
                submit="no"

            } else {
                $("#otp_error").html("")
                submit="ok"



            }



            if(password==''){
                $("#password_error").html("<strong>Enter Your Password</strong>")
                submit="no"
            } else {
                $("#password_error").html("")

                if(password !=cpassword){
                    $("#cpassword_error").html("<strong>Password and Confirm Password does not matched</strong>")

                    submit="no"
                } else {
                    $("#cpassword_error").html("")
                    submit="ok"
                }
            }



            if(submit=="ok"){
                $("#contact_form").submit()
            }
        })





    });
</script>







@endsection