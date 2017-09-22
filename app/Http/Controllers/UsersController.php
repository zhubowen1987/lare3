<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use DB;
use Mockery\CountValidator\Exception;

class UsersController extends Controller
{

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    function strrev($str)
    {
                $len=strlen($str);
                $newstr = '';
                for($i=$len-1;$i>=0;$i--)
                {
                $newstr .= $str{$i};
                }
                return $newstr;
            }

    function my_scandir($dir)
    {
        $files = array();
        if ( $handle = opendir($dir) ) {
            while ( ($file = readdir($handle)) !== false ) {
                if ( $file != ".." && $file != "." ) {
                    if ( is_dir($dir . "/" . $file) ) {
                        $files[$file] = scandir($dir . "/" . $file);
                    }else {
                        $files[] = $file;
                    }
                }
            }
            closedir($handle);
            return $files;
        }
    }

//二分查找（数组里查找某个元素）
    function bin_sch($array,  $low, $high, $k){
        if ( $low <= $high){
            $mid =  intval(($low+$high)/2 );
            if ($array[$mid] ==  $k){
                return $mid;
            }elseif ( $k < $array[$mid]){
                return  bin_sch($array, $low,  $mid-1, $k);
            }else{
                return  bin_sch($array, $mid+ 1, $high, $k);
            }
        }
        return -1;
    }


    //顺序查找（数组里查找某个元素）
    function  seq_sch($array, $n,  $k){
        $array[$n] =  $k;
        for($i=0;  $i<$n; $i++){
            if( $array[$i]==$k){
                break;
            }
        }
        if ($i<$n){
            return  $i;
        }else{
            return -1;
        }
    }


    //冒泡排序（数组排序）
    function bubble_sort2( $array)
    {

        $count = count( $array);
        if ($count <= 0 ) return false;
        for($i=0 ; $i<$count; $i ++){
            for($j=$count-1 ; $j>$i; $j--){
                echo $array[$j] ."-".$array [$j-1];exit;
                if ($array[$j] < $array [$j-1]){
                    $tmp = $array[$j];
                    $array[$j] = $array[ $j-1];
                    $array [$j-1] = $tmp;
                }
            }
        }
        return $array;
    }

    function bubble_sort( $array)
    {
        $count = count( $array);
        for ($i=0;$i<$count-1;$i++){
            for ($j=$i+1;$j<$count;$j++){//第一个后面的每一个数都和第一个相比
                //第二个和每个后面的数对应拿出第二个数
                echo $i."i:".$array[$i].$j."j:".$array[$j];
                echo "<br/>";
                if($array[$i]>$array[$j]){//从小到大
                    $p = $array[$i];
                    $array[$i] = $array[$j];
                    $array[$j]= $p;
                }
            }
            echo "-----------------";
            echo "<br/>";
        }
        return $array;
    }

    function bubble_sort1( $array)
    {
        $count = count( $array);
        for ($i=$count-1;$i>0;$i--){
            for ($j=$i-1;$j>=0;$j--){//第一个后面的每一个数都和第一个相比
                //第二个和每个后面的数对应拿出第二个数
                echo $array[$i]."_".$array[$j];
                echo "<br/>";
                if($array[$i]<$array[$j]){//从小到大
                    $p = $array[$i];
                    $array[$i] = $array[$j];
                    $array[$j]= $p;
                }
            }
            echo "-----------------";
            echo "<br/>";
        }
        return $array;
    }

    //快速排序（数组排序）
    function quick_sort($array ) {
        if (count($array) <= 1) {
            echo "-----------count<=1";
            echo "<br/>";
            var_dump($array);
            echo "<br/>";
            return  $array;}
        $key = $array [0];
        $left_arr  = array();
        $right_arr = array();
        for ($i= 1; $i<count($array ); $i++){
            if ($array[ $i] <= $key)
                $left_arr [] = $array[$i];
            else
                $right_arr[] = $array[$i ];
        }
        $left_arr = $this->quick_sort($left_arr );
        $right_arr = $this->quick_sort( $right_arr);
        echo '-----------\$left_arr';
        echo "<br/>";
        var_dump($left_arr);
        echo "<br/>";
        echo "-----------\$right_arr";
        echo "<br/>";
        var_dump($right_arr);
        echo "<br/>";
        return array_merge($left_arr , array($key), $right_arr);
    }
    function t(){
        $c = func_num_args()-1;
        $a = func_get_args();
        //print_r($a);
        for($i=0; $i<=$c; $i++){
            if(is_array($a[$i])){
                for($j=0; $j<count($a[$i]); $j++){
                    $r[] = $a[$i][$j];
                }
            } else {
                die('Not a array!');
            }
        }
        return $r;
    }
//test

    public function index(){


        $abc = ["a"=>"1"];
        return response($abc,405);





        $e = new A;

        function foo($obj) {
            // ($obj) = ($e) = <id>
            $obj->foo = 2;
        }

        foo($e);
        echo $e->foo."\n";
        exit;
        $namearr = array("a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z");
        $username = "";
        $strttime = time();
        for($i=0;$i<=1000000;$i++){

            $username="";
            $modif = $i%26;
            $round = (string)rand(100000,999999);
            for($t=0;$t<=strlen($round)-1;$t++){
                $username .= $namearr[$round[$t]];
            }

            $username .= $namearr[$modif].rand(0,9);
            try {
                $sex = "你说我是谁我就是谁 岂不是太没有面子了么？我才不按你说的办呢  呵呵  我想说什么就是什么 我就要测试一下能插入多少进去呃 哈哈  让我测试一下好了 谢谢喔";
                $isinsert = DB::insert('insert into t_users (username,password,sex) values (?,?,?)', [$username,  "123456",$sex    ]);

            }catch(Exception $e){
                print_r($e);
            }
        }
        $endtime = time();
        echo $endtime-$strttime;
        exit;
        $isinsert = DB::insert('insert into t_users (username, password) values (?, ?)', [$username, $password]);
        return view("users/index");
    }
    public function login(){
        $post= $_POST;
//        过滤
//        写入sql   运用事务
        $username = $_POST["username"];
        $password = $_POST["password"];
        $users = DB::select('select * from t_users where username = ?', [$username]);
        $returnarr = array(
            "status"=>1,//0 ok,1 error,2 other
            "msg"=>"",
            "field"=>"",
        );
        if(empty($users)){
            $returnarr["msg"] ="当前用户不存在";
            $returnarr["field"]="username";//"username";
        }elseif($users != $password){
            $returnarr["msg"] ="密码错误";
            $returnarr["field"]="password";
        }else{
            $returnarr["status"] =0;
            $returnarr["msg"] ="login success";
        }
//       返回状态
        return $returnarr;
    }

    public function register(){
        if(!empty($_POST)){
//        过滤
//        写入sql   运用事务
            $username = $_POST["username"];
            $password = $_POST["password"];
            $users = DB::select('select * from t_users where username = ?', [$username]);
            $returnarr = array(
                "status"=>1,//0 ok,1 error,2 other
                "msg"=>"",
                "field"=>"",
            );
            if(!empty($users)){
                $returnarr["msg"] ="当前用户已存在";
                $returnarr["field"]="username";//"username";
            }else{
                //插入数据
//              //  DB::beginTransaction();
//              //  DB::rollBack();
//               // DB::commit();
                try {
                    $isinsert = DB::insert('insert into t_users (username, password) values (?, ?)', [$username, $password]);
                    $returnarr["status"] = 0;
                    $returnarr["msg"] = "login success";
                }catch(\Exception $e){

                }
            }
//       返回状态
            return $returnarr;
        }else {
            return view("users/register");
        }
    }
}
