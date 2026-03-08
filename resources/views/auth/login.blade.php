@extends('layouts.app')

@section('title', 'Вход')

@section('main')
    <form action="{{route('login')}}"
          method="POST"
          class="min-h-96 w-xl px-8 py-8 shadow-stone-500 shadow rounded-lg flex flex-col gap-3.5">
        @csrf
        <h1 class="text-3xl">Вход</h1>


        <div>
            <label for="email" class="font-light">Почта</label>
            <input id="email"
                   name="email"
                   type="text"
                   class="w-full border border-stone-300 py-4 px-4 rounded-lg">
        </div>

        <div>
            <label for="password" class="font-light">Пароль</label>
            <input id="password"
                   name="password"
                   type="password"
                   class="w-full border border-stone-300 py-4 px-4 rounded-lg">
        </div>

        <div class="flex items-center justify-between">
            <button class="px-8 py-3.5 self-start bg-cyan-500 rounded-lg text-2xl text-white hover:bg-cyan-600 transition cursor-pointer"
                    type="submit">Войти</button>

            <p>У меня <a href="{{route('register')}}" class="text-cyan-700 underline">нет учётной записи</a></p>
        </div>


        @error('email')
        <p class="text-red-500 mt-2">{{ $message }}</p>
        @enderror
    </form>
@endsection
