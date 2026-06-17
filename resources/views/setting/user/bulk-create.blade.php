<x-app-layout>
<div>
    <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
        <div class="container mx-auto px-6 py-4 pb-20">

            {{-- Page Header --}}
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h1 class="text-2xl font-bold text-gray-800">Bulk Create Sales Agents</h1>
                    <p class="text-sm text-gray-500 mt-1">Create multiple sales agent accounts in one submission.</p>
                </div>
                <a href="{{ route('admin.users.index') }}"
                   class="inline-flex items-center px-4 py-2 bg-gray-600 text-white text-sm font-semibold rounded-lg shadow hover:bg-gray-700 transition-colors">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                    Back to Users
                </a>
            </div>

            {{-- Info Banner --}}
            <div class="bg-blue-50 border border-blue-200 rounded-xl p-4 mb-6 flex items-start gap-3">
                <svg class="w-5 h-5 text-blue-500 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <div class="text-sm text-blue-700">
                    <strong>Automatic Role Assignment:</strong>
                    @if($salesAgentRole)
                        Each agent will automatically be assigned the <strong>"{{ $salesAgentRole->name }}"</strong> role.
                        You can override this per row using the role checkboxes.
                    @else
                        No <strong>"Sales Agent"</strong> role found. Please select a role manually for each row,
                        or create a "Sales Agent" role first.
                    @endif
                </div>
            </div>

            {{-- Main Form Card --}}
            <div class="bg-white shadow-xl rounded-2xl overflow-hidden">

                {{-- Card Header --}}
                <div class="bg-gradient-to-r from-indigo-600 to-purple-600 px-6 py-5 flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div class="bg-white bg-opacity-20 rounded-lg p-2">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-white font-bold text-lg">Sales Agent Accounts</h2>
                            <p class="text-indigo-200 text-xs">Add as many rows as needed</p>
                        </div>
                    </div>
                    <div class="bg-white bg-opacity-20 text-white text-sm font-semibold px-4 py-1.5 rounded-full" id="agent-count-badge">
                        <span id="agent-count">1</span> Agent(s)
                    </div>
                </div>

                <form method="POST" action="{{ route('admin.users.bulk-store') }}" id="bulk-agent-form">
                    @csrf

                    <div class="p-6">

                        {{-- Column Headers --}}
                        <div class="hidden md:grid md:grid-cols-12 gap-3 mb-3 px-2">
                            <div class="col-span-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">#&nbsp; Full Name</div>
                            <div class="col-span-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">Email Address</div>
                            <div class="col-span-2 text-xs font-semibold text-gray-500 uppercase tracking-wider">Password</div>
                            <div class="col-span-2 text-xs font-semibold text-gray-500 uppercase tracking-wider">Confirm Password</div>
                            <div class="col-span-1 text-xs font-semibold text-gray-500 uppercase tracking-wider">Role Override</div>
                            <div class="col-span-1 text-xs font-semibold text-gray-500 uppercase tracking-wider text-right">Action</div>
                        </div>

                        {{-- Agent Rows Container --}}
                        <div id="agents-container" class="space-y-3">
                            {{-- Rows injected by JS --}}
                        </div>

                        {{-- Add Row Button --}}
                        <button type="button" id="add-agent-btn"
                                class="mt-5 w-full flex items-center justify-center gap-2 border-2 border-dashed border-indigo-300 rounded-xl py-3 text-indigo-600 font-semibold text-sm
                                       hover:border-indigo-500 hover:bg-indigo-50 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-indigo-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                            </svg>
                            Add Another Agent
                        </button>

                        {{-- Divider --}}
                        <hr class="my-6 border-gray-200">

                        {{-- Submit Bar --}}
                        <div class="flex items-center justify-between flex-wrap gap-4">
                            <div class="text-sm text-gray-500">
                                <span id="summary-text">Ready to create <strong id="summary-count">1</strong> agent(s).</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <a href="{{ route('admin.users.index') }}"
                                   class="px-5 py-2.5 border border-gray-300 text-gray-600 text-sm font-semibold rounded-lg hover:bg-gray-50 transition-colors">
                                    Cancel
                                </a>
                                <button type="submit" id="submit-btn"
                                        class="inline-flex items-center gap-2 px-6 py-2.5 bg-gradient-to-r from-indigo-600 to-purple-600 text-white text-sm font-bold rounded-lg shadow-lg
                                               hover:from-indigo-700 hover:to-purple-700 active:scale-95 transition-all duration-150 focus:outline-none focus:ring-2 focus:ring-indigo-400">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M5 13l4 4L19 7"/>
                                    </svg>
                                    Create All Agents
                                </button>
                            </div>
                        </div>

                    </div>
                </form>
            </div>

        </div>
    </main>
</div>

{{-- Role Data for JS --}}
<script>
const ROLES = @json($roles->map(fn($r) => ['id' => $r->id, 'name' => $r->name]));
const PERMISSIONS = @json($permissions->map(fn($p) => ['id' => $p->id, 'name' => $p->name]));
const SALES_AGENT_ROLE_ID = @json($salesAgentRole ? $salesAgentRole->id : null);

