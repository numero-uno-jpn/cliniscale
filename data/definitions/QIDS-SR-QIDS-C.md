# QIDS-SR/QIDS-C 問診票作成情報まとめ

## 基本情報

### 著作権

- **著作権者**: A. John Rush, MD
- **原著論文**: Rush AJ, Trivedi MH, Ibrahim HM, Carmody TJ, Arnow B, Klein DN, Markowitz JC, Ninan PT, Kornstein S, Manber R, Thase ME, Kocsis JH, Keller MB. The 16-Item quick inventory of depressive symptomatology (QIDS), clinician rating (QIDS-C), and self-report (QIDS-SR): a psychometric evaluation in patients with chronic major depression. Biol Psychiatry. 2003;54:573-583.

### 尺度の概要

- **正式名称**: Quick Inventory of Depressive Symptomatology (QIDS-SR/QIDS-C)
- **日本語名**: 自己記入式簡易抑うつ症状尺度 (QIDS-SR-J) / 臨床医評価版簡易抑うつ症状尺度 (QIDS-C-J)
- **対象年齢**: 成人（18 歳以上）
- **評価目的**: うつ病症状の重症度評価、DSM-IV 大うつ病エピソード症状の評価
- **実施時間**: 5-10 分
- **回答者**: 患者本人（QIDS-SR）または臨床医（QIDS-C）

### 開発背景

- **開発者**: A. John Rush, M.D.（テキサス大学）
- **発行年**: 2003 年
- **理論的基盤**: DSM-IV 大うつ病エピソードの 9 つの症状領域
- **標準化サンプル**: 596 名の慢性非精神病性大うつ病障害外来患者（2003 年研究）

## 尺度構成

### 全体構造

- **総項目数**: 16 項目
- **サブスケール数**: 9（DSM-IV 症状領域）
- **評価方式**: 各項目 0-3 点、4 段階評価

### サブスケール詳細

#### 1. 睡眠障害 - 4 項目（1-4）

- 入眠困難（寝つき）
- 中途覚醒（夜間の睡眠）
- 早朝覚醒（早く目が覚めすぎる）
- 過眠（眠りすぎる）

#### 2. 抑うつ気分 - 1 項目（5）

- 悲しい気持ち

#### 3. 食欲・体重変化 - 4 項目（6-9）

- 食欲低下
- 食欲増進
- 体重減少
- 体重増加

#### 4. 集中力・決断力 - 1 項目（10）

- 集中力/決断

#### 5. 自己評価の障害 - 1 項目（11）

- 自分についての見方

#### 6. 自殺念慮 - 1 項目（12）

- 死や自殺についての考え

#### 7. 興味・喜びの喪失 - 1 項目（13）

- 一般的な興味

#### 8. エネルギー・疲労 - 1 項目（14）

- エネルギーのレベル

#### 9. 精神運動状態 - 2 項目（15-16）

- 精神運動制止（動きが遅くなった気がする）
- 精神運動焦燥（落ち着かない）

## 信頼性・妥当性

### 信頼性

- **内的整合性**: クロンバック α = 0.86（QIDS-SR16）、0.82（QIDS-C16）
- **テスト再テスト信頼性**: 良好（詳細データは原著参照）
- **評定者間信頼性**: QIDS-SR と QIDS-C の相関 r = 0.61-0.70

### 妥当性

- **感度**: 治療変化に対して高い感度
- **特異度**: 該当なし（診断ツールではない）
- **その他**: 併存妥当性（IDS-SR30 との相関 r = 0.96、HAM-D24 との相関 r = 0.86）、単一因子構造、DSM-IV 基準との整合性

## 得点化・解釈

### 基本得点

- 睡眠項目（1-4）: 最高点を採用
- 食欲・体重項目（6-9）: 最高点を採用
- 精神運動項目（15-16）: 最高点を採用
- その他の項目（5, 10-14）: 各項目の点数
- 合計点: 9 つの症状領域の合計（0-27 点）

### 重症度の目安

- **正常**: 0-5 点
- **軽度**: 6-10 点
- **中等度**: 11-15 点
- **重度**: 16-20 点
- **きわめて重度**: 21-27 点

## 実施上の注意点

### 対象者

- 大うつ病性障害またはうつ症状のある成人患者
- 認知機能に重篤な障害のない患者

### 評価者

- QIDS-SR: 患者本人による自己記入
- QIDS-C: 精神科医や訓練を受けた臨床家による評価

### 制限事項

- 評価期間は過去 7 日間
- 6 点以上で医療機関受診を推奨
- 自殺念慮項目で 2 点以上の場合は緊急評価が必要

## 参考文献・URL

### 主要文献

- Rush AJ, Trivedi MH, Ibrahim HM, et al. The 16-Item quick inventory of depressive symptomatology (QIDS), clinician rating (QIDS-C), and self-report (QIDS-SR): a psychometric evaluation in patients with chronic major depression. Biol Psychiatry. 2003;54:573-583.
- 藤澤大介, 中川敦夫, 田島美幸, et al. 日本語版自己記入式簡易抑うつ尺度(日本語版 QIDS-SR)の開発. ストレス科学. 2010;25(1):43-52.

### 公式URL

- IDS/QIDS 公式サイト: http://ids-qids.org/
- 日本精神科評価尺度研究会: http://jsprs.org/sheet/qids_sr_sheet.html

### 追加情報源

- 厚生労働省うつ病チェック: https://www.mhlw.go.jp/bunya/shougaihoken/kokoro/dl/02.pdf
- Progress In Mind Japan: https://japan.progress.im/ja/content/qids

## JSON作成時の技術的注意点

### 数式設定

- 睡眠スコア: 4 項目の最高点を複雑な三項演算子で算出
- 食欲体重スコア: 4 項目の最高点を複雑な三項演算子で算出
- 精神運動スコア: 2 項目の最高点を単純な三項演算子で算出
- 総得点: 9 つの症状領域スコアの合計
- 重症度分類: 総得点に基づく条件分岐評価

### 構造化

- 評価方法選択項目で自己記入式か臨床医評価かを区別
- 16 の質問項目を順次配置
- 中間計算用の eval フィールドで各症状領域スコアを算出
- 最終的な総得点と重症度分類を表示
- warning フィールドで医療機関受診推奨（6 点以上）
- emergency フィールドで緊急対応必要（自殺念慮 2 点以上）
