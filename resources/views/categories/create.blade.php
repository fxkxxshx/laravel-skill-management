<x-layout>
    <x-slot name="title">
        カテゴリ新規作成
    </x-slot>

    <h1>カテゴリ新規作成</h1>
    <a href="{{ route('index') }}">TOPページに戻る</a>

    <form method="post" action="{{ route('categories.store') }}">
        @csrf

        <label>
            カテゴリ名
            <input type="text" name="name" value="{{ old('name') }}">
        </label>
        @error('name')
            <p>{{ $message }}</p>
        @enderror
        <button>保存</button>
    </form>
</x-layout>