let agentIndex = 0;

function createAgentRow(index) {
    const row = document.createElement('div');
    row.id = `agent-row-${index}`;
    row.className = 'agent-row bg-gray-50 border border-gray-200 rounded-xl p-4 transition-all duration-200 hover:border-indigo-200 hover:shadow-sm';
    row.style.opacity = '0';
    row.style.transform = 'translateY(-8px)';

    // Build role checkboxes HTML
    let roleCheckboxesHtml = '';
    if (ROLES.length > 0) {
        roleCheckboxesHtml = `
            <div class="relative">
                <button type="button" onclick="toggleRoleDropdown(${index})"
                        class="w-full flex items-center justify-between px-3 py-2 bg-white border border-gray-300 rounded-lg text-sm text-gray-700 hover:border-indigo-400 transition-colors focus:outline-none focus:ring-2 focus:ring-indigo-300">
                    <span id="role-label-${index}" class="truncate">
                        ${SALES_AGENT_ROLE_ID ? 'Sales Agent (auto)' : 'Select roles…'}
                    </span>
                    <svg class="w-4 h-4 ml-1 flex-shrink-0 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div id="role-dropdown-${index}"
                     class="hidden absolute z-50 top-full left-0 mt-1 w-56 bg-white border border-gray-200 rounded-xl shadow-xl p-2 max-h-48 overflow-y-auto">
                    ${ROLES.map(role => `
                        <label class="flex items-center gap-2 px-3 py-2 rounded-lg hover:bg-indigo-50 cursor-pointer text-sm text-gray-700">
                            <input type="checkbox"
                                   class="role-checkbox-${index} form-checkbox h-4 w-4 text-indigo-600 rounded"
                                   name="agents[${index}][roles][]"
                                   value="${role.id}"
                                   onchange="updateRoleLabel(${index})"
                                   ${role.id === SALES_AGENT_ROLE_ID ? 'checked' : ''}>
                            <span>${role.name}</span>
                        </label>
                    `).join('')}
                </div>
            </div>`;
    } else {
        roleCheckboxesHtml = `<p class="text-xs text-gray-400 italic">No roles</p>`;
    }

    let permissionCheckboxesHtml = '';
    if (PERMISSIONS.length > 0) {
        permissionCheckboxesHtml = `
            <div class="relative mt-2">
                <button type="button" onclick="togglePermissionDropdown(${index})"
                        class="w-full flex items-center justify-between px-3 py-2 bg-white border border-gray-300 rounded-lg text-sm text-gray-700 hover:border-indigo-400 transition-colors focus:outline-none focus:ring-2 focus:ring-indigo-300">
                    <span id="permission-label-${index}" class="truncate">Select permissions...</span>
                    <svg class="w-4 h-4 ml-1 flex-shrink-0 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div id="permission-dropdown-${index}"
                     class="hidden absolute z-50 top-full left-0 mt-1 w-64 bg-white border border-gray-200 rounded-xl shadow-xl p-2 max-h-48 overflow-y-auto">
                    ${PERMISSIONS.map(permission => `
                        <label class="flex items-center gap-2 px-3 py-2 rounded-lg hover:indigo-50 cursor-pointer text-sm text-gray-700">
                            <input type="checkbox"
                                   class="permission-checkbox-${index} form-checkbox h-4 w-4 text-indigo-600 rounded"
                                   name="agents[${index}][permissions][]"
                                   value="${permission.id}"
                                   onchange="updatePermissionLabel(${index})">
                            <span>${permission.name}</span>
                        </label>
                    `).join('')}
                </div>
            </div>`;
    }

    row.innerHTML = `
        <div class="grid grid-cols-1 md:grid-cols-12 gap-3 items-start">

            {{-- Row Number Badge --}}
            <div class="md:col-span-3 flex items-center gap-2">
                <span class="flex-shrink-0 bg-indigo-100 text-indigo-700 text-xs font-bold w-6 h-6 rounded-full flex items-center justify-center row-num">${index + 1}</span>
                <input type="text"
                       name="agents[${index}][name]"
                       placeholder="Full name"
                       required
                       class="flex-1 px-3 py-2 rounded-lg border border-gray-300 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-300 focus:border-indigo-400 transition-colors"
                />
            </div>

            <div class="md:col-span-3">
                <input type="email"
                       name="agents[${index}][email]"
                       placeholder="Email address"
                       required
                       class="w-full px-3 py-2 rounded-lg border border-gray-300 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-300 focus:border-indigo-400 transition-colors"
                />
            </div>

            <div class="md:col-span-2">
                <input type="password"
                       name="agents[${index}][password]"
                       placeholder="Password"
                       required
                       minlength="6"
                       class="w-full px-3 py-2 rounded-lg border border-gray-300 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-300 focus:border-indigo-400 transition-colors"
                />
            </div>

            <div class="md:col-span-2">
                <input type="password"
                       name="agents[${index}][password_confirmation]"
                       placeholder="Confirm password"
                       required
                       class="w-full px-3 py-2 rounded-lg border border-gray-300 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-300 focus:border-indigo-400 transition-colors"
                />
            </div>

            <div class="md:col-span-1 relative">
                ${roleCheckboxesHtml}
                ${permissionCheckboxesHtml}
            </div>

            <div class="md:col-span-1 flex justify-end">
                <button type="button"
                        onclick="removeAgentRow(${index})"
                        title="Remove this row"
                        class="remove-row-btn p-2 rounded-lg text-red-400 hover:bg-red-50 hover:text-red-600 transition-colors focus:outline-none focus:ring-2 focus:ring-red-200">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                    </svg>
                </button>
            </div>

        </div>`;

    return row;
}

