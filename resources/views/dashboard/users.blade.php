<x-app-layout>
    @section('title', 'users | ')
    <div class="flex-1 p-10 flex-col">
        <h1 class="text-white font-bold text-2xl">Users</h1>
        
        <div class="mt-6">
            <table class="min-w-full bg-transparent rounded-lg overflow-hidden">
                <thead class="border-b border-white/10">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Username</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Admin</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-700">
                    @foreach($users as $user)
                        <tr class="hover:bg-white/10">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">{{ $user->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">{{ $user->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">{{ $user->email }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                                @if($user->is_admin)
                                    <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                @else
                                    <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">
                                <div class="flex gap-2">
                                    <form method="POST" action="{{ route('users.toggle-admin', $user) }}">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" 
                                            class="px-3 py-1 text-sm text-gray-300 hover:bg-gray-700 rounded-md border border-gray-700">
                                            {{ $user->is_admin ? 'Remove Admin' : 'Make Admin' }}
                                        </button>
                                    </form>
                                    
                                    <form method="POST" action="{{ route('users.destroy', $user) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                            class="px-3 py-1 text-sm text-red-400 hover:bg-gray-700 rounded-md border border-gray-700"
                                            onclick="return confirm('Are you sure you want to delete this user?')">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
