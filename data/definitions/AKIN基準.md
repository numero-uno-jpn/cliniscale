# AKIN 基準 作成情報まとめ

## 基本情報

### 著作権

AKIN 基準は 2007 年に Acute Kidney Injury Network（AKIN）により公表された急性腎障害の診断基準で、医学的診断基準として広く使用されている。

### 尺度の概要

- **正式名称**: Acute Kidney Injury Network Criteria (AKIN)
- **日本語名**: AKIN 基準・急性腎障害ネットワーク基準
- **対象年齢**: 成人（18 歳以上）
- **評価目的**: 急性腎障害の診断と重症度分類
- **実施時間**: 5-10 分（血液検査・尿量測定結果必要）
- **回答者**: 医師・看護師・臨床検査技師

### 開発背景

- **開発者**: Acute Kidney Injury Network (AKIN)
- **発行年**: 2007 年
- **理論的基盤**: RIFLE 基準の修正版として開発
- **標準化サンプル**: 多施設共同研究による検証

## 尺度構成

### 全体構造

- **総項目数**: 血清クレアチニン基準と尿量基準の 2 つの主要指標
- **サブスケール数**: Stage1-3 の 3 段階分類
- **評価方式**: 血清クレアチニンと尿量の変化による客観的評価

### 診断基準詳細

#### AKI 診断定義（以下のいずれか 1 つを満たす）
- 48 時間以内の血清クレアチニン上昇 ≥0.3mg/dL
- 基準値から 1.5 倍以上の血清クレアチニン上昇
- 尿量 <0.5mL/kg/時が 6 時間以上持続

#### Stage 分類
- **Stage1**: sCr 1.5-2.0 倍上昇 または ≥0.3mg/dL 上昇 / 尿量 <0.5mL/kg/時 ×6 時間以上
- **Stage2**: sCr 2.0-3.0 倍上昇 / 尿量 <0.5mL/kg/時 ×12 時間以上
- **Stage3**: sCr 3.0 倍以上上昇 または ≥4.0mg/dL または腎代替療法開始 / 尿量 <0.3mL/kg/時 ×24 時間以上 または 12 時間以上の無尿

## 信頼性・妥当性

### 信頼性

- **内的整合性**: 血清クレアチニンと尿量基準で高い一致性
- **再現性**: 多施設での検証により高い再現性を確認
- **評定者間信頼性**: 客観的指標のため評定者間のばらつきは最小

### 妥当性

- **予測妥当性**: 死亡率・合併症発生率と強い相関
- **構成概念妥当性**: RIFLE 基準との高い相関（r>0.9）
- **基準関連妥当性**: 透析導入・ICU 滞在期間との関連性確認

## 得点化・解釈

### 基本得点

血清クレアチニンと尿量の 2 つの基準で評価し、より重症度の高い方を採用

### 重症度の目安

- **Stage1（軽度）**: 早期介入により回復可能な段階
- **Stage2（中等度）**: 積極的治療介入が必要な段階
- **Stage3（重度）**: 腎代替療法を考慮すべき重篤な段階

## 実施上の注意点

### 対象者

- 急性腎障害が疑われる入院患者
- 腎毒性薬剤使用患者
- 重篤疾患・手術患者

### 評価者

- 血清クレアチニン値の正確な測定が必要
- 尿量の正確な測定・記録が不可欠
- 体液量補正後の評価が推奨される

### 制限事項

- ベースライン腎機能が不明な場合は評価困難
- 慢性腎臓病患者では解釈に注意が必要
- 利尿薬使用時は尿量基準の解釈が困難

## 参考文献・URL

### 主要文献

- Mehta RL, et al. Acute Kidney Injury Network: report of an initiative to improve outcomes in acute kidney injury. Crit Care 2007;11:R31.
- KDIGO Clinical Practice Guideline for Acute Kidney Injury. Kidney Int Suppl 2012;2:1-138.

### 公式URL

- 原典論文: https://ccforum.com/articles/10.1186/cc5713
- 日本腎臓学会: https://jsn.or.jp/
- AKI 診療ガイドライン 2016: https://cdn.jsn.or.jp/guideline/pdf/419-533.pdf

### 追加情報源

- MDCalc AKIN Calculator: https://www.mdcalc.com/calc/10018/akin-classification-acute-kidney-injury-aki
- KDIGO AKI Guideline: https://kdigo.org/guidelines/acute-kidney-injury/

## JSON作成時の技術的注意点

### 数式設定

- 血清クレアチニン変化値: ((現在 Cr)) - ((基準値 Cr))
- 血清クレアチニン倍率: ((現在 Cr)) / ((基準値 Cr))
- 時間尿量率: ((尿量)) / ((体重)) / (時間)
- Stage 判定: 複数条件の論理演算子使用（JavaScript 形式: &&, ||）

### 構造化

- subsection 使用による dark mode 対応
- eval 項目での段階的計算処理
- warning/emergency での重症度表示（name 必須）
- 中間計算項目は noreport 設定で非表示化
