@extends('layouts.management_site')
@section('list')



    <script>
        $(document).ready(function(){
            $.get('fetch_OH', function (data) {
                var oh = $("#oh");
                var json = $.parseJSON(data);
                var jsonoh = json.Office_hour;
                console.log(json);
                var output = '';
                for (var i in jsonoh) {
                    var status = '';
                    if(jsonoh[i].status == 1){
                        var status = '<h5 class="pull-right" style="color:#5cb85c">  Status:on</h5>';
                    }else{
                        var status = '<h5 class="pull-right" style="color:#d9534f">  Status:off</h5>'
                    }
                    output +='<div class="card-header">'+ jsonoh[i].device_name + '<a href="#" class="stretched-link pull-right trigger" data-toggle="modal" data-target="#editoh" onclick="fetchOHmenu(\'' +jsonoh[i].deviceid+'\')" id="'+jsonoh[i].deviceid+'">edit</a></div><div class="card-body"><p class="card-text">avilable day: '+  jsonoh[i].avi_day + '            avilable time: ' + jsonoh[i].avi_time_start + ' - ' + jsonoh[i].avi_time_stop + '</p>'+status+'</div></div>';
                }
                output += '';
                oh.html(output);

                
            });

            
        });
        function fetchOHmenu (deviceid){
                var curr_device = $("#curr_device");
                var from = $("#from");
                var to = $("#to");
                $.get('ohdata', {deviceid : deviceid} , function (data) {
                    var json = $.parseJSON(data);
                    console.log(json[0].avi_time_start);
                    output = '<option value="'+json[0].deviceid+'">'+json[0].device_name+'</option>'
                    curr_device.html(output);
                    $('#hiddenid').val(deviceid);
                    var days = $.parseJSON(json[0].avi_day);
                    for (var i in days) {
                        var id = '#'+days[i];
                        console.log(id);
                        $(id).prop("checked", true);
                    }
                    document.getElementById('edt_fromtime').value=json[0].avi_time_start;
                    document.getElementById('edt_totime').value=json[0].avi_time_stop;
                    var a=document.getElementById('fromtime').value;
                    console.log(a);
                });
            }
    
    </script>
                <div class="container">
                        <br>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="bridge">Bridge</a></li>
                                <li class="breadcrumb-item"><a href="management?groupid=0">Key management</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Set Office Hour</li>
                            </ol>
                        </nav>
                    </div>
                <div class="container" style="padding: 10px;height:100vh;">
                    <div class="card" id="oh">
                    </div>
                    <Small data-toggle="modal" data-target="#setoh" onclick="fetchselect()">+ set new office hour for new device</Small>
                    <br>
                    
                </div> 
            </div>
        </div>
    </div>

    <div class="modal fade fetch" id="setoh">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
              
                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title">Set office hour</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                
                <!-- Modal body -->
                <div class="modal-body">
                    <form action="{{ route('set_OH') }}" method="POST" id="setOH">

                        <input type="hidden" name="_method" value="PUT">
                        <select id="devicename" class="form-control" name="deviceid" required></select>
                        <small class="text-danger" id="device_errorMsg"></small>
                        <br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="sunday" value="Sunday" name="avi_day[]">
                            <label class="form-check-label" for="sunday">SUN</label>
                            </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="monday" value="Monday" name="avi_day[]">
                            <label class="form-check-label" for="monday">MON</label>
                            </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="tuesday" value="Tuesday" name="avi_day[]">
                            <label class="form-check-label" for="tuesday">TUE</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="wednesday" value="Wednesday" name="avi_day[]">
                            <label class="form-check-label" for="wednesday">WED</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="thursday" value="Thursday" name="avi_day[]">
                            <label class="form-check-label" for="thursday">THU</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="friday" value="Friday" name="avi_day[]">
                            <label class="form-check-label" for="friday">FRI</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="saturday" value="Saturday" name="avi_day[]">
                            <label class="form-check-label" for="saturday">SAT</label>
                        </div>
                        <small class="text-danger" id="day_errorMsg"></small>
                        <div class="row">
                            <div class="col">
                                <label for="fromtime">FROM</label>
                                <input type="datetime" name="fromtime" id="fromtime" class="timepicker" autocomplete="off"  required>
                                <small class="text-danger" id="from_errorMsg"></small>
                            </div>
                            <div class="col">
                                <label for="totime">TO</label>
                                <input type="datetime" name="totime" id="totime" class="timepicker" autocomplete="off" required>
                                <small class="text-danger" id="to_errorMsg"></small>
                            </div>
                        </div>
                        <div class="form-group">
                                <select class="form-control" id="status" name="status">
                                  <option value='1'>Enable</option>
                                  <option value='0'>Disable</option>
                                </select>
                            </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Set office hour</button>
                    </form>
                    
                    <script>
                        $("#setOH").validate({
                            rules: {
                                'avi_day[]': "required"
                            },
                            messages: {
                                'avi_day[]' : "at least one avialable day is required!",
                                'deviceid' : "please select one of your device!",
                                'fromtime' : 'you have to fill the time of schedule',
                                'totime' : 'you have to fill the time of schedule',
                            },
                            errorPlacement: function (error, element) {
                                if (element.attr("name") == "avi_day[]"){
                                    $("#day_errorMsg").html(error);
                                }
                                if (element.attr("name") == "deviceid"){
                                    $("#device_errorMsg").html(error);
                                }
                                if (element.attr("name") == "fromtime"){
                                    $("#from_errorMsg").html(error);
                                }
                                if (element.attr("name") == "totime"){
                                    $("#to_errorMsg").html(error);
                                }
                            },
                        });
                    </script>
                </div>
            </div>
          </div>
        </div>

        <div class="modal fade fetch" id="editoh">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                  
                    <!-- Modal Header -->
                    <div class="modal-header">
                      <h4 class="modal-title">Edit office hour</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    
                    <!-- Modal body -->
                    <div class="modal-body">
                        <form action="{{ route('set_OH') }}" method="POST" id="editOH">
    
                            <input type="hidden" name="deviceid" id="hiddenid" value="">
                            <input type="hidden" name="_method" value="PUT">
                            <select id="curr_device" class="form-control" disabled>
                            </select>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="Sunday" value="Sunday" name="avi_day[]">
                                <label class="form-check-label" for="sunday">SUN</label>
                                </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="Monday" value="Monday" name="avi_day[]">
                                <label class="form-check-label" for="monday">MON</label>
                                </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="Tuesday" value="Tuesday" name="avi_day[]">
                                <label class="form-check-label" for="tuesday">TUE</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="Wednesday" value="Wednesday" name="avi_day[]">
                                <label class="form-check-label" for="wednesday">WED</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="Thursday" value="Thursday" name="avi_day[]">
                                <label class="form-check-label" for="thursday">THU</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="Friday" value="Friday" name="avi_day[]">
                                <label class="form-check-label" for="friday">FRI</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="Saturday" value="Saturday" name="avi_day[]">
                                <label class="form-check-label" for="saturday">SAT</label>
                            </div>
                            <small class="text-danger" id="edt_day_errorMsg"></small>
                            <div class="row">
                                <div class="col" id="from">
                                    <label for="fromtime">FROM</label>
                                    <input type="text" name="fromtime" id="edt_fromtime" class="timepicker" value="" autocomplete="off" placeholder="FROM" required>
                                    <small class="text-danger" id="edt_from_errorMsg"></small>
                                </div>
                                <div class="col" id="to">
                                    <label for="totime">TO</label>
                                    <input type="text" name="totime" id="edt_totime" class="timepicker" value="" autocomplete="off" placeholder="TO" required>
                                    <small class="text-danger" id="edt_to_errorMsg"></small>
                                </div>
                            </div>
                            <div class="form-group">
                                    <select class="form-control" id="status" name="status">
                                      <option value='1'>Enable</option>
                                      <option value='0'>Disable</option>
                                    </select>
                                </div>
                            <br>
                            <button type="submit" class="btn btn-primary">Set office hour</button>
                        </form>
                        <script>
                            $("#editOH").validate({
                                rules: {
                                    'avi_day[]': "required"
                                },
                                messages: {
                                    'avi_day[]' : "at least one avialable day is required!",
                                    'fromtime' : 'you have to fill the time of schedule',
                                    'totime' : 'you have to fill the time of schedule',
                                },
                                errorPlacement: function (error, element) {
                                    if (element.attr("name") == "avi_day[]"){
                                        $("#edt_day_errorMsg").html(error);
                                    }
                                    if (element.attr("name") == "fromtime"){
                                        $("#edt_from_errorMsg").html(error);
                                    }
                                    if (element.attr("name") == "totime"){
                                        $("#edt_to_errorMsg").html(error);
                                    }
                                },
                            });
                        </script>
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
        </script>
</body>
    
@endsection