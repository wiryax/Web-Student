<?php
$this->extend('Siswa/template');
$this->section('content');
?>
<table>
    <th>kelas</th>
    <th>Mata Pelajaran</th>
    <th><strong>Tugas</strong></th>
    <th><strong>UTS</strong></th>
    <th><strong>UAS</strong></th>
    <?php foreach ($nilai as $row) : ?>
        <tr>
            <td><?= $row->nama_kelas ?></td>
            <td><?= $row->nama_mapel ?></td>
            <td><?= $row->Tugas ?></td>
            <td><?= $row->UTS ?></td>
            <td><?= $row->UAS ?></td>
        </tr>
    <?php endforeach; ?>
</table>
<?php $this->endSection() ?>