<?php 
include_once 'model/create.php';
$_SESSION['page'] = "queue";
include_once 'header.php';
?>
<div class = "container">
<h3 class = "p-3">Queue</h3>
<section class = "connectedSortable col-md-10">
    <?php 
    if(isset($_GET['suc'])){
        success_message("insert was successful");
    }
    ?>
    <div class = "card card-indigo">
        <div class = "card-header">
            <h3 class = "card-title">Add patient to queue</h3>
        </div>
        <form method = "post" action = "model/queue.php">
            <div class = "card-body">
                <div class = "form-group">
                    <label>Choose patient</label>
                    <select class = "form-control" name = "uid" required>
                        <option value = "">Choose patient</option>
                        <?php 
                        $sql = "select * from users where doc_id = '$_SESSION[doctor]' order by id desc";
                        $row = select_rows($sql);
                        foreach($row as $item){
                        ?>
                        <option value = "<?=$item['id']?>">
                            <?= $item['name'] ?>
                        </option>
                        <?php  } ?>
                    </select>
                </div>
                <div class = "form-group">
                    <label>Choose room</label>
                    <select class = "form-control" name = "room" required>
                        <option value = "">Choose room</option>
                        <option>Consultation</option>
                        <option>Lab</option>
                    </select>
                </div>
            </div>
            <div class = "card-footer text-right">
                <button class = "btn btn-primary">submit</button>
            </div>
        </form>
    </div>
</section>
</div>
<?php include_once 'footer.php' ?>