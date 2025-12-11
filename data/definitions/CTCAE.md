# CTCAE 副作用評価 - 問診票作成情報まとめ

## 基本情報

### 著作権

National Cancer Institute (NCI) 所有、公開使用可能

### 尺度の概要

- **正式名称**: Common Terminology Criteria for Adverse Events (CTCAE)
- **日本語名**: 有害事象共通用語規準
- **対象年齢**: 全年齢
- **評価目的**: 臨床試験における有害事象 (副作用) の標準化されたグレード評価
- **実施時間**: 変動 (有害事象の種類と数による)
- **回答者**: 臨床医、治験担当医

### 開発背景

- **開発者**: National Cancer Institute (NCI)
- **発行年**: 1983 年初版、現在 Version 5.0 (2017 年)
- **理論的基盤**: 有害事象を標準化された用語とグレード (1-5) で分類し、臨床試験間での比較と安全性評価を可能にする。837 種類の有害事象を 26 のカテゴリに分類
- **標準化サンプル**: 国際的な臨床試験データに基づく

## 尺度構成

### 全体構造

- **総項目数**: 837 種類の有害事象
- **サブスケール数**: 26 のカテゴリ (臓器系統別)
- **評価方式**: グレード 1-5 (重症度)

### カテゴリ詳細

#### 主要なカテゴリ (26 カテゴリ中の代表例)

- 血液・リンパ系 (Blood and lymphatic system disorders)
- 心臓系 (Cardiac disorders)
- 消化器系 (Gastrointestinal disorders)
- 内分泌系 (Endocrine disorders)
- 眼系 (Eye disorders)
- 全身症状 (General disorders and administration site conditions)
- 感染症 (Infections and infestations)
- 代謝・栄養系 (Metabolism and nutrition disorders)
- 筋骨格系 (Musculoskeletal and connective tissue disorders)
- 神経系 (Nervous system disorders)
- 精神系 (Psychiatric disorders)
- 腎・泌尿器系 (Renal and urinary disorders)
- 生殖器系 (Reproductive system and breast disorders)
- 呼吸器系 (Respiratory, thoracic and mediastinal disorders)
- 皮膚系 (Skin and subcutaneous tissue disorders)
- 血管系 (Vascular disorders)

### グレード評価詳細

#### Grade 1 - 軽度

- 無症状または軽度の症状
- 臨床的または診断的観察のみ、治療を要さない

#### Grade 2 - 中等度

- 最小限・局所的・非侵襲的治療を要する
- 年齢相応の身の回り以外の日常生活動作 (IADL) に支障

#### Grade 3 - 重度または医学的に重大

- ただちに生命を脅かすものではない
- 入院または入院期間の延長を要する
- 身の回りの日常生活動作 (ADL) に支障

#### Grade 4 - 生命を脅かす

- 緊急処置を要する

#### Grade 5 - 死亡

- 有害事象による死亡

## 信頼性・妥当性

### 信頼性

- **内的整合性**: 該当なし (分類システムのため)
- **テスト再テスト信頼性**: 高 (明確な定義による)
- **評定者間信頼性**: 高 (標準化された基準、トレーニングにより向上)

### 妥当性

- **感度**: 高 (有害事象の捕捉)
- **特異度**: 高 (重症度の正確な分類)
- **その他**: 10,000 以上の論文で使用、臨床試験における有害事象評価の国際標準

## 得点化・解釈

### 基本得点

各有害事象に対してグレード 1-5 を割り当て (スコアリングではない)

### グレードの臨床的意義

- **Grade 1-2**: 外来で管理可能、治験継続可能
- **Grade 3**: 入院治療が必要、治験薬の減量または休薬を検討
- **Grade 4-5**: 重篤な有害事象 (Serious Adverse Event, SAE)、治験薬の中止を検討

## 実施上の注意点

### 対象者

- 臨床試験参加患者
- 抗がん剤治療を受けている患者

### 評価者

- 治験担当医、臨床医
- 定期的かつ系統的な評価が必要

### 制限事項

- Version 5.0 (最新版) を使用
- 有害事象ごとに詳細な定義を参照
- 重篤な有害事象 (SAE: Grade 3-5) は速やかに報告 (Grade 4-5 は 24 時間以内)
- 複数の有害事象が発生した場合、それぞれを個別に評価
- 因果関係の判定は別途必要

## 参考文献・URL

### 主要文献

- Common Terminology Criteria for Adverse Events (CTCAE) Version 5.0. National Cancer Institute. 2017.
- 公式文書: https://ctep.cancer.gov/protocoldevelopment/electronic_applications/ctc.htm

### 公式 URL

- https://ctep.cancer.gov/protocoldevelopment/electronic_applications/ctc.htm

### 追加情報源

- https://evs.nci.nih.gov/ftp1/CTCAE/CTCAE_5.0/
- 日本語訳 (JCOG 版): http://www.jcog.jp/

## JSON 作成時の技術的注意点

### 数式設定

- 重症度 (1-5) を主要な判定基準とする
- 単純な条件分岐で Grade 1-5 を判定
- 介入の必要性 (checkbox) は補足情報として収集
- 日常生活への影響 (ADL/IADL) も補足情報として収集

### 構造化

- **カテゴリ選択は checkbox** を使用（複数の臓器系統で同時に副作用が発生するため）
- 各カテゴリに **parentsel を設定**し、選択時に該当カテゴリの詳細評価項目を表示
- 各カテゴリ配下に以下を配置:
  - 有害事象名 (textarea)
  - 重症度 (radio: Grade 1-5)
  - 介入の必要性 (checkbox)
  - ADL/IADL 影響 (radio)
- eval フィールドで CTCAE グレード、臨床的対応、試験継続の可否、報告の緊急性を計算
- warning (Grade 3 以上) と emergency (Grade 4 以上) には name を設定
- subsection を使用 (section は視認性の問題あり)
- 重症度の選択肢は CTCAE v5.0 の定義に準拠
