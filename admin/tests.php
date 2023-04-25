<?php
include_once 'model/create.php';
$_SESSION['page'] = "tests";
include_once 'header.php';
$m = false;
if(isset($_GET['uid'])){
    if(is_numeric($_GET['uid'])){
        $sql = "select * from users where id = '$_GET[uid]'";
        $row = select_rows($sql);
        if(!empty($row)){
            $row = $row[0];
            $m = true;
        }
    }
}
if(!$m){
    exit();
}
?>

<div class = "container">
    <h1 class = "p-3">Tests</h1>
    <?php
    if(isset($_GET['suc'])){
    success_message("Insertion was a success");
    }
    ?>
    <section class = "connectedSortable col-md-10">
        <div class = "card card-indigo">
            <div class = "card-header">
                <h3 class = "card-title">Tests Form</h3>
            </div>
         <form method = "post" action = "model/tests.php">
             <input type = "hidden" name = "uid" value = "<?= $row['id']?>">
             <div class = "card-body">
                 <?php 
                input("Name", "name[]", array(), true, "text");
                input("Price", "price[]", array(), true, "number");
                input("Notes", "notes[]", array(), true, "text");
                
              ?>
              <div id = "add_0">
                  
              </div>
              <div class = "text-right">
                  <p class = "btn btn-success" id = "add">
                      <i class = "fa fa-plus"></i>
                  </p>
              </div>
             </div>
             <div class = "card-footer text-right">
                 <button class = "btn btn-primary" type = "submit">submit</button>
             </div>
         </form>
        </div>
    </section>
</div>
<script>
    $(document).ready(function(){
       $("#add").click(function(){
          let tr = '<div class=form-group><label>Name</label><input class=form-control name=name[] required></div><div class=form-group><label>Price</label><input class=form-control name=price[] required type=number></div><div class=form-group><label>Notes</label><input class=form-control name=notes[] required></div>';
          $("#add_0").append(tr);
       });
    });
</script>
<?php 
include_once 'footer.php'
?>