function addAgentRow() {
    const container = document.getElementById('agents-container');
    const row = createAgentRow(agentIndex);
    container.appendChild(row);

    // Animate in
    requestAnimationFrame(() => {
        row.style.transition = 'opacity 0.25s ease, transform 0.25s ease';
        row.style.opacity   = '1';
        row.style.transform = 'translateY(0)';
    });

    agentIndex++;
    updateCounts();
    updateRemoveButtons();
}

function removeAgentRow(index) {
    const row = document.getElementById(`agent-row-${index}`);
    if (!row) return;

    // Disable remove if only 1 row left
    const rows = document.querySelectorAll('.agent-row');
    if (rows.length <= 1) return;

    row.style.transition = 'opacity 0.2s ease, transform 0.2s ease';
    row.style.opacity    = '0';
    row.style.transform  = 'translateY(-8px)';
    setTimeout(() => {
        row.remove();
        updateCounts();
        updateRemoveButtons();
    }, 200);
}

function toggleRoleDropdown(index) {
    const dropdown = document.getElementById(`role-dropdown-${index}`);
    // Close all other dropdowns
    document.querySelectorAll('[id^="role-dropdown-"], [id^="permission-dropdown-"]').forEach(d => {
        if (d.id !== `role-dropdown-${index}`) d.classList.add('hidden');
    });
    dropdown.classList.toggle('hidden');
}

function togglePermissionDropdown(index) {
    const dropdown = document.getElementById(`permission-dropdown-${index}`);
    // Close all other dropdowns
    document.querySelectorAll('[id^="role-dropdown-"], [id^="permission-dropdown-"]').forEach(d => {
        if (d.id !== `permission-dropdown-${index}`) d.classList.add('hidden');
    });
    dropdown.classList.toggle('hidden');
}

function updateRoleLabel(index) {
    const checkboxes = document.querySelectorAll(`.role-checkbox-${index}:checked`);
    const label = document.getElementById(`role-label-${index}`);
    if (!label) return;
    if (checkboxes.length === 0) {
        label.textContent = 'No role selected';
    } else {
        const names = Array.from(checkboxes).map(cb => cb.closest('label').querySelector('span').textContent.trim());
        label.textContent = names.join(', ');
    }
}

function updatePermissionLabel(index) {
    const checkboxes = document.querySelectorAll(`.permission-checkbox-${index}:checked`);
    const label = document.getElementById(`permission-label-${index}`);
    if (!label) return;
    if (checkboxes.length === 0) {
        label.textContent = 'Select permissions...';
    } else {
        const names = Array.from(checkboxes).map(cb => cb.closest('label').querySelector('span').textContent.trim());
        label.textContent = names.join(', ');
    }
}

function updateCounts() {
    const count = document.querySelectorAll('.agent-row').length;
    const badge = document.getElementById('agent-count');
    const summary = document.getElementById('summary-count');
    if (badge)   badge.textContent = count;
    if (summary) summary.textContent = count;
    // Renumber visible row badges
    document.querySelectorAll('.row-num').forEach((el, i) => {
        el.textContent = i + 1;
    });
}

function updateRemoveButtons() {
    const rows = document.querySelectorAll('.agent-row');
    const buttons = document.querySelectorAll('.remove-row-btn');
    buttons.forEach(btn => {
        btn.style.opacity = rows.length <= 1 ? '0.3' : '1';
        btn.style.cursor  = rows.length <= 1 ? 'not-allowed' : 'pointer';
    });
}

// Close dropdowns when clicking outside
document.addEventListener('click', function(e) {
    if (!e.target.closest('[id^="role-dropdown-"]') && !e.target.closest('button[onclick^="toggleRoleDropdown"]') &&
        !e.target.closest('[id^="permission-dropdown-"]') && !e.target.closest('button[onclick^="togglePermissionDropdown"]')) {
        document.querySelectorAll('[id^="role-dropdown-"], [id^="permission-dropdown-"]').forEach(d => d.classList.add('hidden'));
    }
});

document.getElementById('add-agent-btn').addEventListener('click', addAgentRow);

// Init with one row
addAgentRow();
</script>

<style>
.agent-row { animation: none; }
</style>
</x-app-layout>
