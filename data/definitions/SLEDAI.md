# SLEDAI 問診票作成情報まとめ

## 基本情報

### 著作権

原典論文: Bombardier C, Gladman DD, Urowitz MB, et al. Derivation of the SLEDAI. A disease activity index for lupus patients. The Committee on Prognosis Studies in SLE. Arthritis Rheum. 1992;35(6):630-640.

### 尺度の概要

- **正式名称**: Systemic Lupus Erythematosus Disease Activity Index (SLEDAI)
- **日本語名**: 全身性エリテマトーデス疾患活動性指標
- **対象年齢**: 全年齢
- **評価目的**: 全身性エリテマトーデス（SLE）の疾患活動性評価
- **実施時間**: 10-15分
- **回答者**: 医師による患者評価

### 開発背景

- **開発者**: Claire Bombardier, Dafna D. Gladman, Murray B. Urowitzらトロント大学グループ
- **発行年**: 1992年
- **理論的基盤**: 14名のリウマチ専門医の専門的判断による574症例の評価に基づく
- **標準化サンプル**: 574症例（1992年）

## 尺度構成

### 全体構造

- **総項目数**: 24項目
- **評価範囲**: 過去10日以内に認められた症状・所見
- **評価方式**: あり/なしの2段階評価

### 項目群詳細

#### 1. 中枢神経系・血管系 - 各8点

- 痙攣
- 精神症状
- 器質的脳障害
- 視力障害
- 脳神経障害
- ループス頭痛
- 脳血管障害
- 血管炎

#### 2. 腎・筋骨格系 - 各4点

- 関節炎
- 筋炎
- 尿円柱
- 血尿
- 蛋白尿
- 膿尿

#### 3. 漿膜・皮膚・免疫学的所見 - 各2点

- 新たな皮疹
- 脱毛
- 粘膜潰瘍
- 胸膜炎
- 心膜炎
- 低補体血症
- 抗DNA抗体上昇

#### 4. 全身・血液学的所見 - 各1点

- 発熱
- 血小板減少
- 白血球減少

## 信頼性・妥当性

### 信頼性

- **評価者間信頼性**: 高い一致率（経験豊富な臨床医間）
- **内的整合性**: 高い説明力（R² = 0.93）
- **予測妥当性**: ピアソン相関係数 0.64-0.79

### 妥当性

- **専門医判断との相関**: 高い相関を示す
- **国際的検証**: 多国間での妥当性確認済み
- **その他**: 経験豊富な臨床医の総合的疾患活動性評価を反映

## 得点化・解釈

### 基本得点

該当する項目の重み付け点数を合計。各項目は「あり」の場合のみ配点。スコア範囲は0-105点（理論値、実際は45点以下が多い）。

### 重症度の目安

- **軽症・非活動期**: 0-3点
- **重症・活動期**: 4点以上（日本の医療費助成対象）
- **重篤な疾患活動性**: 12点以上

## 実施上の注意点

### 対象者

- 全身性エリテマトーデス（SLE）の診断が確定した患者
- 評価期間は過去10日以内の症状・所見に限定

### 評価者

- SLEに精通した医師による評価が必要
- 代謝性、感染性、薬剤性の原因除外が重要

### 制限事項

- 溶血性貧血と消化器症状は含まれない
- 慢性的な器質的損傷は評価対象外
- 治療による症状改善は考慮されない

## 参考文献・URL

### 主要文献

- Bombardier C, et al. Derivation of the SLEDAI. A disease activity index for lupus patients. Arthritis Rheum. 1992;35(6):630-640.
- Gladman DD, et al. Systemic lupus erythematosus disease activity index 2000. J Rheumatol. 2002;29(2):288-291.

### 公式URL

- 厚生労働省難病情報センター: https://www.nanbyou.or.jp/
- MDCalc SLEDAI-2K: https://www.mdcalc.com/calc/10099/systemic-lupus-erythematosus-disease-activity-index-2000-sledai-2k

### 追加情報源

- GSKpro SLE評価スコア: https://gskpro.com/ja-jp/disease-info/sle/score/
- HOKUTO医学事典: https://hokuto.app/calculator/RwTYE5Kp3U40HVd8UhlB

## JSON作成時の技術的注意点

### 数式設定

- 合計スコア: 全24項目のインデックス値合計
- 重症度判定: `[[SLEDAIスコア]] >= 4 ? '重症（医療費助成対象）' : '軽症'`

### 構造化

- selectoridxで各項目の配点を設定（0点または配点）
- セクション分けで臓器系別に整理
- 原典の定義文を各項目のdescriptionに忠実に記載
