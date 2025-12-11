# ETDRS視力 作成情報まとめ

## 基本情報

### 著作権

Bailey-Lovieチャート: 1976年にIan Bailey、Jan E. Lovie-Kitchinにより開発
ETDRSチャート: 1982年にFrederick L. Ferris IIIらが臨床研究用に改良・標準化

### 尺度の概要

- **正式名称**: Early Treatment Diabetic Retinopathy Study Chart (ETDRS)
- **日本語名**: ETDRS視力表
- **対象年齢**: 制限なし(文字を読める年齢から)
- **評価目的**: 視力の精密測定、LogMAR値による標準化評価
- **実施時間**: 5-10分程度
- **回答者**: 検査技師または医師が測定、患者は視標読み取り

### 開発背景

- **開発者**: Ian Bailey、Jan E. Lovie-Kitchin (1976年: Bailey-Lovieチャート)、Frederick L. Ferris III、A. Kassoff、G.H. Bresnick、I. Bailey (1982年: ETDRS改良版)
- **発行年**: 1976年(Bailey-Lovieチャート)、1982年(ETDRS版)
- **理論的基盤**: 最小分離閾理論、対数的進行による視力評価
- **標準化サンプル**: 糖尿病網膜症研究における大規模臨床試験で確立

## 尺度構成

### 全体構造

- **総項目数**: 測定値は連続値(LogMAR -0.3から1.6)
- **サブスケール数**: なし(単一指標)
- **評価方式**: LogMAR値による対数的視力表記

### 測定詳細

#### 1. LogMAR値 - 連続値

- 0.0が標準視力(小数視力1.0相当)
- 正値は視力低下、負値は良好視力を示す
- 1文字あたり0.02LogMAR単位
- 1ライン(5文字)あたり0.1LogMAR単位
- Bailey-Lovieチャート: 14行×5文字=合計70文字

## 信頼性・妥当性

### 信頼性

- **内的整合性**: 該当なし(単一測定値)
- **テスト再テスト信頼性**: ±0.12 LogMAR
- **評定者間信頼性**: 高い一致性(Snellen表より優れる)

### 妥当性

- **感度**: 50%(0.1 LogMAR変化の検出)
- **特異度**: 95%以上(0.2 LogMAR以上の変化)
- **その他**: 小数視力との高い相関、実生活での視機能をより反映、0.2 LogMAR以上の変化で95%以上の感度・特異度

## 得点化・解釈

### 基本得点

- LogMAR値 = 読み取れた最良ライン値 - (0.02 × 正解文字数)
- 小数視力換算: 10^(-LogMAR値) = 0.1^LogMAR値

### 視力分類の目安

- **良好視力**: LogMAR < 0.0(小数視力 > 1.0)
- **正常視力**: LogMAR 0.0-0.3(小数視力0.5-1.0)
- **軽度視力低下**: LogMAR 0.3-0.5(小数視力0.3-0.5)
- **低視力**: LogMAR > 0.5(小数視力 < 0.3)
- **重度視力障害**: LogMAR > 1.3(WHO基準)

## 実施上の注意点

### 対象者

- 文字を読むことができる患者
- 眼疾患の経過観察、臨床研究対象者

### 評価者

- 視力検査の訓練を受けた検査技師または医師
- 標準化された測定条件の維持が重要

### 制限事項

- 日本では馴染みが薄く、小数視力表記が一般的
- 測定時間がSnellen表より長い
- 英語圏での開発のため、日本語環境での適用に課題

## 参考文献・URL

### 主要文献

- Bailey IL, Lovie JE. New Design Principles for visual acuity letter charts. Am J Optom Physiol Opt 1976; 53: 740-745 (PMID: 998716)
- Ferris FL, Kassoff A, Bresnick GH, Bailey I. New visual acuity charts for clinical research. Am J Ophthalmol 1982; 94: 91-96 (PMID: 7091289)
- Early Treatment Diabetic Retinopathy Study Research Group. Early Treatment Diabetic Retinopathy Study design and baseline patient characteristics. ETDRS report number 7. Ophthalmology 1991; 98: 741-756

### 公式URL

- Wikipedia LogMAR chart: https://en.wikipedia.org/wiki/LogMAR_chart
- 日本眼科学会ガイドライン: https://www.jos.or.jp/guideline/
- Precision Vision社公式サイト: https://precision-vision.com/

### 追加情報源

- ETDRSチャートの理論的背景に関する各種文献
- 視力換算表サイト

## JSON作成時の技術的注意点

### 数式設定

- LogMAR値から小数視力への換算: `Math.pow(0.1, LogMAR値).toFixed(2)`
- 数学的根拠: 10^(-x) = (1/10)^x = 0.1^x
- LogMAR値は小数値なので`((変数名))`を使用(浮動小数点数として処理)
- 小数点以下2桁で表示: `.toFixed(2)`
- 判定基準: LogMAR > 0.3で注意、> 0.5で要精査

### 構造化

- 右眼・左眼・両眼の個別測定記録
- 裸眼視力と矯正視力の両方を記録
- 文字数による精密評価オプション(最大70文字)
- 小数視力への自動換算機能(小数点以下2桁表示)
- warning/emergency項目にはname必須
- dark mode対策でsection使用を避けsubsection推奨
