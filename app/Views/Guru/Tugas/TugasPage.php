<?= $this->extend('layout/template') ?>
<?php $this->section('content') ?>
<div class="container mt-3">
    <div class="row d-inline p-2 text-center">
        <h1 class="">Input Tugas</h1>
        <div class="col">
            <?php foreach ($dataMapel as $row) : ?>
                <a class="" href="/Guru/Tugas/<?= $row->id_mapel ?>">
                    <span class="badge bg-primary">
                        <?= $row->nama_mapel ?>
                    </span>
                </a>
            <?php endforeach ?>
        </div>
    </div>
    <div class="row mb-5">
        <div class="col">
            <h1 class="text-center">Daftar Tugas</h1>
            <table class="table">
                <th>
                    NO.
                </th>
                <th>
                    Mata Pelajaran
                </th>
                <th>
                    Tanggal deadline
                </th>
                <th>
                    Keterangan
                </th>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($dataTugas as $row) :
                    ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><?= $row->nama_mapel ?></td>
                            <td><?= $row->tgl_deadline ?></td>
                            <td><?= $row->keterangan ?></td>
                        </tr>
                    <?php $i++;
                    endforeach;
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $this->endSection() ?>