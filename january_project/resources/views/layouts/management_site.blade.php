@extends('layouts.main')
@section('content')

<body>
    {{-- script for timepicker --}}
    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>

    <style>
        #sidebars
        {
            height: 100vh;
            padding-block-start: 5%;
        }

        .active, .list-group-item:hover {
             background-color: #999;
        }
        #main
        {
            padding: 20px;
        }
        #client
        {
            background-color: #cccccc;
            padding: 2px;

        }
        .text-right
        {
            padding-right: 5px;
        }

        #myUL li a {
          text-decoration: none; /* Remove default text underline */
          color: black; /* Add a black text color */
        }
        
    </style>
    <script>

        $(document).ready(function(){
          fetch();

            var del_frm = $('#deletegroup_frm');
            del_frm.submit(function (e) {

              e.preventDefault();

              $.ajax({
                  type: del_frm.attr('method'),
                  url: del_frm.attr('action'),
                  data: del_frm.serialize(),
                  success: function (data) {
                      console.log('Submission was successful.');
                      console.log(data);
                      fetch();
                      $('#deletegroup').modal('hide');
                  },
                  error: function (data) {
                      console.log('An error occurred.');
                      console.log(data);
                  },
              });
            });

            var del_gfrm = $('deletekey_gfrm');
            del_gfrm.submit(function (e) {

              e.preventDefault();

              $.ajax({
                  type: del_gfrm.attr('method'),
                  url: del_gfrm.attr('action'),
                  data: del_gfrm.serialize(),
                  success: function (data) {
                      console.log('Submission was successful.');
                      console.log(data);
                      $('#deletekey').modal('hide');
                  },
                  error: function (data) {
                      console.log('An error occurred.');
                      console.log(data);
                  },
              });
            });

                      
        });
        function fetch(){
            var GroupList = $("#grouplist");
          $.get('fetch_group', function (data) {
            var json = $.parseJSON(data);
            console.log(json);
            var output ='';
                for (var i in json) {
                output +=
                '<li class="list-group-item"><a href="management?groupid='+json[i].groupid+'"">'+json[i].groupname+'</a>'+'<i class="fas fa-key pull-right add trigger" id="'+json[i].groupid+'"  data-toggle="modal" onclick="fetchselect()" data-target="#addkey" style="margin-right:5px; color:#5cb85c;"></i>  <i class="fas fa-key pull-right delk trigger"  data-toggle="modal" data-target="#deletekey" onclick="fetchselect() "id="'+json[i].groupid+'" style="margin-right:5px; color:#d9534f;"></i><i class="fas fa-trash-alt pull-right delg trigger"  data-toggle="modal" data-target="#deletegroup" style="margin-right:5px;" id="'+json[i].groupid+'" ></i></li>';
                }
                GroupList.html(output);
                $("List").addClass("List");

                $('.trigger').click(function(e){
                  $('#groupid').val($(this).attr('id'));
                  $('#groupid_delk').val($(this).attr('id')); 
                  $('#groupid_addk').val($(this).attr('id'));           
                });
            });

            var user = $("#user");
            $.get('fetch_user', function (data) {
            var json = $.parseJSON(data);
            console.log(json);
            var output ='<a>' + json.firstname + ' ' + json.lastname +' ' + '</a>';
            user.html(output);
                
            });
          }
        function fetchselect()
        {
          var DeviceName =  $(".fetch #devicename");
          $.get('fetch_device', function (data) {
            var json = $.parseJSON(data);
            console.log(json);
            var output ='<select class="form-control" name="deviceid"><option value=""></option>';
            for (var i in json) {
            output +=
              '<option value="'+ json[i].deviceid +'">'+ json[i].device_name +'</option>';
            }
            output += '</select>'
            DeviceName.html(output);;
          }); 
        }

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

        function fetch_key(){
          var DeviceName =  $(".fetch #token_key");
          $.get('fetch_key', function (data) {
            var json = $.parseJSON(data);
            console.log(json);
            var output ='<select class="form-control" name="token_key"><option value=""></option>';
            for (var i in json) {
            output +=
              '<option value="'+ json[i].token_key +'">'+ json[i].device_name +'</option>';
            }
            output += '</select>'
            DeviceName.html(output);;
          }); 
        }        
          
    </script>
      <nav class="navbar navbar-expand-sm bg-light navbar-light justify-content-between">
        <ul class="navbar-nav ">
            <li class="nav-item disable"><a class="nav-link" id="user"></a></li>
        </ul>
        <ul class="navbar-nav ">
            <li class="nav-item active"><a class="nav-link" href="{{ action('AuthController@logout') }}">Logout</a></li>
        </ul>
      </nav>
    <div class="row" id="main">
        <div class="col-md-3">
            <ul class="list-group list-group-flush" id="sidebars" style="border:black">
                <li class="list-group-item list-color" data-toggle="modal" data-target="#adddevice"><i class="fas fa-cogs"></i> Add new device</li>
                <li class="list-group-item" ><a href='office_hour'style="color: black;"><i class="fa fa-clock-o" aria-hidden="true"></i> Set Office hour</a></li>
                <li class="list-group-item"><a href="management?groupid=0" style="color: black;"><i class="fa fa-user" aria-hidden="true"></i> User</a></li>
                <li class="list-group-item" data-toggle="modal" data-target="#addgroup"><i class="fa fa-plus" aria-hidden="true"></i> Add new group</li>
                <li id="grouplist"></li>
                {{-- list all group with foreach--}}
                <li class="list-group-item" onclick="fetch_key()" data-toggle="modal" data-target="#open"><i class="fas fa-door-open"></i>open door</li>
            </ul>
        </div>
        <div class="col-md-9" id="maincontent">
            <div class="jumbotron-fluid" style="background-color:#fff;">
                @yield('list')


                <div class="modal fade fetch" id="open">
                  <div class="modal-dialog modal-md">
                    <div class="modal-content">
                    
                      <!-- Modal Header -->
                      <div class="modal-header">
                        <h4 class="modal-title">Open doors</h4>
                        
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>
                      
                      <!-- Modal body -->
                      <div class="modal-body">  
                        <form action="{{ route('open') }}" method="GET" id="open">
                            <div class="form-group">
                                <select id="token_key" class="form-control" name="token_key"></select>
                                
                            </div>
                            <button type="submit" class="btn btn-primary align-right">Open</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="modal fade" id="deletegroup">
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content">
                      
                        <!-- Modal Header -->
                        <div class="modal-header">
                          <h4 class="modal-title">Delete group</h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        
                        <!-- Modal body -->
                        <div class="modal-body">
                          <form action="{{ route('delete-group') }}" method="POST" id="deletegroup_frm">
                            <input type="hidden" name="_method" value="DELETE">
                            <div class="form-group">
                                <p>Delete this group?</p>
                                <input type="hidden" name="groupid" id="groupid" value="">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit"class="btn btn-danger">OK</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="modal fade fetch" id="deletekey">
                    <div class="modal-dialog modal-md">
                      <div class="modal-content">
                      
                        <!-- Modal Header -->
                        <div class="modal-header">
                          <h4 class="modal-title">Delete key</h4>
                          
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        
                        <!-- Modal body -->
                        <div class="modal-body">  
                          <form action="{{ route('delete-group-key') }}" method="POST" id="deletekey_gfrm">
                              <input type="hidden" name="_method" value="DELETE">
                              <div class="form-group">
                                  <input type="hidden" name="groupid" id="groupid_delk" value="">
                                  <select id="devicename" class="form-control" name="deviceid"></select>
                                  
                              </div>
                              <button type="submit" class="btn btn-primary align-right">Delete</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal fade fetch" id="addkey">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                      
                        <!-- Modal Header -->
                        <div class="modal-header">
                        
                          <h4 class="modal-title">Add key</h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        
                        <!-- Modal body -->
                        <div class="modal-body">
                          <form action="{{ route('add-group-key') }}" method="POST" id="addkey_gfrm">
                              <div class="form-group">
                                <input type="hidden" name="groupid" id="groupid_addk" value="">
                                <select id="devicename" class="form-control" name="deviceid" required></select>
                                <small class="text-danger" id="g_device_errorMsg"></small>
                              </div>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="key_type" id="permanant" value="permanant" checked>
                              <label class="form-check-label" for="perm">
                                Permanant key
                              </label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="key_type" id="schedule" value="schedule">
                              <label class="form-check-label" for="schedule">
                                Schedule key (Please fill avilable day and time)
                              </label>
                            </div>
                            <fieldset id="ext" style="padding:12px;" disabled>
                              <div class="form-check form-check-inline" >
                                  <input class="form-check-input day-group" type="checkbox" id="sunday" value="Sunday" name="avi_day[]">
                                  <label class="form-check-label" for="sunday">SUN</label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input day-group" type="checkbox" id="monday" value="Monday" name="avi_day[]">
                                  <label class="form-check-label" for="monday">MON</label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input day-group" type="checkbox" id="tuesday" value="Tuesday" name="avi_day[]">
                                  <label class="form-check-label" for="tuesday">TUE</label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input day-group" type="checkbox" id="wednesday" value="Wednesday" name="avi_day[]">
                                  <label class="form-check-label" for="wednesday">WED</label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input day-group" type="checkbox" id="thursday" value="Thursday" name="avi_day[]">
                                  <label class="form-check-label" for="thursday">THU</label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input day-group" type="checkbox" id="friday" value="Friday" name="avi_day[]">
                                  <label class="form-check-label" for="friday">FRI</label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input day-group" type="checkbox" id="saturday" value="Saturday" name="avi_day[]">
                                  <label class="form-check-label" for="saturday">SAT</label>
                                </div>
                                <small class="text-danger" id="g_day_errorMsg"></small>
                                <div class="row">
                                  <div class="col">
                                      <label for="fromtime">FROM</label>
                                      <input type="datetime" class="timepicker" name="fromtime" id="fromtime" placeholder="FROM" autocomplete="off" required>
                                      <small class="text-danger" id="g_from_errorMsg"></small>
                                  </div>
                                  <div class="col">
                                    <label for="totime">TO</label>
                                    <input type="datetime" name="totime" class="timepicker" id="totime" placeholder="TO" autocomplete="off" required>
                                    <small class="text-danger" id="g_to_errorMsg"></small>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col">
                                      <label for="exp">Expire date</label>
                                      <input type="date" name="exp" id="exp" required>
                                      <small class="text-danger" id="g_exp_errorMsg"></small>
                                  </div>
                                </div>
                            </fieldset>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="key_type" id="onetime" value="One-time">
                              <label class="form-check-label" for="onetime">
                                One-time key
                              </label>
                            </div>
                            <button type="submit" class="btn btn-primary pull-right">Create!</button>
                          </form>
                          <script>
                            $("#addkey_gfrm").validate({
                              rules: {
                                'avi_day[]': "required"
                              },
                              messages: {
                                'avi_day[]' : "at least one avialable day is required!",
                                'deviceid' : "please select one of your device!",
                                'fromtime' : 'you have to fill the time of schedule',
                                'totime' : 'you have to fill the time of schedule',
                                'startdate' : 'please set start date of key',
                                'exp' : 'please set expire date of key'
                              },
                              errorPlacement: function (error, element) {
                                  if (element.attr("name") == "avi_day[]"){
                                    $("#g_day_errorMsg").html(error);
                                  }
                                  if (element.attr("name") == "deviceid"){
                                    $("#g_device_errorMsg").html(error);
                                  }
                                  if (element.attr("name") == "fromtime"){
                                    $("#g_from_errorMsg").html(error);
                                  }
                                  if (element.attr("name") == "totime"){
                                    $("#g_to_errorMsg").html(error);
                                  }
                                  if (element.attr("name") == "startdate"){
                                    $("#g_start_errorMsg").html(error);
                                  }
                                  if (element.attr("name") == "exp"){
                                    $("#g_exp_errorMsg").html(error);
                                  }
                              },
                              submitHandler: function() {
                                $.ajax({
                                  type: $("#addkey_gfrm").attr('method'),
                                  url: $("#addkey_gfrm").attr('action'),
                                  data: $("#addkey_gfrm").serialize(),
                                  success: function (data) {
                                      console.log('Submission was successful.');
                                      console.log(data);
                                      $('#addkey').modal('hide');
                                  },
                                  error: function (data) {
                                      console.log('An error occurred.');
                                      console.log(data);
                                  },
                                });
                              }
                            });
                        </script>
                        </div>
                      </div>
                    </div>
                  </div> 
                </div>  
              </div>

              <div class="modal fade" id="addgroup">
                <div class="modal-dialog modal-sm">
                  <div class="modal-content">
                  
                    <!-- Modal Header -->
                    <div class="modal-header">
                      <h4 class="modal-title">Add group</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    
                    <!-- Modal body -->
                    <div class="modal-body">
                    <form action="{{ route('add-group') }}" method="POST" id="addgroup_frm">
                      <div class="row">
                        <div class="col-md-8">
                          <input type="text" class="form-control" name="groupname" id="groupname" placeholder="Group name" autocomplete="off" required>
                        </div>
                        <div class="col-md-2">
                          <button type="submit" class="btn btn-primary">add</button>
                        </div>
                      </div>
                    </form>
                    <script>
                        $("#addgroup_frm").validate({
                          submitHandler: function() {
                            $.ajax({
                              type: $("#addgroup_frm").attr('method'),
                              url: $("#addgroup_frm").attr('action'),
                              data: $("#addgroup_frm").serialize(),
                              success: function (data) {
                                  console.log('Submission was successful.');
                                  console.log(data);
                                  fetch();
                                  $('#addgroup').modal('hide');
                              },
                              error: function (data) {
                                  console.log('An error occurred.');
                                  console.log(data);
                              },
                            });
                          }
                        });
                    </script>
                  </div>
                </div>
              </div>
            </div>
              
            </div>
            
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
                            submitHandler: function() {
                              $.ajax({
                                type: $("#adddevice_frm").attr('method'),
                                url: $("#adddevice_frm").attr('action'),
                                data: $("#adddevice_frm").serialize(),
                                success: function (data) {
                                    console.log('Submission was successful.');
                                    console.log(data);
                                    $('#adddevice').modal('hide');
                                },
                                error: function (data) {
                                    console.log('An error occurred.');
                                    console.log(data);
                                },
                              });
                            }
                          });
                      </script>    
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <script>
              $(document).ready(function(){
                $('input.timepicker').timepicker({
                  timeFormat: 'HH:mm:ss',

                  interval: 10
                });
              });
            

            $(".fetch #schedule").click(function() {$(".fetch #ext").prop("disabled", false);});
            $(".fetch #permanant").click(function() {$(".fetch #ext").prop("disabled", true);});
            $(".fetch #onetime").click(function() {$(".fetch #ext").prop("disabled", true);});
          </script>
@endsection