<?php $this->extend('Login-template/Login-template') ?>
<?php $this->section('Login') ?>
<div class="container position-absolute top-50 start-50 translate-middle">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center">
                        Login
                    </h4>
                    <form action="/Home/Validation" method="post">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" name="username" id="username" class="form-control"><br>
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-success">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php if (session()->getFlashdata('data')) {
    echo 'anda tidak memiliki akses';
} ?>
<?php $this->endSection() ?>