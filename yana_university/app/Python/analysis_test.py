import analysis
from matplotlib import pyplot as py
import math

def pow(x):
    return x ** 3

x = []
y = []
z = []
n = 3
N = 100
epsilon = 0.01
for i in range(N):
    x.append((2 / N) * i - 1)
    y.append(pow(x[i]))
    z.append(analysis.derivative(pow,x[i],epsilon))
py.plot(x,y,label="x^n")
py.plot(x,z,label="n * x^{n-1}")
py.legend()
py.show()