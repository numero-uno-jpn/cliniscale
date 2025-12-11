# Revised Trauma Score (RTS) 作成情報まとめ

## 基本情報

### 著作権

Champion HR, Sacco WJ, Copes WS, et al. A revision of the Trauma Score. J Trauma. 1989;29(5):623-9. PMID: 2657085

### 尺度の概要

- **正式名称**: Revised Trauma Score (RTS)
- **日本語名**: 外傷重症度評価スコア
- **対象年齢**: 全年齢（小児用修正版あり)
- **評価目的**: 外傷患者の生理学的重症度評価、トリアージ、予後予測
- **実施時間**: 約 2-3 分
- **回答者**: 医療従事者（バイタルサイン測定に基づく）

### 開発背景

- **開発者**: Champion HR, Sacco WJ, Copes WS, et al.
- **発行年**: 1989 年（元の Trauma Score は 1981 年）
- **理論的基盤**: 生理学的パラメータによる外傷重症度評価
- **標準化サンプル**: 北米外傷データベース（Major Trauma Outcome Study）

## 尺度構成

### 全体構造

- **総項目数**: 3 項目
- **サブスケール数**: なし（単一スケール）
- **評価方式**: 各項目 0-4 点、合計 0-12 点（簡易 RTS）、重み付け RTS: 0-7.8408 点

### サブスケール詳細

#### 1. Glasgow Coma Scale (GCS) - 1 項目

- 開眼反応（1-4 点）
- 言語反応（1-5 点）
- 運動反応（1-6 点）
- RTS では合計点に基づき 0-4 点に変換

**GCS 合計から RTS 点数への変換**:
- 13-15 点: 4 点
- 9-12 点: 3 点
- 6-8 点: 2 点
- 4-5 点: 1 点
- 3 点: 0 点

#### 2. 収縮期血圧 - 1 項目

- ≥90mmHg: 4 点
- 76-89mmHg: 3 点
- 50-75mmHg: 2 点
- 1-49mmHg: 1 点
- 0mmHg: 0 点

#### 3. 呼吸数 - 1 項目

- 10-29 回/分: 4 点
- ≥30 回/分または 6-9 回/分: 3 点
- 1-5 回/分: 2 点
- 0 回/分: 0 点

## 信頼性・妥当性

### 信頼性

- **内的整合性**: 高い相関
- **テスト再テスト信頼性**: 安定した評価が可能
- **評定者間信頼性**: 良好（特に簡易 RTS）

### 妥当性

- **感度**: 非生存者の 97%以上を正確に識別（T-RTS）
- **特異度**: 該当なし（重症度スコアのため）
- **その他**: 予測妥当性（生存率予測に高い相関）、構成概念妥当性（他の重症度指標 ISS 等との良好な相関）、臨床的妥当性（世界標準として 75 カ国以上で採用）

## 得点化・解釈

### 基本得点

- **簡易 RTS（T-RTS）**: GCS 点数 + 収縮期血圧点数 + 呼吸数点数（0-12 点）
- **重み付け RTS**: 0.9368 × GCS 点数 + 0.7326 × 収縮期血圧点数 + 0.2908 × 呼吸数点数

### トリアージ基準の目安

- **12 点**: 遅延対応可（Delayed）
- **11 点**: 緊急対応（Urgent）
- **3-10 点**: 即座対応（Immediate）
- **<3 点**: 救命困難（Expectant/Deceased）

### 搬送基準

- **11 点以下**: 外傷センターへの搬送適応
- **4 点以下（重み付け RTS）**: 外傷センター治療推奨
- **3 点未満**: 救命困難と判定される場合が多い

## 実施上の注意点

### 対象者

- 外傷患者全般
- 意識障害のある患者
- 血行動態不安定な患者

### 評価者

- 医師、看護師、救急医療技術者
- バイタルサイン測定技術が必要
- GCS 評価の習熟が重要

### 制限事項

- 挿管患者では GCS の言語反応評価が困難（NT: Not Testable と記載）
- 薬物の影響（鎮静薬等）で評価が困難な場合
- 頭部以外の重篤な外傷では過小評価の可能性
- 小児では専用の修正版使用を推奨（Eichelberger 小児係数）
- 呼吸数は患者年齢、損傷機序、人工呼吸管理の影響を受けやすい

## 参考文献・URL

### 主要文献

- Champion HR, Sacco WJ, Copes WS, et al. A revision of the Trauma Score. J Trauma. 1989;29(5):623-9. PMID: 2657085
- Teasdale G, Jennett B. Assessment of coma and impaired consciousness. A practical scale. Lancet. 1974;2(7872):81-4.
- Boyd CR, Tolson MA, Copes WS. Evaluating trauma care: the TRISS method. J Trauma. 1987;27(4):370-8.

### 公式URL

- MDCalc RTS Calculator: https://www.mdcalc.com/calc/683/revised-trauma-score
- Glasgow Coma Scale 公式: https://www.glasgowcomascale.org/
- American College of Surgeons Committee on Trauma: https://www.facs.org/quality-programs/trauma/

### 追加情報源

- 外傷初期診療ガイドライン JATEC
- StatPearls - Revised Trauma Scale: https://www.ncbi.nlm.nih.gov/books/NBK556036/

## JSON作成時の技術的注意点

### 数式設定

- GCS 合計の計算: `[[開眼反応.index]] + [[言語反応.index]] + [[運動反応.index]]`
- GCS 点数変換（修正版）: `[[GCS合計]] >= 13 ? 4 : ([[GCS合計]] >= 9 ? 3 : ([[GCS合計]] >= 6 ? 2 : ([[GCS合計]] >= 4 ? 1 : 0)))`
- 呼吸数点数変換（修正版）: `[[呼吸数]] >= 10 && [[呼吸数]] <= 29 ? 4 : ([[呼吸数]] >= 30 || ([[呼吸数]] >= 6 && [[呼吸数]] <= 9) ? 3 : ([[呼吸数]] >= 1 && [[呼吸数]] <= 5 ? 2 : 0))`
- 収縮期血圧点数: `[[収縮期血圧]] >= 90 ? 4 : ([[収縮期血圧]] >= 76 ? 3 : ([[収縮期血圧]] >= 50 ? 2 : ([[収縮期血圧]] >= 1 ? 1 : 0)))`
- 重み付け RTS: `0.9368 * [[GCS点数]] + 0.7326 * [[収縮期血圧点数]] + 0.2908 * [[呼吸数点数]]`

### 構造化

- 各バイタルサインを subsection で分離
- eval フィールドで自動計算を実装
- warning/emergency で重症度に応じた色分け表示
- description フィールドに点数配分の説明を追加（参照用）
