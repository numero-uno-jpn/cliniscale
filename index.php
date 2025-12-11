<?php
// index.php
require_once '/home/medeputize/scripts/stats/vendor/autoload.php';

use Symfony\Component\Yaml\Yaml;

// スケール票リストを読み込み
$yamlPath = '/home/medeputize/www/documents/emuyn/cliniscale/スコア票リスト.yaml';
$questionnaires = [];

if (file_exists($yamlPath)) {
    try {
        $yamlContent = file_get_contents($yamlPath);
        $questionnaires = Yaml::parse($yamlContent);
    } catch (Exception $e) {
        error_log('Failed to load questionnaires: ' . $e->getMessage());
    }
}

// URLパスから questionnaire ID を取得
$questionnaireId = null;
$questionnaireData = null;
$markdownContent = null;

$path = $_SERVER['REQUEST_URI'];
if (preg_match('/\/([^\/\?]+)\/?(\?.*)?$/', $path, $matches)) {
    $candidate = urldecode($matches[1]);
    if ($candidate !== 'index.php' && $candidate !== '' && isset($questionnaires[$candidate])) {
        $questionnaireId = $candidate;
    }
}

// questionnaire データを読み込み
if ($questionnaireId) {
    $basePath = '/home/medeputize/www/documents/emuyn/cliniscale/definitions/';
    $safeId = basename($questionnaireId);
    $jsonPath = $basePath . $safeId . '.json';
    $mdPath = $basePath . $safeId . '.md';

    if (file_exists($jsonPath)) {
        $questionnaireData = json_decode(file_get_contents($jsonPath), true);
        if (file_exists($mdPath)) {
            $markdownContent = file_get_contents($mdPath);
        }
    }
    $preloadedQuestionnaire = [
        'id' => $questionnaireId,
        'data' => $questionnaireData,
        'markdown' => $markdownContent
    ];
} else {
    $preloadedQuestionnaire = null;
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>臨床評価スケール票 - Clinical Assessment Scale</title>
    <meta name="description" content="医療現場で使用される標準化された評価スケールを簡単に利用できるアプリケーションです。">

    <!-- PWA用メタタグ -->
    <meta name="theme-color" content="#3B82F6">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta name="apple-mobile-web-app-title" content="スケール票">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="img/favicon.ico">
    <link rel="icon" type="image/svg+xml" href="img/favicon.svg">
    <link rel="icon" type="image/png" sizes="96x96" href="img/favicon-96x96.png">
    <link rel="apple-touch-icon" sizes="180x180" href="img/apple-touch-icon.png">
    <link rel="manifest" href="./site.webmanifest">
    <link rel="apple-touch-startup-image" href="img/web-app-manifest-512x512.png">

    <!-- CSS Dependencies -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- JS Dependencies -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.14/vue.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.21/lodash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=BIZ+UDPGothic:wght@400;700&family=Noto+Sans+JP:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Custom Style -->
    <link rel="stylesheet" href="client-app.css">

    <!-- Utilities -->
    <script src="utils.js"></script>

    <!-- PHP からデータを埋め込み -->
    <script>
        window.PHP_DATA = {
            questionnaires: <?= json_encode($questionnaires, JSON_UNESCAPED_UNICODE); ?>,
            preloadedQuestionnaire: <?= json_encode($preloadedQuestionnaire, JSON_UNESCAPED_UNICODE); ?>,
        };
    </script>
</head>

<body class="bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen">
    <?php include_once 'components/QuestionnaireSelector.php'; ?>
    <?php include_once 'components/QuestionnaireClient.php'; ?>
    <?php include_once 'ClientApp.php'; ?>
</body>

</html>