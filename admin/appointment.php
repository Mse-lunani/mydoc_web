<?php
include_once 'model/create.php';
$_SESSION['page'] = "appointment";
include_once 'header.php';
$sql = "select users.name, users.dob, appointment.* from appointment 
join users on users.id = appointment.uid
where appointment.did = '$_SESSION[doctor]'";
$row = select_rows($sql);
?>
<div class = "container">
    <h1 class = "p-3">Your Appointments</h1>
    <section class = "connectedSortable col-md-10">
        <div class = "card card-indigo">
            <div class = "card-header">
                <h3 class = "card-title">Appointments table</h3>
            </div>
          <div class = "card-body">
              <table class = "table" id = "tb1">
                  <thead>
                      <th>Name of client</th>
                      <th>DOB of client</th>
                      <th>Date of appointment</th>
                      <th>Time</th>
                      <th>Zoom link</th>
                      <th>Description</th>
                      <th>Action</th>
                </thead>
                <?php 
                foreach($row as $item){?>
                <tr>
                    <td><?= $item['name'] ?></td>
                    <td><?= $item['dob']?></td>
                    <td><?= $item['date'] ?></td>
                    <td><?= $item['start_time']?></td>
                    <td><?= $item['link']?></td>
                     <td><?= $item['description']?></td>
                    <td>
                        <a class = "btn btn-primary" href = "prescription.php?id=<?= $item['id'] ?>">Add prescription</a>
                    </td>
                </tr>
                <?php } ?>
              </table>
          </div>
        </div>
    </section>
</div>
<?php 
include_once 'footer.php'
?>