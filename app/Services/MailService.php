<?php

namespace App\Services;

use App\Mail\SendMail;
use App\Models\CustomStatus;
use App\Models\CustomTenant;
use App\Services\SendinblueService;
use Illuminate\Support\Facades\Mail;

class MailService
{
    private $currentTenant;
    private $sendinblueService;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->sendinblueService = new SendinblueService();
    }

    /**
     * SendEmail
     *
     * @return void
     */
    public function SendEmail($params)
    {
        $status = CustomStatus::where([
            ['group', 'general'],
            ['keyword', 'general-activo'],
        ])->first();

        $this->currentTenant = CustomTenant::with('mail')->where([
            ['id', CustomTenant::current()->id],
        ])->whereHas('mail', function ($query) use ($status) {
            $query->where('status_id', $status['id']);
        })->first();

        /* Sendinblue */
        if (!$this->currentTenant) {
            return $this->sendinblueService->sendTransactionalEmails($params["template"], $params["to"], $params["params"]);
        }

        /* Laravel Mail */
        $mails = array();
        foreach ($params["to"] as $value) {
            $response = Mail::to($value['email'])->send(new SendMail($params['view'], $params['subject'], $params['params']));
            array_push($mails, $response);
        }
        return $mails;
    }
}
