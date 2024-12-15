<?php

require_once 'class/pemohonan.php';
include 'layout/Sidebar.php';
$pemohon = new pemohon;
$get = $pemohon->getPemohonapprove();

if (isset($_GET['id'])) {
    $pemohon->hapusPemohon();
}

if (isset($_GET['status'])) {
    $pemohon->tidakTerima();
}
?>

<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2> Daftar pemohon sudah diterima </h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>

                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <a href="cetakAll.php" class="btn btn-primary">Cetak Tabel</a>
            <table id="datatable" class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal Pengajuan</th>
                        <th>Nama Domain</th>
                        <th>Nama Pengelola</th>

                        <th>NIP</th>

                        <th>Pangkat / Golongan</th>
                        <th>Jabatan</th>
                        <th>Email</th>
                        <th>No. Hp</th>
                        <th>Jenis Layanan</th>
                        <th>Keterangan</th>
                        <th>Dokumen ASN / KTP</th>
                        <th>Dokumen Pic</th>
                        <th>Dokumen Surat Pengajuan</th>
                        <th>Dokumen Kontrak</th>


                        <th class="aksi">Aksi</th>
                        <th>Status</th>

                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($get as $row) : ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td>
                                <?php if ($row['waktu_pengajuan']) {
                                    echo $row['waktu_pengajuan'];
                                } ?>
                            </td>
                            <td><?php if ($row['nama_domain']) {
                                    echo $row['nama_domain'];
                                } else {
                                    echo '-';
                                } ?></td>
                            <td><?php if ($row['nama_pengelola']) {
                                    echo $row['nama_pengelola'];
                                } else {
                                    echo '-';
                                } ?></td>
                            <td><?php if ($row['nip']) {
                                    echo $row['nip'];
                                } else {
                                    echo '-';
                                } ?></td>
                            <td><?php if ($row['pangkat_golongan']) {
                                    echo $row['pangkat_golongan'];
                                } else {
                                    echo '-';
                                } ?></td>
                            <td><?php if ($row['jabatan']) {
                                    echo $row['jabatan'];
                                } else {
                                    echo '-';
                                } ?></td>
                            <td><?php if ($row['email']) {
                                    echo $row['email'];
                                } else {
                                    echo '-';
                                } ?></td>
                            <td><?php if ($row['no_hp']) {
                                    echo $row['no_hp'];
                                } else {
                                    echo '-';
                                } ?></td>
                            <td><?php if ($row['jenis_layanan']) {
                                    echo $row['jenis_layanan'];
                                } else {
                                    echo '-';
                                } ?></td>
                            <td><?php if ($row['keterangan']) {
                                    echo $row['keterangan'];
                                } else {
                                    echo '-';
                                } ?></td>
                            <td><?php if ($row['dokumen_ASN_KTP']) {
                                ?>
                                    <a href='download.php?file=<?= $row['dokumen_ASN_KTP'] ?>'>Lihat</a>
                                <?php } else {
                                    echo '-';
                                } ?>
                            </td>
                            <td><?php if ($row['dokumen_surat_pic']) {
                                ?>
                                    <a href='download.php?file=<?= $row['dokumen_surat_pic'] ?>'>Lihat</a>
                                <?php } else {
                                    echo '-';
                                } ?>
                            </td>
                            <td><?php if ($row['dokumen_surat_pengajuan']) {
                                ?>
                                    <a href='download.php?file=<?= $row['dokumen_surat_pengajuan'] ?>'>Lihat</a>
                                <?php } else {
                                    echo '-';
                                } ?>
                            </td>
                            <td><?php if ($row['dokumen_kontrak']) {
                                ?>
                                    <a href='download.php?file=<?= $row['dokumen_kontrak'] ?>'>Lihat</a>
                                <?php } else {
                                    echo '-';
                                } ?>
                            </td>




                            <td style="display:flex;">
                                <a href="edit-dokumen.php?id=<?= $row["id"]; ?>" class="btn btn-success">Cetak Dokumen</a>
                                <a class="edit btn btn-warning" href="edit-permohonan.php?id=<?= $row["id"]; ?>">Edit</a>
                                <a class="hapus btn btn-danger" href="?id=<?= $row["id"]; ?>" onclick="return confirm('yakin?')">hapus</a>
                            <td>
                                <a class="terima btn btn-primary" href="?status=<?= $row["id"]; ?>" onclick="return confirm('Yakin?');">Batalkan Terima</a>

                            </td>
                            </td>
                        </tr>

                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
<?php if (isset($_SESSION['ubah-berhasil-approve'])) {

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
unset($_SESSION['ubah-berhasil-approve']);

?>


<?php
include 'layout/footer.php'
?>