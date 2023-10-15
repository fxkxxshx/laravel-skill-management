<x-layout>
    <x-slot name="title">
        カテゴリ編集
    </x-slot>

    <h1>カテゴリ編集</h1>
    <a href="{{ route('index') }}">TOPページに戻る</a>

    <form method="post" action="{{ route('categories.update', $category) }}">
        @method('PATCH')
        @csrf

        <label>
            カテゴリ名
            <input type="text" name="name" value="{{ old('name', $category->name) }}">
        </label>
        @error('name')
            <p>{{ $message }}</p>
        @enderror
        <button>保存</button>
    </form>
</x-layout>
