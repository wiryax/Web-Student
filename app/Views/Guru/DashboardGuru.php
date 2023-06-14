<?php $this->extend('layout/template') ?>
<?php $this->section('content') ?>

<div class="row">
    <h2 class="text-center">
        Selamat Datang, <?= $dataGuru[0]['nama'] ?>
    </h2>
</div>
<div class="row">
    <div class="col mb-5">
        <div class="card">
            <div class="card-body text-center">
                <h5 class="card-title ">
                    Jumlah Tugas Yang Telah Disubmit
                </h5>
                <h2 class="card-text ">
                    <?= $dataJumlahTugas ?>
                </h2>
            </div>
            <div class="card-footer text-center">
                <a href="/Guru/TugasPage" class="btn btn-primary">Lihat Daftar Tugas</a>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card">
            <div class="card-body text-center">
                <h5 class="card-title ">
                    Jumlah Kelas Anda
                </h5>
                <h2 class="card-text ">
                    <?= $dataJumlahKelas ?>
                </h2>
            </div>
            <div class="card-footer text-center">
                <a href="/Guru/jadwal" class="btn btn-primary">Lihat Daftar Kelas</a>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <marquee behavior="" direction="left"><span class="badge bg-warning">Info!!!</span> : Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore, alias harum? Dignissimos explicabo, impedit at velit ipsam perspiciatis minus necessitatibus nisi veniam doloremque totam amet fuga dolores non sequi alias.</marquee>
</div>

<?php $this->endSection() ?>