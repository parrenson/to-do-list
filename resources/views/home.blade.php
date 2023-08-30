@extends('layout')

@section('content')
<div class="container p-5 pb-md-5">
    <h1 class="display-1 fw-bold text-center">
        <span class="text-dark">TO-DO</span>
        <span class="text-primary">LIST</span>
    </h1>
    <div class="container mt-4 mb-4">
        <div class="d-flex align-items-center">
            <input type="text" class="form-control flex-grow-1 me-2" id="task" placeholder="Crea una tarea">
            <button class="btn btn-primary" onclick="createTask()">
                <i class="fas fa-plus"></i>
            </button>
            <button class="btn btn-success mx-2" onclick="downloadFile()">
                <i class="fas fa-file-excel"></i>
            </button>
        </div>        
        <div id="tasks-container">
            <div class="card mt-4" id="template-card" style="display: none;">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center card-data">
                        <div class="me-4">
                            <i class="fas fa-tasks fa-2x"></i>
                        </div>  
                        <div class="flex-grow-1">
                            <div class="h6 text-uppercase font-weight-bold" data-task-name=""></div>
                            <div class="text-muted text-uppercase text-sm mb-0">
                                FECHA DE CREACION: <span data-task-date="{TASK_DATE}"></span> - ESTADO: <span data-task-status=""></span>
                            </div>                           
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-cog"></i>
                            </button>
                            <ul class="dropdown-menu" data-task-id="">
                                <li>
                                    <a 
                                        class="dropdown-item" 
                                        href="javascript:void(0)" 
                                        id="btn-status-pendiente"
                                        onclick="changeStatus('pendiente', this.parentElement.parentElement.getAttribute('data-task-id'))"
                                    >
                                        Pendiente
                                    </a>
                                </li>
                                <li data-task-status="Realizada">
                                    <a 
                                        class="dropdown-item" 
                                        href="javascript:void(0)" 
                                        id="btn-status-realizada"
                                        onclick="changeStatus('realizada', this.parentElement.parentElement.getAttribute('data-task-id'))"
                                    >
                                        Realizada
                                    </a>
                                </li>
                                <li>
                                    <a 
                                        class="dropdown-item" 
                                        href="javascript:void(0)" 
                                        id="btn-status-cancelada"
                                        onclick="changeStatus('cancelada', this.parentElement.parentElement.getAttribute('data-task-id'))"
                                    >
                                        Cancelada
                                    </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a 
                                        class="dropdown-item" 
                                        href="javascript:void(0)" 
                                        id="btn-status-eliminar"
                                        onclick="changeStatus('eliminar', this.parentElement.parentElement.getAttribute('data-task-id'))"
                                    >
                                        Eliminar
                                    </a>
                                </li>
                            </ul>                                                                           
                        </div>
                    </div>
                </div>
            </div>
        </div>        
    </div>
</div>
@endsection
