# YMRS 問診票作成情報まとめ

## 基本情報

### 著作権

- 原典論文の著作権は著者および発行元（British Journal of Psychiatry）に帰属
- 日本語版は稲田俊也、長沼英俊による翻訳・適応版
- 商用利用については原著者および日本精神科評価尺度研究会の許可が必要

### 尺度の概要

- **正式名称**: Young Mania Rating Scale (YMRS)
- **日本語名**: ヤング躁病評価尺度日本語版（YMRS-J）
- **対象年齢**: 成人（小児版P-YMRSは5-17歳対象）
- **評価目的**: 躁症状の重症度評価
- **実施時間**: 15-30分
- **回答者**: 訓練を受けた臨床医による評価（患者の自己報告と行動観察）

### 開発背景

- **開発者**: Young RC, Biggs JT, Ziegler VE, Meyer DA
- **発行年**: 1978年
- **理論的基盤**: DSM診断基準に基づく躁症状のコア症状
- **標準化サンプル**: ワシントン大学Renard病院での臨床研究

## 尺度構成

### 全体構造

- **総項目数**: 11項目
- **サブスケール数**: なし（単一尺度）
- **評価方式**: 0-4点または0-8点の段階評価

### 評価項目詳細

#### 1. 0-4点評価項目（7項目）

- 気分高揚（Elevated Mood）
- 過活動性（Increased Motor Activity-Energy）
- 性的関心（Sexual Interest）
- 睡眠（Sleep）
- 言語・思考障害（Language-Thought Disorder）
- 身なり（Appearance）
- 病識（Insight）

#### 2. 0-8点評価項目（4項目） - 2倍加重

**重要**: これらの項目は0, 2, 4, 6, 8の5段階のアンカーポイントのみを使用

- 易怒性（Irritability）
- 発話速度・量（Speech Rate and Amount）
- 思考内容（Thought Content）
- 破壊的・攻撃的行為（Disruptive-Aggressive Behavior）

**注記**: 原典では経験を積んだ後は0.5点刻みの評価も許容されているが、基本的には上記5段階のアンカーポイントを使用

## 信頼性・妥当性

### 信頼性

- **内的整合性**: 高い（Cronbach's α = 0.80-0.91）
- **評定者間信頼性**: ICC = 0.93（総得点）、個別項目は0.66-0.95
- **テスト再テスト信頼性**: 良好

### 妥当性

- **感度**: 高い（症状変化に敏感）
- **特異度**: 良好
- **併存妥当性**: CGI-BPとの相関r = 0.88、Bech-Rafaelsen Mania Scaleとの相関ρ = 0.90

## 得点化・解釈

### 基本得点

- 各項目の得点を単純合計
- 総得点範囲: 0-60点
- **計算方法**: 0-4点項目（7項目）+ 0-8点項目（4項目）の合計

### 重症度判定基準

- **完全寛解**: YMRS < 4点（CGI-BP重症度スコア1に相当）
- **寛解（軽症状あり）**: YMRS < 7点
- **境界域**: YMRS 7-11点
- **軽度**: YMRS 12-19点
- **中等度**: YMRS 20-24点（急性期治療を要する躁病エピソード）
- **重度（著明）**: YMRS 25-29点
- **重篤**: YMRS 30-39点
- **最重症**: YMRS ≥ 40点

### 治療反応性の評価基準

- **反応**: ベースラインから50%以上の減少（従来基準）
- **臨床的意義のある差**: YMRS 6.6点
- **寛解**: YMRS ≤ 12点（従来基準）または < 4点（完全寛解）

## 実施上の注意点

### 対象者

- 躁病エピソードまたは混合状態の患者
- 双極性障害の診断または疑い
- 過去48時間の症状に基づく評価

### 評価者

- 訓練を受けた臨床医（精神科医、心理士等）
- 面接技法と躁症状の知識が必要
- 患者の主観的報告と客観的行動観察の統合

### 制限事項

- 診断ツールではなく重症度評価尺度
- 躁状態の患者は病識に欠けることが多く、自己評価は不正確
- 全ての躁症状を網羅するものではない
- うつ症状は評価されない

## 参考文献・URL

### 主要文献

- Young RC, Biggs JT, Ziegler VE, Meyer DA. A rating scale for mania: reliability, validity and sensitivity. Br J Psychiatry. 1978;133:429-435. DOI: 10.1192/bjp.133.5.429
- 稲田俊也編. YMRSを使いこなす 改訂版 ヤング躁病評価尺度日本語版(YMRS-J)による躁病の臨床評価. じほう, 2012.
- Lukasiewicz M, Gerard S, Besnard A, et al. Young Mania Rating Scale: how to interpret the numbers? Int J Methods Psychiatr Res. 2013;22(1):46-58.
- Samara MT, Cao H, Cuijpers P, et al. Linkage of Young Mania Rating Scale to Clinical Global Impression Scale. J Clin Psychopharmacol. 2022;42(5):460-465.
- Berk M, Ng F, Wang WV, et al. The empirical redefinition of the psychometric criteria for remission in bipolar disorder. J Affect Disord. 2008;106(1-2):153-158.

### 公式URL

- 日本精神科評価尺度研究会: http://jsprs.org/scales/ymrs.html
- PubMed（原典）: https://pubmed.ncbi.nlm.nih.gov/728692/

### 追加情報源

- Psychology Tools: https://psychology-tools.com/test/young-mania-rating-scale
- PMC（EMBLEM研究）: https://pmc.ncbi.nlm.nih.gov/articles/PMC6878321/

## JSON作成時の技術的注意点

### 数式設定

- 総得点計算: 11項目のindex値を合計
- 重症度判定: 三項演算子による段階的条件分岐
- 臨床的解釈: 治療必要性の判断

### 構造化

- 各項目をradio型で実装
- 0-8点項目はselectoridxを"0|2|4|6|8"と設定（5段階のアンカーポイント）
- 0-4点項目はselectoridxを"0|1|2|3|4"と設定
- 総得点はeval型で自動計算
- 重症度判定と臨床的解釈もeval型で自動表示
