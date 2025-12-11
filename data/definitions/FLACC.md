# FLACC 作成情報まとめ

## 基本情報

### 著作権

本ツールの翻訳はミシガン大学との間に締結された合意の元に行われており、原作の権利を侵害するものではありません。

### 尺度の概要

- **正式名称**: Face, Legs, Activity, Cry, Consolability Scale (FLACC)
- **日本語名**: FLACC疼痛評価スケール
- **対象年齢**: 2ヶ月から7歳
- **評価目的**: 言語表現ができない小児の疼痛評価
- **実施時間**: 2-5分間の観察
- **回答者**: 医療従事者・看護師

### 開発背景

- **開発者**: Sandra I. Merkel, Terri Voepel-Lewis, Shobha Malviya(ミシガン大学)
- **発行年**: 1997年
- **理論的基盤**: 行動観察による疼痛評価理論
- **標準化サンプル**: 2ヶ月から7歳の89名の小児(1997年研究)

## 尺度構成

### 全体構造

- **総項目数**: 5項目
- **サブスケール数**: なし(単一尺度)
- **評価方式**: 3段階評価(0点、1点、2点)

### 評価項目詳細

#### 1. Face(表情) - 表情の観察

- 顔の表情変化による疼痛の判断
- 無表情から頻繁なしかめっ面までの段階的評価

#### 2. Legs(下肢) - 下肢の動きの観察

- 脚の位置と動きによる疼痛の判断
- 正常肢位から足を蹴る動きまでの評価

#### 3. Activity(活動性) - 全身活動の観察

- 全身の動きと姿勢による疼痛評価
- おとなしい状態から反り返りまでの観察

#### 4. Cry(啼泣) - 発声の観察

- 泣き声やうめき声による疼痛判断
- 泣いていない状態から持続的な泣き声までの評価

#### 5. Consolability(安静度) - 安楽への反応

- 慰めに対する反応による疼痛評価
- 満足状態から慰め困難まで

## 信頼性・妥当性

### 信頼性

- **内的整合性**: クロンバックα = 0.882(Voepel-Lewis et al. 2010)
- **テスト再テスト信頼性**: 該当なし(状態依存的評価のため)
- **評定者間信頼性**: ICC = 0.97(Merkel et al. 1997)、κ = 0.95(日本語版総合スコア)、評価者内信頼性 ICC = 0.87(Crellin et al. 2018)

### 妥当性

- **感度**: 94.9%(カットオフ値2点、Crellin et al. 2018)
- **特異度**: 73.5%(カットオフ値2点、Crellin et al. 2018)
- **その他**: VAS観察スコアとの相関r = 0.96(日本語版)

## 得点化・解釈

### 基本得点

各項目0-2点で評価し、5項目の合計点数(0-10点)で疼痛レベルを判定

### 疼痛レベルの目安

- **0点**: リラックスし快適
- **1-3点**: 軽度の不快感
- **4-6点**: 中等度の痛み
- **7-10点**: 重度の不快感/痛み

## 実施上の注意点

### 対象者

- 2ヶ月から7歳の小児
- 言語でのコミュニケーションが困難な患者
- 集中治療室の挿管患者でも使用可能

### 評価者

- 看護師または医療従事者による観察評価
- 2-5分間の継続的な観察が必要
- 評価者の主観による誤差を最小化するための訓練推奨

### 制限事項

- 疼痛と非疼痛関連の苦痛を区別する能力に限界
- ベースラインスコアが高い小児では変化の検出が困難
- 手術後の急性期疼痛評価に特に有効

## 参考文献・URL

### 主要文献

- Merkel SI, Voepel-Lewis T, Shayevitz JR, Malviya S. The FLACC: a behavioral scale for scoring postoperative pain in young children. Pediatr Nurs. 1997;23(3):293-7.
- Matsuishi Y, Hoshino H, Shimojo N, et al. Verifying the validity and reliability of the Japanese version of the Face, Legs, Activity, Cry, Consolability (FLACC) Behavioral Scale. PLoS One. 2018;13(3):e0194094.

### 公式URL

- ミシガン大学原版: https://available-inventions.umich.edu/product/face-legs-activity-cry-consolability-observational-tool-as-a-measure-of-pain
- 日本語版提供: https://www.md.tsukuba.ac.jp/clinical-med/e-ccm/research/PedTool/FLACC.html

### 追加情報源

- 筑波大学 疾患制御医学専攻 救急集中治療研究室
- 連絡先: matsuishi.yujiro.xa@alumni.tsukuba.ac.jp

## JSON作成時の技術的注意点

### 数式設定

- 合計スコア計算: face.index + legs.index + activity.index + cry.index + consolability.index
- 疼痛レベル判定: 筑波大学版に準拠した4段階判定式使用

### 構造化

- 各項目はradio typeで0-2点のselectoridx設定
- warning設定(4点以上で黄色表示)
- emergency設定(7点以上で赤色表示)
- warning/emergency項目にはname、descriptionを必須設定
