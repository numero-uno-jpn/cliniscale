# Lekholm-Zarb 分類 作成情報まとめ

## 基本情報

### 著作権

原典論文は著作権保護対象ですが、分類システム自体は学術的に広く使用されている標準的評価法

### 尺度の概要

- **正式名称**: Lekholm & Zarb Bone Quality Classification
- **日本語名**: Lekholm-Zarb 分類、レクホルム・ザーブ分類
- **対象年齢**: 成人 (インプラント治療対象者)
- **評価目的**: インプラント治療における顎骨骨質の評価
- **実施時間**: 術中評価として数分
- **回答者**: 歯科医師 (インプラント専門医)

### 開発背景

- **開発者**: Ulf Lekholm, George A. Zarb
- **発行年**: 1985 年
- **理論的基盤**: ブローネマルクシステムのインプラント治療における骨質評価
- **標準化サンプル**: スウェーデンとカナダのインプラント症例

## 尺度構成

### 全体構造

- **総項目数**: 4 項目 (タイプ 1-4)
- **サブスケール数**: なし (単一分類システム)
- **評価方式**: 皮質骨と海綿骨の構成による 4 段階分類

### 骨質タイプ詳細

#### タイプ 1

- 原典表現: Entirely homogeneous compact bone
- 完全に均質な皮質骨で構成される
- 非常に硬い骨質、ほぼ完全に緻密な皮質骨
- 注意点: ドリリング時の過熱リスクあり
- 主な分布: 前歯部下顎 (稀)

#### タイプ 2

- 原典表現: Thick layer of compact bone surrounding a core of dense trabecular bone
- 厚い皮質骨層が密な海綿骨を取り囲む
- インプラント治療に理想的、良好な初期固定が期待できる
- 主な分布: 下顎に多い

#### タイプ 3

- 原典表現: Thin layer of cortical bone surrounding dense trabecular bone of favorable strength
- 薄い皮質骨層が密な海綿骨を取り囲む
- インプラント治療に適している、最も一般的な骨質タイプ
- 主な分布: 上顎前歯部、下顎

#### タイプ 4

- 原典表現: Thin layer of cortical bone surrounding a core of low-density trabecular bone
- 薄い皮質骨層が低密度の海綿骨を取り囲む
- 初期固定困難なリスクあり
- 主な分布: 上顎臼歯部に多い

## 信頼性・妥当性

### 信頼性

- **評価者間信頼性**: 主観的評価のため限定的 (中等度の一致度)
- **テスト再テスト信頼性**: 術者の経験に依存
- **内的整合性**: 単一項目評価のため非適用

### 妥当性

- **予測妥当性**: インプラント成功率との相関性確認済み
- **構成概念妥当性**: 骨密度・骨構造との関連性あり
- **臨床的妥当性**: 40 年以上の臨床使用実績
- **臨床成績**: タイプ 1 (97.6%)、タイプ 2 (96.2%)、タイプ 3 (96.5%)、タイプ 4 (88.8%) の成功率 (平均追跡期間 53.7 ヶ月)

## 得点化・解釈

### 基本得点

- タイプ 1: スコア 1 (最硬質)
- タイプ 2: スコア 2 (理想的)
- タイプ 3: スコア 3 (良好)
- タイプ 4: スコア 4 (軟質)

### インプラント適合性の目安

- **適合**: タイプ 2・3 (成功率 96%程度)
- **要注意**: タイプ 1 (過硬化リスク、成功率 97.6%)
- **高リスク**: タイプ 4 (初期固定困難、成功率 88.8%)

### 部位別分布傾向

- **前歯部下顎**: タイプ 1・2 が多い (最も緻密)
- **臼歯部下顎**: タイプ 2 が多い
- **前歯部上顎**: タイプ 3 が多い
- **臼歯部上顎**: タイプ 3・4 が多い (最も疎)

## 実施上の注意点

### 対象者

- インプラント治療を受ける成人患者
- 歯科用 CT またはパノラマ X 線撮影が可能な患者

### 評価者

- インプラント治療経験のある歯科医師
- 骨質評価の訓練を受けた歯科医師
- 術中の触覚的判定能力が重要

### 制限事項

- 主観的評価のため評価者間でばらつきあり
- 前歯部と臼歯部で骨質分布が異なる
- CT 値 (Hounsfield Units) との相関は限定的
- 近年、より客観的な定量評価法 (CT 値、骨密度測定) との併用が推奨される

## 参考文献・URL

### 主要文献

- Lekholm U, Zarb GA. Patient selection and preparation. In: Brånemark PI, Zarb GA, Albrektsson T, eds. Tissue Integrated Prostheses: Osseointegration in Clinical Dentistry. Quintessence Publishing 1985: 199-210
- 日本口腔インプラント学会: 口腔インプラント治療指針 2020
- Truhlar RS, et al. Distribution of bone quality in patients receiving endosseous dental implants. J Oral Maxillofac Surg. 1997;55(12 Suppl 5):38-45. PMID: 9393425

### 公式URL

- 日本口腔インプラント学会: https://www.shika-implant.org/
- クインテッセンス出版: https://www.quint-j.co.jp/

### 追加情報源

- インプラントの画像診断ガイドライン第 2 版 (日本歯科放射線学会)
- Carl Misch の CT 値による客観的骨質分類との比較研究
- Norton MR, Gamble C. Bone classification: an objective scale of bone density using the computerized tomography scan. Clin Oral Implants Res. 2001;12(1):79-84

## JSON作成時の技術的注意点

### 数式設定

- 骨質スコア: index で 1-4 の数値取得
- 適合性評価: 三項演算子による条件分岐で適合・要注意を判定
- リスク評価: タイプ 1・4 を高リスクとする条件式
- 成功率表示: 文献値に基づく予測値を表示

### 構造化

- subsection 使用: section ではなく subsection を使用 (dark mode 対策)
- text 型数値入力: scale 型は使いにくいため、text 型に inputmode 指定を推奨
- 全角括弧回避: 半角括弧またはハイフンを使用
- warning/emergency: 必ず name 属性を記載
- 評価部位・方法の事前選択項目を含む
- ドリリング感覚と初期固定評価の併用
- testrange を設定してランダムテスト時の値域を指定
- postfix で単位を明示
