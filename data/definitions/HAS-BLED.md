# HAS-BLED 出血リスクスコア - 問診票作成情報まとめ

## 基本情報

### 著作権

原典論文: Pisters R, et al. A novel user-friendly score (HAS-BLED) to assess 1-year risk of major bleeding in patients with atrial fibrillation: the Euro Heart Survey. Chest. 2010 Nov;138(5):1093-100. PMID: 20299623

### 尺度の概要

- **正式名称**: HAS-BLED Score (Hypertension, Abnormal renal/liver function, Stroke, Bleeding history or predisposition, Labile INR, Elderly, Drugs/alcohol concomitantly)
- **日本語名**: HAS-BLED 出血リスクスコア
- **対象年齢**: 心房細動を有する成人患者
- **評価目的**: 心房細動患者の抗凝固療法における出血リスク評価
- **実施時間**: 約3-5分
- **回答者**: 医療従事者が患者情報に基づいて評価

### 開発背景

- **開発者**: Pisters R, et al.
- **発行年**: 2010年
- **理論的基盤**: Euro Heart Surveyデータベースの3,978例の心房細動患者の解析
- **標準化サンプル**: ヨーロッパの心房細動患者3,978例

## 尺度構成

### 全体構造

- **総項目数**: 9項目
- **サブスケール数**: なし
- **評価方式**: 二者択一式（あり/なし）、各項目1点

### HAS-BLEDスコア構成要素 - 9項目

1. **H**ypertension（高血圧）- 収縮期血圧160mmHg以上
2. **A**bnormal renal function（腎機能異常）- 慢性透析、腎移植、血清クレアチニン200μmol/L（≒2.26mg/dL）以上
3. **A**bnormal liver function（肝機能異常）- 慢性肝疾患または肝機能検査値異常
4. **S**troke（脳卒中）- 脳卒中の既往歴
5. **B**leeding（出血既往）- 出血歴、出血傾向、貧血など
6. **L**abile INR（不安定なINR）- 高値または不安定なINR、TTR60%未満
7. **E**lderly（高齢）- 65歳以上
8. **D**rugs（薬物）- 抗血小板薬またはNSAIDsの併用
9. **D**rugs/alcohol（アルコール）- アルコール依存症または乱用

## 信頼性・妥当性

### 信頼性

- **内的整合性**: C統計量0.72（全症例）
- **評定者間信頼性**: 良好（簡便な評価項目のため）

### 妥当性

- **感度**: 良好な出血リスク予測能
- **特異度**: 他の出血リスクスコア（HEMORR2HAGES、ATRIA）より優れた判別能
- **その他**: 複数のヨーロッパ諸国での検証済み、日本人でも有効性確認

## 得点化・解釈

### 基本得点

各項目該当時に1点を加算し、合計点（0-9点）を算出

### 出血リスクの目安

- **低リスク**: 0点（年間重大出血率約1%）
- **中等度リスク**: 1-2点（年間重大出血率約2-4%）
- **高リスク**: 3点以上（年間重大出血率約4-6%）

## 実施上の注意点

### 対象者

- 心房細動患者で抗凝固療法を検討中または実施中の患者
- 年齢制限なし（高齢は評価項目の一部）

### 評価者

- 医師、薬剤師等の医療従事者
- 患者の医療情報へのアクセスが必要

### 制限事項

- ワルファリン使用患者を対象として開発されたため、DOAC使用患者では限界がある
- 3点以上でも抗凝固療法の絶対的禁忌ではなく、より慎重な管理が必要

## 参考文献・URL

### 主要文献

- Pisters R, et al. A novel user-friendly score (HAS-BLED) to assess 1-year risk of major bleeding in patients with atrial fibrillation: the Euro Heart Survey. Chest. 2010 Nov;138(5):1093-100.
- 日本循環器学会 日本不整脈心電学会合同ガイドライン. 2020年改訂版 不整脈薬物治療ガイドライン

### 公式URL

- Wikipedia: https://en.wikipedia.org/wiki/HAS-BLED
- ACC記事: https://www.acc.org/latest-in-cardiology/articles/2014/07/18/15/13/has-bled-tool-what-is-the-real-risk-of-bleeding-in-anticoagulation
- 日本循環器学会ガイドライン: http://www.j-circ.or.jp/

### 追加情報源

- ESC Guidelines on atrial fibrillation (European Society of Cardiology)
- AHA/ACC/HRS Guidelines (American Heart Association/American College of Cardiology/Heart Rhythm Society)

## JSON作成時の技術的注意点

### 数式設定

- 合計スコア計算: `[[高血圧.index]] + [[腎機能異常.index]] + [[肝機能異常.index]] + [[脳卒中既往.index]] + [[出血既往.index]] + [[不安定INR.index]] + [[高齢.index]] + [[抗血小板薬.index]] + [[アルコール依存.index]]`
- リスク評価: 3項演算子を用いた条件分岐
- 年間出血率表示: スコアに応じた文字列表示
- eval式の括弧処理: `((`や`))`使用時は空白を挿入してエラー回避

### 構造化

- radio形式による二者択一（あり/なし）
- selectoridxで0/1の点数設定
- warning項目にはname, descriptionを必須記載
- 腎機能異常：日本の臨床現場での利便性を考慮し単位併記（μmol/Lとmg/dL）
