@extends('layouts.app')

@section('title', 'Главная')


@section('main')
    <div class="flex gap-6 w-full h-full px-10 py-4">

        <div class="w-1/3 flex flex-col gap-4 min-h-150 max-h-180 overflow-y-auto pb-6">
            @foreach($projects as $project)
                <div class="bg-white rounded-lg shadow p-4 relative cursor-pointer hover:bg-gray-100 transition project-card" data-project-id="{{$project->id}}">
                    <p class="text-lg font-semibold">{{ $project->name }}</p>
                    <p class="text-sm text-gray-500">{{ $project->description }}</p>
                    <div class="text-sm mt-2 flex justify-between">
                        <p>Статус: {{ $project->status }}</p>
                        <p>{{ $project->start_date }}</p>
                    </div>

                    <a href="{{route('projects.edit', $project->id)}}" class="absolute top-4 right-4 size-6">
                        <img src="{{asset('icons/cyan_pencil_100.png')}}" alt="">
                    </a>
                </div>
            @endforeach

                <a href="{{route('projects.create')}}">
                    <div class="bg-white rounded-lg shadow p-4 flex items-center justify-center cursor-pointer hover:bg-gray-100 transition">
                        <span class="text-5xl text-gray-400">+</span>
                    </div>
                </a>
        </div>

        <div class="flex-1 flex flex-col">
            <div class="overflow-x-auto">
                <div class="min-w-full border border-gray-200 rounded-lg">
                    <div class="bg-gray-100 py-4 px-2 flex flex-row">
                        <p class="w-20 text-center border-r-1 border-stone-400">№</p>
                        <p class="w-100 text-center border-r-1 border-stone-400">Наименование задачи</p>
                        <p class="w-90 text-center border-r-1 border-stone-400">Сотрудник</p>
                        <p class="w-40 text-center border-r-1 border-stone-400">Дата завершения</p>
                        <p class="w-30 text-center">Статус</p>
                    </div>
                    <div id="tasks-body" class="overflow-y-auto max-h-150">

                    </div>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('tasks.create') }}"
                   class="w-full inline-block px-4 py-3 bg-cyan-500 text-white text-center rounded-lg hover:bg-cyan-600 transition">
                    Добавить задачу
                </a>
            </div>
        </div>

    </div>
@endsection
