<?php $this->extend('layout/template') ?>
<?php $this->section('content') ?>
<h1>List Mapel</h1>
<ul>
    <?php foreach ($mapel as $row) : ?>
        <li>
            <a href="daftarSiswa/<?= $row->id_mapel ?>"><?= $row->nama_mapel ?></a>
        </li>
    <?php endforeach; ?>
</ul>
<?php $this->endSection() ?>