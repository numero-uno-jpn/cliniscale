# SARC-F 作成情報まとめ

## 基本情報

### 著作権

- 原著論文: オープンアクセス (Creative Commons Attribution-NonCommercial License)
- 日本語版: 福島県立医科大学 栗田紀明特任教授により正式な翻訳・逆翻訳手続きを経て作成

### 尺度の概要

- **正式名称**: SARC-F (Screening tool for Sarcopenia)
- **日本語名**: SARC-F サルコペニアスクリーニング質問票
- **対象年齢**: 高齢者 (主に 60 歳以上)
- **評価目的**: サルコペニアのスクリーニング
- **実施時間**: 約 2-3 分
- **回答者**: 本人または介護者

### 開発背景

- **開発者**: Theodore K. Malmstrom, John E. Morley (Saint Louis University School of Medicine)
- **発行年**: 2016 年 (初回は 2013 年に簡易版発表)
- **理論的基盤**: サルコペニアの主要な特徴と機能的帰結
- **標準化サンプル**: AAH 研究、BLSA 研究、NHANES 研究の複数コホート

## 尺度構成

### 全体構造

- **総項目数**: 5 項目
- **サブスケール数**: なし（単一尺度）
- **評価方式**: 3 段階評価 (0-2 点)

### サブスケール詳細

#### 1. 筋力 (Strength) - S - 1 項目

- 4.5kg の物を持ち上げる・運ぶ困難さ

#### 2. 歩行補助 (Assistance walking) - A - 1 項目

- 部屋の中を歩く困難さ

#### 3. 椅子からの立ち上がり (Rising from a chair) - R - 1 項目

- ベッドや椅子からの立ち上がり困難さ

#### 4. 階段昇降 (Climbing stairs) - C - 1 項目

- 10 段程度の階段昇降困難さ

#### 5. 転倒歴 (Falls) - F - 1 項目

- 過去 1 年間の転倒回数

## 信頼性・妥当性

### 信頼性

- **内的整合性**: クロンバック α = 0.55-0.86 (研究により異なる)
- **テスト再テスト信頼性**: 報告値により異なる
- **評定者間信頼性**: 該当なし（自己評価のため）

### 妥当性

- **感度**: 3.8-4.8% (研究により異なる)
- **特異度**: 94-99%
- **その他**: 因子妥当性、基準妥当性、構成概念妥当性を確認

## 得点化・解釈

### 基本得点

- 各項目 0-2 点で評価
- 合計点は 0-10 点

### リスク分類の目安

- **低リスク**: 0-3 点 (サルコペニアのリスクは低い)
- **高リスク**: 4-10 点 (サルコペニアの可能性が高い)

## 実施上の注意点

### 対象者

- 高齢者 (特に 60 歳以上)
- サルコペニアのリスクが疑われる者

### 評価者

- 医療従事者、介護職員、研究者
- 特別な資格は不要

### 制限事項

- スクリーニングツールであり確定診断ではない
- 感度が低いため陰性でもサルコペニアを除外できない
- より精密な診断には握力測定、筋肉量測定が必要

## 参考文献・URL

### 主要文献

- Malmstrom TK, Miller DK, Simonsick EM, Ferrucci L, Morley JE. SARC-F: a symptom score to predict persons with sarcopenia at risk for poor functional outcomes. J Cachexia Sarcopenia Muscle. 2016;7(1):28-36.
- 栗田紀明ら. SARC-F Validation and SARC-F+EBM Derivation in Musculoskeletal Disease: The SPSS-OK Study. J Nutr Health Aging. 2019;23:732-738.

### 公式URL

- 原著論文: https://www.ncbi.nlm.nih.gov/pmc/articles/PMC4799853/
- 日本語版情報: https://noriaki-kurita.jp/resources/sarc-f-jpn/

### 追加情報源

- AWGS 2019 診断基準
- 日本サルコペニア・フレイル学会推奨ガイドライン

## JSON作成時の技術的注意点

### 数式設定

- 合計点計算: `[[Q1_筋力.index]] + [[Q2_歩行.index]] + [[Q3_立ち上がり.index]] + [[Q4_階段.index]] + [[Q5_転倒.index]]`
- リスク判定: `[[SARC_F_合計点]] >= 4 ? 'サルコペニアの可能性が高い (4点以上)' : 'サルコペニアのリスクは低い (3点以下)'`

### 構造化

- 全 5 項目を必須回答とし、radio ボタンで 0-2 点を選択
- selectoridx で明確にスコア化
- 結果は医療従事者向けのため、患者に対する詳細な説明は不要
