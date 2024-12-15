<?php
include "layout/Sidebar.php";


?>




<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2> Selamat Datang <?php if (isset($_SESSION['superadmin'])) {
                                    echo "superadmin";
                                } else {
                                    echo "admin";
                                } ?> </h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>

                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">

        </div>
    </div>

</div>

<?php if (isset($_SESSION['berhasil'])) {

?>
    <script>
        Swal.fire(
            'Success!',
            'Edit Profil Berhasil!',
            'success'
        )
    </script>

<?php

}
unset($_SESSION['berhasil']);

?>

<?php
include "layout/footer.php";
