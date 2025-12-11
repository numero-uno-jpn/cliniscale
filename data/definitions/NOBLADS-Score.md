# NOBLADS スコア - 問診票作成情報まとめ

## 基本情報

### 著作権

NOBLADS スコアは学術論文として公開されており、臨床評価目的での利用は一般的に許可されています。商用利用の場合は原著者への確認が推奨されます。

### 尺度の概要

- **正式名称**: NOBLADS Score (Non-steroidal anti-inflammatory drugs use, No diarrhea, No abdominal tenderness, Blood pressure ≤ 100 mmHg, Antiplatelet drugs use, aLbumin < 3.0 g/dL, Disease score ≥ 2, and Syncope)
- **日本語名**: NOBLADS スコア
- **対象年齢**: 成人（16 歳以上）
- **評価目的**: 下部消化管出血の重症化リスク予測
- **実施時間**: 5-10 分
- **回答者**: 医療従事者（患者情報に基づく）

### 開発背景

- **開発者**: Aoki T, Nagata N, et al.
- **発行年**: 2016 年
- **理論的基盤**: 多変量ロジスティック回帰分析による重症化予測因子の特定
- **標準化サンプル**: derivation cohort 439 例、validation cohort 161 例（2009-2015 年、日本）

## 尺度構成

### 全体構造

- **総項目数**: 8 項目（+ Charlson Comorbidity Index）
- **サブスケール数**: なし（単一スコア）
- **評価方式**: 二値選択（あり/なし）、各項目 1 点

### 8 項目詳細

#### 1. NSAIDs 使用

- 非ステロイド性抗炎症薬の服用歴
- アスピリン、イブプロフェン、ロキソニンなど
- 配点: 1 点

#### 2. 下痢なし

- 1 日 3 回以下の排便（下痢の否定が得点）
- 配点: 1 点

#### 3. 腹部圧痛なし

- 腹部の圧痛所見の否定（圧痛なしが得点）
- 配点: 1 点

#### 4. 収縮期血圧 ≤100mmHg

- 血圧低下の評価
- 配点: 1 点

#### 5. 抗血小板薬使用

- アスピリン以外の抗血小板薬服用
- クロピドグレル、チクロピジン、シロスタゾールなど
- 配点: 1 点

#### 6. アルブミン <3.0g/dL

- 低アルブミン血症の評価
- 配点: 1 点

#### 7. Charlson Comorbidity Index ≥2

- 併存疾患による予後予測スコア
- 17 の併存疾患を評価し、重み付けして合計
- 配点: 1 点（合計 2 点以上の場合）

#### 8. 失神

- 意識消失エピソードの有無
- 配点: 1 点

### Charlson Comorbidity Index 詳細

#### 重み付け体系

- **1 点**: 心筋梗塞、心不全、末梢血管疾患、脳血管疾患、認知症、慢性肺疾患、結合組織疾患、消化性潰瘍、軽度肝疾患、糖尿病（合併症なし）
- **2 点**: 片麻痺、中等度～重度腎疾患、糖尿病（臓器障害あり）、悪性腫瘍（転移なし）、白血病、リンパ腫
- **3 点**: 中等度～重度肝疾患
- **6 点**: 転移性悪性腫瘍、AIDS

#### NOBLADS での使用

Charlson Comorbidity Index の合計が 2 点以上の場合、NOBLADS スコアに 1 点加算

出典: Charlson ME, et al. J Chronic Dis. 1987;40(5):373-83

## 信頼性・妥当性

### 信頼性

- **内的整合性**: 記載なし
- **テスト再テスト信頼性**: 記載なし
- **評定者間信頼性**: 記載なし

### 妥当性

- **AUC (Derivation cohort)**: 0.77 (95% CI: 未記載)
- **AUC (Internal validation)**: 0.76 (95% CI: 未記載)
- **AUC (External validation)**: 0.74 (95% CI: 0.70-0.78)
- **その他**: Hosmer-Lemeshow test p = 0.087（良好なキャリブレーション）

## 得点化・解釈

### 基本得点

各項目該当時 1 点、合計 0-8 点で算出

### 重症化リスクの目安

