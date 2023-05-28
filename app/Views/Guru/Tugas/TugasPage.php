<?= $this->extend('layout/template') ?>
<?php $this->section('content') ?>
<div class="container mt-3">
    <h2>Input Tugas</h2>
    <ul>
        <?php foreach ($dataMapel as $row) : ?>
            <li><a href="/Guru/Tugas/<?= $row->id_mapel ?>"><?= $row->nama_mapel ?></a></li>
        <?php endforeach ?>
    </ul>
    <h1>Daftar Tugas</h1>
    <table>
        <th>
            Mata Pelajaran
        </th>
        <th>
            Tanggal deadline
        </th>
        <th>
            Keterangan
        </th>
        <?php foreach ($dataTugas as $row) : ?>
            <tr>
                <td><?= $row->nama_mapel ?></td>
                <td><?= $row->tgl_deadline ?></td>
                <td><?= $row->keterangan ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
<?php $this->endSection() ?>