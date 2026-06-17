<x-app-layout>
   <div>
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
            <div class="container mx-auto px-6 py-2">
                <div class="flex items-center justify-end gap-3">
                  @can('User create')
                    <a href="{{ route('admin.users.bulk-create') }}"
                       class="inline-flex items-center gap-1.5 bg-purple-600 text-white font-bold px-5 py-1.5 rounded shadow hover:bg-purple-700 transition-colors text-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                        Bulk Create Sales Agents
                    </a>
                    <a href="{{route('admin.users.create')}}" class="bg-blue-500 text-white font-bold px-5 py-1.5 rounded shadow hover:bg-blue-600 transition-colors text-sm">New User</a>
                  @endcan
                </div>

              <div class="bg-white shadow-md rounded my-6">
                <table class="text-left w-full border-collapse">
                  <thead>
                    <tr>
                      <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">User Name</th>
                      <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">Role</th>
                      <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light">Status</th>
                      <th class="py-4 px-6 bg-grey-lightest font-bold text-sm text-grey-dark border-b border-grey-light text-right">Actions</th>
                    </tr>
                  </thead>
                  <tbody>

                    @can('User access')
                      @foreach($users as $user)
                      <tr class="hover:bg-grey-lighter">
                        <td class="py-4 px-6 border-b border-grey-light">{{ $user->name }}</td>
                        <td class="py-4 px-6 border-b border-grey-light">
                            @foreach($user->roles as $role)
                              <span class="inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-white bg-gray-500 rounded-full">{{ $role->name }}</span>
                            @endforeach
                        </td>
                        <td class="py-4 px-6 border-b border-grey-light">
                            @if($user->is_active)
                                <span class="inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-green-700 bg-green-100 rounded-full">Active</span>
                            @else
                                <span class="inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-red-700 bg-red-100 rounded-full">Inactive</span>
                            @endif
                        </td>
                        <td class="py-4 px-6 border-b border-grey-light text-right">
                          @can('User edit')
                          <form action="{{ route('admin.users.toggle-active', $user->id) }}" method="POST" class="inline">
                              @csrf
                              <button class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-blue hover:bg-blue-dark {{ $user->is_active ? 'text-yellow-500' : 'text-green-500' }}">
                                  {{ $user->is_active ? 'Deactivate' : 'Activate' }}
                              </button>
                          </form>
                          <a href="{{route('admin.users.edit',$user->id)}}" class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-green hover:bg-green-dark text-blue-400">Edit</a>
                          @endcan

                          @can('User delete')
                          <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="inline">
                              @csrf
                              @method('delete')
                              <button class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-blue hover:bg-blue-dark text-red-400">Delete</button>
                          </form>
                          @endcan

                        </td>
                      </tr>
                      @endforeach
                    @endcan

                  </tbody>
                </table>
              </div>

            </div>
        </main>
    </div>
</x-app-layout>
