# AUDIT問診票作成情報まとめ

## 基本情報

### 著作権

- 原典論文: Saunders JB, Aasland OG, Babor TF, et al. Development of the Alcohol Use Disorders Identification Test (AUDIT): WHO Collaborative Project on Early Detection of Persons with Harmful Alcohol Consumption--II. Addiction. 1993;88(6):791-804.
- WHO公式マニュアル: AUDIT: the alcohol use disorders identification test : guidelines for use in primary health care, 2nd ed. (2001)
- 日本語翻訳版: 廣尚典訳 WHO/AUDIT (問題飲酒標準テスト/日本語版) 千葉テストセンター, 2000

### 尺度の概要

- **正式名称**: Alcohol Use Disorders Identification Test (AUDIT)
- **日本語名**: アルコール使用障害同定テスト
- **対象年齢**: 成人
- **評価目的**: 有害なアルコール使用、アルコール使用障害のスクリーニング
- **実施時間**: 2-5分
- **回答者**: 本人

### 開発背景

- **開発者**: WHO国際共同研究チーム (John B. Saunders, Olav G. Aasland, Thomas F. Babor他)
- **発行年**: 1993年
- **理論的基盤**: WHO多国間共同研究 (6カ国: ノルウェー、オーストラリア、ケニア、ブルガリア、メキシコ、アメリカ)
- **標準化サンプル**: 1888名 (プライマリヘルスケア施設受診者)

## 尺度構成

### 全体構造

- **総項目数**: 10項目
- **サブスケール数**: 3領域
- **評価方式**: 各項目0-4点の5段階評価 (項目9、10は0,2,4点の3段階)

### サブスケール詳細

#### 1. 飲酒量・頻度 - 3項目
- 飲酒頻度
- 1日あたりの飲酒量
- 多量飲酒の頻度

#### 2. 飲酒行動・依存症状 - 5項目
- 飲酒制御の困難
- 社会的義務の履行困難
- 迎え酒の必要性
- 罪悪感・後悔
- 記憶障害

#### 3. アルコール関連問題 - 2項目
- 飲酒による外傷
- 周囲からの心配・助言

## 信頼性・妥当性

### 信頼性

- **内的整合性**: クロンバックα = 0.80-0.90
- **テスト再テスト信頼性**: r = 0.86
- **評定者間信頼性**: 良好 (面接版)

### 妥当性

- **感度**: 92% (カットオフ8点、有害飲酒検出)
- **特異度**: 94% (カットオフ8点、非有害飲酒者の除外)
- **その他**: 多国間での妥当性確認済み、性別・年齢・人種間での一貫性

## 得点化・解釈

### 基本得点

- 各項目の得点を合計 (最大40点)
- 項目1-8: 0-4点 (5段階)
- 項目9-10: 0, 2, 4点 (3段階)

### リスク分類の目安

- **低リスク (0-7点)**: 危険の少ない飲酒
- **中等度リスク (8-14点)**: 危険の高い飲酒、簡易介入の適応
- **高リスク (15-40点)**: アルコール依存症の疑い、専門医療への紹介

## 実施上の注意点

### 対象者

- 成人 (18歳以上)
- プライマリヘルスケア受診者
- 一般住民のスクリーニング

### 評価者

- 医療従事者による面接版
- 自記式版も利用可能
- 適切な指導があれば一般市民も使用可能

### 制限事項

- あくまでスクリーニングツール、診断ツールではない
- 正直な回答が前提
- 文化的背景の考慮が必要

## 参考文献・URL

### 主要文献

- Saunders JB, et al. Development of the Alcohol Use Disorders Identification Test (AUDIT): WHO Collaborative Project on Early Detection of Persons with Harmful Alcohol Consumption--II. Addiction. 1993;88(6):791-804.
- WHO. AUDIT: the alcohol use disorders identification test : guidelines for use in primary health care, 2nd ed. 2001.

### 公式URL

- WHO公式サイト: https://www.who.int/publications/i/item/WHO-MSD-MSB-01.6a
- AUDIT専用サイト: https://auditscreen.org/
- NIDA版PDF: https://nida.nih.gov/sites/default/files/files/AUDIT.pdf

### 追加情報源

- 久里浜医療センター: https://kurihama.hosp.go.jp/hospital/screening/audit.html
- 厚生労働省 e-ヘルスネット: https://www.e-healthnet.mhlw.go.jp/information/dictionary/alcohol/ya-021.html
- ASK (アルコール薬物問題全国市民協会): https://www.ask.or.jp/article/6022

## JSON作成時の技術的注意点

### 数式設定

- 合計点: `[[q1]] + [[q2]] + [[q3]] + [[q4]] + [[q5]] + [[q6]] + [[q7]] + [[q8]] + [[q9]] + [[q10]]`
- リスク分類: `[[audit_total]] < 8 ? "低リスク" : [[audit_total]] < 15 ? "中等度リスク" : "高リスク"`

### 構造化

- 項目1で「飲まない」を選択した場合、項目2-3は非表示 (parentname/parentsel使用)
- 項目9-10は特殊な配点 (0,2,4点) のためselectoridxで調整
- evalフィールドでdispnameを未定義にして患者画面非表示
- 1ドリンク = 純アルコール10gの説明をdescriptionに記載
