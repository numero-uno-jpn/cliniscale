# IES-R - 問診票作成情報まとめ

## 基本情報

### 著作権

- **原版著作者**: Daniel S. Weiss, Charles R. Marmar (University of California - San Francisco)
- **日本語版作成者**: 飛鳥井望（公益財団法人東京都医学総合研究所）
- **使用許可**: 診療や調査での使用は無料、ただし許可なくウェブ上や出版物への転載は禁止

### 尺度の概要

- **正式名称**: Impact of Event Scale-Revised (IES-R)
- **日本語名**: 改訂出来事インパクト尺度
- **対象年齢**: 原則として12歳以上（大人が説明補助すれば8歳以上でも可）
- **評価目的**: トラウマ体験による主観的苦痛、PTSD関連症状の評価
- **実施時間**: 2-5分
- **回答者**: 本人（自記式質問紙）

### 開発背景

- **開発者**: Weiss, D.S. & Marmar, C.R.
- **発行年**: 1996年（日本語版: 2002年）
- **理論的基盤**: DSM-IV PTSD診断基準
- **標準化サンプル**: 4つの異なるトラウマ体験集団で妥当性検証

## 尺度構成

### 全体構造

- **総項目数**: 22項目
- **サブスケール数**: 3つ
- **評価方式**: 5段階リッカート尺度（0: 全くなし ～ 4: 非常に）

### 侵入症状 Intrusion - 8項目

- 項目1, 2, 3, 6, 9, 14, 16, 20
- 外傷体験の記憶や感情が意図せず侵入してくる症状
- 再体験症状、フラッシュバック、悪夢など

### 回避症状 Avoidance - 8項目

- 項目5, 7, 8, 11, 12, 13, 17, 22
- トラウマ関連の刺激や記憶を意図的に避ける症状
- 麻痺症状、認知的回避、行動的回避など

### 過覚醒症状 Hyperarousal - 6項目

- 項目4, 10, 15, 18, 19, 21
- 神経過敏、睡眠障害、集中困難など覚醒レベルの亢進

## 信頼性・妥当性

### 信頼性

- **内的整合性**: Cronbach's α = 0.92-0.95（Total）、0.88-0.91（Intrusion）、0.81-0.90（Avoidance）、0.80-0.86（Hyperarousal）
- **テスト再テスト信頼性**: r = 0.86（2週間後、N=114）

### 妥当性

- **感度**: 0.89（早期）、0.75（長期）
- **特異度**: 0.93（早期）、0.71（長期）
- **陽性的中率**: 0.80（早期）、0.44（長期）
- **陰性的中率**: 0.96（早期）、0.90（長期）

## 得点化・解釈

### 基本得点

- 各項目0-4点で評価
- 総得点: 0-88点（全項目の合計）
- サブスケール得点: 各項目の平均値で算出推奨

### スクリーニングカットオフ値

- **24/25点**: PTSDスクリーニング目的の推奨カットオフ値
- **25点以上**: PTSD + partial PTSDのスクリーニング陽性

## 実施上の注意点

### 対象者

- 特定のトラウマ体験を有する者
- 過去1週間の症状について評価可能な状態

### 評価者

- 専門的訓練を受けた医療・福祉関係者による実施推奨
- 結果解釈には臨床的判断が必要

### 制限事項

- 診断ツールではなくスクリーニング・評価尺度
- 臨床面接による診断の代替にはならない
- DSM-5の完全対応ではない（DSM-IV基準）

## 参考文献・URL

### 主要文献

- **原版**: Weiss, D.S.: The Impact of Event Scale-Revised. In: Wilson, J.P., Keane T.M. eds., Assessing psychological trauma and PTSD (Second Edition). The Guilford Press, New York, 2004, pp168-189.
- **日本語版**: Asukai, N., Kato, H., Kawamura, N., et al.: Reliability and validity of the Japanese-language version of the Impact of Event Scale-Revised (IES-R-J): Four studies on different traumatic events. The Journal of Nervous and Mental Disease 190:175-182, 2002.

### 公式URL

- **米国退役軍人省PTSD研究センター**: https://www.ptsd.va.gov/professional/assessment/adult-sr/ies-r.asp
- **日本トラウマティック・ストレス学会**: https://www.jstss.org/docs/2017121200368/
- **東京都医学総合研究所**: https://mentalhealth-unit.jp/research/ptsd

### 追加情報源

- **保険診療**: 心理検査法として保険診療報酬対象（診療点数80点）

## JSON作成時の技術的注意点

### 数式設定

- 総得点: 全22項目のインデックス値合計
- サブスケール得点: 該当項目のインデックス値合計
- スクリーニング判定: `[[total_score]] >= 25`で警告表示

### 構造化

- 対象となるトラウマ体験の記載欄を冒頭に設置
- 5段階評価は`selectoridx: "0|1|2|3|4"`で数値化
- スコア計算項目は`dispname`未定義で非表示設定
- 各質問項目は原典の表現を忠実に再現
