@extends('layouts.main')
@section('content')

  <body>
      <style>
        .adjust-form
        {
            padding-top: 60px;
        }

        .center-div
        {
            width: 80%;
        }
      </style>
    <div class="container-fluid adjust-form">
        <div class="row">
            <div class="col-md-1">
            </div>
            <div class="col-md-10">
                <div class="jumbotron">
                <form method="POST" id="signup">
                        
                            <h4>Account information</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="firstname">Firstname</label>
                                    <input id="firstname" class="form-control" type="text" name="firstname" autocomplete="off" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">E-mail</label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="january@example.com" autocomplete="off" required>
                                </div>
                            </div>    
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="lastname">Lastname</label>
                                    <input id="lastname" class="form-control" type="text" name="lastname" autocomplete="off" required>
                                </div>
                            </div>
                        </div>
                        <h4>User information</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input id="username" class="form-control" type="text" name="username" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input id="password" class="form-control" type="password" name="password" autocomplete="off" required>
                                </div>
                            </div>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary align-right">Submit</button>
                    </form>
                    <script>
                        $("#signup").validate();
                    </script>
                </div>
            </div>
            <div class="col-md-1">
            </div>
        </div>
    </div>
  </body>
@endsection
