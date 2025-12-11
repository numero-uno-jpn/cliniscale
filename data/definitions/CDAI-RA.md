# CDAI (関節リウマチ) - 問診票作成情報まとめ

## 基本情報

### 著作権
Aletaha D, Smolen J. The Simplified Disease Activity Index (SDAI) and the Clinical Disease Activity Index (CDAI): a review of their usefulness and validity in rheumatoid arthritis. Clin Exp Rheumatol. 2005;23(5 Suppl 39):S100-8. PMID: 16273793

### 尺度の概要
- **正式名称**: Clinical Disease Activity Index (CDAI)
- **日本語名**: 臨床疾患活動性指標
- **対象年齢**: 関節リウマチ患者（年齢制限なし）
- **評価目的**: 関節リウマチの疾患活動性評価
- **実施時間**: 約5-10分
- **回答者**: 患者と医師の共同評価

### 開発背景
- **開発者**: Aletaha D, Smolen J
- **発行年**: 2005年
- **理論的基盤**: SDAIの簡略版として開発、血液検査不要で日常診療に適用
- **標準化サンプル**: 欧米の関節リウマチ患者データを基に開発

## 尺度構成

### 全体構造
- **総項目数**: 4項目
- **サブスケール数**: なし（単一指標）
- **評価方式**: 数値の単純加算

### 評価項目詳細
#### 1. 圧痛関節数 - 1項目
- 医師による触診で圧痛を認める関節数（28関節）
- 評価対象: 肩、肘、手関節、MCP関節、PIP関節、親指IP関節、膝関節

#### 2. 腫脹関節数 - 1項目
- 医師による触診で腫脹を認める関節数（28関節）
- 同じ28関節を評価対象とする

#### 3. 患者による全般的評価 - 1項目
- 0-10cmのVASスケール
- 現在の症状が日常生活に与える影響を評価

#### 4. 医師による全般的評価 - 1項目
- 0-10cmのVASスケール
- 医師が評価する疾患活動性

## 信頼性・妥当性

### 信頼性
- **内的整合性**: クロンバックα 0.868（スリランカ研究）
- **テスト再テスト信頼性**: r = 0.88-0.92
- **評定者間信頼性**: ICC 0.85-0.95

### 妥当性
- **感度**: DAS28、SDAIとの高い相関（r > 0.90）
- **特異度**: 寛解基準として妥当性が確認済み
- **その他**: 構造的妥当性、基準関連妥当性が確立

## 得点化・解釈

### 基本得点
- CDAI = 圧痛関節数 + 腫脹関節数 + 患者VAS + 医師VAS

### 疾患活動性の分類
- **寛解**: CDAI ≤ 2.8
- **低疾患活動性**: 2.8 < CDAI ≤ 10
- **中等度疾患活動性**: 10 < CDAI ≤ 22
- **高疾患活動性**: CDAI > 22

## 実施上の注意点

### 対象者
- 関節リウマチの診断が確定している患者
- 疾患活動性の経時的評価が必要な患者

### 評価者
- 関節リウマチ診療に精通した医師
- 28関節の触診技術を有する医師

### 制限事項
- 血液検査データは含まれない
- 足関節・足趾関節は評価対象外
- 患者の主観的評価に依存する部分がある

## 参考文献・URL

### 主要文献
- Aletaha D, Smolen J. The Simplified Disease Activity Index (SDAI) and the Clinical Disease Activity Index (CDAI): a review of their usefulness and validity in rheumatoid arthritis. Clin Exp Rheumatol. 2005;23(5 Suppl 39):S100-8.
- Smolen JS, et al. Acute phase reactants add little to composite disease activity indices for rheumatoid arthritis: validation of a clinical activity score. Arthritis Res Ther. 2005;7(4):R796-806.

### 公式URL
- American College of Rheumatology: https://rheumatology.org/
- European League Against Rheumatism: https://www.eular.org/

### 追加情報源
- HOKUTO CDAI計算機: https://hokuto.app/calculator/CUfR9oolMizouwxu6Rex
- リウマチクラス: https://rheumati-class.com/learn/

## JSON作成時の技術的注意点

### 数式設定
- 計算式: `((圧痛関節数)) + ((腫脹関節数)) + ((患者VAS)) + ((医師VAS))`
- 疾患活動性分類: 三項演算子を使用した条件分岐
- Warning/Emergency: CDAIスコア10超で警告、22超で緊急

### 構造化
- 関節評価と患者評価を明確に分離
- VASスケールは0-10cmで統一
- 28関節の詳細説明をnoteフィールドで提供（親指IP関節を含む完全版）
- 医師評価項目は臨床使用を前提とした設計
