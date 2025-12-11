<?php
// QuestionnaireClient.php
?>
<template id="questionnaire-client-template">
    <div class="space-y-6 max-w-4xl mx-auto" v-cloak>
        <!-- タイトル -->
        <div ref="titlePanel" class="bg-white rounded-lg shadow-md p-6 relative">
            <!-- QRコード（右上配置・Bootstrap対応版） -->
            <div
                v-if="questionnaire.data.sample_app && !isPermissionRequired"
                class="absolute top-4 right-4 flex flex-col items-center">
                <a
                    :href="convertToSecureUrl(questionnaire.data.sample_app)"
                    target="_blank"
                    rel="noopener noreferrer"
                    title="セキュア問診票を開く"
                    class="secure-questionnaire-qr-badge">
                    <div
                        ref="qrcodeContainer"
                        style="border:1px solid #ddd; border-radius:6px; margin-bottom:4px; height:80px; width:80px; display:flex; align-items:center; justify-content:center;">
                    </div>
                    <span style="font-size:11px; color:#b45f06; font-weight:600; text-align:center;">
                        業務利用には<br>セキュア問診票
                    </span>
                </a>
            </div>

            <div style="min-height:110px;">
                <h2 class="text-2xl font-bold text-gray-900 mb-2 pr-28">{{ questionnaire.data.abbreviation || questionnaire.key }}</h2>
                <p class="text-gray-600 mb-2 pr-28">{{ questionnaire.data.full_name }}</p>
            </div>
            <h3 class="text-xl font-bold text-gray-900 mb-2 pr-28">
                {{ questionnaire.data.purpose }}
            </h3>
            <p class="mt-2 text-sm text-gray-500" v-html="formatDescription(data.description || questionnaire.data.description)"></p>

            <!-- 著作権情報（右寄せ・2行表示） -->
            <div v-if="copyrightInfo" class="mt-2 pt-2 border-t border-gray-200">
                <!-- 1行目: ライセンスと開発者情報 -->
                <div class="flex justify-end">
                    <div class="flex items-center gap-2 text-gray-400 text-xs">
                        <i :class="[
                            'fas', 
                            getCopyrightIcon(copyrightInfo.license_category),
                            requiresPermission(copyrightInfo.license_category) ? 'text-red-900' : ''
                        ]"></i>
                        <span>{{ getCopyrightLabel(copyrightInfo.license_category) }}</span>
                        <span v-if="copyrightInfo.original_developers" class="text-gray-300">|</span>
                        <span v-if="copyrightInfo.original_developers">{{ copyrightInfo.original_developers }}</span>
                    </div>
                </div>

                <!-- 2行目: 非営利・教育目的の説明（該当カテゴリのみ） -->
                <div v-if="showNonCommercialNotice(copyrightInfo.license_category)" class="flex justify-end mt-1">
                    <div class="flex items-start gap-2 text-blue-600 text-xs max-w-2xl">
                        <i class="fas fa-info-circle mt-0.5 flex-shrink-0"></i>
                        <span class="leading-relaxed">
                            非営利・教育目的での提供です。医療者の責任にて臨床判断を行ってください。
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- デバッグ用ボタン -->
        <div v-if="debugMode" class="bg-yellow-50 border border-yellow-300 rounded-lg p-4">
            <div class="flex items-center justify-between">
                <h3 class="font-bold text-yellow-800">
                    <i class="fas fa-bug mr-2"></i>デバッグモード
                </h3>
                <div class="space-x-2">
                    <button
                        @click="resetAllValues"
                        class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg transition-colors">
                        <i class="fas fa-redo mr-2"></i>クリア
                    </button>
                    <button
                        @click="fillRandomValues"
                        class="px-4 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600 transition-colors">
                        <i class="fas fa-random mr-2"></i>ランダム入力
                    </button>
                </div>
            </div>
        </div>

        <!-- フォーム -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <div :class="['form-wrapper', { 'is-locked': isPermissionRequired }]">
                <!-- 許諾未取得の場合のすりガラスオーバーレイ -->
                <div v-if="isPermissionRequired" class="permission-overlay"></div>

                <!-- 許諾未取得の警告メッセージ -->
                <div v-if="isPermissionRequired" class="permission-message">
                    <h3>
                        <i :class="['fas', getPermissionIcon(copyrightInfo.license_category)]"></i>
                        <span>{{ getPermissionTitle(copyrightInfo.license_category) }}</span>
                    </h3>
                    <p>{{ getPermissionDescription(copyrightInfo.license_category) }}</p>
                    <p class="text-sm opacity-80">現在、許諾を取得していないため入力できません。</p>
                    <a
                        v-if="copyrightInfo.copyright_url"
                        :href="copyrightInfo.copyright_url"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="category-label category-label-link">
                        <i class="fas fa-external-link-alt mr-2"></i>
                        権利者サイトへ
                    </a>
                    <div v-else class="category-label">
                        {{ getCopyrightLabel(copyrightInfo.license_category) }}
                    </div>
                </div>

                <!-- 入力フォーム本体 -->
                <div class="space-y-6">
                    <div
                        v-for="(field, fieldId) in fields"
                        :key="fieldId"
                        v-if="!field.hidden">

                        <!-- セクション -->
                        <div v-if="field.type === 'section'" class="bg-blue-50 border-l-4 border-blue-400 p-4 rounded">
                            <h3 class="section-title">{{ field.dispname }}</h3>
                            <div
                                v-if="field.description"
                                v-html="processDescription(field.description)"
                                class="section-description markdown-content">
                            </div>
                        </div>

                        <!-- サブセクション(dispnameがある場合のみ表示) -->
                        <div v-if="field.type === 'subsection' && field.dispname" class="bg-green-50 border-l-4 border-green-400 p-3 rounded">
                            <h4 class="subsection-title">{{ field.dispname }}</h4>
                            <div
                                v-if="field.description"
                                v-html="processDescription(field.description)"
                                class="subsection-description markdown-content">
                            </div>
                        </div>

                        <!-- 区切り線 -->
                        <hr v-if="field.type === 'separator'" class="border-gray-300" />

                        <!-- テキスト入力 -->
                        <div v-if="field.type === 'text'" class="space-y-2">
                            <label class="block field-label">
                                {{ field.dispname }}
                                <span v-if="field.required" class="text-red-600 ml-1">*</span>
                            </label>
                            <div
                                v-if="field.description"
                                v-html="processDescription(field.description)"
                                class="field-description markdown-content">
                            </div>
                            <input
                                type="text"
                                :inputmode="field.inputmode || 'text'"
                                :value="values[fieldId]"
                                @input="handleChange(fieldId, $event.target.value)"
                                :placeholder="field.placeholder"
                                :class="[
                            'w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent',
                            field.required && !values[fieldId] ? 'bg-red-50 border-gray-300' : 'border-gray-300'
                        ]">
                        </div>

                        <!-- テキストエリア -->
                        <div v-if="field.type === 'textarea'" class="space-y-2">
                            <label class="block field-label">
                                {{ field.dispname }}
                                <span v-if="field.required" class="text-red-600 ml-1">*</span>
                            </label>
                            <div
                                v-if="field.description"
                                v-html="processDescription(field.description)"
                                class="field-description markdown-content">
                            </div>
                            <textarea
                                :value="values[fieldId]"
                                @input="handleChange(fieldId, $event.target.value)"
                                :rows="field.rows || 4"
                                :placeholder="field.placeholder"
                                :class="[
                            'w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent',
                            field.required && !values[fieldId] ? 'bg-red-50 border-gray-300' : 'border-gray-300'
                        ]"></textarea>
                        </div>

                        <!-- ラジオボタン -->
                        <div v-if="field.type === 'radio'" class="space-y-2">
                            <label class="block field-label">
                                {{ field.dispname }}
                                <span v-if="field.required" class="text-red-600 ml-1">*</span>
                            </label>
                            <div
                                v-if="field.description"
                                v-html="processDescription(field.description)"
                                class="field-description markdown-content">
                            </div>
                            <div
                                :class="[
                            'p-3 rounded-lg',
                            field.inline ? 'flex flex-wrap gap-4' : 'space-y-2',
                            field.required && !values[fieldId] ? 'bg-red-50' : ''
                        ]">
                                <label
                                    v-for="(sel, key) in field.sels"
                                    :key="key"
                                    class="flex items-center gap-2 cursor-pointer">
                                    <input
                                        type="radio"
                                        :name="field.name"
                                        :value="sel.value"
                                        :checked="values[fieldId] === sel.value"
                                        @change="handleChange(fieldId, sel.value)"
                                        class="w-4 h-4 text-blue-600">
                                    <span class="text-gray-700">{{ sel.value }}</span>
                                </label>
                            </div>
                        </div>

                        <!-- チェックボックス -->
                        <div v-if="field.type === 'checkbox'" class="space-y-2">
                            <label class="block field-label">
                                {{ field.dispname }}
                                <span v-if="field.required" class="text-red-600 ml-1">*</span>
                            </label>
                            <div
                                v-if="field.description"
                                v-html="processDescription(field.description)"
                                class="field-description markdown-content">
                            </div>
                            <div
                                :class="[
                            'p-3 rounded-lg',
                            field.inline ? 'flex flex-wrap gap-4' : 'space-y-2',
                            field.required && (!values[fieldId] || values[fieldId].length === 0) ? 'bg-red-50' : ''
                        ]">
                                <label
                                    v-for="(sel, key) in field.sels"
                                    :key="key"
                                    class="flex items-center gap-2 cursor-pointer">
                                    <input
                                        type="checkbox"
                                        :checked="sel.checked"
                                        @change="handleCheckboxChange(fieldId, sel.value, $event.target.checked)"
                                        class="w-4 h-4 text-blue-600">
                                    <span class="text-gray-700">{{ sel.value }}</span>
                                </label>
                            </div>
                        </div>

                        <!-- スケール -->
                        <div v-if="field.type === 'scale'" class="space-y-4">
                            <label class="block field-label">
                                {{ field.dispname }}
                                <span v-if="field.required" class="text-red-600 ml-1">*</span>
                            </label>
                            <div
                                v-if="field.description"
                                v-html="processDescription(field.description)"
                                class="field-description markdown-content">
                            </div>
                            <div class="p-4 rounded-lg"
                                :class="{ 'bg-pink-50': field.required && isScaleFieldEmpty(fieldId) }">
                                <div class="text-center mb-2">
                                    <!-- 未設定の場合と設定済みの場合で表示を切り替え -->
                                    <span v-if="isScaleFieldEmpty(fieldId)" class="text-lg text-gray-400">
                                        未設定
                                    </span>
                                    <span v-else class="text-lg font-bold text-blue-600">
                                        {{ getScaleDisplayValue(field, fieldId) }}
                                    </span>
                                </div>
                                <input
                                    type="range"
                                    :min="field.min || 0"
                                    :max="field.max || 10"
                                    :step="field.step || 1"
                                    :value="values[fieldId] !== undefined ? values[fieldId] : field.value"
                                    @input="handleChange(fieldId, parseFloat($event.target.value))"
                                    @focus="handleScaleFocus"
                                    @touchstart="handleScaleFocus"
                                    class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer">
                                <div class="flex justify-between text-sm text-gray-500">
                                    <span>{{ field.starttag || field.min }}</span>
                                    <span>{{ field.endtag || field.max }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- 日付 -->
                        <div v-if="field.type === 'date'" class="space-y-2">
                            <label class="block field-label">
                                {{ field.dispname }}
                                <span v-if="field.required" class="text-red-600 ml-1">*</span>
                            </label>
                            <div
                                v-if="field.description"
                                v-html="processDescription(field.description)"
                                class="field-description markdown-content">
                            </div>
                            <input
                                type="date"
                                :value="values[fieldId]"
                                @input="handleChange(fieldId, $event.target.value)"
                                :class="[
                            'w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent',
                            field.required && !values[fieldId] ? 'bg-red-50 border-gray-300' : 'border-gray-300'
                        ]">
                        </div>

                        <!-- 時間 -->
                        <div v-if="field.type === 'time'" class="space-y-2">
                            <label class="block field-label">
                                {{ field.dispname }}
                                <span v-if="field.required" class="text-red-600 ml-1">*</span>
                            </label>
                            <div
                                v-if="field.description"
                                v-html="processDescription(field.description)"
                                class="field-description markdown-content">
                            </div>
                            <input
                                type="time"
                                :value="values[fieldId]"
                                @input="handleChange(fieldId, $event.target.value)"
                                :class="[
                            'w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent',
                            field.required && !values[fieldId] ? 'bg-red-50 border-gray-300' : 'border-gray-300'
                        ]">
                        </div>

                        <!-- ノート -->
                        <div v-if="field.type === 'note'" class="bg-blue-50 border-l-4 border-blue-400 p-4 rounded">
                            <div
                                v-if="field.description"
                                v-html="processDescription(field.description)"
                                class="text-sm text-blue-800 markdown-content">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 警告・緊急(内容がある場合のみ表示) -->
        <div v-if="alerts.length > 0" class="space-y-3">
            <!-- デバッグモード時 -->
            <template v-if="debugMode">
                <div class="bg-gray-50 border border-gray-200 rounded-lg p-6">
                    <h4 class="text-lg font-semibold text-gray-900 mb-4">
                        <i class="fas fa-exclamation-triangle mr-2"></i>緊急/警告の評価
                        <span class="ml-2 text-sm text-yellow-600">
                            <i class="fas fa-bug"></i> デバッグモード
                        </span>
                    </h4>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-sm text-gray-500 uppercase">種別</th>
                                    <th class="px-6 py-3 text-left text-sm text-gray-500 uppercase">項目名</th>
                                    <th class="px-6 py-3 text-left text-sm text-gray-500 uppercase">計算式</th>
                                    <th class="px-6 py-3 text-left text-sm text-gray-500 uppercase">展開後の式</th>
                                    <th class="px-6 py-3 text-left text-sm text-gray-500 uppercase">評価</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr v-for="(alert, idx) in alerts" :key="idx"
                                    :class="alert.triggered ? (alert.type === 'emergency' ? 'bg-red-50' : 'bg-yellow-50') : ''">
                                    <td class="px-6 py-4 text-sm">
                                        <span :class="alert.type === 'emergency' ? 'text-red-600 font-semibold' : 'text-yellow-600 font-semibold'">
                                            <i :class="alert.type === 'emergency' ? 'fas fa-exclamation-triangle' : 'fas fa-exclamation-circle'"></i>
                                            {{ alert.type === 'emergency' ? '緊急' : '警告' }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ alert.dispname }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        <code class="bg-gray-100 px-2 py-1 rounded text-xs">{{ alert.formula }}</code>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        <code class="bg-gray-50 px-2 py-1 rounded text-xs font-mono">{{ alert.expandedFormula || 'N/A' }}</code>
                                    </td>
                                    <td class="px-6 py-4 text-sm font-medium">
                                        <span :class="alert.triggered ? 'text-red-600' : 'text-gray-400'">
                                            {{ alert.value }} ({{ alert.triggered ? 'トリガー' : '非トリガー' }})
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </template>

            <!-- 本番モード時(トリガーされたもののみ) -->
            <template v-else>
                <div
                    v-for="(alert, idx) in alerts"
                    :key="idx"
                    :class="[
                        'rounded-lg p-4 border-l-4',
                        alert.type === 'emergency' ? 'bg-red-50 border-red-500' : 'bg-yellow-50 border-yellow-500'
                    ]">
                    <div class="flex items-start gap-3">
                        <i :class="[
                            'text-2xl',
                            alert.type === 'emergency' ? 'fas fa-exclamation-triangle text-red-600' : 'fas fa-exclamation-circle text-yellow-600'
                        ]"></i>
                        <div class="flex-1">
                            <h4 :class="[
                                'font-semibold mb-1',
                                alert.type === 'emergency' ? 'text-red-800' : 'text-yellow-800'
                            ]">
                                {{ alert.dispname }}
                            </h4>
                            <div
                                v-if="alert.description"
                                v-html="processDescription(alert.description)"
                                :class="[
                                    'text-sm markdown-content',
                                    alert.type === 'emergency' ? 'text-red-700' : 'text-yellow-700'
                                ]">
                            </div>
                        </div>
                    </div>
                </div>
            </template>
        </div>

        <!-- 計算結果 -->
        <div class="bg-gray-50 border border-gray-200 rounded-lg p-6">
            <div class="flex justify-between items-center mb-4">
                <h4 class="text-lg font-semibold text-gray-900">
                    計算結果
                    <span v-if="debugMode" class="ml-2 text-sm text-yellow-600">
                        <i class="fas fa-bug"></i> デバッグモード(中間変数も表示)
                    </span>
                </h4>
                <button
                    v-if="debugMode"
                    @click="fillRandomValues"
                    class="bg-blue-100 hover:bg-blue-200 text-blue-700 px-3 py-1 rounded text-sm transition-colors duration-200">
                    <i class="fas fa-random mr-2"></i>ランダム入力
                </button>
            </div>

            <template v-if="Object.keys(results).length > 0">
                <!-- デバッグモード時: 計算式も表示 -->
                <div v-if="debugMode" class="overflow-x-auto mb-6">
                    <table class="min-w-full divide-y divide-gray-200 table-fixed">
                        <thead class="bg-gray-50">
                            <tr>
                                <th rowspan="2" class="w-1/5 px-6 py-3 text-left text-sm text-gray-500 uppercase tracking-wider">項目名</th>
                                <th class="w-3/5 px-6 py-3 text-left text-sm text-gray-500 uppercase tracking-wider">計算式</th>
                                <th rowspan="2" class="w-1/5 px-6 py-3 text-left text-sm text-gray-500 uppercase tracking-wider">結果</th>
                            </tr>
                            <tr>
                                <th class="w-3/5 px-6 py-3 text-left text-sm text-gray-500 uppercase tracking-wider border-t border-gray-200">展開後の式</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <template v-for="(result, fieldId) in results">
                                <tr :key="fieldId" :class="{ 'bg-yellow-50': result.noreport }">
                                    <td rowspan="2" class="px-6 py-4 text-sm font-medium text-gray-900 border-r border-gray-200 align-top">
                                        <div class="break-words">
                                            {{ result.dispname }}
                                            <span v-if="result.noreport" class="ml-2 text-xs text-yellow-700 font-normal">
                                                (中間変数)
                                            </span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        <code class="bg-gray-100 px-2 py-1 rounded text-sm break-words block">{{ result.formula }}</code>
                                    </td>
                                    <td rowspan="2" class="px-6 py-4 text-sm font-medium text-green-600 border-l border-gray-200 align-top">
                                        <div class="break-words max-w-xs">{{ result.value }}</div>
                                    </td>
                                </tr>
                                <tr :key="fieldId + '_expanded'" class="border-t-0" :class="{ 'bg-yellow-50': result.noreport }">
                                    <td class="px-6 py-4 text-sm text-gray-500 border-t border-gray-100">
                                        <code class="bg-gray-50 px-2 py-1 rounded text-sm font-mono break-words block">{{ result.expandedFormula || 'N/A' }}</code>
                                    </td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                </div>

                <!-- 本番モード時: 項目名と結果のみ -->
                <div v-else class="space-y-3 mb-6">
                    <div
                        v-for="(result, fieldId) in results"
                        :key="fieldId"
                        class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                        <span class="font-medium text-gray-700">{{ result.dispname }}</span>
                        <span class="text-xl font-bold text-blue-600">{{ result.value }}</span>
                    </div>
                </div>

                <!-- アクションボタン -->
                <div class="flex flex-col sm:flex-row gap-3">
                    <button
                        @click="confirmReset"
                        :disabled="isSubmitting"
                        class="flex-1 inline-flex items-center justify-center gap-2 px-6 py-3 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-colors disabled:opacity-50 disabled:cursor-not-allowed">
                        <i class="fas fa-redo"></i>
                        <span>入力内容をクリア</span>
                    </button>
                    <button
                        @click="submitResults"
                        :disabled="isSubmitting"
                        class="flex-1 inline-flex items-center justify-center gap-2 px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors disabled:opacity-50 disabled:cursor-not-allowed">
                        <i :class="isSubmitting ? 'fas fa-spinner fa-spin' : 'fas fa-external-link-alt'"></i>
                        <span>{{ isSubmitting ? '準備中...' : '結果の詳細を見る' }}</span>
                    </button>
                </div>
            </template>

            <div v-else class="flex flex-col sm:flex-row items-start sm:items-center gap-4">
                <div class="flex-1">
                    <p class="text-xs text-gray-600">
                        入力内容に基づく計算結果は、すべての必須項目が入力されると表示されます。
                    </p>
                </div>
                <div class="flex flex-col sm:flex-row gap-3">
                    <button
                        @click="confirmReset"
                        :disabled="isSubmitting"
                        class="inline-flex items-center gap-2 px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-colors disabled:opacity-50 disabled:cursor-not-allowed">
                        <i class="fas fa-redo"></i>
                        <span>入力内容をクリア</span>
                    </button>
                </div>
            </div>
        </div>

        <!-- フィードバック・報告ボタン -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4">
                <div class="flex-1">
                    <h4 class="text-sm font-semibold text-gray-900 mb-1">
                        <i class="fas fa-comment-dots text-blue-600 mr-2"></i>
                        フィードバック
                    </h4>
                    <p class="text-xs text-gray-600">
                        計算結果に問題がある、使いにくい点がある、などのご意見をお寄せください
                    </p>
                </div>
                <a
                    href="https://www.emuyn.net/cliniscale/inquiry"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="inline-flex items-center gap-2 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors whitespace-nowrap">
                    <i class="fas fa-envelope"></i>
                    <span>報告・お問い合わせ</span>
                    <i class="fas fa-external-link-alt text-xs"></i>
                </a>
            </div>
        </div>

        <!-- 確認ポップアップ -->
        <div v-if="showConfirmReset" class="modal-overlay" @click.self="showConfirmReset = false">
            <div class="modal-content">
                <div class="flex items-start gap-4 mb-6">
                    <div class="flex-shrink-0 w-12 h-12 bg-yellow-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-exclamation-triangle text-yellow-600 text-xl"></i>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-lg font-bold text-gray-900 mb-2">入力内容をクリアしますか？</h3>
                        <p class="text-sm text-gray-600">
                            入力したすべてのデータが削除されます。この操作は取り消せません。
                        </p>
                    </div>
                </div>
                <div class="flex gap-3">
                    <button
                        @click="showConfirmReset = false"
                        class="flex-1 px-6 py-3 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-colors font-medium">
                        キャンセル
                    </button>
                    <button
                        @click="performReset"
                        class="flex-1 px-6 py-3 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors font-medium">
                        <i class="fas fa-trash-alt mr-2"></i>
                        クリア
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    Vue.component('questionnaire-client', {
        template: '#questionnaire-client-template',
        mixins: [window.CopyrightUtils.copyrightUtilsMixin],
        props: {
            data: Object,
            questionnaire: Object
        },
        data() {
            return {
                fields: {},
                values: {},
                debugMode: false,
                isTitleVisible: true,
                isSubmitting: false,
                showConfirmReset: false,
                sessionStorageKey: '',
                saveDebounceTimer: null
            };
        },
        mounted() {
            // URLパラメータからデバッグモードを判定
            const urlParams = new URLSearchParams(window.location.search);
            this.debugMode = urlParams.get('debug') === 'true' || urlParams.get('debug') === '1';

            // セッションストレージキーの設定
            this.sessionStorageKey = `cliniscale_session_${this.questionnaire.key}`;

            // フィールドを処理
            this.processFields();

            // セッションストレージから復元
            this.restoreFromSession();

            // 次のティックでDOMが確実にレンダリングされた後に監視を開始
            this.$nextTick(() => {
                this.observeTitlePanel();
            });

            // セキュア問診票に誘導する QRコード生成
            this.generateQRCode();

            // ページを離れる前に保存
            window.addEventListener('beforeunload', () => this.saveToSession(true));
        },
        beforeDestroy() {
            if (this.observer) {
                this.observer.disconnect();
            }
            if (this.saveDebounceTimer) {
                clearTimeout(this.saveDebounceTimer);
                this.saveToSession(true);
            }
            window.removeEventListener('beforeunload', () => this.saveToSession(true));
        },
        watch: {
            'questionnaire.data.sample_app': function(newVal) {
                if (newVal) {
                    this.generateQRCode();
                }
            }
        },
        computed: {
            // 必須フィールドの存在確認
            hasRequiredFields() {
                return Object.values(this.fields).some(field => field.required);
            },

            // すべての必須項目が入力済みかチェック
            allRequiredFilled() {
                return Object.keys(this.fields).every(fieldId => {
                    const field = this.fields[fieldId];
                    if (!field.required || field.hidden) return true;

                    const value = this.values[fieldId];

                    // チェックボックスの場合
                    if (field.type === 'checkbox') {
                        return value && Array.isArray(value) && value.length > 0;
                    }

                    // その他の場合
                    return value !== undefined && value !== null && value !== '';
                });
            },

            // 計算結果(デバッグモード時は全て、本番モードではnoreport以外のみ)
            results() {
                if (!this.allRequiredFilled) return {};

                const fieldsForEval = this.getFieldsForEval();
                const results = {};

                const evalFields = Object.keys(this.fields).filter(
                    fieldId => this.fields[fieldId].type === 'eval' &&
                    this.fields[fieldId].formula
                );

                evalFields.forEach(fieldId => {
                    const field = this.fields[fieldId];
                    try {
                        const result = this.evaluateFormula(field.formula, fieldsForEval);

                        // デバッグモード時は全て表示、本番モードではnoreport以外
                        if (this.debugMode || !field.noreport) {
                            results[fieldId] = {
                                dispname: field.dispname || field.name || fieldId,
                                value: result.value,
                                formula: field.formula,
                                expandedFormula: result.expandedFormula,
                                noreport: field.noreport || false
                            };
                        }

                        // fieldsForEvalには常に追加 (他の計算で使用するため)
                        fieldsForEval[fieldId] = {
                            value: result.value,
                            type: 'eval'
                        };
                    } catch (error) {
                        console.error(`Eval error for ${fieldId}:`, error);
                    }
                });

                return results;
            },

            // 警告・緊急アラート(デバッグモード時は全て、本番モードでtriggerされたもののみ)
            alerts() {
                if (!this.allRequiredFilled) return [];

                const fieldsForEval = this.getFieldsForEval();

                // 計算結果を fieldsForEval に追加
                Object.keys(this.results).forEach(fieldId => {
                    fieldsForEval[fieldId] = {
                        value: this.results[fieldId].value,
                        type: 'eval'
                    };
                });

                const alerts = [];
                Object.keys(this.fields).forEach(fieldId => {
                    const field = this.fields[fieldId];
                    if ((field.type === 'emergency' || field.type === 'warning') && field.formula) {
                        try {
                            const result = this.evaluateFormula(field.formula, fieldsForEval);
                            const triggered = !!result.value;

                            // デバッグモード時は全て表示、本番モードでtriggerされたもののみ
                            if (this.debugMode || triggered) {
                                alerts.push({
                                    type: field.type,
                                    dispname: field.dispname || field.name || fieldId,
                                    description: field.description,
                                    formula: field.formula,
                                    expandedFormula: result.expandedFormula,
                                    value: result.value,
                                    triggered: triggered
                                });
                            }
                        } catch (error) {
                            console.error(`Alert eval error for ${fieldId}:`, error);
                        }
                    }
                });

                return alerts;
            },

            copyrightInfo() {
                // propsのdataからcopyright情報を取得
                // ClientApp経由で渡されるquestionnaireDataに含まれる想定
                return this.data?.copyright || null;
            },

            isPermissionRequired() {
                if (!this.copyrightInfo) return false;

                const permissionRequired = [
                    'permission_required_paid',
                    'permission_required_free',
                    'non_commercial_free',
                    'commercial_license_required',
                    'restricted'
                ];

                return permissionRequired.includes(this.copyrightInfo.license_category);
            }
        },
        methods: {
            // カテゴリ別の許諾メッセージ用メソッド
            getPermissionIcon(category) {
                const iconMap = {
                    permission_required_paid: 'fa-file-invoice-dollar',
                    permission_required_free: 'fa-file-signature',
                    non_commercial_free: 'fa-user-friends',
                    commercial_license_required: 'fa-building',
                    restricted: 'fa-ban'
                };
                return iconMap[category] || 'fa-lock';
            },

            getPermissionTitle(category) {
                const titleMap = {
                    permission_required_paid: '有料ライセンスが必要です',
                    permission_required_free: '許諾手続きが必要です',
                    non_commercial_free: '商用利用には許諾が必要です',
                    commercial_license_required: '商用ライセンスが必要です',
                    restricted: '使用が制限されています'
                };
                return titleMap[category] || '利用許諾が必要です';
            },

            getPermissionDescription(category) {
                const descMap = {
                    permission_required_paid: 'このスケールの使用には、権利者から有料ライセンスを取得する必要があります。',
                    permission_required_free: 'このスケールは無料で使用できますが、事前に権利者への申請・登録手続きが必要です。',
                    non_commercial_free: 'このスケールは非営利・教育目的では無料ですが、商用利用には権利者からの許諾が必要です。',
                    commercial_license_required: 'このスケールの商用利用には、別途ライセンス契約が必要です。',
                    restricted: 'このスケールは特定の条件下でのみ使用が許可されており、一般公開での利用は制限されています。'
                };
                return descMap[category] || 'このスケールは著作権保護されており、使用には権利者からの許諾が必要です。';
            },

            formatDescription(description) {
                if (Array.isArray(description)) {
                    return description.join('<br>');
                }
                return description;
            },

            formatDateTime(timestamp) {
                if (!timestamp) return '';
                const date = new Date(timestamp);
                return date.toLocaleString('ja-JP', {
                    year: 'numeric',
                    month: '2-digit',
                    day: '2-digit',
                    hour: '2-digit',
                    minute: '2-digit'
                });
            },

            observeTitlePanel() {
                const titlePanel = this.$refs.titlePanel;
                if (!titlePanel) {
                    console.warn('Title panel ref not found');
                    return;
                }

                this.observer = new IntersectionObserver(
                    (entries) => {
                        entries.forEach(entry => {
                            this.isTitleVisible = entry.isIntersecting;
                            // 親コンポーネントに可視性を通知
                            this.$emit('title-visibility-changed', entry.isIntersecting);
                        });
                    }, {
                        threshold: 0.1,
                        rootMargin: '-80px 0px 0px 0px' // ヘッダー分を考慮
                    }
                );

                this.observer.observe(titlePanel);
            },

            // ひらがな・カタカナを1文字ずらす難読化
            obfuscateText(text) {
                if (typeof text !== 'string') return text;
                return text.replace(/[\u3041-\u3093\u30A1-\u30F3]/g, c => String.fromCharCode(c.charCodeAt(0) + 1));
            },

            obfuscateField(field) {
                if (!field || !this.isPermissionRequired) return field;
                const f = { ...field };
                if (f.dispname) f.dispname = this.obfuscateText(f.dispname);
                if (f.description) {
                    f.description = Array.isArray(f.description)
                        ? f.description.map(d => this.obfuscateText(d))
                        : this.obfuscateText(f.description);
                }
                if (f.selector) {
                    f.selector = Array.isArray(f.selector)
                        ? f.selector.map(s => this.obfuscateText(s))
                        : f.selector.split('|').map(s => this.obfuscateText(s)).join('|');
                }
                return f;
            },

            processFields() {
                if (!this.data?.fields) return;

                const processedFields = {};
                this.data.fields.forEach((field, index) => {
                    if (field) {
                        let f = { ...field };
                        if (!f.id) f.id = f.name || `field_${index}`;
                        f.hidden = f.parentname ? true : false;
                        f = this.obfuscateField(f);
                        this.processFieldByType(f);
                        processedFields[f.id] = f;
                    }
                });
                this.fields = processedFields;
                this.values = {};
            },

            processFieldByType(field) {
                if (['radio', 'checkbox'].includes(field.type)) {
                    const sels = Array.isArray(field.selector) ? field.selector :
                        typeof field.selector === 'string' ? field.selector.split('|') : [];
                    const selectorIndexes = field.selectoridx ?
                        (Array.isArray(field.selectoridx) ? field.selectoridx :
                            field.selectoridx.split('|').map(idx => parseInt(idx))) :
                        sels.map((_, index) => index);

                    field.sels = {};
                    sels.forEach((key, index) => {
                        const escapedKey = this.escapeKey(key);
                        field.sels[escapedKey] = {
                            value: key,
                            checked: false,
                            index: selectorIndexes[index] !== undefined ? selectorIndexes[index] : index
                        };
                    });
                }

                if (field.type === 'scale') {
                    this.$set(this.values, field.id, field.value || 0);
                }
            },

            escapeKey(s) {
                return s ? s.replace(/[.#$\/\\[\]]/g, match =>
                    '%' + match.charCodeAt(0).toString(16).toUpperCase()
                ) : s;
            },

            handleChange(fieldId, value) {
                this.$set(this.values, fieldId, value);
                this.$nextTick(() => {
                    this.updateConditionalFields();
                    this.saveToSession();
                });
            },

            handleCheckboxChange(fieldId, value, checked) {
                const field = this.fields[fieldId];
                if (!field?.sels) return;

                const key = this.escapeKey(value);
                if (field.sels[key]) {
                    this.$set(field.sels[key], 'checked', checked);
                }

                const checkedValues = Object.values(field.sels)
                    .filter(sel => sel.checked)
                    .map(sel => sel.value);
                this.$set(this.values, fieldId, checkedValues);

                this.$nextTick(() => {
                    this.updateConditionalFields();
                    this.saveToSession();
                });
            },

            updateConditionalFields() {
                const fs = _.cloneDeep(this.fields);

                for (const key in fs) {
                    const f = fs[key];

                    try {
                        if (f.parentname && f.parentsel) {
                            const parentField = Object.values(fs).find(field => field.name === f.parentname);
                            if (parentField) {
                                const parentValue = this.getParentFieldValue(parentField);
                                const shouldShow = this.checkParentCondition(f, parentValue);
                                fs[key].hidden = parentField.hidden || !shouldShow;
                            }
                        }
                    } catch (error) {
                        fs[key].hidden = false;
                    }
                }

                this.fields = fs;
            },

            getParentFieldValue(parentField) {
                if (!parentField) return null;

                const parentValue = this.values[parentField.id];

                if (parentField.type === "checkbox") {
                    return parentValue || [];
                }

                return parentValue;
            },

            checkParentCondition(childField, parentValue) {
                if (!childField.parentsel) return true;

                const parentSels = Array.isArray(childField.parentsel) ?
                    childField.parentsel :
                    childField.parentsel.split("|");

                if (Array.isArray(parentValue)) {
                    return parentValue.some(value => parentSels.includes(value));
                }

                return parentSels.includes(parentValue);
            },

            getScaleDisplayValue(field, fieldId) {
                const value = this.values[fieldId] !== undefined ?
                    this.values[fieldId] : field.value;
                if (field.subtype === 'painscale') {
                    return value === -1 ? '' : `${value} / 10`;
                }
                return value >= field.min && field.max >= value ?
                    `${value}${field.unit || ''}` : '';
            },

            isScaleFieldEmpty(fieldId) {
                const field = this.fields[fieldId];
                if (!field) return false;

                const value = this.values[fieldId] !== undefined ?
                    this.values[fieldId] : field.value;

                if (field.subtype === "painscale") {
                    return value === -1;
                }

                return value === undefined || value === null || value === "";
            },

            processDescription(description) {
                if (!description) return '';

                if (Array.isArray(description)) {
                    description = description.join('\n');
                }

                try {
                    return marked.parse(description);
                } catch (error) {
                    console.error('Markdown parse error:', error);
                    let processed = description;
                    processed = processed.replace(/\*\*(.+?)\*\*/g, '<strong>$1</strong>');
                    processed = processed.replace(/\*(.+?)\*/g, '<em>$1</em>');
                    processed = processed.replace(/\n/g, '<br>');
                    return processed;
                }
            },

            getFieldsForEval() {
                const fieldsForEval = {};
                Object.keys(this.fields).forEach(fieldId => {
                    const field = this.fields[fieldId];
                    if (field.type === 'checkbox') {
                        const checkedValues = Object.values(field.sels || {})
                            .filter(sel => sel.checked)
                            .map(sel => sel.value);
                        const checkedIndexes = Object.values(field.sels || {})
                            .filter(sel => sel.checked)
                            .map(sel => sel.index);
                        fieldsForEval[fieldId] = {
                            value: checkedValues,
                            type: 'checkbox'
                        };
                        if (checkedIndexes.length > 0) {
                            fieldsForEval[fieldId + '.index'] = {
                                value: checkedIndexes,
                                type: 'index'
                            };
                        }
                    } else {
                        fieldsForEval[fieldId] = {
                            value: this.values[fieldId] || '',
                            type: field.type
                        };
                        if (field.type === 'radio' && field.sels && this.values[fieldId]) {
                            const selectedKey = this.escapeKey(this.values[fieldId]);
                            if (field.sels[selectedKey]?.index !== undefined) {
                                fieldsForEval[fieldId + '.index'] = {
                                    value: field.sels[selectedKey].index,
                                    type: 'index'
                                };
                            }
                        }
                    }
                });
                return fieldsForEval;
            },

            evaluateFormula(formula, fieldsForEval) {
                let expandedFormula = formula;
                const missingFields = [];

                // 変数展開 %%...%%
                expandedFormula = expandedFormula.replace(/%%(.+?)%%/g, (match, key) => {
                    const fieldData = fieldsForEval[key];
                    if (!fieldData || fieldData.value === undefined || fieldData.value === null) {
                        missingFields.push(key);
                        return `''`;
                    }
                    return JSON.stringify(String(fieldData.value));
                });

                // 変数展開 {{...}}
                expandedFormula = expandedFormula.replace(/{{(.+?)}}/g, (match, key) => {
                    const fieldData = fieldsForEval[key];
                    if (!fieldData || fieldData.value === undefined || fieldData.value === null) {
                        missingFields.push(key);
                        return `''`;
                    }
                    if (Array.isArray(fieldData.value)) {
                        return JSON.stringify(fieldData.value.join('|'));
                    }
                    return JSON.stringify(String(fieldData.value));
                });

                // 変数展開 [[...]] (整数)
                expandedFormula = expandedFormula.replace(/\[\[(.+?)\]\]/g, (match, key) => {
                    const fieldData = fieldsForEval[key];
                    if (!fieldData || fieldData.value === undefined ||
                        fieldData.value === null || fieldData.value === '') {
                        missingFields.push(key);
                        return `0`;
                    }
                    if (Array.isArray(fieldData.value)) {
                        const numericArray = fieldData.value
                            .map(v => parseFloat(v))
                            .filter(v => !isNaN(v))
                            .map(v => Math.floor(v));
                        return `[${numericArray.join(',')}]`;
                    }
                    const numValue = parseFloat(fieldData.value);
                    return String(isNaN(numValue) ? 0 : Math.floor(numValue));
                });

                // 変数展開 ((...)) (数値)
                expandedFormula = expandedFormula.replace(/\(\((.+?)\)\)/g, (match, key) => {
                    const fieldData = fieldsForEval[key];
                    if (!fieldData || fieldData.value === undefined ||
                        fieldData.value === null || fieldData.value === '') {
                        missingFields.push(key);
                        return `0`;
                    }
                    if (Array.isArray(fieldData.value)) {
                        const numericArray = fieldData.value
                            .map(v => parseFloat(v))
                            .filter(v => !isNaN(v));
                        return `[${numericArray.join(',')}]`;
                    }
                    const numValue = parseFloat(fieldData.value);
                    return String(isNaN(numValue) ? 0 : numValue);
                });

                if (missingFields.length > 0) {
                    return {
                        value: 'N/A',
                        expandedFormula
                    };
                }

                // カスタム関数定義
                const yearsSince = (from, to) => {
                    if (!from) return 0;
                    try {
                        const fromDate = new Date(from);
                        const toDate = to ? new Date(to) : new Date();
                        const diffMs = toDate.getTime() - fromDate.getTime();
                        return Math.floor(diffMs / (1000 * 60 * 60 * 24 * 365.25));
                    } catch {
                        return 0;
                    }
                };

                const monthsSince = (from, to) => {
                    if (!from) return 0;
                    try {
                        const fromDate = new Date(from);
                        const toDate = to ? new Date(to) : new Date();
                        const diffMs = toDate.getTime() - fromDate.getTime();
                        return Math.floor(diffMs / (1000 * 60 * 60 * 24 * 30.44));
                    } catch {
                        return 0;
                    }
                };

                const weeksSince = (from, to) => {
                    if (!from) return 0;
                    try {
                        const fromDate = new Date(from);
                        const toDate = to ? new Date(to) : new Date();
                        const diffMs = toDate.getTime() - fromDate.getTime();
                        return Math.floor(diffMs / (1000 * 60 * 60 * 24 * 7));
                    } catch {
                        return 0;
                    }
                };

                const daysSince = (from, to) => {
                    if (!from) return 0;
                    try {
                        const fromDate = new Date(from);
                        const toDate = to ? new Date(to) : new Date();
                        const diffMs = toDate.getTime() - fromDate.getTime();
                        return Math.floor(diffMs / (1000 * 60 * 60 * 24));
                    } catch {
                        return 0;
                    }
                };

                const average = (...args) => {
                    let sum = 0,
                        count = 0;
                    const processValue = (item) => {
                        if (Array.isArray(item)) {
                            item.forEach(processValue);
                        } else if (item !== '' && !isNaN(item) && item !== null && item !== undefined) {
                            sum += parseFloat(item);
                            count++;
                        }
                    };
                    args.forEach(processValue);
                    return count > 0 ? sum / count : NaN;
                };

                const sum = (...args) => {
                    let result = 0;
                    const processValue = (item) => {
                        if (Array.isArray(item)) {
                            item.forEach(processValue);
                        } else if (item !== '' && !isNaN(item) && item !== null && item !== undefined) {
                            result += parseFloat(item);
                        }
                    };
                    args.forEach(processValue);
                    return result;
                };

                try {
                    const result = Function(
                        'yearsSince', 'monthsSince', 'weeksSince', 'daysSince', 'average', 'sum',
                        `"use strict"; return (${expandedFormula});`
                    )(yearsSince, monthsSince, weeksSince, daysSince, average, sum);

                    if (result === undefined || result === null ||
                        (typeof result === 'number' && isNaN(result))) {
                        return {
                            value: 'N/A',
                            expandedFormula
                        };
                    }

                    return {
                        value: result,
                        expandedFormula
                    };
                } catch (error) {
                    return {
                        value: 'N/A',
                        expandedFormula: `エラー: ${error.message}`
                    };
                }
            },

            // セッションストレージに保存
            saveToSession(immediate = false) {
                if (immediate) {
                    // 即座に保存
                    try {
                        const data = {
                            values: this.values,
                            timestamp: Date.now(),
                            questionnaireKey: this.questionnaire.key
                        };
                        sessionStorage.setItem(this.sessionStorageKey, JSON.stringify(data));
                    } catch (error) {
                        console.error('Failed to save to session storage:', error);
                    }
                    return;
                }

                // debounce版（通常の入力時）
                if (this.saveDebounceTimer) {
                    clearTimeout(this.saveDebounceTimer);
                }
                this.saveDebounceTimer = setTimeout(() => {
                    this.saveToSession(true); // immediate=true で再帰呼び出し
                }, 500);
            },

            // セッションストレージから復元
            restoreFromSession() {
                try {
                    const savedData = sessionStorage.getItem(this.sessionStorageKey);
                    if (!savedData) return;

                    const data = JSON.parse(savedData);

                    // 1時間以上古いデータは破棄
                    const oneHour = 60 * 60 * 1000;
                    if (Date.now() - data.timestamp > oneHour) {
                        sessionStorage.removeItem(this.sessionStorageKey);
                        return;
                    }

                    // 同じ questionnaireKey の場合のみ復元
                    if (data.questionnaireKey !== this.questionnaire.key) {
                        return;
                    }

                    // 値を復元
                    this.values = data.values || {};

                    // チェックボックスの状態を復元
                    Object.keys(this.fields).forEach(fieldId => {
                        const field = this.fields[fieldId];
                        if (field.type === 'checkbox' && this.values[fieldId]) {
                            const checkedValues = this.values[fieldId];
                            Object.keys(field.sels || {}).forEach(key => {
                                const sel = field.sels[key];
                                sel.checked = checkedValues.includes(sel.value);
                            });
                        }
                    });

                    this.$nextTick(() => {
                        this.updateConditionalFields();
                    });
                } catch (error) {
                    console.error('Failed to restore from session storage:', error);
                }
            },

            async submitResults() {
                const payload = {
                    title: this.questionnaire.key,
                    timestamp: new Date().toISOString(),
                    // values: this.values,
                    values: Object.keys(this.values).map(fieldId => ({
                        fieldId,
                        dispname: this.data.fields.find(f => f.id === fieldId)?.dispname || fieldId,
                        value: this.values[fieldId]
                    })),
                    results: Object.keys(this.results).map(fieldId => ({
                        fieldId,
                        dispname: this.results[fieldId].dispname,
                        value: this.results[fieldId].value,
                        noreport: this.results[fieldId].noreport
                    })).filter(r => !r.noreport), // noreport=true は除外
                    alerts: this.alerts.filter(alert => alert.triggered) // トリガーされたもののみ
                };

                // ハッシュ生成
                // フォーム作成
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = `https://www.emuyn.net/cliniscale/report`;
                // form.target = '_blank'; スマホだとポップアップブロックされるため使えない

                // データをJSON文字列として送信
                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'result_data';
                input.value = JSON.stringify(payload);
                form.appendChild(input);

                document.body.appendChild(form);
                form.submit();
                document.body.removeChild(form);

                this.$root.notyf.success('結果ページを新しいタブで開きました');
                this.isSubmitting = false;
            },

            // クリア確認
            confirmReset() {
                // Vue.setで確実にリアクティブ化
                this.$set(this, 'showConfirmReset', true);

                // DOMの更新を待つ
                this.$nextTick(() => {
                    // モーダルがDOMに存在するか確認
                    const modal = document.querySelector('.modal-overlay');
                    if (!modal) {
                        console.error('Modal element not found in DOM!');
                    }
                });
            },

            // クリア実行
            performReset() {
                this.resetAllValues();
                this.showConfirmReset = false;
                this.$root.notyf.success('データをクリアしました');
            },

            resetAllValues() {
                this.values = {};

                for (const fieldId in this.fields) {
                    const field = this.fields[fieldId];

                    if (field.type === 'checkbox' && field.sels) {
                        Object.keys(field.sels).forEach(key => {
                            this.$set(field.sels[key], 'checked', false);
                        });
                        this.$set(this.values, fieldId, []);
                    } else if (field.type === 'scale') {
                        this.$set(this.values, fieldId, field.value || 0);
                    }
                }

                // セッションストレージもクリア
                try {
                    sessionStorage.removeItem(this.sessionStorageKey);
                } catch (error) {
                    console.error('Failed to clear session storage:', error);
                }

                this.$nextTick(() => {
                    this.updateConditionalFields();
                });
            },

            fillRandomValues() {
                this.resetAllValues();

                this.$nextTick(() => {
                    const filledFields = new Set();
                    this.fillRandomValuesCascade(0, filledFields);
                });
            },

            fillRandomValuesCascade(iteration, filledFields) {
                const maxIterations = 5;
                if (iteration >= maxIterations) return;

                const fieldsToFill = [];

                for (const fieldId in this.fields) {
                    const field = this.fields[fieldId];

                    if (field.hidden) continue;
                    if (filledFields.has(fieldId)) continue;

                    if (['text', 'textarea', 'radio', 'checkbox', 'scale', 'date', 'time'].includes(field.type)) {
                        fieldsToFill.push({
                            fieldId,
                            field
                        });
                    }
                }

                if (fieldsToFill.length === 0) {
                    return;
                }

                let hasNewInput = false;
                fieldsToFill.forEach(({
                    fieldId,
                    field
                }) => {
                    const shouldFill = this.shouldFillField(fieldId, field);
                    if (shouldFill) {
                        this.setRandomValue(fieldId, field);
                        filledFields.add(fieldId);
                        hasNewInput = true;
                    }
                });

                if (!hasNewInput) {
                    return;
                }

                this.$nextTick(() => {
                    this.updateConditionalFields();
                    setTimeout(() => {
                        this.fillRandomValuesCascade(iteration + 1, filledFields);
                    }, 100);
                });
            },

            shouldFillField(fieldId, field) {
                const value = this.values[fieldId];

                if (field.type === 'checkbox') {
                    return !value || (Array.isArray(value) && value.length === 0);
                }

                if (field.type === 'scale') {
                    return value === undefined || value === (field.value || 0);
                }

                return !value || value === '';
            },

            setRandomValue(fieldId, field) {
                switch (field.type) {
                    case 'text':
                        if (field.inputmode === 'numeric' || field.inputmode === 'decimal') {
                            const min = parseFloat(field.testrange?.[0] ?? field.min ?? 0);
                            const max = parseFloat(field.testrange?.[1] ?? field.max ?? 100);
                            const value = min + Math.random() * (max - min);
                            this.$set(this.values, fieldId, value.toFixed(field.inputmode === 'numeric' ? 0 : 1));
                        } else {
                            this.$set(this.values, fieldId, 'テスト値' + Math.floor(Math.random() * 100));
                        }
                        break;

                    case 'textarea':
                        this.$set(this.values, fieldId, 'テスト用テキスト: ' + Math.random().toString(36).substring(7));
                        break;

                    case 'radio':
                        if (field.sels && Object.keys(field.sels).length > 0) {
                            const options = Object.values(field.sels);
                            const randomOption = options[Math.floor(Math.random() * options.length)];
                            this.handleChange(fieldId, randomOption.value);
                        }
                        break;

                    case 'checkbox':
                        if (field.sels) {
                            const options = Object.values(field.sels);
                            const checkedValues = [];

                            options.forEach(option => {
                                if (Math.random() < 0.3) {
                                    const key = this.escapeKey(option.value);
                                    field.sels[key].checked = true;
                                    checkedValues.push(option.value);
                                }
                            });

                            this.$set(this.values, fieldId, checkedValues);
                        }
                        break;

                    case 'scale':
                        const min = field.min || 0;
                        const max = field.max || 10;
                        const value = Math.floor(min + Math.random() * (max - min + 1));
                        this.handleChange(fieldId, value);
                        break;

                    case 'date':
                        const date = new Date();
                        date.setDate(date.getDate() - Math.floor(Math.random() * 365));
                        this.$set(this.values, fieldId, date.toISOString().split('T')[0]);
                        break;

                    case 'time':
                        const hour = Math.floor(Math.random() * 24);
                        const minute = Math.floor(Math.random() * 4) * 15;
                        this.$set(this.values, fieldId,
                            String(hour).padStart(2, '0') + ':' + String(minute).padStart(2, '0'));
                        break;
                }
            },

            convertToSecureUrl(url) {
                // 例: https://q4cl-client.web.app/home?hash=78e141dcb77b848b3a1607389a34100b
                try {
                    const hash = new URL(url).searchParams.get("hash");
                    if (hash) {
                        return `https://www.emuyn.net/q4cl/sg?h=${hash}`;
                    }
                } catch (e) {
                    console.warn("Invalid sample_app URL:", url);
                }
                // 万が一 hash が取れない場合は元URLを返す
                return url;
            },

            generateQRCode() {
                if (!this.questionnaire.data.sample_app || this.isPermissionRequired) {
                    return;
                }

                this.$nextTick(() => {
                    const container = this.$refs.qrcodeContainer;
                    if (!container) return;

                    // 既存のQRコードをクリア
                    container.innerHTML = '';

                    // QRコード生成
                    new QRCode(container, {
                        text: this.convertToSecureUrl(this.questionnaire.data.sample_app),
                        width: 80,
                        height: 80,
                        colorDark: '#000000',
                        colorLight: '#ffffff',
                        correctLevel: QRCode.CorrectLevel.M
                    });
                });
            },

            handleScaleFocus() {
                // スライダーにフォーカスが当たったとき、他の入力要素のフォーカスを外す
                const activeElement = document.activeElement;
                if (activeElement &&
                    (activeElement.tagName === 'TEXTAREA' ||
                        activeElement.tagName === 'INPUT')) {
                    activeElement.blur();
                }
            },
        }
    });
</script>