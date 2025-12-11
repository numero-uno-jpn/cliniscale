# QuickDASH 問診票作成情報まとめ

## 基本情報

### 著作権

Institute for Work & Health 所有

### 尺度の概要

- **正式名称**: Quick Disabilities of the Arm, Shoulder and Hand (QuickDASH)
- **日本語名**: 上肢障害簡易評価票
- **対象年齢**: 成人
- **評価目的**: 上肢機能障害の評価
- **実施時間**: 5 分
- **回答者**: 患者本人

### 開発背景

- **開発者**: Beaton DE
- **発行年**: 2005 年
- **理論的基盤**: DASH (Disabilities of the Arm, Shoulder and Hand) の短縮版として開発。上肢障害の簡易評価ツール
- **標準化サンプル**: 上肢障害患者を対象にカナダで開発

## 尺度構成

### 全体構造

- **総項目数**: 11 項目
- **サブスケール数**: なし
- **評価方式**: 各項目 1-5 点、0-100 点スケールに変換 (高得点ほど障害が大きい)

### 項目群詳細

#### 1. 身体機能 - 6 項目

- Q1: 重いドアを開ける
- Q2: 家事や庭仕事
- Q3: 買い物袋や鞄を運ぶ
- Q4: 背中を洗う
- Q5: ナイフで食べ物を切る
- Q6: 娯楽活動

#### 2. 症状 - 3 項目

- Q7: 痛み
- Q8: 特定動作時の痛み
- Q9: ピリピリ感やしびれ

#### 3. 社会機能 - 2 項目

- Q10: 社会活動への支障
- Q11: 仕事や日常活動の制限

## 信頼性・妥当性

### 信頼性

- **内的整合性**: Cronbach の α=0.9
- **テスト再テスト信頼性**: 高い
- **評定者間信頼性**: 該当なし (自己記入式)

### 妥当性

- **感度**: 高い
- **特異度**: 高い
- **その他**: 完全版 DASH との高い相関 (r>0.9)

## 得点化・解釈

### 基本得点

- QuickDASH スコア = ((Σ 項目得点 / n) - 1) × 25
- n: 回答した項目数 (最低 1 項目必要)
- 範囲: 0-100 点

### 障害度分類の目安

- **障害なし**: 0 点
- **軽度障害**: 1-25 点
- **中等度障害**: 26-50 点
- **重度障害**: 51 点以上

## 実施上の注意点

### 対象者

- 上肢障害を有する患者
- 肩・腕・手の機能障害が疑われる者

### 評価者

- 患者による自己記入
- 過去 1 週間の状態を評価

### 制限事項

- 最低 1 項目の回答が必要
- 11 項目中 10 項目以上の回答が推奨される
- 労働災害や手術前後の評価に適している

## 参考文献・URL

### 主要文献

- Beaton DE, Wright JG, Katz JN; Upper Extremity Collaborative Group. Development of the QuickDASH: comparison of three item-reduction approaches. J Bone Joint Surg Am. 2005;87(5):1038-1046.
- 原典論文: https://pubmed.ncbi.nlm.nih.gov/16643573/
- 引用数: 800 件以上

### 公式 URL

- https://dash.iwh.on.ca/about-quickdash

### 追加情報源

- https://www.sralab.org/rehabilitation-measures/quick-disabilities-arm-shoulder-hand
- 使用分野: 整形外科、リハビリテーション

## JSON 作成時の技術的注意点

### 数式設定

```javascript
項目合計 = Σ(Q1 - Q11の.index);
QuickDASHスコア = Math.round((項目合計 / 11 - 1) * 25 * 10) / 10;
障害度分類 =
  QuickDASHスコア == 0
    ? "障害なし"
    : QuickDASHスコア <= 25
    ? "軽度障害"
    : QuickDASHスコア <= 50
    ? "中等度障害"
    : "重度障害";
```

### 構造化

- 各質問項目は radio タイプで実装
- selectoridx を使用して 1-5 点を割り当て
- eval フィールドで合計点と QuickDASH スコアを自動計算
- スコアは小数点 1 桁まで表示
