<?php

namespace App\Http\Repository;

use Illuminate\Support\Facades\DB;
use App\Model\Role;
use App\Model\Scale;

class TestsRepository
{
    /**
     * @return mixed
     */
    //返回未被删除的量表
    public function gaugeManage()
    {
        return DB::select('select * from scale_manage where is_remove = :id',['id' => 0]);
    }

    /**
     * @return mixed
     * 返回所有的角色
     */
    public function roleAll()
    {
        return Role::get();
    }

    /**
     * @return mixed
     * 返回未被移除的分配记录
     */
    public function scales()
    {
        //return user()->scale->where('is_remove',0)->get();
        return Scale::where(['is_remove' => 0,'from_id' => user()->id])->get();
    }

    /**
     * @return mixed
     * 返回用户中permission为0的用户
     */
    public function users()
    {
        return user()->where('permission',0)->get();
    }

    /**
     * @return mixed
     * 返回未被移除 分配给当前用户的量表
     */
    public function scalesAll()
    {
        return Scale::where(['is_remove' => 0,'user_id' => user()->id])->get();
    }

    /**
     * @param $id
     * @return mixed
     * 返回当前用户未被移除的量表记录
     */
    public function scaleFirst($id)
    {
        return user()->scale()->where(['is_remove' => 0,'id' => $id])->first();
    }

    /**
     * @param $id
     * @return mixed
     * 返回当前用户未被移除的量表记录
     */
    public function scaleGet($id)
    {
        return user()->scale()->where(['is_remove' => 0,'id' => $id])->get();
    }

    public function showScale($id)
    {
        return user()->scale()->where(['completed' => $id,'is_remove' => 0])->get();
    }
}