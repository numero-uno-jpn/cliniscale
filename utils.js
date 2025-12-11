// utils.js - 共通ユーティリティ関数

/**
 * 著作権カテゴリーに対応するアイコンクラスを取得
 * @param {string} category - ライセンスカテゴリー
 * @returns {string} Font Awesomeアイコンクラス
 */
function getCopyrightIcon(category) {
  const iconMap = {
    public_domain: "fa-unlock",
    free_with_citation: "fa-quote-right",
    non_commercial_free: "fa-user-friends",
    permission_required_free: "fa-file-signature",
    permission_required_paid: "fa-file-invoice-dollar",
    commercial_license_required: "fa-lock",
    restricted: "fa-user-shield",
    unknown: "fa-question-circle",
  };
  return iconMap[category] || "fa-question-circle";
}

/**
 * 著作権カテゴリーに対応する日本語ラベルを取得
 * @param {string} category - ライセンスカテゴリー
 * @returns {string} 日本語ラベル
 */
function getCopyrightLabel(category) {
  const labelMap = {
    public_domain: "自由利用可",
    free_with_citation: "引用表記必須",
    non_commercial_free: "非営利のみ無料",
    permission_required_free: "許諾必要(無料)",
    permission_required_paid: "許諾必要(有料)",
    commercial_license_required: "商用ライセンス必須",
    restricted: "制限あり",
    unknown: "要確認",
  };
  return labelMap[category] || "要確認";
}

/**
 * 入力不可能かどうかを判定（有料の許諾が必要なカテゴリー）
 * これらのカテゴリーはフォーム入力がブロックされ、アイコンがえんじ色で表示される
 * @param {string} category - ライセンスカテゴリー
 * @returns {boolean} 入力不可能な場合true
 */
function requiresPermission(category) {
  const permissionRequired = [
    "permission_required_paid",
    "commercial_license_required",
  ];
  return permissionRequired.includes(category);
}

/**
 * 非営利・教育目的の注意書きを表示するか判定
 * @param {string} category - ライセンスカテゴリー
 * @returns {boolean} 注意書きを表示する場合true
 */
function showNonCommercialNotice(category) {
  const nonCommercialCategories = [
    "non_commercial_free",
    "permission_required_free",
  ];
  return nonCommercialCategories.includes(category);
}

/**
 * ブール値を日本語表示に変換
 * @param {boolean|null|undefined} value - ブール値
 * @returns {string} 日本語表示
 */
function getBooleanDisplay(value) {
  if (value === true) return "可能";
  if (value === false) return "不可";
  return "情報なし";
}

/**
 * ブール値に対応するアイコンを取得
 * @param {boolean|null|undefined} value - ブール値
 * @returns {string} Font Awesomeアイコンクラス
 */
function getBooleanIcon(value) {
  if (value === true) return "fa-check-circle";
  if (value === false) return "fa-times-circle";
  return "fa-question-circle";
}

/**
 * ブール値に対応する色クラスを取得
 * @param {boolean|null|undefined} value - ブール値
 * @returns {string} Tailwind CSSカラークラス
 */
function getBooleanClass(value) {
  if (value === true) return "text-green-600";
  if (value === false) return "text-red-600";
  return "text-gray-500";
}

/**
 * Vue.js用のmixinオブジェクト
 * Vueコンポーネントで利用する場合は、mixins: [copyrightUtilsMixin] として使用
 */
const copyrightUtilsMixin = {
  methods: {
    getCopyrightIcon,
    getCopyrightLabel,
    requiresPermission,
    showNonCommercialNotice,
    getBooleanDisplay,
    getBooleanIcon,
    getBooleanClass,
  },
};

// ブラウザ環境とNode.js環境の両方に対応
if (typeof module !== "undefined" && module.exports) {
  // Node.js環境
  module.exports = {
    getCopyrightIcon,
    getCopyrightLabel,
    requiresPermission,
    showNonCommercialNotice,
    getBooleanDisplay,
    getBooleanIcon,
    getBooleanClass,
    copyrightUtilsMixin,
  };
} else if (typeof window !== "undefined") {
  // ブラウザ環境
  window.CopyrightUtils = {
    getCopyrightIcon,
    getCopyrightLabel,
    requiresPermission,
    showNonCommercialNotice,
    getBooleanDisplay,
    getBooleanIcon,
    getBooleanClass,
    copyrightUtilsMixin,
  };
}
