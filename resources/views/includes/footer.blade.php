<div class="flex flex-row">
    <div class="w-full flex flex-col gap-1">
        <p class="text-xl font-semibold mb-2">Навигация</p>
        <a href="{{route('home')}}" class="underline">Главная</a>
        <a href="{{route('login')}}" class="underline">Авторизация</a>
        <a href="{{route('register')}}" class="underline">Регистрация</a>
    </div>


    <div class="w-1/3 flex flex-col gap-1">
        <p class="text-xl font-semibold mb-2">Документы</p>
        <a href="" target="_blank" class="underline">Пользовательское соглашение</a>
    </div>
</div>
<p class="text-right text-xs">
    {{now()->year}}
    <a href="https://t.me/CosmicRapture" target="_blank" class="underline">CosmicRapture</a>.
    Все права защищены
</p>
