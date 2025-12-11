# CHA₂DS₂-VAScスコア - 問診票作成情報まとめ

## 基本情報

### 著作権
European Society of Cardiology (ESC)

### 尺度の概要
- **正式名称**: CHA₂DS₂-VASc Score (Congestive heart failure, Hypertension, Age ≥75 years, Diabetes mellitus, Stroke/TIA, Vascular disease, Age 65-74 years, Sex category)
- **日本語名**: CHA₂DS₂-VAScスコア
- **対象年齢**: 成人（主に18歳以上）
- **評価目的**: 非弁膜症性心房細動患者の血栓塞栓症（脳卒中）リスク評価
- **実施時間**: 5-10分
- **回答者**: 患者本人または医療従事者

### 開発背景
- **開発者**: Gregory Y.H. Lip, Robby Nieuwlaat, Ron Pisters, Deirdre A. Lane, Harry J. Crijns
- **発行年**: 2010年
- **理論的基盤**: 欧州心房細動調査データに基づく血栓塞栓症リスク因子分析
- **標準化サンプル**: Euro Heart Survey on Atrial Fibrillation（1,084例の検証コホート）

## 尺度構成

### 全体構造
- **総項目数**: 8項目
- **サブスケール数**: なし（単一スコア）
- **評価方式**: 各項目1-2点の配点、最大9点

### 評価項目詳細
#### 1. うっ血性心不全 - 1点
- 心不全の既往または現在の症状

#### 2. 高血圧 - 1点
- 高血圧の既往または現在治療中

#### 3. 年齢75歳以上 - 2点
- 75歳以上の高齢者

#### 4. 糖尿病 - 1点
- 糖尿病の既往または現在治療中

#### 5. 脳卒中・一過性脳虚血発作 - 2点
- 脳卒中またはTIAの既往

#### 6. 血管疾患 - 1点
- 心筋梗塞の既往、末梢動脈疾患、大動脈プラークなど

#### 7. 年齢65-74歳 - 1点
- 65-74歳の中高年者

#### 8. 性別（女性） - 1点
- 女性（ただし、65歳未満で他のリスク因子がない女性は除く）

## 信頼性・妥当性

### 信頼性
- **内的整合性**: 各項目が独立したリスク因子として確立
- **テスト再テスト信頼性**: 高い再現性
- **評定者間信頼性**: 客観的基準により高い一致率

### 妥当性
- **C統計量**: 0.606（CHADS2の0.572より改善）
- **純再分類改善**: 9.2%（低リスク群の正確な同定）
- **その他**: CHADS2スコアより優れた層別化能力

## 得点化・解釈

### 基本得点
- 各項目の該当有無に応じて1-2点を加算
- 合計0-9点で評価

### リスク分類の目安
- **低リスク**: 0点（男性）、1点（女性、ただし65歳未満で他のリスク因子がない場合のみ） - 年間脳卒中発症率 0-1.3%
- **中等度リスク**: 1点（男性） - 年間脳卒中発症率 0.8-2.1%
- **高リスク**: 2点以上 - 年間脳卒中発症率 2.2%以上

### 抗凝固療法適応
- **0点（男性）、1点（65歳未満で他のリスク因子がない女性）**: 一般的に抗凝固療法不要
- **1点（男性）**: 抗凝固療法を考慮
- **2点以上**: 抗凝固療法推奨

## 実施上の注意点

### 対象者
- 非弁膜症性心房細動患者
- 弁膜症性心房細動（リウマチ性、機械弁等）は対象外

### 評価者
- 医療従事者による評価が望ましい
- 患者の詳細な病歴聴取が必要

### 制限事項
- あくまで脳卒中リスクの予測ツール
- 出血リスクとの総合的判断が必要
- 個別の臨床状況を考慮した判断が重要
- 女性は一律に1点が加算されるが、65歳未満で他のリスク因子がない女性は低リスクとして扱われる
- 2024年のESCガイドラインでは、性別を除いたCHA₂DS₂-VAスコアの使用も提案されている

## 参考文献・URL

### 主要文献
- Lip GY, Nieuwlaat R, Pisters R, Lane DA, Crijns HJ. Refining clinical risk stratification for predicting stroke and thromboembolism in atrial fibrillation using a novel risk factor-based approach: the euro heart survey on atrial fibrillation. Chest. 2010;137(2):263-272.
- Camm AJ, et al. Guidelines for the management of atrial fibrillation: The Task Force for the Management of Atrial Fibrillation of the European Society of Cardiology (ESC). Eur Heart J. 2010;31(19):2369-429.

### 公式URL
- MDCalc: https://www.mdcalc.com/calc/801/cha2ds2-vasc-score-atrial-fibrillation-stroke-risk
- ESC Guidelines: https://www.escardio.org/Guidelines

### 追加情報源
- 日本循環器学会 不整脈薬物治療ガイドライン 2020年改訂版
- HOKUTO医療計算ツール: https://hokuto.app/calculator/ZtJsoey0PUxI9eA2PWlm

## JSON作成時の技術的注意点

### 数式設定
- 年齢による条件分岐: `((年齢)) >= 75 ? 2 : 0`、`((年齢)) >= 65 and ((年齢)) <= 74 ? 1 : 0`
- 性別判定: `{{性別}} == '女性' ? 1 : 0`
- 合計スコア計算: 各評価項目の合計

### 構造化
- 患者情報、既往歴・合併症、スコア計算の3セクションに分類
- warning（3点以上）、emergency（5点以上）で高リスク患者を識別
