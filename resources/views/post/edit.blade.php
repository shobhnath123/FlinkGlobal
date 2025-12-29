<x-app-layout>
   <div>
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
            <div class="container mx-auto px-6 py-1 pb-16">
              <div class="bg-white shadow-md rounded my-6 p-5">
                <form method="POST" action="{{ route('admin.posts.update',$post->id)}}">
                    @csrf
                    @method('put')
                    <div class="flex flex-col space-y-2">
                        <label for="title" class="text-gray-700 select-none font-medium">Title</label>
                        <input id="title" type="text" name="title" value="{{ old('title',$post->title) }}"
                        placeholder="Enter title" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200"
                        />
                    </div>

                    <div class="flex flex-col space-y-2">
                        <label for="username" class="text-gray-700 select-none font-medium">User Name</label>
                        <input id="username" type="text" name="username" value="{{ old('username', $post->username) }}" placeholder="Enter User Name" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" />
                    </div>

                    <div class="flex flex-col space-y-2">
                        <label for="website_password" class="text-gray-700 select-none font-medium">Enter Password</label>
                        <input id="website_password" type="text" name="website_password" value="{{ old('website_password', $post->decrypted_password) }}" placeholder="Enter Password" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" />
                    </div>

                    <div class="flex flex-col space-y-2">
                        <label for="rpassword" class="text-gray-700 select-none font-medium">Re-enter Password</label>
                        <input id="rpassword" type="text" name="rpassword" value="{{ old('rpassword', $post->title) }}" placeholder="**********" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" />
                    </div>

                    <div class="flex flex-col space-y-2">
                        <label for="url" class="text-gray-700 select-none font-medium">Web Site URL</label>
                        <input id="url" type="text" name="url" value="{{ old('url', $post->url) }}" placeholder="Enter URL" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" />
                    </div>

                    <div class="flex flex-col space-y-2">
                        <label for="description" class="text-gray-700 select-none font-medium">Description</label>
                        <textarea name="description" id="description" placeholder="Enter description" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" rows="5">{{ old('description',$post->description) }}</textarea>
                    </div>

                    @can('Post edit')
                      <div class="flex flex-col space-y-2">
                    <label for="user_ids" class="text-gray-700 select-none font-medium">Assign to Users</label>
                    <select name="user_ids[]" id="user_ids" multiple class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200">
                        @foreach(\App\Models\User::all() as $user)
                            <option value="{{ $user->id }}"
                                {{ in_array($user->id, old('user_ids', $post->users->pluck('id')->toArray())) ? 'selected' : '' }}>
                                {{ $user->name }} ({{ $user->email }})
                            </option>
                        @endforeach
                    </select>
                    <small class="text-gray-500">Hold Ctrl (Windows) / Cmd (Mac) to select multiple users</small>
                </div>
                    {{-- <div class="flex flex-col space-y-2">
                        <label for="user_id" class="text-gray-700 select-none font-medium">Assign to User</label>
                        <select name="user_id" id="user_id" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200">
                            @if(Auth::user()->hasRole('superadmin'))
                            <option value="">Select User</option>
                            @foreach(\App\Models\User::all() as $user)
                                <option value="{{ $user->id }}" {{ old('user_id', $post->user_id) == $user->id ? 'selected' : '' }}>{{ $user->name }} ({{ $user->email }})</option>
                            @endforeach
                            @else
                            <option value="{{ $post->user_id }}" selected>{{ $post->user->name ?? 'Unknown' }} ({{ $post->user->email ?? 'N/A' }})</option>
                            @endif
                        </select>
                    </div> --}}
                    @endcan

                    <h3 class="text-xl my-4 text-gray-600">Status</h3>
                    <div class="grid grid-cols-3 gap-4">
                        <div class="relative inline-flex">
                            <svg class="w-2 h-2 absolute top-0 right-0 m-4 pointer-events-none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 412 232"><path d="M206 171.144L42.678 7.822c-9.763-9.763-25.592-9.763-35.355 0-9.763 9.764-9.763 25.592 0 35.355l181 181c4.88 4.882 11.279 7.323 17.677 7.323s12.796-2.441 17.678-7.322l181-181c9.763-9.764 9.763-25.592 0-35.355-9.763-9.763-25.592-9.763-35.355 0L206 171.144z" fill="#648299" fill-rule="nonzero"/></svg>
                            <select class="border border-gray-300 rounded-full text-gray-600 h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none" name="publish">
                            <option value="0">Draft</option>
                            <option value="1" @if($post->publish) selected @endif>Publish</option>
                            </select>
                        </div>
                    </div>

                    <div class="text-center mt-16 mb-16">
                        <button type="submit" class="bg-blue-500 text-white font-bold px-5 py-1 rounded focus:outline-none shadow hover:bg-blue-500 transition-colors ">Submit</button>
                    </div>
                </div>
            </form>
            </div>
        </main>
    </div>
</x-app-layout>
