<?php

require_once('class/User.php');
include 'layout/Sidebar.php';
$user = new Get;
$get = $user->getAllAdmin();

if (isset($_GET['id'])) {
    $user->hapusUser();
}


?>

<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2> Daftar Admin </h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>

                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <a class="btn btn-success" href="tambah-user.php">Tambah Admin</a>

            <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Role</th>
                                <th class="aksi">Aksi</th>


                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($get as $row) : ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td><?= $row['username'] ?></td>
                                    <td><input type="password" value="<?= $row['password'] ?>" readonly /> </td>
                                    <td>Admin

                                    </td>

                                    <td>
                                        <a class="edit btn btn-warning" href="edit-User.php?id=<?= $row["id"]; ?>">Edit</a>
                                        <a class="hapus btn btn-danger" href="?id=<?= $row["id"]; ?>" onclick="return confirm('yakin?')">hapus</a>

                                    </td>
                                </tr>

                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        <?php if (isset($_SESSION['ubah-berhasil'])) {

        ?>
            <script>
                Swal.fire(
                    'Success!',
                    'Edit Berhasil!',
                    'success'
                )
            </script>

        <?php

        }
        unset($_SESSION['ubah-berhasil']);

        ?>
        <?php if (isset($_SESSION['berhasil'])) {

        ?>
            <script>
                Swal.fire(
                    'Success!',
                    'Tambah Admin Berhasil!',
                    'success'
                )
            </script>

        <?php

        }
        unset($_SESSION['berhasil']);

        ?>


        <?php
        include 'layout/footer.php'
        ?>