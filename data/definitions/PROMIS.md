# PROMIS Global Health Scale（PROMIS-GH-10）作成情報まとめ

## 基本情報

### 著作権

英語版およびスペイン語版の PROMIS 尺度は公的領域にあり、研究、臨床使用、教育目的での使用にライセンス料や手数料は不要。ただし、商用利用者や電子システムへの組み込みにはライセンスが必要な場合がある。

**出典**: PROMIS Health Organization 公式サイト

### 尺度の概要

- **正式名称**: Patient-Reported Outcomes Measurement Information System Global Health (PROMIS-GH-10)
- **日本語名**: PROMIS グローバルヘルス尺度
- **対象年齢**: 成人（18 歳以上）
- **評価目的**: 身体的、精神的、社会的健康の包括的評価
- **実施時間**: 2-5 分
- **回答者**: 患者本人（自己報告式）

### 開発背景

- **開発者**: Northwestern University 等の研究チームと NIH（国立衛生研究所）
- **発行年**: 2004 年（NIH ロードマップ・イニシアチブの一環として開始）、2009 年発表
- **理論的基盤**: 項目反応理論（IRT）と最新の心理測定学的手法
- **標準化サンプル**: 21,133 名（2007-2008 年収集、米国 2000 年国勢調査に基づく）

**出典**: Hays et al. (2009). Quality of Life Research, 18, 873-880

## 尺度構成

### 全体構造

- **総項目数**: 10 項目
- **サブスケール数**: 2（身体的健康 4 項目、精神的健康 4 項目、その他 2 項目）
- **評価方式**: 5 段階評価（優秀〜悪い）、1 項目のみ 0-10 スケール

### サブスケール詳細

#### 1. Global Physical Health（GPH）- 4 項目

- **Global03**: 身体的健康状態の全般的評価
- **Global06**: 日常的身体活動の実行能力
- **Global07**: 過去 7 日間の平均的な痛み（0-10 スケール、1-5 に変換）
- **Global08**: 過去 7 日間の平均的な疲労（v1.2 では逆転コーディング）

#### 2. Global Mental Health（GMH）- 4 項目

- **Global02**: 生活の質の評価
- **Global04**: 精神的健康状態（気分・思考能力）
- **Global05**: 社会活動・人間関係への満足度
- **Global10**: 感情的問題による困りごとの頻度（v1.2 では逆転コーディング）

#### 3. その他の項目 - 2 項目

- **Global01**: 全般的健康状態（スコア計算には含まれない）
- **Global09**: 社会活動・役割への参加度（スコア計算には含まれない）

**注意**: これら 2 項目は単独項目として評価可能だが、GPH/GMH スコアには含まれない

## 信頼性・妥当性

### 信頼性

- **内的整合性**: GPH α=0.81、GMH α=0.86
- **テスト再テスト信頼性**: 良好（短縮版信頼性 GPH-2 項目版 α=0.73、GMH-2 項目版 α=0.81）
- **評定者間信頼性**: 該当なし（自己報告式）

### 妥当性

- **感度**: 該当なし（スクリーニングツールではない）
- **特異度**: 該当なし（スクリーニングツールではない）
- **その他**: 構成概念妥当性（EQ-5D-3L との相関 GPH r=0.76、GMH r=0.59）、2 因子構造を支持

**出典**: Hays et al. (2009); Hays et al. (2017); Katzan & Lapin (2018)

## 得点化・解釈

### 基本得点

1. 痛み項目（Global07）を 0-10 から 1-5 に変換:
   - 0 = 5 点
   - 1-3 = 4 点
   - 4-6 = 3 点
   - 7-9 = 2 点
   - 10 = 1 点

2. v1.2 では疲労（Global08）と感情問題（Global10）を逆転コーディング（高スコア=良好）

3. GPH スコア: Global03 + Global06 + Global07 変換後 + Global08（4-20 点）

4. GMH スコア: Global02 + Global04 + Global05 + Global10（4-20 点）

**出典**: Hays et al. (2009); PROMIS Global Health Scoring Manual v1.2

### T-Score 変換の目安

- **基準**: 米国一般集団（平均 50、標準偏差 10）
- **変換方法**: 公式ルックアップテーブル使用（HealthMeasures.net SAS コードより）

**GPH（身体的健康）T-score 変換表**:
| Raw Score | T-Score | Raw Score | T-Score |
|-----------|---------|-----------|---------|
| 4 | 16.2 | 13 | 42.3 |
| 5 | 19.9 | 14 | 44.9 |
| 6 | 23.5 | 15 | 47.7 |
| 7 | 26.7 | 16 | 50.8 |
| 8 | 29.6 | 17 | 54.1 |
| 9 | 32.4 | 18 | 57.7 |
| 10 | 34.9 | 19 | 61.9 |
| 11 | 37.4 | 20 | 67.7 |
| 12 | 39.8 | | |

**GMH（精神的健康）T-score 変換表**:
| Raw Score | T-Score | Raw Score | T-Score |
|-----------|---------|-----------|---------|
| 4 | 21.2 | 13 | 45.8 |
| 5 | 25.1 | 14 | 48.3 |
| 6 | 28.4 | 15 | 50.8 |
| 7 | 31.3 | 16 | 53.3 |
| 8 | 33.8 | 17 | 56.0 |
| 9 | 36.3 | 18 | 59.0 |
| 10 | 38.8 | 19 | 62.5 |
| 11 | 41.1 | 20 | 67.6 |
| 12 | 43.5 | | |

