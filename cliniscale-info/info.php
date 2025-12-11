<?php

/**
 * info.php - 質問票の詳細情報表示（日本語ファイル名対応版）
 * 
 * 使用方法: info.php?q=PHQ-9
 *          info.php?q=House-Brackmann分類
 */

// エラー表示設定（開発時）
error_reporting(E_ALL);
ini_set('display_errors', 1);

// 必要なクラスをインクルード
require_once __DIR__ . '/lib/DataLoader.php';
require_once __DIR__ . '/lib/MarkdownParser.php';
require_once __DIR__ . '/lib/InfoDataProcessor.php';
require_once __DIR__ . '/lib/InfoRenderer.php';

// 質問票キーの取得
$questionnaireKey = $_GET['q'] ?? null;

if (!$questionnaireKey) {
    http_response_code(400);
    die('エラー: 質問票キー (q パラメータ) が指定されていません。');
}

// 不正なキーのチェック（セキュリティ）
// 日本語（UTF-8）、英数字、ハイフン、アンダースコアを許可
// ただし、パストラバーサル攻撃を防ぐため .. / \ は禁止
if (
    strpos($questionnaireKey, '..') !== false ||
    strpos($questionnaireKey, '/') !== false ||
    strpos($questionnaireKey, '\\') !== false ||
    strpos($questionnaireKey, "\0") !== false
) {
    http_response_code(400);
    die('エラー: 無効な質問票キーです。');
}

// 制御文字のチェック
if (preg_match('/[\x00-\x1F\x7F]/', $questionnaireKey)) {
    http_response_code(400);
    die('エラー: 無効な質問票キーです。');
}

try {
    // 1. データロード（実際のファイルパスを指定）
    $masterYamlFile = __DIR__ . '/data/スコア票リスト.yaml';
    $definitionsDir = __DIR__ . '/data/definitions';

    $dataLoader = new DataLoader($masterYamlFile, $definitionsDir);
    $data = $dataLoader->loadQuestionnaireData($questionnaireKey);

    // 質問票が存在するかチェック
    if ($data['yaml'] === null) {
        http_response_code(404);
        die("エラー: 質問票「{$questionnaireKey}」が見つかりません。");
    }

    // 2. データ処理
    $markdownParser = new MarkdownParser();
    $processor = new InfoDataProcessor($markdownParser);
    $infoData = $processor->processInfoData($data['yaml'], $data['markdown']);

    // 3. HTML生成（質問票キーを渡して「戻る」リンク先を設定）
    $renderer = new InfoRenderer();
    $html = $renderer->renderFullPage($questionnaireKey, $infoData, $data['yaml']);

    // 4. 出力
    echo $html;
} catch (Exception $e) {
    http_response_code(500);
    error_log("Error in info.php: " . $e->getMessage());
    die('エラー: サーバーエラーが発生しました。');
}

?>
<style>
    body {
        font-family: "Biz UDPGothic", "Noto Sans JP", sans-serif;
    }
</style>