<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
        body,
        html {
            margin: 0;
            padding: 0;
            height: 100%;
        }

        footer {
            width: 100%;
            height: max-content;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-primary">
        <div class="container-fluid">
            <div class="row">
                <a class="navbar-brand text-white fw-bold" href="/Guru/">E-learning</a>
            </div>
        </div>
    </nav>
    <!-- section -->

    <div class="container mt-5">
        <?= $this->renderSection('user') ?>
        <div class="row">
            <div class="col-3">
                <ul class="list-group">
                    <li class="list-group-item"><a href="/Guru/TugasPage">Tugas</a></li>
                    <li class="list-group-item"><a href="/Guru/getDataMapel">Nilai</a></li>
                    <!-- <li><a href="/Guru/Progres_Tugas">Progres Tugas</a></li> -->
                    <li class="list-group-item"><a href="/Guru/jadwal">Lihat Jadwal</a></li>
                    <li class="list-group-item"> <a href="/Home/deleteSession">Logout</a></li>

                </ul>
            </div>
            <div class="col-9">
                <?= $this->renderSection('content') ?>
            </div>
        </div>

    </div>


    <footer class="bg-primary text-white position-fixed bottom-0">
        <div class="container">
            <div class="row text-center fw-bold p-4">
                <div class="">Build by Wirya</div>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>