# AQLQ-S 作成情報まとめ

## 基本情報

### 著作権

AQLQ-S (Standardized Asthma Quality of Life Questionnaire) は Elizabeth Juniper らによって開発され、著作権は McMaster University（カナダ）に帰属。QOL Technologies Ltd.がライセンス管理を行っている。

### 尺度の概要

- **正式名称**: Standardized Asthma Quality of Life Questionnaire (AQLQ-S)
- **日本語名**: 標準化版喘息 QOL 質問票
- **対象年齢**: 17-70 歳（成人版）、12 歳以上対応版（AQLQ12+）もあり
- **評価目的**: 喘息患者の健康関連 QOL（症状、活動制限、感情機能、環境刺激への反応）
- **実施時間**: 4-15 分程度
- **回答者**: 患者本人（自記式）

### 開発背景

- **開発者**: Elizabeth F. Juniper, Gordon H. Guyatt ら（McMaster University）
- **発行年**: 1992 年（オリジナル版）、1999 年（標準化版）
- **理論的基盤**: 患者の主観的体験に基づく機能的障害の評価
- **標準化サンプル**: 多国籍・多施設研究による大規模サンプル

## 尺度構成

### 全体構造

- **総項目数**: 32 項目
- **サブスケール数**: 4 領域
- **評価方式**: 7 段階リッカート尺度（7=制限なし、1=重度の制限）、過去2週間を評価

### サブスケール詳細

#### 1. 症状領域 - 12 項目
- 息切れ、胸苦しさ、咳、夜間覚醒
- 朝の症状、その他時間帯の症状
- 喘鳴、痰、疲労感、睡眠障害
- 集中力低下、体調不良

#### 2. 活動制限領域 - 11 項目（標準化版）
- 激しい運動
- 軽度から中等度の運動
- 仕事関連活動
- 社会的活動
- 睡眠
- 家事
- 余暇活動
- 外出・買い物
- 重量物の運搬
- 急歩・階段昇降
- 天候による活動制限

#### 3. 感情・心理領域 - 5 項目
- イライラ・怒り、心配・不安
- 欲求不満、恐怖感
- 喘息発作への恐怖

#### 4. 環境刺激領域 - 4 項目
- たばこの煙、ほこり
- 強いにおい・臭気
- 大気汚染・天候変化

## 信頼性・妥当性

### 信頼性

- **内的整合性**: クロンバック α = 0.95（全体）、各領域 0.85-0.95
- **テスト再テスト信頼性**: ICC = 0.82-0.96（2 週間間隔）
- **評定者間信頼性**: 該当なし（自記式のため）

### 妥当性

- **構成概念妥当性**: FEV1%予測値との相関 r = 0.20-0.30
- **併存的妥当性**: SF-36 との相関、他の喘息特異的尺度との高い相関
- **応答性**: 臨床的に意義のある変化（0.5 点以上）を検出可能
- **標準化版の妥当性**: オリジナル版との相関 r = 0.77（活動領域）、r = 0.99（総得点）

## 得点化・解釈

### 基本得点

- 各領域得点：該当項目の平均値
- 総得点：全 32 項目の平均値
- 得点範囲：1.0-7.0

### 解釈の目安

- **臨床的に意義のある変化**: 0.5 点以上の変化
- **重度の QOL 低下**: 総得点 < 2.5
- **軽度の QOL 低下**: 総得点 2.5-3.4
- **中等度以上の QOL**: 総得点 ≥ 3.5

## 実施上の注意点

### 対象者

- 成人喘息患者（17-70 歳）
- 軽症から重症まで幅広い重症度に適用可能
- 認知機能に問題のない患者

### 評価者

- 自記式質問票のため特別な訓練は不要
- 回答に関する質問に対応できる医療従事者の配置が望ましい

### 制限事項

- 著作権保護により使用にはライセンス料が必要（研究用途は例外あり）
- 小児（17 歳未満）には別途 PAQLQ（小児版）の使用を推奨
- 急性増悪時の評価には適さない
- 標準化版では患者特異的活動の選択が不要で実施時間短縮が可能

## 参考文献・URL

### 主要文献

- Juniper EF, Guyatt GH, Epstein RS, et al. Evaluation of impairment of health related quality of life in asthma: development of a questionnaire for use in clinical trials. Thorax 1992; 47:76-83
- Juniper EF, Buist AS, Cox FM, et al. Validation of a standardized version of the Asthma Quality of Life Questionnaire. Chest 1999; 115:1265-1270

### 公式URL

- QOL Technologies Ltd.: https://www.qoltech.co.uk/aqlq.html
- American Thoracic Society: https://www.thoracic.org/members/assemblies/assemblies/srn/questionaires/aqlq.php

### 追加情報源

- APTA（American Physical Therapy Association）: https://www.apta.org/patient-care/evidence-based-practice-resources/test-measures/asthma-quality-of-life-questionnaire-aqlq

## JSON作成時の技術的注意点

### 数式設定

- 各領域得点：該当項目数による平均値計算
- 総得点：全 32 項目による平均値計算（重み付けなし）
- インデックス値（7-1）を使用し、適切な数値変換を実装
- eval 式では((fieldname.index))形式を使用

### 構造化

- 4 つの明確な領域でセクション分けを実装（subsection 使用推奨）
- 活動制限領域は標準化版である旨を明記
- 選択肢は 7 段階で統一し、値とラベルを明確に対応付け
- スコア計算項目は非表示設定（noreport: true）で中間計算を実装
- 臨床的解釈を提供する評価項目を追加
