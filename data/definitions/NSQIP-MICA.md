# NSQIP-MICA - 問診票作成情報まとめ

## 基本情報

### 著作権

原論文: Gupta PK, Gupta H, Sundaram A, et al. Development and validation of a risk calculator for prediction of cardiac risk after surgery. Circulation. 2011;124(4):381-7. PMID: 21730309 DOI: 10.1161/CIRCULATIONAHA.110.015701

### 尺度の概要

- **正式名称**: National Surgical Quality Improvement Program Myocardial Infarction and Cardiac Arrest (NSQIP-MICA)
- **別名**: Gupta Perioperative Risk Calculator
- **対象年齢**: 成人（18 歳以上）
- **評価目的**: 非心臓手術後 30 日以内の心筋梗塞または心停止リスク予測
- **実施時間**: 約 3-5 分
- **回答者**: 医療従事者が患者情報を基に入力

### 開発背景

- **開発者**: Prateek K. Gupta et al.
- **発行年**: 2011 年
- **理論的基盤**: American College of Surgeons National Surgical Quality Improvement Program (ACS NSQIP) データベース
- **標準化サンプル**: 開発コホート 211,410 例（2007 年）、検証コホート 257,385 例（2008 年）、参加施設 250 施設以上、イベント発生率 0.65% (1,371/211,410 例)

## 尺度構成

### 全体構造

- **総項目数**: 5 項目
- **サブスケール数**: なし（単一スコア）
- **評価方式**: 線形予測子による確率計算（ロジスティック回帰モデル）

### 評価項目詳細

#### 1. 年齢

- 連続変数として評価
- 係数: 0.02

#### 2. 機能的状態

- 完全に自立: 0 点
- 部分的に依存: 0.65 点
- 完全に依存: 1.03 点

#### 3. ASA 分類（米国麻酔科学会身体状態分類）

- ASA 1（健康）: -5.17 点
- ASA 2（軽度の全身疾患）: -3.29 点
- ASA 3（重篤な全身疾患）: -1.92 点
- ASA 4（生命に関わる重篤な全身疾患）: -0.95 点
- ASA 5（手術なしでは生存困難）: 0 点

#### 4. クレアチニン値

- 正常（≤1.5 mg/dL）: 0 点
- 異常（>1.5 mg/dL）: 0.61 点

#### 5. 手術の種類

- 21 種類の手術カテゴリーそれぞれに異なる係数
- 最高リスク: 大動脈手術（1.6 点）
- 最低リスク: 乳腺外科（-1.61 点）
- 参照カテゴリー: ヘルニア手術（0 点）

## 信頼性・妥当性

### 信頼性

- **内的整合性**: 報告なし（リスク予測モデルのため該当せず）
- **テスト再テスト信頼性**: 報告なし
- **評定者間信頼性**: 報告なし

### 妥当性

- **判別能力**: C 統計量 0.884（2007 年開発データセット）、C 統計量 0.874（2008 年検証データセット）
- **比較性**: Revised Cardiac Risk Index（C 統計量 0.747）を大幅に上回る
- **その他**: Hosmer-Lemeshow 適合度検定で良好な校正性能を示す

## 得点化・解釈

### 基本得点

線形予測子: X = 年齢 ×0.02 + 機能的状態スコア + ASA スコア + クレアチニンスコア + 手術タイプスコア - 5.25

MICA リスク(%) = e^X / (1 + e^X) × 100

### リスク分類の目安

- **<0.05%**: 低リスク（<25 パーセンタイル）
- **0.05-0.14%**: 低リスク（25-50 パーセンタイル）
- **0.14-1.47%**: 中等度リスク（50-90 パーセンタイル）
- **1.47-2.60%**: 高リスク（90-95 パーセンタイル）
- **2.60-7.69%**: 高リスク（95-99 パーセンタイル）
- **>7.69%**: 最高リスク（>99 パーセンタイル）

### 臨床的判断基準

- **1%以上**: 追加の心血管評価が推奨される
- **2.60%以上（高リスク患者）**: 術後心電図モニタリング、心エコー、心臓専門医コンサルテーションを考慮

## 実施上の注意点

### 対象者

- 非心臓手術を受ける成人患者
- 術前評価の一部として使用

### 評価者

- 医師または医療従事者
- 患者の医学的情報へのアクセスが必要

### 制限事項

- 心臓手術には適用されない
- 術前ストレステスト、心エコー、不整脈、大動脈弁疾患の情報は含まれない
- 既知の冠動脈疾患の詳細な情報は限定的
- 遠隔期の冠動脈疾患既往（PCI・心臓手術以外）は多変量解析で制御されていない

## 参考文献・URL

### 主要文献

- Gupta PK, Gupta H, Sundaram A, et al. Development and validation of a risk calculator for prediction of cardiac risk after surgery. Circulation. 2011;124(4):381-7. PMID: 21730309
- 2014 ACC/AHA Guideline on Perioperative Cardiovascular Evaluation
- 2022 ESC Guidelines on cardiovascular assessment and management of patients undergoing non-cardiac surgery

### 公式URL

- American College of Surgeons NSQIP Risk Calculator: https://riskcalculator.facs.org/

### 追加情報源

- MDCalc: https://www.mdcalc.com/calc/4038/gupta-perioperative-risk-myocardial-infarction-cardiac-arrest-mica

## JSON作成時の技術的注意点

### 数式設定

- 複雑な条件分岐を用いた手術タイプスコアの計算
- Math.exp()関数を使用したロジスティック回帰の実装
- 中間計算値を noreport: true で非表示化
- eval 式内の二重括弧に空白挿入してエラー回避（例: `( ((変数)) )`）

### 構造化

- 入力項目を論理的順序で配置
- 年齢入力は text タイプ + inputmode: "numeric" + testrange 指定を使用（scale は避ける）
- 計算過程を段階的に分割して可読性を向上
- warning/emergency タイプに name 属性を必ず追加
- warning と emergency タイプを用いたリスク階層化の可視化
