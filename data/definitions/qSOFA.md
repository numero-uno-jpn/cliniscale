# qSOFA 問診票作成情報まとめ

## 基本情報

### 著作権

原典論文：Singer M, et al. The Third International Consensus Definitions for Sepsis and Septic Shock (Sepsis-3). JAMA. 2016;315(8):801-10.

### 尺度の概要

- **正式名称**: quick Sequential Organ Failure Assessment (qSOFA)
- **日本語名**: クイック臓器不全評価スコア
- **対象年齢**: 成人患者
- **評価目的**: 敗血症のスクリーニング
- **実施時間**: 2-3 分
- **回答者**: 医療従事者による評価

### 開発背景

- **開発者**: European Society of Intensive Care Medicine (ESICM)と Society of Critical Care Medicine (SCCM)の特別委員会
- **発行年**: 2016 年
- **理論的基盤**: Sepsis-3 定義に基づく敗血症スクリーニング
- **標準化サンプル**: 複数の国際的研究データに基づく

## 尺度構成

### 全体構造

- **総項目数**: 3 項目
- **サブスケール数**: なし（単一スケール）
- **評価方式**: 各項目 0-1 点の 2 段階評価

### サブスケール詳細

#### 1. 呼吸数 - 1 項目

- 安静時の呼吸数が 22 回/分以上で 1 点

#### 2. 意識状態 - 1 項目

- Glasgow Coma Scale (GCS) 14 点以下で 1 点

#### 3. 収縮期血圧 - 1 項目

- 収縮期血圧 100mmHg 以下で 1 点

## 信頼性・妥当性

### 信頼性

- **内的整合性**: 該当なし（簡便なスクリーニングツールのため）
- **テスト再テスト信頼性**: 該当あり（バイタルサインに基づくため時間変化を反映）
- **評定者間信頼性**: 高い（客観的測定項目のため）

### 妥当性

- **感度**: 約 60-70%（研究により変動）
- **特異度**: 約 70-80%（研究により変動）
- **その他**: SOFA スコアとの相関性は中等度、死亡予測能は中等度

## 得点化・解釈

### 基本得点

各項目該当時に 1 点を付与し、3 項目の合計点を算出（0-3 点）

### 重症度の目安

- **0-1 点**: 敗血症リスク低
- **2-3 点**: 敗血症疑い（要精査・SOFA スコア評価推奨）

## 実施上の注意点

### 対象者

- 感染症が疑われる成人患者
- ICU 以外の病棟・外来での使用を想定

### 評価者

- 医師、看護師等の医療従事者
- バイタルサイン測定技術が必要

### 制限事項

- 感度が低いため単独での診断は不適切
- あくまでスクリーニングツールとして使用
- 最新ガイドライン（SSCG2021）では単独使用を推奨しない
- 挿管患者では意識評価が困難

## 参考文献・URL

### 主要文献

- Singer M, et al. The Third International Consensus Definitions for Sepsis and Septic Shock (Sepsis-3). JAMA. 2016;315(8):801-10.
- Seymour CW, et al. Assessment of Clinical Criteria for Sepsis: For the Third International Consensus Definitions for Sepsis and Septic Shock (Sepsis-3). JAMA. 2016;315(8):762-774.

### 公式URL

- MDCalc: https://www.mdcalc.com/calc/1996/qsofa-score
- 日本集中治療医学会・日本救急医学会: 日本版敗血症診療ガイドライン 2024

### 追加情報源

- HOKUTO 計算ツール: https://hokuto.app/calculator/DoKhrceJXtA3sPo99an1
- 医療電卓 MedCalc: https://medical.tokyo/medcalc/quick

## JSON作成時の技術的注意点

### 数式設定

- qSOFA スコア計算: `[[呼吸数.index]] + [[意識状態.index]] + [[収縮期血圧.index]]`
- 判定ロジック: `[[qSOFAスコア]] >= 2 ? '敗血症疑い（要精査）' : '敗血症リスク低'`
- 警告表示: `[[qSOFAスコア]] >= 2` で warning 表示

### 構造化

- 各項目は radio 選択肢で 0 点/1 点を明確に区別
- selectoridx で数値インデックスを設定
- eval 項目でスコア計算と判定結果を自動表示
- 2 点以上で warning 表示により注意喚起
