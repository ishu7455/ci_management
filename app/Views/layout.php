<!DOCTYPE html>
<html>

<head>

    <title>Task Manager</title>

    <meta charset="UTF-8">

    <meta name="viewport"
    content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet">

    <link rel="stylesheet"
    href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

    <link rel="stylesheet"
    href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">

    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>

        body{
            background: linear-gradient(135deg,#4e73df,#1cc88a);
            min-height:100vh;
            font-family: Arial, sans-serif;
        }

        .main-card{
            background:#fff;
            border-radius:20px;
            padding:30px;
            box-shadow:0 10px 30px rgba(0,0,0,0.2);
        }

        .form-control,
        .form-select{
            height:50px;
            border-radius:10px;
        }

        textarea.form-control{
            height:120px;
        }

        .btn-custom{
            border-radius:10px;
            padding:10px 25px;
            font-weight:bold;
        }

        .dataTables_wrapper .dt-buttons{
            margin-bottom:15px;
        }

        table.dataTable{
            border-radius:10px;
            overflow:hidden;
        }

        .title{
            font-size:32px;
            font-weight:bold;
            color:#4e73df;
        }

        .sub-title{
            color:#777;
        }

    </style>

</head>

<body>

<div class="container py-5">

    <?= $this->renderSection('content') ?>

</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>

<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>

<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>

<?= $this->renderSection('scripts') ?>

</body>
</html>