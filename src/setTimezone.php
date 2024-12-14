<?php

header('Content-Type: application/json; charset=utf-8');
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // POSTデータを取得
    $rawData = file_get_contents('php://input');
    $data = json_decode($rawData, true);
    $selectedTimezone = $data['timezone'] ?? null;

    if ($selectedTimezone) {
        $_SESSION['timezone'] = $selectedTimezone;
        $defaultTimeZone = new DateTimeZone(date_default_timezone_get());
        $setTimezone = new DateTimeZone($selectedTimezone);
        $today = new DateTime('now', $defaultTimeZone);
        $today->setTimezone($setTimezone);

        // 現在時刻を返却
        echo json_encode([
            'status' => 'success',
            'current_time' => $today->format('Y/m/d H:i:s')
        ]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Invalid timezone']);
    }
    exit;
}

http_response_code(400);
echo json_encode(['status' => 'error', 'message' => 'Invalid request']);