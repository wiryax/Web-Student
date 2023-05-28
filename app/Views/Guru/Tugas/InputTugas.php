<?php $this->extend('layout/template') ?>
<?php $this->section('content') ?>
<h1>Input Tugas</h1>

<?= ($validation->hasError('keterangan') ? 1 : 2) ?>
<?= $dateNotValid ?>

<form action="/Guru/saveTugas" method="post" enctype="multipart/form-data">
    <label for="id_mapel">Id Mapel :</label>
    <input type="hidden" name="id_mapel" value="<?= $idMapel ?>">
    <label for="tgl_upload">Tanggal Mulai : </label>
    <input type="date" name="tgl_upload"><br>
    <label for="tgl_deadline">Tanggal Akhir Pengumpulan : </label>
    <input type="date" name="tgl_deadline">
    <br><label for="file">Pilih File : </label>
    <input type="file" name="file">
    <br><label for="keterangan">Keterangan</label>
    <textarea name="keterangan" rows="4" cols="50"> </textarea>
    <br><button type="submit">Submit Tugas</button>
</form>
<?php $this->endSection() ?>