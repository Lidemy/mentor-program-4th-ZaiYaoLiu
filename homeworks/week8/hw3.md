## 什麼是 Ajax？

Asynchronous JavaScript and XML 
一種非同步的JavaScript與XML技術，用於減少資料的回應等待時間。

[資料來源](https://zh.wikipedia.org/wiki/AJAX)

## 用 Ajax 與我們用表單送出資料的差別在哪？

傳統的Web應用允許用戶端填寫表單（form），當送出表單時就向網頁伺服器傳送一個請求。伺服器接收並處理傳來的表單，然後送回一個新的網頁，但這個做法浪費了許多頻寬，因為在前後兩個頁面中的大部分HTML碼往往是相同的。由於每次應用的溝通都需要向伺服器傳送請求，應用的回應時間依賴於伺服器的回應時間。這導致了使用者介面的回應比本機應用慢得多。

與此不同，AJAX應用可以僅向伺服器傳送並取回必須的資料，並在客戶端採用JavaScript處理來自伺服器的回應。因為在伺服器和瀏覽器之間交換的資料大量減少，伺服器回應更快了。同時，很多的處理工作可以在發出請求的客戶端機器上完成，因此Web伺服器的負荷也減少了。

[資料來源](https://zh.wikipedia.org/wiki/AJAX)

## JSONP 是什麼？

JSONP（JSON with Padding）是資料格式JSON的一種「使用模式」，可以讓網頁從別的網域要資料。

[資料來源](https://zh.wikipedia.org/wiki/JSONP)

## 要如何存取跨網域的 API？

開啟跨來源 HTTP 請求的話，Server 必須在 Response 的 Header 裡面加上Access-Control-Allow-Origin。

[資料來源](https://blog.techbridge.cc/2017/05/20/api-ajax-cors-and-jsonp/)


## 為什麼我們在第四週時沒碰到跨網域的問題，這週卻碰到了？

因為 node.js 發送的請求並沒有經過瀏覽器直接從伺服器抓取資料，所以沒有 Domain 的問題。