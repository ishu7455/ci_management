<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<div class="row justify-content-center">

    <div class="col-md-5">

        <div class="main-card">

            <div class="text-center mb-4">

                <h1 class="title">

                    <i class="fa fa-user-plus"></i>

                    Register

                </h1>

                <p class="sub-title">
                    Create your account
                </p>

            </div>

            <form id="registerForm">

                <div class="mb-3">

                    <label>Name</label>

                    <input type="text"
                    name="name"
                    class="form-control"
                    placeholder="Enter name">

                </div>

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

                <button class="btn btn-success w-100 btn-custom">

                    <i class="fa fa-user-plus"></i>

                    Register

                </button>

            </form>

            <div class="text-center mt-4">

                <a href="/login">
                    Already have account?
                </a>

            </div>

        </div>

    </div>

</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>

<script>

$('#registerForm').submit(function(e){

    e.preventDefault();

    $.ajax({

        url:'/save-register',

        type:'POST',

        data:$(this).serialize(),

        success:function(res){

            if(res.status){

                alert('Registration Successful');

                window.location='/login';
            }
            else{

                console.log(res.errors);
            }
        }
    });
});

</script>

<?= $this->endSection() ?>