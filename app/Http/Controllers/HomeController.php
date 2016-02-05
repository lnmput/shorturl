<?php

namespace App\Http\Controllers;

use App\Urls;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index');
    }

    public function short()
    {
        $request=\Request::all();
        $target=['url'=>$request['url']];
        $rules=['url'=>'required|url'];
        $message=['url'=>'请输入合法的链接地址','required'=>'链接地址不能为空'];
        $validation=\Validator::make($target,$rules,$message);
        if($validation->fails()){
            $errmes= $validation->errors()->toArray();
            //组装json
            $info=json_encode(['code'=>0,'message'=>$errmes['url'][0]]);
            return  $info;
        }else{
            //进一步处理
            //判断当前url在数据库中是否存在
            $record=Urls::where('url',$request['url'])->first();
            if(!empty($record)){
                //组装json
                $shorturl=$record->short;
                $info=json_encode(['code'=>'1','message'=>'http://www.url.dev/'.$shorturl]);
                return $info;
            }else{
                //生成短链并插入数据库
                $short=Urls::get_unique_short_url();
                $insert=Urls::insert([
                    'url'=>$request['url'],
                    'short'=>$short,
                ]);
                if($insert){
                    $info=json_encode(['code'=>1,'message'=>'http://www.url.dev/'.$short]);
                    return $info;
                }else{
                    $info=json_encode(['code'=>0,'message'=>'生成失败,请重试']);
                    return $info;
                }

            }
        }
    }

    public function goUrl($shortCode){
        $recode=Urls::where('short',$shortCode)->first();
        if($recode){
            return \Redirect::to($recode->url);
        }else{
            return \Redirect::to('/');
        }
    }
}
