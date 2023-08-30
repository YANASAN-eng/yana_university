@extends('layouts.lesson_template')

@section('title','python')

@section('style')

@endsection
@section('sentences')
    <div class="chapter">
        <h1>線形代数</h1>
        <div class="input_linear_form">
            <form id="type_of_matrix"action="{{url('/programming/python/linear')}}"method="get">
                @csrf
                <table>
                    <tr>
                        <th>行列の行数</th>
                        <td><input name="row"type="text"placeholder="行列の行数を入力してください．"></td>
                    </tr>
                    <tr>
                        <th>行列の列数</th>
                        <td><input name="column"type="text"placeholder="行列の列数を入力してください．"></td>
                    </tr> 
                </table>
                <input type="submit"value="行列の型を入力"style="font-wight:bold;background-color:rgba(255,0,0,0.6);">
            </form>
            @yield('type_of_matrix')
        </div>
    </div>
    <div class="chapter">
        <h1>スクレイピング</h1>
    </div>
    <div class="chapter">
        <h1>機械学習</h1>
        <h2>
            下記はバックプロパゲーションに関する
            簡単なコードです．
        </h2>
        <div style="overflow:scroll;height:300px;background-color:white;">
            <pre>
                <code style="font-size:16px;font-weight:bold;">
import analysis as ana
import numpy as np
import math
from matplotlib import pyplot
import json

