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
        $this->doValidation($request);

        Permission::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'slug' => $request->input('slug'),
        ]);
        return redirect()->route('laralum::permissions.index')->with('success','Permission added!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('laralum_permissions::edit', ['permission' => Permission::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->doValidation($request, $id);

        $permission = Permission::findOrFail($id);

        $permission->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'slug' => $request->input('slug'),
        ]);
        return redirect()->route('laralum::permissions.index')->with('success','Permission edited!');
    }

    /**
     * Displays a view to confirm delete.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function confirmDelete($id)
    {
        $permission = Permission::findOrFail($id);

        return view('laralum::pages.confirmation', [
            'method' => 'DELETE',
            'action' => route('laralum::permissions.destroy', ['permission' => $permission]),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $permission = Permission::findOrFail($id);

        $permission->delete();

        return redirect()->route('laralum::permissions.index')->with('success','Permission deleted!');
    }

    /**
     * Validate form of resource
     *
     * @param \Illuminate\Http\Request  $request
     **/
    private function doValidation($request, $id = false)
    {
        $rules = 'required|alpha_num|max:255';
        if (!$id || !(Permission::findOrFail($id)->slug == $request->input('slug'))) {
            $rules = $rules.'|unique:laralum_permissions';
        }
        $this->validate($request, [
            'name' => 'required|max:255',
            'slug' => $rules,
            'description' => 'required|max:500',
        ]);
    }
}
