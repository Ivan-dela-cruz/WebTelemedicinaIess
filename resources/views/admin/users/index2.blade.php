@extends('admin.base.base_dashboard')

@section('content')

    <div class="row">
        <div class="col-sm-4 col-3">
            <h4 class="page-title">Usuarios</h4>
        </div>
        <div class="col-sm-8 col-9 text-right m-b-20">
            <a href="#" class="btn btn-primary float-right btn-rounded" data-toggle="modal" data-target="#add_group">
                <i class="fa fa-plus"></i>
                Agregar usuarios</a>

        </div>
    </div>

    <div class="row filter-row">
        <div class="col-sm-6 col-md-3">
            <div class="form-group form-focus">
                <label class="focus-label">Usuario ID</label>
                <input type="text" class="form-control floating">
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="form-group form-focus">
                <label class="focus-label">Nombre Usuario</label>
                <input type="text" class="form-control floating">
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="form-group form-focus select-focus">
                <label class="focus-label">Rol</label>
                <select class="select floating">
                    <option>Selecciona</option>
                    <option>Administrador</option>
                    <option>Doctor</option>
                    <option>Laboratorist</option>
                    <option>Accountant</option>
                    <option>Receptionist</option>
                </select>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <a href="#" class="btn btn-success btn-block"> Search </a>
        </div>
    </div>
    <div id="user"></div>

    <div class="dropdown dropdown-action">
        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
        <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="edit-patient.html"><i class="fa fa-pencil m-r-5"></i> Edit</a>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_patient"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
        </div>
    </div>







@endsection




/////div
<div class="row">
    <div class="col-lg-12">
        <div class="card user-profile-list ">
            <div class="card-header">
               <h5> Lista de usuarios</h5>

                    <button class="btn btn-success btn-sm btn-round has-ripple float-lg-right" data-toggle="modal" data-target="#modal-report"><i class="feather icon-plus"></i> Add Doctor</button>

            </div>
            <div class="card-body">
                <div class="dt-responsive table-responsive">
                    @include('admin.users.table')
                </div>
            </div>
        </div>
    </div>
</div>
