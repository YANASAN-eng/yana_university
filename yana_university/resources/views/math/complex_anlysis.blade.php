@extends('layouts.lesson_template')

@section('title','複素解析学')

@section('sentences')
    <h1>複素解析学</h1>
    <div class="chapter">
        <h2>正則関数とは何か？</h2>
        <div class="section">
            <h3>準備</h3>
            <p>
                早速ですが，「正則関数とは何か？」その結論を書きましょう．
                それは，下記の5つの同値な条件のうち一つを満たす複素関数
                の事を言います．
            </p>
            <p>
                \begin{align*}
                    &1.コーシー・リーマンの方程式\\
                    &2.コーシーの積分定理\\
                    &3.コーシーの積分公式\\
                    &4.原始関数の局所的存在\\
                    &5.整級数展開可能性
                \end{align*}
            </p>
            <p>
                ただ,さすがに，これだけでは意味が
                分からないと思うのでもう少し詳しく記述していきます．
            </p>
            <p>
                まず，(x,y)平面の領域$\mathscr{D}$から(u,v)平面への写像
                $f:(x,y) \mapsto (u,y)$を考えます．
                ただし，u,vは関数u=u(x,y),v=v(x,y)です．
            </p>
            <p>
                今座標をz=x+iy,w=u+ivと複素数で表すと，fは複素数zに複素数w
                を対応させる複素変数の複素数値関数w=f(z)と考える事ができます．
                すなわち，
                f(z)の実部Ref(z)がu(x,y),虚部Imf(z)がv(x,y)と考える事ができます．
                もっと具体的に書きますと次の様にかけます．
                \begin{equation}
                    f(z) = u(x,y) + i v(x,y), \quad z = x + iy
                \end{equation}
            </p>
            <p>
                一応例も見ておきましょう．
                $f(z) = z^{2}$とすると次のようです．$Ref(z) = u(x,y) = x^{2} - y^{2}$,
                $Imf(z) = v(x,y) = 2xy$．
            </p>
            <p>
                ちなみに，少し話が脱線しますが，u(x,y),v(x,y)がともに$C^{k}$級$(k=0,1,2,3,...,\infty)$
                ならば，f(z)は$C^{k}$であると言います．
            </p>
            <p>
                次に，偏微分に関する記号を拡張して次のように記号を定めます．
                \begin{align*}
                    \left \{
                        \begin{array}{l}
                            &\frac{\partial f}{\partial x} = \frac{\partial u}{\partial x} +i \frac{\partial v}{\partial x}\\
                            &\frac{\partial f}{\partial y} = \frac{\partial u}{\partial y} +i \frac{\partial v}{\partial y}
                        \end{array}
                    \right.
                \end{align*}
            </p>
            <p>
                また，$z = x + iy,\bar{z} = x - iy$から，
                $x = \frac{z + \bar{z}}{2},y = \frac{z - \bar{z}}{2i}$
                を得る．よって，$z,\bar{z}$を形式的に独立変数とみて微分の合成則を用いると，
                次の式を得る．
                \begin{align*}
                    \frac{\partial f}{\partial z} &= 
                    \lim_{\Delta z \rightarrow 0}
                    \frac{f(x(z + \Delta z,\bar{z}),y(z + \Delta z,\bar{z}))
                    - f(x(z,\bar{z}),y(z,\bar{z}))}{\Delta z} \\
                    &= 
                    \lim_{\Delta z \rightarrow 0}
                    [
                        \frac{x(z + \Delta z,\bar{z}) - x(z,\bar{z})}{\Delta z}
                        \frac{f(x(z + \Delta z,\bar{z}),y(z + \Delta z,\bar{z}))
                        - f(x(z ,\bar{z}),y(z + \Delta z,\bar{z}))}
                        {x(z + \Delta z,\bar{z}) - x(z,\bar{z})}\\
                        &
                        +
                        \frac{y(z + \Delta z,\bar{z}) - y(z,\bar{z})}{\Delta z}
                        \frac{f(x(z,\bar{z}),y(z + \Delta z,\bar{z})) - f(x(z,\bar{z}),y(z,\bar{z}))}{y(z + \delta z,\bar{z}) - y(z,\bar{z})}
                    ]

                \end{align*}
            </p>
        </div>
    </div>
@endsection