@extends('layouts.management_site')
@section('list')
    <div id="dom-target" style="display: none;">
        <?php
            echo htmlspecialchars($groupid);           
        ?>
    </div>
    @if(session('error') == 'xlsx' )
      <script>
        alert('Invalid Structure!')
      </script>
    @endif
    
    <script>
        var div = document.getElementById("dom-target");
        var myData = div.textContent;
        $(document).ready(function(){
          if(myData == 0){
        //access from bridge
            var ContactList = $("#Contactlist");
            $.get('fetch_contact', function (data) {
              var json = $.parseJSON(data);
              console.log(json);
              var output = '<ul class="list-group" id="myUL">';
              for (var i in json) {
                var myname = json[i].firstname + ' ' + json[i].lastname;
                output +=
                  '<li class="list-group-item" aria-hidden="true">' +
                  json[i].firstname + ' ' + json[i].lastname+'<i class="fas fa-key pull-right trigger" style="margin-right:5px; color:#5cb85c;" data-toggle="modal" data-target="#addkey_c" onclick="fetchselect()" id="'+json[i].PIN+'"></i>  <i class="fas fa-key pull-right trigger"  data-toggle="modal" data-target="#deletekey_c" style="margin-right:5px; color:#d9534f;" onclick="fetchselect()" id="'+json[i].PIN+'"></i><i class="fa fa-trash pull-right trigger" style="margin-right:5px;" data-toggle="modal" data-target="#deletecontact" onclick="displayPhrase(\'' +myname+'\')";" id="'+json[i].PIN+'"></i>'+
                  "</li>";
              }
              output += "</ul>";

              ContactList.html(output);

              $('.trigger').click(function(e){
                  $('#pin_addk').val($(this).attr('id'));
                  $('#pin_delk').val($(this).attr('id')); 
                  $('#pin_delc').val($(this).attr('id'));   
              });
            });
          }else{
            var ContactList = $("#Contactlist");
            $.get('fetch_group_member', {groupid : myData} , function (data) {
              var json = $.parseJSON(data);
              console.log(json);
              var output = '<ul class="list-group" id="myUL">';
              for (var i in json) {
                var myname = json[i].firstname + ' ' + json[i].lastname;
                output +=
                  '<li class="list-group-item">' +
                  json[i].firstname + ' ' + json[i].lastname+'<i class="fas fa-key pull-right trigger"  data-toggle="modal" data-target="#addkey_c" style="margin-right:5px; color:#5cb85c;" onclick="fetchselect()" id="'+json[i].PIN+'"></i>  <i class="fas fa-key pull-right trigger"  data-toggle="modal" data-target="#deletekey_c" style="margin-right:5px; color:#d9534f;" onclick="fetchselect()" id="'+json[i].PIN+'"></i>   <i class="fa fa-trash pull-right trigger" aria-hidden="true" data-toggle="modal" data-target="#deletecontact" style="margin-right:5px;" onclick="displayPhrase(\'' +myname+'\')";" id="'+json[i].PIN+'"></i>'+
                  "</li>";
              }
              output += "</ul>";

              ContactList.html(output);

              $('.trigger').click(function(e){
                  $('#pin_addk').val($(this).attr('id'));
                  $('#pin_delk').val($(this).attr('id')); 
                  $('#pin_delc').val($(this).attr('id'));   
              });
            });
            $.get('groupname', {groupid : myData} , function (data) {
              var json = $.parseJSON(data);
              console.log(json);
              document.getElementById("title").innerHTML = json[0].groupname;
              document.getElementById("bread").innerHTML = json[0].groupname;
            });
          }
        });

        function displayPhrase(myname)
        {
            document.getElementById("del_c_name").innerHTML = 'Delete '+myname+' ?' ;
        }

        function quickcheck(){
            var pin = document.getElementById("pin").value;
            var Result = $("#result");
            
            $.get('search', {PIN : pin} , function (data) {
              console.log(data.firstname);
              if(data.account == 'Not found'){
                document.getElementById("result").innerHTML = 'Result: ' + data.account ;
                document.getElementById("pin").value = null;
              }else{
                document.getElementById("result").innerHTML = 'Result: ' + data[0].firstname + ' ' + data[0].lastname ;
              }
            });

            
        }
        

        // function quickfilecheck(){
        //     var xlsx = $("#xlsx").prop("files")[0];
        //     var Result = $("#result");

        //     $.ajax({
        //             type:'POST',
        //             url: 'textxlsx',
        //             data: xlsx,
        //             contentType: false,
        //             processData: false,
        //             success: function (data) {
        //                 console.log('Submission was successful.');
        //                 console.log(data);
        //             },
        //             error: function (data) {
        //                 console.log('An error occurred.');
        //                 console.log(data);
        //             },
        //         });
            
            // $.post('search_arr', {xlsx : xlsx,contentType: false,processData: false} , function (data) {
            //   console.log(data);
              // if(data.account == 'Not found'){
              //   document.getElementById("result").innerHTML = 'Result: ' + data.account ;
              //   document.getElementById("pin").value = null;
              // }else{
              //   document.getElementById("result").innerHTML = 'Result: ' + data[0].firstname + ' ' + data[0].lastname ;
              // }
            //});

            
        //}

              function ByFile(){
                document.adduser.action = 'textxlsx';              
              }
              function ByPin(){
                document.adduser.action = 'add-contact';  
              }

              // function myFunction() {
              //   var input, filter, ul, li, a ,i, txtValue;
              //   input = document.getElementById('myInput');
              //   filter = input.value.toUpperCase();
              //   ul = document.getElementById("myUL");
              //   li = ul.getElementsByTagName('li');

              //   for (i = 0; i < li.length; i++) {
              //     a = document.getElementsByClassName("list_c")[i];;
              //     txtValue = a.textContent || a.innerText;
              //     if (txtValue.toUpperCase().indexOf(filter) > -1) {
              //       li[i].style.display = "";
              //     } else {
              //       li[i].style.display = "none";
              //     }
              //   }
              //}
    </script>   
        <div class="container">
          <br>
          <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="bridge">Bridge</a></li>
                  @if($groupid == 0)
                  <li class="breadcrumb-item active" aria-current="page">Key management</li>
                  @else
                  <li class="breadcrumb-item"><a href="management?groupid=0">Key management</a></li>
                  <li class="breadcrumb-item active" aria-current="page" id="bread"></li>
                  @endif
                  
              </ol>
          </nav>
        </div>
        <div class="container" style="padding: 10px;height:100vh;">
            <div class="row">
                <div class="col-md-10">
                    <h2 id="title">User</h2>
                </div>
                <div class="col-md-2">
                    <button class="pull-right" data-toggle="modal" data-target="#adduser"><i class="fa fa-user-plus" aria-hidden="true"></i>  Add user</button>
                </div>             
            </div>
            <br>
            {{-- <input class="form-control" id="myInput" onkeyup="myFunction()" type="text" placeholder="Search.."> --}}
            <br>
            <li id="Contactlist"></li>
        </div> 
      </div>
    </div>
  </div>
  <script>
    
  </script>
