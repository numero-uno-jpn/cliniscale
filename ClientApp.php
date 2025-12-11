<?php
// ClientApp.php
?>
<div id="client-app" v-cloak>

    <!-- ヘッダー -->
    <header
        class="bg-white shadow-md sticky top-0 z-50 transition-transform duration-300"
        :class="{
            'cursor-pointer': !selectedQuestionnaire,
            '-translate-y-full': selectedQuestionnaire && hideHeader
        }"
        @click="handleHeaderClick">
        <div class="container mx-auto px-4 py-4">
            <div class="flex items-center justify-between">
                <!-- スコア票選択時 -->
                <div v-if="selectedQuestionnaire" class="flex items-center justify-between w-full">
                    <button
                        @click.stop="handleBack"
                        class="flex items-center text-blue-600 hover:text-blue-800 transition-colors">
                        <img src="img/favicon-96x96.png" alt="臨床評価スケール ClinicalScale" class="w-12 h-12">
                        <span v-if="isTitleVisible" class="font-medium text-sm sm:text-base">&emsp;一覧表示へ&nbsp;</span>
                    </button>
                    <div v-if="!isTitleVisible" class="flex-1 text-center flex items-center justify-center gap-2">
                        <h1 class="text-lg font-bold text-gray-800">{{ selectedQuestionnaire.data.abbreviation }}</h1>
                    </div>
                    <button
                        @click.stop="toggleInfoPanel"
                        class="flex items-center gap-2 px-4 py-2 bg-blue-100 text-blue-700 rounded-lg hover:bg-blue-200 transition-colors">
                        <i class="fas fa-info-circle"></i>
                        <span class="sm:inline">詳細情報</span>
                    </button>
                </div>

                <!-- 一覧表示時 -->
                <div v-else class="flex items-center justify-between w-full">
                    <div class="flex items-center gap-3">
                        <img src="img/favicon-96x96.png" alt="臨床評価スケール ClinicalScale" class="w-12 h-12">
                        <div>
                            <h1 class="text-xl font-bold text-gray-800">臨床評価スケール</h1>
                            <p class="text-xs text-gray-600">Clinical Assessment Scale</p>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-search text-gray-600 text-3xl cursor-pointer hover:text-blue-600 transition-colors"></i>
                        <i :class="showSearchPanel ? 'fas fa-chevron-up' : 'fas fa-chevron-down'"
                            class="text-gray-400 text-xl transition-transform duration-300 ml-3"></i>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- 検索パネル（スライドイン） -->
    <transition name="panel-slide">
        <div v-show="!selectedQuestionnaire && showSearchPanel"
            class="slide-panel fixed top-0 left-0 right-0 bg-white shadow-lg z-40"
            @click.stop>
            <div class="container mx-auto px-4 py-6 mt-20">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-lg font-bold text-gray-800">絞り込み条件</h2>
                    <button @click="toggleSearchPanel"
                        class="p-2 text-gray-600 hover:text-gray-800 rounded-lg hover:bg-gray-100">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>

                <div class="grid grid-cols-1 gap-4">
                    <!-- 検索 -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">検索</label>
                        <div class="relative">
                            <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                            <input
                                ref="searchInput"
                                type="text"
                                v-model="searchQuery"
                                placeholder="スケール名、目的で検索..."
                                class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                    </div>

                    <!-- カテゴリ -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">カテゴリ</label>
                        <select
                            v-model="selectedCategory"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            <option value="">すべてのカテゴリ</option>
                            <option
                                v-for="category in Object.keys(categorizedQuestionnaires)"
                                :key="category"
                                :value="category">
                                {{ category }}
                            </option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </transition>

    <!-- 詳細情報パネル（スライドイン） -->
    <transition name="panel-slide">
        <div v-if="showInfo && selectedQuestionnaireForInfo"
            class="slide-panel fixed top-0 left-0 right-0 bg-white shadow-lg z-40"
            @click.stop>
            <div class="container mx-auto px-4 py-6 mt-20">
                <div class="flex justify-between items-center mb-4">
                    <div>
                        <h2 class="text-lg font-bold text-gray-800">
                            {{ selectedQuestionnaireForInfo.data.abbreviation || selectedQuestionnaireForInfo.key }}
                        </h2>
                        <p class="text-sm text-gray-600">詳細情報</p>
                    </div>
                    <button
                        @click="closeAllPanels"
                        class="p-2 text-gray-600 hover:text-gray-800 rounded-lg hover:bg-gray-100">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>
                <div class="space-y-4">
                    <!-- 基本情報 -->
                    <div v-if="infoData.basicInfo" class="bg-blue-50 border-l-4 border-blue-400 p-4 rounded">
                        <h3 class="text-md font-semibold text-blue-900 mb-2">
                            <i class="fas fa-info-circle mr-2"></i>基本情報
                        </h3>
                        <div class="text-sm text-blue-800 space-y-1">
                            <p v-if="infoData.basicInfo.fullName"><strong>正式名称:</strong> <span v-html="infoData.basicInfo.fullName"></span></p>
                            <p v-if="infoData.basicInfo.japaneseName"><strong>日本語名:</strong> <span v-html="infoData.basicInfo.japaneseName"></span></p>
                            <p v-if="infoData.basicInfo.targetAge"><strong>対象年齢:</strong> <span v-html="infoData.basicInfo.targetAge"></span></p>
                            <p v-if="infoData.basicInfo.purpose"><strong>評価目的:</strong> <span v-html="infoData.basicInfo.purpose"></span></p>
                            <p v-if="infoData.basicInfo.duration"><strong>実施時間:</strong> <span v-html="infoData.basicInfo.duration"></span></p>
                        </div>
                    </div>

                    <!-- 開発背景 -->
                    <div v-if="infoData.development" class="bg-green-50 border-l-4 border-green-400 p-4 rounded">
                        <h3 class="text-md font-semibold text-green-900 mb-2">
                            <i class="fas fa-book mr-2"></i>開発背景
                        </h3>
                        <div class="text-sm text-green-800 space-y-1">
                            <p v-if="infoData.development.developer"><strong>開発者:</strong> <span v-html="infoData.development.developer"></span></p>
                            <p v-if="infoData.development.year"><strong>発行年:</strong> <span v-html="infoData.development.year"></span></p>
                            <p v-if="infoData.development.basis"><strong>理論的基盤:</strong> <span v-html="infoData.development.basis"></span></p>
                        </div>
                    </div>

                    <!-- 著作権情報 -->
                    <div class="bg-indigo-50 border-l-4 border-indigo-400 p-4 rounded">
                        <h3 class="text-md font-semibold text-indigo-900 mb-2">
                            <i class="fas fa-balance-scale mr-2"></i>著作権・使用条件
                        </h3>
                        <!-- Markdown の著作権情報 -->
                        <div v-if="infoData.copyright" class="text-sm mb-2 text-indigo-800" v-html="infoData.copyright"></div>
                        <!-- YAML の構造化著作権情報 -->
                        <template v-if="infoData.copyrightStructured?.license_category">
                            <!-- ライセンスカテゴリー -->
                            <div class="mb-3 p-3 bg-white rounded border border-indigo-200">
                                <div class="flex items-center gap-2 mb-1">
                                    <i :class="['fas', getCopyrightIcon(infoData.copyrightStructured.license_category), 'text-indigo-600']"></i>
                                    <span class="font-semibold text-indigo-900">
                                        {{ getCopyrightLabel(infoData.copyrightStructured.license_category) }}
                                    </span>
                                </div>
                            </div>
                            <!-- 使用条件グリッド -->
                            <div class="copyright-detail-grid mb-2">
                                <div class="copyright-detail-item">
                                    <i :class="['fas', getBooleanIcon(infoData.copyrightStructured.commercial_use), getBooleanClass(infoData.copyrightStructured.commercial_use)]"></i>
                                    <span class="copyright-detail-label text-gray-600">商用利用</span>
                                    <span class="copyright-detail-value text-gray-800">
                                        {{ getBooleanDisplay(infoData.copyrightStructured.commercial_use) }}
                                    </span>
                                </div>
                                <div class="copyright-detail-item">
                                    <i :class="['fas', getBooleanIcon(infoData.copyrightStructured.permission_required === false), getBooleanClass(infoData.copyrightStructured.permission_required === false)]"></i>
                                    <span class="copyright-detail-label text-gray-600">許諾</span>
                                    <span class="copyright-detail-value text-gray-800">
                                        {{ infoData.copyrightStructured.permission_required ? '必要' : infoData.copyrightStructured.permission_required === false ? '不要' : '情報なし' }}
                                    </span>
                                </div>
                                <div class="copyright-detail-item">
                                    <i :class="['fas', getBooleanIcon(infoData.copyrightStructured.fees_required === false), getBooleanClass(infoData.copyrightStructured.fees_required === false)]"></i>
                                    <span class="copyright-detail-label text-gray-600">料金</span>
                                    <span class="copyright-detail-value text-gray-800">
                                        {{ infoData.copyrightStructured.fees_required ? '有料' : infoData.copyrightStructured.fees_required === false ? '無料' : '情報なし' }}
                                    </span>
                                </div>
                                <div class="copyright-detail-item">
                                    <i :class="['fas', getBooleanIcon(infoData.copyrightStructured.training_required === false), getBooleanClass(infoData.copyrightStructured.training_required === false)]"></i>
                                    <span class="copyright-detail-label text-gray-600">研修</span>
                                    <span class="copyright-detail-value text-gray-800">
                                        {{ infoData.copyrightStructured.training_required ? '必要' : infoData.copyrightStructured.training_required === false ? '不要' : '情報なし' }}
                                    </span>
                                </div>
                            </div>
                            <!-- 開発者情報 -->
                            <div v-if="infoData.copyrightStructured.original_developers" class="text-sm text-indigo-800 mb-2">
                                <strong>原開発者:</strong> {{ infoData.copyrightStructured.original_developers }}
                            </div>
                            <!-- 日本語版情報 -->
                            <div v-if="infoData.copyrightStructured.japanese_version" class="text-sm text-indigo-800 mb-2">
                                <strong>日本語版:</strong> {{ infoData.copyrightStructured.japanese_version }}
                            </div>
                            <!-- 推奨事項 -->
                            <div v-if="infoData.copyrightStructured.recommendations" class="mt-3 p-3 bg-indigo-100 rounded text-sm text-indigo-900">
                                <strong class="block mb-1">
                                    <i class="fas fa-lightbulb mr-1"></i>利用時の推奨事項
                                </strong>
                                <span v-html="infoData.copyrightStructured.recommendations"></span>
                            </div>
                            <!-- unknownの場合の注意喚起 -->
                            <div v-if="infoData.copyrightStructured.license_category === 'unknown'" class="mt-3 p-3 bg-gray-100 rounded text-sm text-gray-700">
                                <i class="fas fa-info-circle mr-1"></i>
                                著作権情報が不足しています。使用前に開発者または関連機関に確認することをお勧めします。
                            </div>
                        </template>
                    </div>

                    <!-- === 新規セクション === -->

                    <!-- 尺度構成 -->
                    <div v-if="infoData.scaleStructure" class="bg-teal-50 border-l-4 border-teal-400 p-4 rounded">
                        <h3 class="text-md font-semibold text-teal-900 mb-2">
                            <i class="fas fa-sitemap mr-2"></i>尺度構成
                        </h3>
                        <div class="text-sm text-teal-800" v-html="infoData.scaleStructure"></div>
                    </div>

                    <!-- 信頼性・妥当性 -->
                    <div v-if="infoData.reliability" class="bg-amber-50 border-l-4 border-amber-400 p-4 rounded">
                        <h3 class="text-md font-semibold text-amber-900 mb-2">
                            <i class="fas fa-check-double mr-2"></i>信頼性・妥当性
                        </h3>
                        <div class="text-sm text-amber-800" v-html="infoData.reliability"></div>
                    </div>

                    <!-- 得点化・解釈（新形式） -->
                    <div v-if="infoData.scoring" class="bg-purple-50 border-l-4 border-purple-400 p-4 rounded">
                        <h3 class="text-md font-semibold text-purple-900 mb-2">
                            <i class="fas fa-calculator mr-2"></i>得点化・解釈
                        </h3>
                        <div class="text-sm text-purple-800" v-html="infoData.scoring"></div>
                    </div>

                    <!-- 得点化・解釈（旧形式：後方互換性のため残す） -->
                    <div v-else-if="infoData.interpretation" class="bg-purple-50 border-l-4 border-purple-400 p-4 rounded">
                        <h3 class="text-md font-semibold text-purple-900 mb-2">
                            <i class="fas fa-chart-line mr-2"></i>得点化・解釈
                        </h3>
                        <div class="text-sm text-purple-800" v-html="infoData.interpretation"></div>
                    </div>

                    <!-- 実施上の注意点 -->
                    <div v-if="infoData.implementation" class="bg-rose-50 border-l-4 border-rose-400 p-4 rounded">
                        <h3 class="text-md font-semibold text-rose-900 mb-2">
                            <i class="fas fa-exclamation-circle mr-2"></i>実施上の注意点
                        </h3>
                        <div class="text-sm text-rose-800" v-html="infoData.implementation"></div>
                    </div>

                    <!-- === 既存セクション === -->

                    <!-- 参考文献 -->
                    <div v-if="infoData.references && infoData.references.length > 0" class="bg-gray-50 border-l-4 border-gray-400 p-4 rounded">
                        <h3 class="text-md font-semibold text-gray-900 mb-2">
                            <i class="fas fa-book-open mr-2"></i>参考文献
                        </h3>
                        <div class="text-sm text-gray-700">
                            <ul class="list-disc list-inside space-y-2">
                                <li v-for="(ref, idx) in infoData.references" :key="idx">
                                    <span v-html="linkifyReference(ref)"></span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- 公式URL -->
                    <div v-if="infoData.urls && infoData.urls.length > 0"
                        class="bg-indigo-50 border-l-4 border-indigo-400 p-4 rounded">
                        <h3 class="text-md font-semibold text-indigo-900 mb-2">
                            <i class="fas fa-link mr-2"></i>リンク
                        </h3>
                        <div class="text-sm text-indigo-800 space-y-1">
                            <a v-for="(url, idx) in infoData.urls"
                                :key="idx"
                                :href="url.url"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="block hover:underline">
                                <i class="fas fa-external-link-alt mr-1"></i> <span v-html="url.title || url.url"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </transition>

    <!-- オフラインインジケーター -->
    <div v-if="isOffline" class="offline-indicator">
        <i class="fas fa-wifi-slash mr-2"></i>
        オフラインモード
    </div>

    <!-- メインコンテンツ -->
    <main class="container mx-auto px-4 py-6 max-w-7xl" @click="closeAllPanels">
        <!-- ローディング -->
        <div v-if="loading" class="text-center py-12">
            <div class="inline-block animate-spin rounded-full h-12 w-12 border-b-2 border-blue-600 mb-4"></div>
            <p class="text-gray-600">読み込み中...</p>
        </div>

        <!-- スコア票選択画面 -->
        <div v-else-if="!selectedQuestionnaire">
            <!-- ウェルカムセクション -->
            <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                <div class="flex items-start gap-4">
                    <div class="flex-shrink-0">
                        <i class="fas fa-info-circle text-blue-500 text-3xl"></i>
                    </div>
                    <div class="flex-1">
                        <h2 class="text-lg font-bold text-gray-900 mb-3">CliniScaleについて</h2>

                        <p class="text-gray-700 mb-4">
                            CliniScaleは、医療現場で使用される標準化された「臨床評価スケール」を簡単に利用できるWebアプリケーションです。
                        </p>

                        <!-- 著作権について -->
                        <div class="bg-amber-50 border-l-4 border-amber-500 p-4 mb-4 rounded">
                            <p class="text-sm text-amber-800 mb-2">
                                各スケールには著作権があり、使用条件が異なります。
                            </p>
                            <p class="text-sm text-amber-800">
                                ご利用前に必ず「<strong>詳細情報</strong>」から著作権情報をご確認ください。
                            </p>
                        </div>

                        <!-- 利用許諾が必要なスケールについて -->
                        <div class="bg-blue-50 border border-blue-200 p-4 mb-4 rounded">
                            <ul class="text-sm text-blue-800 space-y-2">
                                <li class="flex items-start gap-2">
                                    <i class="fas fa-circle text-xs mt-1.5 flex-shrink-0"></i>
                                    <span>権利者の許諾が必要なスケールは、質問票がマスク表示され、内容を見ることができません</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <i class="fas fa-circle text-xs mt-1.5 flex-shrink-0"></i>
                                    <span>ご自身で権利者から利用許諾を取得された場合は、お問い合わせフォームからご連絡ください。個別に閲覧可能となるよう対応いたします</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <i class="fas fa-circle text-xs mt-1.5 flex-shrink-0"></i>
                                    <span>ただし、権利者が「外観の改変禁止」「Web提供禁止」などの制限を設けている場合は、その制限が優先されます</span>
                                </li>
                            </ul>
                        </div>

                        <!-- 免責事項 -->
                        <div class="bg-gray-50 border border-gray-300 p-4 mb-4 rounded">
                            <h3 class="text-base font-bold text-gray-900 mb-2 flex items-center gap-2">
                                <i class="fas fa-shield-alt"></i>
                                免責事項
                            </h3>
                            <ul class="text-sm text-gray-700 space-y-2">
                                <li class="flex items-start gap-2">
                                    <i class="fas fa-circle text-xs mt-1.5 flex-shrink-0 text-gray-500"></i>
                                    <span>CliniScaleは情報提供を目的としたツールであり、著作権に関する最終的な判断と責任は利用者様ご自身が負うものとします</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <i class="fas fa-circle text-xs mt-1.5 flex-shrink-0 text-gray-500"></i>
                                    <span>使用前に必ず権利者の最新の利用規約をご確認ください</span>
                                </li>
                            </ul>
                        </div>

                        <!-- お問い合わせボタン -->
                        <div class="mt-4 pt-4 border-t border-gray-200">
                            <a
                                href="https://www.emuyn.net/CliniScale/inquiry"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="inline-flex items-center gap-2 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                                <i class="fas fa-envelope"></i>
                                <span>お問い合わせ</span>
                                <i class="fas fa-external-link-alt text-xs"></i>
                            </a>
                            <p class="mt-2 text-xs text-gray-500">
                                ご意見・ご要望・追加リクエストはこちらから
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 検索条件サマリー -->
            <div class="mb-6 p-4 bg-blue-50 rounded-lg border border-blue-200 cursor-pointer hover:bg-blue-100 transition-colors"
                @click.stop="toggleSearchPanel">
                <div class="flex items-center justify-between mb-2">
                    <!-- 左側：タイトル -->
                    <div class="flex items-center gap-2">
                        <i class="fas fa-search text-blue-600"></i>
                        <span class="text-base font-semibold text-blue-900">表示中の臨床評価スケール</span>
                    </div>

                    <!-- 右側：件数 + ソートトグル -->
                    <div class="flex items-center gap-3">
                        <span class="bg-blue-600 text-white px-4 py-1 rounded-full text-base font-bold">
                            {{ totalCount }}件
                        </span>
                        <button
                            @click.stop="sortAscending = !sortAscending"
                            class="flex items-center justify-center w-8 h-8 border border-blue-300 rounded-full bg-white text-blue-600 hover:bg-blue-50 transition-colors"
                            :title="sortAscending ? '昇順（A→Z）' : '降順（Z→A）'">
                            <i :class="sortAscending ? 'fas fa-arrow-up-a-z' : 'fas fa-arrow-down-z-a'"></i>
                        </button>
                    </div>
                </div>

                <div v-if="searchQuery || selectedCategory" class="mt-3 pt-3 border-t border-blue-200">
                    <div class="flex items-center gap-2 mb-2">
                        <i class="fas fa-filter text-blue-600 text-sm"></i>
                        <span class="text-sm font-medium text-blue-700">絞り込み条件</span>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <span v-if="searchQuery" class="inline-flex items-center gap-1 px-3 py-1 bg-white rounded-full text-sm border border-blue-300">
                            <i class="fas fa-search text-blue-600"></i>
                            <span class="text-gray-700">{{ searchQuery }}</span>
                            <button @click.stop="searchQuery = ''" class="text-gray-400 hover:text-gray-600 ml-1">
                                <i class="fas fa-times text-xs"></i>
                            </button>
                        </span>
                        <span v-if="selectedCategory" class="inline-flex items-center gap-1 px-3 py-1 bg-white rounded-full text-sm border border-blue-300">
                            <i class="fas fa-tag text-blue-600"></i>
                            <span class="text-gray-700">{{ selectedCategory }}</span>
                            <button @click.stop="selectedCategory = ''" class="text-gray-400 hover:text-gray-600 ml-1">
                                <i class="fas fa-times text-xs"></i>
                            </button>
                        </span>
                    </div>
                </div>

                <div v-else class="mt-2">
                    <p class="text-sm text-blue-700">
                        <i class="fas fa-info-circle mr-1"></i>すべての臨床評価スケールを表示しています
                    </p>
                </div>
            </div>

            <questionnaire-selector
                :questionnaires="questionnaires"
                :categorized-questionnaires="categorizedQuestionnaires"
                :filtered-questionnaires="filteredQuestionnaires"
                :selected-category="selectedCategory"
                :search-query="searchQuery"
                :sort-ascending="sortAscending"
                @select="selectQuestionnaire"
                @show-info="showQuestionnaireInfo">
            </questionnaire-selector>
        </div>

        <!-- データローディング -->
        <div v-else-if="dataLoading" class="text-center py-12">
            <div class="inline-block animate-spin rounded-full h-12 w-12 border-b-2 border-blue-600 mb-4"></div>
            <p class="text-gray-600">スケール票を読み込んでいます...</p>
        </div>

        <!-- スコア票フォーム -->
        <div v-else-if="questionnaireData">
            <questionnaire-client
                :data="questionnaireData"
                :questionnaire="selectedQuestionnaire"
                @title-visibility-changed="handleTitleVisibilityChanged">
            </questionnaire-client>
        </div>

        <!-- エラー -->
        <div v-else class="text-center py-12">
            <i class="fas fa-exclamation-triangle text-red-500 text-5xl mb-4"></i>
            <p class="text-gray-600 mb-6">スケール票データの読み込みに失敗しました</p>
            <a
                href="https://www.emuyn.net/CliniScale/inquiry"
                target="_blank"
                rel="noopener noreferrer"
                class="inline-flex items-center gap-2 px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                <i class="fas fa-bug"></i>
                <span>エラーを報告</span>
                <i class="fas fa-external-link-alt text-xs"></i>
            </a>
        </div>
    </main>

    <!-- 主要情報を静的 HTML として出力 (javascript を実行しない bot 対策) -->
    <?php if (!empty($preloadedQuestionnaire)) : ?>
        <noscript>
            <article class="noscript-scale">
                <h1>
                    <?= htmlspecialchars($preloadedQuestionnaire['data']['full_name'] ?? $preloadedQuestionnaire['id']); ?>
                    （<?= htmlspecialchars($preloadedQuestionnaire['id']); ?>）
                </h1>

                <?php if (!empty($preloadedQuestionnaire['data']['abbreviation'])): ?>
                    <p><strong>略称: </strong><?= htmlspecialchars($preloadedQuestionnaire['data']['abbreviation']); ?></p>
                <?php endif; ?>

                <?php if (!empty($preloadedQuestionnaire['data']['categories'])): ?>
                    <p><strong>カテゴリ: </strong><?= htmlspecialchars(implode(', ', $preloadedQuestionnaire['data']['categories'])); ?></p>
                <?php endif; ?>

                <?php if (!empty($preloadedQuestionnaire['data']['purpose'])): ?>
                    <p><strong>評価目的: </strong><?= htmlspecialchars($preloadedQuestionnaire['data']['purpose']); ?></p>
                <?php endif; ?>

                <?php if (!empty($preloadedQuestionnaire['data']['japan_usage'])): ?>
                    <p><strong>日本での使用状況: </strong><?= htmlspecialchars($preloadedQuestionnaire['data']['japan_usage']); ?></p>
                <?php endif; ?>

                <?php if (!empty($preloadedQuestionnaire['data']['japan_usage_note'])): ?>
                    <p><strong>補足: </strong><?= htmlspecialchars($preloadedQuestionnaire['data']['japan_usage_note']); ?></p>
                <?php endif; ?>

                <?php if (!empty($preloadedQuestionnaire['data']['description'])): ?>
                    <section>
                        <h2>概要</h2>
                        <?php
                        // descriptionが配列か文字列かをチェック
                        $description = $preloadedQuestionnaire['data']['description'];
                        if (is_array($description)) {
                            // 配列の場合、要素をスペースで結合（または改行など適切な区切り文字）
                            $description = implode(' ', array_filter($description, 'is_string')); // 文字列要素のみ結合
                        } elseif (!is_string($description)) {
                            // 予期しない型（例: null, 数値）の場合は空文字列
                            $description = '';
                        }
                        // 安全にHTMLエスケープして改行を処理
                        ?>
                        <p><?= nl2br(htmlspecialchars($description, ENT_QUOTES, 'UTF-8')); ?></p>
                    </section>
                <?php endif; ?>

                <?php if (!empty($preloadedQuestionnaire['markdown'])): ?>
                    <section>
                        <h2>スコア票詳細</h2>
                        <?= nl2br(htmlspecialchars($preloadedQuestionnaire['markdown'])); ?>
                        <p><em>※JavaScriptが有効な環境では、完全なフォームおよびスコア計算機能が表示されます。</em></p>
                    </section>
                <?php endif; ?>

                <footer style="margin-top: 2em;">
                    <h3>運営情報</h3>
                    <p>© <?= date('Y'); ?> EMUYN合同会社 — 臨床評価スケール CliniScale</p>
                    <p>
                        <a href="https://www.emuyn.net/CliniScale/terms" target="_blank">利用規約</a> /
                        <a href="https://www.emuyn.net/%E3%83%97%E3%83%A9%E3%82%A4%E3%83%90%E3%82%B7%E3%83%BC%E3%83%9D%E3%83%AA%E3%82%B7%E3%83%BC" target="_blank">プライバシーポリシー</a>
                    </p>
                </footer>
            </article>
        </noscript>
    <?php endif; ?>

    <!-- フッター -->
    <footer class="bg-gray-50 border-t border-gray-200 mt-12">
        <!-- 医療免責事項（最重要） -->
        <div class="bg-yellow-50 border-t-4 border-yellow-400">
            <div class="container mx-auto px-4 py-6 max-w-7xl">
                <div class="flex items-start gap-3">
                    <i class="fas fa-exclamation-triangle text-yellow-600 text-2xl flex-shrink-0 mt-1"></i>
                    <div>
                        <h3 class="text-lg font-bold text-yellow-900 mb-3">医療免責事項</h3>
                        <div class="text-sm text-yellow-800 space-y-2">
                            <p class="font-semibold">本アプリは医療行為を提供するものではありません。</p>
                            <ul class="list-disc list-inside space-y-1 ml-2">
                                <li>本アプリは臨床評価スケールの<strong>補助ツール</strong>であり、診断・治療の代替となるものではありません。</li>
                                <li>すべての医療判断は、必ず<strong>医療専門家の判断</strong>を優先してください。</li>
                                <li>本アプリの使用結果に基づく臨床判断の最終責任は、<strong>医療従事者</strong>が負うものとします。</li>
                                <li>患者様ご自身で使用される場合は、結果を必ず医療専門家にご相談ください。</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 責任の範囲 -->
        <div class="bg-orange-50 border-t border-orange-200">
            <div class="container mx-auto px-4 py-6 max-w-7xl">
                <div class="flex items-start gap-3">
                    <i class="fas fa-shield-alt text-orange-600 text-xl flex-shrink-0 mt-1"></i>
                    <div class="flex-1">
                        <h3 class="text-base font-bold text-orange-900 mb-2">責任の範囲</h3>
                        <div class="text-sm text-orange-800 space-y-2">
                            <p>
                                弊社は、本アプリの利用によって生じるいかなる直接的、間接的、偶発的、特別、または結果的な損害（データの喪失、医療上の誤判断、経済的損失などを含む）について、一切の責任を負いません。
                            </p>
                            <p>
                                本アプリは「現状のまま」提供されるものであり、明示的または黙示的な保証（特定の目的への適合性を含む）は一切ありません。
                            </p>
                            <p>
                                もしも計算上の間違いがあったとしても、<strong>結果の正確性を確認する最終責任は利用者が負うもの</strong>とします。間違いに気づかれた際には、ご連絡いただければ速やかに対処いたします。
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 運営情報 -->
        <div class="container mx-auto px-4 py-8 max-w-7xl">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-6">
                <!-- emuynについて -->
                <div>
                    <h4 class="text-sm font-bold text-gray-900 mb-3 flex items-center gap-2">
                        <i class="fas fa-building"></i>
                        運営について
                    </h4>
                    <div class="text-sm text-gray-600 space-y-2">
                        <p>
                            <a href="https://www.emuyn.net/" target="_blank" rel="noopener noreferrer"
                                class="text-blue-600 hover:underline font-medium">
                                EMUYN 合同会社
                                <i class="fas fa-external-link-alt text-xs ml-1"></i>
                            </a>
                        </p>
                        <p class="text-xs">医療・教育分野のデジタルツール開発</p>
                    </div>
                </div>

                <!-- バージョン情報 -->
                <div>
                    <h4 class="text-sm font-bold text-gray-900 mb-3 flex items-center gap-2">
                        <i class="fas fa-info-circle"></i>
                        バージョン情報
                    </h4>
                    <div class="text-sm text-gray-600 space-y-1">
                        <p class="flex items-center gap-2">
                            1.4.2
                        </p>
                    </div>
                </div>
            </div>

            <!-- 著作権とリンク -->
            <div class="pt-6 border-t border-gray-200">
                <div class="flex flex-col md:flex-row justify-between items-center gap-4 text-xs text-gray-500">
                    <p>
                        &copy; 2025 emuyn. All rights reserved.
                    </p>
                    <div class="flex gap-4">
                        <a href="https://www.emuyn.net/CliniScale/terms"
                            target="_blank" rel="noopener noreferrer"
                            class="hover:text-gray-700 hover:underline">
                            利用規約
                        </a>
                        <a href="https://www.emuyn.net/CliniScale/privacy"
                            target="_blank" rel="noopener noreferrer"
                            class="hover:text-gray-700 hover:underline">
                            プライバシーポリシー
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>

