"""
Created on Fri Jan 23 11:25:01 2026

@author: user
"""

backpack = ['水壺','小刀','過期罐頭','手電筒',]
print('初始背包',backpack)
backpack.append('散彈槍')
print('拿到武器後',backpack)
backpack.insert(0, '解毒劑')
print('緊急放入解毒劑',backpack)
backpack.remove('過期罐頭')
print('吃掉食物後',backpack)
backpack.sort(key=len)
print('整理背包後',backpack)
if '散彈槍' in backpack:
    print('劇情結果：砰！殭屍被轟飛了，你活下來了！')
else:
    print('劇情結果：你變成了殭屍的午餐...')
myStr=backpack
print('最終輕量化背包:',myStr[0:3:1])
