# MLHFQ 作成情報まとめ

## 基本情報

### 著作権

Copyright ©1986 Regents of the University of Minnesota, All rights reserved. LIVING WITH HEART FAILURE® は米国ミネソタ大学の登録商標。使用には同大学からのライセンス契約と料金が必要。

### 尺度の概要

- **正式名称**: Minnesota Living with Heart Failure Questionnaire (MLHFQ)
- **日本語名**: ミネソタ心不全生活質問票
- **対象年齢**: 成人心不全患者
- **評価目的**: 心不全が生活の質に与える影響の評価
- **実施時間**: 約 5-10 分
- **回答者**: 患者自身 (自己記入式)

### 開発背景

- **開発者**: Thomas S. Rector, Jay N. Cohn
- **発行年**: 1987 年
- **理論的基盤**: 心不全症状と QOL の関連性評価
- **標準化サンプル**: 複数の国際的研究で妥当性確認済み

## 尺度構成

### 全体構造

- **総項目数**: 21 項目
- **サブスケール数**: 3 領域 (Physical、Emotional、その他)
- **評価方式**: 6 段階リッカート尺度 (0-5 点)

### サブスケール詳細

#### 1. Physical dimension (身体領域) - 8項目

- 歩行・階段昇降の困難
- 家事労働の制限
- 外出の困難
- 睡眠障害
- 人間関係への影響
- 息切れ
- 疲労感・活力不足
- 入院の必要性

#### 2. Emotional dimension (情緒領域) - 5項目

- 家族・友人への負担感
- 病状理解不足による不安
- うつ的気分
- 集中力の低下
- 物忘れ

#### 3. その他の項目 - 8項目

- 足首・脚・足の腫れ
- 座位・臥位の困難
- 職場での仕事への影響
- 趣味・娯楽活動の制限
- 性的活動の制限
- 食事制限
- 医療費負担
- 治療副作用

## 信頼性・妥当性

### 信頼性

- **内的整合性**: Cronbach's α = 0.94 (全体尺度)
- **テスト再テスト信頼性**: 良好
- **評定者間信頼性**: 自己記入式のため非該当

### 妥当性

- **構成概念妥当性**: 因子分析により確認済み
- **基準関連妥当性**: SF-36、6 分間歩行テスト、NYHA 分類との相関確認
- **言語的妥当性**: 30 以上の言語に翻訳・妥当性確認済み

## 得点化・解釈

### 基本得点

- 各項目 0-5 点の合計
- 総得点: 0-105 点
- Physical subscore: 0-40 点
- Emotional subscore: 0-25 点

### QOL障害レベルの目安

- **軽度**: 総得点 0-23 点
- **中等度**: 総得点 24-44 点
- **重度**: 総得点 45 点以上

注: 高得点ほど QOL の低下を示す (逆転スコア)

## 実施上の注意点

### 対象者

- NYHA 分類 II-IV 度の症候性心不全患者
- 駆出率保持型・低下型心不全の両方に適用可能
- 認知機能が保たれている患者

### 評価者

- 自己記入式のため特別な訓練不要
- 必要に応じて医療従事者が補助

### 制限事項

- ライセンス料が必要 (営利・非営利問わず)
- 微細な変化に対する感度は限定的
- 高強度介入でのみ反応性を示す

## 参考文献・URL

### 主要文献

- Rector TS, Kubo SH, Cohn JN. Patients' self-assessment of their congestive heart failure. Part 2: Content, reliability and validity of a new measure, the Minnesota Living with Heart Failure Questionnaire. Heart Failure. 1987 Oct/Nov:198-209.

### 公式URL

- ライセンス取得: https://license.umn.edu/product/minnesota-living-with-heart-failure-questionnaire-mlhfq
- 公式サイト: https://license.umn.edu/product/minnesota-living-with-heart-failure-questionnaire-mlhfq

### 追加情報源

- LOINC database: https://loinc.org/71939-3
- MAPI Research Trust (翻訳版情報): https://eprovide.mapi-trust.org/instruments/minnesota-living-with-heart-failure-questionnaire

## JSON作成時の技術的注意点

### 数式設定

- Physical score: 項目 3,4,5,6,7,12,13,14 の合計 (項目インデックス使用)
- Emotional score: 項目 17,18,19,20,21 の合計 (項目インデックス使用)
- Total score: 全 21 項目の合計 (項目インデックス使用)

### 構造化

- 各項目は「過去 4 週間において、心不全が〜することによって望む生活を妨げたか」の統一形式
- 6 段階評価 (全くない〜非常に多い)
- inline 設定でラジオボタンを横並び表示
- selectoridx で 0-5 の数値インデックス設定が重要
- 各項目を必須入力として設定
