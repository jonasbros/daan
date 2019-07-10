<?php
namespace App\helpers;

use App\Audit;
  
class AuditTrail
{
    public function create($arr)
    {
         $audit = new Audit();
         $audit->user_id = $arr['user_id'];
         $audit->action = $arr['action'];
         $audit->what = $arr['what'];
         $audit->link = $arr['link'];
         $audit->save();
    }
}