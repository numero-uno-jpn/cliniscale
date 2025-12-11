<?php

/**
 * MarkdownParser - Markdownのパースとリンク自動生成
 * 
 * league/commonmark ライブラリを使用した改善版
 * XSS対策とエラーハンドリングを含む安全な実装
 */
class MarkdownParser
{
    private $converter;

    public function __construct()
    {
        // Composerのautoloadを読み込み
        require_once '/home/medeputize/scripts/stats/vendor/autoload.php';

        // CommonMarkの設定
        $config = [
            'html_input' => 'escape', // HTMLタグをエスケープ（セキュリティ）
            'allow_unsafe_links' => false, // 安全でないリンクを許可しない
        ];

        // コンバーターを初期化
        $environment = new \League\CommonMark\Environment\Environment($config);
        $environment->addExtension(new \League\CommonMark\Extension\CommonMark\CommonMarkCoreExtension());
        
        $this->converter = new \League\CommonMark\MarkdownConverter($environment);
    }

    /**
     * 基本的なMarkdownをHTMLに変換
     * 
     * @param string $markdown Markdownテキスト
     * @return string HTMLテキスト
     */
    public function parse($markdown)
    {
        if (empty($markdown)) {
            return '';
        }

        try {
            // CommonMarkで変換
            $html = $this->converter->convert($markdown)->getContent();

            // カスタムクラスを追加（Tailwind CSS用）
            $html = $this->addTailwindClasses($html);

            return trim($html);
        } catch (Exception $e) {
            error_log("Markdown parse error: " . $e->getMessage());
            // フォールバック: エスケープしたテキストを返す
            return '<p>' . htmlspecialchars($markdown, ENT_QUOTES, 'UTF-8') . '</p>';
        }
    }

    /**
     * HTMLにTailwind CSSクラスを追加
     * 
     * @param string $html HTML文字列
     * @return string クラスが追加されたHTML
     */
    private function addTailwindClasses($html)
    {
        // H2タグ
        $html = preg_replace(
            '/<h2>/',
            '<h2 class="text-lg font-bold mb-3 mt-4 text-gray-900">',
            $html
        );

        // H3タグ
        $html = preg_replace(
            '/<h3>/',
            '<h3 class="text-sm font-bold mb-2 mt-3 text-gray-800">',
            $html
        );

        // H4タグ
        $html = preg_replace(
            '/<h4>/',
            '<h4 class="text-sm font-semibold mb-2 mt-2 text-gray-700">',
            $html
        );

        // ulタグ
        $html = preg_replace(
            '/<ul>/',
            '<ul class="list-disc list-inside space-y-1 ml-2">',
            $html
        );

        // olタグ
        $html = preg_replace(
            '/<ol>/',
            '<ol class="list-decimal list-inside space-y-1 ml-2">',
            $html
        );

        // pタグ
        $html = preg_replace(
            '/<p>/',
            '<p class="mb-2">',
            $html
        );

        // 外部リンクに target="_blank" を追加
        $html = preg_replace(
            '/<a href="(https?:\/\/[^"]+)"/',
            '<a href="$1" target="_blank" rel="noopener noreferrer" class="text-blue-600 hover:underline"',
            $html
        );

        return $html;
    }

    /**
     * Markdownからセクションを抽出
     * 
     * @param string $markdown Markdownテキスト
     * @param string $sectionTitle セクションタイトル
     * @param int|null $level 見出しレベル（2 or 3）。nullの場合は自動判定
     * @return string|null セクションの内容、見つからない場合はnull
     */
    public function extractSection($markdown, $sectionTitle, $level = null)
    {
        if (empty($markdown) || empty($sectionTitle)) {
            return null;
        }

        // セキュリティ：タイトルをエスケープしてから正規表現に使用
        $escapedTitle = preg_quote($sectionTitle, '/');

        // レベルが指定されている場合はそのレベルのみ検索
        // 指定なしの場合はH2→H3の順で検索（H2が優先）
        $levels = $level ? [$level] : [2, 3];

        foreach ($levels as $currentLevel) {
            $hashmarks = str_repeat('#', $currentLevel);

            // セクションを正規表現で抽出
            if ($currentLevel == 2) {
                // H2の場合: 次のH2まで（H3は含む）
                $pattern = '/^##\s+' . $escapedTitle . '\s*\n(.*?)(?=\n##(?:\s|$)|\Z)/ms';
            } else {
                // H3の場合: 次のH3またはH2まで
                $pattern = '/^###\s+' . $escapedTitle . '\s*\n(.*?)(?=\n###(?:\s|$)|\n##(?:\s|$)|\Z)/ms';
            }

            if (preg_match($pattern, $markdown, $matches)) {
                return trim($matches[1]);
            }
        }

        return null;
    }

    /**
     * 参考文献のURL/DOI/PMID/PMCIDを自動リンク化
     * 
     * @param string $text 参考文献テキスト
     * @return string リンク化されたHTML
     */
    public function linkifyReference($text)
    {
        if (empty($text)) {
            return '';
        }

        // セキュリティ：入力をエスケープ
        $text = htmlspecialchars($text, ENT_QUOTES, 'UTF-8');

        // PMCID
        $text = preg_replace_callback(
            '/PMCID:\s*(PMC\d+)/i',
            function ($matches) {
                $id = $matches[1];
                $url = 'https://www.ncbi.nlm.nih.gov/pmc/articles/' . $id . '/';
                return '<a href="' . $url . '" target="_blank" rel="noopener noreferrer" class="text-blue-600 hover:underline"><i class="fas fa-external-link-alt text-xs mr-1"></i>PMCID: ' . $id . '</a>';
            },
            $text
        );

        // PMID
        $text = preg_replace_callback(
            '/PMID:\s*(\d+)/i',
            function ($matches) {
                $id = $matches[1];
                $url = 'https://pubmed.ncbi.nlm.nih.gov/' . $id . '/';
                return '<a href="' . $url . '" target="_blank" rel="noopener noreferrer" class="text-blue-600 hover:underline"><i class="fas fa-external-link-alt text-xs mr-1"></i>PMID: ' . $id . '</a>';
            },
            $text
        );

        // DOI
        $text = preg_replace_callback(
            '/doi:\s*([^\s<]+)/i',
            function ($matches) {
                $doi = $matches[1];
                $url = 'https://doi.org/' . $doi;
                return 'doi: <a href="' . $url . '" target="_blank" rel="noopener noreferrer" class="text-blue-600 hover:underline"><i class="fas fa-external-link-alt text-xs mr-1"></i>' . $doi . '</a>';
            },
            $text
        );

        // 通常のURL
        $text = preg_replace_callback(
            '/(?<!href=")(?<!href=&quot;)(https?:\/\/[^\s<]+)(?![^<]*<\/a>)/i',
            function ($matches) {
                $url = $matches[1];
                return '<a href="' . $url . '" target="_blank" rel="noopener noreferrer" class="text-blue-600 hover:underline"><i class="fas fa-external-link-alt text-xs mr-1"></i>' . $url . '</a>';
            },
            $text
        );

        return trim($text);
    }
}
