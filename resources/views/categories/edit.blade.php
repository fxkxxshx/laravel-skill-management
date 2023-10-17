<x-layout>
    <x-slot name="title">
        カテゴリ - 編集
    </x-slot>

    <header>
        <h1>カテゴリ - 編集</h1>
        <a href="{{ route('index') }}" class="button back">TOPページに戻る</a>
    </header>

    <div class="block">
        <form method="post" action="{{ route('categories.update', $category) }}">
            @method('PATCH')
            @csrf

            <div class="input-block">
                <label>
                    カテゴリ名
                    <input type="text" name="name" value="{{ old('name', $category->name) }}">
                </label>
                @error('name')
                    <p class="notice">{{ $message }}</p>
                @enderror
            </div>
            <button class="button save">保存</button>
        </form>
    </div>
</x-layout>
