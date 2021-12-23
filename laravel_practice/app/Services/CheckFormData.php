<?php

namespace App\Services;

class CheckFormData
{
    public static function checkGender($data){
    
        if($data->gender===0){
            $gender='男性';
        }
        if($data->gender===1){
            $gender='女性';
        }
        return $gender;
    }   
     public static function checkAge($data){
        if($data->age===1){
            $age='ガキ';
        }
        if($data->age===2){
            $age='ゆとり';
        }
        if($data->age===3){
            $age='社畜';
        }
        if($data->age===4){
            $age='おっさん';
        }
        if($data->age===5){
            $age='引退しないんですか？＾＾；';
        }
        if($data->age===6){
            $age='ジジイ';
        }
        return $age;
 }
}