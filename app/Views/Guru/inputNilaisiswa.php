<?php $this->extend('layout/template') ?>
<?php $this->section('content');
// dd($dataValue) 
?>
<h1 class="text-center">Input Nilai</h1>
<form action="/Guru/saveNilai" method="POST">
    <input type="hidden" name="NIS" value="<?= $NIS ?>">
    <input type="hidden" name="id_mapel" value="<?= $id_mapel ?>">
    UAS : <input class="form-control" type="number" name="UAS" value=<?= $dataValue[0]->UAS ?>><br>
    UTS : <input class="form-control" type="number" name="UTS" value=<?= $dataValue[0]->UTS ?>><br>
    Tugas : <input class="form-control" type="number" name="Tugas" value=<?= $dataValue[0]->Tugas ?>><br>
    <button class="btn btn-primary" type="submit">Submit</button>
</form>
<?php $this->endSection() ?>