# ISI（Insomnia Severity Index）- 問診票作成情報まとめ

## 基本情報

### 著作権

© Charles M. Morin（1993, 1996）

### 尺度の概要

- **正式名称**: Insomnia Severity Index (ISI)
- **日本語名**: 不眠症重症度指標
- **対象年齢**: 成人（18歳以上）
- **評価目的**: 不眠症症状の重症度と日常生活への影響の評価
- **実施時間**: 約3-5分
- **回答者**: 患者本人による自己記入

### 開発背景

- **開発者**: Charles M. Morin
- **発行年**: 1993年
- **理論的基盤**: DSM-IV診断基準に基づく不眠症の症状評価
- **標準化サンプル**: 多数の国際的妥当性研究によって検証

## 尺度構成

### 全体構造

- **総項目数**: 7項目
- **サブスケール数**: なし（単一因子構造）
- **評価方式**: 5段階リッカート尺度（0-4点）

### 夜間症状 - 3項目

- 入眠困難の程度
- 睡眠維持困難の程度
- 早朝覚醒の程度

### 睡眠満足度 - 1項目

- 現在の睡眠パターンへの満足度

### 日中への影響 - 3項目

- 他者からの目立ち具合の認知
- 睡眠問題への心配・苦痛
- 日常機能への干渉

## 信頼性・妥当性

### 信頼性

- **内的整合性**: クロンバックα = 0.80-0.90
- **テスト再テスト信頼性**: r = 0.65-0.80
- **評定者間信頼性**: 該当なし（自己記入式）

### 妥当性

- **感度**: 86.1%（カットオフ10、コミュニティサンプル）
- **特異度**: 87.7%（カットオフ10、コミュニティサンプル）
- **その他**: 睡眠日誌、ポリソムノグラフィー、臨床面接との高い相関を示す

## 得点化・解釈

### 基本得点

各項目の得点（0-4点）を合計し、総得点（0-28点）を算出

### 重症度分類の目安

- **正常範囲（臨床的に有意な不眠症なし）**: 0-7点
- **閾値下の不眠症**: 8-14点
- **中等度の臨床的不眠症**: 15-21点
- **重度の臨床的不眠症**: 22-28点

## 実施上の注意点

### 対象者

- 18歳以上の成人
- 不眠症状を有する、または疑われる患者

### 評価者

- 患者本人による自己記入
- 医療従事者による説明・支援が望ましい

### 制限事項

- 他の精神疾患や身体疾患に伴う続発性不眠の鑑別は困難
- 1-2週間の評価期間での症状変動を捉える

## 参考文献・URL

### 主要文献

- Morin CM. Insomnia: Psychological assessment and management. New York: Guilford Press; 1993.
- Bastien CH, Vallières A, Morin CM. Validation of the Insomnia Severity Index as an outcome measure for insomnia research. Sleep Med. 2001;2(4):297-307.
- Morin CM, Belleville G, Bélanger L, Ivers H. The insomnia severity index: psychometric indicators to detect insomnia cases and evaluate treatment response. SLEEP 2011;34(5):601-608.
- 宗澤岳史ら. 日本語版不眠重症度質問票の開発. 精神科治療学. 2009;24(2):219-225.

### 公式URL

- https://eprovide.mapi-trust.org/instruments/insomnia-severity-index

### 追加情報源

- https://www.ncbi.nlm.nih.gov/pmc/articles/PMC3079939/
- https://pubmed.ncbi.nlm.nih.gov/21532953/

## JSON作成時の技術的注意点

### 数式設定

- 合計得点計算: `[[Q1.index]] + [[Q2.index]] + ... + [[Q7.index]]`
- 重症度分類: 3項演算子を用いた条件分岐で実装

### 構造化

- 各項目は必須回答（required: true）に設定
- 選択肢インデックスは0-4で統一（selectoridx使用）
- warning/emergency条件でアラート機能を実装（中等度以上で警告）
- warning/emergencyフィールドには必ずnameとdescriptionを設定
