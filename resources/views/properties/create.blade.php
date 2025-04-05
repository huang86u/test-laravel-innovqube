@extends('layouts.app')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Ajouter un bien</h2>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>- {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('properties.store') }}" method="POST" class="space-y-4 bg-white p-6 rounded-2xl shadow">
        @csrf

        <div>
            <label for="name" class="block font-semibold">Nom</label>
            <input type="text" name="name" id="name" class="w-full border p-2 rounded" required>
        </div>

        <div>
            <label for="description" class="block font-semibold">Description</label>
            <textarea name="description" id="description" class="w-full border p-2 rounded" required></textarea>
        </div>

        <div>
            <label for="price_per_night" class="block font-semibold">Prix par nuit (€)</label>
            <input type="number" name="price_per_night" id="price_per_night" class="w-full border p-2 rounded" required>
        </div>

        <button type="submit" class="bg-primary text-white px-4 py-2 rounded hover:bg-blue-800">Ajouter</button>
    </form>
@endsection
