  @extends('layouts.main')
  @section('content')
  <style>
      body{}
  </style>
  <script>
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
  </script>
  <body>
    <div class="container-fluid text-center">
        <div class="row">
            <div class="col">
                <a href="management?groupid=0">
                    <img class="img"src="{{ asset('img/KEM.png') }}" alt="log" width="87%" height="87%">
                </a>
            </div>
            <div class="col">
                <img class="img"src="{{ asset('img/log.png') }}" alt="log" width="87%" height="87%" data-toggle="modal" data-target="#loadlog" onclick="fetchselect()">
            </div>
        </div>
    </div>

    <div class="modal fade fetch" id="loadlog">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
          
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Load log</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">   
              <form action="{{ route('getlog') }}" method="GET">
                  
                  <div class="form-group">
                      <label for="devicename">Device:</label>
                      <select id="devicename" class="form-control" name="deviceid" required></select>
                      <br>
                      <label for="start_log">Start from:</label>
                      <input type="date" name="start_log" id="start_log" required>
                  </div>
                  <button type="submit" class="btn btn-primary align-right">Delete</button>
              </form>
            </div>
          </div>
        </div>
    </div>
  </body>
  @endsection
