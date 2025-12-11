<?php

/**
 * InfoRenderer - infoDataからHTMLを生成（元の体裁を維持 + 全セクション対応）
 */
class InfoRenderer
{
    /**
     * @var bool ライセンス制限によってCliniScaleリンクを表示するかどうか
     */
    private $showCliniScaleLink = true;

    /**
     * 完全なHTMLページを生成
     */
    public function renderFullPage($key, $infoData, $yamlData)
    {
        $title = $yamlData['abbreviation'] ?? $key;
        $pageTitle = "{$title} - 詳細情報 | CliniScale";

        // ★ ライセンスカテゴリのチェックを追加（クラスプロパティに保存）
        $licenseCategory = $yamlData['copyright']['license_category'] ?? '';
        $permissionRequired = [
            'permission_required_paid',
            'permission_required_free',
            'non_commercial_free',
            'commercial_license_required',
            'restricted'
        ];
        $this->showCliniScaleLink = !in_array($licenseCategory, $permissionRequired);

        ob_start();
?>
        <!DOCTYPE html>
        <html lang="ja">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title><?= htmlspecialchars($pageTitle) ?></title>
            <script src="https://cdn.tailwindcss.com"></script>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
            <style>
                .copyright-detail-grid {
                    display: grid;
                    grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
                    gap: 0.75rem;
                }

                .copyright-detail-item {
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    padding: 0.75rem;
                    background: white;
                    border-radius: 0.375rem;
                    border: 1px solid #e0e7ff;
                }

                .copyright-detail-label {
                    font-size: 0.75rem;
                    margin-top: 0.25rem;
                }

                .copyright-detail-value {
                    font-weight: 600;
                    margin-top: 0.125rem;
                }

                body {
                    background-color: #f9fafb;
                }
            </style>
        </head>

        <body class="min-h-screen">
            <!-- ヘッダー -->
            <header class="bg-white shadow-md fixed top-0 left-0 right-0 z-50">
                <div class="container mx-auto px-4 py-4">
                    <div class="flex items-center justify-between">
                        <h1 class="text-xl font-bold text-gray-800 flex items-center">
                            <img src="../img/favicon-96x96.png" alt="臨床評価スケール ClinicalScale" class="w-12 h-12">
                            &nbsp;CliniScale 臨床評価スケール情報
                        </h1>
                        <?php if ($this->showCliniScaleLink): ?>
                            <a href="/<?= htmlspecialchars($key) ?>"
                                class="text-sm text-blue-600 hover:text-blue-800 font-medium flex items-center">
                                <i class="fas fa-external-link-alt mr-1"></i>CliniScale で入力
                            </a>
                        <?php else: ?>
                            <span class="text-sm text-gray-400 flex items-center">
                                <i class="fas fa-lock mr-1"></i>使用には許諾が必要です
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
            </header>

            <!-- メインコンテンツ -->
            <main class="container mx-auto px-4 py-6 max-w-4xl mt-20">
                <?= $this->renderInfoPanel($key, $infoData, $yamlData) ?>
            </main>

            <!-- フッター -->
            <footer class="bg-gray-50 border-t border-gray-200 mt-12">
                <div class="bg-yellow-50 border-t-4 border-yellow-400">
                    <div class="container mx-auto px-4 py-6 max-w-7xl">
                        <div class="flex items-start gap-3">
                            <i class="fas fa-exclamation-triangle text-yellow-600 text-2xl flex-shrink-0 mt-1"></i>
                            <div>
                                <h3 class="text-lg font-bold text-yellow-900 mb-3">医療情報に関する免責事項</h3>
                                <div class="text-sm text-yellow-800 space-y-2">
                                    <p class="font-semibold">本ページは医療評価スケールに関する一般的な情報を提供するものであり、医療行為を目的とするものではありません。</p>
                                    <ul class="list-disc list-inside space-y-1 ml-2">
                                        <li>本ページに掲載された内容は、教育・研究・情報共有を目的とした参考情報です。</li>
                                        <li>内容は正確性の確保に努めていますが、すべての利用目的に対して完全性・最新性を保証するものではありません。</li>
                                        <li>疾患の診断や治療方針の決定など、医療行為に関する判断は必ず<strong>医療専門家の指導</strong>のもとで行ってください。</li>
                                        <li>患者様ご自身の判断で医療行為を行うことは避け、疑問点がある場合は<strong>医師・医療従事者にご相談</strong>ください。</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-orange-50 border-t border-orange-200">
                    <div class="container mx-auto px-4 py-6 max-w-7xl">
                        <div class="flex items-start gap-3">
                            <i class="fas fa-shield-alt text-orange-600 text-xl flex-shrink-0 mt-1"></i>
                            <div class="flex-1">
                                <h3 class="text-base font-bold text-orange-900 mb-2">責任の範囲</h3>
                                <div class="text-sm text-orange-800 space-y-2">
                                    <p>当サイトの情報は一般的な医療評価スケールに関する公開情報に基づいて提供されていますが、その正確性・妥当性・適用性を保証するものではありません。</p>
                                    <p>掲載内容の誤りや第三者サイトへのリンクに起因して利用者または第三者に生じた損害について、当社は一切の責任を負いません。</p>
                                    <p>本ページの内容は予告なく修正・更新される場合があります。常に最新の公式情報・原著論文・ライセンス情報をご確認ください。</p>
                                    <p>情報に誤りや不備を発見された場合は、<strong>ご連絡いただければ速やかに修正いたします。</strong></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container mx-auto px-4 py-8 max-w-7xl">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-6">
                        <div>
                            <h4 class="text-sm font-bold text-gray-900 mb-3 flex items-center gap-2">
                                <i class="fas fa-building"></i>運営について
                            </h4>
                            <div class="text-sm text-gray-600 space-y-2">
                                <p><a href="https://www.emuyn.net/" target="_blank" rel="noopener noreferrer" class="text-blue-600 hover:underline font-medium">
                                        EMUYN 合同会社<i class="fas fa-external-link-alt text-xs ml-1"></i></a></p>
                                <p class="text-xs">医療・教育分野のデジタルツール開発</p>
                            </div>
                        </div>
                    </div>
                    <div class="pt-6 border-t border-gray-200">
                        <div class="flex flex-col md:flex-row justify-between items-center gap-4 text-xs text-gray-500">
                            <p>© 2025 emuyn. All rights reserved.</p>
                            <div class="flex gap-4">
                                <a href="https://www.emuyn.net/CliniScale/terms" target="_blank" rel="noopener noreferrer" class="hover:text-gray-700 hover:underline">利用規約</a>
                                <a href="https://www.emuyn.net/CliniScale/privacy" target="_blank" rel="noopener noreferrer" class="hover:text-gray-700 hover:underline">プライバシーポリシー</a>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </body>

        </html>
    <?php
        return ob_get_clean();
    }

