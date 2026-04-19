<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-blue-800 leading-tight">
            Edit Supplier
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md rounded-lg p-6">

                <form action="{{ route('suppliers.update', $supplier->id) }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                        <input type="text" name="name" value="{{ $supplier->name }}"
                               class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring focus:ring-blue-200">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input type="email" name="email" value="{{ $supplier->email }}"
                               class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring focus:ring-blue-200">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Phone</label>
                        <input type="text" name="phone" value="{{ $supplier->phone }}"
                               class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring focus:ring-blue-200">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Address</label>
                        <textarea name="address" rows="4"
                                  class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring focus:ring-blue-200">{{ $supplier->address }}</textarea>
                    </div>

                    <div class="flex gap-2">
                        <button type="submit"
                                class="bg-green-600 hover:bg-green-700 text-black px-4 py-2 rounded-md">
                            Update
                        </button>

                        <a href="{{ route('suppliers.index') }}"
                            class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-md">
                            Cancel
                    
                        </a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>