@extends('layouts.app')


@section('title', 'Редактирование')

@section('main')
    <div class="flex flex-col gap-6">
        <form action="{{route('projects.update', $project->id)}}"
              method="POST"
              class="min-h-96 w-xl px-8 py-8 shadow-stone-500 shadow rounded-lg flex flex-col gap-3.5">
            @csrf
            @method('PUT')
            <h1 class="text-3xl">Редактирование проекта</h1>

            <div>
                <label for="name" class="font-light">Наименование проекта</label>
                <input id="name"
                       name="name"
                       type="text"
                       value="{{old('name', $project->name)}}"
                       class="w-full border border-stone-300 py-4 px-4 rounded-lg">
            </div>

            <div>
                <label for="description" class="font-light">Описание проекта</label>
                <textarea id="description"
                          name="description"
                          type="text"
                          class="w-full border border-stone-300 py-4 px-4 rounded-lg">{{old('description', $project->description)}}</textarea>
            </div>

            <div class="flex flex-row gap-4">
                <div class="w-1/2">
                    <label for="start_date" class="font-light">Дата начала</label>
                    <input id="start_date"
                           name="start_date"
                           type="date"
                           value="{{old('start_date', $project->start_date)}}"
                           class="w-full border border-stone-300 py-4 px-4 rounded-lg">
                </div>
                <div class="w-1/2">
                    <label for="end_date" class="font-light">Дата окончания</label>
                    <input id="end_date"
                           name="end_date"
                           type="date"
                           value="{{old('end_date', $project->end_date)}}"
                           class="w-full border border-stone-300 py-4 px-4 rounded-lg">
                </div>
            </div>

            <div>
                <label for="status" class="font-light">Статус проекта</label>
                <select name="status" id="status" class="border-1 border-stone-300 rounded">
                    @foreach(['черновик', 'в работе', 'завершён', 'заморожен'] as $status)
                        <option value="{{$status}}" @selected(old('status', $project->status) === $status)>{{$status}}</option>
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

        <form action="{{route('projects.destroy', $project->id)}}"
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
