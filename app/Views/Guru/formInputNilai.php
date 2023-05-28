<?php $this->extend('layout/template') ?>
<?php $this->section('content') ?>
<h1>daftar siswa</h1>
<ul>
    <?php foreach ($siswa as $row) : ?>
        <li><a href="/Guru/formInputNilai/<?= $row->NIS ?>/<?= $row->id_mapel ?>"><?= $row->Nama ?></a></li>
    <?php endforeach; ?>
</ul>
<?php $this->endSection() ?>