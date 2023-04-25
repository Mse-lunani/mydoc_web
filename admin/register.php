<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Doctor| Registration Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <script src="plugins/jquery/jquery.min.js"></script>
 
<script>
let autocomplete;
   function myfun(){
const input = document.getElementById("pac-input");
const options = {
    componentRestrictions: { country: "ken" },
    fields: ["geometry", "name","place_id"],
  strictBounds: false,
  types: ["establishment"],
};
 autocomplete = new google.maps.places.Autocomplete(input, options);
autocomplete.addListener("place_changed",myfun2);
}
function myfun2(){
    let place = autocomplete.getPlace();
    if(!place.geometry){
        alert("Please select a location closest to you")
    }else{
        $("#lat").val(place.geometry.location.lat());
        $("#lng").val(place.geometry.location.lng());
        $("#name").val(place.name);
        $("#place_id").val(place.place_id)
    }
}

</script>
 <script 
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA7GzBwnwzWK5ThbU6Ti5Y0SA8f6qdfzbM&libraries=places&callback=myfun"
    async defer
    ></script>
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="#"><b>Doctor</b>Registration</a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register a new membership</p>
<?php if(isset($_GET['unsuc'])){ ?>
 <p class="login-box-msg">It seems user already exists</p>
<?php  } ?>
      <form action="model/register.php" method="post">
         <input type = "hidden" name = "lat" id = "lat" value = "">
         <input type = "hidden" name = "lng" id = "lng" value = "">
         <input type = "hidden" name = "location" id = "name" value = "">
         <input type = "hidden" name = "place_id" id = "place_id" value = "">    
          
        <div class="input-group mb-3">
          <input type="text" class="form-control" required name = "name" placeholder="Name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" name = "email" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
         <div class="input-group mb-3">
          <input type="text" class="form-control" required name = "phone" placeholder="Phone Number">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>
            </div>
          </div>
        </div>
         <div class="input-group mb-3">
         <select class = "form-control" required name = "speciality">
             <option value = "">Choose a speciality</option>
             <option value = "Brain, Nerves and Spinal cord">Neurologist</option>
             <option value = "Stomach, Liver and GastroInternal tract">Gastroenterologist </option>
             <option value = "Muscle, Bone and Joints">Orthopedic</option>
             <option value = "Mouth">dentist</option>
             <option value = "Lung and Airway">Pulmonologist</option>
             <option value = "Ear,Nose and Throat ENT">Specialist</option>
             </select>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-clipboard"></span>
            </div>
          </div>
        </div>
                <div class="input-group mb-3">
          <input type="text" id =  "pac-input" class="form-control" required placeholder="Enter location">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-map"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" required name = "password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
      
        <div class="row">
          
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

     

      <a href="login.php" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
