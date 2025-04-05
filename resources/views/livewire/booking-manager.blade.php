<div class="bg-white p-6 rounded shadow">
    <h3 class="text-lg font-semibold mb-4">Réserver un bien</h3>

    @if (session()->has('message'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="createBooking" class="space-y-4">
        <div>
            <label for="propertyId" class="block font-bold">Bien</label>
            <select wire:model="propertyId" class="w-full border p-2 rounded">
                <option value="">-- Choisir un bien --</option>
                @foreach ($properties as $property)
                    <option value="{{ $property->id }}">{{ $property->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="startDate" class="block font-bold">Date de début</label>
            <input type="date" wire:model="startDate" class="w-full border p-2 rounded">
        </div>

        <div>
            <label for="endDate" class="block font-bold">Date de fin</label>
            <input type="date" wire:model="endDate" class="w-full border p-2 rounded">
        </div>

        <button type="submit" class="bg-secondary text-white px-4 py-2 rounded hover:bg-purple-700">
            Réserver
        </button>
    </form>
</div>
