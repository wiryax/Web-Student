<?php $this->extend('Siswa/template') ?>
<?php $this->section('content') ?>
<h1>Input Tugas</h1>
<form action="/Siswa/submitTugas" method="post" enctype="multipart/form-data">
    <input type="hidden" name="NIS" value="<?= $NIS ?>">
    <input type="hidden" name="id_tugas" value="<?= $id_tugas ?>">
    <label for="nama_mapel">Mapel : </label>
    <input type="text" name="nama_mapel" disabled value="<?= $nama_mapel ?>"><br>
    <label for="file">File:</label>
    <input type="file" name="file"><br>
    <label for="catatan">Catatan : </label>
    <textarea name="catatan" id="" cols="30" rows="1"></textarea><br>
    <button type="submit">Submit Tugas</button>
</form>
<?php $this->endSection() ?>