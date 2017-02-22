<?php

namespace Laralum\Permissions\Controllers;
use App\Http\Controllers\Controller;
use Laralum\Permissions\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('laralum_permissions::index', ['permissions' => Permission::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('laralum_permissions::create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (str_replace(' ', '', $request->slug) != $request->slug) {
            return redirect()->back()->withInput()->with('error', __('laralum_permissions::general.slug_cannot_contain_spaces'));
        }
        $this->validate($request, [
            'name' => 'required|max:255',
            'slug' => 'required|max:255|unique:laralum_permissions',
            'description' => 'required|max:500',
        ]);

        Permission::create($request->all());
        return redirect()->route('laralum::permissions.index')->with('success','Permission added!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \Laralum\Permission\Models\Permission $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        return view('laralum_permissions::edit', ['permission' => $permission]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param \Laralum\Permission\Models\Permission $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {

        if (str_replace(' ', '', $request->slug) != $request->slug) {
            return redirect()->back()->withInput()->with('error', __('laralum_permissions::general.slug_cannot_contain_spaces'));
        }
        $this->validate($request, [
            'name' => 'required|max:255',
            'slug' => 'required|max:255|unique:laralum_permissions,slug,'.$permission->id,
            'description' => 'required|max:500',
        ]);

        $permission->update($request->all());
        return redirect()->route('laralum::permissions.index')->with('success','Permission edited!');
    }

    /**
     * Displays a view to confirm delete.
     *
     * @param \Laralum\Permission\Models\Permission $permission
     * @return \Illuminate\Http\Response
     */
    public function confirmDelete(Permission $permission)
    {
        return view('laralum::pages.confirmation', [
            'method' => 'DELETE',
            'action' => route('laralum::permissions.destroy', ['permission' => $permission->id]),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param \Laralum\Permission\Models\Permission $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Permission $permission)
    {
        $permission->delete();

        return redirect()->route('laralum::permissions.index')->with('success','Permission deleted!');
    }
}
