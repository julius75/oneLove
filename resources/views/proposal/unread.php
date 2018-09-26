<?php
$noti = DB::table('proposals')
    ->where('status','not approved')
    ->count();
echo $noti;