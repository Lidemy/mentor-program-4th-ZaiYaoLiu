## 請以自己的話解釋 API 是什麼

API 在我到目前為止看起來，感覺比較像是一種以文字，去連結資料庫中的資料。並且用指令形式對資料進行瀏覽，新增，移除，修改。這方面的行為。

## 請找出三個課程沒教的 HTTP status code 並簡單介紹

[資料來源1](https://developer.mozilla.org/zh-TW/docs/Web/HTTP/Status)
[資料來源2](https://zh.wikipedia.org/wiki/HTTP%E7%8A%B6%E6%80%81%E7%A0%81)

自己有看過的應該就是
1. 403 Forbidden 用戶端並無訪問權限，例如未被授權，所以伺服器拒絕給予應有的回應。
2. 504 Gateway Timeout 道器或者代理工作的伺服器嘗試執行請求時，未能及時從上游伺服器或者輔助伺服器收到回應。
3. 429 Too Many Requests 用戶在給定的時間內發送了過多的請求。

## 假設你現在是個餐廳平台，需要提供 API 給別人串接並提供基本的 CRUD 功能，包括：回傳所有餐廳資料、回傳單一餐廳資料、刪除餐廳、新增餐廳、更改餐廳，你的 API 會長什麼樣子？請提供一份 API 文件。


URL: https://restaurants.com/

| 說明        | 方法    |    位置    |     參數     |
| :---------  | :----  | :----------| :----------  |
| 顯示所有餐廳 |  GET   |   /data    |      無      |
| 顯示單一餐廳 |  GET   | /data/{ID} |      無      |
| 刪除單一餐廳 | DELETE | /data/{ID} |      無      |
| 新增單一餐廳 |  POST  |   /data    | name: 餐廳名稱|
| 更改單一餐廳 | PATCH  | /data/{ID} | name: 餐廳名稱|
