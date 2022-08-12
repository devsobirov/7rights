<div class="list-group">
    <a href="{{ route('homepage') }}" class="@if(request()->routeIs('homepage')) active @endif list-group-item list-group-item-action">
        Главная
    </a>
    <a href="{{ route('docs.index') }}" class="@if(request()->routeIs('docs.*')) active @endif list-group-item list-group-item-action">
        Документы
    </a>
    @auth
        <a href="{{ route('my-docs.index') }}" class="@if(request()->routeIs('my-docs.*')) active @endif list-group-item list-group-item-action">
            Мои Документы
        </a>
    @endauth
</div>
