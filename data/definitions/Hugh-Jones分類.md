# Hugh-Jones分類 - 問診票作成情報まとめ

## 基本情報

### 著作権

原典: Fletcher CM (1952). The clinical diagnosis of pulmonary emphysema; an experimental study. Proc R Soc Med, 45(9), 577-584.

### 尺度の概要

- **正式名称**: Hugh-Jones Classification (Fletcher-Hugh-Jones Classification)
- **日本語名**: ヒュー・ジョーンズ分類
- **対象年齢**: 制限なし
- **評価目的**: 呼吸器疾患患者の運動機能と呼吸困難の程度評価
- **実施時間**: 1-2分
- **回答者**: 患者本人または医療従事者

### 開発背景

- **開発者**: Fletcher CM
- **発行年**: 1952年
- **理論的基盤**: 慢性閉塞性肺疾患（COPD）患者の呼吸困難評価
- **標準化サンプル**: 記載なし

## 尺度構成

### 全体構造

- **総項目数**: 1項目
- **サブスケール数**: なし
- **評価方式**: 5段階選択（I度-V度）

### Hugh-Jones分類 - 5段階

- **I度**: 同年齢の健康者と同様の労作ができ、歩行、階段昇降も健康者並みにできる
- **II度**: 同年齢の健康者と同様の労作ができるが、坂道・階段は健康者並みにはできない
- **III度**: 平地でも健康者並みに歩けないが、自分のペースなら1マイル（1.6km）以上歩ける
- **IV度**: 休み休みでなければ約46m（50ヤード）以上歩けない
- **V度**: 会話・着替えにも息切れがする。息切れの為外出できない

## 信頼性・妥当性

### 信頼性

- **内的整合性**: 単一項目のため算出不可
- **テスト再テスト信頼性**: 記載なし
- **評定者間信頼性**: 記載なし

### 妥当性

- **感度**: 記載なし
- **特異度**: 記載なし
- **その他**: COPD診療ガイドラインで推奨されている標準的評価法

## 得点化・解釈

### 基本得点

- I度: 1点
- II度: 2点
- III度: 3点
- IV度: 4点
- V度: 5点

### 重症度の目安

- **軽度**: I-II度（1-2点）- 日常生活にほぼ支障なし
- **中等度**: III度（3点）- 歩行能力に制限あり
- **重度**: IV-V度（4-5点）- 著明な活動制限、安静時症状

## 実施上の注意点

### 対象者

- 呼吸器疾患患者（特にCOPD患者）
- 年齢制限なし

### 評価者

- 医師、看護師、その他医療従事者
- 患者の日常生活状況を十分に聴取して評価

### 制限事項

- 酸素吸入の有無は考慮されていない（酸素吸入中はIV-V度と考慮すべき）
- 寝たきりなど分類不能の場合は評価対象外
- 最も症状が悪い時点での評価が推奨される

## 参考文献・URL

### 主要文献

- Fletcher CM. The clinical diagnosis of pulmonary emphysema; an experimental study. Proc R Soc Med 1952; 45(9): 577-584

### 公式URL

- 日本呼吸器学会: https://www.jrs.or.jp/publication/jrs_guidelines/
- COPD診療ガイドライン: https://www.jrs.or.jp/publication/jrs_guidelines/20220512084311.html
- 日本集中治療医学会用語委員会: https://www.jaam.jp/dictionary/dictionary/word/0603.html

### 追加情報源

- 厚生労働省DPC入院医療等の調査・評価分科会資料
- RCP Museum (Philip Hugh-Jones略歴): https://history.rcp.ac.uk/inspiring-physicians/philip-hugh-jones

## JSON作成時の技術的注意点

### 数式設定

- 分類値: `[[Hugh_Jones分類.index]]`（1-5の値）
- 重症度判定: 3項演算子使用、括弧追加で安全性向上
- warning/emergency: name属性必須設定

### 構造化

- 単一のradio選択項目として実装
- section → subsectionに変更（ダークモード対応）
- warningとemergencyで重症例をハイライト（IV度以上でwarning、V度でemergency）
- selectoridxで1-5の数値を設定し計算に使用
