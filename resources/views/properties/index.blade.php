@extends('layouts.app')

@section('content')
    <h2 class="text-2xl font-semibold mb-4">Biens disponibles</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach($properties as $property)
            <div class="bg-white rounded-2xl shadow p-4">
                <h3 class="text-lg font-bold">{{ $property->name }}</h3>
                <p class="text-sm text-gray-600">{{ $property->description }}</p>
                <p class="mt-2 text-primary font-semibold">{{ $property->price_per_night }} € / nuit</p>
            </div>
        @endforeach
        <a href="{{ route('properties.create') }}" class="inline-block bg-primary text-white px-4 py-2 rounded hover:bg-blue-800 mb-4">
        + Ajouter un bien
        </a>
    </div>
@endsection
