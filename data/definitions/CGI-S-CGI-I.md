# CGI-S/CGI-I - 問診票作成情報まとめ

## 基本情報

### 著作権
ECDEU プログラム（Early Clinical Drug Evaluation Program）により開発、パブリックドメイン

### 尺度の概要
- **正式名称**: Clinical Global Impression Scale - Severity/Improvement (CGI-S/CGI-I)
- **日本語名**: 全般的臨床印象評価尺度 - 重症度/改善度
- **対象年齢**: 制限なし（全年齢対象）
- **評価目的**: 精神疾患の重症度評価および治療効果判定
- **実施時間**: 1 分未満
- **回答者**: 臨床医（精神科医）

### 開発背景
- **開発者**: ECDEU（Early Clinical Drug Evaluation Program）研究チーム
- **発行年**: 1976 年
- **理論的基盤**: NIMH 主導の臨床試験で使用するための臨床判断ベースの評価
- **標準化サンプル**: 特定の標準化サンプルなし（臨床医の経験ベース）

## 尺度構成

### 全体構造
- **総項目数**: 2 項目（CGI-S、CGI-I）
- **サブスケール数**: なし
- **評価方式**: 7 段階評価（両項目とも）

### CGI-S（重症度評価）詳細
#### 1. 重症度評価 - 1項目
- 同じ診断の患者に関する臨床医の経験に照らした現在の疾患重症度評価
- 1: 正常、まったく病気ではない
- 2: 境界域、精神的に病気とは言えない
- 3: 軽症
- 4: 中等症
- 5: 重症
- 6: 最重症
- 7: 極めて重篤な状態の患者

### CGI-I（改善度評価）詳細
#### 1. 改善度評価 - 1項目
- 治療介入開始時のベースライン状態との比較評価
- 1: 著明改善
- 2: 中等度改善
- 3: 軽度改善
- 4: 不変
- 5: 軽度悪化
- 6: 中等度悪化
- 7: 著明悪化

## 信頼性・妥当性

### 信頼性
- **内的整合性**: 単一項目評価のため該当なし
- **テスト再テスト信頼性**: 研究により様々
- **評定者間信頼性**: HAM-D より劣る（研究報告あり）

### 妥当性
- **感度**: うつ病臨床試験でレスポンダーと非レスポンダーを区別する十分な感度
- **特異度**: 満足できる特異度ではない
- **その他**: 標準的な精神科評価尺度との相関は確認されている

## 得点化・解釈

### 基本得点
- CGI-S: 1-7 点（重症度を直接反映）
- CGI-I: 1-7 点（改善度を直接反映）

### 重症度分類の目安
- **正常（1 点）**: まったく病気ではない
- **境界域（2 点）**: 精神的に病気とは言えない
- **軽症（3 点）**: 軽度の症状
- **中等症（4 点）**: 中程度の症状
- **重症（5 点）**: 重い症状
- **最重症（6 点）**: 非常に重い症状
- **極めて重篤（7 点）**: 最も重篤な患者群

### 改善度分類の目安
- **著明改善（1-2 点）**: 治療効果ありと判定される範囲
- **軽度改善（3 点）**: 軽微な改善
- **不変（4 点）**: 変化なし
- **悪化（5-7 点）**: 治療に反応していない、または病状悪化

## 実施上の注意点

### 対象者
- 精神疾患を有するすべての患者（年齢制限なし）
- 診断カテゴリーを問わず適用可能

### 評価者
- 該当疾患に精通した経験のある臨床医
- 患者の治療経過を把握している医師
- 薬剤の効果とは独立した判断が必要

### 制限事項
- 主観的評価であり、評価者の経験に依存
- 明確な評価ガイドが存在しない
- 特異度が十分でない場合がある
- 単独使用では限界があり、他の評価尺度との併用が推奨

## 参考文献・URL

### 主要文献
- Guy W. ECDEU Assessment Manual for Psychopharmacology. U.S. Department of Health, Education, and Welfare; 1976
- Busner J, Targum SD. The clinical global impressions scale: applying a research tool in clinical practice. Psychiatry (Edgmont). 2007;4(7):28-37

### 公式URL
- ePROVIDE: https://eprovide.mapi-trust.org/instruments/clinical-global-impressions-scale-improvement-severity-change-and-efficacy

### 追加情報源
- PMC: https://pmc.ncbi.nlm.nih.gov/articles/PMC2880930/
- NP Psych Navigator: https://www.nppsychnavigator.com/Clinical-Tools/Psychiatric-Scales/Scale-2

## JSON作成時の技術的注意点

### 数式設定
- CGI-S スコア: `[[cgi_s.index]]`（selectoridx で 1-7 を直接設定するため、+1 不要）
- CGI-I スコア: `[[cgi_i.index]]`（同上）
- 解釈文字列: 3 項演算子を用いた条件分岐で分類名を設定

### 構造化
- section/subsection で明確に区分（CGI-S、CGI-I、評価結果）
- 評価結果項目は`type: eval`で dispname 未設定（患者画面非表示）
- selectoridx で 1-7 のスコア値を明示的に設定（7 個の選択肢に対し 7 個の値）
