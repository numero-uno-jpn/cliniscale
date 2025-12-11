# Framingham Risk Score 作成情報まとめ

## 基本情報

### 著作権

- **原典論文**: D'Agostino RB Sr, Vasan RS, Pencina MJ, et al. General cardiovascular risk profile for use in primary care: the Framingham Heart Study. Circulation. 2008;117(6):743-753.

### 尺度の概要

- **正式名称**: Framingham Risk Score (FRS)
- **日本語名**: フラミンガム・リスクスコア
- **対象年齢**: 30-74 歳
- **評価目的**: 10 年間の心血管疾患発症リスク評価
- **実施時間**: 5-10 分
- **回答者**: 本人

### 開発背景

- **開発者**: Framingham Heart Study 研究グループ
- **発行年**: 2008 年（更新版）
- **理論的基盤**: Framingham Heart Study 疫学調査データ
- **標準化サンプル**: 8,491 名、平均年齢 49 歳

## 尺度構成

### 全体構造

- **総項目数**: 8 項目
- **評価方式**: 数値入力および二択選択

### 項目群詳細

#### 1. 基本情報 - 2 項目

- 年齢（30-74 歳）
- 性別（男性/女性）

#### 2. 血液検査値 - 2 項目

- 総コレステロール値
- HDL コレステロール値

#### 3. バイタルサイン - 1 項目

- 収縮期血圧

#### 4. 治療・生活習慣 - 3 項目

- 高血圧治療の有無
- 喫煙状況
- 糖尿病診断の有無

## 信頼性・妥当性

### 信頼性

- **内的整合性**: C 統計量 = 0.763（男性）、0.793（女性）
- **テスト再テスト信頼性**: Nam-D'Agostino 検定で評価

### 妥当性

- **その他**: 対象疾患は冠動脈疾患、脳血管疾患、末梢動脈疾患、心不全、予測期間は 10 年間、欧米系・アフリカ系アメリカ人で検証済み

## 得点化・解釈

### 基本得点

- **Primary Model（実験室データ使用）**: 男性用計算式 Risk = 100 × (1 - 0.88936^(e^(ΣβX - 23.9802)))、女性用計算式 Risk = 100 × (1 - 0.95012^(e^(ΣβX - 26.1931)))
- **Non-Laboratory Model（BMI 使用）**: 男性用計算式 Risk = 100 × (1 - 0.88431^(e^(ΣβX - 23.9388)))、女性用計算式 Risk = 100 × (1 - 0.94833^(e^(ΣβX - 26.0145)))

### リスク分類の目安

- **低リスク**: 10%未満（10 年間で心血管疾患発症確率 10%未満）
- **中等度リスク**: 10-20%（予防的治療検討対象）
- **高リスク**: 20%以上（積極的予防治療推奨）

## 実施上の注意点

### 対象者

- 30-74 歳の成人
- 心血管疾患の既往がない者
- 血液検査データが利用可能な者

### 評価者

- 医療従事者または健康管理担当者
- 血圧測定および血液検査結果の解釈能力が必要

### 制限事項

- アジア系人種での過大評価の可能性
- 家族歴などの重要な危険因子を含まない
- 30 歳未満、75 歳以上では精度が低下
- **現在の状況**: 2023 年に PREVENT equations 発表 - American Heart Association 開発の最新リスク評価ツール、Framingham Heart Study 公式サイトでも PREVENT 使用を推奨、より新しいデータ（1992-2017 年）とより大規模なサンプル（650 万人以上）、心不全・腎機能（eGFR）・社会的決定要因を含む包括的評価
- **Framingham 2008 の現在の位置**: 歴史的価値があり現在も一部で使用継続、教育・研究目的での利用は有効、新規実装時は PREVENT equations との併用検討が推奨、2018 年以降 Framingham Heart Study は ASCVD Risk Calculator、2023 年以降は PREVENT 使用を推奨
- **利用上の判断指針**: 研究・教育目的は Framingham 2008 継続利用可、新規臨床導入は PREVENT equations 検討推奨、既存システムは段階的移行を検討

## 参考文献・URL

### 主要文献

- D'Agostino RB Sr, Vasan RS, Pencina MJ, et al. General cardiovascular risk profile for use in primary care: the Framingham Heart Study. Circulation. 2008;117(6):743-753.

### 公式URL

- **Framingham Heart Study 公式サイト**: https://www.framinghamheartstudy.org/
- **2008 年版リスク関数**: https://www.framinghamheartstudy.org/fhs-risk-functions/cardiovascular-disease-10-year-risk/
- **Canadian Cardiovascular Society 計算機**: https://ccs.ca/frs/

### 追加情報源

- PREVENT Calculator (2023 年推奨): https://professional.heart.org/en/guidelines-and-statements/prevent-calculator
- ASCVD Risk Calculator: https://tools.acc.org/ascvd-risk-estimator-plus/
- MDCalc Framingham Risk Score: https://www.mdcalc.com/calc/38/framingham-risk-score-hard-coronary-heart-disease

## JSON作成時の技術的注意点

### 数式設定

- 自然対数関数: `Math.log([[変数名]])`
- 性別による条件分岐: `{{性別}} == '男性' ? 男性式 : 女性式`
- べき乗計算: `Math.pow(0.88936, [[計算値]])`
- 指数関数: `Math.exp([[計算値]])`
- 括弧使用時の注意: `( [[変数]] )` のように空白を挿入

### 構造化

- 中間計算は `noreport: true` で非表示設定
- warning/emergency でリスク分類の視覚化（name, description 必須）
- 血圧治療の有無による係数切り替えを条件式で実装
- 年齢制限（30-74 歳）を計算式に組み込み
- **モデル選択**: Primary Model（実験室データ使用）は総コレステロール・HDL コレステロール使用でより正確だが検査が必要、Non-Laboratory Model（BMI 使用）は BMI を総コレステロール・HDL の代替として使用し検査不要だが精度は若干低下、実装時はどちらのモデルを使用するか明確に記載すること
