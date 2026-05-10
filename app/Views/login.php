<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<div class="row justify-content-center">

    <div class="col-md-5">

        <div class="main-card">

            <div class="text-center mb-4">

                <h1 class="title">
                    <i class="fa fa-list-check"></i>
                    Task Manager
                </h1>

                <p class="sub-title">
                    Login to continue
                </p>

            </div>

            <form id="loginForm">

                <div class="mb-3">

                    <label>Email</label>

                    <input type="email"
                    name="email"
                    class="form-control"
                    placeholder="Enter email">

                </div>

                <div class="mb-4">

                    <label>Password</label>

                    <input type="password"
                    name="password"
                    class="form-control"
                    placeholder="Enter password">

                </div>

                <button class="btn btn-primary w-100 btn-custom">

                    <i class="fa fa-sign-in-alt"></i>

                    Login

                </button>

            </form>

            <div class="text-center mt-4">

                <a href="/register">
                    Create New Account
                </a>

            </div>

        </div>

    </div>

</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>

<script>

$('#loginForm').submit(function(e){

    e.preventDefault();

    $.ajax({

        url:'/login-check',

        type:'POST',

        data:$(this).serialize(),

        success:function(res){

            if(res.status){

                window.location='/dashboard';
            }
            else{

                alert(res.message);
            }
        }
    });
});

</script>

<?= $this->endSection() ?>