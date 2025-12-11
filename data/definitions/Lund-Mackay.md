# Lund-Mackay Staging System - 問診票作成情報まとめ

## 基本情報

### 著作権

公的ドメイン

### 尺度の概要

- **正式名称**: Lund-Mackay Staging System (LMSS)
- **日本語名**: Lund-Mackay ステージングシステム
- **対象年齢**: 成人
- **評価目的**: 慢性鼻副鼻腔炎の CT 画像による炎症程度評価
- **実施時間**: 5 分
- **回答者**: 放射線科医または耳鼻咽喉科医

### 開発背景

- **開発者**: Valerie J. Lund, Ian S. Mackay
- **発行年**: 1993 年
- **理論的基盤**: CT 画像で副鼻腔の炎症を定量化し、手術適応判断に活用
- **標準化サンプル**: 慢性鼻副鼻腔炎患者、英国で開発

## 尺度構成

### 全体構造

- **総項目数**: 12 項目 (6 部位 × 左右)
- **サブスケール数**: なし
- **評価方式**: 0-24 点スケール (副鼻腔各 0-2 点、OMC 各 0 または 2 点)

### 評価部位詳細

#### 1. 副鼻腔 (左右各 5 部位) - 各 0-2 点

- 上顎洞
- 前篩骨洞
- 後篩骨洞
- 蝶形骨洞
- 前頭洞

**評価基準**:

- 0 点: 正常
- 1 点: 部分的陰影
- 2 点: 完全陰影

#### 2. 骨鼻道複合体 (OMC) (左右各 1 部位) - 各 0 または 2 点

- 閉塞なし: 0 点
- 閉塞あり: 2 点

## 信頼性・妥当性

### 信頼性

- **内的整合性**: 高い
- **テスト再テスト信頼性**: 高い
- **評定者間信頼性**: 中程度から高い

### 妥当性

- **感度**: 高い
- **特異度**: 高い
- **その他**: 慢性鼻副鼻腔炎評価の国際標準、800 以上の引用文献

## 得点化・解釈

### 基本得点

- 全 12 項目の合計点 (0-24 点)
- 左右別々に評価し合算

### 重症度の目安

- **軽度**: 0-4 点
- **中等度**: 5-8 点
- **重度**: 9-24 点

## 実施上の注意点

### 対象者

- 慢性鼻副鼻腔炎患者
- CT 検査を受けた患者

### 評価者

- 放射線科医
- 耳鼻咽喉科医
- CT 読影に習熟した医師

### 制限事項

- CT 検査が必須
- 手術既往のある患者では評価が困難な場合がある
- 前頭洞欠損患者では調整が必要

## 参考文献・URL

### 主要文献

- Lund VJ, Mackay IS. Staging in rhinosinusitis. Rhinology 1993;31:183-4.
- Hopkins C, Browne JP, Slack R, et al. The Lund-Mackay staging system for chronic rhinosinusitis: how is it used and what does it predict? Otolaryngol Head Neck Surg. 2007;137(4):555-61.

### 公式 URL

- https://pubmed.ncbi.nlm.nih.gov/7942622/
- https://radiopaedia.org/articles/lund-mackay-score

### 追加情報源

- European Position Paper on Rhinosinusitis and Nasal Polyps (EPOS)

## JSON 作成時の技術的注意点

### 数式設定

- 合計スコア = 全 12 項目の単純合計
- 式: `[[右上顎洞.index]] + [[右前篩骨洞.index]] + ... + [[左OMC.index]]`
- すべて整数値 `[[field.index]]` を使用

### 構造化

- 左右でセクション分けし見やすさを確保
- 各副鼻腔項目は radio 型、selectoridx "0|1|2"
- OMC のみ selectoridx "0|2" (中間値なし)
- 重症度分類は eval で 3 項演算子を使用
- warning: 5 点以上、emergency: 9 点以上
