# HAM-A - 問診票作成情報まとめ

## 基本情報

### 著作権

パブリックドメイン（公有）

**出典**: Hamilton Anxiety Rating Scale is in the public domain (https://dcf.psychiatry.ufl.edu/files/2011/05/HAMILTON-ANXIETY.pdf)

### 尺度の概要

- **正式名称**: Hamilton Anxiety Rating Scale (HAM-A)
- **日本語名**: ハミルトン不安評価尺度
- **対象年齢**: 成人（青年・児童にも適用可能）
- **評価目的**: 不安症状の重症度評価
- **実施時間**: 10-15分
- **回答者**: 臨床医による評価（本JSONでは患者自己評価として適用）

### 開発背景

- **開発者**: Dr. Max Hamilton
- **発行年**: 1959年
- **理論的基盤**: 不安神経症の症状評価のための初期評価尺度の一つ
- **標準化サンプル**: 原著論文（1959年）に基づく

**出典**: Hamilton M. The assessment of anxiety states by rating. Br J Med Psychol 1959;32:50-55 (PMID: 13638508)

## 尺度構成

### 全体構造

- **総項目数**: 14項目
- **サブスケール数**: なし（単一尺度）
- **評価方式**: 5段階評価（0-4点）

### 心理的症状 - 6項目

- 不安気分（心配、恐怖的予期、いらいら感）
- 緊張（緊張感、疲労感、落ち着きのなさ）
- 恐怖（暗闇、見知らぬ人、動物等への恐怖）
- 不眠（入眠困難、睡眠の中断、悪夢）
- 知的機能（集中困難、記憶力低下）
- 抑うつ気分（興味減退、早朝覚醒）

### 身体的症状 - 7項目

- 身体症状（筋系）: 痛み、こり、筋緊張亢進
- 身体症状（感覚系）: 耳鳴り、視力ぼやけ、脱力感
- 心血管系症状: 頻脈、動悸、胸痛
- 呼吸器系症状: 胸部圧迫感、窒息感、息切れ
- 胃腸症状: 嚥下困難、悪心、下痢、便秘
- 泌尿生殖器症状: 頻尿、性的機能障害
- 自律神経症状: 口渇、発汗、めまい、頭痛

### 観察症状 - 1項目

- 面接時の行動: そわそわ、手の震え、表情の変化

## 信頼性・妥当性

### 信頼性

- **内的整合性**: 良好（Cronbach's α = 0.79-0.86）
- **評定者間信頼性**: 良好（ICC = 0.74-0.96）
- **テスト再テスト信頼性**: 良好（r = 0.64-0.96）

**出典**:
- Maier W, et al. The Hamilton Anxiety Scale: reliability, validity and sensitivity to change in anxiety and depressive disorders. J Affect Disord 1988;14(1):61-8 (PMID: 2963053)
- Clark DB, Donovan JE. Reliability and validity of the Hamilton Anxiety Rating Scale in an adolescent sample. J Am Acad Child Adolesc Psychiatry 1994;33(3):354-60

### 妥当性

- **構成概念妥当性**: 因子分析により心理的不安と身体的不安の2因子構造が確認
- **併存的妥当性**: 他の不安評価尺度（STAI、BAI等）との相関が確認されている（r = 0.5-0.8）
- **予測妥当性**: 治療効果の予測に有用

**出典**: 複数の検証研究、Psychology Tools (https://psychology-tools.com/test/hamilton-anxiety-rating-scale)

## 得点化・解釈

### 基本得点

各項目0-4点で評価し、全14項目の合計点（0-56点）を算出

### 重症度の目安

**重要**: カットオフ値については文献により異なる基準が報告されています。

#### 日本での推奨基準（Progress In Mind Japan）

- **0-7点**: 症状なし～かなり軽度
- **8-14点**: 軽度
- **15-23点**: 中等度
- **24-56点**: 重度

**出典**: Progress In Mind Japan (https://japan.progress.im/ja/node/10446/)

この基準は以下とも一致:
- Matza LS, et al. Identifying HAM-A cutoffs for mild, moderate, and severe generalized anxiety disorder. Int J Methods Psychiatr Res 2010;19(4):223-232 (PMID: 20718076)

#### 英語圏の従来基準（参考）

- **≤17点**: mild（軽度）
- **18-24点**: mild to moderate（軽度-中等度）
- **25-30点**: moderate to severe（中等度-重度）
- **31-56点**: severe to very severe（重度-非常に重度）

**出典**: 複数の臨床ガイドライン、Lundbeck Tools等

**注**: 両基準では例えば16点が「軽度」（従来基準）または「中等度」（日本推奨基準）となるなど、評価が異なる場合があります。臨床使用においては、使用する基準を明確にすることが重要です。

## 実施上の注意点

### 対象者

- 不安症状を有する成人患者
- 全般性不安障害、パニック障害、恐怖症等の患者
- 既に不安神経症と診断された患者での使用を前提として開発

### 評価者

- 本来は訓練を受けた臨床医による評価
- 標準化された質問例の提供なし
- 評価者の主観に依存する部分がある
- 本JSONでは患者自己評価として適用しているが、臨床医評価が望ましい

### 制限事項

- 不安症状と抗うつ薬の副作用の区別が困難な場合がある
- 身体的不安と薬物の身体副作用の区別が困難
- 診断ツールではなく症状の重症度評価ツール
- DSM-5の全般性不安障害の主症状である「過剰な心配」を十分にカバーしていない
- うつ病との鑑別が困難な場合がある

**出典**:
- Wikipedia: Hamilton Anxiety Rating Scale - Issues and limitations
- Springer Encyclopedia of Behavioral Medicine

## 参考文献・URL

### 主要文献

- Hamilton M. The assessment of anxiety states by rating. Br J Med Psychol 1959;32:50-55 (PMID: 13638508)
- Maier W, Buller R, Philipp M, Heuser I. The Hamilton Anxiety Scale: reliability, validity and sensitivity to change in anxiety and depressive disorders. J Affect Disord 1988;14(1):61-8 (PMID: 2963053)
- Matza LS, Morlock R, Sexton C, Malley K, Feltner D. Identifying HAM-A cutoffs for mild, moderate, and severe generalized anxiety disorder. Int J Methods Psychiatr Res 2010;19(4):223-232 (PMID: 20718076)

### 公式URL

- https://dcf.psychiatry.ufl.edu/files/2011/05/HAMILTON-ANXIETY.pdf (PDFフォーム)
- http://jsprs.org/scales/ham_a.html (日本精神科評価尺度研究会)
- https://japan.progress.im/ja/node/10446/ (Progress In Mind Japan - 日本語版情報)

### 追加情報源

- https://psychology-tools.com/test/hamilton-anxiety-rating-scale
- https://ebchelp.blueprint.ai/en/articles/10540598-hamilton-anxiety-rating-scale-ham-a
- https://www.mdcalc.com/calc/1843/hamilton-anxiety-scale
- https://link.springer.com/rwe/10.1007/978-1-4419-1005-9_197 (SpringerLink Encyclopedia)

## JSON作成時の技術的注意点

### 数式設定

- 総得点計算: 各項目の.indexプロパティを加算
- **重要**: 正しい構文は`[[項目名.index]]`（ドットを含める）
- 重症度分類: 3項演算子を使用した条件分岐
- **重要**: evalフィールドを数値として参照する場合は`((フィールド名))`を使用

**重症度分類の式（日本推奨基準を使用）**:

```javascript
"formula": "((total_score)) <= 7 ? \"症状なし～かなり軽度\" : ((total_score)) <= 14 ? \"軽度\" : ((total_score)) <= 23 ? \"中等度\" : \"重度\""
```

### 構造化

- 全14項目をradioタイプで定義
- selectoridxで0-4の数値インデックスを明示指定
- evalタイプで総得点と重症度分類を自動計算
- dispnameを未定義にすることで計算結果を患者画面に非表示