    /**
     * 詳細情報パネルのコンテンツを生成
     */
    public function renderInfoPanel($key, $infoData, $yamlData)
    {
        $sampleAppUrl = $yamlData['sample_app'] ?? null;
        ob_start();
    ?>
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="bg-gradient-to-r from-blue-600 to-blue-700 px-6 py-4">
                <h2 class="text-2xl font-bold text-white">
                    <?= htmlspecialchars($yamlData['abbreviation'] ?? $key) ?>
                    <?php if (!empty($infoData['basicInfo']['japaneseName']) && ($infoData['basicInfo']['japaneseName'] !== ($yamlData['abbreviation'] ?? $key))): ?>
                        (<?= htmlspecialchars($infoData['basicInfo']['japaneseName']) ?>)
                    <?php endif; ?>
                </h2>
                <p class="text-blue-100 mt-1">詳細情報</p>
            </div>

            <div class="px-6 py-4 text-gray-600 text-sm space-y-3 border-b border-gray-100">
                <?php if ($this->showCliniScaleLink && $sampleAppUrl): ?>
                    <p>このアプリは、CliniScaleで提供している臨床評価スケールの内容を説明するものです。</p>
                <?php endif; ?>
                <p class="text-xs text-gray-500">正確な情報については、必ず原典を参照してください。</p>
                <?php if ($this->showCliniScaleLink): ?>
                    <div class="mt-4">
                        <a href="/<?= htmlspecialchars($key) ?>" target="_blank"
                            class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow-md transition-colors">
                            <i class="fas fa-external-link-alt mr-2"></i>CliniScale で入力する
                        </a>
                    </div>
                <?php endif; ?>
                <?php if ($this->showCliniScaleLink && $sampleAppUrl): ?>
                    <p class="text-xs">
                        業務でのご利用には、個人情報・個人データを侵害しないウェブ問診システムの
                        <a href="https://www.emuyn.net/q4cl/index" target="_blank"
                            class="inline-flex items-center px-1 py-1 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-md shadow-md transition-colors">
                            セキュア問診票
                        </a> をご利用ください。<br>
                        患者さんの個人データに、運営会社や第三者はアクセス不可能である、という点が最大の特徴です。<br>
                        個人データの流出や営利目的の転用は絶対にありません！
                    </p>

                    <div class="mt-4">
                        <a href="<?= htmlspecialchars($sampleAppUrl) ?>" target="_blank"
                            class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow-md transition-colors">
                            <i class="fas fa-external-link-alt mr-2"></i>セキュア問診票での入力を試す
                        </a>
                    </div>
                <?php endif; ?>
            </div>

            <div class="p-6 space-y-6">
                <?php if (!empty($infoData['basicInfo'])): ?>
                    <?= $this->renderBasicInfo($infoData['basicInfo']) ?>
                <?php endif; ?>

                <?php if (!empty($infoData['development'])): ?>
                    <?= $this->renderDevelopment($infoData['development']) ?>
                <?php endif; ?>

                <?= $this->renderCopyright($infoData) ?>

                <?php if (!empty($infoData['scaleStructure'])): ?>
                    <?= $this->renderScaleStructure($infoData['scaleStructure']) ?>
                <?php endif; ?>

                <?php if (!empty($infoData['reliability'])): ?>
                    <?= $this->renderReliability($infoData['reliability']) ?>
                <?php endif; ?>

                <?php if (!empty($infoData['scoring'])): ?>
                    <?= $this->renderScoring($infoData['scoring']) ?>
                <?php elseif (!empty($infoData['interpretation'])): ?>
                    <?= $this->renderInterpretation($infoData['interpretation']) ?>
                <?php endif; ?>

                <?php if (!empty($infoData['implementation'])): ?>
                    <?= $this->renderImplementation($infoData['implementation']) ?>
                <?php endif; ?>

                <?php if (!empty($infoData['references'])): ?>
                    <?= $this->renderReferences($infoData['references']) ?>
                <?php endif; ?>

                <?php if (!empty($infoData['urls'])): ?>
                    <?= $this->renderUrls($infoData['urls']) ?>
                <?php endif; ?>
            </div>
        </div>
    <?php
        return ob_get_clean();
    }

