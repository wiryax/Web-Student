<?php $this->extend('layout/template') ?>
<?php $this->section('content') ?>
<table>
    <th>
        Id Kelas
    </th>
    <th>
        id_mapel
    </th>
    <th>
        Nama Mapel
    </th>
    <?php foreach ($mapel as $row) : ?>
        <tr>
            <td><?= $row->id_kelas ?></td>
            <td><?= $row->id_mapel ?></td>
            <td><?= $row->nama_mapel ?></td>
        </tr>
    <?php endforeach; ?>
</table>
<?php $this->endSection() ?>