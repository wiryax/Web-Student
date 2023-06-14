<?php $this->extend('layout/template') ?>
<?php $this->section('content') ?>
<h3 class="text-center">Jadwal</h3>
<table class="table">
    <thead>
        <tr>
            <th>
                No.
            </th>
            <th>
                Id Kelas
            </th>
            <th>
                id_mapel
            </th>
            <th>
                Nama Mapel
            </th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 1;
        foreach ($mapel as $row) :
        ?>
            <tr class="">
                <td><?= $i ?></td>
                <td><?= $row->id_kelas ?></td>
                <td><?= $row->id_mapel ?></td>
                <td><?= $row->nama_mapel ?></td>
            </tr>
        <?php
            $i++;
        endforeach;
        ?>
    </tbody>
</table>
<?php $this->endSection() ?>