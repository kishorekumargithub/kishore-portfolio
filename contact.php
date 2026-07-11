<?php
declare(strict_types=1);

require_once __DIR__ . '/includes/bootstrap.php';
require_once __DIR__ . '/includes/Database.php';
require_once __DIR__ . '/includes/ContactService.php';

header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method not allowed.']);
    exit;
}

$service = new ContactService();

if ($service->isRateLimited()) {
    http_response_code(429);
    echo json_encode([
        'success' => false,
        'message' => 'Please wait a minute before sending another message.',
    ]);
    exit;
}

$result = $service->validate($_POST);

if (!empty($result['errors'])) {
    http_response_code(422);
    echo json_encode([
        'success' => false,
        'message' => 'Please fix the errors below.',
        'errors' => $result['errors'],
    ]);
    exit;
}

try {
    $service->save($result['data']);
    $emailSent = $service->sendEmail($result['data']);
    $service->markSubmitted();

    echo json_encode([
        'success' => true,
        'message' => $emailSent
            ? 'Thank you! Your message was saved and emailed successfully.'
            : 'Thank you! Your message was saved. (Email could not be sent — check server mail settings.)',
    ]);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'Database error. Please run database/schema.sql and check config/config.php.',
    ]);
} catch (Throwable $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'Something went wrong. Please try again later.',
    ]);
}
