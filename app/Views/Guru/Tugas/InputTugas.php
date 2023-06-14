<?php $this->extend('layout/template') ?>
<?php $this->section('content') ?>
<h1>Input Tugas</h1>

<form action="/Guru/saveTugas" method="post" enctype="multipart/form-data">
    <div class="row mb-1">
        <div class="col">
            <label class="col-form-label" for="id_mapel">Id Mapel :</label>
        </div>
        <div class="col">
            <input class="form-control" type="hidden" name="id_mapel" value="<?= $idMapel ?>">
        </div>
    </div>
    <div class="row mb-1">
        <div class="col">
            <label class="col-form-label" for="tgl_upload">Tanggal Mulai : </label>
            <input class="form-control" type="date" name="tgl_upload">
        </div>
        <div class="col">
            <label class="col-form-label" for="tgl_deadline">Tanggal Akhir Pengumpulan : </label>
            <input class="form-control" type="date" name="tgl_deadline">
        </div>
    </div>
    <div class="row mb-1 mt-3">
        <div class="col">
            <input class="form-control" type="file" name="file">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-form-label" for="keterangan">Keterangan</label>
        <textarea class="form-control" name="keterangan" rows="4" cols="30"> </textarea>
    </div>
    <div class="row-sm text-center">
        <button class="btn btn-primary btn-lg" type="submit">Submit Tugas</button>
    </div>
</form>
<?php $this->endSection() ?>