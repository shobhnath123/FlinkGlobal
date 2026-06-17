<x-app-layout>
    <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
        <div class="container mx-auto px-4 sm:px-6 py-8">
            <div class="max-w-2xl mx-auto">
                <div class="flex items-center justify-between mb-6">
                    <h1 class="text-2xl font-semibold text-gray-800">Generate Form Request</h1>
                    <a href="{{ route('admin.client-form-requests.index') }}" class="text-blue-600 hover:text-blue-800 font-medium transition-colors">
                        &larr; Back to List
                    </a>
                </div>

                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <div class="p-6">
                        <form action="{{ route('admin.client-form-requests.store') }}" method="POST">
                            @csrf
                            
                            <div class="mb-5">
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Client Email Address</label>
                                <input type="email" name="email" id="email" value="{{ old('email') }}" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500 transition-colors" placeholder="client@example.com">
                                @error('email')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-6">
                                <label for="form_type" class="block text-sm font-medium text-gray-700 mb-2">Application Type</label>
                                <select name="form_type" id="form_type" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500 transition-colors">
                                    <option value="" disabled selected>Select an application type</option>
                                    <option value="credit" {{ old('form_type') == 'credit' ? 'selected' : '' }}>Business Credit Application</option>
                                    <option value="cash" {{ old('form_type') == 'cash' ? 'selected' : '' }}>Business Cash Application</option>
                                </select>
                                @error('form_type')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                                <p class="mt-2 text-sm text-gray-500">This determines which form the client will see when they click the link.</p>
                            </div>

                            <div class="flex justify-end pt-4 border-t border-gray-100">
                                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded transition-colors focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                    Generate & Send Link
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>
