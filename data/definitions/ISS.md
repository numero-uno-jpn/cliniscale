# ISS - 問診票作成情報まとめ

## 基本情報

### 著作権

Baker SP et al. The injury severity score: a method for describing patients with multiple injuries and evaluating emergency care. J Trauma 1974;14:187-96

### 尺度の概要

- **正式名称**: Injury Severity Score (ISS)
- **日本語名**: 外傷重症度スコア
- **対象年齢**: 制限なし
- **評価目的**: 多発外傷患者の重症度評価
- **実施時間**: 5-10分
- **回答者**: 医療従事者

### 開発背景

- **開発者**: Susan P. Bakerら
- **発行年**: 1974年
- **理論的基盤**: Abbreviated Injury Scale（AIS）に基づく解剖学的重症度評価
- **標準化サンプル**: 多数の外傷患者データに基づく

## 尺度構成

### 全体構造

- **総項目数**: 6部位のAISスコア評価
- **サブスケール数**: 6身体部位
- **評価方式**: AISスコア0-6の6段階評価

### 頭頸部

- 脳挫傷、頭蓋骨骨折、頸椎損傷

### 顔面

- 眼窩骨折、上顎骨骨折、下顎骨骨折

### 胸部

- 肋骨骨折、血胸、気胸、心損傷

### 腹部および骨盤内臓器

- 肝損傷、脾損傷、腎損傷、腸管損傷

### 四肢および骨盤

- 長管骨骨折、骨盤骨折、切断

### 体表

- 熱傷、挫創、裂創

## 信頼性・妥当性

### 信頼性

- **内的整合性**: 死亡率との強い相関
- **テスト再テスト信頼性**: 高い再現性
- **評定者間信頼性**: AIS訓練を受けた評価者間で高い一致性

### 妥当性

- **感度**: 重症外傷の検出に優れる
- **特異度**: 軽症外傷との鑑別に有効
- **その他**: 入院日数、医療費との相関も高い

## 得点化・解釈

### 基本得点

最重症3部位のAISスコアの2乗和で算出
ISS = A² + B² + C²（A, B, Cは最重症3部位のAISスコア）

### 重症度の目安

- **軽症**: ISS 1-8（死亡率約2%）
- **中等症**: ISS 9-15
- **重症外傷**: ISS>15
- **最重症**: ISS 25-75（死亡率30%以上）

### 特別ルール

- AISスコア6がある場合、ISSは自動的に75となる

## 実施上の注意点

### 対象者

- 多発外傷患者
- 単一外傷でも重症度評価が必要な患者

### 評価者

- AIS訓練を受けた医療従事者
- 解剖学的知識と外傷評価経験が必要

### 制限事項

- 解剖学的評価のみで生理学的評価は含まない
- 病院前での使用には適さない
- AISコーディングの正確性が必須

## 参考文献・URL

### 主要文献

- Baker SP et al. The injury severity score: a method for describing patients with multiple injuries and evaluating emergency care. J Trauma 1974;14:187-96

### 公式URL

- 日本救急医学会用語委員会: https://www.jaam.jp/dictionary/dictionary/word/0411.html
- AAAM（Association for the Advancement of Automotive Medicine）: https://www.aaam.org/

### 追加情報源

- 日本外傷学会: https://www.jatec.org/
- MDCalc ISS Calculator: https://www.mdcalc.com/calc/1239/injury-severity-score-iss

## JSON作成時の技術的注意点

### 数式設定

- 最重症3部位の自動選択にはJavaScriptの配列ソート機能を活用
- AISスコア6の場合の自動75点設定
- 各部位のAISスコアの2乗和計算

### 構造化

- 6つの身体部位を明確に分離
- AISスコア0-6の選択肢を統一
- 計算結果の段階的表示
