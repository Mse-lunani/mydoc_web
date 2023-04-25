<?php 
include_once 'model/create.php';
$_SESSION['page'] = "invoice";
include_once 'header.php'?>
<div class = "container">
    <h3 class = "p-3">Manage Invoices</h3>
<section class = "connectedSortable">
    <?php 
    if(isset($_GET['suc'])){
        success_message("operation was successful");
    }
    ?>
    <div class = "card card-primary">
        <div class = "card-header">
            <h3 class = "card-title">Invoice</h3>
        </div>
        <div class = "card-body">
            <table class ="table" id = "tb1">
                <thead>
                    <th>Client name</th>
                    <th>Client email</th>
                    <th>Client Dob</th>
                    <th>Invoice ID</th>
                    <th>Action</th>
                </thead>
                <?php 
                $sql = "select users.*, orders.id as iid from orders 
                join users on users.id = orders.uid
                where users.doc_id = '$_SESSION[doctor]' order by orders.id desc
                ";
                $row = select_rows($sql);
                foreach($row as $item){
                ?>
                <tr>
                    <td><?= $item['name'] ?></td>
                    <td><?= $item['email'] ?></td>
                    <td><?= $item['dob'] ?></td>
                    <td><?= $item['iid']?></td>
                    <td>
                        
                       
                        <a class = "btn btn-warning m-1" target = "blank" href = "create_invoice.php?id=<?= $item['iid'] ?>">
                             View invoice
                        </a>
                       
                       
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