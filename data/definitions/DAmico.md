# D'Amico 前立腺癌リスク分類 - 問診票作成情報まとめ

## 基本情報

### 著作権

公的ドメイン

### 尺度の概要

- **正式名称**: D'Amico Risk Classification for Prostate Cancer
- **日本語名**: D'Amico 前立腺癌リスク分類
- **対象年齢**: 成人男性
- **評価目的**: 前立腺癌のリスク層別化
- **実施時間**: 数分
- **回答者**: 泌尿器科医

### 開発背景

- **開発者**: Anthony V. D'Amico
- **発行年**: 1998 年
- **理論的基盤**: PSA 値、Gleason スコア、臨床病期の 3 因子によるリスク層別化
- **標準化サンプル**: 前立腺癌患者、米国研究

## 尺度構成

### 全体構造

- **総項目数**: 3 項目
- **サブスケール数**: なし
- **評価方式**: 低リスク、中リスク、高リスクの 3 段階分類

### 評価項目詳細

#### 1. PSA 値 - 3 段階

- 10 ng/mL 未満
- 10-20 ng/mL
- 20 ng/mL 超

#### 2. Gleason スコア - 3 段階

- 6 以下
- 7
- 8 以上

#### 3. 臨床病期 - 3 段階

- T1-T2a
- T2b
- T2c-T4

## 信頼性・妥当性

### 信頼性

- **内的整合性**: 該当なし（分類システムのため）
- **テスト再テスト信頼性**: 高い
- **評定者間信頼性**: 高い

### 妥当性

- **感度**: 高い
- **特異度**: 高い
- **その他**: 治療選択と予後予測に広く用いられている

## 得点化・解釈

### 基本得点

条件に基づいてリスクグループを判定

### リスク分類の目安

- **低リスク**: PSA <10、Gleason ≤6、T1-T2a のすべてを満たす
- **中リスク**: 上記以外で、PSA 10-20、Gleason 7、T2b のいずれかを満たす
- **高リスク**: PSA >20、Gleason ≥8、T2c-T4 のいずれかを満たす

## 実施上の注意点

### 対象者

- 前立腺癌と診断された患者
- 治療前の評価に使用

### 評価者

- 泌尿器科医
- 病理所見と PSA 値が必要

### 制限事項

- 生検結果に依存
- 他の予後因子（年齢、全身状態など）は考慮されない

## 参考文献・URL

### 主要文献

- D'Amico AV, Whittington R, Malkowicz SB, et al. Biochemical outcome after radical prostatectomy, external beam radiation therapy, or interstitial radiation therapy for clinically localized prostate cancer. JAMA. 1998;280(11):969-74.

### 公式 URL

- https://www.mdcalc.com/calc/2049/damico-risk-classification-prostate-cancer

### 追加情報源

- https://pubmed.ncbi.nlm.nih.gov/10411043/

## JSON 作成時の技術的注意点

### 数式設定

- 3 つの因子のインデックス値を条件分岐で評価
- 高リスク判定: いずれかの因子がインデックス 2 以上
- 中リスク判定: 高リスクでなく、いずれかの因子がインデックス 1 以上
- 低リスク判定: すべての因子がインデックス 0

### 構造化

- radio フィールドで selectoridx を 0, 1, 2 に設定
- eval フィールドで条件分岐式を使用してリスク判定
