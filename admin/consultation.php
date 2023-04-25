<?php 
include_once 'model/create.php';
$_SESSION['page'] = "consultation";
include_once 'header.php'?>
<div class = "container">
    <h3 class = "p-3">Manage queue</h3>
<section class = "connectedSortable">
    <?php 
    if(isset($_GET['suc'])){
        success_message("operation was successful");
    }
    ?>
    <div class = "card card-primary">
        <div class = "card-header">
            <h3 class = "card-title">Queue</h3>
        </div>
        <div class = "card-body">
            <table class ="table" id = "tb1">
                <thead>
                    <th>Client name</th>
                    <th>Client email</th>
                    <th>Client Dob</th>
                    <th>Date/Time of entry</th>
                    <th>Room</th>
                    <th>Action</th>
                </thead>
                <?php 
                $sql = "select users.*, queue.date_created as dc, queue.id as qid, queue.room, queue.status from queue 
                join users on users.id = queue.uid
                where users.doc_id = '$_SESSION[doctor]' order by queue.id desc
                ";
                $row = select_rows($sql);
                foreach($row as $item){
                ?>
                <tr>
                    <td><?= $item['name'] ?></td>
                    <td><?= $item['email'] ?></td>
                    <td><?= $item['dob'] ?></td>
                    <td><?= $item['dc'] ?></td>
                    <td><?= $item['room']?></td>
                    <td>
                        
                        <?php
                        if($item ['status'] == "pending"){
                        ?>
                        <a class = "btn btn-warning m-1" href = "tests.php?uid=<?= $item['id'] ?>">
                             Give tests 
                        </a>
                        <a class = "btn btn-danger m-1" href = "model/seen.php?id=<?= $item['qid'] ?>">
                            seen ?
                        </a>
                        <?php } else { ?>
                        session ended
                        <?php } ?>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</section>
</div>
<?php
include_once 'footer.php'?>