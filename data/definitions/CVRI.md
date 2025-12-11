# CVRI - 問診票作成情報まとめ

## 基本情報

### 著作権
原典論文: Dakik HA, Chehab O, Eldirani M, et al. A New Index for Pre-Operative Cardiovascular Evaluation. Journal of the American College of Cardiology. 2019;73(24):3067-3078. (PMID: 31221255, DOI: 10.1016/j.jacc.2019.04.023)

### 尺度の概要
- **正式名称**: Cardiovascular Risk Index (CVRI) / AUB-HAS2 Cardiovascular Risk Index
- **日本語名**: 心血管リスクインデックス
- **対象年齢**: 40 歳以上の非心臓手術患者
- **評価目的**: 非心臓手術後 30 日以内の心血管イベント(死亡・心筋梗塞・脳卒中)リスク予測
- **実施時間**: 3-5 分
- **回答者**: 患者本人または家族

### 開発背景
- **開発者**: Habib A. Dakik et al. (American University of Beirut Medical Center)
- **発行年**: 2019 年
- **理論的基盤**: 多変量ロジスティック回帰分析による予測モデル
- **標準化サンプル**: 誘導コホート 3,284 例(2016-2017)、検証コホート 1,167,414 例(2008-2012、ACS NSQIP データベース)

## 尺度構成

### 全体構造
- **総項目数**: 6 項目
- **サブスケール数**: なし(単一スコア)
- **評価方式**: 各項目 0-1 点の二分評価、合計 0-6 点

### 評価項目詳細
#### 1. 年齢 - 1項目
- 75 歳以上で 1 点

#### 2. 心疾患既往歴 - 1項目
- 任意の心疾患既往で 1 点

#### 3. 症状 - 1項目
- 日常活動での狭心症または呼吸困難症状で 1 点

#### 4. 血液検査 - 1項目
- ヘモグロビン値 12 g/dL 未満で 1 点
- **注意**: 原典論文では誤記で「mg/dL」となっているが、正しくは「g/dL」

#### 5. 血管手術 - 1項目
- 血管手術で 1 点

#### 6. 手術緊急度 - 1項目
- 緊急手術で 1 点

## 信頼性・妥当性

### 信頼性
- **内的整合性**: 報告なし(各項目独立性のため)
- **テスト再テスト信頼性**: 報告なし
- **評定者間信頼性**: 客観的指標のため不要

### 妥当性
- **判別能(AUC)**: 誘導コホート 0.90、検証コホート 0.82
- **他のツールとの比較**: RCRI (AUC 0.77)、ACS NSQIP (AUC 0.89)
- **その他**: RCRI と同等の簡便性で NSQIP と同等の判別能を持つ

## 得点化・解釈

### 基本得点
- 各リスク因子の有無を 0 点または 1 点で評価
- 合計点数は 0-6 点

### リスク分類の目安
- **低リスク**: 0-1 点 (0点=0.3%、1点=1.6%)
- **中等度リスク**: 2-3 点 (2点=5.6%、3点=11.0%)
- **高リスク**: 4 点以上 (17.5%以上)

### イベント率の詳細(検証コホート)
- 0 点: 0.3%
- 1 点: 1.6%
- 2 点: 5.6%
- 3 点: 11.0%
- 4 点以上: 17.5%以上

## 実施上の注意点

### 対象者
- 40 歳以上の非心臓手術予定患者
- 心臓手術患者は対象外

### 評価者
- 医師、看護師、または患者本人
- 客観的データに基づくため特別な訓練不要

### 制限事項
- 術後 30 日以内の短期リスク評価のみ
- 心臓手術には適用不可
- 地域・人種差による妥当性検証が必要な場合がある
- ヘモグロビン値の単位は g/dL であり、mg/dL は誤記

## 参考文献・URL

### 主要文献
- Dakik HA, Chehab O, Eldirani M, et al. A New Index for Pre-Operative Cardiovascular Evaluation. J Am Coll Cardiol. 2019;73(24):3067-3078. PMID: 31221255
- Dakik HA, Sbaity E, Msheik A, et al. AUB-HAS2 Cardiovascular Risk Index: Performance in Surgical Subpopulations and Comparison to the Revised Cardiac Risk Index. J Am Heart Assoc. 2020;9(2):e016228

### 公式URL
- Journal of the American College of Cardiology: https://www.jacc.org/doi/abs/10.1016/j.jacc.2019.04.023
- PubMed: https://pubmed.ncbi.nlm.nih.gov/31221255/

### 追加情報源
- American College of Cardiology 解説: https://www.acc.org/latest-in-cardiology/journal-scans/2019/06/17/15/50/a-new-index-for-preoperative-cardiovascular
- 2024 AHA/ACC ガイドライン: https://www.jacc.org/doi/10.1016/j.jacc.2024.06.013

## JSON作成時の技術的注意点

### 数式設定
- CVRI 合計: `[[年齢.index]] + [[心疾患既往.index]] + [[狭心症呼吸困難.index]] + [[ヘモグロビン.index]] + [[手術種類.index]] + [[手術緊急度.index]]`
- リスク分類: 三項演算子による条件分岐 `[[CVRI_合計]] <= 1 ? '低リスク' : ( [[CVRI_合計]] <= 3 ? '中等度リスク' : '高リスク' )`
- イベント率: スコア別の予測確率表示(検証コホートデータに基づく)

### 構造化
- 各項目は二分選択(0 点/1 点)
- section ではなく subsection を使用(dark mode での視認性確保)
- warning 機能で 2 点以上を注意表示
- emergency 機能で 4 点以上を緊急表示
- warning/emergency には必ず name フィールドを設定
