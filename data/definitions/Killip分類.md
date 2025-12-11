# Killip 分類 作成情報まとめ

## 基本情報

### 著作権

原著論文 (1967 年) はパブリックドメインです。

### 尺度の概要

- **正式名称**: Killip Classification of Acute Myocardial Infarction
- **日本語名**: Killip 分類、キリップ分類
- **対象年齢**: 成人 (急性心筋梗塞患者)
- **評価目的**: 急性心筋梗塞における心不全重症度の評価と予後予測
- **実施時間**: 5-10 分
- **回答者**: 循環器科医、救急医、集中治療医

### 開発背景

- **開発者**: Thomas Killip III、John T. Kimball
- **発行年**: 1967 年
- **理論的基盤**: 急性心筋梗塞患者の身体所見に基づく心不全重症度分類
- **標準化サンプル**: 250 例 (1967 年、米国大学病院)

## 尺度構成

### 全体構造

- **総項目数**: 4 段階分類 (I 度〜 IV 度)
- **サブスケール数**: なし (単一分類システム)
- **評価方式**: 身体所見による複合的臨床判断

### 分類詳細 (原典基準)

#### Killip I 度 - 心不全徴候なし

- 湿性ラ音なし
- S3 心音なし
- 頸静脈圧正常
- 心不全の臨床症状なし

#### Killip II 度 - 軽度〜中等度心不全

- 肺野下部のラ音、または
- S3 心音 (奔馬律) 聴取、または
- 頸静脈圧上昇
- 軽度から中等度の心不全症状

#### Killip III 度 - 急性肺水腫

- 肺野の広範囲で湿性ラ音聴取
- 明らかな急性肺水腫の臨床所見
- 呼吸困難、起座呼吸

#### Killip IV 度 - 心原性ショック

- 収縮期血圧 90mmHg 未満、かつ
- 末梢循環不全の徴候:
  - 尿量減少 (<0.5mL/kg/h)
  - 冷たく湿った皮膚
  - チアノーゼ
  - 意識障害

## 信頼性・妥当性

### 信頼性

- **評定者間信頼性**: 身体所見に基づく分類のため、評価者の経験に依存
- **再現性**: 客観的所見に基づくため比較的良好
- **検証状況**: 世界各国で多数の検証研究が実施され、妥当性が確認

### 妥当性

- **予後予測能**: 死亡率との強い相関が一貫して確認
- **臨床的妥当性**: 50 年以上にわたり世界的に使用され、多くの研究で妥当性確認
- **現代的妥当性**: TIMI、GRACE スコア等の主要リスク評価に組み込まれている

## 得点化・解釈

### 基本得点

身体所見に基づく 4 段階分類 (I 度〜 IV 度)

### 予後予測の目安 (原典データ)

- **Killip I 度**: 院内死亡率約 6%
- **Killip II 度**: 院内死亡率約 17%
- **Killip III 度**: 院内死亡率約 38%
- **Killip IV 度**: 院内死亡率約 81%

### 現代の死亡率 (近年の研究)

- **Killip I 度**: 2-4%
- **Killip II 度**: 8-12%
- **Killip III 度**: 15-25%
- **Killip IV 度**: 40-60%
- 現代の治療 (血栓溶解療法、PCI 等) により死亡率は 30-50%改善

## 実施上の注意点

### 対象者

- 急性心筋梗塞の診断が確定または強く疑われる患者
- 成人患者 (通常 40 歳以上)
- STEMI、NSTEMI 両方に適用可能

### 評価者

- 循環器疾患の診療経験を有する医師
- 心音・肺音の聴診技術を習得した医療従事者
- 身体所見の総合的評価能力が必要

### 制限事項

- 身体所見に基づく主観的評価のため、評価者の技量に依存
- 他の心疾患による心不全との鑑別が必要
- 治療による改善後は再評価が必要
- 肺超音波等の新技術により、従来の Class I の 25-45%で潜在的うっ血が検出される

## 参考文献・URL

### 主要文献

- Killip T, Kimball JT. Treatment of myocardial infarction in a coronary care unit. A two year experience with 250 patients. Am J Cardiol. 1967;20(4):457-64. PMID: 6059183
- Mello BHG, et al. Validation of the Killip-Kimball classification and late mortality after acute myocardial infarction. Arq Bras Cardiol. 2014;103(2):107-117
- Khot UN, et al. Prognostic importance of physical examination for heart failure in non-ST-elevation acute coronary syndromes. JAMA. 2003;290(16):2174-81

### 公式URL

- MSD Manual Professional: https://www.msdmanuals.com/professional/cardiovascular-disorders/coronary-artery-disease/acute-myocardial-infarction-mi
- ESC Guidelines: https://www.escardio.org/Guidelines
- PubMed 原典: https://pubmed.ncbi.nlm.nih.gov/6059183/

### 追加情報源

- 日本循環器学会急性冠症候群ガイドライン
- PMC4150661 (ブラジル大規模研究)
- GRACE Registry、GUSTO-1 Trial データ

## JSON作成時の技術的注意点

### 数式設定

- 複合判定式: 複数身体所見を組み合わせた条件分岐
- 中間計算: 血圧、末梢循環不全スコアの段階的評価
- 文字列判定: .includes() メソッドを用いた分類結果参照

### 構造化

- 基本情報セクション: 患者情報と診断確認
- 身体所見評価セクション: Killip 分類の核となる身体所見項目
- 末梢循環評価セクション: Killip IV 度判定のための専用評価
- 評価結果セクション: 分類判定と臨床的解釈
- 警告システム: warning (III 度以上)、emergency (IV 度) での緊急性表示
