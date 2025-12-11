# Altman Self-Rating Mania Scale (ASRM) 問診票作成情報まとめ

## 基本情報

### 著作権

Permission for use granted by EG Altman, MD

### 尺度の概要

- **正式名称**: Altman Self-Rating Mania Scale (ASRM)
- **日本語名**: Altman躁症状自己評価尺度
- **対象年齢**: 成人 (11-17歳版も存在)
- **評価目的**: 躁症状・軽躁症状の有無と重症度の評価
- **実施時間**: 5分未満
- **回答者**: 患者自身（自己報告式）

### 開発背景

- **開発者**: Dr. Edward G. Altman, Donald Hedeker, James L. Peterson, John M. Davis
- **発行年**: 1997年
- **理論的基盤**: DSM-IV基準と互換性、躁症状の主要な5領域を評価
- **標準化サンプル**: 105名（躁病34名、うつ病36名、統合失調症22名、統合失調感情障害13名）

## 尺度構成

### 全体構造

- **総項目数**: 5項目
- **サブスケール数**: なし（単一次元）
- **評価方式**: 5件法（0-4点）、過去1週間の症状を評価

### 評価領域詳細

#### 1. 気分の高揚 - 1項目
- 平常時と比較した幸福感・陽気さの程度

#### 2. 自信・自尊心 - 1項目
- 平常時と比較した自信の程度

#### 3. 睡眠必要性の減少 - 1項目
- 平常時と比較した睡眠時間の短縮

#### 4. 多弁性 - 1項目
- 平常時と比較した話の多さ

#### 5. 活動性の亢進 - 1項目
- 社会的、性的、仕事、家庭、学校での活動性の増加

## 信頼性・妥当性

### 信頼性

- **内的整合性**: α = 0.79
- **テスト再テスト信頼性**: r = 0.86 (2.3日間隔)

### 妥当性

- **感度**: 85.5%（カットオフ値6点以上）
- **特異度**: 87.3%（カットオフ値6点以上）
- **併存妥当性**: CARS-M (r = .766)、YMRS (r = .718)との相関

## 得点化・解釈

### 基本得点

- 5項目の合計点を算出（0-20点）

### 重症度の目安

- **0-5点**: 躁病・軽躁病の可能性は低い
- **6点以上**: 躁病・軽躁病の可能性が高い（要精査・治療検討）

## 実施上の注意点

### 対象者

- 双極性障害の疑いがある患者
- 躁症状のスクリーニングが必要な患者
- 治療効果の評価が必要な患者

### 評価者

- 患者本人による自己評価
- 簡潔で理解しやすい質問構成

### 制限事項

- 他の躁病評価尺度と比べて項目数が少ない
- 妄想症状や易刺激性などの詳細な症状評価には限界
- あくまでスクリーニングツールとして使用し、確定診断には包括的評価が必要

## 参考文献・URL

### 主要文献

- Altman EG, Hedeker D, Peterson JL, Davis JM. The Altman Self-Rating Mania Scale. Biological Psychiatry 1997;42(10):948-955
- Altman E, Hedeker D, Peterson JL, Davis JM. A comparative evaluation of three self-rating scales for acute mania. Biol Psychiatry 2001;50(6):468-471

### 公式URL

- Psychology Tools: https://psychology-tools.com/test/altman-self-rating-mania-scale
- PDF版: https://loricalabresemd.com/wp-content/uploads/2017/12/altman-mania-scale.pdf

### 追加情報源

- PubMed: https://pubmed.ncbi.nlm.nih.gov/9359982/
- Medscape Reference: https://reference.medscape.com/calculator/468/altman-self-rating-mania-scale-asrm

## JSON作成時の技術的注意点

### 数式設定

- 合計点算出: `[[気分]] + [[自信]] + [[睡眠]] + [[多弁]] + [[活動性]]`
- 判定評価: `[[合計点]] >= 6 ? "躁病・軽躁病の可能性が高い (要精査)" : "躁病・軽躁病の可能性は低い"`
- 警告表示: `[[合計点]] >= 6` でwarning表示

### 構造化

- 各項目は0-4点のradio選択形式
- selectoridxで明確な点数設定
- eval項目でdispnameを未定義にして患者には表示せず、データ取得側でのみ確認可能に設定
- warning項目でカットオフ値以上の場合に注意喚起
