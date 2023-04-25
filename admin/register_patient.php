<?php
include_once 'model/create.php';
$_SESSION['page'] = "register_patient";
include_once 'header.php';
?>
<div class = "container">
    <h1 class = "p-3">Register a new Patient</h1>
    <?php
    if(isset($_GET['suc'])){
    success_message("Insertion was a success");
    }
    ?>
    <section class = "connectedSortable col-md-10">
        <div class = "card card-indigo">
            <div class = "card-header">
                <h3 class = "card-title">Patient Form</h3>
            </div>
         <form method = "post" action = "model/register_patient.php">
             <div class = "card-body">
                 <?php 
                input("Name", "name", array(), true, "text");
                input("Email", "email", array(), true, "email");
                input("Phone", "phone", array(), true, "text");
                input("Address", "address", array(), true, "text");
                input("Gender", "gender", array(), true, "text"); 
                input("Date of birth", "dob", array(), true, "date");
                input("Insuarance company name", "company_name", array(), true, "text"); 
                 ?>
             </div>
             <div class = "card-footer text-right">
                 <button class = "btn btn-primary" type = "submit">submit</button>
             </div>
         </form>
        </div>
    </section>
</div>
<?php 
include_once 'footer.php'
?>