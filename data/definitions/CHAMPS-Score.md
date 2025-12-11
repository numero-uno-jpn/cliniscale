# CHAMPS Score - 問診票作成情報まとめ

## 基本情報

### 著作権
この尺度は公開された学術論文に基づいており、臨床使用が推奨されている。モバイルアプリケーションも無料で提供されている。

### 尺度の概要
- **正式名称**: Charlson Comorbidity Index ≥2, in-Hospital onset, Albumin <2.5 g/dL, altered Mental status, Eastern Cooperative Oncology Group Performance status ≥2, Steroid use (CHAMPS) Score
- **日本語名**: CHAMPS スコア
- **対象年齢**: 成人（18 歳以上）
- **評価目的**: 非静脈瘤性上部消化管出血の入院中死亡リスク予測
- **実施時間**: 約 3-5 分
- **回答者**: 医療従事者（医師・看護師）

### 開発背景
- **開発者**: Matsuhashi T, et al.
- **発行年**: 2021 年
- **理論的基盤**: 多施設後向き研究による予測因子の統計学的解析
- **標準化サンプル**: 導出コホート 1,380 名、検証コホート 825 名（日本、2021 年）

## 尺度構成

### 全体構造
- **総項目数**: 6 項目
- **サブスケール数**: なし（単一スケール）
- **評価方式**: 各項目 1 点の等重み評価、2 択の二分法

### 評価項目詳細
#### 1. Charlson Comorbidity Index（CCI）- 1点
- 17 疾患の重み付き併存疾患指数が 2 以上かどうか
- 心疾患、脳血管疾患、癌など主要疾患を評価

#### 2. 院内発症（in-Hospital onset）- 1点
- 他疾患での入院中に発症した消化管出血かどうか
- 院外発症と比較して予後不良因子

#### 3. アルブミン値（Albumin <2.5 g/dL）- 1点
- 栄養状態と肝機能の指標
- 低アルブミン血症は重篤な病態を示唆

#### 4. 意識障害（altered Mental status）- 1点
- 意識レベルの変化や混乱状態の有無
- ショックや重篤な病態の指標

#### 5. ECOG Performance Status ≥2 - 1点
- 日常生活動作の制限度（0-4 の 5 段階）
- 2 以上で身体機能の著明な低下を示す

#### 6. ステロイド使用（Steroid use）- 1点
- 全身性ステロイド薬の使用歴
- 免疫抑制や治癒遅延のリスク因子

## 信頼性・妥当性

### 信頼性
- **内的整合性**: 報告されていない（単一スケールのため）
- **テスト再テスト信頼性**: 報告されていない
- **評定者間信頼性**: 項目が客観的指標のため高い信頼性が期待される

### 妥当性
- **感度**: 100%（カットオフ値 3 点）
- **特異度**: 71.2%（カットオフ値 3 点）
- **AUROC**: 0.89（95%CI: 0.82-0.95）
- **その他**: Glasgow-Blatchford Score、AIMS65、ABC score より優れた予測性能

## 得点化・解釈

### 基本得点
- 各項目について該当する場合 1 点、該当しない場合 0 点を付与
- 合計 0-6 点

### リスク分類の目安
- **低リスク**: 0 点（死亡率 0.2%）
- **中リスク**: 1-2 点（死亡率 2.3%）
- **高リスク**: 3 点以上（死亡率 26.5%）

## 実施上の注意点

### 対象者
- 非静脈瘤性上部消化管出血の成人患者
- 内視鏡検査前の評価として使用可能
- 外来・入院患者の両方に適用可能

### 評価者
- 医師または看護師による評価が必要
- 各項目は医学的知識を要するため患者自己評価は不適切
- Charlson Comorbidity Index と ECOG Performance Status の正確な評価が重要

### 制限事項
- 非静脈瘤性上部消化管出血に特化、他の消化管出血には適用不可
- 再出血や介入必要性の予測には適さない
- 外的検証が限定的（主に日本、一部ベトナム・トルコ）

## 参考文献・URL

### 主要文献
- Matsuhashi T, Hatta W, Hikichi T, et al. A simple prediction score for in-hospital mortality in patients with nonvariceal upper gastrointestinal bleeding. J Gastroenterol. 2021;56(8):758-768.

### 公式URL
- iOS アプリ: https://apps.apple.com/app/id1565716902
- Android アプリ: https://play.google.com/store/apps/details?id=hatta.CHAMPS

### 追加情報源
- 検証研究: Lam HT, et al. Clin Exp Gastroenterol. 2024;17:201-211.
- トルコでの検証: Aydin H, et al. Rev Assoc Med Bras. 2023;69(4):e20221052.

## JSON作成時の技術的注意点

### 数式設定
- 合計点: `[[CCI.index]] + [[院内発症.index]] + [[アルブミン.index]] + [[意識障害.index]] + [[ECOG.index]] + [[ステロイド.index]]`
- リスク分類: 三項演算子を用いた条件分岐で 3 段階分類
- Warning 条件: `[[CHAMPS合計]] >= 3` で高リスク群を強調表示

### 構造化
- 各項目は二択のラジオボタンで構成（0 点 vs 1 点）
- 選択肢は臨床的に理解しやすい表現を使用
- ECOG Performance Status は詳細な説明を付加
- 計算結果の表示順序を考慮した設計
