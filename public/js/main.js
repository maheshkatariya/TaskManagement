showTasks(false)

document.getElementById('task-title').addEventListener('keypress', function (event) {
    if (event.key === 'Enter') {
        addTask();
    }
});


async function addTask() {
    const title = document.getElementById('task-title').value;
    const messageDiv = document.getElementById('messageDiv');
    messageDiv.textContent = '';
    messageDiv.style.display = 'none';

    if (title.trim() === '') {
        messageDiv.style.display = 'block';
        messageDiv.textContent = 'Task cannot be empty.';
        return;
    }

    const loader = document.getElementById('loader');
    loader.style.display = 'block';
    
    const response = await fetch('/tasks', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN':  window.csrfToken
        },
        body: JSON.stringify({ title })
    });
    const task = await response.json();
    if(task.success) {
        document.getElementById('task-title').value = '';
        showTasks(false)
    } else {
        messageDiv.style.display = 'block';
        messageDiv.textContent = task.message;
    }
    loader.style.display = 'none';
}

async function toggleTask(taskId) {
    const loader = document.getElementById('loader');
    loader.style.display = 'block';
    const messageDiv = document.getElementById('messageDiv');
    messageDiv.textContent = '';
    messageDiv.style.display = 'none';

    const response = await fetch(`/tasks/${taskId}`, {
        method: 'PATCH',
        headers: {
            'X-CSRF-TOKEN':  window.csrfToken
        }
    });
    const task = await response.json();
    if(task.success) {
        showTasks(false)
    }else{
        messageDiv.style.display = 'block';
        messageDiv.textContent = task.message;
    }
    loader.style.display = 'none';
}

async function deleteTask(taskId) {
    const loader = document.getElementById('loader');
    loader.style.display = 'block';

    if (!confirm('Are you sure to delete this task?')) return;
    const response = await fetch(`/tasks/${taskId}`, {
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN':  window.csrfToken
        }
    });
    const result = await response.json();
    if (result.success) {
        document.getElementById(`task-${taskId}`).remove();
    }
    loader.style.display = 'none';
}

async function showTasks(completed) {
    const loader = document.getElementById('loader');
    loader.style.display = 'block';

    const response = await fetch(`/tasks/${completed}`);
    let tasks = await response.json();
    console.log(tasks.success)
    if(tasks.success){
        document.getElementById('task-list').innerHTML = '';
        console.log(tasks.tasks)
        tasks.tasks.forEach(task => renderTask(task));
    }
    loader.style.display = 'none';
}

function renderTask(task) {
    
    const taskRow = document.createElement('tr');
    taskRow.id = `task-${task.id}`;
    taskRow.classList.toggle('table-success', task.completed);
    taskRow.innerHTML = `
        <td>
            ${task.completed ? '' : `<input type="checkbox" onclick="toggleTask(${task.id})" ${task.completed ? 'checked' : ''}>`}
        </td>
        <td style="text-decoration: ${task.completed ? 'line-through' : 'none'};">
            ${task.title}
        </td>
        <td>
            <button class="btn btn-danger btn-sm" onclick="deleteTask(${task.id})"><i class="bi bi-trash"></i> </button>
        </td>
    `;
    document.getElementById('task-list').appendChild(taskRow);
}