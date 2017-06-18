<?php

namespace App\Http\Repository;

use App\Model\Scale;
use Illuminate\Support\Facades\DB;

class ScaleRepository
{
    /**
     * @param $arr
     * @return $this
     */
    //量表分配处理逻辑
    public function allot($arr)
    {
        if($arr) {
            array_shift($arr);
            $emails = dealInt($arr);
            $names = dealString($arr);
            foreach ($emails as $aa => $a) {
                foreach ($names as $b) {
                    $user = user()->where('email', $a)->first();
                    $scale = Scale::where(['name' => $user->name, 'title' => $b])->first();
                    if (!$scale) {
                        Scale::create([
                            'name' => $user->name,
                            'user_id' => $user->id,
                            'title' => $b,
                            'from_id' => user()->id
                        ]);
                        return flash('分配成功','success')->important();
                    } else {
                        return flash('记录已存在,不可重复插入','danger')->important();
                    }
                }
            }

        }
    }

    /**
     * @param $id
     * @return $this
     */
    //分配量表的记录软删除
    public function deleteRecord($id)
    {
        $scale = Scale::findOrFail($id);
        $scale->is_remove = 1;
        $scale->save();
        return flash('成功删除到回收站','success')->important();
    }

    /**
     * @param $id
     * @return $this
     * 从回收站中将量表删除
     */
    public function delete($id)
    {
        Scale::find($id)->delete();
        return flash('已将量表彻底删除','success')->important();
    }

    /**
     * @param $id
     * @return $this
     * 从回收站中将用户的记录还原
     */
    public function backRecord($id)
    {
        $scale = Scale::findOrFail($id);
        $scale->is_remove = 0;
        $scale->save();
        return flash('还原成功','success')->important();
    }


    /**
     * @param $id
     * @return $this
     * 将量表删除到回收站
     */
    public function deleteScale($id)
    {
        $update = DB::update('update scale_manage set is_remove = 1 where id = ?', [$id]);
        if($update) {
            return flash('成功删除到回收站','success')->important();
        }
        return flash('删除失败','danger')->important();
    }

    /**
     * @param $id
     * @return mixed
     * 返回量表记录信息
     */
    public function details($id)
    {
        return Scale::where('id',$id)->first();
    }

    /**
     * @param $id
     * @return mixed
     * 返回量表记录信息
     */
    public function getAll($id)
    {
        return Scale::where('id',$id)->get();
    }

    /**
     * @param $arr
     * @param $id
     * @return $this
     * 处理用户填写的量表
     */
    public function dealData($arr,$id)
    {

        $scale = $this->details($id);
        array_shift($arr);
        if($scale->title == '汉密尔顿抑郁量表'){
            if(count($arr)<25)
            {
                return flash('请将量表填写完','danger')->important();
            }
            $b = depressed_total(array_sum($arr));
            $a = json_encode(depressed_deal($arr));
            $scale = Scale::findOrFail($id);
            $scale->number = $a;
            $scale->total = $b;
            $scale->completed = 1;
            $scale->save();
        }

        if($scale->title == '汉密尔顿焦虑量表'){
            if(count($arr)<14)
            {
                return flash('请将量表填写完','danger')->important();
            }
            $b = anxious_total(array_sum($arr));
            $a = json_encode(anxious_deal($arr));
            $scale = Scale::findOrFail($id);
            $scale->number = $a;
            $scale->total = $b;
            $scale->completed = 1;
            $scale->save();
        }
    }
}