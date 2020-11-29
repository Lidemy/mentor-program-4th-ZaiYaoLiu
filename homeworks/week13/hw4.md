## Webpack 是做什麼用的？可以不用它嗎？

1. Webpack 是一個開源的前端打包工具。Webpack 提供了前端開發缺乏的模組化開發方式，將各種靜態資源視為模組，並從它生成最佳化過的程式碼。
2. 可以不使用，但要達到相同的狀態需要引用多方面的整合工具連結，非常的不方便。

## gulp 跟 webpack 有什麼不一樣？

gulp 屬於前端工具類，主要優化前端工作流程。比如自動刷新頁面、combo、壓縮css、js、css預編譯等等
webpack 屬於預編譯模塊的方案，不需要在瀏覽器中加載解釋器。另外，你在本地直接寫JS，不管是 AMD / CMD / ES6 風格的模塊化，它都能認識，並且編譯成瀏覽器認識的JS

原文網址：https://kknews.cc/code/3vm94o3.html

一個偏向於自動化執行工具，一個偏向於模組整合組裝。


## CSS Selector 權重的計算方式為何？

a. ID 選擇器
b. 類別選擇器、屬性選擇器、偽類選擇器
c. 元素選擇器、偽元素選擇器
d. 任何元素選擇符*沒有權級

而a >b >c >d

權重值的表示通常為（ID, class, element)，也就是：
element selector ( 0 ,0, 1)
class selector ( 0, 1, 0)
ID selector ( 1, 0, 0)
數值只會在同個權級比較而已，若是不同權級，數值再大也大不過高的權級。