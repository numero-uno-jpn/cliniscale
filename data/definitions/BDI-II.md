# BDI-II 問診票作成情報まとめ

## 基本情報

### 著作権

著作権は Aaron T. Beck, Robert A. Steer, Gregory K. Brown に帰属します。
日本版は小嶋雅代・古川壽亮により作成されました。

### 尺度の概要

- **正式名称**: Beck Depression Inventory-Second Edition (BDI-II)
- **日本語名**: ベック抑うつ質問票 第 2 版
- **対象年齢**: 13 歳〜80 歳
- **評価目的**: うつ病症状の重症度評価
- **実施時間**: 5〜10 分
- **回答者**: 本人（自記式）

### 開発背景

- **開発者**: Aaron T. Beck, Robert A. Steer, Gregory K. Brown
- **発行年**: 1996 年（BDI-II として改訂）
- **理論的基盤**: DSM-IV 診断基準に基づく
- **標準化サンプル**: 500 名の精神科外来患者（平均年齢 37.2 歳）

## 尺度構成

### 全体構造

- **総項目数**: 21 項目
- **サブスケール数**: なし（単一次元）
- **評価方式**: 4 段階評価（0-3 点）

### 項目内容

1. 悲しみ
2. 悲観主義
3. 過去の失敗
4. 喜びの喪失
5. 罪悪感
6. 罰せられている感情
7. 自己嫌悪
8. 自己批判
9. 自殺念慮または希死念慮
10. 泣くこと
11. 興奮
12. 興味の喪失
13. 優柔不断
14. 無価値感
15. エネルギーの喪失
16. 睡眠パターンの変化
17. いらいら
18. 食欲の変化
19. 集中困難
20. 疲労感
21. 性への興味の喪失

## 信頼性・妥当性

### 信頼性

- **内的整合性**: α = 0.92（外来患者）、α = 0.93（大学生）
- **テスト再テスト信頼性**: r = 0.93（1 週間間隔）
- **評定者間信頼性**: 該当なし（自記式）

### 妥当性

- **併存的妥当性**: ハミルトンうつ病評価尺度との相関 r = 0.71
- **構成概念妥当性**: DSM-IV 診断基準との整合性確認
- **弁別的妥当性**: うつ病患者と健常者の有意な差を確認

## 得点化・解釈

### 基本得点

- 各項目 0-3 点の 4 段階評価
- 総得点範囲：0-63 点
- 高得点ほど重症度が高い

### 重症度分類の目安

- **最小限（Minimal）**: 0-13 点
- **軽度（Mild）**: 14-19 点
- **中等度（Moderate）**: 20-28 点
- **重度（Severe）**: 29-63 点

## 実施上の注意点

### 対象者

- 13 歳以上 80 歳以下の青年・成人
- 読字能力必要（平均読解レベル：小学 3.6 年生）

### 評価者

- 自記式のため特別な訓練不要
- 視覚障害や注意散漫の場合は口頭で実施可能

### 制限事項

- 診断ツールではなく重症度評価ツール
- 身体疾患患者では身体症状により得点が高くなる可能性
- 自殺リスクの評価には追加アセスメントが必要

## 参考文献・URL

### 主要文献

- Beck, A.T., Steer, R.A., & Brown, G.K. (1996). Manual for the Beck Depression Inventory-II. San Antonio, TX: Psychological Corporation.
- Beck, A.T., Ward, C.H., Mendelson, M., Mock, J., & Erbaugh, J. (1961). An inventory for measuring depression. Archives of General Psychiatry, 4, 561-571.

### 公式URL

- Pearson Assessments: https://www.pearsonassessments.com/HAIWEB/Cultures/en-us/Productdetail.htm?Pid=015-8018-370
- 日本版（日本文化科学社）: https://www.nichibun.co.jp/seek/kensa/bdi2.html

### 追加情報源

- Naviauxlab: https://naviauxlab.ucsd.edu/wp-content/uploads/2020/09/BDI21.pdf
- 千葉テストセンター: https://www.chibatc.co.jp/cgi/web/index.cgi?c=catalogue-zoom&pk=139

## JSON作成時の技術的注意点

### 数式設定

- 各項目の選択肢インデックス（.index）を使用して合計点を計算
- 睡眠と食欲の項目は特殊な採点方式（1a/1b=1 点、2a/2b=2 点、3a/3b=3 点）
- 重症度分類は条件式を使用（三項演算子）

### 構造化

- 各質問項目には selectoridx で正確な得点を設定
- 合計点と重症度分類は eval タイプで自動計算
- dispname は未定義にして患者画面に表示されないように設定
