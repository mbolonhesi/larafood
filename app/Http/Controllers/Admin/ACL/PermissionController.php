<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Requests\StoreUpdatePermission;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Permission;
use App\Models\Profile;

class PermissionController extends Controller
{
    protected $repository;
    protected $profiles;

    public function __construct(Permission $permission, Profile $profiles)
    {
        $this->repository = $permission;
        $this->profiles = $profiles;
        $this->middleware(['can:permissions']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = $this->repository->paginate();

        return view('admin.pages.permissions.index',[
            'permissions' => $permissions,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\StoreUpdatePermission  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdatePermission $request)
    {
        $this->repository->create($request->all());
        return redirect()->route('permissions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $permission = $this->repository->where('id', $id)->first();
        if (!$permission)
            return redirect()->back();
        return view('admin.pages.permissions.show', [
            'permission' => $permission
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       if (!$permission = $this->repository->find($id)){
           return redirect()->back();
       }
       return view('admin.pages.permissions.edit',[
           'permission' => $permission,
       ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\StoreUpdatePermission  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdatePermission $request, $id)
    {
        if (!$permission = $this->repository->find($id)){
            return redirect()->back();
        }
        $permission->update($request->all());
        return redirect()->route('permissions.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permission = $this->repository->where('id', $id)->first();
        if (!$permission)
            return redirect()->back();
       
        $permission->delete();
        return redirect()->route('permissions.index');
    }


    /**
     * Search results.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $filters = $request->only('filter');

        $permissions = $this->repository
                            ->where(function($query) use ($request){
                                if ($request->filter){
                                    $query->where('name',$request->filter);
                                    $query->orWhere('description','like',"%{$request->filter}%");
                                }                                
                            })
                            ->paginate();

        return view('admin.pages.permissions.index',[
            'permissions' => $permissions,
            'filters' => $filters,
        ]);
    } 
    
    public function profiles($idPermission)
    {

        if (!$permission = $this->repository->find($idPermission)){
            return redirect()->back();
        }        
        $profiles = $permission->profiles()->paginate();        

        return view('admin.pages.permissions.profiles',[
            'profiles' => $profiles,            
            'permission' => $permission, 
        ]);
    }
}
