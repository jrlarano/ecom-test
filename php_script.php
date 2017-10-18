<?php

class ApiCall {
   private $url;
   private $apiResponse;
   
   function __construct($url = 'http://api.pse.tools/api/stock/v2/APX')
    {
        $this->url = $url;
        $this->curlUrl();
    }

    public function curlUrl() {
        $curl = curl_init();
        // curl_setopt($curl, CURLOPT_ENCODING, '');
        curl_setopt($curl, CURLOPT_URL, $this->url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($curl);

        curl_close($curl);

        $this->apiResponse = $result;
    }
    
    public function getResponse() {
        return $this->apiResponse;
    }
}

// $request = new ApiCall(); 

// print_r($request->getResponse());



   


?>