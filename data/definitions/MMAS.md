# MMAS-8 作成情報まとめ

## 基本情報

### 著作権

MMAS-8 は著作権保護された尺度であり、使用には著作者 Donald E. Morisky 博士および MMAR, LLC (dba Adherence) の許可が必要です。商業利用や研究利用にはライセンス料が発生する場合があります。

### 尺度の概要

- **正式名称**: Morisky Medication Adherence Scale-8 (MMAS-8)
- **日本語名**: モリスキー服薬アドヒアランス尺度-8
- **対象年齢**: 成人 (18 歳以上)
- **評価目的**: 患者の服薬遵守行動の評価
- **実施時間**: 約 3-5 分
- **回答者**: 薬物治療を受けている患者本人

### 開発背景

- **開発者**: Donald E. Morisky 博士 (UCLA 公衆衛生大学院)
- **発行年**: 1986 年 (MMAS-4)、2008 年 (MMAS-8)
- **理論的基盤**: Health Belief Model、社会認知理論
- **標準化サンプル**: 様々な疾患群での検証 (高血圧、糖尿病、精神疾患、HIV 等)

## 尺度構成

### 全体構造

- **総項目数**: 8 項目
- **サブスケール数**: 単一因子または 2 因子構造 (意図的/無意図的非アドヒアランス)
- **評価方式**: 項目 1-7 は二択 (はい・いいえ)、項目 8 は 5 段階評価

### 項目詳細

#### 1. 無意図的非アドヒアランス項目 - 4項目

- 項目 1: 薬の飲み忘れ (一般的な忘却)
- 項目 2: 忘却以外の理由による服薬忘れ (過去 2 週間)
- 項目 4: 外出時の持参忘れ
- 項目 8: 服薬を覚えておくことの困難さの頻度

#### 2. 意図的非アドヒアランス項目 - 4項目

- 項目 3: 副作用による服薬中止 (医師への相談なし)
- 項目 5: 前回服薬機会での服薬実施 (逆転項目)
- 項目 6: 症状改善時の服薬中止
- 項目 7: 毎日の服薬継続の煩わしさ

## 信頼性・妥当性

### 信頼性

- **内的整合性**: クロンバック α = 0.67-0.89 (疾患により異なる)
- **テスト再テスト信頼性**: ICC = 0.81-0.87 (研究により変動)
- **評定者間信頼性**: 該当なし (自己評価尺度)

### 妥当性

- **構成概念妥当性**: 多くの研究で 1 因子構造を支持
- **併存妥当性**: 他の服薬アドヒアランス尺度と有意な相関
- **予測妥当性**: 疾患コントロール指標全般との関連性が示されている

## 得点化・解釈

### 基本得点

- **項目 1-7**: 各項目で「いいえ」= 1 点、「はい」= 0 点
  - **例外: 項目 5 のみ逆転項目**「はい」= 1 点、「いいえ」= 0 点
- **項目 8**: 5 段階評価を 0-1 点に標準化
  - 全く困難でない = 1 点
  - めったに困難でない = 0.75 点
  - ときどき困難 = 0.5 点
  - たいてい困難 = 0.25 点
  - いつも困難 = 0 点
- **総得点範囲**: 0-8 点 (高得点ほどアドヒアランスが高い)

### アドヒアランスレベルの判定基準

- **高アドヒアランス**: 8 点
- **中アドヒアランス**: 6-7 点
- **低アドヒアランス**: 0-5 点

## 実施上の注意点

### 対象者

- 薬物治療を受けている成人患者 (18 歳以上)
- 認知機能に重大な問題がない患者
- 自己報告が可能な患者

### 評価者

- 医療従事者または訓練を受けた研究者
- 尺度の意図と限界を理解している者
- 必要に応じて追加の客観的評価を併用することが推奨される

### 制限事項

- 自己報告バイアス: 患者が実際よりも良好なアドヒアランスを報告する可能性
- 社会的望ましさバイアス: 医療者を満足させようとする傾向
- 記憶バイアス: 過去の服薬行動の正確な記憶が困難
- 著作権による使用制限: ライセンス取得が必須

## 参考文献・URL

### 主要文献

- Morisky DE, Green LW, Levine DM. Concurrent and predictive validity of a self-reported measure of medication adherence. Med Care. 1986;24(1):67-74. PMID: 3945130
- Tan X, Patel I, Chang J. Review of the four item Morisky Medication Adherence Scale (MMAS-4) and eight item Morisky Medication Adherence Scale (MMAS-8). Innov Pharm. 2014;5(3):Article 165.
- Moon SJ, Lee WY, Hwang JS, Hong YP, Morisky DE, Shima S. Accuracy of a screening tool for medication adherence: A systematic review and meta-analysis of the Morisky Medication Adherence Scale-8. PLoS One. 2017;12(11):e0187139. PMID: 29095870

### 公式URL

- 公式サイト: https://www.moriskyscale.com/
- ライセンス情報: https://adherence.cc/mmas-8
- RehabMeasures Database: https://www.sralab.org/rehabilitation-measures/morisky-medication-adherence-scale-8

### 追加情報源

- Del Pino A, et al. Psychometric properties of the eight-item Morisky Medication Adherence Scale (MMAS-8) in a psychiatric outpatient setting. Int J Clin Health Psychol. 2018;18(2):143-151. PMID: 30487916

## JSON作成時の技術的注意点

### 数式設定

- 項目 5 の逆転処理: selectoridx を "1|0" とし、「はい」=1 点、「いいえ」=0 点とする
- 項目 8 の標準化: selectoridx を "1|0.75|0.5|0.25|0" とし、既に標準化された値を使用
- 総得点計算: 全項目のインデックス値の単純合計

### 構造化

- 全項目を required: true に設定 (未入力によるエラー回避)
- inline 表示: 項目 1-8 は inline: true で横並び表示
- eval 項目の命名: 合計スコアは「MMAS-8 合計スコア」、判定結果は「アドヒアランス判定」
- warning 設定: 低アドヒアランス (<6 点) 時に警告表示、name フィールドを必ず設定
