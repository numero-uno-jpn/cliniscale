# MSQ - 問診票作成情報まとめ

## 基本情報

### 著作権

- 原著者: Weiss, D. J., Dawis, R. V., England, G. W., & Lofquist, L. H. (1967)
- ライセンス: Creative Commons Attribution-NonCommercial 4.0 International License
- 研究・臨床目的での使用は無料、商用利用には許可が必要

### 尺度の概要

- **正式名称**: Minnesota Satisfaction Questionnaire - Short Form (MSQ)
- **日本語名**: ミネソタ職務満足質問票短縮版
- **対象年齢**: 就労者全般
- **評価目的**: 職務満足度の測定（内発的・外発的満足度）
- **実施時間**: 5-10 分
- **回答者**: 労働者本人

### 開発背景

- **開発者**: Weiss, Dawis, England, Lofquist（ミネソタ大学職業心理学研究部）
- **発行年**: 1967 年
- **理論的基盤**: Herzberg の二因子理論に基づく職務満足度理論
- **標準化サンプル**: 25 の代表的職業群での標準化データあり

## 尺度構成

### 全体構造

- **総項目数**: 20 項目
- **サブスケール数**: 2 因子（内発的満足度・外発的満足度）
- **評価方式**: 5 段階リッカート尺度（1:非常に不満 - 5:非常に満足）

### 因子詳細

#### 1. 内発的満足度 - 12 項目

- 能力活用、達成感、活動性、権限、創造性
- 独立性、道徳的価値観、責任、社会奉仕
- 社会的地位、多様性、安定性

#### 2. 外発的満足度 - 8 項目

- 昇進機会、給与、監督関係（人間関係・技術的）
- 会社方針、同僚関係、承認、労働条件

## 信頼性・妥当性

### 信頼性

- **内的整合性**: 全体 α=0.85-0.91、内発的満足度 α=0.86-0.90、外発的満足度 α=0.80-0.85
- **テスト再テスト信頼性**: r=0.70-0.80
- **評定者間信頼性**: 自己記入式のため該当なし

### 妥当性

- **構成概念妥当性**: 因子分析で 2 因子構造を確認
- **併存的妥当性**: JDI、JSS など他の職務満足度尺度との高相関
- **内容的妥当性**: 広範な職務関連要因を反映

## 得点化・解釈

### 基本得点

- 各項目 1-5 点で評価
- 内発的満足度: 12 項目の合計（12-60 点）
- 外発的満足度: 8 項目の合計（8-40 点）
- 全般的満足度: 全 20 項目の合計（20-100 点）

### 解釈の目安

- **平均スコア**: 各因子の合計点 ÷ 項目数
- **満足傾向**: 平均 3.0 以上で満足傾向
- **要改善**: 平均 3.0 未満で改善が必要

## 実施上の注意点

### 対象者

- 就労経験のある成人
- 組織に所属する従業員
- フルタイム・パートタイム問わず適用可能

### 評価者

- 自己記入式質問票
- 管理者による実施・回収が一般的
- 匿名性の確保が重要

### 制限事項

- 文化的背景による解釈の違いに注意
- 組織特性や職種による基準値の違い
- 一時的な感情状態の影響を受ける可能性

## 参考文献・URL

### 主要文献

- Weiss, D. J., Dawis, R. V., England, G. W., & Lofquist, L. H. (1967). Manual for the Minnesota Satisfaction Questionnaire. Minneapolis: University of Minnesota, Industrial Relations Center.
- Fields, D. L. (2002). Taking the Measure of Work: A Guide to Validated Scales for Organizational Research and Diagnosis. Sage Publications.

### 公式URL

- https://vpr.psych.umn.edu/node/26
- Vocational Psychology Research, University of Minnesota

### 追加情報源

- https://www.careershodh.com/minnesota-satisfaction-questionnaire-msq/
- https://scales.arabpsychology.com/s/minnesota-satisfaction-questionnaire/

## JSON作成時の技術的注意点

### 数式設定

- 内発的満足度: Q1,Q2,Q3,Q7,Q9,Q10,Q11,Q15,Q16,Q20,Q4,Q8 の合計
- 外発的満足度: Q5,Q6,Q12,Q13,Q14,Q17,Q18,Q19 の合計
- 平均スコア計算で解釈しやすい形式に変換

### 構造化

- selectoridx で 1-5 の数値スコアを設定
- eval タイプで自動計算機能を実装
- 結果は医療施設側のみ表示される仕様
