<?php

namespace App\Traits;

use App\Models\SiteInfo;
use App\Models\SMSConfig;
use Exception;
use GuzzleHttp\Client;

trait SMS
{
    /**
     * @param $to string 01xxxxxxxxx
     * @param $message string must be a double quoted string
     * @return bool|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    private function sendSMS($to, $message)
    {

        $message .= "\n- DaktarLagbe";
            
        $url = 'https://smsplus.sslwireless.com/api/v3/send-sms';
            $params = [
                "api_token" => "fb025038-e1fe-488a-a062-1643b31457e5",
                "sid" => "DAKTARLAGBEBRANDAPI",
                "msisdn" => $to,
                "sms" => $message,
                "csms_id" => uniqid("", false)
            ];

        try {
            $res = $this->callApi($url,json_encode($params));
            return $res;
        } catch (Exception $e) {
            return $e->getMessage();
        }

        return false;
    }

    private function sendSMSNonMask($to, $message)
    {

        $message .= "\n- DaktarLagbe";

        $url = 'https://smsplus.sslwireless.com/api/v3/send-sms';
        $params = [
            "api_token" => "Daktar Lagbe-35591786-df9f-4981-b59c-6a4efb77e2fb",
            "sid" => "DAKTARLAGBEBRANDAPI",
            "msisdn" => $to,
            "sms" => $message,
            "csms_id" => uniqid("", false)
        ];

        try {
            $res = $this->callApi($url,json_encode($params));
            return true;
        } catch (Exception $e) {
            dd($e);
            return $e->getMessage();
        }

        return false;
    }

    function callApi($url, $params)
    {
        $ch = curl_init(); // Initialize cURL
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($params),
            'accept:application/json'
        ));

        $response = curl_exec($ch);

        curl_close($ch);

        return $response;
    }
}