# AIMS65 スコア作成情報まとめ

## 基本情報

### 著作権

原典論文：Saltzman JR, Tabak YP, Hyett BH, et al. A simple risk score accurately predicts in-hospital mortality, length of stay, and cost in acute upper GI bleeding. Gastrointest Endosc. 2011;74(6):1215-24.

### 尺度の概要

- **正式名称**: AIMS65 Score for Upper GI Bleeding Mortality
- **日本語名**: AIMS65 スコア
- **対象年齢**: 成人（18 歳以上）
- **評価目的**: 急性上部消化管出血患者の院内死亡リスク予測
- **実施時間**: 約 2-3 分
- **回答者**: 医療従事者（検査結果と身体所見に基づく評価）

### 開発背景

- **開発者**: John R. Saltzman et al.
- **発行年**: 2011 年
- **理論的基盤**: 29,222 例の急性上部消化管出血患者データからの統計学的解析
- **標準化サンプル**: 米国 187 病院から約 6 万例のデータで開発・検証（2004-2007 年）

## 尺度構成

### 全体構造

- **総項目数**: 5 項目
- **サブスケール数**: なし（単一スコア）
- **評価方式**: 各項目 0 点または 1 点、合計 0-5 点

### 構成要素詳細

#### 1. A (Albumin) - アルブミン値
- 血清アルブミン値 <3.0 g/dL (30 g/L) で 1 点

#### 2. I (INR) - 国際標準化比
- INR >1.5 で 1 点

#### 3. M (Mental status) - 精神状態
- 意識障害（GCS <14、見当識障害、傾眠、昏迷、昏睡）で 1 点

#### 4. S (Systolic blood pressure) - 収縮期血圧
- 収縮期血圧 ≤90 mmHg で 1 点

#### 5. 65 (Age) - 年齢
- 年齢 ≥65 歳で 1 点

## 信頼性・妥当性

### 信頼性

- **開発研究**: ROC 曲線下面積(AUC) 0.80 (95%CI: 0.78-0.81)
- **検証研究**: 複数の独立した研究で AUC 0.74-0.93 の範囲
- **国際比較**: ヨーロッパ、アジア各国での妥当性確認済み

### 妥当性

- **院内死亡率予測**: Glasgow-Blatchford スコアより優秀
- **ICU 入院必要性**: 優れた予測性能
- **輸血必要性**: Glasgow-Blatchford スコアが優秀

## 得点化・解釈

### 基本得点

各項目の該当有無を 1 点ずつ加算し、0-5 点で評価

### リスク分類の目安

- **低リスク**: 0-1 点（院内死亡率 0.3-1.2%）
- **高リスク**: 2 点以上（院内死亡率 5.3%以上）

### スコア別予測死亡率

- **0 点**: 0.3%
- **1 点**: 1.2%
- **2 点**: 5.3%
- **3 点**: 13.4%
- **4 点**: 24.5%
- **5 点**: 24.5%以上

## 実施上の注意点

### 対象者

- 急性上部消化管出血を呈する成人患者
- 救急外来受診から 12 時間以内での評価が推奨

### 評価者

- 血液検査結果と身体所見を評価できる医療従事者
- 内視鏡検査前の評価が可能

### 制限事項

- 院内死亡率予測に特化（再出血や内視鏡治療必要性の予測精度は限定的）
- 下部消化管出血には適用不可
- 静脈瘤出血例では予測精度が低下する可能性

## 参考文献・URL

### 主要文献

- Saltzman JR, Tabak YP, Hyett BH, et al. A simple risk score accurately predicts in-hospital mortality, length of stay, and cost in acute upper GI bleeding. Gastrointest Endosc. 2011;74(6):1215-24.
- Hyett BH, Abougergi MS, Charpentier JP, et al. The AIMS65 score compared with the Glasgow-Blatchford score in predicting outcomes in upper GI bleeding. Gastrointest Endosc. 2013;77(4):551-7.

### 公式URL

- PubMed 原典論文: https://pubmed.ncbi.nlm.nih.gov/21907980/
- HOKUTO 医学辞書: https://hokuto.app/calculator/Kfgie7lGB5a1uSrVLJE6

### 追加情報源

- PubMed 検索: "AIMS65 score upper gastrointestinal bleeding"
- 国際的検証研究: 韓国、カタール、エジプト等での妥当性確認済み

## JSON作成時の技術的注意点

### 数式設定

- 各項目のインデックス値（0 または 1）を加算
- リスク分類は 2 点以上で高リスク判定
- 予測死亡率は条件分岐による文字列表示

### 構造化

- 5 項目をラジオボタン形式で実装
- inline 表示による見やすい配置
- eval 要素による自動計算とリスク判定
