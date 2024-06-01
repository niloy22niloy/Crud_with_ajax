<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src= 
    "https://code.jquery.com/jquery-3.6.0.min.js"
    integrity= 
"sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" 
    crossorigin="anonymous"> 
    </script>

    <title>Hello, world!</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light" >
        <div class="container-fluid">
          <a class="navbar-brand text-white" href="#">Navbar</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item ">
                <a class="nav-link" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Features</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Pricing</a>
              </li>
             
            </ul>
          </div>
        </div>
      </nav>
     <div class="container">
        <div class="row">
            <div class="col-lg-6 mx-auto pt-5">
                <div class="card">
                    <div class="card-header">
                        <h3>Insert Data</h3>
                        
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="" class="form-label">Username</label>
                            <input type="text" class="form-control" name="username" id="username">
                            
                          
                        <div class="mb-3">
                            <label for="" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="email">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Password</label>
                            <input type="password" class="form-control" name="Password" id="password">
                        </div>
                        <div class="mb-3 text-center">
                            <button type="submit" id="submit_btn" class="btn w-100" >Submit</button>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
     </div>

     <div class="container">
      <div class="row">
        <div class="col-lg-6 mx-auto">
          <div class="card mt-5">
            <div class="card ">
              <div class="card-header text-center">
                <h3>User List</h3>
              </div>
              <div class="card-body">
                <table class="table table-striped">
                  <tr class="text-white text-center">
                    <th>Serial</th>
                    <th>Username</th>
                    <th>Email</th>
                  </tr>
                  @forelse($user_list as $key=>$users)
                  <tr class="text-white text-center">
                    <td>{{$key+1}}</td>
                    <td>{{$users->user_name}}</td>
                    <td>{{$users->email}}</td>

                  </tr>
                  @empty
                  Sorry No Data
                  @endforelse
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
     </div>
      
    
     <script>
      $(document).ready(function() {
        
          $('#submit_btn').click(function() {
              let username = $('#username').val();
              let email = $('#email').val();
              let password = $('#password').val();


             
             
             
              $.ajax({
                  url: "{{route('data.insert')}}",
                  method: 'POST',
                  data: {
                    username: username,
                      email: email,
                      password: password,
                  },
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                  dataType: 'json',
                  success: function(res) {
                     console.log(res);
                     if(res.status =='success'){
                      alert(res.message);
                      window.location.reload();
                     }else{
                      if(res.errors.username){
                        alert(res.errors.username);

                      }
                      if(res.errors.email){
                        alert(res.errors.email);


                      }
                      if(res.errors.password){
                        alert(res.errors.password);

                      }
                   

                     }
                     
  
                  },
                  
              });
  
          })
      })
  </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


  </body>
</html>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700;900&display=swap');

body{
    background-color: #152733;
}
.card{
    background-color: #152733;
    border: 1px solid #fff;
    color:white;
}
.card-header{
    border-bottom:1px solid #fff;
}
.btn{
    background:#6C757D;
    color:#fff;
}
.navbar{
    background:#6C757D;
   
}
.navbar .nav-item .nav-link{
    color:#fff;
}
</style>