class Learning:
    #複数の行列に関する和
    @classmethod
    def add(cls,*inputs):
        matrix = []
        row = []
        sum = 0
        num = len(inputs)
        count = 0
        if num == 0:
            print('入力された行列がありません')
        if num == 1:
            return inputs[0]
        else:
            #和が定義できるかを判定
            for n in range(num - 1):
                if(len(inputs[n]) == len(inputs[n + 1])):
                    count = count + 1
                if(len(inputs[n][0]) == len(inputs[n + 1][0])):
                    count = count + 1
            if(count == 2 * (num - 1)):
                for i in range(len(inputs[0])):
                    for j in range(len(inputs[0][0])):
                        for n in range(num):
                            sum = sum + inputs[n][i][j]
                        row.append(sum)
                        sum = 0
                    matrix.append(row)
                    row = []
                return matrix
            else:
                print('入力された行列達のすべての型が一致しないので和を定義できません．')
                return None
    #複数の行列の積
    @classmethod
    def times(cls,*inputs):
        num = len(inputs)
        count = 0
        sum = 0
        row = []
        matrix = []
        temp = []
        for n in range(num - 1):
            if(len(inputs[n][0]) == len(inputs[n + 1])):
                count = count + 1
        if(count == num - 1):
            for n in range(num - 1):
                if(n == 0):
                    for i in range(len(inputs[n])):
                        for k in range(len(inputs[n + 1][0])):
                            for j in range(len(inputs[n][0])):
                                sum = sum + inputs[n][i][j] * inputs[n + 1][j][k]
                            row.append(sum)
                            sum = 0
                        matrix.append(row)
                        row = []
                else:
                    temp = matrix
                    matrix = []
                    for i in range(len(temp)):
                        for k in range(len(inputs[n + 1][0])):
                            for j in range(len(inputs[n + 1])):
                                sum = sum + temp[i][j] * inputs[n + 1][j][k]
                            row.append(sum)
                            sum = 0
                        matrix.append(row)
                        row = []
                        if(i == len(temp) - 1):
                            temp = matrix
            matrix = temp
            return matrix
        else:
            print('積を定義することができません')
            return None
    #スカラー積
    @classmethod
    def scalar(cls,s,A):
        m = len(A)
        n = len(A[0])
        B = []
        row = []
        for i in range(m):
            for j in range(n):
                row.append(s * A[i][j])
            B.append(row)
            row = []
        return B
    #差分
    @classmethod
    def mainus(cls,A,B):
        C = cls.scalar(-1,B)
        D = []
        row = []
        for i in range(len(A)):
            for j in range(len(A[0])):
                row.append(A[i][j] + C[i][j])
            D.append(row)
            row = []
        return D      
    #ノルム
    @classmethod
    def norm(cls,A):
        m = len(A)
        n = len(A[0])
        sum = 0
        for i in range(m):
            for j in range(n):
                sum = sum + A[i][j] * A[i][j]
        return math.sqrt(sum)
    #線形変換
    @classmethod
    def linear_transformation(cls,W,z_1):
        z_2 = []
        sum = 0
        for i in range(len(W)):
            for j in range(len(W[0])):
                sum = sum + W[i][j] * z_1[j]
            z_2.append(sum)
            sum = 0
        return z_2
    #非線形変換
    @classmethod
    def nonlinear_transformation(cls,f,z):
        n = len(z)
        w = []
        for i in range(n):
            w.append(f(z[i]))
        return w
    #n層Neuralネットワーク
    @classmethod
    def neuralnetwork(cls,z_input,f,*weights):
        n = len(weights)
        temp = z_input
        z_output = []
        for layer_number in range(n):
            z_output = cls.linear_transformation(weights[layer_number],temp)
            temp = z_output
            z_output = cls.nonlinear_transformation(f,temp)
            temp = z_output
        z_output = temp
        return z_output
    #出力部分
    @classmethod
    def output(cls,z,W):
        vector = []
        sum = 0
        for i in range(len(W)):
            for j in range(len(W[0])):
                sum = sum + W[i][j] * z[j]
            vector.append(sum)
            sum = 0
        return vector
    #二乗誤差関数
    @classmethod
    def error(cls,z_output,z_correct):
        sum = 0
        for i in range(len(z_output)):
            sum = sum + (z_output - z_correct) ** 2
        return sum / len(z_output)
    #二乗誤差関数の出力に関する微分
    @classmethod
    def dEdz_output(cls,z_output,z_correct):
        dEdz_output = []
        for p in range(len(z_output)):
            dEdz_output.append(2 * z_output[p] * (z_output[p] - z_correct[p]))
        return dEdz_output
    #\frac{\partial z_{p}^{k + 1}}{\partial z_{r}^{k}}
    @classmethod
    def dzdz(cls,z,f,W):
        matrix = []
        row = []
        sum = 0
        epsilon = 0.001
        for p in range(len(W)):
            for q in range(len(W[0])):
                for j in range(len(W[0])):
                    sum = sum + W[p][j] * z[j]
                sum = W[p][q] * ana.derivative(f,sum,epsilon)
                row.append(sum)
                sum = 0
            matrix.append(row)
            row = []
        return matrix
    #\frac{\partial z_{p}^{k + 1}}{\partial W_{qr}^{k + 1}}
    @classmethod
    def dzdW(cls,z,f,W):
        tensor = []
        matrix = []
        row = []
        sum = 0
        epsilon = 0.0001
        for p in range(len(W)):
            for q in range(len(W)):
                for r in range(len(W[0])):
                    if(p == q):
                        for j in range(len(W[0])):
                            sum = sum + W[p][j] * z[j]
                        sum = z[r] * ana.derivative(f,sum,epsilon)
                    else:
                        sum = 0
                    row.append(sum)
                    sum = 0
                matrix.append(row)
            tensor.append(matrix)
            matrix = []
        return tensor
    #恒等写像
    @classmethod
    def I(cls,x):
        return x
    #バックプロパゲーション
    @classmethod
    def backpropagation(cls,z,z_correct,f,W,*weights):
        #k層までの重み
        weights_layer = []
        #z_0,z_1,z_2,...z_n,z_{n + 1}
        z_column = []
        z_column.append(z)
        #z_1,z_2,...,z_n取得
        n = len(weights)
        for k in range(n):
            weights_layer.append(weights[k])
            z_column.append(cls.neuralnetwork(z_column[0],f,weights_layer[k]))
        #z_{n + 1}取得
        z_column.append(cls.output(z_column[n],W))
        #\frac{\partial E}{\partial output}
        dEdz_output = cls.dEdz_output(z_column[n + 1],z_correct)
        #\frac{\partial z_{p}^{k}}{\partial z_{q}^{k - 1}}
        #k = n,n-1,...,0である事に注意
        dzdzs = []
        for k in range(n + 1):
            if(k == 0):
                dzdzs.append(W)
            else:
                dzdzs.append(cls.dzdz(z_column[n - k],f,weights[n - k]))
        #\frac{\partial z_{p}^{k}}{\partial W_{pq}^{k}}
        dzdWs = []
        for k in range(n + 1):
            if(k == 0):
                dzdWs.append(cls.dzdW(z_column[n],cls.I,W))
            else:
                dzdWs.append(cls.dzdW(z_column[n - k],f,weights[n - k]))
        #\frac{\partial E}{\partial W_{pq}^{k}}
        dEdWs = []
        matrix = []
        row = []
        sum = 0
        temp_1 = []
        temp_2 = dEdz_output
        for k in range(n + 1):
            if(k == 0):
                for p in range(len(W)):
                    for q in range(len(W[0])):
                        for a in range(len(z_column[len(z_column[0])])):
                            sum = sum + dzdWs[k][a][p][q] * dEdz_output[a]
                        row.append(sum)
                        sum = 0
                    matrix.append(row)
                    row = []
                dEdWs.append(matrix)
                matrix = []
            else:
                temp_1 = temp_2
                temp_2 = []
                for b in range(len(z_column[n - k])):
                    for a in range(len(z_column[n + 1 - k])):
                        sum = sum + dzdzs[k][a][b] * temp_1[a]
                    temp_2.append(sum)
                    sum = 0
                for p in range(len(weights[n - k])):
                    for q in range(len(weights[n - k][0])):
                        for a in range(len(z_column[n - k])):
                            sum = sum + dzdWs[k][a][p][q] * temp_2[a]
                        row.append(sum)
                        sum = 0
                    matrix.append(row)
                    row = []
                dEdWs.append(matrix)
                matrix = []
        #重み更新
        param = 0.001
        weights_layer.append(W)
        for k in range(n + 1):
            for p in range(len(weights_layer[k])):
                for q in range(len(weights_layer[k][0])):
                    weights_layer[n - k][p][q] = weights_layer[n - k][p][q] - param * dEdWs[k][p][q]
        write_weights = {'weights':weights_layer}
        with open('./temporarily_saved/preservation.json','w') as f:
            json.dump(write_weights,f,indent=4)
        print('重みの更新が完了しました．')
                </code>
            </pre>
        </div>
    </div>
@endsection

@section('script')
    