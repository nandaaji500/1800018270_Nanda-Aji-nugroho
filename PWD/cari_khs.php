<?php
include 'koneksi.php'
?>

<h3>Form Pencarian Data KHS dengan PHP</h3>

<form action="" method="GET">
    <label> Cari:</label>
    <input type="text" name="cari">
    <input type="submit" value="Cari">
</form>

<?php
if (isset($_GET['cari'])) {
    $cari = $_GET['cari'];
    echo "<b>Hasil Pencarian: " . $cari . "</b>";
}

?>

<table border="1">
    <tr>
        <th>No</th>
        <th>NIM</th>
        <th>Kode MK</th>
        <th>Nilai</th>
    </tr>

    <?php
    if (isset($_GET['cari'])) {
        $cari = $_GET['cari'];
        $sql = "SELECT * FROM KHS WHERE nim ='" . $cari . "'";
        $tampil = mysqli_query($con, $sql);
    } else {
        $sql = "SELECT * FROM KHS";
        $tampil = mysqli_query($con, $sql);
    }
    $no = 1;
    while ($r = mysqli_fetch_array($tampil)) {
    ?>

    <tr>
        <td><?php echo $no++ ?></td>
        <td><?php echo $r['NIM']; ?></td>
        <td><?php echo $r['kodeMK']; ?></td>
        <td><?php echo $r['nilai']; ?></td>
    </tr>
    <?php } ?>
</table>