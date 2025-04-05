@props(['title' => ''])

<x-layouts.app :title="$title">
    {{ $slot }}
</x-layouts.app>
