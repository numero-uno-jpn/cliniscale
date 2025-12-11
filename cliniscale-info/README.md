# CliniScale Info - PHP版詳細情報表示システム

## 概要

CliniScaleの質問票詳細情報を純粋なPHPで表示するシステムです。
Vue.jsのSPAで実装されていた詳細情報パネルをPHPで再実装しています。

## 特徴

- ✅ JavaScript不使用の純粋なPHPアプリケーション
- ✅ YAMLファイルから質問票データを読み込み
- ✅ Markdownから詳細情報を抽出・整形
- ✅ Tailwind CSSによるレスポンシブデザイン
- ✅ DOI/PMID/PMCIDの自動リンク化
- ✅ 構造化された著作権情報の表示

## ディレクトリ構造

```
cliniscale-info/
├── info.php                    # メインエントリポイント
├── lib/
│   ├── DataLoader.php         # YAMLとMarkdownのロード
│   ├── MarkdownParser.php     # Markdownパース処理
│   ├── InfoDataProcessor.php  # データ統合ロジック
│   └── InfoRenderer.php       # HTML生成
├── questionnaires/             # 質問票データディレクトリ
│   ├── PHQ-9.yaml             # YAML形式の質問票定義
│   └── PHQ-9.md               # Markdown形式の詳細情報
└── README.md
```

## 使用方法

### 基本的な使い方

```
http://your-domain/info.php?q=PHQ-9
```

URLパラメータ `q` に質問票のキーを指定します。

### ローカルテスト

```bash
cd /home/claude/cliniscale-info
php -S localhost:8000
```

ブラウザで以下にアクセス:
```
http://localhost:8000/info.php?q=PHQ-9
```

## 必要な環境

- **PHP 7.4以上** (7.4.33で動作確認済み)
- php-yaml拡張モジュール
- php-mbstring拡張モジュール
- php-curl拡張モジュール（外部API使用時）

### PHP 7.4での確認方法

```bash
php --version
# PHP 7.4.33 (cli) ...

php -m | grep -E "yaml|mbstring"
# yaml
# mbstring
```

## データ構造

### マスターYAMLファイル形式

実際の環境では、すべての質問票データが1つのYAMLファイルにまとまっています:

```yaml
PHQ-9:
  categories: ["精神科", "心理学"]
  abbreviation: PHQ-9
  full_name: Patient Health Questionnaire-9
  purpose: うつ病スクリーニング・重症度評価 (9項目、0-27点)
  description: PHQ-9は、うつ病のスクリーニング...
  copyright:
    license_category: "public_domain"
    commercial_use: true
    permission_required: false
    fees_required: false
    training_required: false
    original_developers: "Drs. Robert L. Spitzer..."
    japanese_version: "Validated Japanese version..."
    recommendations: "原著者を明記し、パブリックドメインである旨を記載"

BDI-II:
  categories: ["精神科", "心理学"]
  abbreviation: BDI-II
  # ...
```

**ファイルパス**: `/home/medeputize/www/documents/emuyn/cliniscale/スコア票リスト.yaml`

### Markdownファイル形式

```markdown
# 質問票名

## 概要

### 尺度の概要
- **正式名称**: ...
- **日本語名**: ...

### 開発背景
- **開発者**: ...
- **発行年**: ...

### 著作権
著作権情報...

### 重症度の目安
解釈ガイドライン...

### 主要文献
- 文献1
- 文献2

### 公式URL
- タイトル: https://example.com
```

## クラス構成

### DataLoader
- YAMLファイルの読み込み
- Markdownファイルの読み込み（ローカル/API）
- データの統合

### MarkdownParser
- Markdownのパース
- セクション抽出
- URL/DOI/PMID/PMCIDの自動リンク化
- フィールド抽出

### InfoDataProcessor
- YAMLとMarkdownの統合
- infoData構造の生成（Vue版と互換）

### InfoRenderer
- HTML生成
- 著作権情報の構造化表示
- レスポンシブデザイン

## 開発のポイント

1. **データソースの優先順位**: YAML > Markdown
2. **Markdownの取得**: API優先、失敗時はローカル
3. **セキュリティ**: 質問票キーのバリデーション実装済み
4. **エラーハンドリング**: 適切なHTTPステータスコード返却

## 今後の拡張

- [ ] キャッシュ機構の実装
- [ ] 複数質問票の一覧表示
- [ ] 検索機能
- [ ] PDF出力機能
- [ ] 多言語対応

## ライセンス

このシステムはCliniScaleプロジェクトの一部です。