</body>

<div class="modal fade" id="adduser">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add new contact</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            <div class="container-fluid">
              <form action="{{ route('add-contact') }}" name="adduser" method="POST" id="adduser_frm" enctype="multipart/form-data" >

                  <div class="container text-center" style="padding:10px">
                    <p  id="result"></p>
                  </div>
                  <div class="form-check" >
                    <input class="form-check-input" onclick="ByPin()" type="radio" name="usetype" id="bypin" checked>
                    <label class="form-check-label" for="perm">
                      By PIN
                    </label>
                  </div>
                  <fieldset id="bypinext">
                    <div class="row">
                        <div class="col-md-9">
                            <input type="text" class="form-control" placeholder="Insert PIN here. . ." name="PIN[]" id="pin" autocomplete="off" required>
                        </div>
                        <div class="col-md-3">
                            <button type="button" onclick="quickcheck()">Search</button>
                        </div>    
                    </div>
                  </fieldset>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="usetype" onclick="ByFile()" id="byfile" required>
                    <label class="form-check-label" for="schedule">
                      By file
                    </label>
                  </div>
                  <fieldset id="byfileext" disabled> 
                      <div class="row">
                          <div class="col-md-9">
                              <input type="file" name="xlsx" id="xlsx" required>
                          </div>  
                      </div>
                  </fieldset>
                
                {{-- data --}}
                @if(!$groupid == 0)
                  <input type="hidden" name="groupid" value="{{$groupid}}">
                @endif
                <br>
                <button type="submit" class="btn btn-success btn-lg btn-block">Add contact</button>
              </form>
              <script>
                  $("#adduser_frm").validate();
              </script>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade fetch" id="deletekey_c">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Delete key</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">   
          <form action="{{ route('delete-key') }}" method="POST">
              
              <div class="form-group">
                  <input type="hidden" name="_method" value="DELETE">
                  <input type="hidden" name="PIN" id="pin_delk" value="">
                  <select id="devicename" class="form-control" name="deviceid"></select>
              </div>
              <button type="submit" class="btn btn-primary align-right">Delete</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade fetch" id="addkey_c">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
        
          <h4 class="modal-title">Add key</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <form action="{{ route('add-key') }}" id="addkey_frm" method="POST">
              <div class="form-group">
                <input type="hidden" name="PIN[]" id="pin_addk" value="">
                <select id="devicename" class="form-control" name="deviceid" required></select>
                <small class="text-danger" id="device_errorMsg"></small>
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
              <div class="form-check form-check-inline">
                  <input class="form-check-input avi_day" type="checkbox" id="sunday" value="Sunday" name="avi_day[]" >
                  <label class="form-check-label" for="sunday">SUN</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input avi_day" type="checkbox" id="monday" value="Monday" name="avi_day[]" >
                  <label class="form-check-label" for="monday">MON</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input avi_day" type="checkbox" id="tuesday" value="Tuesday" name="avi_day[]" >
                  <label class="form-check-label" for="tuesday">TUE</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input avi_day" type="checkbox" id="wednesday" value="Wednesday" name="avi_day[]" >
                  <label class="form-check-label" for="wednesday">WED</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input avi_day" type="checkbox" id="thursday" value="Thursday" name="avi_day[]" >
                  <label class="form-check-label" for="thursday">THU</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input avi_day" type="checkbox" id="friday" value="Friday" name="avi_day[]" >
                  <label class="form-check-label" for="friday">FRI</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input avi_day" type="checkbox" id="saturday" value="Saturday" name="avi_day[]" >
                  <label class="form-check-label" for="saturday">SAT</label>
                </div>
                <small class="text-danger" id="day_errorMsg"></small>
                <div class="row">
                  <div class="col">
                      <label for="fromtime">FROM</label>
                      <input type="datetime" class="timepicker" name="fromtime" id="fromtime" placeholder="FROM" autocomplete="off" required>
                      <small class="text-danger" id="from_errorMsg"></small>
                  </div>
                  <div class="col">
                    <label for="totime">TO</label>
                    <input type="datetime" name="totime" class="timepicker" id="totime" placeholder="TO" autocomplete="off" required>
                    <small class="text-danger" id="to_errorMsg"></small>
                  </div>
                </div>
                <div class="row">
                  <div class="col">
                      <label for="exp">Expire date</label>
                      <input type="date" name="exp" id="exp" required>
                      <small class="text-danger" id="exp_errorMsg"></small>
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
            $("#addkey_frm").validate({
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
                  if (element.attr("name") == "startdate"){
                    $("#start_errorMsg").html(error);
                  }
                  if (element.attr("name") == "exp"){
                    $("#exp_errorMsg").html(error);
                  }
              },
              submitHandler: function() {
                $.ajax({
                    type: $("#addkey_frm").attr('method'),
                    url: $("#addkey_frm").attr('action'),
                    data: $("#addkey_frm").serialize(),
                    success: function (data) {
                        console.log('Submission was successful.');
                        console.log(data);
                        $('#addkey_c').modal('hide');
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

        <div class="modal fade" id="deletecontact">
                <div class="modal-dialog modal-sm">
                  <div class="modal-content">
                  
                    <!-- Modal Header -->
                    <div class="modal-header">
                      <h4 class="modal-title">Delete Contact</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    
                    <!-- Modal body -->
                    <div class="modal-body pull-right">
                      <form action="{{ route('delete-contact') }}" method="POST">
                          <input type="hidden" name="_method" value="DELETE">
                        <div class="form-group">
                            <input type="hidden" name="groupid" value="{{$groupid}}">
                            <p id="del_c_name">Delete John Doe?</p>
                            <input type="hidden" name="PIN" id="pin_delc" value="">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit"class="btn btn-danger">OK</button>
                        </div>
                      </form>
                    </div>
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
                

                $("#schedule").click(function() {$("#ext").prop("disabled", false);});
                $("#permanant").click(function() {$("#ext").prop("disabled", true);});
                $("#onetime").click(function() {$("#ext").prop("disabled", true);});
                

                $("#bypin").click(function() {$("#bypinext").prop("disabled", false);$("#byfileext").prop("disabled", true);});
                $("#byfile").click(function() {$("#byfileext").prop("disabled", false);$("#bypinext").prop("disabled", true);});
  
              </script>
    
@endsection