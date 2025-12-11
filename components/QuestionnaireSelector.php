<template id="questionnaire-selector-template">
    <div class="space-y-6 mt-4" v-cloak>
        <!-- スコア票リスト -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <template v-if="uniqueQuestionnaires.length > 0">
                <div
                    v-for="questionnaire in uniqueQuestionnaires"
                    :key="questionnaire.key"
                    class="bg-white rounded-lg shadow-md p-6 cursor-pointer hover:shadow-xl transition-all duration-200 hover:scale-105 flex flex-col">

                    <!-- カード内容（クリック可能部分） -->
                    <div
                        @click="$emit('select', questionnaire.key, questionnaire.data)"
                        class="flex-1">
                        <h3 class="font-bold text-lg text-gray-900 mb-2">
                            {{ questionnaire.data.abbreviation || questionnaire.key }}
                        </h3>
                        <p class="text-sm text-gray-600 mb-3">{{ questionnaire.data.full_name }}</p>
                        <h4 class="mb-2">
                            {{ questionnaire.data.purpose }}
                        </h4>

                        <!-- カテゴリータグ -->
                        <div class="flex flex-wrap gap-2 mb-3">
                            <span
                                v-for="(cat, idx) in (questionnaire.data.categories || []).slice(0, 2)"
                                :key="`${questionnaire.key}-cat-${idx}`"
                                class="px-2 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-medium">
                                {{ cat }}
                            </span>
                        </div>
                    </div>

                    <!-- ボタンエリア（クリックイベント伝播を止める） -->
                    <div class="mt-auto flex items-center justify-between gap-2 pt-3 border-t border-gray-100">
                        <!-- 詳細情報ボタン -->
                        <button
                            @click.stop="$emit('show-info', questionnaire.key, questionnaire.data)"
                            class="flex items-center gap-1 px-3 py-1.5 text-sm bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors">
                            <i class="fas fa-info-circle"></i>
                            <span>詳細情報</span>
                        </button>

                        <!-- 著作権バッジ（右下） - クリック可能に -->
                        <button
                            v-if="questionnaire.data.copyright"
                            @click.stop="$emit('show-info', questionnaire.key, questionnaire.data)"
                            :class="[
                                'copyright-badge cursor-pointer hover:opacity-80 transition-opacity',
                                requiresPermission(questionnaire.data.copyright.license_category) ? 'requires-permission' : ''
                            ]">
                            <i :class="['fas', getCopyrightIcon(questionnaire.data.copyright.license_category)]"></i>
                            <span>{{ getCopyrightLabel(questionnaire.data.copyright.license_category) }}</span>
                        </button>
                    </div>
                </div>
            </template>

            <!-- 該当なし -->
            <div v-else class="col-span-full text-center py-12">
                <i class="fas fa-file-alt text-gray-400 text-5xl mb-4"></i>
                <p class="text-gray-600">該当するスコア票が見つかりません</p>
            </div>
        </div>
    </div>
</template>

<script>
    Vue.component('questionnaire-selector', {
        template: '#questionnaire-selector-template',
        mixins: [window.CopyrightUtils.copyrightUtilsMixin],
        props: {
            questionnaires: Object,
            categorizedQuestionnaires: Object,
            filteredQuestionnaires: Object,
            selectedCategory: String,
            searchQuery: String,
            sortAscending: Boolean,
        },
        computed: {
            categories() {
                return Object.keys(this.categorizedQuestionnaires).sort();
            },

            // 重複を排除した一意のスコア票リスト
            uniqueQuestionnaires() {
                const uniqueMap = new Map();

                // filteredQuestionnaires から全てのスコア票を取得
                Object.values(this.filteredQuestionnaires).forEach(items => {
                    Object.keys(items || {}).forEach(key => {
                        // まだ追加されていないスコア票のみ追加
                        if (!uniqueMap.has(key)) {
                            uniqueMap.set(key, {
                                key: key,
                                data: items[key]
                            });
                        }
                    });
                });

                // Map を配列に変換し、keyで日本語ソート
                return Array.from(uniqueMap.values()).sort((a, b) => {
                    return this.sortAscending ? a.key.localeCompare(b.key, 'ja') : b.key.localeCompare(a.key, 'ja');
                });
            },

            totalCount() {
                return this.uniqueQuestionnaires.length;
            }
        }
    });
</script>