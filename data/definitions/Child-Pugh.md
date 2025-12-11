# Child-Pugh 分類 - 問診票作成情報まとめ

## 基本情報

### 著作権
- 原著論文は 1964 年の Child CG・Turcotte JG 論文および 1973 年の Pugh RN 論文
- 公的評価基準として広く使用されており、商用利用可能

### 尺度の概要
- **正式名称**: Child-Pugh Classification / Child-Turcotte-Pugh Classification
- **日本語名**: Child-Pugh 分類（チャイルド・ピュー分類）
- **対象年齢**: 全年齢（主に成人）
- **評価目的**: 肝硬変の重症度評価と予後予測
- **実施時間**: 5 分程度
- **回答者**: 医療従事者（検査データと臨床所見により評価）

### 開発背景
- **開発者**: Charles Gardner Child・John Turcotte（1964 年）、Pugh ら（1973 年修正）
- **発行年**: 1964 年（オリジナル）、1973 年（修正版）
- **理論的基盤**: 肝機能の臨床的評価と手術予後予測
- **標準化サンプル**: 食道静脈瘤手術患者 38 例での検証

## 尺度構成

### 全体構造
- **総項目数**: 5 項目
- **サブスケール数**: なし（単一スケール）
- **評価方式**: 各項目 1-3 点、合計 5-15 点

### 評価項目詳細
#### 1. 肝性脳症 - 1項目
- なし（1 点）
- 軽度：Grade 1-2（2 点）
- 高度：Grade 3-4（3 点）

#### 2. 腹水 - 1項目
- なし（1 点）
- 軽度：コントロール容易（2 点）
- 中等度以上：コントロール困難（3 点）

#### 3. 血清ビリルビン値 - 1項目
- 2.0mg/dL 未満（1 点）
- 2.0-3.0mg/dL（2 点）
- 3.0mg/dL 超（3 点）

#### 4. 血清アルブミン値 - 1項目
- 3.5g/dL 超（1 点）
- 2.8-3.5g/dL（2 点）
- 2.8g/dL 未満（3 点）

#### 5. プロトロンビン時間（INR） - 1項目
- 1.7 未満（1 点）
- 1.7-2.3（2 点）
- 2.3 超（3 点）

## 信頼性・妥当性

### 信頼性
- **内的整合性**: 一定の信頼性が確認されている
- **テスト再テスト信頼性**: 検査値に依存するため高い
- **評定者間信頼性**: 客観的基準により高い一致率

### 妥当性
- **予測妥当性**: 手術死亡率および 1 年死亡率の予測に有効
- **構成概念妥当性**: 肝機能の多面的評価として妥当
- **その他**: 他の肝機能評価法と高い相関

## 得点化・解釈

### 基本得点
- 各項目 1-3 点で評価
- 5 項目の合計点を算出（5-15 点）

### 重症度分類の目安
- **Class A（軽度）**: 5-6 点 - 代償性肝硬変、良好な予後
- **Class B（中等度）**: 7-9 点 - 非代償性肝硬変、中等度の予後
- **Class C（重度）**: 10-15 点 - 非代償性肝硬変、不良な予後

### 予後の目安
**手術死亡率**（原著データ）:
- **Class A**: 10%（腹部手術）、29%（原著の食道静脈瘤手術）
- **Class B**: 30%（腹部手術）、38%（原著の食道静脈瘤手術）
- **Class C**: 70-80%（腹部手術）、88%（原著の食道静脈瘤手術）

**1 年死亡率**（現在の文献データ）:
- **Class A**: 約 0%
- **Class B**: 約 20%
- **Class C**: 約 55%

## 実施上の注意点

### 対象者
- 肝硬変またはその疑いのある患者
- 慢性肝疾患患者の重症度評価が必要な場合

### 評価者
- 医師または医療従事者
- 検査データの解釈と臨床所見の評価能力が必要

### 制限事項
- 主観的評価項目（肝性脳症、腹水）が含まれる
- アルブミンと腹水など相互に影響する因子が含まれる
- 統計学的に構築されたスケールではない
- 急性肝不全には適用しない
- 腎機能を考慮していない（MELD スコアで補完）

## 参考文献・URL

### 主要文献
- Child CG, Turcotte JG. Surgery and portal hypertension. Major Probl Clin Surg. 1964;1:1-85. [PubMed: 4950264]
- Pugh RN, Murray-Lyon IM, Dawson JL, Pietroni MC, Williams R. Transection of the oesophagus for bleeding oesophageal varices. Br J Surg. 1973;60(8):646-9. [PubMed: 4541913]
- Tsoris A, Marlar C. Use Of The Child Pugh Score In Liver Disease. StatPearls [Internet]. 2023 Mar 13. [PubMed: 31194448]

### 公式URL
- 日本肝臓学会 肝予備能評価スコア計算サイト: https://www.jsh.or.jp/medical/guidelines/medicalinfo/hepatic_reserve.html

### 追加情報源
- 国立がん研究センター がん情報サービス: https://ganjoho.jp/public/cancer/liver/treatment.html
- Cleveland Clinic Child-Pugh Score: https://my.clevelandclinic.org/health/diagnostics/child-pugh-score

## JSON作成時の技術的注意点

### 数式設定
- 合計スコア: `[[脳症.index]] + [[腹水.index]] + [[ビリルビン値.index]] + [[アルブミン値.index]] + [[INR.index]]`
- 重症度分類: 三項演算子を使用して点数範囲による分類
- Warning: 7 点以上で中等度として注意喚起、name・description 必須
- Emergency: 10 点以上で重度として緊急対応必要、name・description 必須

### 構造化
- 各項目は radio タイプで 1-3 点のインデックス設定
- inline オプションで横並び表示
- eval タイプで計算結果と解釈を表示
- warning・emergency 項目には必ず name・description を記載
