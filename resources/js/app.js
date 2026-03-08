function formatDate(dateStr) {
    if (!dateStr) return '';
    const d = new Date(dateStr);
    const year = d.getFullYear();
    const month = String(d.getMonth() + 1).padStart(2, '0');
    const day = String(d.getDate()).padStart(2, '0');
    return `${year}.${month}.${day}`;
}


document.addEventListener('DOMContentLoaded', () => {
    const projectsContainer = document.querySelector('.flex-col');
    const tasksBody = document.getElementById('tasks-body');

    projectsContainer.addEventListener('click', function(e) {
        const card = e.target.closest('.project-card');
        if (!card) return;
        if (e.target.closest('a')) return;

        projectsContainer.querySelectorAll('.project-card').forEach(c => c.classList.remove('selected'));
        card.classList.add('selected');

        const projectId = card.dataset.projectId;

        fetch(`/projects/${projectId}/tasks-json`)
            .then(res => res.json())
            .then(tasks => {
                tasksBody.innerHTML = '';

                if (tasks.length === 0) {
                    tasksBody.innerHTML = `
                        <p class="py-4 text-center text-gray-400">
                            У этого проекта пока нет задач
                        </p>`;
                    return;
                }

                tasks.forEach((task, index) => {
                    tasksBody.innerHTML += `
                        <div class="flex flex-row px-2 items-center">
                            <div class="border-r-1 w-20 border-stone-400 py-2 whitespace-normal">
                                <p class="text-center">${index + 1}</p>
                            </div>
                            <div class="border-r-1 w-100 border-stone-400 py-2 whitespace-normal">
                                <p class="text-center">${task.title}</p>
                            </div>
                            <div class="border-r-1 w-90 border-stone-400 py-2 whitespace-normal">
                                <p class="text-center">${task.employee_full_name}</p>
                            </div>
                            <div class="border-r-1 w-40 border-stone-400 py-2 px-4 whitespace-normal">
                                <p class="text-center">${formatDate(task.end_date)}</p>
                            </div>
                            <div class="w-30 py-2 px-4 whitespace-normal">
                                <p class="text-center">${task.status}</p>
                            </div>

                            <a href="/tasks/${task.id}/edit">
                                <div class="bg-cyan-500 size-8 flex justify-center items-center rounded-lg">
                                    <img src="/icons/white_pencil_100.png" alt="" class="size-6">
                                </div>
                            </a>
                        </div>`;
                });
            });
    });
});
