## 資料庫欄位型態 VARCHAR 跟 TEXT 的差別是什麼

VARCHAR 值必須介於 1 與 4000 之間，位元組的儲存大小是所輸入字元個數的兩倍。
TEXT 非Unicode數據，最大長度為2^31-1(2,147,483,647)個字符。

兩者都是可變長度，不會占用多餘的空間。

## Cookie 是什麼？在 HTTP 這一層要怎麼設定 Cookie，瀏覽器又是怎麼把 Cookie 帶去 Server 的？

Cookie 是一種儲存資料的小型文字檔，用於瀏覽器辨別用戶身分而儲存在用戶端上的資料。

透過 response header 的 Set-Cookie 屬性，將使用者狀態記錄在 Cookie。
在 request header 帶上 Cookie 資料；伺服器即可藉由檢視 Cookie 內容，得知瀏覽器使用者的狀態。

## 我們本週實作的會員系統，你能夠想到什麼潛在的問題嗎？

1. 可寫入 HTML 和 JS 的程式碼改變字體跟樣式
2. 密碼儲存透明化，資料流失後可以盜用他人帳密去測試其他網站。儲存密碼時應該加密。
