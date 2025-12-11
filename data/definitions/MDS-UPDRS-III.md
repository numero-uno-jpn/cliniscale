# MDS-UPDRS Part III 作成情報まとめ

## 基本情報

### 著作権

©2008 International Parkinson and Movement Disorder Society

### 尺度の概要

- **正式名称**: Movement Disorder Society-Unified Parkinson's Disease Rating Scale Part III (MDS-UPDRS Part III)
- **日本語名**: 運動障害学会改訂版統一パーキンソン病評価尺度 Part III (運動症状検査)
- **対象年齢**: パーキンソン病患者全年齢
- **評価目的**: パーキンソン病の運動症状の客観的評価
- **実施時間**: 15 分程度
- **回答者**: 訓練を受けた医療従事者による客観的評価

### 開発背景

- **開発者**: Movement Disorder Society UPDRS Revision Task Force
- **発行年**: 2008 年
- **理論的基盤**: パーキンソン病の運動症状に基づく臨床評価
- **標準化サンプル**: 877 名の英語圏パーキンソン病患者 (39 施設、2008 年)

## 尺度構成

### 全体構造

- **総項目数**: 18 項目 (左右別評価により 33 スコア)
- **サブスケール数**: なし
- **評価方式**: 0-4 点の 5 段階評価、最大 132 点

### 評価項目詳細

#### 1. 構語・表情症状 - 2項目

- 構語障害
- 顔面表情

#### 2. 安静時振戦症状 - 5スコア

- 頸部、右上肢、左上肢、右下肢、左下肢の安静時振戦

#### 3. 動作時振戦症状 - 6スコア

- 右上肢、左上肢の動作時振戦 (項目 3.8-3.9)
- 右上肢、左上肢、右下肢、左下肢の動作時振戦 (項目 3.30-3.33)

#### 4. 硬縮症状 - 5スコア

- 頸部、右上肢、左上肢、右下肢、左下肢の筋強剛の評価

#### 5. 運動緩慢症状 - 11スコア

- 上肢運動 (6 スコア): 指タップ、手の動き、手回し運動 (各左右)
- 下肢運動 (4 スコア): 足タップ、足の敏捷性 (各左右)
- 全体的運動緩慢 (1 スコア)

#### 6. 軸性症状・姿勢・歩行 - 4項目

- 起立
- 歩行
- すくみ足
- 姿勢安定性

## 信頼性・妥当性

### 信頼性

- **内的整合性**: Cronbach's alpha = 0.93 (Part III)
- **テスト再テスト信頼性**: 高い相関係数
- **評定者間信頼性**: 訓練プログラムにより標準化可能

### 妥当性

- **構成概念妥当性**: 2 因子構造 (振戦・非振戦ドメイン)
- **基準関連妥当性**: 元の UPDRS との高い相関 (r = 0.96)
- **臨床的妥当性**: 薬物療法効果の検出に有効

## 得点化・解釈

### 基本得点

- 各項目 0-4 点の 5 段階評価
- 総合得点: 0-132 点 (33 スコアの合算)
- 高得点ほど運動症状が重度

### 重症度の参考分類

**重要な注意**: 以下のカットオフ値は後の研究で提案されたものであり、公式の診断基準ではありません。

- **軽度**: 0-32 点 (日常生活への影響が最小限)
- **中等度**: 33-58 点 (明確な運動症状、介入が必要)
- **重度**: 59-132 点 (重大な運動機能障害、広範な介入が必要)

## 実施上の注意点

### 対象者

- パーキンソン病の確定診断を受けた患者
- 薬物状態 (ON/OFF) を明確にして評価
- 認知機能低下が重度の場合は評価が困難な場合あり

### 評価者

- 神経内科医または訓練を受けた医療従事者
- MDS-UPDRS 訓練プログラムの修了が推奨
- 評価の標準化のため、項目別の詳細な指示を遵守

### 制限事項

- 客観的評価のため評価者の技量に依存
- 薬物状態により結果が大きく変動
- **重要**: Part III のスコアを他の Part (I, II, IV) と合計することは統計学的に妥当でない (Goetz 2022)
- Part III は独立して報告すべき

## 参考文献・URL

### 主要文献

- Goetz CG, Tilley BC, Shaftman SR, et al. Movement Disorder Society-sponsored revision of the Unified Parkinson's Disease Rating Scale (MDS-UPDRS): scale presentation and clinimetric testing results. Mov Disord. 2008;23(15):2129-2170. PMID: 19025984
- Martinez-Martin P, Rodriguez-Blazquez C, Alvarez M, et al. Parkinson's disease severity levels and MDS-Unified Parkinson's Disease Rating Scale. Parkinsonism Relat Disord. 2015;21(1):50-54. PMID: 25466406
- Goetz CG, Choi D, Guo Y, et al. It Is as It Was: MDS-UPDRS Part III Scores Cannot Be Combined with Other Parts to Give a Valid Sum. Mov Disord. 2022;37(12):2503-2505. PMID: 36480107

### 公式URL

- Movement Disorder Society: https://www.movementdisorders.org/MDS-Rating-Scales/MDS-Unified-Parkinsons-Disease-Rating-Scale-MDS-UPDRS
- MDS-UPDRS 公式翻訳版 (日本語) が提供されている

### 追加情報源

- パーキンソン病診療ガイドライン 2018 (日本神経学会)
- 各国の Movement Disorder Society 支部による研修プログラム
- MDS-UPDRS 教育用ビデオプログラム

## JSON作成時の技術的注意点

### 数式設定

- 合計スコア: 33 スコアの単純合算 (各項目の index 値を使用)
- 重症度分類: 閾値による 3 段階参考分類 (三項演算子使用)
- Part III は他の Part と合計しないことを明示

### 構造化

- セクション分けで症状群別に整理 (subsection 使用)
- 左右別評価: フィールド名に明確に「右」「左」を含める
- 評価時期の記録: 薬物状態 (ON/OFF) の記録を含める
- 選択肢の標準化: すべて 0-4 点の 5 段階、selectoridx: "0|1|2|3|4" を使用
- 各項目は required: true を推奨 (評価の完全性確保)
- warning は合計スコア 33 点以上 (中等度以上の参考値)
- emergency は合計スコア 59 点以上 (重度の参考値)
- warning/emergency 項目には name フィールドを必ず設定
