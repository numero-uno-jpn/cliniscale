# IOIBD Disease Severity Index - 問診票作成情報まとめ

## 基本情報

### 著作権

原典論文は学術論文として発表されており、問診票の臨床使用に関する著作権上の制限は明記されていない。

### 尺度の概要

- **正式名称**: Disease Severity Index for Inflammatory Bowel Disease (IOIBD DSI)
- **日本語名**: IOIBD炎症性腸疾患重症度指数
- **対象年齢**: 成人
- **評価目的**: 炎症性腸疾患（クローン病・潰瘍性大腸炎）の包括的重症度評価
- **実施時間**: 10-15分
- **回答者**: 患者本人（医師による客観的評価項目含む）

### 開発背景

- **開発者**: International Organization for the Study of IBD (IOIBD) 専門医グループ
- **発行年**: 2018年（開発）、2024年（妥当性検証）
- **理論的基盤**: コンジョイント分析による専門医意見の統合
- **標準化サンプル**: 369名（クローン病230名、潰瘍性大腸炎139名）、2024年検証研究

## 尺度構成

### 全体構造

- **総項目数**: クローン病16項目、潰瘍性大腸炎13項目
- **サブスケール数**: 3つの主要ドメイン
- **評価方式**: 各項目に重み付けされた点数制（100点満点）

### 炎症負荷（Inflammatory Burden）

- 粘膜病変の程度
- C反応性蛋白質（CRP）レベル
- アルブミン値
- 貧血の有無

### 疾患表現型（Disease Phenotype）

- 病変範囲・分布
- 合併症の既往（瘻孔、膿瘍、腸切除術など）
- 疾患特異的症状

### 患者への影響（Impact on Patient）

- 日常生活への影響
- 症状の程度（腹痛、排便異常等）
- 治療歴（生物学的製剤、ステロイド使用等）

## 信頼性・妥当性

### 信頼性

- **内的整合性**: クローン病α > 0.59、潰瘍性大腸炎α > 0.75
- **評定者間信頼性**: クローン病ICC 0.93、潰瘍性大腸炎ICC 0.97
- **テスト再テスト信頼性**: 重み付きκ > 0.4（ほとんどの項目で良好）

### 妥当性

- **感度**: 86%（カットオフ値23点）
- **特異度**: 71%（カットオフ値23点）
- **予測精度**: AUROC = 0.82（24ヶ月複雑病状経過予測）

## 得点化・解釈

### 基本得点

- 各項目に疾患特異的な重み付けが設定され、合計100点で評価
- クローン病と潰瘍性大腸炎で異なる項目構成

### 重症度の目安

- **軽度-中等度**: 0-22点
- **重度**: 23点以上（複雑な病状経過のリスクが高い）

### 臨床的意義

- 23点以上: 24ヶ月以内に薬物療法強化、再入院、手術等のリスクが高い
- 将来の疾患進行と治療必要性の予測に有用

## 実施上の注意点

### 対象者

- 確定診断された炎症性腸疾患患者（成人）
- クローン病または潰瘍性大腸炎の診断が必要

### 評価者

- 消化器科専門医または十分な訓練を受けた医療従事者
- 内視鏡所見、検査データへのアクセスが必要

### 制限事項

- 小児には適用されない
- 急性期・重篤例では一部項目の評価が困難な場合がある
- 定期的な再評価が推奨される

## 参考文献・URL

### 主要文献

- Swaminathan A, et al. The Disease Severity Index for Inflammatory Bowel Disease Is a Valid Instrument that Predicts Complicated Disease. Inflammatory Bowel Diseases. 2024;30(11):2064-2075. [PMID: 38134391]
- Pariente B (Siegel CA lead author), et al. Development of an index to define overall disease severity in IBD. Gut. 2018;67(2):244-254. [PMID: 27780886]

### 公式URL

- International Organization for the Study of IBD: https://www.ioibd.org/

### 追加情報源

- Turner D, et al. STRIDE-II: an update on the Selecting Therapeutic Targets in Inflammatory Bowel Disease (STRIDE) Initiative of the International Organization for the Study of IBD (IOIBD). Gastroenterology. 2021;160(5):1570-1583.

## JSON作成時の技術的注意点

### 数式設定

- 条件分岐式でクローン病・潰瘍性大腸炎別に異なる項目を計算
- 重み付けされたインデックス値を使用
- カットオフ値23点による警告表示設定
- eval式内の括弧に注意（`((field.index))`形式の前後に空白を入れてエラー回避）

### 構造化

- 疾患種類による条件分岐を適切に設定
- 各項目の重み付けを原典に忠実に反映
- 中間計算項目をnoreport=trueに設定し、最終結果のみ表示
- sectionフィールドは使用せず、すべてsubsectionを使用（dark modeバグ対策）
- warning項目には必ずname属性を追加
