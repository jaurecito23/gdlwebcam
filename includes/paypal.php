<?php

    require "paypal/autoload.php";

    define("URL_SITIO", 'http://localhost/gdlwebcam');

    $apiContext = new \PayPal\Rest\ApiContext(

        new \PayPal\Auth\OAuthTokenCredential(

            'AZ-_ifKQY_bIuN8pHw-jWE8xd-tofU7pNs1PX_0P-_A_8l7tVmArxqnv4L-mkFlzhpRg6qOgxPLxAmey',// ClienteID

            'EMb0zRiEuWCKoNIhTSpb54iEqwzIpwoIr3ZkgnK1ZyXQBDrJnY5z5DsPaB2_8Fz0uAbv9gH1LttqC4wi'// Secret


        )



    );






?>