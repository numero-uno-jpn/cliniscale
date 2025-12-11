<?php

/**
 * InfoDataProcessor - YAMLとMarkdownを統合してinfoData構造を生成（修正版）
 * 
 * 元のアプリの体裁を維持しつつ、すべてのセクションを処理
 */
class InfoDataProcessor
{
    private $markdownParser;

    public function __construct(MarkdownParser $markdownParser)
    {
        $this->markdownParser = $markdownParser;
    }

    /**
     * infoDataを生成
     * 
     * @param array $yamlData YAMLデータ
     * @param string|null $markdown Markdownテキスト
     * @return array infoData構造
     */
    public function processInfoData($yamlData, $markdown = null)
    {
        $data = [
            'basicInfo' => [],
            'development' => [],
            'copyright' => null,
            'copyrightStructured' => $yamlData['copyright'] ?? null,
            'scaleStructure' => null,          // 新規: 尺度構成
            'reliability' => null,              // 新規: 信頼性・妥当性
            'scoring' => null,                  // 新規: 得点化・解釈
            'implementation' => null,           // 新規: 実施上の注意点
            'interpretation' => null,
            'references' => [],
            'urls' => []
        ];

        // YAMLから基本情報を取得
        if ($yamlData) {
            $data['basicInfo'] = [
                'fullName' => $yamlData['full_name'] ?? null,
                'japaneseName' => $yamlData['japanese_name'] ?? null,
                'targetAge' => $yamlData['target_age'] ?? null,
                'purpose' => $yamlData['purpose'] ?? null,
                'duration' => $yamlData['duration'] ?? null
            ];
        }

        // Markdownが存在する場合、追加情報を統合
        if ($markdown) {
            // JSON作成時の技術的注意点セクションを除外
            $markdown = $this->removeTechnicalNotesSection($markdown);
            
            $this->processMarkdownData($data, $markdown);
        }

        // 空の値を除去
        $data['basicInfo'] = array_filter($data['basicInfo']);
        $data['development'] = array_filter($data['development']);

        return $data;
    }

    /**
     * Markdownから「JSON作成時の技術的注意点」セクションを除外
     * 
     * @param string $markdown Markdownテキスト
     * @return string 除外処理後のMarkdownテキスト
     */
    private function removeTechnicalNotesSection($markdown)
    {
        // H2レベルで「JSON作成時の技術的注意点」が出現し、次のH2までまたは終端まで
        $pattern = '/^## JSON作成時の技術的注意点\s*\n.*?(?=^## |\Z)/ms';
        $markdown = preg_replace($pattern, '', $markdown);
        
        return $markdown;
    }

    /**
     * Markdownデータを解析してinfoDataに統合
     * 
     * @param array &$data infoData配列（参照渡し）
     * @param string $markdown Markdownテキスト
     */
    private function processMarkdownData(&$data, $markdown)
    {
        // === 1. 基本情報セクション ===
        $this->processBasicInfoSection($data, $markdown);

        // === 2. 開発背景セクション ===
        $this->processDevelopmentSection($data, $markdown);

        // === 3. 著作権セクション ===
        $this->processCopyrightSection($data, $markdown);

        // === 4. 尺度構成セクション ===
        $this->processScaleStructureSection($data, $markdown);

        // === 5. 信頼性・妥当性セクション ===
        $this->processReliabilitySection($data, $markdown);

        // === 6. 得点化・解釈セクション ===
        $this->processScoringSection($data, $markdown);

        // === 7. 実施上の注意点セクション ===
        $this->processImplementationSection($data, $markdown);

        // === 8. 参考文献・URLセクション ===
        $this->processReferencesSection($data, $markdown);
    }

    /**
     * 基本情報セクションの処理
     */
    private function processBasicInfoSection(&$data, $markdown)
    {
        // 「尺度の概要」セクション
        $overviewContent = $this->markdownParser->extractSection($markdown, '尺度の概要');
        if (!$overviewContent) {
            $overviewContent = $this->markdownParser->extractSection($markdown, '概要');
        }
        
        if ($overviewContent) {
            // - **正式名称**: ... 形式のフィールドを抽出
            if (preg_match('/[-*]\s*\*\*正式名称\*\*:\s*(.+)/m', $overviewContent, $match)) {
                $data['basicInfo']['fullName'] = $data['basicInfo']['fullName'] ?? trim($match[1]);
            }
            if (preg_match('/[-*]\s*\*\*日本語名\*\*:\s*(.+)/m', $overviewContent, $match)) {
                $data['basicInfo']['japaneseName'] = $data['basicInfo']['japaneseName'] ?? trim($match[1]);
            }
            if (preg_match('/[-*]\s*\*\*対象年齢\*\*:\s*(.+)/m', $overviewContent, $match)) {
                $data['basicInfo']['targetAge'] = $data['basicInfo']['targetAge'] ?? trim($match[1]);
            }
            if (preg_match('/[-*]\s*\*\*評価目的\*\*:\s*(.+)/m', $overviewContent, $match)) {
                $data['basicInfo']['purpose'] = $data['basicInfo']['purpose'] ?? trim($match[1]);
            }
            if (preg_match('/[-*]\s*\*\*実施時間\*\*:\s*(.+)/m', $overviewContent, $match)) {
                $data['basicInfo']['duration'] = $data['basicInfo']['duration'] ?? trim($match[1]);
            }
        }
    }

