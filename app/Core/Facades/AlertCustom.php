<?php

namespace App\Core\Facades;

class AlertCustom{

   public function success($msg){
       session()->flash('success',$msg);
   }

   public function error($msg){
       session()->flash('error',$msg);
   }
}