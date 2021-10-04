<?php

namespace App\Services;

use Exception;
use App\Traits\RestResponse;
use SendinBlue\Client\Configuration;
use SendinBlue\Client\Model\SendSmtpEmail;
use SendinBlue\Client\Api\TransactionalEmailsApi;

class SendinblueService
{
    use RestResponse;

    private $api;
    private $sendSmtpEmail;

    /**
     * __construct
     *
     * @param  mixed $sendSmtpEmail
     * @return void
     */
    public function __construct()
    {
        $config = Configuration::getDefaultConfiguration()->setApiKey('api-key', config('app.api_sendiblue'));
        $this->api = new TransactionalEmailsApi(
            new \GuzzleHttp\Client(),
            $config
        );
        $this->sendSmtpEmail = new SendSmtpEmail();
    }

    /**
     * sendTransactionalEmails
     *
     * @param  mixed $template
     * @param  mixed $to 
     *      names (optional)
     *      [{"name":"Jimmy", "email":"jimmy@example.com"}, {"name":"Joe", "email":"joe@example.com"}]
     * @param  mixed $params 
     *      ["FNAME":"Joe", "LNAME":"Doe"]
     * @return void
     */
    public function sendTransactionalEmails(int $template, array $to, array $params = [])
    {
        $this->sendSmtpEmail['to'] = $to;
        $this->sendSmtpEmail['params'] = $params;
        $this->sendSmtpEmail['templateId'] = $template;
        try {
            return $this->api->sendTransacEmail($this->sendSmtpEmail);
        } catch (Exception $ex) {
            return $this->error(SendinblueService::class, $ex, $ex->getMessage(), $ex->getCode());
        }
    }
}