    /**
     * 基本情報セクション
     */
    private function renderBasicInfo($basicInfo)
    {
        ob_start();
    ?>
        <div class="bg-blue-50 border-l-4 border-blue-400 p-4 rounded">
            <h3 class="text-md font-semibold text-blue-900 mb-3">
                <i class="fas fa-info-circle mr-2"></i>基本情報
            </h3>
            <div class="text-sm text-blue-800 space-y-2">
                <?php if (!empty($basicInfo['fullName'])): ?>
                    <p><strong>正式名称:</strong> <?= htmlspecialchars($basicInfo['fullName']) ?></p>
                <?php endif; ?>
                <?php if (!empty($basicInfo['japaneseName'])): ?>
                    <p><strong>日本語名:</strong> <?= htmlspecialchars($basicInfo['japaneseName']) ?></p>
                <?php endif; ?>
                <?php if (!empty($basicInfo['targetAge'])): ?>
                    <p><strong>対象年齢:</strong> <?= htmlspecialchars($basicInfo['targetAge']) ?></p>
                <?php endif; ?>
                <?php if (!empty($basicInfo['purpose'])): ?>
                    <p><strong>評価目的:</strong> <?= htmlspecialchars($basicInfo['purpose']) ?></p>
                <?php endif; ?>
                <?php if (!empty($basicInfo['duration'])): ?>
                    <p><strong>実施時間:</strong> <?= htmlspecialchars($basicInfo['duration']) ?></p>
                <?php endif; ?>
            </div>
        </div>
    <?php
        return ob_get_clean();
    }

