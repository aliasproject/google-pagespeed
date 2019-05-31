<?php namespace ZOGDigital\GooglePageSpeed;

class GooglePageSpeed
{
    const ENDPOINT = "https://www.googleapis.com/pagespeedonline/v4/runPagespeed";
    protected $api_key;

    public function __construct()
    {
        // Set API Keys
        $this->api_key = config('googlepagespeed.api_key');
    }

    public function run(string $url, string $strategy="desktop")
    {
        return json_decode($this->makeRequest(self::ENDPOINT . '?key=' . $this->api_key . '&url=' . $url . '&strategy=' . $strategy));
    }

    private function makeRequest($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);

        return $result;
    }
}
