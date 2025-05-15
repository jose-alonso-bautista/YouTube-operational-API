// transcript.php
<?php

$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
$parts = explode("/", trim($path, "/"));

// Simple router
if (count($parts) >= 3 && $parts[0] === "transcript" && $parts[1] === "video") {
    $videoId = $parts[2];
    header("Content-Type: application/json");

    echo json_encode([
        "resource" => "video",
        "id" => $videoId,
        "format" => "json",
        "lang" => "en",
        "transcripts" => [
            $videoId => [
                "error" => "No captions found for video $videoId"
            ]
        ]
    ]);
    exit;
}

http_response_code(404);
echo "Route not found.";
