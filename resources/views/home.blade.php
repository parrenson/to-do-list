@extends('layout')

@section('content')
<div class="container p-5 pb-md-5">
    <h1 class="display-1 fw-bold text-center">
        <span class="text-dark">TODO</span>
        <span class="text-primary">LIST</span>
    </h1>
    <div class="container mt-4 mb-4">
        <div class="d-flex">
            <input type="text" class="form-control me-2" id="task" style="flex: 1;" placeholder="Crea una tarea">
            <button class="btn btn-primary" id="addTask">
                <i class="fas fa-plus"></i>
            </button>
        </div>
        <div class="card mt-4">
            <div class="card-body p-4">
                <div class="d-flex align-items-center">
                    <div class="me-4">
                        <i class="far fa-check-circle fa-2x text-warning"></i>
                    </div>  
                    <div class="flex-grow-1">
                        <div class="h6 text-uppercase font-weight-bold text-gray-800 title-h5 mb-0">
                            Tareaaa
                        </div>
                    </div>
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-cog"></i>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Eliminar</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
