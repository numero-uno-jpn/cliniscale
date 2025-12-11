# DHI (Dizziness Handicap Inventory) - 問診票作成情報まとめ

## 基本情報

### 著作権
原著論文: Jacobson GP, Newman CW. The development of the Dizziness Handicap Inventory. Arch Otolaryngol Head Neck Surg. 1990;116(4):424-427. (著作権は American Medical Association に帰属)

### 尺度の概要
- **正式名称**: Dizziness Handicap Inventory (DHI)
- **日本語名**: めまい障害度評価票
- **対象年齢**: 制限なし（成人向け）
- **評価目的**: めまい・平衡障害が日常生活に与える影響の評価
- **実施時間**: 10 分以内
- **回答者**: 患者本人

### 開発背景
- **開発者**: Gary P. Jacobson, Craig W. Newman
- **発行年**: 1990 年
- **理論的基盤**: 前庭系疾患による自覚的な障害度の定量評価
- **標準化サンプル**: 初回研究 106 名の連続患者

## 尺度構成

### 全体構造
- **総項目数**: 25 項目
- **サブスケール数**: 3 サブスケール
- **評価方式**: 3 段階評価（はい=4 点、時々=2 点、いいえ=0 点）

### サブスケール詳細
#### 1. 機能的側面（Functional） - 9項目
- 仕事や娯楽での外出制限
- ベッドの出入りの困難
- 社会活動参加の制限
- 読書の困難
- 高い場所の回避
- 激しい家事・庭仕事の困難
- 一人での散歩の困難
- 暗闇での家内歩行の困難
- 仕事・家事への支障

#### 2. 感情的側面（Emotional） - 9項目
- イライラ感
- 付き添いなしでの外出への恐怖
- 他人の前での恥ずかしさ
- 酔っていると思われる心配
- 集中困難
- 一人でいることへの恐怖
- 障害感
- 人間関係のストレス
- 憂うつ感

#### 3. 身体的側面（Physical） - 7項目
- 上を見上げることによる悪化
- スーパーマーケット通路歩行での悪化
- 激しい身体活動での悪化
- 頭の素早い動きでの悪化
- 寝返りでの悪化
- 歩道歩行での悪化
- かがむことでの悪化

## 信頼性・妥当性

### 信頼性
- **内的整合性**: 全体 α=0.89、各サブスケール α>0.78
- **テスト再テスト信頼性**: r=0.97
- **評定者間信頼性**: 自己記入式のため該当なし

### 妥当性
- **併存妥当性**: VAS、CMI、STAI との有意な相関
- **判別妥当性**: 臨床症状（眼振、再発、持続時間）との相関なし
- **その他**: 3 因子構造の確認

## 得点化・解釈

### 基本得点
- 各項目：はい=4 点、時々=2 点、いいえ=0 点
- 機能的側面：0-36 点（9 項目 × 最大 4 点）
- 感情的側面：0-36 点（9 項目 × 最大 4 点）
- 身体的側面：0-28 点（7 項目 × 最大 4 点）
- 総合計点：0-100 点

### 重症度の目安
- **正常範囲**: 0-15 点
- **軽度**: 16-34 点
- **中等度**: 36-52 点
- **重度**: 54 点以上

### 臨床的意義
- 10 点超：平衡専門医への紹介を検討
- 18 点の変化：治療効果の臨床的に意味のある変化

## 実施上の注意点

### 対象者
- めまい、回転性めまい、ふらつきを訴える患者
- 前庭系疾患の疑いがある患者

### 評価者
- 医療従事者による指導のもと患者が自己記入
- 特別な訓練は不要

### 制限事項
- 客観的な前庭機能検査結果と必ずしも一致しない
- 心理的要因の影響を受けやすい
- 急性期よりも慢性期の評価に適している

## 参考文献・URL

### 主要文献
- Jacobson GP, Newman CW. The development of the Dizziness Handicap Inventory. Arch Otolaryngol Head Neck Surg. 1990;116(4):424-427.
- 増田佳奈子, 後藤文之, 藤井正人, 国弘卓信. めまいの日常生活障害度をあらわす Dizziness Handicap Inventory (DHI) 日本語版の信頼性と妥当性の検討. Equilibrium Research. 2004;63(6):555-563.

### 公式URL
- PhenX Toolkit: https://www.phenxtoolkit.org/protocols/view/201101
- RehabMeasures Database: https://www.sralab.org/rehabilitation-measures/dizziness-handicap-inventory

### 追加情報源
- Physiopedia: https://www.physio-pedia.com/Dizziness_Handicap_Inventory
- Interacoustics Academy: https://www.interacoustics.com/academy/balance-testing-training/videonystagmography/how-to-interpret-dizziness-handicap-inventory-and-vestibular-rehabilitation-benefit-questionnaire

## JSON作成時の技術的注意点

### 数式設定
- 機能的得点: F3+F5+F6+F7+F12+F14+F16+F19+F24
- 感情的得点: E2+E9+E10+E15+E18+E20+E21+E22+E23
- 身体的得点: P1+P4+P8+P11+P13+P17+P25
- 総合計点: 機能的得点+感情的得点+身体的得点

### 構造化
- 各項目には機能的(F)、感情的(E)、身体的(P)の分類を項目名に含める
- スコアインデックスを用いて選択肢に対応する点数を設定
- 警告・緊急判定は中等度（36 点以上）と重度（54 点以上）で設定
