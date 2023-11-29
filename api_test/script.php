<?php
$source_api_url = 'https://admin.smartchurch.ng/api/admin/expense-title';
$destination_api_url = 'http://127.0.0.1:8000/admin/expense-title';


$source_api_token = "318|YxiZbVGw8pysDE9vlaZZHUG1vZ2acTXLLnG0lIL6";
$destination_api_token = "5|DG3cBEQVSaXmkV3zZp9aDcAB7In7hdVGha05FXzJ";

// Set headers for API requests
$source_headers = [
    'Authorization: Bearer ' . $source_api_token,
    'Content-Type: application/json',
];

$destination_headers = [
    'Authorization: Bearer ' . $destination_api_token,
    'Content-Type: application/json',
];

// Make a request to the source API to fetch data
$ch = curl_init($source_api_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $source_headers);
$response = curl_exec($ch);
curl_close($ch);

if ($response === false) {
    die('Error fetching data from source API');
}

// Parse the JSON response
$source_data = json_decode($response, true);

if ($source_data === null) {
    die('Error parsing JSON data from source API');
}



// // Prepare data for the destination API (assuming source_data is an array of records)
$destination_data = [];
foreach ($source_data['data'] as $item) {
    $destination_data[] = [
        'name' => $item['name'],
    ];
}
// // Convert the data to JSON format
$destination_json_data = json_encode($destination_data);

// print_r($destination_json_data);

// Make a request to the destination API to insert data
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
    CURLOPT_POSTFIELDS => $destination_json_data,
    CURLOPT_HTTPHEADER => array(
      'accept: application/json',
      'Content-Type: application/json',
      'Authorization: Bearer 5|DG3cBEQVSaXmkV3zZp9aDcAB7In7hdVGha05FXzJ'
    ),
  ));


$response = curl_exec($ch);
curl_close($ch);

// print_r($response);
if ($response === false) {
    die('Error inserting data into destination API');
}


// Process the response from the destination API as needed

echo 'Data has been successfully transferred to the destination API.';



?>