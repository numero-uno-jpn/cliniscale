# Norton Scale - 問診票作成情報まとめ

## 基本情報

### 著作権

Norton Scale は 1962 年に Doreen Norton, Rhoda McLaren, A.N. Exton-Smith によって開発された。原典は "An Investigation of Geriatric Nursing Problems in the Hospital" (London: National Corporation for the Care of Old People, 1962)

### 尺度の概要

- **正式名称**: Norton Scale for Predicting Pressure Ulcer Risk
- **日本語名**: ノートンスケール（褥瘡リスク評価尺度）
- **対象年齢**: 高齢者（原典では老年病院患者対象）
- **評価目的**: 褥瘡発生リスクの予測
- **実施時間**: 約 5 分
- **回答者**: 看護師等医療従事者

### 開発背景

- **開発者**: Doreen Norton
- **発行年**: 1962 年
- **理論的基盤**: 褥瘡発生に関与する 5 つの主要因子
- **標準化サンプル**: 老年病院入院患者

## 尺度構成

### 全体構造

- **総項目数**: 5 項目
- **サブスケール数**: なし（単一尺度）
- **評価方式**: 各項目 4 段階評価（1-4 点）

### 評価項目詳細

#### 1. 身体状態 (Physical Condition)

- 良好（Good）: 4 点
- やや不良（Fair）: 3 点
- 不良（Poor）: 2 点
- 非常に不良（Very bad）: 1 点

#### 2. 精神状態 (Mental Condition)

- 清明（Alert）: 4 点
- 無関心（Apathetic）: 3 点
- 混乱（Confused）: 2 点
- 昏迷（Stupor）: 1 点

#### 3. 活動度 (Activity)

- 歩行可能（Ambulant）: 4 点
- 介助で歩行（Walk with help）: 3 点
- 車椅子使用（Chair bound）: 2 点
- 寝たきり（Bedfast）: 1 点

#### 4. 可動性 (Mobility)

- 完全（Full）: 4 点
- わずかに制限（Slightly limited）: 3 点
- 非常に制限（Very limited）: 2 点
- 不動（Immobile）: 1 点

#### 5. 失禁 (Incontinence)

- なし（Not incontinent）: 4 点
- 時々（Occasionally）: 3 点
- 通常（Usually）: 2 点
- 二重失禁（Doubly incontinent）: 1 点

## 信頼性・妥当性

### 信頼性

- **内的整合性**: 詳細データ不明（初期の尺度のため）
- **テスト再テスト信頼性**: 詳細データ不明
- **評定者間信頼性**: 詳細データ不明

### 妥当性

- **感度**: 75%（メタ分析結果、95%CI: 0.70-0.79）
- **特異度**: 57%（メタ分析結果、95%CI: 0.55-0.59）
- **その他**: 活動度と可動性項目が最も予測力が高い

## 得点化・解釈

### 基本得点

各項目の得点を合計し、5-20 点で評価

### リスク分類の目安

- **低リスク**: 18 点超
- **中等度リスク**: 15-18 点
- **高リスク**: 10-14 点
- **非常に高リスク**: 9 点以下

### カットオフ値

- **14 点以下**: 褥瘡発生高リスク（一般的な基準）

## 実施上の注意点

### 対象者

- 主に高齢者、入院患者
- 褥瘡リスクのある患者

### 評価者

- 看護師等の医療従事者
- 患者の状態を十分に把握している者

### 制限事項

- 脊髄損傷患者では予測精度が低下
- 項目の記述が簡潔で評価者による解釈の違いが生じやすい
- Braden スケールと比較してより簡素

## 参考文献・URL

### 主要文献

- Norton, D., McLaren, R., Exton-Smith, A.N. An Investigation of Geriatric Nursing Problems in the Hospital. London: National Corporation for the Care of Old People; 1962
- Norton, D. Calculating the risk: Reflections on the Norton scale. Decubitus 2(3):24-31, 1989

### 公式URL

- AHRQ Patient Safety: https://www.ahrq.gov/patient-safety/settings/hospital/resource/pressureulcer/tool/pu7b.html
- SCIRE Professional: https://scireproject.com/outcome/norton-pressure-ulcer-risk-scale/

### 追加情報源

- MSD Manual Professional: https://www.merckmanuals.com/professional/multimedia/table/the-norton-scale-for-predicting-pressure-ulcer-risk

## JSON作成時の技術的注意点

### 数式設定

- 合計スコア: `[[身体状態.index]] + [[精神状態.index]] + [[活動度.index]] + [[可動性.index]] + [[失禁.index]]`
- リスク分類: 3 項演算子による多段階分類（18 点超で低リスク、15-18 点で中等度リスク、10-14 点で高リスク、9 点以下で非常に高リスク）
- 警告設定: 14 点以下で warning、10 点未満で emergency

### 構造化

- selectoridx を使用して選択肢に対応する点数を設定
- 高得点（4 点）が良い状態、低得点（1 点）が悪い状態を表現
- subsection を使用（section は dark mode 表示問題回避）
- warning/emergency 項目には必ず name と description を設定
