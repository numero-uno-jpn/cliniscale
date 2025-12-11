# BAI 問診票作成情報まとめ

## 基本情報

### 著作権

Beck Anxiety Inventory (BAI)は Pearson Assessments 社により著作権保護されている。

### 尺度の概要

- **正式名称**: Beck Anxiety Inventory (BAI)
- **日本語名**: ベック不安評価尺度
- **対象年齢**: 17-80 歳(研究では 12 歳以上でも使用実績あり)
- **評価目的**: 不安症状の重症度評価、うつ病からの不安症状の弁別
- **実施時間**: 5-10 分
- **回答者**: 本人(自己報告式)、過去1週間を評価

### 開発背景

- **開発者**: Aaron T. Beck, Nathan Epstein, Gary Brown, Robert A. Steer
- **発行年**: 1988 年
- **理論的基盤**: 認知行動療法理論、不安症状の身体的・認知的・情緒的側面評価
- **標準化サンプル**: 1,086 名の精神科外来患者(1980-1986 年収集)

## 尺度構成

### 全体構造

- **総項目数**: 21 項目
- **サブスケール数**: なし(単一尺度、ただし二因子構造が報告されている)
- **評価方式**: 4 段階リッカート尺度(0-3 点)、過去1週間を評価

### 項目内容詳細

#### 身体症状(主要)
- しびれ感やうずき、ほてり、足のふらつき、めまい、動悸、手の震え、発汗など

#### 認知・情緒症状
- 最悪の事態への恐怖、コントロール喪失への恐怖、死への恐怖、恐れなど

#### パニック関連症状
- 窒息感、呼吸困難、失神感など

### 二因子構造

#### 身体的因子 - 12項目
- しびれ、ほてり、ふらつき、めまい、動悸、不安定感、震え、顔の紅潮、発汗

#### 認知的因子 - 9項目
- リラックス困難、恐怖、神経過敏、窒息感、コントロール喪失の恐怖、呼吸困難、死の恐怖、消化不良

## 信頼性・妥当性

### 信頼性

- **内的整合性**: Cronbach's α = 0.92
- **テスト再テスト信頼性**: r = 0.75(1 週間間隔)

### 妥当性

- **構成概念妥当性**: Hamilton 不安評価尺度との中等度相関(r = 0.51)
- **弁別妥当性**: Hamilton 抑うつ評価尺度との軽度相関(r = 0.25)
- **因子構造**: 身体的因子と認知的因子の二因子構造が一般的

## 得点化・解釈

### 基本得点

- 各項目 0-3 点の合計(範囲: 0-63 点)

### 重症度の目安

- **最小限**: 0-7 点
- **軽度**: 8-15 点
- **中等度**: 16-25 点
- **重度**: 26-63 点

### 臨床的カットオフ

- 16 点以上: 臨床的に有意な不安(Beck & Steer, 1993)

## 実施上の注意点

### 対象者

- 17 歳以上の青年・成人
- 身体疾患のある患者では身体症状の重複に注意
- 高齢者では不安と抑うつの弁別が困難になる可能性

### 評価者

- 特別な訓練は不要(自己記入式)
- 結果解釈には臨床的判断が必要

### 制限事項

- 診断ツールではなく重症度評価ツール
- 身体症状に重点を置くため、身体疾患との鑑別が必要
- 認知的不安症状(心配、破局的思考など)の評価は限定的
- 不安障害のサブタイプ診断には適さない
- 15 項目中 21 項目が身体症状を評価するため、パニック障害での得点が高くなる傾向

## 参考文献・URL

### 主要文献

- Beck, A. T., Epstein, N., Brown, G., & Steer, R. A. (1988). An inventory for measuring clinical anxiety: Psychometric properties. Journal of Consulting and Clinical Psychology, 56(6), 893-897.
- Beck, A. T., & Steer, R. A. (1993). Beck Anxiety Inventory Manual. San Antonio, TX: Psychological Corporation.

### 公式URL

- Pearson Clinical: https://www.pearsonclinical.com/psychology/products/100000251/beck-anxiety-inventory-bai.html

### 追加情報源

- Wikipedia: https://en.wikipedia.org/wiki/Beck_Anxiety_Inventory
- ScienceDirect Topics: https://www.sciencedirect.com/topics/medicine-and-dentistry/beck-anxiety-inventory
- RehabMeasures Database: https://www.sralab.org/rehabilitation-measures/beck-anxiety-inventory

## JSON作成時の技術的注意点

### 数式設定

- 総得点計算: 全 21 項目の.index プロパティを合計(radio ボタンの選択インデックス)
- 重症度分類: 3 項演算子使用による段階的分類(0-7/8-15/16-25/26-63)

### 構造化

- 全項目に同一の 4 段階選択肢を使用
- eval タイプフィールドで dispname を定義し、患者と医療者双方に結果を表示
- 各項目に required: true を設定し、全項目への回答を必須化
- item1-item21 の命名規則で項目を識別
- .index プロパティでラジオボタンの選択値(0-3)を参照
