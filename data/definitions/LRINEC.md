# LRINEC Score 作成情報まとめ

## 基本情報

### 著作権

Wong CH, et al. The LRINEC (Laboratory Risk Indicator for Necrotizing Fasciitis) score: a tool for distinguishing necrotizing fasciitis from other soft tissue infections. Crit Care Med 2004;32:1535-41. PMID: 15241098

### 尺度の概要

- **正式名称**: Laboratory Risk Indicator for Necrotizing Fasciitis (LRINEC)
- **日本語名**: ライネックスコア、壊死性筋膜炎診断補助スコア
- **対象年齢**: 成人
- **評価目的**: 壊死性筋膜炎と他の軟部組織感染症の鑑別診断
- **実施時間**: 5 分程度
- **回答者**: 医師 (血液検査結果に基づき評価)

### 開発背景

- **開発者**: Chin-Ho Wong ら
- **発行年**: 2004 年
- **理論的基盤**: 壊死性筋膜炎患者と重症蜂窩織炎・膿瘍患者の血液検査データの比較分析
- **標準化サンプル**: 開発群 314 例 (NF 89 例、対照 225 例)、検証群 140 例 (NF 56 例、対照 84 例) (2004 年)

## 尺度構成

### 全体構造

- **総項目数**: 6 項目
- **サブスケール数**: なし (単一スコア)
- **評価方式**: 血液検査データによる点数化、0-13 点満点

### 評価項目詳細

#### 1. CRP (C-reactive protein)

- <150 mg/L: 0 点
- ≧150 mg/L: 4 点
- 注: 国際標準の mg/L 表記を使用 (15 mg/dL = 150 mg/L)

#### 2. 白血球数 (WBC)

- <15,000 /μL: 0 点
- 15,000-25,000 /μL: 1 点
- > 25,000 /μL: 2 点

#### 3. ヘモグロビン (Hb)

- > 13.5 g/dL: 0 点
- 11.0-13.5 g/dL: 1 点
- <11.0 g/dL: 2 点

#### 4. 血清ナトリウム (Na)

- ≧135 mEq/L: 0 点
- <135 mEq/L: 2 点

#### 5. 血清クレアチニン (Cr)

- ≦1.6 mg/dL: 0 点
- > 1.6 mg/dL: 2 点

#### 6. 血糖 (Glucose)

- ≦180 mg/dL: 0 点
- > 180 mg/dL: 1 点

## 信頼性・妥当性

### 信頼性

- **内的整合性**: 報告なし (血液検査データベースの診断ツール)
- **テスト再テスト信頼性**: 病態の進行により変化するため評価困難
- **評定者間信頼性**: 客観的検査値に基づくため高い

### 妥当性

- **感度**: 90% (開発群 89.9%、検証群 92.9%)
- **特異度**: 96-97%
- **陽性予測値**: 92%
- **陰性予測値**: 96%
- **その他**: ROC 曲線下面積 0.980 (開発群)、0.976 (検証群)

## 得点化・解釈

### 基本得点

各項目の点数を合計し、0-13 点で評価

### リスク分類の目安

- **低リスク**: ≦5 点 (<50%)
- **中等度リスク**: 6-7 点 (50-75%)
- **高リスク**: ≧8 点 (>75%)
- **診断基準**: ≧6 点で壊死性筋膜炎を疑う (原著)

## 実施上の注意点

### 対象者

- 重症軟部組織感染症が疑われる成人患者
- 血液検査が実施可能な患者

### 評価者

- 医師またはそれに準じる医療従事者
- 血液検査結果の解釈が可能な専門職

### 制限事項

- あくまで補助的診断ツール、臨床所見・画像所見との総合判断が必要
- 早期では血液検査値に変化が出ないことがある
- LRINEC スコア 0 点の壊死性筋膜炎例も報告されている
- 免疫不全患者では感度が低下する可能性
- 後続研究では原著より低い感度が報告されている (43-80%)
- スコア<6 でも約 10%に壊死性筋膜炎が存在する

## 参考文献・URL

### 主要文献

- Wong CH, et al. The LRINEC (Laboratory Risk Indicator for Necrotizing Fasciitis) score: a tool for distinguishing necrotizing fasciitis from other soft tissue infections. Crit Care Med 2004;32:1535-41. PMID: 15241098
- Hsiao CT, et al. Prospective Validation of the Laboratory Risk Indicator for Necrotizing Fasciitis (LRINEC) Score for Necrotizing Fasciitis of the Extremities. PLoS One 2020;15(1):e0227748. PMID: 31978094

### 公式URL

- PubMed 原著: https://pubmed.ncbi.nlm.nih.gov/15241098/
- PLOS ONE 検証研究: https://journals.plos.org/plosone/article?id=10.1371/journal.pone.0227748

### 追加情報源

- MDCalc: https://www.mdcalc.com/calc/1734/lrinec-score-necrotizing-soft-tissue-infection
- WikEM: https://wikem.org/wiki/LRINEC_score
- PMC 系統的レビュー: https://pmc.ncbi.nlm.nih.gov/articles/PMC5449710/

## JSON作成時の技術的注意点

### 数式設定

- 各項目の selectoridx で点数を設定
- 合計点数: 各項目の index を合計
- リスク分類: 三項演算子による条件分岐 (eval 式の(())に注意し空白挿入)
- 判定: 6 点以上で陽性判定

### 構造化

- 血液検査項目は単位を明記
- CRP: 国際標準の mg/L 表記 (説明追加推奨)
- inline 設定でラジオボタンを横並び表示
- warning (6 点以上) と emergency (8 点以上) で色分け表示
- warning/emergency 項目には必ず name 属性を設定
