<?php

namespace App\Http\Controllers;

use App\Http\Repository\PermissionRepository;
use App\Http\Repository\RoleRepository;
use App\Http\Repository\UserRepository;

use App\Http\Requests\RoleRequest;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $role;
    protected $user;
    protected $perm;

    public function __construct(RoleRepository $role,UserRepository $user,PermissionRepository $perm)
    {
        $this->role = $role;
        $this->user = $user;
        $this->perm = $perm;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 展示角色管理的界面
     */
    public function index()
    {
        $roles = $this->role->getWith('perms');
        $perms = $this->perm->getAll();
        return view('auth.roles.index',compact('roles','perms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * 创建角色逻辑
     */
    public function store(RoleRequest $request)
    {
        $data = [
            'name' => $request->get('name'),
            'display_name' => $request->get('display_name'),
            'description' => $request->get('description')
        ];
        if($this->role->create($request,$data)) {
            flash('创建角色成功','success')->important();
            return back();
        }
        flash('创建角色失败','danger')->important();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        $this->user->updateById($request,$id);
        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * 更新用户的角色
     */
    public function update(Request $request, $id)
    {
        $this->role->updateById($request,$id);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * 删除角色
     */
    public function destroy($id)
    {
        $this->role->deleteById($id);
        return back();
    }
}
