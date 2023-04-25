<?php
include_once 'model/create.php';
$_SESSION['page'] = "prescription";
include_once 'header.php';
?>
<div class = "container">
    <h1 class = "p-3">Prescribe medicine</h1>
    <section class = "connectedSortable col-md-10">
        <div class = "card card-indigo">
            <div class = "card-header">
                <h3 class = "card-title">Prescription form</h3>
            </div>
            <form method = "post">
                <div class = "card-body">
                    <?php 
                    input("Drug","drug");
                    input("Dosage","dosage");
                    input("Days","days");
                    input("Direction","direction");
                    ?>
                </div>
                <div class = "card-footer text-right">
                    <button class = "btn btn-success">submit</button>
                </div>
            </form>
        </div>
    </section>
</div>
<?php 
include_once 'footer.php'
?>