<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-md rounded-lg p-6 mb-6">
                <h1 class="text-2xl font-bold text-gray-800 mb-2">
                    Welcome, {{ auth()->user()->name }}!
                </h1>
                <p class="text-gray-600">
                    Role: <span class="font-semibold uppercase">{{ auth()->user()->role }}</span>
                </p>

                @if(auth()->user()->role === 'admin')
                    <p class="text-green-600 mt-2">You have full access to manage supplier records.</p>
                @else
                    <p class="text-blue-600 mt-2">You have limited access to view supplier records.</p>
                @endif
            </div>

          
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <div class="bg-white shadow-md rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-700">Total Suppliers</h3>
                    <p class="text-3xl font-bold text-blue-600 mt-2">{{ $totalSuppliers }}</p>
                </div>



                <div class="bg-white shadow-md rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-700">System Module</h3>
                    <p class="text-xl font-bold text-purple-600 mt-2">Supplier Management</p>
                </div>
            </div>

           
            <div class="bg-white shadow-md rounded-lg p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-xl font-bold text-gray-800">Recent Suppliers</h3>

                    <a href="{{ route('suppliers.index') }}"
                       class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md text-sm">
                        View All
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full border border-gray-200">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-4 py-3 text-left border-b">Name</th>
                                <th class="px-4 py-3 text-left border-b">Email</th>
                                <th class="px-4 py-3 text-left border-b">Phone</th>
                                <th class="px-4 py-3 text-left border-b">Address</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentSuppliers as $supplier)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-4 py-3 border-b">{{ $supplier->name }}</td>
                                    <td class="px-4 py-3 border-b">{{ $supplier->email }}</td>
                                    <td class="px-4 py-3 border-b">{{ $supplier->phone }}</td>
                                    <td class="px-4 py-3 border-b">{{ $supplier->address }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-4 py-4 text-center text-gray-500">
                                        No supplier records found.
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