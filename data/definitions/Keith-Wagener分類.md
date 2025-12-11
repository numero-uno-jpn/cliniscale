# Keith-Wagener 分類 作成情報まとめ

## 基本情報

### 著作権

Keith-Wagener-Barker 分類は 1939 年に Keith NM、Wagener HP、Barker NW によって発表された医学的分類法です。原著論文は公共のドメインであり、医学的標準として国際的に確立されています。

### 尺度の概要

- **正式名称**: Keith-Wagener-Barker Classification
- **日本語名**: キース・ワグナー・バーカー分類
- **対象年齢**: 高血圧患者・健康診断受診者
- **評価目的**: 高血圧性網膜症の重症度分類と予後予測
- **実施時間**: 眼底検査時間に含まれる (数分)
- **回答者**: 眼科医・内科医

### 開発背景

- **開発者**: Keith NM, Wagener HP, Barker NW
- **発行年**: 1939 年
- **理論的基盤**: 高血圧による網膜血管変化の系統的観察と予後との相関
- **標準化サンプル**: 1939 年発表時の症例に基づく
- **歴史的意義**: 網膜所見と予後の関連を初めて定量的に示した古典的研究

## 尺度構成

### 全体構造

- **総項目数**: 原典の分類は 4 段階 (Grade 1-4)、本実装は 5 段階 (0 群 + Grade 1-4)
- **サブスケール数**: なし
- **評価方式**: 眼底所見による段階的評価

### 各群詳細 (原典準拠)

#### 0群 - 正常眼底

- 眼底に異常所見なし
- 正常範囲
- 原典には存在せず、日本で追加された区分

#### Grade 1 - 軽度

- 軽度の全般的な網膜細動脈狭窄 (mild, generalized constriction of retinal arterioles)
- 軽度の高血圧性変化
- 予後: 約 70%が 3 年生存 (原典データ)
- 臨床対応: 経過観察

#### Grade 2 - 中等度

- 明確な局所的な網膜細動脈狭窄 (definite focal narrowing of retinal arterioles)
- 動静脈交叉現象 (AV nicking)
- 中等度の高血圧性変化と動脈硬化
- 臨床対応: 要経過観察

#### Grade 3 - 高血圧性網膜症

原典の必須条件:

- Grade 2 の所見を含む
- AND 火焔状出血 (flame-shaped hemorrhages)
- AND 軟性白斑・綿花状白斑 (cotton-wool spots)
- AND 硬性白斑 (hard exudates)
- 重要: 上記 3 つの所見すべてが必要 (AND 条件)
- 高血圧性網膜症、臓器障害あり
- 臨床対応: 要精密検査・治療

#### Grade 4 - 悪性高血圧

- Grade 3 の所見すべて
- AND 視神経乳頭浮腫 (papilledema)
- 悪性高血圧、最高リスク
- 予後: 約 6%のみが 3 年生存 (原典データ)
- 臨床対応: 緊急降圧治療の適応

## 信頼性・妥当性

### 信頼性

- **歴史的評価**: 80 年以上使用されている古典的分類法
- **評価者間信頼性**: Grade 1 と 2 の区別が難しいとの指摘あり (近年の研究)
- **臨床的信頼性**: 国際的に広く認知されている標準的評価法

### 妥当性

- **予測妥当性**: 原典 (1939 年) で Grade 1 の 70%が 3 年生存、Grade 4 の 6%のみが 3 年生存と報告
- **構成概念妥当性**: 全身血管状態との相関が確認済み
- **臨床的妥当性**: 高血圧性臓器障害の評価指標として国際的に認知
- **現代的評価**: 近年、より簡略化された Wong-Mitchell 分類 (2004 年) が提案されている

## 得点化・解釈

### 基本判定

- **0 群**: 正常
- **Grade 1**: 軽度異常 (経過観察)
- **Grade 2**: 要経過観察
- **Grade 3**: 要精密検査・治療 (高血圧性臓器障害あり)
- **Grade 4**: 緊急対応 (悪性高血圧、緊急降圧治療の適応)

### 臨床的意義

- **高血圧性臓器障害の指標**: Grade 3 以上で高血圧性臓器障害ありと判定
- **緊急性の判断**: Grade 4 (視神経乳頭浮腫あり) は悪性高血圧の可能性、緊急降圧治療の適応
- **予後評価**: Grade 1 約 70%が 3 年生存、Grade 4 約 6%が 3 年生存 (原典データ、現代の治療では大幅に改善)

## 実施上の注意点

### 対象者

- 高血圧患者 (特に降圧目標達成の評価時)
- 健康診断・人間ドック受診者
- 眼底検査実施可能な患者

### 評価者

- 眼底所見の読影が可能な医師 (眼科医または内科医)
- 原典の分類基準を正確に理解している必要がある
- 特に Grade 3 の判定: 出血・軟性白斑・硬性白斑の 3 つすべてが必要

### 制限事項

- 技術的制約: 眼底検査の画質や撮影条件により評価精度が変わる
- Grade 1 と 2 の区別: 主観的要素が大きく、評価者間で差が出やすい
- 眼疾患合併例: 白内障、硝子体混濁などがある場合は観察困難
- 他の網膜疾患: 糖尿病網膜症など他の疾患と鑑別が必要

## 参考文献・URL

### 主要文献

- Keith NM, Wagener HP, Barker NW: Some different types of essential hypertension: their course and prognosis. Am J Med Sci 1939; 197: 332-343
- Keith NM, Wagener HP, Barker NW: Some different types of essential hypertension: their course and prognosis. Am J Med Sci 1974; 268: 336-345 (再録版)
- Walsh JB: Hypertensive retinopathy. Description, classification, and prognosis. Ophthalmology 1982; 89: 1127-1131
- Wong TY, Mitchell P: Hypertensive retinopathy. N Engl J Med 2004; 351: 2310-2317

### 公式URL

- StatPearls (NCBI): https://www.ncbi.nlm.nih.gov/books/NBK525980/
- EyeWiki (American Academy of Ophthalmology): https://eyewiki.org/Hypertensive_Retinopathy
- 日本人間ドック学会: https://www.ningen-dock.jp/
- 日本高血圧学会: https://www.jpnsh.jp/

### 追加情報源

- 日本人間ドック学会: 眼底健診判定マニュアル (2015 年版)
- 日本高血圧学会: 高血圧治療ガイドライン 2019 (JSH2019)
- 谷川篤宏: 眼底所見「② 高血圧の眼底」現代医学 2024; 71(1): 115-8

## JSON作成時の技術的注意点

### 数式設定

- Grade 3 判定の厳密な実装: 出血 AND 軟性白斑 AND 硬性白斑 (3 つすべて必須)
- 中間変数の活用: 未入力項目による N/A 問題を回避
- checkbox の文字列判定: インデックスではなく選択肢テキストで判定
- warning/emergency 設定: Grade 3 に warning、Grade 4 に emergency を設定

### 構造化

- 評価項目の包括性: 原典の基本項目に加え、日本の臨床実践で使用される項目も含む
- 予後情報の追加: 原典の「3 年生存率」を評価項目に追加
- 適切な selectoridx 設定: checkbox は "0|1"、radio は 0 始まりで連番
