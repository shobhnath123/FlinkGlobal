<x-app-layout>
    <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
        <div class="container mx-auto px-4 sm:px-6 py-8">
            <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center mb-6">
                <div>
                    <h1 class="text-2xl font-semibold text-gray-800">Client Form Requests</h1>
                    <p class="text-sm text-gray-600 mt-1">Manage unique form links sent to clients.</p>
                </div>
                <div class="mt-4 sm:mt-0">
                    @canany(['ClientForm access', 'ClientForm create'])
                    <a href="{{ route('admin.client-form-requests.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-flex items-center transition-colors">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        New Request
                    </a>
                    @endcanany
                </div>
            </div>

            @if(session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 shadow-sm" role="alert">
                    <p class="font-bold">Success</p>
                    <p>{{ session('success') }}</p>
                </div>
            @endif

            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full leading-normal">
                        <thead>
                            <tr>
                                <th class="px-5 py-4 border-b-2 border-gray-200 bg-gray-50 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Recipient Email
                                </th>
                                <th class="px-5 py-4 border-b-2 border-gray-200 bg-gray-50 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Form Type
                                </th>
                                <th class="px-5 py-4 border-b-2 border-gray-200 bg-gray-50 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Form Status
                                </th>
                                <th class="px-5 py-4 border-b-2 border-gray-200 bg-gray-50 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Mail Status
                                </th>
                                <th class="px-5 py-4 border-b-2 border-gray-200 bg-gray-50 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Created By
                                </th>
                                <th class="px-5 py-4 border-b-2 border-gray-200 bg-gray-50 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Date
                                </th>
                                <th class="px-5 py-4 border-b-2 border-gray-200 bg-gray-50 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider text-right">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($requests as $req)
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-5 py-4 border-b border-gray-200 text-sm">
                                        <p class="text-gray-900 font-medium">{{ $req->email }}</p>
                                    </td>
                                    <td class="px-5 py-4 border-b border-gray-200 text-sm">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ strtolower($req->form_type) === 'credit' ? 'bg-indigo-100 text-indigo-800' : 'bg-yellow-100 text-yellow-800' }}">
                                            {{ ucfirst($req->form_type) }}
                                        </span>
                                    </td>
                                    <td class="px-5 py-4 border-b border-gray-200 text-sm">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $req->status === 'submitted' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                            {{ ucfirst($req->status) }}
                                        </span>
                                    </td>
                                    <td class="px-5 py-4 border-b border-gray-200 text-sm">
                                        @php
                                            $mailBadgeColor = match($req->mail_status) {
                                                'Sent' => 'bg-green-100 text-green-800',
                                                'Failed' => 'bg-red-100 text-red-800',
                                                default => 'bg-yellow-100 text-yellow-800',
                                            };
                                        @endphp
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $mailBadgeColor }}">
                                            {{ $req->mail_status ?? 'Pending' }}
                                        </span>
                                    </td>
                                    <td class="px-5 py-4 border-b border-gray-200 text-sm">
                                        <p class="text-gray-900">{{ $req->user->name ?? 'Unknown' }}</p>
                                    </td>
                                    <td class="px-5 py-4 border-b border-gray-200 text-sm">
                                        <p class="text-gray-900 whitespace-nowrap">{{ $req->created_at->format('M d, Y H:i') }}</p>
                                    </td>
                                    <td class="px-5 py-4 border-b border-gray-200 text-sm text-right whitespace-nowrap">
                                        <button onclick="copyToClipboard('{{ route('client.form.show', $req->token) }}')" class="text-blue-600 hover:text-blue-900 bg-blue-50 hover:bg-blue-100 px-3 py-1 rounded transition-colors text-xs font-medium focus:outline-none focus:ring-2 focus:ring-blue-500 mr-2">
                                            Copy Link
                                        </button>
                                        <button onclick="openResendModal({{ $req->id }}, '{{ $req->email }}')" class="text-orange-600 hover:text-orange-900 bg-orange-50 hover:bg-orange-100 px-3 py-1 rounded transition-colors text-xs font-medium focus:outline-none focus:ring-2 focus:ring-orange-500">
                                            Edit & Resend
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-5 py-8 border-b border-gray-200 text-sm text-center text-gray-500">
                                        No form requests found.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="px-5 py-4 bg-white border-t border-gray-200 flex flex-col xs:flex-row items-center xs:justify-between">
                    {{ $requests->links() }}
                </div>
            </div>
        </div>
    </main>

    <!-- Resend Modal -->
    <div id="resendModal" class="fixed inset-0 z-50 hidden overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true" onclick="closeResendModal()"></div>

            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <form id="resendForm" method="POST" action="">
                    @csrf
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-orange-100 sm:mx-0 sm:h-10 sm:w-10">
                                <svg class="h-6 w-6 text-orange-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                    Edit Email & Resend Link
                                </h3>
                                <div class="mt-2">
                                    <p class="text-sm text-gray-500 mb-4">
                                        Update the recipient's email address below if it was incorrect, and click Resend to email the form link again.
                                    </p>
                                    <label for="resend_email" class="block text-sm font-medium text-gray-700">Recipient Email</label>
                                    <input type="email" name="email" id="resend_email" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <button type="submit" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                            Resend Email
                        </button>
                        <button type="button" onclick="closeResendModal()" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                            Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function copyToClipboard(text) {
            navigator.clipboard.writeText(text).then(function() {
                alert('Link copied to clipboard!');
            }, function(err) {
                console.error('Could not copy text: ', err);
            });
        }

        function openResendModal(id, currentEmail) {
            document.getElementById('resend_email').value = currentEmail;
            
            // Set the form action dynamically
            let form = document.getElementById('resendForm');
            form.action = `/admin/client-form-requests/${id}/resend`;
            
            document.getElementById('resendModal').classList.remove('hidden');
        }

        function closeResendModal() {
            document.getElementById('resendModal').classList.add('hidden');
        }
    </script>
</x-app-layout>
