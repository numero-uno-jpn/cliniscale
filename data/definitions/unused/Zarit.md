# Zarit介護負担尺度 作成情報まとめ

## 基本情報

### 著作権

Copyright 1983, 1990, Steven H. Zarit and Judy M. Zarit  
臨床・非営利学術研究での使用は無償可能(営利目的は要許可)

### 尺度の概要

- **正式名称**: Zarit Burden Interview (ZBI)
- **日本語名**: Zarit介護負担尺度日本語版 (J-ZBI)
- **対象年齢**: 成人介護者
- **評価目的**: 介護者の主観的負担感の評価
- **実施時間**: 5-10分
- **回答者**: 介護者本人

### 開発背景

- **開発者**: Steven H. Zarit, Kay E. Reever, Julie Bach-Peterson
- **発行年**: 1980年(原典29項目)、1983年(22項目版)
- **理論的基盤**: ストレス理論、主観的負担の概念化
- **標準化サンプル**: 多国籍・多疾患対象で検証済み

## 尺度構成

### 全体構造

- **総項目数**: 22項目
- **サブスケール数**: 2因子（個人的負担・役割負担）
- **評価方式**: 5段階リッカート尺度(0-4点)

### 因子構造詳細

#### 1. 個人的負担 (Personal strain)

- 時間的制約
- 健康への影響
- 社会生活への支障
- 感情的ストレス(怒り、不安)
- プライバシーの制約

#### 2. 役割負担 (Role strain)

- 介護役割への不確実性
- 介護技術への不安
- 責任感・義務感
- 将来への不安

**注**: 具体的な項目配分は分析手法や対象集団により異なる。研究により3因子以上のモデルも報告されている。

## 信頼性・妥当性

### 信頼性

- **内的整合性**: クロンバックα=0.88-0.93
  - 日本語版: α=0.93 (Arai et al., 1997)
- **テスト再テスト信頼性**: r=0.71-0.85
  - 日本語版: r=0.76 (Arai et al., 1997)
- **評定者間信頼性**: 自己記入式のため該当なし

### 妥当性

- **併存妥当性**: うつ尺度(CES-D)との相関r=0.50（日本語版）、全体的負担感との相関r=0.71（日本語版）
- **構成妥当性**: 因子分析で2因子構造確認(主流)
- **弁別妥当性**: 患者重症度・ADL障害度と有意相関

## 得点化・解釈

### 基本得点

各項目0-4点で、総得点0-88点(全22項目の合計)

### 負担レベルの目安

- **軽度**: 0-20点(負担なし-軽度の負担)
- **中等度**: 21-40点(軽度-中等度の負担)
- **高度**: 41-60点(中等度-高度の負担)
- **重度**: 61-88点(高度-重度の負担)

**注**: 日本での統計的カットオフ: 24-26点(Schreiner et al., 2006)

## 実施上の注意点

### 対象者

- 家族介護者(認知症、身体障害、精神障害等)
- 成人の介護者(配偶者、子、その他親族)

### 評価者

- 自己記入式(介護者本人が回答)
- 特別な訓練は不要

### 制限事項

- 主観的評価のため、客観的負担との乖離可能性
- 文化的背景による解釈の違いに注意
- 短期間での変化検出には限界

## 参考文献・URL

### 主要文献

- Zarit, S. H., Reever, K. E., & Bach-Peterson, J. (1980). Relatives of the impaired elderly: correlates of feelings of burden. The Gerontologist, 20(6), 649-655. DOI: 10.1093/geront/20.6.649
- Arai, Y., Kudo, K., Hosokawa, T., Washio, M., Miura, H., & Hisamichi, S. (1997). Reliability and validity of the Japanese version of the Zarit Caregiver Burden Interview. Psychiatry and Clinical Neuroscience, 51(5), 281-287. DOI: 10.1111/j.1440-1819.1997.tb03199.x
- Arai, Y., Tamiya, N., & Yano, E. (2003). The short version of the Japanese version of the Zarit Caregiver Burden Interview (J-ZBI_8). Nihon Ronen Igakkai Zasshi, 40(5), 497-503.
- Schreiner, A. S., Morimoto, T., Arai, Y., & Zarit, S. (2006). Assessing family caregiver's mental health using a statistically derived cut-off score for the Zarit Burden Interview. Aging & Mental Health, 10(2), 107-111.

### 公式URL

- ePROVIDE by Mapi Research Trust: https://eprovide.mapi-trust.org/instruments/zarit-burden-interview
- 日本語版情報: http://plaza.umin.ac.jp/~pcpkg/jzbi.html

### 追加情報源

- Bédard, M., Molloy, D. W., Squire, L., et al. (2001). The Zarit Burden Interview: A new short version and screening version. The Gerontologist, 41(5), 652-657.

## JSON作成時の技術的注意点

### 数式設定

- 総得点: 全22項目のindex値を合計
- 分類: 3項演算子による4段階評価
- warning: 中等度以上の負担（21点以上）
- emergency: 高度以上の負担（41点以上）

### 構造化

- 選択肢は統一された5段階尺度を使用
- Q13のみ異なる選択肢表現(内容は同じ0-4点)
- 必須項目として全項目設定
- 評価結果セクションは患者端末に表示されず、データ取得側でのみ表示
