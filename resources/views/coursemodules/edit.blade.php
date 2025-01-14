<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Course Module') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div>
                <form action="{{ route('coursemodules.update', $coursemodule->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    @include('coursemodules._form')
                </form>
            </div>
        </div>

    </div>
</x-app-layout>
