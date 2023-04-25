<?php
$title = 'Dashboard';
$page = "index";
include_once 'header.php';
$sql = "select * from appointment where did = '$_SESSION[doctor]'";
$row = select_rows($sql);
$sql = "select * from users where doc_id = '$_SESSION[doctor]'";
$pa = select_rows($sql);
?>
<div class="container">
    <h3 class="p-3">
        Dashboard
    </h3>
  
    <div class="row">


        <div class="col-md-6 col-sm-6 col-12">
            <a href="view_products" class='text-dark'>
                <div class="info-box">
                    <span class="info-box-icon bg-info"><i class="fas fa-hand-holding-usd"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Appointments</span>
                        <span class="info-box-number">
                         <?= sizeof($row) ?>
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </a>
            <!-- /.info-box -->
        </div>

        <div class="col-md-6 col-sm-6 col-12">
            <a href="view_orders" class='text-dark'>
                <div class="info-box">
                    <span class="info-box-icon bg-info"><i class="fas fa-donate"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">My patients</span>
                        <span class="info-box-number">
                        <?= sizeof($pa) ?>  
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </a>
            <!-- /.info-box -->
        </div>




    </div>
    <div class = "container m-3">
        <div class = "col-md-8">
         <div class="card card-prirary cardutline direct-chat direct-chat-primary">
        <div class="card-header">
            <h3 class="card-title">Welcome Doctor</h3>

            
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <!-- Conversations are loaded here -->
            <div class="direct-chat-messages">
                <!-- Message. Default to the left -->
                <div class="direct-chat-msg">
                   
                    <!-- /.direct-chat-infos -->
                     <img class="direct-chat-img" src="images/doctor.png" alt="Message User Image">
                    <!-- /.direct-chat-img -->
                    <div class="direct-chat-text">
                        Hello, Here is what I can help you with
                    </div>
                    <!-- /.direct-chat-text -->
                </div>
                <!-- /.direct-chat-msg -->
                 <div class="container m-3">
                   
                   
                        <a href = "schedule.php"class = "bg bg-primary p-1 m-2">Assist with scheduling</a>
                        <a href = "appointment.php"class = "bg bg-primary p-1 m-2">View client appointments</a>
                        <a href = "register_patient.php"class = "bg bg-primary p-1 m-2">Add a new client</a>
                  
                    <!-- /.direct-chat-text -->
                </div>
                
                <?php 
                if(isset($_SESSION['chat'])){
                foreach( $_SESSION['chat'] as $message ){ ?>
                  <div class="direct-chat-msg right">
                    
                    <!-- /.direct-chat-infos -->
                    <img class="direct-chat-img" src="images/doctor2.png" alt="Message User Image">
                    <!-- /.direct-chat-img -->
                    <div class="direct-chat-text">
                        <?= $message['ask'] ?>
                    </div>
                    <!-- /.direct-chat-text -->
                </div>
                <div class="direct-chat-msg">
                   
                    <!-- /.direct-chat-infos -->
                     <img class="direct-chat-img" src="images/doctor.png" alt="Message User Image">
                    <!-- /.direct-chat-img -->
                    <div class="direct-chat-text">
                       <?= $message['response'] ?>
                    </div>
                    <!-- /.direct-chat-text -->
                </div>
              <?php } } ?>
                
                
            </div>
            <!--/.direct-chat-messages-->

           
        </div>
        <!-- /.card-body -->
        
        <div class = "card-footer">
            <form action="model/chat_request.php" method="post">
                <div class="input-group">
                    <input type="text" name="message" placeholder="Please ask a medically relevant question" class="form-control">
                    <span class="input-group-append">
                      <button type="submit" class="btn btn-primary">Send</button>
                    </span>
                </div>
            </form>
        </div>
        
        <!-- /.card-footer-->
    </div>
    </div>
    </div>
</div>
<?php include_once  'footer.php';
