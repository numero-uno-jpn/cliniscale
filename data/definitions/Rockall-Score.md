# Rockall Score 作成情報まとめ

## 基本情報

### 著作権

原典: Rockall TA, Logan RF, Devlin HB, Northfield TC. Risk assessment after acute upper gastrointestinal haemorrhage. Gut. 1996 Mar;38(3):316-21.

### 尺度の概要

- **正式名称**: Rockall Risk Scoring System
- **日本語名**: Rockall Score（ロカールスコア）
- **対象年齢**: 成人患者（年齢制限なし）
- **評価目的**: 上部消化管出血の死亡・再出血リスク評価
- **実施時間**: 2-3 分
- **回答者**: 医療従事者が患者情報をもとに評価

### 開発背景

- **開発者**: Rockall TA, Logan RF, Devlin HB, Northfield TC
- **発行年**: 1996 年
- **理論的基盤**: 上部消化管出血 4185 例の多変量解析による独立危険因子同定
- **標準化サンプル**: 初期研究 4185 例、検証研究 625 例

## 尺度構成

### 全体構造

- **総項目数**: 5 項目
- **サブスケール数**: 2（Clinical/Complete）
- **評価方式**: 0-11 点の累積スコア

### サブスケール詳細

#### 1. 年齢 - 1 項目

- 60 歳未満: 0 点
- 60-79 歳: 1 点
- 80 歳以上: 2 点

#### 2. ショック/循環動態 - 1 項目

- ショックなし（収縮期血圧 ≧100mmHg かつ 心拍数＜ 100 回/分）: 0 点
- 頻脈（収縮期血圧 ≧100mmHg かつ 心拍数 ≧100 回/分）: 1 点
- 血圧低下（収縮期血圧＜ 100mmHg）: 2 点

#### 3. 併存症 - 1 項目

- 重大な併存症なし: 0 点
- 虚血性心疾患、うっ血性心不全: 2 点
- 腎不全、肝不全、播種性悪性腫瘍: 3 点

#### 4. 内視鏡診断 - 1 項目

- Mallory-Weiss 裂傷または異常所見なし: 0 点
- その他の診断: 1 点
- 上部消化管悪性腫瘍: 2 点

#### 5. 主要な最近出血兆候 - 1 項目

- 観察時出血なしまたは黒色出血斑のみ: 0 点
- 上部消化管出血、血塊、露出血管、活動性出血: 2 点

## 信頼性・妥当性

### 信頼性

- **内的整合性**: 該当なし（リスクスコアのため）
- **テスト再テスト信頼性**: 該当なし
- **評定者間信頼性**: 高い（客観的基準による評価のため）

### 妥当性

- **感度**: 死亡予測において優れた予測能
- **特異度**: 低リスク患者の同定において高い特異度
- **その他**: 多施設での検証により予測精度が確認済み

## 得点化・解釈

### 基本得点

- Clinical Rockall Score: 年齢＋ショック＋併存症（0-7 点）
- Complete Rockall Score: Clinical ＋内視鏡診断＋出血兆候（0-11 点）

### リスク分類の目安

- **低リスク**: Clinical 0 点、Complete ≤2 点（死亡率 0.2-0.3%）
- **中リスク**: Clinical 1-2 点、Complete 3-4 点（死亡率 2-10%）
- **高リスク**: Clinical ≥3 点、Complete ≥5 点（死亡率 10%以上）

### 治療方針

- **低リスク**: 外来治療または早期退院を検討可能
- **中・高リスク**: 入院管理・集中治療を検討

## 実施上の注意点

### 対象者

- 急性上部消化管出血患者
- 年齢制限なし
- 静脈瘤性・非静脈瘤性出血の両方に適用可能

### 評価者

- 医師、看護師等の医療従事者
- 循環動態の評価能力が必要
- 内視鏡所見の解釈ができることが望ましい

### 制限事項

- 内視鏡検査前は予測精度が限定的
- 再出血予測よりも死亡予測により適している
- Glasgow-Blatchford Score と併用することが推奨される

## 参考文献・URL

### 主要文献

- Rockall TA, Logan RF, Devlin HB, Northfield TC. Risk assessment after acute upper gastrointestinal haemorrhage. Gut. 1996 Mar;38(3):316-21.
- Vreeburg EM, Terwee CB, Snel P, et al. Validation of the Rockall risk scoring system in upper gastrointestinal bleeding. Gut. 1999;44(3):331-335.

### 公式URL

- 原典論文: https://gut.bmj.com/content/38/3/316
- 医学書院解説: https://www.igaku-shoin.co.jp/paperDetail.do?id=PA02903_07

### 追加情報源

- HOKUTO 計算ツール: https://hokuto.app/calculator/PfcFSprF1zcyM4hOYPYm
- RCEMLearning: https://www.rcemlearning.co.uk/modules/upper-gastrointestinal-haemorrhage/

## JSON作成時の技術的注意点

### 数式設定

- Clinical Score: `[[年齢.index]] + [[ショック.index]] + [[併存症.index]]`
- Complete Score: 内視鏡実施有無による条件分岐
- リスク分類: スコアと実施検査による複合的判定

### 構造化

- 2 段階評価（Clinical/Complete）の実装
- 内視鏡検査実施有無による条件分岐設定
- warning/emergency によるリスク視覚化
