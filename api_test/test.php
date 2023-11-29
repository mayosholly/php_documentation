<?php 


ini_set('MAX_EXECUTION_TIME', 0);

class Test
{

    public function crmApi($name)
    {
        $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://127.0.0.1:8000/api/admin/expense-title',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
    "name":  "' .$name. '" 
}',
  CURLOPT_HTTPHEADER => array(
    'accept: application/json',
    'Content-Type: application/json',
    'Authorization: Bearer 5|DG3cBEQVSaXmkV3zZp9aDcAB7In7hdVGha05FXzJ'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
    }

    public function fetchDataFromSourceApi()
    {
        $source_api_url = 'https://admin.smartchurch.ng/api/admin/expense-title';
        $source_api_token = "318|YxiZbVGw8pysDE9vlaZZHUG1vZ2acTXLLnG0lIL6";
        $source_headers = [
            'Authorization: Bearer ' . $source_api_token,
            'Content-Type: application/json',
        ];
        
        $ch = curl_init($source_api_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $source_headers);
        $response = curl_exec($ch);
        curl_close($ch);
        $source_data = json_decode($response, true);
        $counter = 1;

        try {
     
        foreach($source_data['data'] as $res)
        {
            $counter++;
            // $slug = $res['slug'];
            $name = $res['name'];
            // $church_id = $res['church_id'];
            // $branch_id = $res['branch_id'];
            $this->crmApi($name);
        }
    } catch (Exception $e) {
        return $e->getMessage();
    }
     
    }
}

$test = new Test();
$test->fetchDataFromSourceApi();
?>