<?php
if (!function_exists('blockedCountry')) {
    function blockedCountry($testing = false, $country = '') {
        // set default blocked to false
        $blockedCountry   = false;
        $blockedCountries = config('app.blocked_countries');

        if ($testing) {
            $userCountry = $country;
            if (in_array($userCountry, $blockedCountries)) {
                $blockedCountry = true;
            }
        } else {
            // call geoip location API for getting user location information
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL            => "https://freegeoip.app/json/",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING       => "",
                CURLOPT_MAXREDIRS      => 10,
                CURLOPT_TIMEOUT        => 30,
                CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST  => "GET",
                CURLOPT_HTTPHEADER     => array(
                    "accept: application/json",
                    "content-type: application/json"
                ),
            ));

            $response = curl_exec($curl);
            $err      = curl_error($curl);
            curl_close($curl);

            if (!$err) {
                if (null!== $response) {
                    $response = json_decode($response, true);
                    if (!empty($response) && isset($response['country_code'])) {
                        $userCountry      = $response['country_code'];
                        $blockedCountries = config('app.blocked_countries');
                        if (in_array($userCountry, $blockedCountries)) {
                            $blockedCountry = true;
                        }
                    }
                }
            }
        }
        return $blockedCountry;
    }
}
?>