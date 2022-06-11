@extends('layouts.main')
@section('content')
  <?php use \App\Http\Controllers\AuthController; ?>
  
  <body>
    <style>
        .center-div
            {
                margin-top: 30%;
                width: 90%;
            }

    </style>
    @if(session('error') == 1)
      <script>
        $(document).ready(function(){	
          $('#adddevice').modal('show');
        });
      </script>
    @elseif(session('error') == 2)
    <script>
      $(document).ready(function(){	
        alert('Wrong username or password.');
      });
    </script>
    @elseif(session('error') == 2)
    <script>
      $(document).ready(function(){	
        alert('Token expired!');
      });
    </script>
    @endif
    <script>
        function serialcheck(){
            var serial = document.getElementById("serial").value;
            var SRLResult = $("#srl_result");
            
            $.get('serialcheck', {serial : serial } , function (data) {
              console.log(data);
              document.getElementById("srl_result").innerHTML =  data ;
              if(data.account == 'Invalid Serial'){
                document.getElementById("serial").value = null;
              }
            });
        }

        $(document).ready(function(){
        var add_dfrm = $('adddevice_frm');
            add_dfrm.submit(function (e) {

              e.preventDefault();

              $.ajax({
                  type: add_dfrm.attr('method'),
                  url: add_dfrm.attr('action'),
                  data: add_dfrm.serialize(),
                  success: function (data) {
                      console.log('Submission was successful.');
                      console.log(data);
                      location.reload();
                  },
                  error: function (data) {
                      console.log('An error occurred.');
                      console.log(data);
                  },
              });

            });
        });

    </script>

<div class="modal fade" id="adddevice">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add device</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">

          <form action="{{ route('add-device') }}" method="POST" id="adddevice_frm">
            
            <p>You have to own at least 1 own january device to enter this site.</p>
            <div class="form-group">
              <div class="container text-center" style="padding:10px">
                <p  id="srl_result"></p>
              </div>
              <div class="row">
                  <div class="col-md-9">
                      <input type="text" class="form-control" placeholder="SERIAL" name="serial" id="serial" autocomplete="off" required>
                  </div>
                  <div class="col-md-3">
                      <button type="button" class="btn-block" onclick="serialcheck()">Search</button>
                  </div>    
              </div>
              <small class="text-danger" id="serial_errorMsg"></small><br>
              
              <label for="device_name">Device name</label>
              <input type="text" class="form-control" name="device_name" id="device_name" placeholder="Device name" autocomplete="off" required>
              <small class="text-danger" id="dname_errorMsg"></small><br>
              <label for="location">Device Location</label>
              <textarea class="form-control" name="device_location" id="device_location" rows="3" placeholder="Location" autocomplete="off" required></textarea>
              <small class="text-danger" id="dlocation_errorMsg"></small><br>
              <br>
              <button type="submit" class="btn btn-success btn-block" >Submit</button>
            </div>
          </form>
          <script>
              $("#adddevice_frm").validate({
                messages: {
                  'serial' : "Valid serial is require!",
                  'device_name' : "please set name to device",
                  'device_location' : "please describe location of device"
                },
                errorPlacement: function (error, element) {
                  if (element.attr("name") == "device_name"){
                    $("#dname_errorMsg").html(error);
                  }
                  if (element.attr("name") == "device_location"){
                    $("#dlocation_errorMsg").html(error);
                  }
                  if (element.attr("name") == "serial"){
                    $("#serial_errorMsg").html(error);
                  }
                },
              });
          </script>    
        </div>
      </div>
    </div>
  </div>
</div>

    <div class="row">
        <div class="col-md-8" style="margin-top: auto;margin-bottom: auto;">
            <img src="{{ asset('img/logo.png') }}" class="rounded mx-auto d-block" width="528" height="320">
        </div>
        <div class="col-md-4">
            <div class="jumbotron jumbotron-fluid" style="height:100vh;">
                <div class="container center-div">
                    <form action="{{ route('login') }}" method="POST" id="login">
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="text" class="form-control" name="username" id="username" autocomplete="off" required>
                            </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" name="password" id="password" autocomplete="off" required>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <button type="button" class="btn btn-block"><a href="signup" style="text-decoration: none;color: black;">Sign up</a></button>
                            </div>
                            <div class="col">
                                <button type="submit" id="submit" class="btn btn-block" value="login" form="login">Sign in</button>
                            </div>
                        </div>  
                    </form>
                    <script>
                      $("#login").validate();
                    </script>
                </div>                    
            </div>
        </div>
    </div>
  </body>
@endsection