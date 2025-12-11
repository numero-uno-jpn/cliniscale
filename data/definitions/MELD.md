# MELD 3.0 作成情報まとめ

## 基本情報

### 著作権

本尺度は Mayo Clinic で開発され、現在は United Network for Organ Sharing (UNOS) により使用・管理されています。学術的・臨床的使用における著作権制限は特に設けられていません。2023 年版 MELD 3.0 は公的使用が推奨されています。

### 尺度の概要

- **正式名称**: Model for End-Stage Liver Disease 3.0 (MELD 3.0)
- **日本語名**: 末期肝疾患モデル 3.0
- **対象年齢**: 18 歳以上 (17 歳以下は PELD Creatinine を使用)
- **評価目的**: 末期肝疾患の重症度評価、肝移植優先度決定
- **実施時間**: 5-8 分
- **回答者**: 医療従事者 (血液検査データに基づく)

### 開発背景

- **開発者**: Patrick Kamath ら (Mayo Clinic 原版)、W. Ray Kim ら (MELD 3.0 改良)
- **発行年**: 2001 年 (原版)、2021 年 (MELD 3.0 発表)、2023 年 7 月 (UNOS 正式採用)
- **理論的基盤**: 客観的な血液検査値による予後予測、性別格差の是正
- **標準化サンプル**: 2016-2018 年 UNOS 肝移植待機リスト登録患者データ

## 尺度構成

### 全体構造

- **総項目数**: 7 項目 (血液検査値 5 項目 + 性別・透析歴 2 項目)
- **サブスケール数**: なし (単一スコア)
- **評価方式**: 連続変数による計算式 (相互作用項含む)

### 評価項目詳細

#### 血液検査値 - 5項目

- 総ビリルビン値 (mg/dL): 肝臓の代謝・排泄機能
- INR (国際標準化比): 肝臓の合成機能 (凝固因子産生)
- 血清クレアチニン値 (mg/dL): 腎機能 (肝腎症候群の評価)
- 血清アルブミン値 (g/dL): 栄養状態・合成機能 (MELD 3.0 で新規追加)
- 血清ナトリウム値 (mEq/L): 体液バランス・重症度

#### 患者特性 - 2項目

- 性別: 女性に対する補正 (MELD 3.0 で新規追加)
- 透析治療歴: 過去 7 日以内の透析実施の有無

## 信頼性・妥当性

### 信頼性

- **内的整合性**: 単一スコアのため該当なし
- **テスト再テスト信頼性**: 検査値の変動により経時的に変化
- **評定者間信頼性**: 客観的検査値のため高い再現性

### 妥当性

- **予後予測能**: C 統計量 0.869 (MELD-Na の 0.862 より向上)
- **性別格差改善**: 女性患者の移植アクセス改善を実証
- **死亡者再分類**: 8.8%の死亡者をより高い MELD 層に正しく再分類

## 得点化・解釈

### 基本得点

MELD 3.0 = 1.33×(Female) + 4.56×ln(総ビリルビン) + 0.82×(137-ナトリウム) - 0.24×(137-ナトリウム)×ln(総ビリルビン) + 9.09×ln(INR) + 11.14×ln(クレアチニン) + 1.85×(3.5-アルブミン) - 1.83×(3.5-アルブミン)×ln(クレアチニン) + 6

### 変数制限値

- ビリルビン、INR、クレアチニン: 最小値 1.0
- クレアチニン: 上限 3.0mg/dL (従来 4.0 から変更)
- アルブミン: 計算範囲 1.5-3.5g/dL
- ナトリウム: 計算範囲 125-137mEq/L
- Female: 女性=1、男性=0

### 重症度の目安

- **6-9 点**: 軽度の肝機能障害
- **10-14 点**: 軽度-中等度の肝機能障害
- **15-19 点**: 中等度の肝機能障害 (肝移植検討)
- **20-24 点**: 重篤な肝機能障害
- **25-29 点**: 非常に重篤な肝機能障害
- **30 点以上**: 移植緊急適応

### 3ヶ月死亡率推定

- **6-9 点**: 2%未満
- **10-14 点**: 2-5%
- **15-19 点**: 5-10%
- **20-24 点**: 10-25%
- **25-29 点**: 25-40%
- **30 点以上**: 40%以上

## 実施上の注意点

### 対象者

- 18 歳以上の末期肝疾患患者 (17 歳以下は PELD Creatinine 使用)
- 肝移植適応評価対象者
- 重篤な肝機能障害患者の予後評価

### 評価者

- 肝臓専門医または消化器内科医
- 血液検査データの解釈に習熟した医師
- MELD 3.0 の新しい計算方式に精通した医療従事者

### 制限事項

- 18 歳未満には適用不可 (PELD Creatinine 使用)
- アルブミン値が外部投与により一時的に上昇している場合は解釈に注意
- HCC 等では例外ポイントが適用される場合がある
- 各施設の検査値標準化が重要

## 参考文献・URL

### 主要文献

- Kim WR, Mannalithara A, Heimbach JK, et al. MELD 3.0: The Model for End-Stage Liver Disease Updated for the Modern Era. Gastroenterology. 2021;161:1887-95. PMC8608337
- Kamath PS, Wiesner RH, Malinchoc M, et al. A model to predict survival in patients with end-stage liver disease. Hepatology. 2001;33:464-70.
- Wiesner R, Edwards E, Freeman R, et al. Model for end-stage liver disease (MELD) and allocation of donor livers. Gastroenterology. 2003;124:91-6.

### 公式URL

- UNOS MELD 3.0 Calculator: https://optn.transplant.hrsa.gov/data/allocation-calculators/meld-calculator/
- UNOS Policy Updates: https://unos.org/news/improvements-to-meld-and-peld-now-in-effect/
- Mayo Clinic Calculator: https://www.mayoclinic.org/medical-professionals/transplant-medicine/calculators/meld-model/

### 追加情報源

- MDCalc MELD 3.0: https://www.hepatitisc.uw.edu/page/clinical-calculators/meld
- Stanford Medical Calculators: https://medcalculators.stanford.edu/meld

## JSON作成時の技術的注意点

### 数式設定

- 自然対数計算には Math.log()関数を使用
- MELD 3.0 公式の正確な実装が必須
- 変数制限値の適切な設定 (Math.max、Math.min の使用)
- 相互作用項の正確な実装
- 透析患者: クレアチニン値を 3.0 に固定 (4.0 から変更)
- スコア範囲: 6-40 の範囲で表示

### 構造化

- 性別フィールドの追加 (MELD 計算用)
- アルブミン値フィールドの追加 (必須)
- 年齢制限を 18 歳以上に変更
- 検査値入力は scale type を使用し、適切な範囲と単位を設定
- 計算過程は中間変数として設定し、noreport: true で非表示
- warning/emergency アラートに name、description を必須設定
- section タイプではなく subsection タイプを使用 (dark mode 対応)
- eval 式内の括弧使用時は空白を挿入してエラー回避
