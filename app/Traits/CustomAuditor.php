<?php

namespace App\Traits;

use App\Models\CustomAudits;

trait CustomAuditor
{
    public function setAudit(array $toAudit)
    {
        CustomAudits::create([
            'user_type'     => $toAudit['user_type'],
            'auditable_id'  => $toAudit['auditable_id'],
            'auditable_type' => $toAudit['auditable_type'],
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

    public function formatToAudit($functionName, $modelAudited, $tags = NULL, $old = NULL, $new = NULL)
    {
        $toAudit = [
            'user_type'      => 'App\Models\User',
            'auditable_id'   => auth()->user()->id,
            'auditable_type' => $modelAudited,
            'event'          => $functionName,
            'url'            => request()->fullUrl(),
            'ip_address'     => request()->getClientIp(),
            'user_agent'     => request()->userAgent(),
            'user_id'        => auth()->user()->id,
            'tags'           => $tags,
            'old_values'     => json_decode(json_encode($old), true),
            'new_values'     => json_decode(json_encode($new), true),
        ];
        return $toAudit;
    }
}
