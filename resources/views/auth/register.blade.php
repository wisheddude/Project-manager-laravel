@extends('layouts.app')

@section('title', 'Регистрация')


@section('main')
    <form method="POST"
          action="{{route('register')}}"
          class="min-h-96 w-xl px-8 py-8 shadow-stone-500 shadow rounded-lg flex flex-col gap-3.5"
          >
        @csrf

        <h1 class="text-3xl">Регистрация</h1>

        <div>
            <label for="full_name" class="font-light">Введите ваше полное имя</label>
            <input id="full_name"
                   name="full_name"
                   type="text"
                   class="w-full border border-stone-300 py-4 px-4 rounded-lg">
        </div>

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

        <div>
            <label for="password_confirmation" class="font-light">Повторите пароль</label>
            <input id="password_confirmation"
                   name="password_confirmation"
                   type="password"
                   class="w-full border border-stone-300 py-4 px-4 rounded-lg">
        </div>

        <div class="flex items-center justify-between gap-3.5">
            <button class="px-8 py-3.5 bg-cyan-500 rounded-lg text-2xl text-white hover:bg-cyan-600 transition cursor-pointer"
                    type="submit">Зарегистрировать</button>

            <p>Продолжая, вы принимаете условия <a href="" class="text-cyan-700 underline">Пользовательского соглашения</a></p>
        </div>


        @error('email')
        <p class="text-red-500 mt-2">{{ $message }}</p>
        @enderror

    </form>
@endsection
