# 問い合わせページ作成プラグイン設定ファイル

## 概要
問い合わせページ作成に当たり利用したWordPressプラグインの設定ファイルです。

## 導入したプラグイン
- Contact Form 7
- Contact Form 7 Multi-Step Forms

## それぞれの内容
- contact_form__top.txt     : 問い合わせページTOP用のフォームデータ
- contact_form__confirm.txt : 問い合わせページでの入力後、確認ページ用のフォームデータ

## 使い方
- 「Contact Form 7」,「Contact Form 7 Multi-Step Forms」プラグインをWordPress上からインストール

- 固定ページで、「問い合わせ」ページ・「確認」ページ・「問い合わせ完了」ページを作成する
　　※実際に作成した際は、各ページのスラッグを以下の通り設定した
　　「問い合わせ」ページ="contact"・「確認」ページ="confirm"・「問い合わせ完了」ページ="thanks"

- 「Contact Form 7」メニューから「問い合わせ」ページ用のフォームを作成する。 
　　※contact_form__top.txt の内容をコピー

- 「Contact Form 7」メニューから「確認」ページ用のフォームを作成する。
　　※contact_form__confirm.txt の内容をコピー

- 「Contact Form 7」メニューから「問い合わせ」ページ用フォームのショートコードをコピーする。

- 固定ページメニューから「問い合わせ」ページ内にショートコードブロックを追加して、ページ内にショートコードをペーストする。

- 同様に「確認」ページ用フォームのショートコードもコピーして、「確認」ページ内にペーストする