    /**
     * 開発背景セクション
     */
    private function renderDevelopment($development)
    {
        ob_start();
    ?>
        <div class="bg-green-50 border-l-4 border-green-400 p-4 rounded">
            <h3 class="text-md font-semibold text-green-900 mb-3">
                <i class="fas fa-book mr-2"></i>開発背景
            </h3>
            <div class="text-sm text-green-800 space-y-2">
                <?php if (!empty($development['developer'])): ?>
                    <p><strong>開発者:</strong> <?= htmlspecialchars($development['developer']) ?></p>
                <?php endif; ?>
                <?php if (!empty($development['year'])): ?>
                    <p><strong>発行年:</strong> <?= htmlspecialchars($development['year']) ?></p>
                <?php endif; ?>
                <?php if (!empty($development['basis'])): ?>
                    <p><strong>理論的基盤:</strong> <?= htmlspecialchars($development['basis']) ?></p>
                <?php endif; ?>
            </div>
        </div>
    <?php
        return ob_get_clean();
    }

    /**
     * 著作権情報セクション
     */
    private function renderCopyright($infoData)
    {
        ob_start();
    ?>
        <div class="bg-indigo-50 border-l-4 border-indigo-400 p-4 rounded">
            <h3 class="text-md font-semibold text-indigo-900 mb-3">
                <i class="fas fa-balance-scale mr-2"></i>著作権・使用条件
            </h3>

            <?php if (!empty($infoData['copyright'])): ?>
                <div class="text-sm mb-3 text-indigo-800">
                    <?= $infoData['copyright'] ?>
                </div>
            <?php endif; ?>

            <?php if (!empty($infoData['copyrightStructured']['license_category'])): ?>
                <?= $this->renderCopyrightStructured($infoData['copyrightStructured']) ?>
            <?php endif; ?>
        </div>
    <?php
        return ob_get_clean();
    }