**出典**: PROMIS Global Health Scoring Manual (2023); HealthMeasures.net 公式 SAS コード

### 解釈の目安

- **T-Score 50**: 米国一般集団の平均
- **T-Score 40-60**: 正常範囲（平均 ±1SD 以内）
- **T-Score < 40**: 注意が必要（平均より 1SD 以上低い）
- **T-Score < 30**: 重篤な問題の可能性（平均より 2SD 以上低い）

**注意**: カットオフ値は疾患や臨床文脈により異なる。アンカーベース法による解釈が推奨される。

**出典**: PROMIS Score Cut Points (HealthMeasures.net)

## 実施上の注意点

### 対象者

- 18 歳以上の成人
- 認知機能が質問理解に十分である者
- 一般集団および慢性疾患患者の両方に適用可能

### 評価者

- 自己記入式のため、特別な訓練は不要
- 認知機能や理解力の事前評価が推奨される

### 制限事項

- 疾患特異的な詳細評価には限界がある
- 個人レベルでの臨床判断には追加評価が必要
- 文化的適応や翻訳版使用時は妥当性確認が重要
- **JSON での実装では公式ルックアップテーブルを使用し、正確なスコアリングが可能**

## 参考文献・URL

### 主要文献

- Hays, R. D., Bjorner, J. B., Revicki, D. A., Spritzer, K. L., & Cella, D. (2009). Development of physical and mental health summary scores from the patient-reported outcomes measurement information system (PROMIS) global items. Quality of Life Research, 18(7), 873-880. PMID: 19543809
- Hays, R. D., Schalet, B. D., Spritzer, K. L., & Cella, D. (2017). Two-item PROMIS global physical and mental health scales. Journal of Patient-Reported Outcomes, 1(1), 2. PMID: 29757325

### 公式URL

- PROMIS Health Organization: https://www.promishealth.org/
- HealthMeasures: https://www.healthmeasures.net/
- Scoring Service: https://www.assessmentcenter.net/ac_scoringservice
- 翻訳に関する問い合わせ: translations@healthmeasures.net

### 追加情報源

- NIH Common Fund PROMIS: https://commonfund.nih.gov/promis
- Physiopedia PROMIS GH-10: https://www.physio-pedia.com/Patient-Reported_Outcomes_Measurement_Information_System_Global_Health_(PROMIS_GH-10)
- PROMIS Scoring Manual (最新版): https://www.healthmeasures.net/promis-scoring-manuals

## JSON作成時の技術的注意点

### 数式設定

1. **痛みスコア変換の正確な実装**:
   ```javascript
   // 公式変換式（Hays et al. 2009準拠）
   痛み変換 = [[痛み]] == 0 ? 5 : [[痛み]] >= 1 && [[痛み]] <= 3 ? 4 : [[痛み]] >= 4 && [[痛み]] <= 6 ? 3 : [[痛み]] >= 7 && [[痛み]] <= 9 ? 2 : [[痛み]] == 10 ? 1 : 0;
   ```

2. **v1.2 対応: 逆転コーディング**:
   - Global08（疲労）: `selectoridx="5|4|3|2|1"`
   - Global10（感情問題）: `selectoridx="5|4|3|2|1"`

3. **GPH/GMH 計算**:
   - GPH = Global03 + Global06 + 痛み変換 + Global08
   - GMH = Global02 + Global04 + Global05 + Global10

4. **T-score 変換: 公式ルックアップテーブル実装**:
   ```javascript
   // GPH T-score（公式テーブル値）
   GPH_Tスコア = [[GPH合計]] == 4 ? 16.2 : ([[GPH合計]] == 5 ? 19.9 : ([[GPH合計]] == 6 ? 23.5 : // ... 以下、20まで続く
   
   // GMH T-score（公式テーブル値）
   GMH_Tスコア = [[GMH合計]] == 4 ? 21.2 : ([[GMH合計]] == 5 ? 25.1 : ([[GMH合計]] == 6 ? 28.4 : // ... 以下、20まで続く
   ```

5. **エラーハンドリング**:
   - 未入力時（スコア=0）の誤表示を防ぐため、warning/emergency に `> 0` 条件を追加

### 構造化

- 全 10 項目を順序通り配置
- 中間計算用の eval 項目には`noreport: true`設定
- 警告・緊急表示は T-Score 基準で設定（未入力考慮）
- 痛み項目は`required: true`を設定
- バージョン情報（v1.2）を明記

### スコアリングの正確性

本 JSON 実装は、HealthMeasures.net 公式 SAS コードから抽出した正確なルックアップテーブルを使用しており、公式の IRT ベースのスコアリングと同等の結果が得られます。

**出典**:
- ルックアップテーブル: HealthMeasures.net PROMISGlobalscoring.txt（SAS コード）
- 変換値: PROMIS Global Health Scoring Manual Appendix 1

## バージョン情報

### PROMIS Global Health バージョン履歴

- **v1.0/v1.1**: 初期版（疲労・感情問題は元のコーディング）
- **v1.2**: 現行版（疲労・感情問題を逆転コーディング、IRT 自動スコアリング対応）

**重要な変更点（v1.2）**:
1. Global08（疲労）: 1=なし → 5=なし（逆転）
2. Global10（感情問題）: 1=全くない → 5=全くない（逆転）
3. Global07（痛み）: 0-10 スケールを自動的に 1-5 に変換
4. Global09: "過去 7 日間"の文脈を削除（Global09r）

**出典**: PROMIS Global Health Scoring Manual; CODE Technology blog
