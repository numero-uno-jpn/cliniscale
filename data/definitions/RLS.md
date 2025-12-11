# RLS 診断基準質問票 - 作成情報まとめ

## 基本情報

### 著作権

国際レストレスレッグス症候群研究グループ（IRLSSG）

### 尺度の概要

- **正式名称**: International Restless Legs Syndrome Study Group Diagnostic Criteria and Rating Scale (IRLSSG-IRLS)
- **日本語名**: RLS 診断基準質問票（IRLS 併用）
- **対象年齢**: 成人
- **評価目的**: むずむず脚症候群の診断と重症度評価
- **実施時間**: 5-10 分
- **回答者**: 患者本人

### 開発背景

- **開発者**: 国際レストレスレッグス症候群研究グループ（IRLSSG）
- **発行年**: 2003 年（IRLS）、2014 年（診断基準改訂）
- **理論的基盤**: IRLSSG 診断基準と IRLS 重症度スケール
- **標準化サンプル**: 196 名の RLS 患者と 209 名の対照群（2003 年）

## 尺度構成

### 全体構造

- **総項目数**: 診断基準 5 項目 + IRLS 重症度評価 10 項目
- **サブスケール数**: 2（診断基準、重症度評価）
- **評価方式**: 診断基準（はい/いいえ）、重症度評価（5 段階評価 0-4 点）

### サブスケール詳細

#### 1. 診断基準項目 - 5 項目

1. 下肢の不快感による動的欲求の存在
2. 安静時の症状出現・増悪
3. 運動による症状改善
4. 夕方から夜間の症状増悪
5. 他の医学的・行動的疾患による症状でないこと（鑑別診断）

#### 2. IRLS 重症度評価項目 - 10 項目

- 不快感の程度
- 動的欲求の強さ
- 運動による改善度
- 睡眠障害の程度
- 疲労感・眠気の程度
- 全体的重症度
- 症状の頻度
- 症状の持続時間
- 日常生活への影響
- 気分変化

## 信頼性・妥当性

### 信頼性

- **内的整合性**: クロンバック α = 0.92
- **テスト再テスト信頼性**: r = 0.87
- **評定者間信頼性**: 該当なし（自己評価）

### 妥当性

- **感度**: 該当なし（診断基準のため）
- **特異度**: 該当なし（診断基準のため）
- **その他**: 構成概念妥当性（専門家パネルによる内容妥当性確認）、併存的妥当性（臨床的全般印象との相関 r = 0.74）、弁別妥当性（RLS 患者と対照群の明確な区別可能）、因子分析（単一因子構造）

### 日本語版の妥当性

- **信頼性**: ICC = 0.877（95%CI: 0.802-0.925）
- **併存的妥当性**: CGI-S との相関 r = 0.804
- **検証**: 井上雄一らによる臨床試験での検証済み（2013 年）

## 得点化・解釈

### 基本得点

- IRLS 合計スコア: 0-40 点（各項目 0-4 点の 10 項目合計）

### 重症度の目安

- **なし**: 0 点
- **軽度**: 1-10 点
- **中等度**: 11-20 点
- **重度**: 21-30 点
- **非常に重度**: 31-40 点

### 診断判定

- 診断基準 5 項目すべてが「はい」で RLS 診断（2014 年改訂基準）
- 2003 年基準では 4 項目だったが、2014 年に鑑別診断を追加

## 実施上の注意点

### 対象者

- RLS 症状を有する成人患者
- 既に RLS 診断を受けている患者の重症度評価

### 評価者

- 医師または訓練を受けた医療従事者の監督下で実施
- 患者による自己評価が基本

### 制限事項

- 小児における使用は別の診断基準を使用
- 二次性 RLS の原因疾患の評価が別途必要
- 薬物治療中の患者では症状が修飾されている可能性
- 第 5 診断基準（鑑別診断）を満たさない場合、他疾患の可能性を考慮

## 参考文献・URL

### 主要文献

- Walters AS, et al. Validation of the International Restless Legs Syndrome Study Group rating scale for restless legs syndrome. Sleep Med. 2003;4(2):121-132. (PMID:14592342)
- Allen RP, et al. Restless legs syndrome/Willis-Ekbom disease diagnostic criteria: updated International Restless Legs Syndrome Study Group (IRLSSG) consensus criteria--history, rationale, description, and significance. Sleep Med. 2014;15(8):860-873. (PMID:25023924)
- Inoue Y, et al. Reliability, validity, and responsiveness of the Japanese version of International Restless Legs Syndrome Study Group rating scale for restless legs syndrome in a clinical trial setting. Psychiatry Clin Neurosci. 2013;67(6):412-419. (PMID:23910574)

### 公式URL

- 国際レストレスレッグス症候群研究グループ: https://www.irlssg.org/
- IRLS 使用許可: https://eprovide.mapi-trust.org/

### 追加情報源

- 日本神経治療学会 RLS 診療ガイドライン
- 日本睡眠学会診療ガイドライン

## JSON作成時の技術的注意点

### 数式設定

- 診断基準充足数: 5 項目の合計（5 で診断確定、2014 年改訂基準）
- IRLS 合計スコア: 10 項目の合計（0-40 点）
- 重症度分類: スコア範囲による条件分岐

### 構造化

- 診断基準項目を最初に配置（2014 年改訂で 5 項目に）
- 診断基準満足時のみ詳細項目表示
- IRLS 重症度評価は全患者で実施
- 計算項目は患者には非表示設定
- 第 5 診断基準（鑑別診断）の追加により診断特異性向上
