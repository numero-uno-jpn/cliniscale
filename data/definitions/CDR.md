# CDR - 問診票作成情報まとめ

## 基本情報

### 著作権
- **著作権者**: ワシントン大学アルツハイマー病研究センター
- **許可**: Reprinted with permission（許可を得て使用）
- **原典の明記**: The Clinical Dementia Rating (CDR) is a copyrighted instrument of the Alzheimer's Disease Research Center, Washington University, St. Louis, Missouri, USA. All rights reserved.

### 尺度の概要
- **正式名称**: Clinical Dementia Rating (CDR)
- **日本語名**: 臨床的認知症尺度
- **対象年齢**: 高齢者（主に認知症が疑われる者）
- **評価目的**: 認知症の重症度評価
- **実施時間**: 約 30-45 分
- **回答者**: 家族・介護者からの情報収集、本人への問診併用

### 開発背景
- **開発者**: Hughes CP, Berg L, Danziger WL ら
- **発行年**: 1982 年
- **理論的基盤**: 認知症の日常生活機能障害に基づく重症度評価
- **標準化サンプル**: 国際的に広く使用、日本版は目黒による標準化

## 尺度構成

### 全体構造
- **総項目数**: 6 項目
- **サブスケール数**: なし（6 つの独立した評価領域）
- **評価方式**: 5 段階評価（0 点、0.5 点、1 点、2 点、3 点）

### 評価項目詳細
#### 1. 記憶 - 1項目
- 記憶機能の障害程度を評価
- 日常生活での物忘れ、学習能力、想起能力

#### 2. 見当識 - 1項目
- 時間、場所、人物の見当識
- 日付、季節、場所の認識能力

#### 3. 判断力と問題解決 - 1項目
- 日常的な問題への対処能力
- 類似性や相違の判断、社会的判断

#### 4. 地域社会活動 - 1項目
- 仕事、買い物、社会活動への参加
- 家庭外での自立度

#### 5. 家庭生活と趣味・関心 - 1項目
- 家事、趣味活動の維持
- 知的興味の保持状況

#### 6. 身の回りの管理 - 1項目
- 身の回りの管理能力
- 着脱、整容、失禁の状況

## 信頼性・妥当性

### 信頼性
- **内的整合性**: 高い信頼性が報告されている
- **評定者間信頼性**: ICC = 0.8-0.9 程度の高い一致度
- **テスト再テスト信頼性**: 安定した再現性

### 妥当性
- **基準関連妥当性**: MMSE など他の認知機能検査と強い相関
- **構成概念妥当性**: 認知症の重症度を適切に反映
- **その他**: 将来の認知機能低下を予測可能

## 得点化・解釈

### 基本得点
- 各項目を 0、0.5、1、2、3 の 5 段階で評価
- CDR Sum of Boxes（CDR-SB）：6 項目の合計点（0-18 点）
- 全般的 CDR（Global CDR）：Morris 1993 アルゴリズムで算出

### 重症度分類の目安
- **CDR 0（健康）**: 認知機能正常
- **CDR 0.5（認知症疑い）**: 軽度認知障害（MCI）
- **CDR 1（軽度認知症）**: 軽度認知症
- **CDR 2（中等度認知症）**: 中等度認知症
- **CDR 3（重度認知症）**: 重度認知症

### 全般的 CDR 判定ルール（Morris 1993）
記憶項目（M）を最重視し、他の 5 つの副次項目との組み合わせで判定：

1. **M = 0 の場合**: 副次項目の 2 項目以上が 0.5 以上 → Global CDR = 0.5、その他 → Global CDR = 0
2. **M = 0.5 の場合**: 副次項目の 3 項目以上が 1 以上 → Global CDR = 1、その他 → Global CDR = 0.5
3. **M = 1 の場合**: 副次項目の 3 項目以上が 0 → Global CDR = 0.5、その他 → Global CDR = 1
4. **M = 2 の場合**: 副次項目の 3 項目以上が 0 → Global CDR = 0.5、その他 → Global CDR = 2
5. **M = 3 の場合**: Global CDR = 3

## 実施上の注意点

### 対象者
- 認知症が疑われる高齢者
- 認知機能低下の経過観察が必要な者

### 評価者
- 医師、心理士等の専門職
- CDR 認定トレーニング受講が望ましい
- 半構造化面接の技能が必要

### 制限事項
- 認知症の診断ツールではない（重症度評価のみ）
- 主観的評価に依存する部分がある
- 文化的背景を考慮した解釈が必要

## 参考文献・URL

### 主要文献
- Hughes CP et al. A new clinical scale for the staging of dementia. Br J Psychiatry 1982;140:566-72
- Morris JC. The Clinical Dementia Rating (CDR): current version and scoring rules. Neurology 1993;43:2412-2414
- 目黒謙一. 認知症早期発見のための CDR 判定ハンドブック. 医学書院, 2008

### 公式URL
- National Alzheimer's Coordinating Center: https://naccdata.org/data-collection/tools-calculators/cdr
- ワシントン大学 CDR スコアリングルール: https://knightadrc.wustl.edu/professionals-clinicians/cdr-dementia-staging-instrument/cdr-scoring-rules/

### 追加情報源
- J-ADNI（Japanese Alzheimer's Disease Neuroimaging Initiative）で CDR-J 使用
- AMED 認知症研究での標準化検査として推奨

## JSON作成時の技術的注意点

### 数式設定
- Morris 1993 アルゴリズムを段階的 eval フィールドで実装
- 記憶項目を最優先とした判定ルールの正確な反映
- 中間計算フィールドによる可読性確保

### 構造化
- 6 つの独立した評価項目を順次配置
- スコア計算と重症度判定を段階的に自動化
- 警告・緊急フラグで高リスク症例を識別
