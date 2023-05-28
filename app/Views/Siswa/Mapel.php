<?php
$this->extend('Siswa/template');
$this->section('content')
?>
<h1>Mapel <?php echo ($mapel[0]->nama_mapel); ?></h1>
<ul>
    <li>
        <p>Pengajar : <?= $mapel[0]->Nama ?> <strong></strong></p>
    </li>
    <li>
        <p>Kelas : <?= $mapel[0]->nama_kelas ?></p>
    </li>
    <li>
        <h5><Strong>Keterangan</Strong></h5>
        <article><?= $mapel[0]->keterangan ?></article>
    </li>
    <li>
        <strong>Daftar Tugas</strong>
        <ul class="sub">
            <?php $i = 1;
            foreach ($tugas as $row) : ?>
                <li><a href="/Siswa/Tugas/<?= $row->id_tugas ?>">Tugas <?= $i;
                                                                        $i++ ?></a></li>
            <?php endforeach; ?>
        </ul>
    </li>
</ul>
<?php $this->endSection() ?>
<!--
    nama mapel
    nama pengajar
    nama kelas
    keterangan pelajaran
    daftar tugas

    database : mapel, guru, tugas, siswa
 -->