    /**
     * 開発背景セクションの処理
     */
    private function processDevelopmentSection(&$data, $markdown)
    {
        $devContent = $this->markdownParser->extractSection($markdown, '開発背景');
        if ($devContent) {
            $dev = [];
            if (preg_match('/[-*]\s*\*\*開発者\*\*:\s*(.+)/m', $devContent, $match)) {
                $dev['developer'] = trim($match[1]);
            }
            if (preg_match('/[-*]\s*\*\*発行年\*\*:\s*(.+)/m', $devContent, $match)) {
                $dev['year'] = trim($match[1]);
            }
            if (preg_match('/[-*]\s*\*\*理論的基盤\*\*:\s*(.+)/m', $devContent, $match)) {
                $dev['basis'] = trim($match[1]);
            }
            $data['development'] = $dev;
        }
    }

    /**
     * 著作権セクションの処理
     */
    private function processCopyrightSection(&$data, $markdown)
    {
        $copyrightContent = $this->markdownParser->extractSection($markdown, '著作権');
        if ($copyrightContent) {
            $data['copyright'] = $this->markdownParser->parse($copyrightContent);
        }
    }

    /**
     * 尺度構成セクションの処理
     */
    private function processScaleStructureSection(&$data, $markdown)
    {
        $scaleContent = $this->markdownParser->extractSection($markdown, '尺度構成');
        if ($scaleContent) {
            $data['scaleStructure'] = $this->markdownParser->parse($scaleContent);
        }
    }

    /**
     * 信頼性・妥当性セクションの処理
     */
    private function processReliabilitySection(&$data, $markdown)
    {
        $reliabilityContent = $this->markdownParser->extractSection($markdown, '信頼性・妥当性');
        if ($reliabilityContent) {
            $data['reliability'] = $this->markdownParser->parse($reliabilityContent);
        }
    }

    /**
     * 得点化・解釈セクションの処理
     */
    private function processScoringSection(&$data, $markdown)
    {
        $scoringContent = $this->markdownParser->extractSection($markdown, '得点化・解釈');
        if ($scoringContent) {
            $data['scoring'] = $this->markdownParser->parse($scoringContent);
        }

        // 「重症度の目安」など別名のセクションも確認
        if (!$data['scoring']) {
            $interpretContent = $this->markdownParser->extractSection($markdown, '重症度の目安');
            if (!$interpretContent) {
                $interpretContent = $this->markdownParser->extractSection($markdown, '解釈');
            }
            if ($interpretContent) {
                $data['interpretation'] = $this->markdownParser->parse($interpretContent);
            }
        }
    }

    /**
     * 実施上の注意点セクションの処理
     */
    private function processImplementationSection(&$data, $markdown)
    {
        $implContent = $this->markdownParser->extractSection($markdown, '実施上の注意点');
        if ($implContent) {
            $data['implementation'] = $this->markdownParser->parse($implContent);
        }
    }

    /**
     * 参考文献・URLセクションの処理
     */
    private function processReferencesSection(&$data, $markdown)
    {
        // 主要文献
        $refContent = $this->markdownParser->extractSection($markdown, '主要文献');
        if (!$refContent) {
            $refContent = $this->markdownParser->extractSection($markdown, '参考文献');
        }
        
        if ($refContent) {
            $lines = explode("\n", $refContent);
            foreach ($lines as $line) {
                $line = trim($line);
                if (strpos($line, '-') === 0 || strpos($line, '*') === 0) {
                    $ref = trim(substr($line, 1));
                    $data['references'][] = $this->markdownParser->linkifyReference($ref);
                }
            }
        }

        // 公式URL
        $urlContent = $this->markdownParser->extractSection($markdown, '公式URL');
        if (!$urlContent) {
            $urlContent = $this->markdownParser->extractSection($markdown, '追加情報源');
        }
        
        if ($urlContent) {
            $lines = explode("\n", $urlContent);
            foreach ($lines as $line) {
                if (preg_match('/[-*]\s*(.+?):\s*(https?:\/\/[^\s]+)/', $line, $match)) {
                    $title = trim($match[1]);
                    $url = trim($match[2]);
                    $data['urls'][] = [
                        'title' => strip_tags($this->markdownParser->parse($title)),
                        'url' => $url
                    ];
                }
            }
        }
    }
}
