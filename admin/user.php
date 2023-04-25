<?php
include_once 'path.php';

$page = $title =  'user';

include_once "header.php";

$row = array();

if (isset($_GET['id'])) {
    $row = get_user_by_id(decrypt($_GET['id']));
} else {
    unset($_SESSION['edit']);
}

$array = category_array();
?>
<!-- Begin Page Content -->


<div class="container-fluid">
    <!-- Page Heading -->
    <?= isset($_GET['suc']) ? success_message('Details updated successfully') : '' ?>
    <?= isset($_GET['error']) ? error_message('Something went wrong, please try again') : '' ?>
    <?= isset($_GET['email']) ? error_message('That Email Already Exists') : '' ?>
    <?= isset($_GET['suc1']) ? success_message('Details added successfully') : '' ?>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body card-secondary">
            <div class="card-header">
                <h3 class="card-title">
                    <?= ((!empty($row)) ? 'Edit ' : 'Add ') . ucfirst($page) ?>
                </h3>
            </div>
            <div class="mt-4">
                <form enctype="multipart/form-data" action="model/create?action=user" method="POST">
                    <div class="row clearfix">
                        <?php
                        $require = true;
                        $read = false;
                        if (!empty($row)) {
                            $_SESSION['edit'] = encrypt($row['id']);
                            $require = false;
                            $read = true;
                        } ?>

                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-6">
                            <?php
                            input_hybrid('Name', 'name', $row, $require);
                            ?>
                            <div class="form-group">
                                <label for='email'>Email</label>
                                <div class="input-group">
                                    <input autocomplete="on" type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo isset($_POST['email']) ? $row['email'] : ''; ?>" onBlur="checkAvailabilityEmailid()" required>
                                </div>
                                <span id="emailid-availability" style="font-size:12px;"></span>
                            </div>
                           
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-6">

                            <div class="form-group">
                                <label for='phone_number'>Phone Number</label>
                                <div class="input-group">
                                    <input autocomplete="on" type="text" class="form-control" name="phone_number" id="phone_number" placeholder="Phone Number" value="<?php echo isset($_POST['phone_number']) ? $row['phone_number'] : ''; ?>" onBlur="checkAvailabilityMobileno()" required>
                                </div>
                                <span id="mobileno-availability" style="font-size:12px;"></span>
                            </div>
                            <?php
                            input_hybrid('ID/Passport Number', 'id_number', $row, $require);
                            ?>

                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mb-4 text-center">
                        <?= submit('Submit', 'primary', 'text-center'); ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End of Main Content -->

<script>
    function checkAvailabilityEmailid() {
        jQuery.ajax({
            url: "check_available.php",
            data: 'email=' + $("#email").val(),
            type: "POST",
            success: function(data) {
                $("#emailid-availability").html(data);
            },
            error: function() {}
        });
    }

    function checkAvailabilityMobileno() {
        jQuery.ajax({
            url: "check_available.php",
            data: 'phone_number=' + $("#phone_number").val(),
            type: "POST",
            success: function(data) {
                $("#mobileno-availability").html(data);
            },
            error: function() {}
        });
    }
</script>

<script src="assets/plugins/js/place.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAMEJEBjQvanm97dkqbCh-_NxQt6DAlR38&callback=initAutocomplete&libraries=places&v=weekly" async>
</script>
<!-- footer -->
<?php include 'footer.php'; ?>
<!-- end footer -->