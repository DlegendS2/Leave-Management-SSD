<?php

namespace App\Helpers;

use App\Models\AuditLog;

class Audit
{
    public static function log($action, $description = null)
    {
        AuditLog::create([
            'user_id'   => auth()->id(),
            'action'    => $action,
            'ip_address'=> request()->ip(),
            'description' => $description
        ]);
    }
}
