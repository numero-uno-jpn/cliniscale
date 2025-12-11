# KOOS 作成情報まとめ

## 基本情報

### 著作権

Professor Ewa Maria Roos が著作権を保有。商用・非商用を問わず使用には事前許可が必要。

### 尺度の概要

- **正式名称**: Knee injury and Osteoarthritis Outcome Score (KOOS)
- **日本語名**: 膝損傷・変形性関節症機能評価
- **対象年齢**: 制限なし (主に成人)
- **評価目的**: 膝外傷から変形性膝関節症までの症状・機能・QOL の包括的評価
- **実施時間**: 約 8-10 分
- **回答者**: 患者本人 (自己記入式)

### 開発背景

- **開発者**: Ewa M. Roos, H P Roos, L S Lohmander, C Ekdahl, B D Beynnon
- **発行年**: 1998 年
- **理論的基盤**: WOMAC 変形性関節症指標の拡張版
- **標準化サンプル**: 膝外傷患者を含む複数の研究集団

## 尺度構成

### 全体構造

- **総項目数**: 42 項目
- **サブスケール数**: 5 サブスケール
- **評価方式**: 5 段階リッカート尺度 (0-4 点)

### サブスケール詳細

#### 1. 症状 - 7 項目

- 腫れ、音、引っかかり感
- 可動域制限
- こわばり

#### 2. 痛み - 9 項目

- 痛みの頻度
- 様々な動作・姿勢での痛み

#### 3. 日常生活動作 - 17 項目

- 階段昇降、歩行
- 起立・起床動作
- 家事動作

#### 4. スポーツ・レクリエーション機能 - 5 項目

- しゃがみ、走行、ジャンプ
- 回旋動作、ひざまずき

#### 5. 生活の質 - 4 項目

- 膝問題の意識頻度
- ライフスタイルの変更
- 膝への信頼感

## 信頼性・妥当性

### 信頼性

- **内的整合性**: クロンバック α = 0.70-0.95
- **テスト再テスト信頼性**: ICC = 0.85 以上
- **評定者間信頼性**: 自己記入式のため該当なし

### 妥当性

- **感度**: 手術・理学療法に対して高い感度
- **特異度**: 膝関節疾患に特異的
- **構成概念妥当性**: 確認済み
- **基準関連妥当性**: 確認済み

## 得点化・解釈

### 基本得点

各サブスケールを個別に計算し、0-100 点に変換 (100 点が最良状態)

### 計算式

各サブスケール = 100 - (合計 raw 点数 × 100 / 最大可能点数)

### 解釈の目安

- **90-100 点**: 症状なし・軽微
- **70-89 点**: 軽度の問題
- **50-69 点**: 中等度の問題
- **0-49 点**: 重度の問題

## 実施上の注意点

### 対象者

- 膝外傷患者 (ACL 損傷、半月板損傷等)
- 変形性膝関節症患者
- 膝関節手術予定・術後患者

### 評価者

- 患者による自己記入式
- 医療従事者による説明・支援が推奨

### 制限事項

- 著作権保護により使用には事前許可が必要 (Mapi Research Trust 経由で申請)
- 5 つのサブスケールを個別評価 (合計点は非推奨)
- 最小臨床的重要差は約 10 点とされる

## 参考文献・URL

### 主要文献

- Roos EM, et al. Knee Injury and Osteoarthritis Outcome Score (KOOS)--development of a self-administered outcome measure. J Orthop Sports Phys Ther. 1998;28(2):88-96.
- Nakamura N, et al. Cross-cultural adaptation and validation of the Japanese Knee Injury and Osteoarthritis Outcome Score (KOOS). J Orthop Sci. 2011;16(5):516-23.

### 公式URL

- https://www.koos.nu/
- https://eprovide.mapi-trust.org/

### 追加情報源

- Collins NJ, et al. KOOS: systematic review and meta-analysis of measurement properties. Osteoarthritis Cartilage. 2016;24(8):1317-29.

## JSON作成時の技術的注意点

### 数式設定

- 各サブスケール raw 得点を中間変数として計算
- 最終得点は「100 - (raw 得点 × 100 / 最大得点)」で算出 (括弧位置に注意)
- noreport オプションを使用して raw 得点を非表示

### 構造化

- 5 つのサブスケールごとに subsection で区切り (section ではなく subsection を使用)
- 各項目の selectoridx は「0|1|2|3|4」で統一
- すべての項目を required に設定
- 「けがをした膝」ではなく一般的な「膝」として表記統一
