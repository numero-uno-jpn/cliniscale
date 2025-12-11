# KCCQ 作成情報まとめ

## 基本情報

### 著作権

- **開発者**: John A. Spertus, MD, MPH (Saint Luke's Mid America Heart Institute)
- **著作権**: Copyright © 1996-2005 John Spertus, MD, MPH
- **利用許可**: 利用には適切なライセンス取得が必要 (https://www.cvoutcomes.org/)

### 尺度の概要

- **正式名称**: Kansas City Cardiomyopathy Questionnaire (KCCQ)
- **日本語名**: カンザスシティ心筋症質問票
- **対象年齢**: 成人
- **評価目的**: 心不全患者の症状、身体機能、社会機能、QOL の評価
- **実施時間**: 5-8 分
- **回答者**: 患者本人

### 開発背景

- **開発者**: John A. Spertus
- **発行年**: 2000 年
- **理論的基盤**: 心不全の症候学、身体機能制限、QOL 理論
- **標準化サンプル**: 複数の大規模臨床試験データ (数千例規模)

## 尺度構成

### 全体構造

- **総項目数**: 23 項目 (KCCQ-12 短縮版もあり)
- **サブスケール数**: 6 ドメイン + 2 サマリースコア
- **評価方式**: 4-7 段階リッカート尺度、想起期間 2 週間

### ドメイン詳細

#### 1. 身体制限ドメイン - 6 項目

- 日常生活動作の制限度評価
- 入浴、歩行、階段昇降、重労働など

#### 2. 症状頻度ドメイン - 4 項目

- むくみ、疲労、息切れの頻度
- 睡眠時の症状含む

#### 3. 症状重症度ドメイン - 3 項目

- 息切れ、疲労、むくみの重症度

#### 4. 症状安定性ドメイン - 1 項目

- 症状の変化評価

#### 5. QOL ドメイン - 3 項目

- 生活の楽しみ、満足度、症状による落胆

#### 6. 社会制限ドメイン - 4 項目

- 趣味、仕事、社会活動への影響

#### 7. 自己効力感ドメイン - 2 項目

- 症状管理の理解と自信

### サマリースコア

#### 1. 臨床サマリースコア (CSS)

- 身体制限 + 総症状スコアの平均

#### 2. 全体サマリースコア (OSS)

- 身体制限 + 総症状 + QOL + 社会制限の平均

## 信頼性・妥当性

### 信頼性

- **内的整合性**: クロンバック α 0.74-0.95 (ドメインにより異なる)
- **テスト再テスト信頼性**: ICC 0.65-0.88
- **評定者間信頼性**: 該当なし (自記式)

### 妥当性

- **構成概念妥当性**: NYHA 分類、SF-36 との適切な相関
- **判別妥当性**: NYHA 分類各段階で有意差
- **予測妥当性**: 死亡・入院リスクと関連

## 得点化・解釈

### 基本得点

- 各ドメイン・サマリースコア: 0-100 点
- 高得点ほど良好な健康状態を示す

### 重症度の目安

- **重度**: 0-25 点
- **中等度**: 26-50 点
- **軽度**: 51-75 点
- **良好**: 76-100 点

### 臨床的意義のある変化

- **小さな変化**: 5 点
- **中等度の変化**: 10 点
- **大きな変化**: 22 点 (改善時)、25 点 (悪化時)

## 実施上の注意点

### 対象者

- 症候性心不全患者 (NYHA II-IV 度相当)
- 慢性心不全の安定期・急性期両方で使用可能

### 評価者

- 患者による自記式回答
- 必要に応じて家族の補助可能

### 制限事項

- 認知機能障害がある場合は注意が必要
- 重篤な急性期では実施困難な場合あり

## 参考文献・URL

### 主要文献

- Green CP, et al. Development and evaluation of the Kansas City Cardiomyopathy Questionnaire. J Am Coll Cardiol. 2000;35:1245-55.
- Spertus JA, et al. Development and validation of a short version of the Kansas City cardiomyopathy questionnaire. Circ Cardiovasc Qual Outcomes. 2015;8:469-76.
- Watanabe-Fujinuma E, et al. Psychometric properties of the Japanese version of the Kansas City Cardiomyopathy Questionnaire. Health Qual Life Outcomes. 2020;18:228.

### 公式URL

- https://www.cvoutcomes.org/ (質問票取得・ライセンス情報)
- https://www.fda.gov/media/108301/download (FDA 認定文書)

### 追加情報源

- FDA Clinical Outcome Assessment Compendium
- 日本循環器学会ガイドライン
- 各種臨床試験データベース

## JSON作成時の技術的注意点

### 数式設定

- 各ドメインスコア: ((平均回答値-1)×25) の計算式
- 欠損値処理: 選択肢の最初の index を 1 として設定
- サマリースコア: 該当ドメインの平均値計算

### 構造化

- 質問をドメイン別にセクション分け
- 症状評価項目は頻度と重症度を分離
- スコア計算は患者には非表示 (noreport: true)
- 重症度判定に warning/emergency 機能活用
