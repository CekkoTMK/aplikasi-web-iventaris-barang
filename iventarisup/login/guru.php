
<h2 class="page-header">Data Guru yange memiliki hak akses</h2>


<br><br>

<table id="tabelanggota" class="table table-bordered table-hover">
<thead>
<tr>
<th>No</th>
<th>Username</th>
<th>hak akses</th>

</tr>
</thead>
<tbody>
<?php
$no = 1;
$query = $mysqli->query("SELECT * FROM admin");
while ($lihat = mysqli_fetch_array($query)) {
    ?>
    <tr>
    <td><?= $no++; ?></td>
    <td><?= htmlspecialchars($lihat['username']); ?></td>
    <td>memiliki</td>
       </tr>
    <?php } ?>
    </tbody>
    </table>
