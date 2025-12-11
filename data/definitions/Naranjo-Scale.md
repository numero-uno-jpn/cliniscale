# Naranjo Scale - 問診票作成情報まとめ

## 基本情報

### 著作権

Naranjo CA, Busto U, Sellers EM, Sandor P, Ruiz I, Roberts EA, Janecek E, Domecq C, Greenblatt DJ. A method for estimating the probability of adverse drug reactions. Clinical Pharmacology & Therapeutics. 1981;30(2):239-245.

### 尺度の概要

- **正式名称**: Naranjo Adverse Drug Reaction Probability Scale
- **日本語名**: Naranjo 副作用因果関係評価スケール
- **対象年齢**: 制限なし（すべての年齢）
- **評価目的**: 薬物と有害事象の因果関係評価
- **実施時間**: 10-15 分
- **回答者**: 医療従事者（医師、薬剤師等）

### 開発背景

- **開発者**: Naranjo CA, Busto U, Sellers EM 他
- **発行年**: 1981 年
- **理論的基盤**: Bradford-Hill 基準とファーマコビジランスの原則
- **標準化サンプル**: 臨床薬理学の専門家による検証済み

## 尺度構成

### 全体構造

- **総項目数**: 10 項目
- **サブスケール数**: なし（単一尺度）
- **評価方式**: 3 択選択式（はい/いいえ/不明・該当なし）

### 評価項目詳細

#### 1. 既往報告 - 問 1

- 過去の文献報告の存在確認

#### 2. 時間的関係 - 問 2

- 疑わしい薬剤投与後の有害事象発現の評価

#### 3. 脱感作 - 問 3

- 薬剤中止による症状改善の評価

#### 4. 再感作 - 問 4

- 薬剤再投与による症状再発現の評価

#### 5. 代替原因 - 問 5

- 薬剤以外の原因の可能性評価

#### 6. プラセボ反応 - 問 6

- プラセボ対照試験での反応評価

#### 7. 薬物濃度 - 問 7

- 血中薬物濃度の毒性レベル評価

#### 8. 用量依存性 - 問 8

- 用量と反応の関係性評価

#### 9. 既往歴 - 問 9

- 患者の過去の薬剤反応歴評価

#### 10. 客観的証拠 - 問 10

- 検査値等の客観的所見評価

## 信頼性・妥当性

### 信頼性

- **内的整合性**: 高い一致度を示す
- **テスト再テスト信頼性**: 高い再現性
- **評定者間信頼性**: 良好な一致度

### 妥当性

- **感度**: 高い検出能力
- **特異度**: 良好な識別能力
- **その他**: 臨床現場で広く検証済み

## 得点化・解釈

### 基本得点

各質問の回答に対してスコアを付与し、合計点を算出

### 因果関係の分類

- **確実**: 9 点以上
- **可能性大**: 5-8 点
- **可能性あり**: 1-4 点
- **疑わしい**: 0 点以下

## 実施上の注意点

### 対象者

- 薬物投与を受けたすべての患者
- 有害事象を経験した患者

### 評価者

- 薬理学の知識を有する医療従事者
- ADR 評価の経験がある専門家

### 制限事項

- 過量服用患者には適用除外
- 治療用量での投与が前提条件

## 参考文献・URL

### 主要文献

- Naranjo CA, et al. A method for estimating the probability of adverse drug reactions. Clin Pharmacol Ther. 1981;30(2):239-245
- Murayama H, et al. Improving the assessment of adverse drug reactions using the Naranjo Algorithm in daily practice. Pharmacol Res Perspect. 2018;6(2):e00373

### 公式URL

- https://www.evidencio.com/models/show/661
- https://www.ncbi.nlm.nih.gov/books/NBK548069/

### 追加情報源

- WHO-UMC 因果関係評価基準
- 各国薬事規制当局のガイドライン

## JSON作成時の技術的注意点

### 数式設定

- selectoridx でスコア値を設定
- eval タイプで合計スコア計算（[[Q1.index]] + [[Q2.index]] + ...）
- 3 項演算子で因果関係判定（スコア >= 9 ? '確実' : ...）

### 構造化

- 各質問を radio タイプで 3 択選択
- 必須項目として設定
- スコア計算と判定結果を分離して表示
