## 什麼是 DOM？

文件物件模型（Document Object Model, DOM）是 HTML、XML 和 SVG 文件的程式介面。它提供了一個文件（樹）的結構化表示法，並定義讓程式可以存取並改變文件架構、風格和內容的方法。DOM 提供了文件以擁有屬性與函式的節點與物件組成的結構化表示。節點也可以附加事件處理程序，一旦觸發事件就會執行處理程序。 本質上，它將網頁與腳本或程式語言連結在一起。

[來源](https://developer.mozilla.org/zh-TW/docs/Web/API/Document_Object_Model)

## 事件傳遞機制的順序是什麼；什麼是冒泡，什麼又是捕獲？

先捕獲(capture)後冒泡(bubbling)。
捕獲階段(capture phase)由大往小，依序從螢幕(window)，物件(document)...直到所選擇的目標。
冒泡階段(bubbling phase)由小往大，反向於捕獲階段，從所選擇目標反向推至螢幕(window)

## 什麼是 event delegation，為什麼我們需要它？

找了很多解釋，但是還是不是很了解。
事件代理機制，感覺就是一個將多個有相同 event handler 統一用一個函數整理並搜尋。可節省多次事件所執行的傳遞機制，節省每次捕獲跟冒泡的處理，也節省處理跟執行的時間。

## event.preventDefault() 跟 event.stopPropagation() 差在哪裡，可以舉個範例嗎？

event.preventDefault()
取消事件的預設行為，但不會影響事件的傳遞，事件仍會繼續傳遞。
event.stopPropagation()
可阻止當前事件繼續進行捕捉（capturing）及冒泡（bubbling）階段的傳遞。

```
<div id="parent">
  <a id="click" href="#">人</a>
</div>

<script>
	var click = document.getElementById("click")

	child.onclick = function(e) { 
		e.preventDefault();
	  console.log('外表'); 
	};

	child.parentNode.onclick = function(e) { 
	  console.log('內在'); 
	};
</script>
```
執行後會顯示外表跟內在
```
<div id="parent">
  <a id="click" href="#">人</a>
</div>

<script>
	var click = document.getElementById("click")

	child.onclick = function(e) { 
		e.stopPropagation(); 
	  console.log('外表'); 
	};

	child.parentNode.onclick = function(e) { 
	  console.log('內在'); 
	};
</script>
```
執行後只會顯示外表