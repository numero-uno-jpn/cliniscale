# PSQ-III 作成情報まとめ

## 基本情報

### 著作権

RAND Corporation の著作物。詳細な利用規約は RAND 公式サイト（https://www.rand.org/health-care/surveys_tools/psq.html）を参照。

### 尺度の概要

- **正式名称**: Patient Satisfaction Questionnaire-III (PSQ-III)
- **日本語名**: 患者満足度質問票第 3 版
- **対象年齢**: 成人（18 歳以上）
- **評価目的**: 医療ケアに対する患者満足度の包括的評価
- **実施時間**: 9-12 分
- **回答者**: 患者本人

### 開発背景

- **開発者**: John E. Ware, M. Kay Snyder, W. Russell Wright（原版 PSQ-I, 1976）、Ron D. Hays, Allyson Ross Davies, John E. Ware（PSQ-III, 1987）
- **発行年**: 1976 年（PSQ-I）、1987 年（PSQ-III、MOS 研究で使用開始）
- **理論的基盤**: 多次元患者満足度理論
- **標準化サンプル**: MOS 研究（Medical Outcomes Study）など複数の研究で検証済み

## 尺度構成

### 全体構造

- **総項目数**: 50 項目
- **サブスケール数**: 7
- **評価方式**: 5 段階リッカート尺度（1=強く同意、2=同意、3=どちらでもない、4=不同意、5=強く不同意）

### サブスケール詳細

#### 1. 全体的な満足度（General Satisfaction）- 6 項目

- 医療ケア全体に対する総合的な満足度
- 期待との比較
- サービス品質の総合評価

#### 2. 技術的品質（Technical Quality）- 10 項目

- 医師の医学的技術・知識
- 診断の正確性
- 治療の適切性
- 最新医学知識の保有

#### 3. 対人関係（Interpersonal Aspects）- 7 項目

- 医師の親しみやすさ
- 思いやりと優しさ
- 人間的な扱い
- 感情への配慮

#### 4. コミュニケーション（Communication）- 5 項目

- 病状説明の分かりやすさ
- 治療説明の詳しさ
- 質問への対応
- 理解度の確認

#### 5. 費用関連（Financial Aspects）- 8 項目

- 医療費の妥当性
- 料金の適切性
- 費用説明の十分性
- 経済的負担

#### 6. 診察時間（Time Spent with Doctor）- 2 項目

- 診察時間の十分性
- 時間配分の適切性

#### 7. アクセス・利便性（Access/Availability/Convenience）- 12 項目

- 立地の便利性
- 予約の取りやすさ
- 待ち時間
- 施設設備
- 交通アクセス
- 緊急時対応

## 信頼性・妥当性

### 信頼性

- **内的整合性**: クロンバック α = 0.77-0.89（各サブスケール、MOS 研究）
- **テスト再テスト信頼性**: 良好
- **評定者間信頼性**: 該当なし（自己評価）

### 妥当性

- **感度**: 該当なし（スクリーニングツールではない）
- **特異度**: 該当なし（スクリーニングツールではない）
- **その他**: 構成概念妥当性（因子分析により 7 因子構造を確認）、基準関連妥当性（他の満足度尺度との高い相関）、表面妥当性（医療専門家による内容妥当性確認済み）

## 得点化・解釈

### 基本得点

- **重要**: PSQ-III には逆転項目が含まれる
  - 好意的項目（25 項目）: 元の 1-5 を 5-1 に逆転
  - 非好意的項目（25 項目）: コードそのまま
- 逆転処理後、各サブスケールは該当項目の平均値で算出
- 総合スコアは全 50 項目の平均値
- 欠損データは除外して平均を計算

### 満足度の目安（逆転処理後）

- **非常に満足**: 平均スコア 4.0-5.0
- **満足**: 平均スコア 3.0-3.9
- **やや不満**: 平均スコア 2.0-2.9
- **不満**: 平均スコア 1.0-1.9

注意: 逆転項目処理後は、高スコアが高満足度を示す

## 実施上の注意点

### 対象者

- 医療サービスを受けた成人患者
- 一定の読解力・理解力が必要
- 重篤な認知機能障害がある場合は使用困難

### 評価者

- 医療従事者による実施サポートが推奨
- 匿名性の確保が重要
- バイアス回避のため第三者による実施が理想的

### 制限事項

- 文化的背景による解釈の違いに注意
- 医療制度の違い（特に費用関連項目）
- 急性期・重篤患者への実施は慎重に判断

## 参考文献・URL

### 主要文献

- Ware JE, Snyder MK, Wright WR. Development and validation of scales to measure patient satisfaction with Medical Care Services. Vol I, Part A & B. Springfield, VA: National Technical Information Service, 1976. (NTIS Publication No. PB 288-329, PB 288-330)
- Hays RD, Davies AR, Ware JE. Scoring the Medical Outcomes Study Patient Satisfaction Questionnaire: PSQ-III. RAND Corporation MOS Memorandum No. 866, August 19, 1987.
- Marshall GN, Hays RD. The Patient Satisfaction Questionnaire Short-Form (PSQ-18). RAND Corporation, P-7865, 1994.

### 公式URL

- RAND PSQ 公式ページ: https://www.rand.org/health-care/surveys_tools/psq.html
- PSQ-III 採点マニュアル: https://www.rand.org/content/dam/rand/www/external/health/surveys_tools/psq/psq3_scoring.pdf

### 追加情報源

- Thayaparan AJ, Mahdi E. The Patient Satisfaction Questionnaire Short Form (PSQ-18) as an adaptable, reliable, and validated tool for use in various settings. Medical Education Online. 2013;18:21747. PMID: 23883565

## JSON作成時の技術的注意点

### 数式設定

- **逆転項目の処理**: PSQ-III には 25 項目の好意的項目（favorably worded）があり、これらは逆転処理が必要
  - **好意的項目**: PSQ01, PSQ03, PSQ05, PSQ07, PSQ09, PSQ11, PSQ13, PSQ15, PSQ18, PSQ20, PSQ22, PSQ24, PSQ26, PSQ28, PSQ29, PSQ31, PSQ33, PSQ35, PSQ37, PSQ39, PSQ41, PSQ43, PSQ45, PSQ47, PSQ49, PSQ50
  - **処理方法**: selectoridx を「5|4|3|2|1」に設定（元の 1-5 を逆転）
  - **非好意的項目**: selectoridx は「1|2|3|4|5」のまま

- 各サブスケールスコア: 該当項目の index 値の平均
- 総合スコア: 全 50 項目の平均（中間変数使用で簡潔化推奨）
- 解釈: 3 項演算子を使用した段階的分類（高スコア=高満足度）

### 構造化

- セクション分けで 7 領域を明確に区分
- 各項目は 5 段階 radio 選択（逆転項目は selectoridx 調整）
- スコア計算項目は患者画面に表示されない（データ取得側のみ）
