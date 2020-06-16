#!/bin/bash

read -p "請輸入想新增的數量:" x

for (( i = 1 ; i < ${x} + 1; i++))
do
	touch ${i}.js
done