- **低リスク**: 0-1 点
- **中リスク**: 2-3 点
- **高リスク**: 4-8 点（重症化予測のカットオフ値）

### 重症化の定義

以下のいずれかに該当:
- 最初の 24 時間の持続出血（輸血 ≥2 単位 または Ht 低下 ≥20%）
- 大腸内視鏡後の再出血（追加輸血 または Ht 低下 ≥20%）

### スコア別の重症化率

- **0 点**: 0% (0/11)
- **1 点**: 9.7% (3/31)
- **2 点**: 27.2% (37/136)
- **3 点**: 39.3% (57/145)
- **4 点**: 59.9% (85/142)
- **5 点以上**: 93.5% (43/46)

### 二次アウトカム

- **輸血必要性**: 高スコアで高率（5 点以上で 87.0%）
- **入院期間**: スコアとの相関あり
- **院内死亡率**: 5 点以上で 6.5%、5 点未満で 0.2%（p < 0.001）

## 実施上の注意点

### 対象者

- 急性下部消化管出血で入院した成人患者
- 外来発症の患者（入院中発症は検証されていない）

### 評価者

- 医師または医療従事者
- 患者の臨床情報と検査データが必要
- 来院後 2 時間以内に評価可能

### 制限事項

- 上部消化管出血には適用不可
- 慢性出血には適用されない
- 16 歳未満の小児では検証されていない
- 大腸内視鏡を実施しない患者での妥当性は不明
- 救急外来から直接帰宅する患者での妥当性は不明

## 参考文献・URL

### 主要文献

- Aoki T, Nagata N, Shimbo T, Niikura R, Sakurai T, Moriyasu S, et al. Development and Validation of a Risk Scoring System for Severe Acute Lower Gastrointestinal Bleeding. Clin Gastroenterol Hepatol. 2016 Nov;14(11):1562-1570.e2. PMID: 27311620. DOI: 10.1016/j.cgh.2016.05.042
- Aoki T, Yamada A, Nagata N, Niikura R, Hirata Y, Koike K. External validation of the NOBLADS score, a risk scoring system for severe acute lower gastrointestinal bleeding. PLoS One. 2018 Apr 26;13(4):e0196514. PMID: 29698506. DOI: 10.1371/journal.pone.0196514
- Charlson ME, Pompei P, Ales KL, MacKenzie CR. A new method of classifying prognostic comorbidity in longitudinal studies: development and validation. J Chronic Dis. 1987;40(5):373-83. PMID: 3558716
- Strate LL, Gralnek IM. ACG Clinical Guideline: Management of Patients With Acute Lower Gastrointestinal Bleeding. Am J Gastroenterol. 2016;111(4):459-74. PMID: 26925883

### 公式URL

- PubMed 原典: https://pubmed.ncbi.nlm.nih.gov/27311620/
- PubMed 外部検証: https://pubmed.ncbi.nlm.nih.gov/29698506/
- HOKUTO: https://hokuto.app/calculator/qTWy8WH56tTAEsqQ5ry2

### 追加情報源

- なし

## JSON作成時の技術的注意点

### 数式設定

- **Charlson Comorbidity Index**: 各併存疾患の重み付け点数（1/2/3/6 点）を合計
- **「なし」が得点となる項目**: 下痢症状と腹部圧痛は「なし」選択時に 1 点
  - 計算式で `[[field.index]] == 0 ? 1 : 0` のように反転処理
- **血圧・アルブミン値**: 数値入力からの条件判定（text 型推奨）
- **最終スコア**: 8 項目の単純合計

### 構造化

- 併存疾患は個別の radio フィールドで構成し、selectoridx で重み付け（1/2/3/6 点）
- 中間計算は eval フィールドで段階的にスコア計算（noreport: true で非表示）
- warning 項目は name 属性を必ず設定（例: "Warning: 高リスク NOBLADS スコア ≧ 4"）
- 血圧・アルブミン値は text 型を使用（inputmode: "numeric" または "decimal"）
- subsection 使用（section ではなく subsection を使用、dark mode 対応）
- selector/selectoridx は選択肢の順序とインデックスを一致させる
- 逆転処理が必要な場合は計算式で処理（例: 下痢なし、圧痛なし）
