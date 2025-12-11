# DASH - 問診票作成情報まとめ

## 基本情報

### 著作権
- 原典著者: Hudak PL, Amadio PC, Bombardier C, Upper Extremity Collaborative Group
- 開発機関: American Academy of Orthopedic Surgeons (AAOS), Council of Musculoskeletal Specialty Societies (COMSS), Institute for Work & Health (Toronto)
- 日本語版: 日本手外科学会機能評価委員会
- ライセンス: Institute for Work & Health 2006

### 尺度の概要
- **正式名称**: Disabilities of the Arm, Shoulder and Hand (DASH)
- **日本語名**: 上肢機能障害評価表 (DASH-JSSH)
- **対象年齢**: 成人（18 歳以上）
- **評価目的**: 上肢（腕・肩・手）の機能障害と症状が日常生活に与える影響を評価
- **実施時間**: 約 5-10 分
- **回答者**: 患者本人（自己記入式）

### 開発背景
- **開発者**: Hudak PL, Amadio PC, Bombardier C
- **発行年**: 1996 年
- **理論的基盤**: 上肢の筋骨格障害における身体機能と症状の測定
- **標準化サンプル**: 多国籍（米国、カナダ、オーストラリア 20 施設）

## 尺度構成

### 全体構造
- **総項目数**: 30 項目
- **サブスケール数**: 機能障害・症状スコア（30 項目）
- **評価方式**: 5 段階評価（1-5 点）

### 項目群詳細
#### 1. 日常生活動作 - 21項目（Q1-Q21）
- ビンのフタを開ける、書字、鍵の操作
- 食事準備、重いドア開閉、頭上への動作
- 家事動作、身体ケア、衣服着脱
- レクリエーション活動、交通機関利用
- 性生活

#### 2. 社会生活・仕事への影響 - 2項目（Q22-Q23）
- 社会生活への妨げ
- 仕事・日常生活の制限

#### 3. 症状評価 - 7項目（Q24-Q30）
- 痛み（安静時・運動時・しびれ）
- 筋力低下、こわばり感
- 睡眠障害
- 自己効力感

## 信頼性・妥当性

### 信頼性
- **内的整合性**: クロンバック α 係数 0.93-0.96
- **テスト再テスト信頼性**: r = 0.96（1 週間間隔）
- **評価要件**: 30 項目中最低 27 項目に回答が必要

### 妥当性
- **内容妥当性**: 13 の既存評価尺度から 821 項目を検討し 30 項目に絞り込み
- **構成妥当性**: 因子分析で一因子構造を確認（単次元性）
- **その他**: 他の上肢機能評価尺度との高い相関

## 得点化・解釈

### 基本得点
- 各項目 1-5 点で評価
- 計算式: ((項目合計点数/回答項目数) - 1) × 25
- 0-100 点で表示（点数が高いほど障害が重い）
- 最低 27 項目の回答が必要（30 項目中最大 3 項目まで未回答可）

### スコアの解釈
- **連続変数**: DASH スコアは連続変数として設計、点数が高いほど障害が大きい
- **臨床的に意味のある最小変化量 (MCID)**: 10-15 点
- **障害程度の臨床参考値** (公式カットオフ値ではない):
  - 軽度: 0-30 点
  - 中等度: 31-60 点
  - 重度: 61-100 点

## 実施上の注意点

### 対象者
- 上肢の筋骨格系疾患を有する患者
- 認知機能に問題のない成人
- 日本語での理解・記入が可能な患者

### 評価者
- 特別な訓練は不要（自己記入式）
- 医療従事者による結果解釈が推奨

### 制限事項
- 30 項目中 27 項目以上の回答が必要
- 急性期より慢性期の評価により適している
- 文化的背景による項目の適応度に注意

## 参考文献・URL

### 主要文献
- Hudak PL, Amadio PC, Bombardier C. Development of an upper extremity outcome measure: The DASH (disabilities of the arm, shoulder and hand). Am J Ind Med. 1996;29(6):602-8. PMID: 8748845
- Imaeda T, et al. Validation of the Japanese Society for Surgery of the Hand Version of the DASH-JSSH Questionnaire. J Orthop Sci. 2005;10(4):353-359. PMID: 16075166
- Gummesson C, Atroshi I, Ekdahl C. The disabilities of the arm, shoulder and hand (DASH) outcome questionnaire: longitudinal construct validity and measuring self-rated health change after surgery. BMC Musculoskelet Disord. 2003;4:11. PMID: 12809562

### 公式URL
- DASH 公式サイト: https://dash.iwh.on.ca/
- 日本手外科学会: https://www.jssh.or.jp/doctor/jp/infomation/dash.html

### 追加情報源
- Institute for Work & Health: https://www.iwh.on.ca/
- DASH スコア計算ツール: https://dash.iwh.on.ca/scoring

## JSON作成時の技術的注意点

### 数式設定
- DASH スコア計算: `(([[合計点数]] / [[回答項目数]]) - 1) * 25`
- 回答項目数チェック: 27 項目以上で計算実行
- 選択肢インデックス: 1-5（未回答は 0 として扱われる）

### 構造化
- セクション分け: 日常生活動作、社会生活・仕事、症状の 3 群
- 全 30 項目を必須に設定
- スコア表示: 患者画面には非表示、データ取得側でのみ表示
- 中間変数 I1-I30: 各質問項目のインデックス値を取得し、未入力時の処理を適切に行う