<script>
    new Vue({
        el: '#client-app',
        mixins: [window.CopyrightUtils.copyrightUtilsMixin],
        data() {
            return {
                questionnaires: {},
                selectedQuestionnaire: null,
                questionnaireData: null,
                markdownContent: null,
                loading: true,
                dataLoading: false,
                selectedCategory: '',
                searchQuery: '',
                showSearchPanel: false,
                showInfo: false,
                selectedQuestionnaireForInfo: null, // 詳細情報表示用の選択されたスケール票
                hideHeader: false,
                lastScrollY: 0,
                scrollTimeout: null,
                isTitleVisible: true,
                isOffline: !navigator.onLine,
                sortAscending: true, // true=昇順, false=降順
            };
        },
        async mounted() {
            this.notyf = new Notyf({
                duration: 3000,
                position: {
                    x: 'right',
                    y: 'bottom'
                }
            });

            // オンライン/オフライン検知
            window.addEventListener('online', () => {
                this.isOffline = false;
                this.notyf.success('オンラインに戻りました');
            });
            window.addEventListener('offline', () => {
                this.isOffline = true;
                this.notyf.error('オフラインモードです');
            });

            await this.loadQuestionnaires();

            // スクロールイベントの設定
            window.addEventListener('scroll', this.handleScroll);

            // ブラウザの戻る/進むボタンの処理
            window.addEventListener('popstate', this.handlePopState);

            // Service Worker登録
            if ('serviceWorker' in navigator) {
                try {
                    await navigator.serviceWorker.register('./sw.js', {
                        scope: './'
                    });
                    console.log('Service Worker registered');
                } catch (error) {
                    console.warn('Service Worker registration failed:', error);
                }
            }
            // console.warn('Service Worker registration is currently disabled.');
        },
        beforeDestroy() {
            window.removeEventListener('scroll', this.handleScroll);
            window.removeEventListener('popstate', this.handlePopState);
            if (this.scrollTimeout) {
                clearTimeout(this.scrollTimeout);
            }
        },
        watch: {
            selectedCategory() {
                window.scrollTo(0, 0);
            },
            searchQuery() {
                window.scrollTo(0, 0);
            }
        },
        computed: {
            categorizedQuestionnaires() {
                const categorized = {};
                Object.keys(this.questionnaires).forEach(key => {
                    const item = this.questionnaires[key];
                    if (item.categories && Array.isArray(item.categories)) {
                        item.categories.forEach(category => {
                            if (!categorized[category]) categorized[category] = {};
                            categorized[category][key] = item;
                        });
                    }
                });
                return categorized;
            },

            filteredQuestionnaires() {
                // カテゴリ選択がある場合はそのカテゴリのみ、なければ全体
                let filtered = this.selectedCategory ? {
                        [this.selectedCategory]: this.categorizedQuestionnaires[this.selectedCategory] || {}
                    } :
                    this.categorizedQuestionnaires;

                // 検索文字列が空ならそのまま返す
                if (!this.searchQuery.trim()) {
                    return filtered;
                }

                // 検索処理
                const query = this.searchQuery.toLowerCase();
                const result = {};

                Object.keys(filtered).forEach(category => {
                    const items = filtered[category];
                    const matched = {};

                    Object.keys(items).forEach(key => {
                        const item = items[key];
                        if (
                            (item.abbreviation && item.abbreviation.toLowerCase().includes(query)) ||
                            (item.full_name && item.full_name.toLowerCase().includes(query)) ||
                            (item.purpose && item.purpose.toLowerCase().includes(query))
                        ) {
                            matched[key] = item;
                        }
                    });

                    // マッチした項目があれば登録
                    if (Object.keys(matched).length > 0) {
                        // ソートを適用して格納
                        result[category] = Object.fromEntries(
                            Object.entries(matched).sort(([keyA, a], [keyB, b]) => {
                                const nameA = (a.full_name || a.abbreviation || keyA).toLowerCase();
                                const nameB = (b.full_name || b.abbreviation || keyB).toLowerCase();
                                return this.sortAscending ?
                                    nameA.localeCompare(nameB, 'ja') :
                                    nameB.localeCompare(nameA, 'ja');
                            })
                        );
                    }
                });
                return result;
            },

            totalCount() {
                const uniqueKeys = new Set();
                Object.values(this.filteredQuestionnaires).forEach(items => {
                    Object.keys(items || {}).forEach(key => {
                        uniqueKeys.add(key);
                    });
                });
                return uniqueKeys.size;
            },

            displaySections() {
                if (!this.markdownContent) return [];

                const sections = ['使い方', '注意事項', '解釈', '参考文献'];
                const result = [];

                sections.forEach(section => {
                    const regex = new RegExp(`##\\s*${section}([\\s\\S]*?)(?=##|$)`, 'i');
                    const match = this.markdownContent.match(regex);
                    if (match) {
                        result.push({
                            title: section,
                            content: match[1].trim()
                        });
                    }
                });

                return result;
            },

            infoData() {
                if (!this.selectedQuestionnaireForInfo) {
                    return {
                        basicInfo: {},
                        development: {},
                        copyright: null,
                        copyrightStructured: null,
                        scaleStructure: null, // 新規: 尺度構成
                        reliability: null, // 新規: 信頼性・妥当性
                        scoring: null, // 新規: 得点化・解釈
                        implementation: null, // 新規: 実施上の注意点
                        interpretation: null,
                        references: [],
                        urls: []
                    };
                }

                const yamlData = this.selectedQuestionnaireForInfo.data;

                // 初期データ構造
                const data = {
                    basicInfo: {},
                    development: {},
                    copyright: null,
                    copyrightStructured: yamlData?.copyright || null,
                    scaleStructure: null, // 新規: 尺度構成
                    reliability: null, // 新規: 信頼性・妥当性
                    scoring: null, // 新規: 得点化・解釈
                    implementation: null, // 新規: 実施上の注意点
                    interpretation: null,
                    references: [],
                    urls: []
                };

                // YAMLから基本情報を取得
                if (yamlData) {
                    data.basicInfo = {
                        fullName: yamlData.full_name || data.basicInfo.fullName,
                        japaneseName: yamlData.japanese_name || data.basicInfo.japaneseName,
                        targetAge: yamlData.target_age || data.basicInfo.targetAge,
                        purpose: yamlData.purpose || data.basicInfo.purpose,
                        duration: yamlData.duration || data.basicInfo.duration
                    };
                }

                // Markdownが存在する場合は追加情報を統合
                if (this.markdownContent) {
                    try {
                        // JSON作成時の技術的注意点セクションを除外
                        let processedMarkdown = this.markdownContent;
                        processedMarkdown = processedMarkdown.replace(
                            /^## JSON作成時の技術的注意点\s*\n[\s\S]*?(?=^## |\Z)/gm,
                            ''
                        );

                        // 基本情報セクション（Markdownからの追加・上書き）
                        const basicInfoMatch = processedMarkdown.match(/###\s+尺度の概要\s*\n([\s\S]*?)(?=\n###|\n##|$)/i);
                        if (basicInfoMatch) {
                            const content = basicInfoMatch[1];

                            const fullNameMatch = content.match(/[-*]\s*\*\*正式名称\*\*:\s*(.+?)(?:\n|$)/);
                            if (fullNameMatch && !data.basicInfo.fullName) {
                                data.basicInfo.fullName = fullNameMatch[1].trim();
                            }

                            const japaneseNameMatch = content.match(/[-*]\s*\*\*日本語名\*\*:\s*(.+?)(?:\n|$)/);
                            if (japaneseNameMatch && !data.basicInfo.japaneseName) {
                                data.basicInfo.japaneseName = japaneseNameMatch[1].trim();
                            }

                            const targetAgeMatch = content.match(/[-*]\s*\*\*対象年齢\*\*:\s*(.+?)(?:\n|$)/);
                            if (targetAgeMatch && !data.basicInfo.targetAge) {
                                data.basicInfo.targetAge = targetAgeMatch[1].trim();
                            }

                            const purposeMatch = content.match(/[-*]\s*\*\*評価目的\*\*:\s*(.+?)(?:\n|$)/);
                            if (purposeMatch && !data.basicInfo.purpose) {
                                data.basicInfo.purpose = this.renderMarkdown(purposeMatch[1].trim());
                            }

                            const durationMatch = content.match(/[-*]\s*\*\*実施時間\*\*:\s*(.+?)(?:\n|$)/);
                            if (durationMatch && !data.basicInfo.duration) {
                                data.basicInfo.duration = durationMatch[1].trim();
                            }
                        }

                        // 開発背景セクション
                        const developmentMatch = processedMarkdown.match(/###\s+開発背景\s*\n([\s\S]*?)(?=\n###|\n##|$)/i);
                        if (developmentMatch) {
                            const content = developmentMatch[1];

                            const developerMatch = content.match(/[-*]\s*\*\*開発者\*\*:\s*(.+?)(?:\n|$)/);
                            if (developerMatch) data.development.developer = developerMatch[1].trim();

                            const yearMatch = content.match(/[-*]\s*\*\*発行年\*\*:\s*(.+?)(?:\n|$)/);
                            if (yearMatch) data.development.year = yearMatch[1].trim();

                            const basisMatch = content.match(/[-*]\s*\*\*理論的基盤\*\*:\s*(.+?)(?:\n|$)/);
                            if (basisMatch) data.development.basis = this.renderMarkdown(basisMatch[1].trim());
                        }

                        // 著作権情報（Markdownから）
                        const copyrightMatch = processedMarkdown.match(/###\s+著作権\s*\n([\s\S]*?)(?=\n###|\n##|$)/i);
                        if (copyrightMatch) {
                            data.copyright = this.renderMarkdown(copyrightMatch[1].trim());
                        }

                        // === 新規セクション ===

                        // 尺度構成セクション
                        const scaleStructureMatch = processedMarkdown.match(/##\s+尺度構成\s*\n([\s\S]*?)(?=\n##|$)/i);
                        if (scaleStructureMatch) {
                            data.scaleStructure = this.renderMarkdown(scaleStructureMatch[1].trim());
                        }

                        // 信頼性・妥当性セクション
                        const reliabilityMatch = processedMarkdown.match(/##\s+信頼性・妥当性\s*\n([\s\S]*?)(?=\n##|$)/i);
                        if (reliabilityMatch) {
                            data.reliability = this.renderMarkdown(reliabilityMatch[1].trim());
                        }

                        // 得点化・解釈セクション
                        const scoringMatch = processedMarkdown.match(/##\s+得点化・解釈\s*\n([\s\S]*?)(?=\n##|$)/i);
                        if (scoringMatch) {
                            data.scoring = this.renderMarkdown(scoringMatch[1].trim());
                        }

                        // 実施上の注意点セクション
                        const implementationMatch = processedMarkdown.match(/##\s+実施上の注意点\s*\n([\s\S]*?)(?=\n##|$)/i);
                        if (implementationMatch) {
                            data.implementation = this.renderMarkdown(implementationMatch[1].trim());
                        }

                        // === 既存セクション（旧形式も対応） ===

                        // 得点化・解釈（旧形式：H3レベル）
                        if (!data.scoring) {
                            const interpretationMatch = processedMarkdown.match(/###\s+(重症度の目安|リスク分類の目安|自立度の目安|転倒リスクの目安|新生児状態の分類|判定基準の目安|遵守レベルの目安|医療費助成の目安|発達レベルの目安)\s*\n([\s\S]*?)(?=\n###|\n##|$)/i);
                            if (interpretationMatch) {
                                data.interpretation = this.renderMarkdown(interpretationMatch[2].trim());
                            }
                        }

                        // 参考文献
                        const referencesMatch = processedMarkdown.match(/###\s+主要文献\s*\n([\s\S]*?)(?=\n###|\n##|$)/i);
                        if (referencesMatch) {
                            const content = referencesMatch[1];
                            const refs = content.split('\n').filter(line => line.trim().startsWith('-'));
                            data.references = refs.map(ref => this.renderMarkdown(ref.trim().substring(2).trim()));
                        }

                        // URL抽出
                        const urlsMatch = processedMarkdown.match(/###\s+公式URL\s*\n([\s\S]*?)(?=\n###|\n##|$)/i);
                        if (urlsMatch) {
                            const content = urlsMatch[1];
                            const urlLines = content.split('\n').filter(line => line.includes('http'));
                            urlLines.forEach(line => {
                                const match = line.match(/[-*]\s*(.+?):\s*(https?:\/\/[^\s]+)/);
                                if (match) {
                                    data.urls.push({
                                        title: this.renderMarkdown(match[1].trim()).replace(/<\/?p[^>]*>/g, '').trim(),
                                        url: match[2].trim()
                                    });
                                }
                            });
                        }
                    } catch (error) {
                        console.warn('Markdown parsing skipped:', error.message);
                    }
                }

                // 推奨事項のレンダリング（YAMLの構造化著作権情報内）
                if (data.copyrightStructured?.recommendations) {
                    data.copyrightStructured.recommendations = this.renderMarkdown(data.copyrightStructured.recommendations);
                }

                return data;
            }
        },
        methods: {
            loadQuestionnaires() {
                try {
                    this.questionnaires = window.PHP_DATA.questionnaires;
                    this.checkUrlParameter();
                } catch (error) {
                    console.error('Failed to load questionnaires:', error);
                    this.notyf.error('臨床評価スケールのリストの読み込みに失敗しました');
                } finally {
                    this.loading = false;
                }
            },

            checkUrlParameter() {
                const urlParams = new URLSearchParams(window.location.search);
                let questionnaireId = urlParams.get('q') || urlParams.get('questionnaire');

                // URLパスからスコア票IDを取得（/HAM-D のような形式）
                if (!questionnaireId) {
                    const path = window.location.pathname;
                    const match = path.match(/\/([^/]+)\/?$/);
                    if (match && match[1] && match[1] !== 'index.php') {
                        questionnaireId = decodeURIComponent(match[1]);
                    }
                }

                if (questionnaireId) {
                    // まず完全一致で検索
                    let found = this.questionnaires[questionnaireId];

                    // 見つからない場合、大文字小文字を無視して検索
                    if (!found) {
                        const lowerCaseId = questionnaireId.toLowerCase();
                        const matchedKey = Object.keys(this.questionnaires).find(
                            key => key.toLowerCase() === lowerCaseId
                        );

                        if (matchedKey) {
                            questionnaireId = matchedKey;
                            found = this.questionnaires[matchedKey];
                        }
                    }

                    if (found) {
                        // selectQuestionnaire を呼ぶ前に、クエリパラメータを削除
                        if (urlParams.has('q') || urlParams.has('questionnaire')) {
                            const currentPath = window.location.pathname;
                            const newPath = currentPath.endsWith('/') ?
                                `${currentPath}${questionnaireId}` :
                                `${currentPath}/${questionnaireId}`;
                            window.history.replaceState({}, '', newPath);
                        }
                        this.selectQuestionnaire(questionnaireId, found);
                    } else {
                        this.notyf.error(`スケール票 "${questionnaireId}" が見つかりません`);
                    }
                }
            },

            async selectQuestionnaire(key, data, skipHistoryUpdate = false) {
                window.scrollTo(0, 0);

                this.dataLoading = true;
                this.selectedQuestionnaire = {
                    key,
                    data
                };
                this.closeAllPanels();

                await this.$nextTick();
                window.scrollTo(0, 0);

                if (!skipHistoryUpdate && window.history?.pushState) {
                    try {
                        const currentPath = window.location.pathname;
                        const currentMatch = currentPath.match(/\/([^/]+)\/?$/);
                        const currentQuestionnaire = currentMatch ? decodeURIComponent(currentMatch[1]) : null;

                        if (currentQuestionnaire !== key) {
                            let newPath;
                            const normalizedPath = currentPath.replace(/\/$/, '');

                            if (currentQuestionnaire && currentQuestionnaire !== 'index.php') {
                                newPath = currentPath.replace(/\/[^/]+\/?$/, `/${key}`);
                            } else {
                                newPath = `${normalizedPath}/${key}`;
                            }
                            window.history.pushState({}, '', newPath);
                        }
                    } catch (error) {
                        console.warn('History API error:', error);
                    }
                }

                try {
                    // PHP で事前読み込みされていればそれを使う
                    if (window.PHP_DATA?.preloadedQuestionnaire?.id === key) {
                        console.log('Using preloaded questionnaire data for', key);
                        const preloaded = window.PHP_DATA.preloadedQuestionnaire;
                        this.questionnaireData = {
                            ...preloaded.data,
                            copyright: data.copyright
                        };
                        this.markdownContent = preloaded.markdown;
                        window.PHP_DATA.preloadedQuestionnaire = null; // 一度使ったらクリア
                    } else {
                        // AJAX で読み込み
                        console.log('axisios loading questionnaire data for', key);
                        const jsonResponse = await axios.get('https://api.emuyn.net/getCliniscaleDefinitions.php', {
                            params: {
                                filename: `${key}.json`
                            }
                        });

                        this.questionnaireData = {
                            ...jsonResponse.data,
                            copyright: data.copyright
                        };
                        await this.fetchMarkdownContent(key);
                    }
                } catch (error) {
                    console.error('Failed to load questionnaire data:', error);
                    this.questionnaireData = null;
                    this.markdownContent = null;
                    this.notyf.error('スケール票データの読み込みに失敗しました');
                } finally {
                    this.dataLoading = false;
                }
            },

            handleBack() {
                this.selectedQuestionnaire = null;
                this.questionnaireData = null;
                this.markdownContent = null;
                this.showInfo = false;
                this.hideHeader = false;
                this.lastScrollY = 0;
                this.isTitleVisible = true;
                window.scrollTo(0, 0);

                // ルートに戻る
                if (typeof window !== 'undefined' && window.history && window.history.pushState) {
                    try {
                        window.history.pushState({}, '', '/');
                    } catch (error) {
                        console.warn('History API error:', error);
                    }
                }
            },

            // ブラウザの戻る/進むボタンの処理
            handlePopState(event) {
                const path = window.location.pathname;
                const urlParams = new URLSearchParams(window.location.search);

                // URLからquestionnaire IDを取得
                let questionnaireId = urlParams.get('q') || urlParams.get('questionnaire');

                if (!questionnaireId) {
                    const match = path.match(/\/([^/]+)\/?$/);
                    if (match && match[1] && match[1] !== 'index.php') {
                        // ★ URLエンコードされたIDをデコード
                        questionnaireId = decodeURIComponent(match[1]);
                    }
                }

                // questionnaire IDがある場合は開く
                if (questionnaireId && this.questionnaires[questionnaireId]) {
                    // 既に同じquestionnaireが開いている場合は何もしない
                    if (this.selectedQuestionnaire && this.selectedQuestionnaire.key === questionnaireId) {
                        return;
                    }
                    this.selectQuestionnaire(questionnaireId, this.questionnaires[questionnaireId], true);
                }
                // questionnaire IDがない場合は一覧に表示に移行
                else {
                    // 既に一覧画面の場合は何もしない
                    if (!this.selectedQuestionnaire) {
                        return;
                    }

                    this.selectedQuestionnaire = null;
                    this.questionnaireData = null;
                    this.markdownContent = null;
                    this.showInfo = false;
                    this.hideHeader = false;
                    this.lastScrollY = 0;
                    this.isTitleVisible = true;
                    window.scrollTo(0, 0);
                }
            },

            // タイトルパネルの可視性変更ハンドラ
            handleTitleVisibilityChanged(isVisible) {
                this.isTitleVisible = isVisible;
            },

            // 参考文献のURL自動リンク化
            linkifyReference(text) {
                if (!text) return '';

                // URLパターンにマッチする部分をリンクに変換
                // doi、PMID、PMCIDも対応
                return text
                    // 通常のURL
                    .replace(/(https?:\/\/[^\s<]+)/g, '<a href="$1" target="_blank" rel="noopener noreferrer" class="text-blue-600 hover:underline"><i class="fas fa-external-link-alt text-xs mr-1"></i>$1</a>')
                    // doi
                    .replace(/doi:\s*([^\s<]+)/gi, 'doi: <a href="https://doi.org/$1" target="_blank" rel="noopener noreferrer" class="text-blue-600 hover:underline"><i class="fas fa-external-link-alt text-xs mr-1"></i>$1</a>')
                    // PMID
                    .replace(/PMID:\s*(\d+)/gi, '<a href="https://pubmed.ncbi.nlm.nih.gov/$1/" target="_blank" rel="noopener noreferrer" class="text-blue-600 hover:underline"><i class="fas fa-external-link-alt text-xs mr-1"></i>PMID: $1</a>')
                    // PMCID
                    .replace(/PMCID:\s*(PMC\d+)/gi, '<a href="https://www.ncbi.nlm.nih.gov/pmc/articles/$1/" target="_blank" rel="noopener noreferrer" class="text-blue-600 hover:underline"><i class="fas fa-external-link-alt text-xs mr-1"></i>PMCID: $1</a>')
                    .replace(/<\/?p[^>]*>/g, '').trim();
            },

            // パネルを閉じる
            closeAllPanels() {
                if (this.showSearchPanel) {
                    this.showSearchPanel = false;
                }
                if (this.showInfo) {
                    this.showInfo = false;
                    this.selectedQuestionnaireForInfo = null;
                }
            },

            // 検索パネルのトグル
            toggleSearchPanel() {
                this.showSearchPanel = !this.showSearchPanel;

                // パネルを開いたときにフォーカス
                if (this.showSearchPanel) {
                    this.$nextTick(() => {
                        this.$refs.searchInput?.focus();
                    });
                }
            },

            // 詳細情報用の markdown を読み込む
            async fetchMarkdownContent(key) {
                // AJAX で読み込み
                try {
                    console.log('axisios loading markdown data for', key);
                    const mdResponse = await axios.get('https://api.emuyn.net/getCliniscaleDefinitions.php', {
                        params: {
                            filename: `${key}.md`
                        }
                    });
                    this.markdownContent = mdResponse.data;
                } catch (error) {
                    console.warn('Markdown not found for', key);
                    this.markdownContent = null;
                }
            },

            // 詳細情報パネルのトグル（一覧から呼ぶ用）
            async showQuestionnaireInfo(key, data) {
                this.selectedQuestionnaireForInfo = {
                    key,
                    data
                };
                console.log('selectedQuestionnaireForInfo:', this.selectedQuestionnaireForInfo);
                this.closeAllPanels();

                // Markdownを取得
                await this.fetchMarkdownContent(key);
                this.toggleInfoPanel();
            },

            // 詳細情報パネルのトグル（個別スコア票から呼ぶ用）
            toggleInfoPanel() {
                if (!this.showInfo && this.selectedQuestionnaire) {
                    // 開く時: 個別スコア票の情報をセット
                    this.selectedQuestionnaireForInfo = this.selectedQuestionnaire;
                }
                this.showInfo = !this.showInfo;
                this.showSearchPanel = false; // 検索パネルを閉じる
            },

            // スクロール処理
            handleScroll() {
                // パネルが開いている場合は閉じる
                this.closeAllPanels();

                if (!this.selectedQuestionnaire) return;

                const currentScrollY = window.scrollY;

                // 下にスクロール:ヘッダーを隠す
                if (currentScrollY > this.lastScrollY && currentScrollY > 100) {
                    this.hideHeader = true;
                }
                // 上にスクロール:ヘッダーを表示
                else if (currentScrollY < this.lastScrollY) {
                    this.hideHeader = false;
                }

                this.lastScrollY = currentScrollY;

                // 一定時間操作がなければヘッダーを隠す
                if (this.scrollTimeout) {
                    clearTimeout(this.scrollTimeout);
                }

                if (currentScrollY > 100) {
                    this.scrollTimeout = setTimeout(() => {
                        if (this.selectedQuestionnaire) {
                            this.hideHeader = true;
                        }
                    }, 3000);
                }
            },

            // ヘッダークリック処理
            handleHeaderClick() {
                // 一覧画面の場合のみ
                if (!this.selectedQuestionnaire) {
                    this.closeAllPanels();
                    // 検索パネルをトグル
                    this.toggleSearchPanel();
                }
                // 個別スコア票画面の場合は何もしない
            },

            renderMarkdown(text) {
                if (!text) return '';
                try {
                    // すでにHTMLタグが含まれていればそのまま返す
                    if (/<[a-z][\s\S]*>/i.test(text)) return text;
                    return marked.parse(text);
                } catch (e) {
                    console.warn('Markdown parse failed:', e);
                    return text.replace(/\n/g, '<br>');
                }
            },
        }
    });
</script>