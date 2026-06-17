<x-app-layout>
    <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
        <div class="container mx-auto px-4 sm:px-6 py-8">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold text-gray-800">Mail Log #{{ $mailLog->id }}</h1>
                <a href="{{ route('admin.mail-logs.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Back</a>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Main Info -->
                <div class="lg:col-span-2">
                    <div class="bg-white shadow-md rounded p-6 mb-6">
                        <h2 class="text-lg font-semibold text-gray-800 mb-4">Email Details</h2>
                        <table class="w-full">
                            <tr class="border-b">
                                <td class="py-2 font-medium text-gray-700 w-32">Type:</td>
                                <td class="py-2">
                                    <span class="bg-purple-200 text-purple-800 px-3 py-1 rounded-full text-sm font-bold">{{ $mailLog->type }}</span>
                                </td>
                            </tr>
                            <tr class="border-b">
                                <td class="py-2 font-medium text-gray-700">Status:</td>
                                <td class="py-2">
                                    @if($mailLog->status === 'sent')
                                        <span class="bg-green-500 text-white px-3 py-1 rounded-full text-sm font-bold">Sent</span>
                                    @elseif($mailLog->status === 'failed')
                                        <span class="bg-red-500 text-white px-3 py-1 rounded-full text-sm font-bold">Failed</span>
                                    @else
                                        <span class="bg-yellow-500 text-white px-3 py-1 rounded-full text-sm font-bold">Pending</span>
                                    @endif
                                </td>
                            </tr>
                            <tr class="border-b">
                                <td class="py-2 font-medium text-gray-700">To:</td>
                                <td class="py-2"><a href="mailto:{{ $mailLog->recipient_email }}" class="text-blue-600 hover:underline">{{ $mailLog->recipient_email }}</a></td>
                            </tr>
                            <tr class="border-b">
                                <td class="py-2 font-medium text-gray-700">Subject:</td>
                                <td class="py-2">{{ $mailLog->subject }}</td>
                            </tr>
                            <tr class="border-b">
                                <td class="py-2 font-medium text-gray-700">Sent At:</td>
                                <td class="py-2">{{ $mailLog->created_at?->format('d M Y H:i:s') }}</td>
                            </tr>
                            <tr class="border-b">
                                <td class="py-2 font-medium text-gray-700">IP Address:</td>
                                <td class="py-2">{{ $mailLog->ip_address ?? 'N/A' }}</td>
                            </tr>
                        </table>
                    </div>

                    <!-- Email Body -->
                    @if($mailLog->body)
                    <div class="bg-white shadow-md rounded p-6 mb-6">
                        <h2 class="text-lg font-semibold text-gray-800 mb-4">Email Body</h2>
                        <div class="bg-gray-50 p-4 rounded border border-gray-200 max-h-96 overflow-y-auto">
                            {!! nl2br(e($mailLog->body)) !!}
                        </div>
                    </div>
                    @endif

                    <!-- Attachments -->
                    @if($mailLog->attachment_details && count($mailLog->attachment_details) > 0)
                    <div class="bg-white shadow-md rounded p-6">
                        <h2 class="text-lg font-semibold text-gray-800 mb-4">Attachments</h2>
                        <div class="space-y-2">
                            @foreach($mailLog->attachment_details as $attachment)
                            <div class="flex items-center justify-between p-3 bg-gray-50 rounded border border-gray-200">
                                <div>
                                    <p class="font-medium text-gray-800">{{ $attachment['name'] ?? 'Unknown' }}</p>
                                    <p class="text-sm text-gray-600">Size: {{ isset($attachment['size']) ? number_format($attachment['size'] / 1024, 2) . ' KB' : 'N/A' }}</p>
                                </div>
                                <p class="text-sm text-gray-600">{{ $attachment['mime'] ?? 'N/A' }}</p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>

                <!-- Sidebar -->
                <div>
                    @if($mailLog->status === 'failed' && $mailLog->error_message)
                    <div class="bg-white shadow-md rounded p-6 mb-6 border-l-4 border-red-500">
                        <h2 class="text-lg font-semibold text-red-700 mb-4">Error Details</h2>
                        <div class="bg-red-50 p-3 rounded text-sm text-red-700 max-h-48 overflow-y-auto">
                            <code>{{ $mailLog->error_message }}</code>
                        </div>
                    </div>
                    @endif

                    <div class="bg-white shadow-md rounded p-6">
                        <h2 class="text-lg font-semibold text-gray-800 mb-4">Actions</h2>
                        <form action="{{ route('admin.mail-logs.destroy', $mailLog->id) }}" method="POST" class="w-full">
                            @csrf
                            @method('delete')
                            <button type="submit" class="w-full bg-red-600 text-white font-bold px-4 py-2 rounded hover:bg-red-700 transition-colors" onclick="return confirm('Are you sure you want to delete this mail log?')">
                                Delete Log
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>
