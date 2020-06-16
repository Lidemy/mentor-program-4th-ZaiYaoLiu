read -p "請輸入帳號:" x
wget https://api.github.com/users/${x}
echo "暱稱:"
grep name ${x} | sed "2d" | cut -c 10-
echo "介紹:"
grep bio ${x} | cut -c 9-
echo "地點:"
grep location ${x} | cut -c 14-
echo "個人網站:"
grep blog ${x} | cut -c 10-
rm ${x}