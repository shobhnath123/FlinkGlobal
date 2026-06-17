<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;



class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('role_or_permission:User access|User create|User edit|User delete', ['only' => ['index','show']]);
        $this->middleware('role_or_permission:User create', ['only' => ['create','store']]);
        $this->middleware('role_or_permission:User create|SalesAgent create', ['only' => ['bulkCreate','bulkStore']]);
        $this->middleware('role_or_permission:User edit', ['only' => ['edit','update']]);
        $this->middleware('role_or_permission:User delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user= User::latest()->get();

        return view('setting.user.index',['users'=>$user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::get();
        $permissions = Permission::get();
        return view('setting.user.new', compact('roles', 'permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name'=>'required',
            'email' => 'required|email|unique:users',
            'password'=>'required|confirmed'
        ]);
        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=> bcrypt($request->password),
        ]);
        $user->syncRoles($request->roles);
        if ($request->has('permissions')) {
            $user->syncPermissions($request->permissions);
        }
        return redirect()->back()->withSuccess('User created !!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::get();
        $permissions = Permission::get();
        $user->roles;
        $user->permissions;
        return view('setting.user.edit', compact('user', 'roles', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name'=>'required',
            'email' => 'required|email|unique:users,email,'.$user->id.',id',
        ]);

        if($request->password != null){
            $request->validate([
                'password' => 'required|confirmed'
            ]);
            $validated['password'] = bcrypt($request->password);
        }

        $user->update($validated);

        $user->syncRoles($request->roles);
        if ($request->has('permissions')) {
            $user->syncPermissions($request->permissions);
        } else {
            $user->syncPermissions([]);
        }
        return redirect()->back()->withSuccess('User updated !!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back()->withSuccess('User deleted !!!');
    }

    /**
     * Toggle the active status of the specified user.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function toggleActive(User $user)
    {
        $user->is_active = !$user->is_active;
        $user->save();

        $status = $user->is_active ? 'activated' : 'deactivated';
        return redirect()->back()->withSuccess("User {$status} successfully!");
    }

    /**
     * Show the form for bulk-creating sales agents.
     *
     * @return \Illuminate\Http\Response
     */
    public function bulkCreate()
    {
        $roles = Role::get();
        $permissions = Permission::get();
        $salesAgentRole = Role::where('name', 'Sales Agent')->first();
        return view('setting.user.bulk-create', compact('roles', 'permissions', 'salesAgentRole'));
    }

    /**
     * Store multiple sales agents in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function bulkStore(Request $request)
    {
        $agents = $request->input('agents', []);

        if (empty($agents)) {
            return redirect()->back()->withErrors(['agents' => 'No agents were submitted.'])->withInput();
        }

        // Resolve Sales Agent role
        $salesAgentRole = Role::where('name', 'Sales Agent')->first();
        $selectedRoleIds = $request->input('role_ids', []);

        $created = 0;
        $skipped = [];
        $errors  = [];

        DB::beginTransaction();
        try {
            foreach ($agents as $index => $agentData) {
                $rowNum = $index + 1;

                // Per-row validation
                $validator = Validator::make($agentData, [
                    'name'                  => 'required|string|max:255',
                    'email'                 => 'required|email|unique:users,email',
                    'password'              => 'required|string|min:6',
                    'password_confirmation' => 'required|same:password',
                ]);

                if ($validator->fails()) {
                    $rowErrors = [];
                    foreach ($validator->errors()->all() as $msg) {
                        $rowErrors[] = "Row {$rowNum} ({$agentData['email']}): {$msg}";
                    }
                    $skipped[] = implode(', ', $rowErrors);
                    continue;
                }

                $user = User::create([
                    'name'     => $agentData['name'],
                    'email'    => $agentData['email'],
                    'password' => bcrypt($agentData['password']),
                ]);

                // Assign roles: use per-row selected roles if provided, otherwise auto-assign Sales Agent
                $roleIds = isset($agentData['roles']) ? $agentData['roles'] : [];
                if (!empty($roleIds)) {
                    $user->syncRoles($roleIds);
                } elseif ($salesAgentRole) {
                    $user->assignRole($salesAgentRole);
                }

                // Assign permissions
                $permissionIds = isset($agentData['permissions']) ? $agentData['permissions'] : [];
                if (!empty($permissionIds)) {
                    $user->syncPermissions($permissionIds);
                }

                $created++;
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['agents' => 'An unexpected error occurred: ' . $e->getMessage()])->withInput();
        }

        $message = "{$created} sales agent(s) created successfully!";
        if (!empty($skipped)) {
            $message .= ' Skipped: ' . implode(' | ', $skipped);
        }

        return redirect()->route('admin.users.index')->withSuccess($message);
    }
}
