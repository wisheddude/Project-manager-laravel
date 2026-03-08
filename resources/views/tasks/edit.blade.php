@extends('layouts.app')


@section('title', 'Редактирование')

@section('main')
    <div class="flex flex-col gap-6">
        <form action="{{route('tasks.update', $task->id)}}"
              method="POST"
              class="min-h-96 w-xl px-8 py-8 shadow-stone-500 shadow rounded-lg flex flex-col gap-3.5">
            @csrf
            @method('PUT')
            <h1 class="text-3xl">Редактирование задачи</h1>

            <div>
                <label for="title" class="font-light">Наименование задачи</label>
                <input id="title"
                       name="title"
                       type="text"
                       value="{{old('title', $task->title)}}"
                       class="w-full border border-stone-300 py-4 px-4 rounded-lg">
            </div>

            <div>
                <label for="description" class="font-light">Описание задачи</label>
                <textarea id="description"
                          name="description"
                          type="text"

                          class="w-full border border-stone-300 py-4 px-4 rounded-lg">{{old('description', $task->description)}}</textarea>
            </div>

            <div class="flex flex-row gap-4">
                <div class="w-1/2">
                    <label for="end_date" class="font-light">Дата окончания</label>
                    <input id="end_date"
                           name="end_date"
                           type="datetime-local"
                           value="{{old('end_date', $task->end_date)}}"
                           class="w-full border border-stone-300 py-4 px-4 rounded-lg">
                </div>
            </div>

            <p>Важно: задача должна быть определена как минимум на следующий день относительно текущего дня</p>

            <div>
                <label for="project_id">Задача в проекте:</label>
                <select name="project_id"
                        id="project_id"
                        class="w-full border border-stone-300 py-3 px-4 rounded-lg">

                    <option value="">Выберите проект</option>

                    @foreach($projects as $project)
                        <option value="{{ $project->id }}"
                            @selected(old('project_id', $task->project_id) == $project->id)>
                            {{ $project->name }}
                        </option>
                    @endforeach

                </select>
            </div>

            <div>
                <label for="employee_id">Задача закреплена за сотрудником</label>
                <select name="employee_id"
                        id="employee_id"
                        class="overflow-y-auto w-full border border-stone-300 py-3 px-4 rounded-lg">

                    <option value="">Выберите сотрудника</option>

                    @foreach($employees as $employee)
                        <option value="{{ $employee->id }}"
                            @selected(old('employee_id', $task->employee_id) == $employee->id)>
                            {{ $employee->full_name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="status">Статус задачи</label>
                <select name="status" id="status" class="w-full border border-stone-300 py-3 px-4 rounded-lg">
                    @foreach(['не начата', 'в процессе', 'завершена'] as $status)
                        <option value="{{ $status }}" @selected(old('status', $task->status) == $status)>{{ $status }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex items-center justify-between">
                <button class="px-8 py-3.5 self-start bg-cyan-500 rounded-lg text-2xl text-white hover:bg-cyan-600 transition cursor-pointer"
                        type="submit">Редактировать</button>
            </div>


            @error('name')
            <p class="text-red-500 mt-2">{{ $message }}</p>
            @enderror
        </form>

        <form action="{{route('tasks.destroy', $task->id)}}"
              class="w-xl rounded-lg flex flex-col gap-3.5"
              method="POST"
              onsubmit="return confirm('Вы уверены что хотите удалить проект?')">
            @csrf
            @method('DELETE')
            <button class="px-4 py-4 self-start bg-red-500 rounded-lg text-2xl text-white hover:bg-red-600 transition cursor-pointer"
                    type="submit">Удалить</button>
        </form>
    </div>
@endsection
