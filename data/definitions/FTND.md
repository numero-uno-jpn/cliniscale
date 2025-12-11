# FTND（Fagerström Test for Nicotine Dependence）問診票作成情報まとめ

## 基本情報

### 著作権

- **原典論文**: Heatherton TF, Kozlowski LT, Frecker RC, Fagerstrom KO. The Fagerstrom Test for Nicotine Dependence: a revision of the Fagerstrom Tolerance Questionnaire. Br J Addict 1991;86(9):1119-1127.

### 尺度の概要

- **正式名称**: Fagerström Test for Nicotine Dependence (FTND)
- **日本語名**: ファーガストローム・ニコチン依存度テスト
- **対象年齢**: 主に成人喫煙者（18 歳以上）
- **評価目的**: ニコチン依存の程度を評価
- **実施時間**: 約 2-3 分
- **回答者**: 喫煙者本人

### 開発背景

- **開発者**: Todd F. Heatherton, Lynn T. Kozlowski, Richard C. Frecker, Karl-Olov Fagerstrom
- **発行年**: 1991 年（Fagerstrom Tolerance Questionnaire の改訂版）
- **理論的基盤**: ニコチン依存の身体的側面に焦点を当てた行動指標
- **標準化サンプル**: 254 名の喫煙者（生化学的指標との相関検証）

## 尺度構成

### 全体構造

- **総項目数**: 6 項目（喫煙者のみ対象）
- **評価方式**: 各項目 0-3 点の重み付け配点、総計 0-10 点

### 項目群詳細

#### 1. 朝の最初のタバコまでの時間 - 重要項目

- 朝起きてから最初のタバコを吸うまでの時間
- ニコチン依存度の最も強い指標の一つ
- 配点: 60 分より後=0 点、31-60 分=1 点、6-30 分=2 点、5 分以内=3 点

#### 2. 禁煙場所での喫煙欲求 - 1 項目

- 禁煙が義務付けられた場所での喫煙衝動の強さ
- 配点: いいえ=0 点、はい=1 点

#### 3. 最もやめにくいタバコ - 1 項目

- やめるのが最もつらいタバコの特定
- 配点: その他のタバコ=0 点、朝起きてすぐの 1 本目=1 点

#### 4. 1 日の喫煙本数 - 重要項目

- 客観的な消費量の指標
- 配点: 10 本以下=0 点、11-20 本=1 点、21-30 本=2 点、31 本以上=3 点

#### 5. 朝の喫煙頻度 - 1 項目

- 起床後数時間の喫煙パターン
- 配点: いいえ=0 点、はい=1 点

#### 6. 病気時の喫煙 - 1 項目

- 体調不良時でも喫煙するかどうか
- 配点: いいえ=0 点、はい=1 点

## 信頼性・妥当性

### 信頼性

- **内的整合性**: Cronbach's α = 0.49-0.68（中程度）
- **テスト再テスト信頼性**: r = 0.85-0.88
- **評定者間信頼性**: 自己記入式のため該当なし

### 妥当性

- **その他**: 収束的妥当性として生化学的指標（コチニン、一酸化炭素）との相関 r = 0.3-0.5、予測妥当性として禁煙成功率との負の相関、構成概念妥当性として離脱症状との強い関連

## 得点化・解釈

### 基本得点

- 各項目の得点を合計し、0-10 点で評価（喫煙者のみ）

### 依存度の目安

- **非常に軽度依存**: 0-2 点
- **軽度依存**: 3-4 点
- **中等度依存**: 5 点
- **高度依存**: 6-7 点
- **非常に高度依存**: 8-10 点
- **注意**: 非喫煙者は FTND スコアの対象外で、「非喫煙者」として分類

## 実施上の注意点

### 対象者

- **現在喫煙している成人**（FTND の必須条件）
- 1 日 1 本以上の規則的な喫煙者

### 評価者

- 特別な訓練は不要
- 自己記入式で実施可能

### 制限事項

- **非喫煙者は評価対象外**（重要な制限事項）
- 心理的依存は評価されない
- 他の薬物依存がある場合は慎重に解釈
- 禁煙動機や自己効力感は別途評価が必要

## 参考文献・URL

### 主要文献

- Heatherton TF, Kozlowski LT, Frecker RC, Fagerstrom KO. The Fagerstrom Test for Nicotine Dependence: a revision of the Fagerstrom Tolerance Questionnaire. Br J Addict 1991;86(9):1119-1127. PMID: 1932883
- Payne TJ, Smith PO, McCracken LM, Antony MM. Reliability of the Fagerstrom Tolerance Questionnaire and the Fagerstrom Test for Nicotine Dependence. Addict Behav 1994;19(1):33-39.

### 公式URL

- **American Thoracic Society**: https://www.aarc.org/wp-content/uploads/2014/08/Fagerstrom_test.pdf
- **ScienceDirect Topics**: https://www.sciencedirect.com/topics/medicine-and-dentistry/fagerstrom-test-for-nicotine-dependence
- **PMC 研究論文**: https://pmc.ncbi.nlm.nih.gov/articles/PMC4403618/

### 追加情報源

- 日本語版は広く使用されており、信頼性・妥当性が確認済み
- 禁煙支援ガイドラインで推奨されている標準的評価法
- 禁煙外来での初期評価、ニコチン代替療法の投与量決定、禁煙支援プログラムの強度設定、研究における依存度の客観的評価に使用

## JSON作成時の技術的注意点

### 数式設定

- **重要**: FTND スコア計算は喫煙者のみ適用
- 非喫煙者には 'N/A' を返す条件分岐を設定
- 依存度レベル判定: 非喫煙者は「非喫煙者」として分類
- 各項目のインデックス値を合算してスコア算出

### 構造化

- 喫煙状況を親項目として、非喫煙者には以降の質問を非表示
- eval タイプでスコア計算と依存度レベル判定を自動化
- 各選択肢に selectoridx で適切な得点を設定
- dispname を未定義にしてスコア項目を患者画面に非表示
