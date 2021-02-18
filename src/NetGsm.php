<?php

namespace Bakcay\NetGsm;


class NetGsm
{

    private $username;
    private $password;
    private $header;
    private $content;
    private $gsmNumber;

    public function __construct($message='') {

        $this->username = config('netgsm.username');
        $this->password = config('netgsm.password');
        $this->header = config('netgsm.header');

        $this->content = $message;
    }

    public function setMessage($message){
        $this->content = $message;
        return $this;
    }
    public function setNumber($gsmNumber){
        $this->gsmNumber = $gsmNumber;
        return $this;
    }


    private static function toUppercaseTr(string $name): string
    {
        return mb_strtoupper(
            str_replace(
                ['ç', 'ğ', 'ı', 'ö', 'ş', 'ü', 'i'],
                ['Ç', 'Ğ', 'I', 'Ö', 'Ş', 'Ü', 'İ'],
                $name
            )
        );
    }

    public function send() {

            $message = '<?xml version="1.0" encoding="iso-8859-9"?>
                        <mainbody>
                            <header>
                                <company>NETGSM</company>
                                <usercode>' . $this->username . '</usercode>
                                <password>' . $this->password . '</password>
                                <startdate></startdate>
                                <stopdate></stopdate>
                                <type>1:n</type>
                                <msgheader>' . $this->header . '</msgheader>
                            </header>
                            <body>
                                <msg><![CDATA[' . $this->content . ']]></msg>
                                <no>90' . $this->gsmNumber . '</no>
                            </body>
                        </mainbody>';

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'http://api.netgsm.com.tr/xmlbulkhttppost.asp');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_HTTPHEADER, ["Content-Type: text/xml"]);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $message);
            return curl_exec($ch);

    }


}
