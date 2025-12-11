# TIMI Risk Score for UA/NSTEMI - 作成情報まとめ

## 基本情報

### 著作権

原著論文: Antman EM, Cohen M, Bernink PJ, McCabe CH, Horacek T, Papuchis G, Mautner B, Corbalan R, Radley D, Braunwald E. The TIMI risk score for unstable angina/non-ST elevation MI: A method for prognostication and therapeutic decision making. JAMA. 2000;284(7):835-42. PMID: 10938172

### 尺度の概要

- **正式名称**: Thrombolysis In Myocardial Infarction Risk Score for Unstable Angina/Non-ST Elevation Myocardial Infarction (TIMI Risk Score for UA/NSTEMI)
- **日本語名**: TIMIリスクスコア
- **対象年齢**: 成人（急性冠症候群患者）
- **評価目的**: 非ST上昇型急性冠症候群患者における短期予後リスク評価
- **実施時間**: 5-10分
- **回答者**: 医療従事者（患者情報・検査結果を基に評価）

### 開発背景

- **開発者**: Elliott M. Antman, Marc Cohenら（ハーバード大学・ブリガムアンドウィメンズ病院）
- **発行年**: 2000年
- **理論的基盤**: TIMI 11B試験およびESSENCE試験のデータに基づく多変量解析
- **標準化サンプル**: 5,953例（TIMI 11B試験1,957例、ESSENCE試験1,564例、検証コホート2,432例）

## 尺度構成

### 全体構造

- **総項目数**: 7項目
- **サブスケール数**: なし（単一スケール）
- **評価方式**: 各項目0点または1点、合計0-7点

### 評価項目詳細

#### 1. 年齢 - 1項目

- 65歳以上で1点

#### 2. 冠危険因子 - 1項目

- 3つ以上の冠危険因子（家族歴、高血圧、高コレステロール血症、糖尿病、現喫煙）で1点

#### 3. 冠動脈狭窄の既往 - 1項目

- 既知の冠動脈有意狭窄（≧50%）で1点

#### 4. アスピリン使用歴 - 1項目

- 過去7日以内のアスピリン使用で1点

#### 5. 狭心症発作 - 1項目

- 過去24時間以内に2回以上の狭心症発作で1点

#### 6. 心電図所見 - 1項目

- 0.5mm以上のST偏位で1点

#### 7. 心筋バイオマーカー - 1項目

- CK-MBまたは心筋トロポニンの上昇で1点

## 信頼性・妥当性

### 信頼性

- **内的整合性**: C統計量0.65（複合エンドポイント）
- **テスト再テスト信頼性**: 報告なし
- **評定者間信頼性**: 客観的評価項目のため高い再現性

### 妥当性

- **予測的妥当性**: 14日後の複合エンドポイント（死亡、心筋梗塞、緊急血行再建）を有意に予測
- **外的妥当性**: 複数の大規模国際試験で検証済み
- **収束的妥当性**: 他のリスクスコア（GRACE、PURSUIT）との相関あり

## 得点化・解釈

### 基本得点

各項目該当時に1点を加算し、合計0-7点で評価

### リスク分類の目安

- **低リスク**: 0-2点（14日イベント率4.7-8%）
- **中リスク**: 3-4点（14日イベント率13-20%）
- **高リスク**: 5-7点（14日イベント率26-41%）

### 14日複合イベント発生率

TIMI公式サイトおよび原著論文に基づく:

- **0点**: 4.7%（原著では0-1点統合）
- **1点**: 5%
- **2点**: 8%
- **3点**: 13%
- **4点**: 20%
- **5点**: 26%
- **6-7点**: 41%

出典: https://timi.org/calculators/timi-risk-score-calculator-for-ua-nstemi/
原著: JAMA. 2000;284(7):835-42, Table 2

## 実施上の注意点

### 対象者

- 非ST上昇型急性冠症候群（UA/NSTEMI）が疑われる患者
- 来院時に迅速な評価が可能

### 評価者

- 循環器専門医、救急医、研修医
- 心電図読影と血液検査結果の解釈が必要

### 制限事項

- STEMI患者には適用不可（別のTIMI Risk Score for STEMIを使用）
- 線維素溶解療法適応患者のデータに基づく開発
- 他の急性冠症候群リスクスコア（GRACE等）との併用を推奨

## 参考文献・URL

### 主要文献

- Antman EM, et al. The TIMI risk score for unstable angina/non-ST elevation MI: A method for prognostication and therapeutic decision making. JAMA. 2000;284(7):835-42. PMID: 10938172
- 日本循環器学会. 急性冠症候群ガイドライン（2018年改訂版）

### 公式URL

- TIMI Study Group: https://www.timi.org/
- TIMI公式計算ツール: https://timi.org/calculators/timi-risk-score-calculator-for-ua-nstemi/
- MDCalc: https://www.mdcalc.com/calc/111/timi-risk-score-ua-nstemi

### 追加情報源

- 日本循環器学会ガイドライン: https://www.j-circ.or.jp/
- ナース専科（TIMIリスクスコア解説）: https://knowledge.nurse-senka.jp/500220

## JSON作成時の技術的注意点

### 数式設定

- 冠危険因子の合計計算: `[[家族歴.index]] + [[高血圧.index]] + [[高コレステロール血症.index]] + [[糖尿病.index]] + [[喫煙.index]]`
- 3つ以上の判定: `[[冠危険因子数]] >= 3 ? 1 : 0`
- 総スコア計算: 7項目の合計
- リスク分類: 三項演算子を用いた条件分岐
- イベント率: TIMI公式サイトの値に準拠（1点=5%, 2点=8%, 3点=13%, 4点=20%, 5点=26%, 6-7点=41%）
- 括弧内に空白挿入: eval式での`((`や`))`出現を避けるため、三項演算子の括弧は`( [[変数]] )`のように空白を入れる

### 構造化

- セクション分けによる論理的グループ化（患者情報、冠危険因子、薬剤使用歴、症状・検査所見、スコア計算）
- subsection使用: sectionではなくsubsectionを使用（dark modeでの視認性問題を回避）
- warning/emergencyのname設定: 必ずnameフィールドを設定（例: `"name": "Warning: 中リスク TIMIスコア ≥ 3"`）
- warning/emergencyタイプによる高リスク患者の視覚的識別
  - warning: TIMIスコア ≥ 3（中リスク以上）
  - emergency: TIMIスコア ≥ 5（高リスク）
