<x-app-layout>
   <div>
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
            <div class="container mx-auto px-6 py-8">

                
                <h3 class="text-gray-700 text-3xl font-medium">Welcome : {{ auth()->user()->name }}</h3>                

                <p>Role : <b>
                    @foreach(auth()->user()->roles as $role)
                        {{ $role->name }}
                    @endforeach 
                </b> </p>
  
                <!-- Statistics Cards -->
                <div class="mt-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Users Card -->
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-blue-500 text-white">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h4 class="text-gray-600 text-sm font-medium">Total Users</h4>
                                <p class="text-gray-800 text-2xl font-bold">{{ $userCount }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Posts Card -->
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-green-500 text-white">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h4 class="text-gray-600 text-sm font-medium">Total Posts</h4>
                                <p class="text-gray-800 text-2xl font-bold">{{ $postCount }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- My Posts Card (for non-superadmin users) -->
                    @if(!auth()->user()->hasRole('superadmin'))
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-purple-500 text-white">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h4 class="text-gray-600 text-sm font-medium">My Posts</h4>
                                <p class="text-gray-800 text-2xl font-bold">{{ auth()->user()->posts()->count() }}</p>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>

            </div>
        </main>
    </div>
</div>
</x-app-layout>

