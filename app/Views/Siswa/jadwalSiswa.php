<?php $this->extend('Siswa/template') ?>
<?php $this->section('content') ?>
<table>
    <th>No.</th>
    <th>Kelas</th>
    <th>Mata Pelajaran</th>
    <th>Pengajar</th>
    <th>Lihat</th>
    <?php
    $i = 0;
    foreach ($jadwalMapel as $row) :
        $i++;
    ?>
        <tr>
            <td><?= $i ?></td>
            <td><?= $row->id_kelas ?></td>
            <td><?= $row->nama_mapel ?></td>
            <td><?= $row->Nama ?></td>
            <td><a href="/Siswa/Mapel/<?= $row->id_mapel ?>">Details</a></td>
        </tr>
    <?php endforeach; ?>
</table>
<?php $this->endSection() ?>