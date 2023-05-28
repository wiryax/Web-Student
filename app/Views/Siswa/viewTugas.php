<?php
$this->extend('Siswa/template');
$this->section('content')
?>
<h1>Daftar Tugas</h1>
<table>
    <tr>
        <th>No</th>
        <th>Mapel</th>
        <th>Tgl Deadline</th>
        <th>Action</th>
        <th>Status</th>
    </tr>
    <?php
    $i = 1;
    foreach ($data as $row) : ?>
        <tr>
            <td><?= $i ?></td>
            <td><?= $row['nama_mapel'] ?></td>
            <td><?= $row['tgl_deadline'] ?></td>
            <td><a href="/Siswa/formTugas/<?= $row['id_tugas'] ?>/<?= $row['nama_mapel'] ?>">Submit</a></td>
            <td></td>
        </tr>
    <?php
        $i++;
    endforeach; ?>
</table>
<?php $this->endSection() ?>