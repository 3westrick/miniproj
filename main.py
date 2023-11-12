import subprocess
import os, glob
from pathlib import Path


arr = []

for img in Path('.').glob('public/IMAGE/product/*'):
    arr.append(str(img)[6:])


arr.sort()
odds = 0
for i in arr:
    if odds % 2 == 0:
        print('[', end=" ")
    print("'"+i+"',", end=" ")
    if odds % 2 == 1:
        print('],')
    odds = odds + 1