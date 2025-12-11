<?php
// sitemap.php
// Cliniscale サイトマップ自動生成

// バッファリングを開始（余分な出力を防止）
ob_start();

// ヘッダーを設定
header('Content-Type: application/xml; charset=UTF-8');

// エラー出力を抑制
error_reporting(0);
ini_set('display_errors', 0);

require_once '/home/medeputize/scripts/stats/vendor/autoload.php';

use Symfony\Component\Yaml\Yaml;

// YAML ファイル読み込み
$yamlPath = '/home/medeputize/www/documents/emuyn/cliniscale/スコア票リスト.yaml';
$questionnaires = [];

if (file_exists($yamlPath)) {
    try {
        $yamlContent = file_get_contents($yamlPath);
        $questionnaires = Yaml::parse($yamlContent);
    } catch (Exception $e) {
        error_log('Failed to load questionnaires for sitemap: ' . $e->getMessage());
    }
}

// XML出力
echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <?php
    $baseUrl = 'https://cliniscale.emuyn.net';

    // トップページ
    echo "  <url>\n";
    echo "    <loc>{$baseUrl}/</loc>\n";
    echo "    <changefreq>weekly</changefreq>\n";
    echo "    <priority>1.0</priority>\n";
    echo "  </url>\n";

    // 各スコア票ページ
    foreach ($questionnaires as $id => $item) {
        if (!$id) continue;

        $slug = htmlspecialchars($id, ENT_QUOTES, 'UTF-8');
        $loc = "{$baseUrl}/{$slug}";
        $priority = 0.8;

        // YAML に更新日やグループ情報がある場合 もしくは YAML 更新日
        $yamlFileTime = filemtime($yamlPath);
        $yamlLastmod = date('Y-m-d', $yamlFileTime);

        $lastmod = null;
        if (isset($item['updated'])) {
            $ts = strtotime($item['updated']);
            if ($ts) {
                $itemLastmod = date('Y-m-d', $ts);
                // どちらか新しい方を採用
                $lastmod = max($itemLastmod, $yamlLastmod);
            }
        } else {
            $lastmod = $yamlLastmod;
        }

        echo "  <url>\n";
        echo "    <loc>{$loc}</loc>\n";
        if ($lastmod) echo "    <lastmod>{$lastmod}</lastmod>\n";
        echo "    <changefreq>monthly</changefreq>\n";
        echo "    <priority>{$priority}</priority>\n";
        echo "  </url>\n";

        // info ページ
        echo "  <url>\n";
        echo "    <loc>{$loc}/info</loc>\n";
        if ($lastmod) echo "    <lastmod>{$lastmod}</lastmod>\n";
        echo "    <changefreq>monthly</changefreq>\n";
        echo "    <priority>{$priority}</priority>\n";
        echo "  </url>\n";
    }
    ?>
</urlset>
<?php
// バッファをフラッシュして出力
ob_end_flush();
?>