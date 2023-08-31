from machine_learning_ultraupgrade import Learning as Le
import math
import json
import numpy as np
from matplotlib import pyplot as py

#今回は，2層のニューラルネットワークを使ってフィッティングするよ。

#フィッテングするデータをプロット
x = []
y = []
N = 10

noize = np.random.normal(
    loc=0,
    scale=1 / 100,
    size = N
)

noize = list(map(float,noize))

for i in range(N):
    x.append((2  / N) * i - 1)
    y.append(10 * math.sin(4 * x[i]) + 3 * math.cos(x[i] / 2) + noize[i])
py.plot(x,y,label="sample_data",marker="*",linestyle='None')

with open('./temporarily_saved/learning.json') as f:
    input = json.load(f)

W_1 = input['weights'][0]
W = input['weights'][1]

f_weights = [[[Le.pow0,Le.pow1,Le.pow2,Le.pow3,Le.pow4,Le.pow5,Le.pow6,math.sin],W_1],[[Le.pow1],W]]
z_outputs = []
for i in range(N):
    z_outputs.append(Le.neuralnetwork([x[i]],f_weights))
py.plot(x,z_outputs,label="before",marker=".")

#フィッティングさせてみる
for i in range(10000):
    Le.implovement(x,y,f_weights,0.037)
#どれくらい改善されたか見てみる
with open('./temporarily_saved/learning.json') as f:
    input = json.load(f)

W_1 = input['weights'][0]
W = input['weights'][1]


f_weights = [[[Le.pow0,Le.pow1,Le.pow2,Le.pow3,Le.pow4,Le.pow5,Le.pow6,math.sin],W_1],[[Le.pow1],W]]
z_outputs = []
for i in range(N):
    z_outputs.append(Le.neuralnetwork([x[i]],f_weights))
py.plot(x,z_outputs,label="after",marker="x")

py.legend()
py.show()