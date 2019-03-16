<?php
require 'vendor/autoload.php';
use \Mailjet\Resources;

$RECIPIENT_EMAIL = $_POST['recipient'];
if (!isset($RECIPIENT_EMAIL)) {
    die("you need to provide an email");
} else {
    $url = 'http://157.230.150.204:5050/salesPDF.php';
    $path = './sales_report.pdf';
    file_put_contents($path, file_get_contents($url));
    $type = pathinfo($path, PATHINFO_EXTENSION);
    $data = file_get_contents($path);
    $pdf = base64_encode($data);

    $apikey = 'a2b45954abb5e7657a5c852e31c77a78';
    $apisecret = 'c23a4171ff7fd2f1d076168abc24a3a4';

    $mj = new \Mailjet\Client($apikey, $apisecret);
    $body = [
        'Messages' => [
            [
                'From' => [
                    'Email' => "jpvalle@ucsd.edu",
                    'Name' => "Me"
                ],
                'To' => [
                    [
                        'Email' => "$RECIPIENT_EMAIL",
                        'Name' => "You"
                    ]
                ],
                'Subject' => "Sales Report",
                'TextPart' => "Here is your Sales Report!",
                'HTMLPart' => "<b>behold</b> the glory",
                'Attachments' => [
                    'ContentType' => "application/pdf",
                    'Filename' => "sales.pdf",
                    'Base64Content' => "$pdf"
                ]
            ]
        ]
    ];
    $response = $mj->post(Resources::$Email, ['body' => $body]);
    $response->success() && var_dump($response->getData());
    header('Location: /report');
}