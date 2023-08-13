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
                        \frac{f(x(z,\bar{z}),y(z + \Delta z,\bar{z})) - f(x(z,\bar{z}),y(z,\bar{z}))}{y(z + \Delta z,\bar{z}) - y(z,\bar{z})}
                    ]\\
                    &=
                    \frac{\partial x}{\partial z}\frac{\partial f}{\partial x} + \frac{\partial y}{\partial z}\frac{\partial f}{\partial y}\\
                    &=
                    \frac{1}{2}(\frac{\partial f}{\partial x} -i \frac{\partial f}{\partial y})
                \end{align*}
                同様の計算をすることで次の式を得る．
                \begin{align*}
                    \frac{1}{2}(\frac{\partial f}{\partial x} + i \frac{\partial f}{\partial y})
                \end{align*}
            </p>
            <p>
                上記の式を微分作用素といいます．
            </p>
            <p>補題1</p>
            <p>
                f(z) = u(x,y) + iv(x,y),g(z)は$C^{1}$級（ただし，(iv)，(v)では
                $C^{2}$級）関数，a,bは定数とする．
                すると下記の事が成り立ちます．
                \begin{align*}
                    (i)&\frac{\partial}{\partial x}(af + bg) =
                    a\frac{\partial f}{\partial x} 
                    + b\frac{\partial g}{\partial x}\\
                    &\frac{\partial}{\partial x}(fg) = f\frac{\partial g}{\partial x} + \frac{\partial f}{\partial x}g\\
                    &(\frac{\partial}{\partial y},\frac{\partial}{\partial z},\frac{\partial}{\partial \bar{z}}でも同様)\\
                    (ii)
                    &\bar{(\frac{\partial f}{\partial z})}
                    =
                    \frac{\partial \bar{f}}{\partial \bar{z}}\\
                    &\bar{(\frac{\partial f}{\partial \bar{z}})}
                    =\frac{\partial \bar{f}}{\partial z}\\
                    (iii)
                    &\frac{\partial f}{\partial \bar{z}} = 0 \Leftrightarrow
                    \frac{\partial u}{\partial x} = \frac{\partial v}{\partial y},
                    \frac{\partial u}{\partial y} = -\frac{\partial v}{\partial x}\\
                    (iv)
                    &4\frac{\partial u}{\partial z \partial \bar{z}} = \Delta u\\
                    &(この方程式をコーシー・リーマンの方程式といいます．)\\
                    (v)
                    &\frac{\partial f}{\partial \bar{z}} = 0 \Rightarrow \Delta u = 0,\Delta v = 0
                \end{align*}
            </p>
            <p>証明</p>
            <p>[(i)]</p>
            <p>
                \begin{align*}
                    \frac{\partial}{\partial x}(af + bg) &=
                    \lim_{\Delta x \rightarrow 0}
                    \frac{1}{\Delta x}[
                        a\{
                            f(x + \Delta x,y) - f(x,y)
                            \}
                        +b\{
                            g(x + \Delta x,y) - g(x,y)
                            \}
                        ]\\
                    &=
                    a \lim_{\Delta x \rightarrow 0}\{
                            f(x + \Delta x,y) - f(x,y)
                        \}
                    +b \lim_{\Delta x \rightarrow 0}\{
                            g(x + \Delta x,y) - g(x,y)
                        \}\\
                    &=
                    a\frac{\partial f}{\partial x} + b\frac{\partial g}{\partial x}\\   
                \end{align*} 
            </p>
            <p>
                \begin{align*}
                    \frac{\partial}{\partial x}(fg) &= 
                    \lim_{\Delta x \rightarrow 0}
                    \frac{1}{\Delta x}[
                        \{
                            f(x + \Delta x,y) -f(x,y)
                        \}g(x + \Delta x,y)
                        +
                        f(x)\{
                            g(x + \Delta x,y) -g(x,y)
                        \}
                    ]\\
                    &=
                    \frac{\partial f}{\partial x}g + f \frac{\partial g}{\partial x}

                \end{align*}
            </p>
            <p>(ii)</p>
            <p>
                \begin{align*}
                    \bar{(\frac{\partial f}{\partial z})} &=
                    \frac{1}{2}
                    \{
                        (
                            \frac{\partial u}{\partial x} + \frac{\partial v}{\partial y}
                        )
                        -i (
                                -\frac{\partial u}{\partial y} + \frac{\partial v}{\partial x}
                            ) 
                    \}\\
                    
                    &= \frac{\partial \bar{f}}{\partial \bar{z}}
                \end{align*}
            </p>
            <p>同様にに計算して，次の式を得る．
                \begin{align*}
                \bar{(\frac{\partial f}{\partial \bar{z}})} &=
                    \frac{1}{2}
                    \{
                        (
                            \frac{\partial u}{\partial x} - \frac{\partial v}{\partial y}
                        )
                        -i (
                                \frac{\partial u}{\partial y} + \frac{\partial v}{\partial x}
                        ) 
                    \}\\
                    
                    &= \frac{\partial \bar{f}}{\partial z}
                \end{align*}
            </p>
            <p>[(iii)]</p>
            <p>以下の式より，実部と虚部を比較すれば明らか．
                \begin{align*}
                    \frac{\partial f}{\partial \bar{z}} 
                    &=
                    \frac{1}{2}\{
                            (\frac{\partial u}{\partial x} - \frac{\partial v}{\partial y})
                            +i (\frac{\partial u}{\partial y} + \frac{\partial v}{\partial x})
                        \}\\
                    &= 0
                \end{align*}
                
            </p>
            <p>[(iv)]</p>
            <p>
                \begin{align*}
                    4\frac{\partial u}{\partial z \partial \bar{z}}
                    &=
                    \frac{\partial}{\partial x}(\frac{\partial u}{\partial x} + i \frac{\partial u}{\partial y})
                    - i \frac{\partial}{\partial y}(\frac{\partial u}{\partial x} + i \frac{\partial u}{\partial y})\\
                    &=
                    (\frac{\partial^{2}}{\partial x^2} + \frac{\partial^{2}}{\partial y^{2}})u\\
                    &=
                    \Delta u
                \end{align*}
            </p>
            <p>
                [(v)]
            </p>
            <p>(iii)より明らか．</p>
            <p>Q.E.D.</p>
            <p>
                証明お疲れ様です．次に，複素関数の連続の定義を軽く述べます．
            </p>
            <p>
                定義1.$\lim_{z \rightarrow z_{0}}f(z) = f(z_{0})$が成り立つとき，
                f(z)は$z_{0} \in \mathscr{D}$で連続といいます．
                また，$\mathscr{D}$の各点で連続な時$\mathscr{D}$で連続といいます．
            </p>
            <p>
                ちなみに一応$lim$の意味について書いておきますと，次の様です．
                $z_{0}$に収束し，各点$z_{n}$が$z_{0}$に等しくないような，任意の複素数列
                $\{z_{n}\}_{n \in \mathbb{N}}$に対して，複素数列$\{f(z_{n})\}_{n \in \mathbb{N}}$_
                が常に一定の値$\alpha$に収束するとき，次の様に書きます．
                $lim_{z\rightarrow z_{0}}f(z) = \alpha$
                これが記号$lim$の意味です．
            </p>
            <p>
                次に今後の講義するにあたり便利なので，
                ランダウ記号を導入いたします．
            </p>
            <p>
                ランダウ記号とは，関数f(z),g(z),h(z)が$\alpha$
                の近傍で与えられているとき次の様に定義されたものです．
            </p>
            <p>
                \begin{align*}
                    (i)&z \rightarrow \alpha のとき，f(z) = g(z) + O(h(z))\\
                        &\Leftrightarrow 
                        \alpha の近傍Uと定数K(>0)が存在して\\
                        &任意のz \in U - \{\alpha \}
                        に対して，|f(z) - g(z)| \leq K |h(z)| が成り立つ．\\

                    (ii)&z \rightarrow \alpha のとき，f(z) = g(z) + o(h(z))\\
                        &\Leftrightarrow
                        任意の正数\epsilon > 0に対して，
                        適当な\alpha の近傍Uが取れ，任意の
                        z \in U - \{\alpha \}に対し，\\
                        &|f(z) - g(z)| \leq \epsilon |h(z)|
                        が成り立つ．
                \end{align*}
            </p>
            <p>
                次に，正則性について理解を深めるために重要な補題を証明しておきます．
            </p>

            <p>補題2</p>
            <p>
                f(z)が$z_{0}$の近傍で$C^{1}$級ならば，$z \rightarrow z_{0}$
                の時次式が成り立つ．
                \begin{align*}
                    f(z) = f(z_{0}) 
                    + (\frac{\partial f}{\partial z})_{z_0}(z - z_{0})
                    + (\frac{\partial f}{\partial \bar{z}})_{z_{0}}(\bar{z} - \bar{z_{0}})
                    + o(|z - z_{0}|)
                \end{align*}
            </p>
            <p>
                証明.
            </p>
            <p>
                f=u+iv,z=x+iy,$z_{0}=x_{0}+iy_{0}$とおきます．
            </p>
            <p>Q.E.D.</p>
        </div>
    </div>
    
@endsection