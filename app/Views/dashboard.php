<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<div class="main-card">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="title">

                Welcome,
                <?= session()->get('name') ?>

            </h2>

            <p class="sub-title">
                Manage your daily tasks
            </p>

        </div>

        <a href="/logout"
        class="btn btn-danger btn-custom">

            <i class="fa fa-sign-out-alt"></i>

            Logout

        </a>

    </div>

    <div class="card border-0 shadow-sm mb-4">

        <div class="card-body">

            <h4 class="mb-4">
                Add New Task
            </h4>

            <form id="taskForm">

                <input type="hidden" id="task_id">

                <div class="row">

                    <div class="col-md-6 mb-3">

                        <label>Title</label>

                        <input type="text"
                        name="title"
                        id="title"
                        class="form-control">

                    </div>

                    <div class="col-md-6 mb-3">

                        <label>Due Date</label>

                        <input type="date"
                        name="due_date"
                        id="due_date"
                        class="form-control">

                    </div>

                    <div class="col-md-6 mb-3">

                        <label>Status</label>

                        <select
                        name="status"
                        id="status"
                        class="form-select">

                            <option value="Pending">
                                Pending
                            </option>

                            <option value="Completed">
                                Completed
                            </option>

                        </select>

                    </div>

                    <div class="col-md-12 mb-3">

                        <label>Description</label>

                        <textarea
                        name="description"
                        id="description"
                        class="form-control"></textarea>

                    </div>

                </div>

                <button class="btn btn-primary btn-custom">

                    <i class="fa fa-save"></i>

                    Save Task

                </button>

            </form>

        </div>

    </div>

    <div class="card border-0 shadow-sm">

        <div class="card-body">

            <h4 class="mb-4">
                Task List
            </h4>

            <table id="taskTable"
            class="table table-hover">

                <thead class="table-dark">

                    <tr>

                        <th>Title</th>

                        <th>Description</th>

                        <th>Status</th>

                        <th>Due Date</th>

                        <th width="180">
                            Action
                        </th>

                    </tr>

                </thead>

            </table>

        </div>

    </div>

</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>

<script>

loadTable();

function loadTable(){

    $('#taskTable').DataTable({

        destroy:true,

        ajax:'/tasks',

        columns:[

            {data:'title'},

            {data:'description'},

            {
                data:'status',

                render:function(data){

                    if(data == 'Completed'){

                        return `
                        <span class="badge bg-success">
                        Completed
                        </span>
                        `;
                    }

                    return `
                    <span class="badge bg-warning text-dark">
                    Pending
                    </span>
                    `;
                }
            },

            {data:'due_date'},

            {
                data:'id',

                render:function(data){

                    return `
                    <button
                    class="btn btn-warning btn-sm editBtn"
                    data-id="${data}">

                    <i class="fa fa-edit"></i>

                    </button>

                    <button
                    class="btn btn-danger btn-sm deleteBtn"
                    data-id="${data}">

                    <i class="fa fa-trash"></i>

                    </button>
                    `;
                }
            }
        ],

        dom:'Bfrtip',

        buttons:[
            'copy',
            'csv',
            'excel',
            'pdf',
            'print'
        ]
    });
}

$('#taskForm').submit(function(e){

    e.preventDefault();

    let id = $('#task_id').val();

    let url = id
        ? '/task/update/'+id
        : '/task/store';

    $.ajax({

        url:url,

        type:'POST',

        data:$(this).serialize(),

        success:function(res){

            if(res.status){

                alert('Task Saved');

                $('#taskForm')[0].reset();

                $('#task_id').val('');

                $('#taskTable')
                .DataTable()
                .ajax
                .reload();
            }
        }
    });
});

$(document).on('click','.editBtn',function(){

    let id = $(this).data('id');

    $.get('/task/edit/'+id,function(res){

        $('#task_id').val(res.id);

        $('#title').val(res.title);

        $('#description').val(res.description);

        $('#status').val(res.status);

        $('#due_date').val(res.due_date);
    });
});

$(document).on('click','.deleteBtn',function(){

    let id = $(this).data('id');

    if(confirm('Delete Task?')){

        $.ajax({

            url:'/task/delete/'+id,

            type:'DELETE',

            success:function(res){

                if(res.status){

                    $('#taskTable')
                    .DataTable()
                    .ajax
                    .reload();
                }
            }
        });
    }
});

</script>

<?= $this->endSection() ?>