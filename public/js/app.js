function createTask() {
    const taskText = document.getElementById('task').value.trim();
    axios.post('create_task', {
        task: taskText
    })
        .then(function (response) {
            const responseData = response.data;
            if (responseData.status === 201) {
                document.getElementById('task').value = '';
                Swal.fire({
                    icon: 'success',
                    title: 'Crear Tarea',
                    text: 'Tarea creada correctamente'
                });
                getTasks();
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Crear Tarea',
                    text: 'No puedes dejar campos vacíos'
                });
            }
        })
}

function getTasks() {
    axios.get('get_tasks').then(function (response) {
        const responseData = response.data;
        if (responseData.status === 200) {
            const tasks = responseData.tasks;
            const tasksContainer = document.getElementById('tasks-container');
            const templateCard = document.getElementById('template-card');


            tasksContainer.innerHTML = '';
            tasks.forEach(function (task) {
                const clonedCard = templateCard.cloneNode(true);
                clonedCard.style.display = '';

                const taskElement = clonedCard.querySelector('[data-task-id]');
                taskElement.setAttribute('data-task-id', task.id);
                const cardContent = clonedCard.querySelector('.card-data');
                const taskNameElement = cardContent.querySelector('[data-task-name]');
                taskNameElement.textContent = task.name;
                const taskStatusElement = cardContent.querySelector('[data-task-status]');
                taskStatusElement.textContent = task.stateName;
                const taskDateElement = cardContent.querySelector('[data-task-date]');
                taskDateElement.textContent = task.formatDate;

                tasksContainer.appendChild(clonedCard);
            });
        }
    });
}
function changeStatus(status, taskId) {
    axios.put('update_task', {
        status: status,
        taskId: taskId
    })
    .then(function (response) {
        const responseData = response.data;
        if (responseData.status === 200) {
            Swal.fire({
                icon: 'success',
                title: 'Cambiar estado',
                text: 'Estado cambiado correctamente'
            });
            getTasks();
        }else {
            Swal.fire({
                icon: 'error',
                title: 'Cambiar estado',
                text: 'No se pudo cambiar el estado'
            });
        }
    })
}
function downloadFile() {
    axios.get('/download_file')
        .then(function (response) {
            const responseData = response.data;
            if (responseData.status === 400) {
                Swal.fire({
                    icon: 'error',
                    title: 'Descargar archivo',
                    text: 'No hay tareas realizadas',
                });
            } else {
                const file = document.createElement("a");
                file.href = `/download_file`;
                file.target = "_blank";
                file.click();
            }
        })
}


document.addEventListener('DOMContentLoaded', function () {
    getTasks();
});

