from machine_learning_ultraupgrade import Learning as Le
import math
import json
import numpy as np
from matplotlib import pyplot as py

#今回は，2層のニューラルネットワークを使ってフィッティングするよ。

#フィッテングするデータをプロット
x = []
y = []
N = 50

noize = np.random.normal(
    loc=0,
    scale=1.0,
    size = N
)

for i in range(N):
    x.append((2  / N) * i - 1)
    y.append(math.sin(math.pi * x[i]))
py.plot(x,y,label="data_obtained",marker="*")

with open('./temporarily_saved/learning.json') as f:
    input = json.load(f)

W_1 = input['weights'][0] #5 x 1の行列
W_2 = input['weights'][1] #2 * 5の行列
W = input['weights'][2] #1 x 3の行列

f_weights = [[[math.sin,math.sin,math.cos,math.cos],W_1],[[math.sin,math.cos],W_2],[[Le.pow1],W]]
z_outputs = []
for i in range(N):
    z_outputs.append(Le.neuralnetwork([x[i]],f_weights))
py.plot(x,z_outputs,label="before",marker=".")

#フィッティングさせてみる
for i in range(10000):
    Le.implovement(x,y,f_weights,0.0001)
#どれくらい改善されたか見てみる
with open('./temporarily_saved/learning.json') as f:
    input = json.load(f)

W_1 = input['weights'][0]
W_2 = input['weights'][1]
W = input['weights'][2]

f_weights = [[[math.sin,math.sin,math.cos,math.cos],W_1],[[math.sin,math.cos],W_2],[[Le.pow1],W]]
z_outputs = []
for i in range(N):
    z_outputs.append(Le.neuralnetwork([x[i]],f_weights))
py.plot(x,z_outputs,label="after",marker="x")

py.legend()
py.show()