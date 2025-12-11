# Strate Score 問診票作成情報まとめ

## 基本情報

### 著作権

この問診票定義は医学的評価スコアを基に作成されており、研究および臨床目的での使用を想定しています。

### 尺度の概要

- **正式名称**: Strate Score for Lower Gastrointestinal Bleeding (Clinical Prediction Rule for Severe Acute Lower Intestinal Bleeding)
- **日本語名**: Strate Score（下部消化管出血止血必要性予測スコア）
- **対象年齢**: 成人（18歳以上）
- **評価目的**: 下部消化管出血患者における重症出血と止血必要性の予測
- **実施時間**: 約3-5分
- **回答者**: 医師・医療従事者

### 開発背景

- **開発者**: Strate LL, Orav EJ, Syngal S
- **発行年**: 2003年（開発）、2005年（検証）
- **理論的基盤**: 下部消化管出血患者252例の臨床データ解析（後方視的研究）および275例での前向き検証
- **標準化サンプル**: 開発コホート252例（2003年）、検証コホート275例（2005年）

## 尺度構成

### 全体構造

- **総項目数**: 7項目
- **評価方式**: 各項目0-1点の二分法評価
- **スコア範囲**: 0-7点

### 評価項目詳細

#### 1. 血行動態指標 - 2項目

- 収縮期血圧≤115mmHg（1点）
- 心拍数≥100bpm（1点）

#### 2. 症状・病歴 - 2項目

- 失神の既往あり（1点）
- 来院後最初の4時間以内の直腸出血確認（1点）

#### 3. 身体所見 - 1項目

- 腹部圧痛なし（1点）

#### 4. 薬剤歴 - 1項目

- アスピリンの使用（1点）

#### 5. 併存疾患 - 1項目

- Charlson併存疾患指数≥2点（1点）

## 信頼性・妥当性

### 信頼性

- **内的整合性**: 複数の検証研究で確認済み
- **再現性**: 開発コホートと検証コホートで一貫した結果
- **AUROC**: 0.754（検証コホート）、0.761（開発コホート）

### 妥当性

- **重症出血予測**: 開発コホートと検証コホートで同等の予測精度
- **止血必要性予測**: 2022年システマティックレビュー・メタ解析でAUROC 0.82（95% CI, 0.79-0.85）
- **特異性**: Oakland、NOBLADS、BLEEDスコアとの比較で止血予測において最優秀
- **予測精度**: 内視鏡的止血、血管内治療、外科的止血の必要性を高精度で予測

## 得点化・解釈

### 基本得点

各項目該当時1点、非該当時0点。合計0-7点で評価。

### リスク層別化の目安

- **低リスク（0点）**: 重症出血リスク6-9%
- **中間リスク（1-3点）**: 重症出血リスク約43%
- **高リスク（4-7点）**: 重症出血リスク79-84%

## 実施上の注意点

### 対象者

- 下部消化管出血で受診した成人患者
- 上部消化管出血が除外された患者
- 直腸出血（血便）を呈する患者

### 評価者

- 消化器科医師
- 救急科医師
- 下部消化管出血の診療に関わる医療従事者
- Charlson併存疾患指数の評価に習熟していることが望ましい

### 制限事項

- 血液検査結果は不要だが、臨床的判断は必要
- Charlson併存疾患指数の正確な評価が必要
- 止血必要性の予測には優れているが、安全退院の予測にはOakland scoreの方が優れている
- 他のスコア（Oakland score等）との組み合わせ使用を推奨
- 上部消化管出血が約15%混在する可能性があり、除外が重要

## 参考文献・URL

### 主要文献

- Strate LL, Orav EJ, Syngal S. Early predictors of severity in acute lower intestinal tract bleeding. Arch Intern Med. 2003;163(7):838-843. doi:10.1001/archinte.163.7.838
- Strate LL, Saltzman JR, Ookubo R, Mutinga ML, Syngal S. Validation of a clinical prediction rule for severe acute lower intestinal bleeding. Am J Gastroenterol. 2005;100(8):1821-1827. doi:10.1111/j.1572-0241.2005.41755.x
- Almaghrabi M, Gandhi M, Guizzetti L, et al. Comparison of Risk Scores for Lower Gastrointestinal Bleeding: A Systematic Review and Meta-analysis. JAMA Netw Open. 2022;5(5):e2210604. doi:10.1001/jamanetworkopen.2022.10604

### 公式URL

- PubMed原著論文: https://pubmed.ncbi.nlm.nih.gov/16086720/
- システマティックレビュー: https://pubmed.ncbi.nlm.nih.gov/35622365/

### 追加情報源

- European Society of Gastrointestinal Endoscopy (ESGE) Guidelines
- American College of Gastroenterology (ACG) Guidelines on Lower GI Bleeding
- Strate LL, Gralnek IM. ACG Clinical Guideline: Management of Patients With Acute Lower Gastrointestinal Bleeding. Am J Gastroenterol. 2016;111(5):459-474.

## JSON作成時の技術的注意点

### 数式設定

- 合計スコア: 7項目のインデックス値の合計
- リスク分類: 三項演算子による層別化
- 括弧の扱い: evalフィールドの式内で`((`や`))`が出現する場合、空白を挿入して評価エラーを回避
- Warning/Emergency: 中間リスク（≥1点）でwarning、高リスク（≥4点）でemergency表示

### 構造化

- セクション分けによる項目の整理: `"type": "subsection"`を使用
- 各評価項目は0/1点の二分法で統一
- 結果表示は計算結果セクションに集約
- 血液検査項目は含めない（Strate scoreの特徴を維持）
- descriptionには各項目の配点基準を明記
- 腹部圧痛: 「なし」が1点であることに注意
