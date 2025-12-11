# PNED Score - 問診票作成情報まとめ

## 基本情報

### 著作権

論文および学術的使用に基づき、評価スケール構造を再現

### 尺度の概要

- **正式名称**: Progetto Nazionale Emorragia Digestiva Score (PNED Score)
- **日本語名**: PNED Score (非静脈瘤性上部消化管出血死亡予測スコア)
- **対象年齢**: 成人(18 歳以上)
- **評価目的**: 非静脈瘤性上部消化管出血患者の 30 日死亡率予測
- **実施時間**: 3-5 分
- **回答者**: 医療従事者が患者情報を基に評価

### 開発背景

- **開発者**: Riccardo Marmo 他、イタリア PNED グループ
- **発行年**: 2010 年
- **理論的基盤**: 非静脈瘤性上部消化管出血の臨床因子分析
- **標準化サンプル**: 1,360 名の多施設前向き研究(2007-2008 年)

## 尺度構成

### 全体構造

- **総項目数**: 9 項目
- **サブスケール数**: なし
- **評価方式**: 重み付け点数制(0-23 点、原典研究では最大 10 点を観測)

### 項目群詳細

#### 1 点項目

- ASA3(米国麻酔科学会分類 3: 重度全身疾患)
- 来院時間 8 時間未満(症状発症から来院まで)

#### 2 点項目

- ヘモグロビン ≤7g/dL
- 年齢 ≥80 歳
- 慢性腎不全

#### 3 点項目

- ASA4 以上(米国麻酔科学会分類 4-5: 生命を脅かす重度全身疾患)
- 再出血(入院中)
- 悪性腫瘍(活動性)
- 肝硬変

#### 4 点項目

- 内視鏡治療の失敗

## 信頼性・妥当性

### 信頼性

- **内的整合性**: 良好(原典論文で検証済み)
- **外部検証**: メキシコ多施設研究で検証(AUROC 0.81)
- **評定者間信頼性**: 報告なし

### 妥当性

- **感度**: 高リスク群で高感度
- **特異度**: Rockall Score より優秀
- **その他**: AUC 0.81 (95%CI: 0.72-0.90)、Rockall Score と比較して有意に優秀 (p<0.001)

## 得点化・解釈

### 基本得点

各項目の該当する点数を合計(0-10 点)

### リスク分類の目安

- **低リスク**: 0-4 点 (30 日死亡率低)
- **中等度リスク**: 5-8 点 (30 日死亡率中等度)
- **高リスク**: 9 点以上 (30 日死亡率高、相対リスク 38.7)

### 臨床的意義

- **低リスク群**: 一般病棟での管理が可能
- **中等度リスク群**: 注意深いモニタリングが必要
- **高リスク群**: 集中治療室での管理を考慮すべき

## 実施上の注意点

### 対象者

- 非静脈瘤性上部消化管出血で入院した成人患者
- 内視鏡検査による診断確定例
- 静脈瘤出血には適用不可(別のスコアリングシステムを使用)

### 評価者

- 消化器内科医、救急医など臨床情報を把握できる医師
- 入院時情報で評価可能
- 内視鏡検査後の評価も含む

### 制限事項

- 静脈瘤出血には適用不可
- 外来患者での検証は限定的
- 日本人集団での大規模検証データなし(注意が必要)
- 個別の患者管理は総合的な臨床判断が必要

## 参考文献・URL

### 主要文献

- Marmo R, Koch M, Cipolletta L, et al. Predicting mortality in non-variceal upper gastrointestinal bleeders: validation of the Italian PNED Score and prospective comparison with the Rockall Score. Am J Gastroenterol. 2010 Jun;105(6):1284-91. PMID: 20051943
- Contreras-Omaña R, et al. The Progetto Nazionale Emorragia Digestiva (PNED) system vs. the Rockall score as mortality predictors in patients with nonvariceal upper gastrointestinal bleeding: A multicenter prospective study. Rev Gastroenterol Mex. 2017 Apr-Jun;82(2):123-128. PMID: 28283314

### 公式URL

- PubMed: https://pubmed.ncbi.nlm.nih.gov/20051943/

### 追加情報源

- PMC4753192: Upper gastrointestinal bleeding risk scores: Who, when and why?
- 消化器内視鏡学会ガイドライン
- 消化管出血診療ガイドライン各国版

## JSON作成時の技術的注意点

### 数式設定

- 各項目の条件判定に三項演算子を使用
- 合計点数計算は個別点数の加算式
- リスク分類は点数範囲による条件分岐(0-4 点: 低、5-8 点: 中、9-10 点: 高)
- ASA4 と ASA5 は同じ 3 点として計算

### 構造化

- ASA 分類は 5 段階選択肢で設定(ASA1-5)
- 数値入力項目(年齢、Hb)は text 型で inputmode 指定
- testrange 設定でランダムテスト用の適切な範囲を指定
- warning/emergency 機能で中等度・高リスクを視覚的に表示
- warning/emergency には必ず name 属性を設定
