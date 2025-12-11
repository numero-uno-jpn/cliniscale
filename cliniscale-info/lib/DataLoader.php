<?php

/**
 * DataLoader - YAMLとMarkdownデータの読み込みを担当
 */
class DataLoader
{
    private $masterYamlFile;
    private $definitionsDir;
    private $allQuestionnaires = null;

    public function __construct($masterYamlFile = null, $definitionsDir = null)
    {
        // PHP 7.4互換: ?? 演算子を使用
        $this->masterYamlFile = $masterYamlFile !== null ? $masterYamlFile : '/home/medeputize/www/documents/emuyn/cliniscale/スコア票リスト.yaml';
        $this->definitionsDir = $definitionsDir !== null ? $definitionsDir : '/home/medeputize/www/documents/emuyn/cliniscale/definitions';
    }

    /**
     * マスターYAMLファイルをロード（初回のみ）
     * 
     * @return array|null 全質問票データ、失敗時はnull
     */
    private function loadMasterYaml()
    {
        if ($this->allQuestionnaires !== null) {
            return $this->allQuestionnaires;
        }

        if (!file_exists($this->masterYamlFile)) {
            error_log("Master YAML file not found: {$this->masterYamlFile}");
            return null;
        }

        try {
            // Symfony Yamlを使用
            require_once '/home/medeputize/scripts/stats/vendor/autoload.php';
            $yamlContent = file_get_contents($this->masterYamlFile);
            $this->allQuestionnaires = \Symfony\Component\Yaml\Yaml::parse($yamlContent);
            return $this->allQuestionnaires;
        } catch (Exception $e) {
            error_log("YAML parse error: " . $e->getMessage());
            return null;
        }
    }

    /**
     * 指定されたキーの質問票データ(YAML)を読み込む
     * 
     * @param string $key 質問票のキー (例: PHQ-9)
     * @return array|null YAMLデータの配列、存在しない場合はnull
     */
    public function loadQuestionnaireYaml($key)
    {
        $allData = $this->loadMasterYaml();

        if ($allData === null) {
            return null;
        }

        // キーが存在するかチェック
        if (!isset($allData[$key])) {
            error_log("Questionnaire key not found: {$key}");
            return null;
        }

        return $allData[$key];
    }

    /**
     * ローカルMarkdownファイルを読み込む
     * 
     * @param string $key 質問票のキー
     * @return string|null Markdownテキスト、存在しない場合はnull
     */
    public function loadMarkdownLocal($key)
    {
        $mdFile = $this->definitionsDir . '/' . $key . '.md';

        if (!file_exists($mdFile)) {
            error_log("Markdown file not found: {$mdFile}");
            return null;
        }

        $content = file_get_contents($mdFile);
        if ($content === false) {
            error_log("Failed to read markdown file: {$mdFile}");
            return null;
        }

        return $content;
    }

    /**
     * Markdownを取得
     * 
     * @param string $key 質問票のキー
     * @return string|null Markdownテキスト
     */
    public function getMarkdown($key)
    {
        return $this->loadMarkdownLocal($key);
    }

    /**
     * 統合データを取得（YAMLとMarkdownを組み合わせ）
     * 
     * @param string $key 質問票のキー
     * @return array 統合データ ['yaml' => array, 'markdown' => string]
     */
    public function loadQuestionnaireData($key)
    {
        return [
            'key' => $key,
            'yaml' => $this->loadQuestionnaireYaml($key),
            'markdown' => $this->getMarkdown($key)
        ];
    }
}
