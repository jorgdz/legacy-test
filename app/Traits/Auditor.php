<?php

namespace App\Traits;

use OwenIt\Auditing\Models\Audit;
use Illuminate\Support\Facades\Config;

trait Auditor
{
    //Evento, tags, user_type, auditable_type, new_values, old_values
    public function setAudit(array $toAudit)
    {
        Audit::create([
            'user_type'     => $toAudit['user_type'],
            'auditable_id'  => $toAudit['auditable_id'],
            'auditable_type'=> $toAudit['auditable_type'],
            'event'         => $toAudit['event'],
            'url'           => $toAudit['url'],
            'ip_address'    => $toAudit['ip_address'],
            'user_agent'    => $toAudit['user_agent'],
            'user_id'       => $toAudit['user_id'],
            'tags'          => $toAudit['tags'],
            'old_values'    => $toAudit['old_values'],
            'new_values'    => $toAudit['new_values'],
        ]);
    }

    public function formatToAudit($functionName,$modelAudited)
    {    
        $toAudit = [
            'user_type'     => 'App\Models\User',
            'auditable_id'  => auth()->user()->id,
            'auditable_type'=> $modelAudited,
            'event'         => $functionName,
            'url'           => request()->fullUrl(),
            'ip_address'    => request()->getClientIp(),
            'user_agent'    => request()->userAgent(),
            'user_id'       => auth()->user()->id,
            'tags'          => null,
            'old_values'    => null,
            'new_values'    => null,
        ];
        return $toAudit;
    }
}