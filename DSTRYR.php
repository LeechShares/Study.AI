<?php
// Start a session
session_start();

// Check if a new prompt is provided in the URL
if (isset($_GET['prompt'])) {
    $newPrompt = $_GET['prompt'];
} else {
    $newPrompt = "hi"; 
}

// DSTRYR
$url = "https://free-api.chatbotcommunity.ltd/others/gpt?prompt=" . urlencode($newPrompt);

// Use cURL to make the request
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);

if ($response === false) {
    echo "Ga error kol: " . curl_error($ch);
} else {
    // Parse the JSON response
    $data = json_decode($response, true);

    if (isset($data['result'])) {
        // Output the result as JSON
        header('Content-Type: application/json');
        echo json_encode($data['result']);
    } else {
        echo "Way Response Kol.";
    }
}

curl_close($ch);
?>