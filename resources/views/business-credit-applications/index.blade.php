<x-app-layout>
    <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
        <div class="container mx-auto px-4 sm:px-6 py-2">
            <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center mb-4">
                <div class="mb-4 sm:mb-0">
                    <h1 class="text-xl font-semibold text-gray-800">Business Credit Applications</h1>
                </div>
            </div>
            <!-- Filter and Export Section -->
            <div class="bg-white shadow-md rounded mb-6 p-3 sm:p-4">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                    <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                        <label for="application-type-filter" class="text-sm font-medium text-gray-700">Filter by Type:</label>
                        <form id="filter-form" method="GET" class="flex gap-2">
                            <select id="application-type-filter" name="application_type" class="px-3 py-2 border border-gray-300 rounded text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option value="">All Types</option>
                                @foreach($applicationTypes as $type)
                                    <option value="{{ $type }}" @selected($selectedType === $type)>{{ $type }}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="bg-blue-600 text-white font-bold px-3 py-2 rounded hover:bg-blue-700 transition-colors text-sm">Filter</button>
                            <a href="{{ route('admin.business-credit-applications.index') }}" class="bg-gray-500 text-white font-bold px-3 py-2 rounded hover:bg-gray-600 transition-colors text-sm">Reset</a>
                        </form>
                    </div>
                    <a href="{{ route('admin.business-credit-applications.export', request()->query()) }}" class="bg-green-600 text-white font-bold px-4 py-2 rounded hover:bg-green-700 transition-colors text-sm">
                        📥 Export to Excel
                    </a>
                </div>
            </div>

            <div class="bg-white shadow-md rounded my-6">
                <form id="bulk-delete-form" method="POST" action="{{ route('admin.business-credit-applications.bulk-delete') }}">
                    @csrf
                    @method('DELETE')
                    <div class="p-3 sm:p-4 border-b border-grey-light">
                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between space-y-3 sm:space-y-0">
                            <div class="flex flex-col sm:flex-row sm:items-center space-y-2 sm:space-y-0 sm:space-x-4">
                                <label class="flex items-center">
                                    <input type="checkbox" id="select-all" class="form-checkbox h-5 w-5 text-blue-600">
                                    <span class="ml-2 text-sm text-gray-700">Select All</span>
                                </label>
                                <button type="button" id="bulk-delete-btn" class="bg-red-500 text-white font-bold px-3 py-2 sm:px-4 rounded focus:outline-none shadow hover:bg-red-600 transition-colors disabled:opacity-50 disabled:cursor-not-allowed text-sm" disabled>
                                    Delete Selected
                                </button>
                            </div>
                            <div class="text-sm text-gray-600">
                                <span id="selected-count">0</span> items selected
                            </div>
                        </div>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="text-left w-full border-collapse min-w-full">
                            <thead>
                                <tr>
                                    <th class="py-3 px-3 sm:py-4 sm:px-6 bg-grey-lightest font-bold text-xs sm:text-sm text-grey-dark border-b border-grey-light">
                                        <input type="checkbox" id="select-all-header" class="form-checkbox h-4 w-4 sm:h-5 sm:w-5 text-blue-600">
                                    </th>
                                    <th class="py-3 px-3 sm:py-4 sm:px-6 bg-grey-lightest font-bold text-xs sm:text-sm text-grey-dark border-b border-grey-light">#</th>
                                    <th class="py-3 px-3 sm:py-4 sm:px-6 bg-grey-lightest font-bold text-xs sm:text-sm text-grey-dark border-b border-grey-light">Trading Name</th>
                                    <th class="py-3 px-3 sm:py-4 sm:px-6 bg-grey-lightest font-bold text-xs sm:text-sm text-grey-dark border-b border-grey-light hidden md:table-cell">Contact Person</th>
                                    <th class="py-3 px-3 sm:py-4 sm:px-6 bg-grey-lightest font-bold text-xs sm:text-sm text-grey-dark border-b border-grey-light hidden lg:table-cell">Email</th>
                                    <th class="py-3 px-3 sm:py-4 sm:px-6 bg-grey-lightest font-bold text-xs sm:text-sm text-grey-dark border-b border-grey-light">Application Type</th>
                                    <th class="py-3 px-3 sm:py-4 sm:px-6 bg-grey-lightest font-bold text-xs sm:text-sm text-grey-dark border-b border-grey-light">Email Status</th>
                                    <th class="py-3 px-3 sm:py-4 sm:px-6 bg-grey-lightest font-bold text-xs sm:text-sm text-grey-dark border-b border-grey-light text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($applications as $app)
                                    <tr class="hover:bg-grey-lighter">
                                        <td class="py-2 px-3 sm:py-2 sm:px-4 border-b border-grey-light">
                                            <input type="checkbox" name="app_ids[]" value="{{ $app->id }}" class="row-checkbox form-checkbox h-4 w-4 sm:h-5 sm:w-5 text-blue-600">
                                        </td>
                                        <td class="py-3 px-3 sm:py-4 sm:px-6 border-b border-grey-light text-xs sm:text-sm">{{ $loop->iteration }}</td>
                                        <td class="py-2 px-3 sm:py-2 sm:px-4 border-b border-grey-light">
                                            <div class="max-w-xs sm:max-w-none">
                                                <div class="font-medium text-gray-900 text-sm sm:text-base">{{ $app->trading_name ?? 'N/A' }}</div>
                                                <div class="text-xs text-gray-500 md:hidden">{{ $app->contact_person ?? 'N/A' }}</div>
                                                <div class="text-xs text-gray-500 lg:hidden xl:block">{{ $app->legal_name ?? 'N/A' }}</div>
                                            </div>
                                        </td>
                                        <td class="py-3 px-3 sm:py-4 sm:px-6 border-b border-grey-light hidden md:table-cell text-sm">{{ $app->contact_person ?? 'N/A' }}</td>
                                        <td class="py-3 px-3 sm:py-4 sm:px-6 border-b border-grey-light hidden lg:table-cell text-sm">{{ $app->email ?? 'N/A' }}</td>
                                        
                                        <td class="py-2 px-3 sm:py-2 sm:px-4 border-b border-grey-light">
                                            <span class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none bg-blue-200 text-blue-800 rounded-full">{{ $app->application_type ?? 'N/A' }}</span>
                                        </td>
                                        
                                        <td class="py-2 px-3 sm:py-2 sm:px-4 border-b border-grey-light">
                                            @if($app->latestMailLog)
                                                @if($app->latestMailLog->status === 'sent')
                                                    <span class="text-white inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none bg-green-500 rounded-full">Email Sent</span>
                                                @elseif($app->latestMailLog->status === 'failed')
                                                    <span class="text-white inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none bg-red-500 rounded-full">Email Failed</span>
                                                @else
                                                    <span class="text-white inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none bg-yellow-500 rounded-full">{{ ucfirst($app->latestMailLog->status) }}</span>
                                                @endif
                                            @else
                                                <span class="text-white inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none bg-gray-500 rounded-full">No Email</span>
                                            @endif
                                        </td>
                                        <td class="py-3 px-3 sm:py-4 sm:px-6 border-b border-grey-light text-right">
                                            <div class="flex flex-col sm:flex-row gap-1 sm:gap-2 justify-end">
                                                @if(strtolower($app->application_type ?? '') === 'credit')
                                                    <a href="{{ route('business.credit.preview', $app->id) }}" class="text-blue-600 hover:text-blue-800 font-medium py-1 px-2 sm:px-3 rounded text-xs sm:text-sm bg-blue-50 hover:bg-blue-100 transition-colors">View</a>
                                                @else
                                                    <a href="{{ route('business.cash.preview', $app->id) }}" class="text-blue-600 hover:text-blue-800 font-medium py-1 px-2 sm:px-3 rounded text-xs sm:text-sm bg-blue-50 hover:bg-blue-100 transition-colors">View</a>
                                                @endif
                                                <form action="{{ route('admin.business-credit-applications.destroy', $app->id) }}" method="POST" class="inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="text-red-600 hover:text-red-800 font-medium py-1 px-2 sm:px-3 rounded text-xs sm:text-sm bg-red-50 hover:bg-red-100 transition-colors" onclick="return confirm('Are you sure you want to delete this application?')">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center py-8">
                                            <p class="text-gray-500">No business credit applications found.</p>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="flex justify-center sm:justify-end p-3 sm:p-4 py-6 sm:py-10">
                        {{ $applications->links() }}
                    </div>
                </form>
            </div>

        </div>
    </main>
    <style>
        /* Additional responsive styles */
        @media (max-width: 640px) {
            .table-responsive {
                font-size: 0.875rem;
            }

            .form-checkbox {
                transform: scale(1.2);
            }

            .copy-btn {
                padding: 0.25rem 0.5rem;
                font-size: 0.75rem;
            }
        }

        @media (max-width: 768px) {
            .container {
                padding-left: 1rem;
                padding-right: 1rem;
            }
        }

        /* Improve touch targets on mobile */
        @media (hover: none) and (pointer: coarse) {
            .copy-btn,
            .form-checkbox,
            a[href],
            button {
                min-height: 44px;
                min-width: 44px;
            }
        }

        /* Better table scrolling on small screens */
        .overflow-x-auto {
            -webkit-overflow-scrolling: touch;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const selectAllCheckbox = document.getElementById('select-all');
            const selectAllHeader = document.getElementById('select-all-header');
            const rowCheckboxes = document.querySelectorAll('.row-checkbox');
            const selectedCountSpan = document.getElementById('selected-count');
            const bulkDeleteBtn = document.getElementById('bulk-delete-btn');

            function updateSelectedCount() {
                const checkedCount = Array.from(rowCheckboxes).filter(cb => cb.checked).length;
                selectedCountSpan.textContent = checkedCount;
                bulkDeleteBtn.disabled = checkedCount === 0;
            }

            selectAllCheckbox.addEventListener('change', function() {
                rowCheckboxes.forEach(cb => {
                    cb.checked = this.checked;
                    selectAllHeader.checked = this.checked;
                });
                updateSelectedCount();
            });

            selectAllHeader.addEventListener('change', function() {
                rowCheckboxes.forEach(cb => {
                    cb.checked = this.checked;
                    selectAllCheckbox.checked = this.checked;
                });
                updateSelectedCount();
            });

            rowCheckboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    updateSelectedCount();
                    selectAllCheckbox.checked = Array.from(rowCheckboxes).every(cb => cb.checked);
                    selectAllHeader.checked = selectAllCheckbox.checked;
                });
            });

            bulkDeleteBtn.addEventListener('click', function(e) {
                if (!confirm('Are you sure you want to delete the selected applications?')) {
                    e.preventDefault();
                }
            });
        });
    </script>
</x-app-layout>
