# CHADS2スコア - 問診票作成情報まとめ

## 基本情報

### 著作権
原典論文: Gage BF, Waterman AD, Shannon W, Boechler M, Rich MW, Radford MJ. Validation of clinical classification schemes for predicting stroke: results from the National Registry of Atrial Fibrillation. JAMA 2001;285(22):2864-70.

### 尺度の概要
- **正式名称**: CHADS2 Score
- **日本語名**: CHADS2スコア
- **対象年齢**: 成人（心房細動患者）
- **評価目的**: 非弁膜症性心房細動患者の脳梗塞発症リスク評価
- **実施時間**: 約2-3分
- **回答者**: 患者本人または医療従事者

### 開発背景
- **開発者**: Gage BF, et al.
- **発行年**: 2001年
- **理論的基盤**: 全米心房細動登録データに基づく危険因子分析
- **標準化サンプル**: 全米心房細動登録データベース

## 尺度構成

### 全体構造
- **総項目数**: 5項目
- **サブスケール数**: なし（単一スケール）
- **評価方式**: 各項目1-2点、合計0-6点

### 評価項目詳細
#### 1. うっ血性心不全 - 1点
- Congestive heart failure

#### 2. 高血圧 - 1点
- Hypertension

#### 3. 75歳以上 - 1点
- Age ≥75

#### 4. 糖尿病 - 1点
- Diabetes mellitus

#### 5. 脳卒中・一過性脳虚血発作既往 - 2点
- Stroke/TIA

## 信頼性・妥当性

### 信頼性
- **内的整合性**: 該当なし（リスクファクターの総和のため）
- **テスト再テスト信頼性**: 該当なし
- **評定者間信頼性**: 高い（客観的評価項目のため）

### 妥当性
- **予測精度**: C統計量 約0.64-0.68
- **年間脳梗塞発症率との相関**: 高い相関を示す
- **その他**: 簡便性と実用性で広く検証済み

## 得点化・解釈

### 基本得点
- 各危険因子の点数を合計（0-6点）

### リスク分類の目安
- **低リスク**: 0点（年間脳梗塞発症率1.9%）
- **中等度リスク**: 1点（年間脳梗塞発症率2.8%）
- **高リスク**: 2点以上（年間脳梗塞発症率4.0%以上）

### 治療推奨
- **1点以上**: DOAC推奨、ワルファリン考慮可
- **0点**: その他のリスク因子を評価して抗凝固療法を考慮

## 実施上の注意点

### 対象者
- 非弁膜症性心房細動患者
- リウマチ性心疾患や機械弁患者は除外

### 評価者
- 医療従事者または十分な説明を受けた患者
- 各危険因子の正確な評価が重要

### 制限事項
- 低リスク群の層別化が不十分
- 65-74歳や女性などの危険因子が含まれない
- 日本人での検証で一部危険因子の妥当性に課題

## 参考文献・URL

### 主要文献
- Gage BF, et al. Validation of clinical classification schemes for predicting stroke: results from the National Registry of Atrial Fibrillation. JAMA 2001;285(22):2864-70.
- 日本循環器学会/日本不整脈心電学会：2020年改訂版 不整脈薬物治療ガイドライン

### 公式URL
- 日本血栓止血学会用語集: https://jsth.medical-words.jp/words/word-485/
- HOKUTO計算ツール: https://hokuto.app/calculator/gyRDeLpzSdRp7iA9lt83

### 追加情報源
- 日本心臓財団診療のヒント: https://www.jhf.or.jp/pro/hint/c3/hint005.html
- 心臓血管研究所付属病院解説: https://www.cvi.or.jp/9d/706/

## JSON作成時の技術的注意点

### 数式設定
- 各項目のselectoridxで正確な点数を設定
- 脳卒中・TIA既往は2点のため"0|2"で設定
- 合計スコア計算にindex参照を使用

### 構造化
- 評価項目は必須項目として設定
- warning/emergencyで1点以上と2点以上を色分け表示
- 結果解釈を自動計算で表示