    /**
     * 構造化された著作権情報
     */
    private function renderCopyrightStructured($copyright)
    {
        ob_start();
    ?>
        <div class="mb-3 p-3 bg-white rounded border border-indigo-200">
            <div class="flex items-center gap-2 mb-1">
                <i class="fas <?= $this->getCopyrightIcon($copyright['license_category'] ?? 'unknown') ?> text-indigo-600"></i>
                <span class="font-semibold text-indigo-900">
                    <?= $this->getCopyrightLabel($copyright['license_category'] ?? 'unknown') ?>
                </span>
            </div>
        </div>

        <div class="copyright-detail-grid mb-3">
            <div class="copyright-detail-item">
                <i class="fas <?= $this->getBooleanIcon($copyright['commercial_use'] ?? null) ?> <?= $this->getBooleanClass($copyright['commercial_use'] ?? null) ?>"></i>
                <span class="copyright-detail-label text-gray-600">商用利用</span>
                <span class="copyright-detail-value text-gray-800">
                    <?= $this->getBooleanDisplay($copyright['commercial_use'] ?? null) ?>
                </span>
            </div>

            <div class="copyright-detail-item">
                <i class="fas <?= $this->getBooleanIcon(!($copyright['permission_required'] ?? true)) ?> <?= $this->getBooleanClass(!($copyright['permission_required'] ?? true)) ?>"></i>
                <span class="copyright-detail-label text-gray-600">許諾</span>
                <span class="copyright-detail-value text-gray-800">
                    <?= isset($copyright['permission_required']) ? ($copyright['permission_required'] ? '必要' : '不要') : '情報なし' ?>
                </span>
            </div>

            <div class="copyright-detail-item">
                <i class="fas <?= $this->getBooleanIcon(!($copyright['fees_required'] ?? true)) ?> <?= $this->getBooleanClass(!($copyright['fees_required'] ?? true)) ?>"></i>
                <span class="copyright-detail-label text-gray-600">料金</span>
                <span class="copyright-detail-value text-gray-800">
                    <?= isset($copyright['fees_required']) ? ($copyright['fees_required'] ? '有料' : '無料') : '情報なし' ?>
                </span>
            </div>

            <div class="copyright-detail-item">
                <i class="fas <?= $this->getBooleanIcon(!($copyright['training_required'] ?? true)) ?> <?= $this->getBooleanClass(!($copyright['training_required'] ?? true)) ?>"></i>
                <span class="copyright-detail-label text-gray-600">研修</span>
                <span class="copyright-detail-value text-gray-800">
                    <?= isset($copyright['training_required']) ? ($copyright['training_required'] ? '必要' : '不要') : '情報なし' ?>
                </span>
            </div>
        </div>

        <?php if (!empty($copyright['original_developers'])): ?>
            <div class="text-sm text-indigo-800 mb-2">
                <strong>原開発者:</strong> <?= htmlspecialchars($copyright['original_developers']) ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($copyright['japanese_version'])): ?>
            <div class="text-sm text-indigo-800 mb-2">
                <strong>日本語版:</strong> <?= htmlspecialchars($copyright['japanese_version']) ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($copyright['recommendations'])): ?>
            <div class="mt-3 p-3 bg-indigo-100 rounded text-sm text-indigo-900">
                <strong class="block mb-1">
                    <i class="fas fa-lightbulb mr-1"></i>利用時の推奨事項
                </strong>
                <?= nl2br(htmlspecialchars($copyright['recommendations'])) ?>
            </div>
        <?php endif; ?>

        <?php if (($copyright['license_category'] ?? '') === 'unknown'): ?>
            <div class="mt-3 p-3 bg-gray-100 rounded text-sm text-gray-700">
                <i class="fas fa-info-circle mr-1"></i>
                著作権情報が不足しています。使用前に開発者または関連機関に確認することをお勧めします。
            </div>
        <?php endif; ?>
    <?php
        return ob_get_clean();
    }

    /**
     * 尺度構成セクション（新規）
     */
    private function renderScaleStructure($scaleStructure)
    {
        ob_start();
    ?>
        <div class="bg-teal-50 border-l-4 border-teal-400 p-4 rounded">
            <h3 class="text-md font-semibold text-teal-900 mb-3">
                <i class="fas fa-sitemap mr-2"></i>尺度構成
            </h3>
            <div class="text-sm text-teal-800">
                <?= $scaleStructure ?>
            </div>
        </div>
    <?php
        return ob_get_clean();
    }

    /**
     * 信頼性・妥当性セクション（新規）
     */
    private function renderReliability($reliability)
    {
        ob_start();
    ?>
        <div class="bg-amber-50 border-l-4 border-amber-400 p-4 rounded">
            <h3 class="text-md font-semibold text-amber-900 mb-3">
                <i class="fas fa-check-double mr-2"></i>信頼性・妥当性
            </h3>
            <div class="text-sm text-amber-800">
                <?= $reliability ?>
            </div>
        </div>
    <?php
        return ob_get_clean();
    }

    /**
     * 得点化・解釈セクション（新規）
     */
    private function renderScoring($scoring)
    {
        ob_start();
    ?>
        <div class="bg-purple-50 border-l-4 border-purple-400 p-4 rounded">
            <h3 class="text-md font-semibold text-purple-900 mb-3">
                <i class="fas fa-calculator mr-2"></i>得点化・解釈
            </h3>
            <div class="text-sm text-purple-800">
                <?= $scoring ?>
            </div>
        </div>
    <?php
        return ob_get_clean();
    }

    /**
     * 得点化・解釈セクション（旧）
     */
    private function renderInterpretation($interpretation)
    {
        ob_start();
    ?>
        <div class="bg-purple-50 border-l-4 border-purple-400 p-4 rounded">
            <h3 class="text-md font-semibold text-purple-900 mb-3">
                <i class="fas fa-chart-line mr-2"></i>得点化・解釈
            </h3>
            <div class="text-sm text-purple-800">
                <?= $interpretation ?>
            </div>
        </div>
    <?php
        return ob_get_clean();
    }

    /**
     * 実施上の注意点セクション（新規）
     */
    private function renderImplementation($implementation)
    {
        ob_start();
    ?>
        <div class="bg-rose-50 border-l-4 border-rose-400 p-4 rounded">
            <h3 class="text-md font-semibold text-rose-900 mb-3">
                <i class="fas fa-exclamation-circle mr-2"></i>実施上の注意点
            </h3>
            <div class="text-sm text-rose-800">
                <?= $implementation ?>
            </div>
        </div>
    <?php
        return ob_get_clean();
    }

    /**
     * 参考文献セクション
     */
    private function renderReferences($references)
    {
        ob_start();
    ?>
        <div class="bg-gray-50 border-l-4 border-gray-400 p-4 rounded">
            <h3 class="text-md font-semibold text-gray-900 mb-3">
                <i class="fas fa-book-open mr-2"></i>参考文献
            </h3>
            <div class="text-sm text-gray-700">
                <ul class="list-disc list-inside space-y-2">
                    <?php foreach ($references as $ref): ?>
                        <li><?= $ref ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    <?php
        return ob_get_clean();
    }

    /**
     * 公式URLセクション
     */
    private function renderUrls($urls)
    {
        ob_start();
    ?>
        <div class="bg-indigo-50 border-l-4 border-indigo-400 p-4 rounded">
            <h3 class="text-md font-semibold text-indigo-900 mb-3">
                <i class="fas fa-link mr-2"></i>リンク
            </h3>
            <div class="text-sm text-indigo-800 space-y-1">
                <?php foreach ($urls as $url): ?>
                    <a href="<?= htmlspecialchars($url['url']) ?>"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="block hover:underline">
                        <i class="fas fa-external-link-alt mr-1"></i>
                        <?= htmlspecialchars($url['title']) ?>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
<?php
        return ob_get_clean();
    }

    // ヘルパーメソッド

    private function getCopyrightIcon($category)
    {
        $icons = [
            'public_domain' => 'fa-globe',
            'open_with_attribution' => 'fa-creative-commons',
            'restricted' => 'fa-lock',
            'proprietary' => 'fa-copyright',
            'unknown' => 'fa-question-circle'
        ];
        return $icons[$category] ?? 'fa-question-circle';
    }

    private function getCopyrightLabel($category)
    {
        $labels = [
            'public_domain' => 'パブリックドメイン',
            'open_with_attribution' => 'オープン（要出典明記）',
            'restricted' => '制限あり',
            'proprietary' => '専有ライセンス',
            'unknown' => '情報なし'
        ];
        return $labels[$category] ?? '情報なし';
    }

    private function getBooleanIcon($value)
    {
        if ($value === true) return 'fa-check-circle';
        if ($value === false) return 'fa-times-circle';
        return 'fa-question-circle';
    }

    private function getBooleanClass($value)
    {
        if ($value === true) return 'text-green-600';
        if ($value === false) return 'text-red-600';
        return 'text-gray-400';
    }

    private function getBooleanDisplay($value)
    {
        if ($value === true) return '可';
        if ($value === false) return '不可';
        return '情報なし';
    }
}
