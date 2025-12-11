# STOP-BANG質問票 問診票作成情報まとめ

## 基本情報

### 著作権

STOP-BANG質問票はUniversity Health Network (UHN)が所有（Property of University Health Network）

### 尺度の概要

- **正式名称**: STOP-BANG Questionnaire
- **日本語名**: STOP-BANG質問票
- **対象年齢**: 18歳以上
- **評価目的**: 閉塞性睡眠時無呼吸症候群（OSA）のスクリーニング
- **実施時間**: 1-2分
- **回答者**: 患者本人

### 開発背景

- **開発者**: Frances Chung博士、トロント大学
- **発行年**: 2008年
- **理論的基盤**: 閉塞性睡眠時無呼吸症候群の主要リスクファクター
- **開発目的**: 手術前患者のOSAスクリーニング（その後一般患者にも拡大）

## 尺度構成

### 全体構造

- **総項目数**: 8項目
- **サブスケール数**: 2つのセクション（STOP：症状4項目、BANG：身体的特徴4項目）
- **評価方式**: 二択（はい/いいえ）、各項目1点

### STOPセクション - 4項目

- **S（Snoring）**: いびき - 大きないびきをかくか
- **T（Tired）**: 疲労 - 日中の疲労感・眠気
- **O（Observed）**: 無呼吸の目撃 - 第三者による呼吸停止の観察
- **P（Pressure）**: 血圧 - 高血圧の有無・治療状況

### BANGセクション - 4項目

- **B（BMI）**: BMI 35kg/m²以上
- **A（Age）**: 年齢50歳以上
- **N（Neck）**: 首周囲径の基準
- **G（Gender）**: 性別 男性

## 信頼性・妥当性

### 信頼性

- **内的整合性**: 検証済み（複数の研究で確認）
- **再現性**: 良好

### 妥当性

- **感度**: 中等度-重症OSA（AHI≥15）に対して93%（スコア≥3）、重症OSA（AHI≥30）に対して100%（スコア≥3）
- **特異度**: 約43%（集団により変動）
- **負の予測値**: 中等度-重症OSA 90%、重症OSA 100%

## 得点化・解釈

### 基本得点

各項目「はい」で1点、合計0-8点

### リスク分類の目安

- **低リスク**: 0-2点
  - 中等度-重症OSAの可能性18%
  - 重症OSAの可能性4%
- **中等度リスク**: 3-4点
  - 追加判定基準が必要
- **高リスク**: 5-8点
  - 中等度-重症OSAの可能性60%
  - 重症OSAの可能性38%

### 拡張判定基準（原典版）

スコア3-4点の場合、以下の条件で高リスクと判定：

- STOP項目2つ以上 + BMI>35kg/m²
- STOP項目2つ以上 + 首周囲径（男性≥43cm、女性≥41cm）
- STOP項目2つ以上 + 男性

## 首周囲径基準の国際版vs日本版

### 原典基準（国際版）

- 男性: 43cm（17インチ）以上
- 女性: 41cm（16インチ）以上

### 日本版での適応

- 統一基準: 40cm以上（性別問わず）
- 根拠: アジア人集団では原典基準が適さない可能性、日本の臨床実践での簡略化、実用性向上のための統一基準採用

## 実施上の注意点

### 対象者

- 18歳以上の成人
- 睡眠時無呼吸症候群が疑われる患者
- 手術予定患者（麻酔リスク評価）

### 評価者

- 医師、看護師等の医療従事者
- 患者の自己記入も可能

### 制限事項

- スクリーニング用であり、確定診断には睡眠検査（ポリソムノグラフィー）が必要
- アジア人集団では偽陽性率がやや高い傾向
- 高齢女性や低BMIのアジア人では感度がやや低下する可能性
- 女性では自動的に1点低くなるため、より低い閾値での評価が必要な場合がある

## 参考文献・URL

### 主要文献

- Chung F, Yegneswaran B, Liao P, et al. STOP questionnaire: a tool to screen patients for obstructive sleep apnea. Anesthesiology. 2008;108(5):812-21. PMID: 18431116
- Chung F, Abdullah HR, Liao P. STOP-Bang Questionnaire: A Practical Approach to Screen for Obstructive Sleep Apnea. Chest. 2016;149(3):631-8. PMID: 26378880
- Chung F, Subramanyam R, Liao P, et al. High STOP-Bang score indicates a high probability of obstructive sleep apnoea. Br J Anaesth. 2012;108(5):768-75. PMID: 22401881

### 公式URL

- http://www.stopbang.ca/

### 追加情報源

- 尾下豪人, et al. 閉塞性睡眠時無呼吸症候群のリスク評価における日本語版STOP-Bangテストの有用性. 日本プライマリ・ケア連合学会誌. 2019;42(1):26-31.
- Loh JM, Toh ST. Rethinking neck circumference in STOP-BANG for Asian OSA. Sleep Breath. 2019;23(1):143-147.

## JSON作成時の技術的注意点

### 数式設定

- 合計点計算: 8項目のindex値の合算
- リスク分類: 三項演算子を使用して3段階分類
- 警告システム: 3点以上でwarning、5点以上でemergency

### 構造化

- 各項目にS・T・O・P・B・A・N・Gの略語をdispnameに含める
- 選択肢は「いいえ|はい」で統一（selectoridx: "0|1"）
- 評価項目（eval）には必ずdispnameを設定
- warning/emergencyフィールド: name, descriptionを必須設定
- 変数名の一貫性: evalフィールドのname属性と、formula内での変数参照は完全に一致
