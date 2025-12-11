# ACQ (Asthma Control Questionnaire) 作成情報まとめ

## 基本情報

### 著作権

QOL Technologies Ltd.が著作権を保有し、使用には許可が必要

### 尺度の概要

- **正式名称**: Asthma Control Questionnaire (ACQ)
- **日本語名**: 喘息コントロール質問票
- **対象年齢**: 6歳以上（6-10歳は面接者による実施、11歳以上は自己記入）
- **評価目的**: 過去1週間の喘息コントロール状態の評価
- **実施時間**: 約5分
- **回答者**: 患者本人（6-10歳の場合は訓練された面接者が実施）

### 開発背景

- **開発者**: Elizabeth F. Juniper 他
- **発行年**: 1999年
- **理論的基盤**: 国際喘息ガイドラインの治療目標（症状、活動制限、気管支収縮、救急薬使用の最小化）
- **標準化サンプル**: 18カ国91名の喘息専門医による質問項目選定

## 尺度構成

### 全体構造

- **総項目数**: 7項目
- **サブスケール数**: なし（単一スケール）
- **評価方式**: 7段階評価（0-6点）

### 質問項目詳細

#### 1. 夜間症状による覚醒 - 症状頻度

- 過去1週間の夜間覚醒頻度を評価

#### 2. 起床時症状 - 症状強度

- 朝起床時の症状の程度を評価

#### 3. 日常活動の制限 - 機能制限

- 喘息による日常生活への影響を評価

#### 4. 息切れ - 症状強度

- 息切れの程度を評価

#### 5. 喘鳴 - 症状強度

- 喘鳴の程度を評価

#### 6. 救急薬の使用頻度 - 薬物使用

- 短時間作用性β2刺激薬の1日平均使用回数

#### 7. 肺機能（FEV1予測値） - 客観的指標

- 気管支拡張薬使用前のFEV1予測値

## 信頼性・妥当性

### 信頼性

- **内的整合性**: 高い信頼性を示す
- **テスト再テスト信頼性**: 小児での級内相関係数0.79（2週間間隔）
- **評定者間信頼性**: 該当なし（患者記入式）

### 妥当性

- **感度**: 変化に対して高い感度
- **特異度**: 異なるコントロール状態を適切に識別
- **その他**: 喘息QOLQやSF-36との交差妥当性を確認

## 得点化・解釈

### 基本得点

- 各項目0-6点の7段階評価
- 合計スコア = 7項目の平均値（0-6点）

### コントロール状態の目安

- **コントロール良好**: 0.75未満
- **ボーダーライン**: 0.75以上1.5未満
- **コントロール不良**: 1.5以上
- **臨床的意義のある変化**: 0.5以上の変化

## 実施上の注意点

### 対象者

- 6歳以上の喘息患者
- 過去1週間の症状を思い出すことができる患者

### 評価者

- 11歳以上：自己記入可能
- 6-10歳：訓練された面接者による実施が必要
- 肺機能測定はスタッフが実施

### 制限事項

- 6歳未満では妥当性が確認されていない
- FEV1測定が困難な場合はPEFで代替可能
- 長時間作用性β2刺激薬使用時は救急薬使用頻度の評価が困難

## 参考文献・URL

### 主要文献

- Juniper EF, et al. Development and validation of a questionnaire to measure asthma control. Eur Respir J 1999;14:902-907
- Juniper EF, et al. Measurement properties and interpretation of three shortened versions of the asthma control questionnaire. Respir Med 2005;99:553-558
- Juniper EF, et al. Identifying 'well-controlled' and 'not well-controlled' asthma using the Asthma Control Questionnaire. Respir Med 2006;100:616-621

### 公式URL

- QOL Technologies Ltd.: https://www.qoltech.co.uk/acq.html
- American Thoracic Society: https://www.thoracic.org/members/assemblies/assemblies/srn/questionaires/acq.php

### 追加情報源

- ePROVIDE: https://eprovide.mapi-trust.org/instruments/asthma-control-questionnaire
- Asthma Australia ACQ5: https://asthma.org.au/health-professionals/asthmaxchange/clinical-practice-tools/acq5/

## JSON作成時の技術的注意点

### 数式設定

- FEV1予測値の点数化：95%以上=0点、85-94%=1点、75-84%=2点、65-74%=3点、50-64%=4点、35-49%=5点、35%未満=6点
- 合計スコア = 7項目の平均値計算
- 判定基準：0.75未満でコントロール良好、1.5以上でwarning

### 構造化

- 7項目すべてが必須項目として設定
- 肺機能はscale型で0-120%の範囲設定
- 他の6項目はradio型で0-6の選択肢
- スコア計算と判定機能をeval型で実装
