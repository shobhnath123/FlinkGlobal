<x-app-layout>
    <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
        <div class="container mx-auto px-4 sm:px-6 py-2">
            <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center mb-4">
                <div class="mb-4 sm:mb-0">
                <h1 class="text-xl font-semibold text-gray-800">Form Management</h1>
                </div>
                <div class="flex justify-end hidden">
                @can('Post create')
                    <a href="{{route('admin.posts.create')}}" class="bg-blue-500 text-white font-bold px-4 py-2 rounded focus:outline-none shadow hover:bg-blue-600 transition-colors text-sm sm:text-base">New post</a>
                @endcan
                </div>
            </div>

            <div class="bg-white shadow-md rounded my-6">
            <form id="bulk-delete-form" method="POST" action="{{ route('admin.posts.bulk-delete') }}">
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
                    <form id="bulk-delete-form" method="POST" action="{{ route('admin.posts.bulk-delete') }}" class="inline">
                        @csrf
                        @method('DELETE')
                        <input type="checkbox" id="select-all-header" class="form-checkbox h-4 w-4 sm:h-5 sm:w-5 text-blue-600">
                    </form>
                    </th>
                    <th class="py-3 px-3 sm:py-4 sm:px-6 bg-grey-lightest font-bold text-xs sm:text-sm text-grey-dark border-b border-grey-light">#</th>
                    <th class="py-3 px-3 sm:py-4 sm:px-6 bg-grey-lightest font-bold text-xs sm:text-sm text-grey-dark border-b border-grey-light">Form Name</th>
                    <th class="py-3 px-3 sm:py-4 sm:px-6 bg-grey-lightest font-bold text-xs sm:text-sm text-grey-dark border-b border-grey-light hidden md:table-cell">Username</th>
                    <th class="py-3 px-3 sm:py-4 sm:px-6 bg-grey-lightest font-bold text-xs sm:text-sm text-grey-dark border-b border-grey-light hidden lg:table-cell">Form URL</th>
                    <th class="py-3 px-3 sm:py-4 sm:px-6 bg-grey-lightest font-bold text-xs sm:text-sm text-grey-dark border-b border-grey-light">Email Status</th>
                    <th class="py-3 px-3 sm:py-4 sm:px-6 bg-grey-lightest font-bold text-xs sm:text-sm text-grey-dark border-b border-grey-light text-right">Actions</th>
                </tr>
                </thead>
                <tbody>
                @can('Post access')
                    @foreach($posts as $post)
                    <tr class="hover:bg-grey-lighter">
                    <td class="py-2 px-3 sm:py-2 sm:px-4 border-b border-grey-light">
                        <input form="bulk-delete-form" type="checkbox" name="post_ids[]" value="{{ $post->id }}" class="row-checkbox form-checkbox h-4 w-4 sm:h-5 sm:w-5 text-blue-600">
                    </td>
                    <td class="py-3 px-3 sm:py-4 sm:px-6 border-b border-grey-light text-xs sm:text-sm">{{  $loop->iteration }}</td>
                    <td class="py-2 px-3 sm:py-2 sm:px-4 border-b border-grey-light">
                        <div class="max-w-xs sm:max-w-none">
                        <div class="font-medium text-gray-900 text-sm sm:text-base">{{ Str::limit($post->title, 30) }}</div>
                        <div class="text-xs text-gray-500 md:hidden">{{ $post->username }}</div>
                        <div class="text-xs text-gray-500 lg:hidden xl:block">{{ Str::limit($post->url, 25) }}</div>
                        </div>
                    </td>
                    <td class="py-3 px-3 sm:py-4 sm:px-6 border-b border-grey-light hidden md:table-cell text-sm">{{ $post->username }}</td>
                    <td class="py-3 px-3 sm:py-4 sm:px-6 border-b border-grey-light hidden lg:table-cell">
                        <a href="{{ $post->url }}" target="_blank" class="text-blue-600 hover:text-blue-800 underline text-sm">{{ Str::limit($post->url, 25) }}</a>
                    </td>
                    
                    <td class="py-2 px-3 sm:py-2 sm:px-4 border-b border-grey-light">
                        @if($post->publish)
                        <span class="text-white inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none bg-green-500 rounded-full">Published</span>
                        @else
                        <span class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-gray-700 bg-gray-200 rounded-full">Draft</span>
                        @endif
                    </td>
                    <td class="py-3 px-3 sm:py-4 sm:px-6 border-b border-grey-light text-right">
                        <div class="flex flex-col sm:flex-row gap-1 sm:gap-2 justify-end">
                        @can('Post edit')
                        <a href="{{route('admin.posts.edit',$post->id)}}" class="text-blue-600 hover:text-blue-800 font-medium py-1 px-2 sm:px-3 rounded text-xs sm:text-sm bg-blue-50 hover:bg-blue-100 transition-colors">Edit</a>
                        @endcan

                        @can('Post delete')
                        <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" class="inline">
                            @csrf
                            @method('delete')
                            <button class="text-red-600 hover:text-red-800 font-medium py-1 px-2 sm:px-3 rounded text-xs sm:text-sm bg-red-50 hover:bg-red-100 transition-colors" onclick="return confirm('Are you sure you want to delete this post?')">Delete</button>
                        </form>
                        @endcan
                        </div>
                    </td>
                    </tr>
                    @endforeach
                    @endcan
                </tbody>
            </table>
            </div>

            @can('Post access')
            <div class="flex justify-center sm:justify-end p-3 sm:p-4 py-6 sm:py-10">
                {{ $posts->links() }}
            </div>
            @endcan
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

    /* Copy button specific styles */
    .copy-btn {
    transition: all 0.2s ease;
    user-select: none;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    }

    .copy-btn:focus {
    outline: 2px solid #3b82f6;
    outline-offset: 2px;
    }
    </style>

    <script>
    // Bulk selection functionality
    document.addEventListener('DOMContentLoaded', function() {
        const selectAllCheckbox = document.getElementById('select-all');
        const selectAllHeaderCheckbox = document.getElementById('select-all-header');
        const rowCheckboxes = document.querySelectorAll('.row-checkbox');
        const bulkDeleteBtn = document.getElementById('bulk-delete-btn');
        const selectedCount = document.getElementById('selected-count');

        // Function to update selected count and button state
        function updateSelection() {
        const checkedBoxes = document.querySelectorAll('.row-checkbox:checked');
        const count = checkedBoxes.length;
        selectedCount.textContent = count;
        bulkDeleteBtn.disabled = count === 0;

        // Update button text for mobile
        if (window.innerWidth < 640) {
            bulkDeleteBtn.textContent = count > 0 ? `Delete (${count})` : 'Delete Selected';
        }
        }

        // Handle select all checkbox
        selectAllCheckbox.addEventListener('change', function() {
        rowCheckboxes.forEach(checkbox => {
            checkbox.checked = this.checked;
        });
        selectAllHeaderCheckbox.checked = this.checked;
        updateSelection();
        });

        // Handle header select all checkbox
        selectAllHeaderCheckbox.addEventListener('change', function() {
        rowCheckboxes.forEach(checkbox => {
            checkbox.checked = this.checked;
        });
        selectAllCheckbox.checked = this.checked;
        updateSelection();
        });

        // Handle individual row checkboxes
        rowCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            const allChecked = Array.from(rowCheckboxes).every(cb => cb.checked);
            const someChecked = Array.from(rowCheckboxes).some(cb => cb.checked);

            selectAllCheckbox.checked = allChecked;
            selectAllHeaderCheckbox.checked = allChecked;
            selectAllCheckbox.indeterminate = someChecked && !allChecked;
            selectAllHeaderCheckbox.indeterminate = someChecked && !allChecked;

            updateSelection();
        });
        });

        // Handle bulk delete button click
        bulkDeleteBtn.addEventListener('click', function() {
        const checkedBoxes = document.querySelectorAll('.row-checkbox:checked');
        if (checkedBoxes.length === 0) {
            alert('Please select at least one post to delete.');
            return;
        }

        if (!confirm(`Are you sure you want to delete ${checkedBoxes.length} selected post(s)? This action cannot be undone.`)) {
            return;
        }

        // Submit the bulk delete form
        bulkDeleteForm.submit();
        });

        // Handle window resize for responsive button text
        window.addEventListener('resize', updateSelection);

        // Initial update
        updateSelection();
    });

    // Improved copy to clipboard function
    async function copyToClipboard(password, button) {
        const originalText = button.textContent;

        try {
        // Try modern clipboard API first (works on HTTPS/localhost)
        if (navigator.clipboard && navigator.clipboard.writeText) {
            await navigator.clipboard.writeText(password);
        } else {
            // Fallback to execCommand method
            const tempInput = document.createElement('input');
            tempInput.value = password;
            document.body.appendChild(tempInput);
            tempInput.select();
            tempInput.setSelectionRange(0, 99999);

            const successful = document.execCommand('copy');
            document.body.removeChild(tempInput);

            if (!successful) {
            throw new Error('Copy command failed');
            }
        }

        // Success feedback
        button.textContent = 'Copied!';
        button.classList.remove('bg-gray-200', 'hover:bg-gray-300');
        button.classList.add('bg-green-500', 'text-white');
        alert('Password copied to clipboard!');

        // Reset button after 2 seconds
        setTimeout(() => {
            button.textContent = originalText;
            button.classList.remove('bg-green-500', 'text-white');
            button.classList.add('bg-gray-200', 'hover:bg-gray-300');
        }, 2000);

        } catch (err) {
        console.error('Failed to copy password: ', err);

        // Try one more fallback method
        try {
            // Create a temporary textarea for better mobile support
            const tempTextarea = document.createElement('textarea');
            tempTextarea.value = password;
            tempTextarea.style.position = 'fixed';
            tempTextarea.style.left = '-9999px';
            document.body.appendChild(tempTextarea);
            tempTextarea.focus();
            tempTextarea.select();

            const successful = document.execCommand('copy');
            document.body.removeChild(tempTextarea);

            if (successful) {
            // Success with fallback
            button.textContent = 'Copied!';
            button.classList.remove('bg-gray-200', 'hover:bg-gray-300');
            button.classList.add('bg-green-500', 'text-white');
            alert('Password copied to clipboard!');

            setTimeout(() => {
                button.textContent = originalText;
                button.classList.remove('bg-green-500', 'text-white');
                button.classList.add('bg-gray-200', 'hover:bg-gray-300');
            }, 2000);
            return;
            }
        } catch (fallbackErr) {
            console.error('Fallback copy also failed: ', fallbackErr);
        }

        // If all methods fail, show error
        button.textContent = 'Failed';
        button.classList.remove('bg-gray-200', 'hover:bg-gray-300');
        button.classList.add('bg-red-500', 'text-white');

        setTimeout(() => {
            button.textContent = originalText;
            button.classList.remove('bg-red-500', 'text-white');
            button.classList.add('bg-gray-200', 'hover:bg-gray-300');
        }, 2000);

        // Also show alert for user
        alert('Unable to copy password. Please copy manually: ' + password);
        }
    }

    // Assign to window for global access
    window.copyToClipboard = copyToClipboard;
    </script>
</x-app-layout>
