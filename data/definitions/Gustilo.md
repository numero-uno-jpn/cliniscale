# Gustilo Classification

## 基本情報

### 著作権

公的ドメイン

### 尺度の概要

- **正式名称**: Gustilo-Anderson Classification
- **日本語名**: Gustilo 分類
- **対象年齢**: 成人
- **評価目的**: 開放骨折の分類
- **実施時間**: 数分
- **回答者**: 整形外科医

### 開発背景

- **開発者**: Ramon B. Gustilo, John T. Anderson
- **発行年**: 1976 年
- **理論的基盤**: 汚染度と組織損傷の程度により感染リスクを予測
- **標準化サンプル**: 米国の開放骨折患者を対象とした研究

## 尺度構成

### 全体構造

- **総項目数**: 分類項目なし（臨床評価による分類）
- **サブスケール数**: なし
- **評価方式**: Type I から Type IIIc までの 5 段階分類

### タイプ詳細

#### 1. Type I

- 創 1cm 未満
- 低エネルギー損傷
- 軽度汚染

#### 2. Type II

- 創 1cm 以上
- 中等度エネルギー損傷
- 中等度汚染

#### 3. Type III

- 高エネルギー損傷
- 高度汚染
- サブタイプ:
  - **Type IIIA**: 軟部組織損傷小、被覆可能
  - **Type IIIB**: 軟部組織損傷中等度、被覆不可、骨膜剥離あり
  - **Type IIIC**: 動脈損傷を伴う

## 信頼性・妥当性

### 信頼性

- **内的整合性**: 該当なし
- **テスト再テスト信頼性**: 中程度
- **評定者間信頼性**: 中程度

### 妥当性

- **感度**: 高
- **特異度**: 高
- **その他**: 治療方針決定のガイドとして有用

## 得点化・解釈

### 基本得点

タイプの割り当てによる分類

### リスク分類の目安

- **Type I-II**: 低リスク（感染リスク低）
- **Type III**: 高リスク（感染リスク高、切断リスクあり）

## 実施上の注意点

### 対象者

- 開放骨折患者

### 評価者

- 整形外科医

### 制限事項

- 手術中に再分類が必要になる場合がある

## 参考文献・URL

### 主要文献

- Gustilo RB, Anderson JT. Prevention of infection in the treatment of one thousand and twenty-five open fractures of long bones: retrospective and prospective analyses. J Bone Joint Surg Am. 1976;58(4):453-8.
- PubMed: https://pubmed.ncbi.nlm.nih.gov/6989819/

### 公式 URL

- https://en.wikipedia.org/wiki/Gustilo_open_fracture_classification

### 追加情報源

- https://pubmed.ncbi.nlm.nih.gov/6989819/

## JSON 作成時の技術的注意点

### 数式設定

- 定性的評価のため数式計算なし

### 構造化

- radio 型フィールドでタイプを選択
- eval 型で自動的にリスク分類を表示
- warning/emergency 型で高リスク症例を強調表示
