## 請找出三個課程裡面沒提到的 HTML 標籤並一一說明作用。

1. <embed src=""></embed>  聲音檔
		可用於撥放影片或音樂，可以設定撥放行為(autostart)，寬(width)高(heoght)，重複撥放(loop)...等

2. <textarea></textarea> 留言板
		監聽行為中的一種文字傳送表單，可設定 行(cols)列(rows)

3. <select></select> 下拉式選單  <option></option> 選項
		監聽行為中的一種選擇模式。

## 請問什麼是盒模型（box model）

		在 html 標籤中，所有的都視為一個矩形方塊，而盒模型就是一個可以清楚知道自己所選擇的標籤大小，由本體大小(main),內距(padding)邊框(border)外距(margin)位置(postion)，所組合而成的長方形大小。可清楚的知道範圍，方便調整。
		


## 請問 display: inline, block 跟 inline-block 的差別是什麼？

		inline (行內元素)
		不會打亂原本段落中的排版，不會換行

		block (區塊元素)
		以區塊來區隔某部分，會換行

		inline-block (區塊擁有行內性質?)
		不知道中文怎麼解釋，就是將區塊元素附加上行內元素，使區塊可以並排顯示不會換行。

## 請問 position: static, relative, absolute 跟 fixed 的差別是什麼？

		static (預設值) 
		照著瀏覽器預設的配置自動排版在頁面上

		relative (相對定位)
		跟 static 相同，照著瀏覽器預設的配置自動排版在頁面上

		absolute (絕對定位)
		會尋找上層的 relative 來當標準定位，會固定於上層 relative 的某個地方

		fixed (固定定位) 
		元素會相對於瀏覽器視窗來定位，永遠固定於瀏覽器的某個地方
