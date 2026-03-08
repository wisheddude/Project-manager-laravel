@extends('layouts.app')


@section('title', 'Создание')

@section('main')
    <form action="{{route('projects.store')}}"
          method="POST"
          class="min-h-96 w-xl px-8 py-8 shadow-stone-500 shadow rounded-lg flex flex-col gap-3.5">
        @csrf
        <h1 class="text-3xl">Создание проекта</h1>

        <div>
            <label for="name" class="font-light">Наименование проекта</label>
            <input id="name"
                   name="name"
                   type="text"
                   class="w-full border border-stone-300 py-4 px-4 rounded-lg">
        </div>

        <div>
            <label for="description" class="font-light">Описание проекта</label>
            <textarea id="description"
                   name="description"
                   type="text"
                   class="w-full border border-stone-300 py-4 px-4 rounded-lg">
            </textarea>
        </div>

        <div class="flex flex-row gap-4">
            <div class="w-1/2">
                <label for="start_date" class="font-light">Дата начала</label>
                <input id="start_date"
                       name="start_date"
                       type="date"
                       class="w-full border border-stone-300 py-4 px-4 rounded-lg">
            </div>
            <div class="w-1/2">
                <label for="end_date" class="font-light">Дата окончания</label>
                <input id="end_date"
                       name="end_date"
                       type="date"
                       class="w-full border border-stone-300 py-4 px-4 rounded-lg">
            </div>
        </div>

        <p>Важно: проект должен быть определён в промежутке времени. Дата начала проекта должна быть сегодня или в будущем времени.</p>

        <div class="flex items-center justify-between">
            <button class="px-8 py-3.5 self-start bg-cyan-500 rounded-lg text-2xl text-white hover:bg-cyan-600 transition cursor-pointer"
                    type="submit">Создать</button>
        </div>


        @error('name')
        <p class="text-red-500 mt-2">{{ $message }}</p>
        @enderror
    </form>
@endsection
