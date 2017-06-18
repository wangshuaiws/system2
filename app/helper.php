<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 2017/3/2
 * Time: 19:48
 */

function user()
{
    return Auth::user();
}




function TaskCountArray($projects)
{
    $counts = [];
    foreach($projects as $project)
    {
        $perCount = $project->tasks->count();
        array_push($counts,$perCount);
    }
    return $counts;

}

function rand_color()
{
    $R = rand(0,255);
    $G = rand(0,255);
    $B = rand(0,255);
    return 'rgba('.$R .','.$G.','.$B.',0.5)';
}

function permCheck($perm,$role)
{
    return $role->hasPermission($perm->name)?true:false;

}

function roleCheck($role,$user)
{
    return $user->hasRole($role->name)?true:false;

}

function protect_default_admin($role,$user)
{
    if($role->is_admin() && $user->is_admin())
    {
        return 'disabled';
    }
}

function dealInt($arr)
{
    $emails = array();
    foreach ($arr as $key => $value) {
        if (gettype($key) == "integer") {
            $emails[$key] = $value;
        }
    }
    return $emails;
}

function dealString($arr)
{
    $users = array();
    foreach ($arr as $key => $value) {
        if (gettype($key) == "string") {
            $users[$key] = $value;
        }
    }
    return $users;
}

//处理焦虑数据
function anxious_deal($a)
{
    $c = array();
    $b = $a['6']+$a['7']+$a['8']+$a['9']+$a['10']+$a['11']+$a['12'];
    array_push($c,$b);
    $b = $a['0']+$a['1']+$a['2']+$a['3']+$a['4']+$a['5']+$a['13'];
    array_push($c,$b);
    return $c;
}

//处理抑郁量表数据
function depressed_deal($a)
{
    $c = array();
    $b = $a['9']+$a['10']+$a['11']+$a['12']+$a['14']+$a['16'];
    array_push($c,$b);
    $b = $a['15'] + 0;
    array_push($c,$b);
    $b = $a['1']+$a['2']+$a['8']+$a['19']+$a['20']+$a['21'];
    array_push($c,$b);
    $b =$a['17']+$a['18'];
    array_push($c,$b);
    $b = $a['0']+$a['6']+$a['7']+$a['13'];
    array_push($c,$b);
    $b = $a['3']+$a['4']+$a['5'];
    array_push($c,$b);
    $b = $a['22']+$a['23']+$a['24'];
    array_push($c,$b);
    return $c;
}

//判断抑郁程度
function depressed_total($sum)
{
    if($sum>=35)
    {
        return '严重抑郁';
    }
    if($sum>=20)
    {
        return '中度抑郁';
    }
    if($sum<8)
    {
        return '没有抑郁症状';
    }
    return '轻度抑郁';
}

//判断焦虑程度
function anxious_total($sum)
{
    if($sum>=29)
    {
        return '严重焦虑';
    }
    if($sum>=21)
    {
        return '明显焦虑';
    }
    if($sum>=14)
    {
        return '轻度焦虑';
    }
    if($sum<7)
    {
        return '没有焦虑症状';
    }
    return '可能有焦虑';
}

