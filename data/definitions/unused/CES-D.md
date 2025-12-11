# CES-D - 問診票作成情報まとめ

## 基本情報

### 著作権
- 原著: Radloff, L. S. (1977). The CES-D scale: A self-report depression scale for research in the general population. Applied Psychological Measurement, 1(3), 385-401.
- 日本語版: 島悟らによる翻訳・標準化
- 診療報酬点数: D-285-(1) 80点

### 尺度の概要
- **正式名称**: Center for Epidemiologic Studies Depression Scale (CES-D)
- **日本語名**: CES-Dうつ病自己評価尺度
- **対象年齢**: 15歳以上
- **評価目的**: うつ病症状のスクリーニング・評価（疫学研究用）
- **実施時間**: 10～15分
- **回答者**: 患者本人による自己記入式

### 開発背景
- **開発者**: Lenore Sawyer Radloff
- **発行年**: 1977年
- **開発機関**: 米国国立精神保健研究所（NIMH）
- **理論的基盤**: 既存のうつ病評価尺度（Zung SDS、Beck BDI、MMPI等）を参考に項目選択
- **標準化サンプル**: 一般人口における疫学研究用として開発（診断ツールではない）

## 尺度構成

### 全体構造
- **総項目数**: 20項目
- **サブスケール数**: 4つの因子（抑うつ感情、陽性感情、身体症状、対人関係）
- **評価方式**: 4件法（過去1週間の症状頻度）

### 評価項目詳細
#### 1. 抑うつ感情因子 - 複数項目
- 憂うつ、悲しみ、孤独感、人生の失敗感など

#### 2. 陽性感情因子（逆転項目） - 4項目
- 項目4、8、12、16（満足感、希望、価値感、楽しさ）

#### 3. 身体・認知症状因子 - 複数項目
- 食欲不振、集中困難、睡眠障害、疲労感など

#### 4. 対人関係因子 - 複数項目
- 他者からの冷たさ、嫌悪感など

## 信頼性・妥当性

### 信頼性
- **内的整合性**: Cronbach's α = 0.85-0.90
- **テスト再テスト信頼性**: r = 0.45-0.70
- **評定者間信頼性**: 自己記入式のため該当なし

### 妥当性
- **併存妥当性**: Hamilton Rating Scale、Raskin Rating Scaleと中程度の相関（r = 0.44-0.54）
- **特異度・感度**: 心理測定学的に高い特異度と陽性的中率を示す
- **その他**: 多くの研究で確認済み

## 得点化・解釈

### 基本得点
- 各項目0-3点で評価
- 逆転項目（4、8、12、16）は3-0点で評価
- 合計点: 0-60点

### 判定基準
- **正常範囲**: 0-15点
- **要注意**: 16点以上（臨床的に意味のあるうつ症状）
- **日本語版カットオフ**: 16点（オリジナル版と同じ）

### 回答選択肢
- 全くなかった（1日もない）: 0点
- ときどきあった（1～2日）: 1点
- しばしばあった（3～4日）: 2点
- ほとんどいつもあった（5日以上）: 3点

## 実施上の注意点

### 対象者
- 15歳以上の一般人口
- うつ病のスクリーニング目的
- 治療効果の評価にも使用可能

### 評価者
- 自己記入式（面接法も可能）
- 高齢者や視力障害者には面接者が読み上げ可能

### 制限事項
- 診断ツールではなく、スクリーニング目的
- 個別スコアの解釈は専門家による判断が必要
- 心理学の知識と専門訓練を受けた者による使用が推奨

## 参考文献・URL

### 主要文献
- Radloff, L. S. (1977). The CES-D scale: A self-report depression scale for research in the general population. Applied Psychological Measurement, 1(3), 385-401.
- 島悟らによる日本語版標準化研究

### 公式URL
- 千葉テストセンター: https://www.chibatc.co.jp/cgi/web/index.cgi?c=catalogue-zoom&pk=136
- Brandeis University CES-D資料（注：CES-D-R改訂版情報含む）: https://www.brandeis.edu/roybal/docs/CESD-R_Website_PDF.pdf

### 追加情報源
- Progress In Mind Japan: https://japan.progress.im/ja/content/ces-d
- RehabMeasures Database: https://www.sralab.org/rehabilitation-measures/center-epidemiological-studies-depression-scale-ces-d

## JSON作成時の技術的注意点

### 数式設定
- 合計点計算: 全20項目の単純合算（逆転項目は selectoridx で自動処理）
- リスク判定: 16点以上で要注意の三項演算子使用

### 構造化
- 逆転項目（4、8、12、16）の selectoridx を "3|2|1|0" に設定
- その他項目は "0|1|2|3" で設定
- 合計点・判定結果は非表示項目（dispname未定義）として設定
