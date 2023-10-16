<x-layout>
    <x-slot name="title">
        カテゴリ - 新規作成
    </x-slot>

    <header>
        <h1>カテゴリ - 新規作成</h1>
        <a href="{{ route('index') }}" class="button back">TOPページに戻る</a>
    </header>

    <div class="block">
        <form method="post" action="{{ route('categories.store') }}">
            @csrf

            <div class="input-block">
                <label>
                    カテゴリ名
                    <input type="text" name="name" value="{{ old('name') }}">
                </label>
                @error('name')
                    <p class="notice">{{ $message }}</p>
                @enderror
            </div>
            <button class="button save">保存</button>
        </form>
    </div>
</x-layout>
