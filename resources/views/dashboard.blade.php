<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Search') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="mb-4">
                    @if (session()->has('message'))
                        <div class="p-3 m-3 rounded bg-orange-500 text-orange-100 my-2">
                            {{ session('message') }}
                        </div>
                    @endif

                </div>

                <div class="max-w-1xl">
                    <div class="">
                        @if (count($errors) > 0)
                            <div class="bg-red-100 border border-red-400 text-red-700 my-5 mx-5 px-4 py-3 rounded relative"
                                role="alert">
                                @foreach ($errors->all() as $error)
                                    <span class="block sm:inline">{{ $error }}</span>
                                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                                        <svg class="fill-current h-6 w-6 text-red-500" role="button"
                                            {{ $error }}xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <title>Close</title>
                                            <path
                                                d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                                        </svg>
                                    </span>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
                <div class="p-6 text-gray-900 text-center">
                    <form action="{{ route('search') }}" method="POST">
                        @csrf
                        {{ __('') }}
                        <input type="text" name="ip" id="ip" placeholder="Enter IP Address"
                            class="min-w-0 flex-auto rounded-md border-0 bg-gray/5 px-3.5 py-2 text-gray shadow-sm ring-1 ring-inset ring-gray/10 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:text-sm sm:leading-6">
                        <button type="submit"
                            class="flex-none rounded-md bg-indigo-500 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Search</button>
                    </form>
                </div>

                <div class="text-right mr-4 mb-4">
                    <a href="{{ route('history') }}"
                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">View History</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
