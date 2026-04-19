<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Supplier Management
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md rounded-lg p-6">

                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-2xl font-bold text-gray-800">Supplier List</h1>

                    @if(auth()->user()->role === 'admin')
                        <a href="{{ route('suppliers.create') }}"
                           class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md text-sm font-medium">
                            Add Supplier
                        </a>
                    @endif
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full border border-gray-200 rounded-lg overflow-hidden">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700 border-b">Name</th>
                                <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700 border-b">Email</th>
                                <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700 border-b">Phone</th>
                                <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700 border-b">Address</th>

                                @if(auth()->user()->role === 'admin')
                                    <th class="px-4 py-3 text-center text-sm font-semibold text-gray-700 border-b">Actions</th>
                                @endif
                            </tr>
                        </thead>

                        <tbody class="bg-white">
                            @forelse($suppliers as $supplier)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-4 py-3 border-b text-sm text-gray-800">{{ $supplier->name }}</td>
                                    <td class="px-4 py-3 border-b text-sm text-gray-800">{{ $supplier->email }}</td>
                                    <td class="px-4 py-3 border-b text-sm text-gray-800">{{ $supplier->phone }}</td>
                                    <td class="px-4 py-3 border-b text-sm text-gray-800">{{ $supplier->address }}</td>

                                    @if(auth()->user()->role === 'admin')
                                        <td class="px-4 py-3 border-b text-center">
                                            <div class="flex justify-center gap-2">
                                              <a href="{{ route('suppliers.edit', $supplier->id) }}"
                                                 class="bg-green-500 hover:bg-green-600 text-green px-3 py-1 rounded text-sm">Edit</a>

                                                <form action="{{ route('suppliers.destroy', $supplier->id) }}" method="POST"
                                                      onsubmit="return confirm('Are you sure you want to delete this supplier?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                       class="bg-red-500 hover:bg-red-600 text-red px-3 py-1 rounded text-sm">
                                                        Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    @endif
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-4 py-4 text-center text-gray-500">
                                        No suppliers found.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>