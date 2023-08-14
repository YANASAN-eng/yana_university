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
                f=u+iv,$f|_{z_{0}} = u_{0} + i v_{0}$,z=x+iy,$z_{0}=x_{0}+iy_{0}$とおきます．
            </p>
            <p>
                \begin{align*}
                    \left\{
                        \begin{array}{l}
                            \frac{\partial f}{\partial z} =
                            \frac{1}{2}\{
                                    (\frac{\partial u}{\partial x} + \frac{\partial v}{\partial y})
                                    + i(-\frac{\partial u}{\partial y} + \frac{\partial v}{\partial x})
                                \}\\
                            \frac{\partial f}{\partial \bar{z}} = 
                            \frac{1}{2}\{
                                (\frac{\partial u}{\partial x} - \frac{\partial v}{\partial y})
                                    + i(\frac{\partial u}{\partial y} + \frac{\partial v}{\partial x})
                                \}
                        \end{array}
                    \right.
                \end{align*}
            </p>
            <p>
            \begin{align*}
                &(\frac{\partial f}{\partial z})_{z_0}(z - z_{0})
                + (\frac{\partial f}{\partial \bar{z}})_{z_{0}}(\bar{z} - \bar{z_{0}})
                + o(|z - z_{0}|)\\
                &= \frac{1}{2}\{
                        (\frac{\partial u}{\partial x} + \frac{\partial v}{\partial y})
                        + i (-\frac{\partial u}{\partial y} + \frac{\partial v}{\partial x})
                    \}\{(x - x_{0}) + i (y - y_{0})\}\\
                &+ 
                \frac{1}{2}\{
                        (\frac{\partial u}{\partial x} - \frac{\partial v}{\partial y})
                        + i (\frac{\partial u}{\partial y} + \frac{\partial v}{\partial x})
                    \}\{(x - x_{0}) - i (y - y_{0})\}\\
                &=
                (\frac{\partial u}{\partial x} + i\frac{\partial v}{\partial x})(x - x_{0})
                +(\frac{\partial u}{\partial y} + i \frac{\partial v}{\partial y})(y - y_{0})\\
                &=
                \frac{\partial f}{\partial x}(z - z_{0}) + \frac{\partial f}{\partial y}(y - y_{0})
            \end{align*}
            </p>
            <p>
                またu,vは$C^{1}$級なので，次式が成り立つ．
                \begin{align*}
                    \left\{
                        \begin{array}{l}
                            u = u_{0} + \frac{\partial u}{\partial x}(x - x_{0}) + \frac{\partial u}{\partial y}(y - y_{0}) + o(|z - z_{0}|)\\
                            v = v_{0} + \frac{\partial v}{\partial x}(x - x_{0}) + \frac{\partial v}{\partial y}(y - y_{0}) + o(|z - z_{0}|)
                        \end{array}
                    \right.
                \end{align*}
            </p>
            <p>
                これから，次式を得る．
                \begin{align*}
                    u + iv &= (u_{0} + i v_{0}) + (\frac{\partial u}{\partial x} + i\frac{\partial v}{\partial x})(x - x_{0})
                    +(\frac{\partial u}{\partial y} + i \frac{\partial v}{\partial y})(y - y_{0}) + o(|z - z_{0}|)\\
                    &=
                    f(z_{0}) + \frac{\partial f}{\partial x}(x - x_{0})
                    +\frac{\partial f}{\partial y}(y - y_{0}) + o(|z - z_{0}|)\\
                    &=
                    f(z_{0}) + (\frac{\partial f}{\partial z})_{z_0}(z - z_{0})
                    + (\frac{\partial f}{\partial \bar{z}})_{z_{0}}(\bar{z} - \bar{z_{0}})
                    + o(|z - z_{0}|)
                    \end{align*}
            </p>
            <p>
                よって証明完了．
            </p>
            <p>Q.E.D.</p>
            <p>問一</p>
            <p>
                $w = f(z),z = \phi(t)$を$C^{1}$級関数とし，合成関数
                $w = \f(\phi(t))$を考える.この時，次式が成り立つ．
                \begin{align*}
                    \frac{dw}{dt} =\frac{\partial w}{\partial z}\frac{dz}{dt}
                                    +\frac{\partial w}{\partial \bar{z}}\frac{d \bar{z}}{dt}
                \end{align*}
            </p>
            <p>証明</p>
            <p>
                $z = \phi(t)$は$C^{1}$級なので，次式が成り立つ．
                \begin{align*}
                    \phi(t + \Delta t) = \phi(t)+ \frac{d\phi(t)}{dt}\Delta t + o(|\Delta t|)
                \end{align*}
            </p>
            <p>
                補題2より，次式を得る．
                \begin{align*}
                    w(\phi(t + \Delta t)) &= 
                    w(\phi(t)+ \frac{d\phi(t)}{dt}\Delta t + o(|\Delta t|))\\
                    &=
                    w(z + \frac{dz}{dt}\Delta t + o(|\Delta t|))\\
                    &=
                    w(z) + \frac{\partial w}{\partial z}\frac{dz}{dt}\Delta t 
                    + \frac{\partial w}{\partial \bar{z}}\frac{d \bar{z}}{dt}\Delta t + o(\Delta t|) 
                \end{align*}
            </p>
            <p>
                ゆえに，次式が得られるので証明が完了した．
                \begin{align*}
                    \lim_{\Delta t \rightarrow 0}\frac{w(\phi(t + \Delta t)) - w(\phi(t))}{\Delta t} = 
                    \frac{\partial w}{\partial z}\frac{dz}{dt} + \frac{\partial w}{\partial \bar{z}}\frac{d \bar{z}}{dt}
                \end{align*}
            </p>
            <p>Q.E.D.</p>
        </div>
        <div class="section">
            <h3>複素微分可能とコーシー・リーマンの方程式</h3>
            <p>
                以下，f(z)は定義域$\mathscr{D}$で定義された複素関数とします．
            </p>
            <p>
                定義2.複素微分可能
            </p>
            <p>
                f(z)が$z_{0} \in \mathscr{D}$で複素微分可能であるとは，
                $z_{0}$の近傍Uと，Uでで意義され$z_{0}$で連続な関数
                $\delta_{f}(z)$があり，次式が成立する事を言います．
                \begin{align*}
                    f(z) = f(z_{0}) + \delta_{f}(z - z_{0})
                \end{align*}
            </p>
            <p>
                ちなみに，$\delta_{f}(z_{0})$の事をf(z)の$z_{0}$で微分係数
                といい，$f^{'}(z_{0})$や$(\frac{df}{dz})_{z_{0}}$などと書きます．
            </p>
            <p>問1</p>
            <p>
                f(z)が$z_{0}$で複素微分可能$\Leftrightarrow$定数$\alpha$が存在し，
                $z \rightarrow z_{0}$のとき，$f(z) = f(z_{0}) + \alpha (z - z_{0})
                + o(|z - z_{0}|)$
            </p>
            <p>証明．</p>
            <p>[$\Rightarrow$]</p>
            <p>
                f(z)が$z_{0}$で複素微分可能とすると定義より，次式が成り立つ．
                \begin{align*}
                    f(z) &= f(z_{0}) + \delta_{f}(z - z_{0})\\
                        &= f(z_{0}) + \alpha(z - z_{0}) + (\delta_{f} - \alpha)(z - z_{0})
                \end{align*}
            </p>
            <p>
                ここで，$\alpha = \lim_{z \rightarrow z_{0}}\delta_{f}(z)$
                と置くと，任意の正数$\epsilon > 0$に対して，
                ある正数$\delta$が存在し，$|z - z_{0}|< \epsilon$が成り立つ
                任意の$z \in \mathscr{D}$に対し，$|\delta_{f}(z) - \alpha| < \epsilon$
                が成り立つので，結局次式を得るので十分性は証明できた．
                \begin{align*}
                    f(z) = \alpha (z - z_{0}) + o(|z - z_{0}|)
                \end{align*}
            </p>
            <p>[$\Leftarrow$]</p>
            <p>
               逆に定数$\alpha$が存在して，次式が成立したとする．
               \begin{align*} 
                    f(z) = \alpha (z - z_{0}) + o(|z - z_{0}|)
               \end{align*}
            </p>
            <p>
                この場合は，任意の正数$\epsilon > 0$に対して$z_{0}$の近傍$U - \{z_{0}\}$で
                $|h(z)| \leq \epsilon |z - z_{0}|$を満たす複素関数h(z)が存在して，
                次の様にかける．なので必要性も証明された．
                \begin{align*}
                    f(z) &= \alpha (z - z_{0}) + h(z)\\
                    &= (\alpha + \frac{h(z)}{z - z_{0}})(z - z_{0})
                \end{align*}
            </p>
            <p>Q.E.D.</p>
            <p>補題3</p>
            <p>
                \begin{align*}
                    &(i)f(z),g(z)がz_{0}で複素微分可能なら，\alpha f(z)(\alpha は定数)，
                    f(z) + g(z),f(z)g(z)も複素微分可能で次の式が成り立つ．\\
                    & \quad (\alpha f(z))^{'}_{z_{0}} = \alpha f^{'}(z_{0})\\
                    & \quad (f(z) + g(z))^{'}_{z_{0}} = f^{'}(z_{0}) + g^{'}(z_{0})\\
                    & \quad (f(z)g(z))^{'}_{z_{0}} = f^{'}(z_{0})g(z_{0}) + f(z_{0})g^{'}(z_{0})\\
                    & \quad さらに，g(z_{0})　\not= 0ならば，\frac{f(z)}{g(z)}も複素微分可能で
                    次式が成り立つ．\\
                    & \quad (\frac{f(z)}{g(z)})^{'} = \frac{f^{'}(z_{0})g(z_{0}) - f(z_{0})g^{'}(z_{0})}{g(z_{0})^{2}}
                    &(ii)
                    f(z)がz_{0}で，g(w)がf(z_{0})で，g(w)がf(z_{0})で複素微分可能なら，
                    g(f(z_{0}))はz_{0}で複素微分可能で次式が成り立つ．\\
                    & \quad 
                    (g(f(z)))^{'}_{z_{0}} = g^{'}(f(z_{0}))f^{'}(z_{0})
                \end{align*}
            </p>
            <p>証明</p>
            <p>[(i)]</p>
            <p>
                仮定より，次式が成り立つ．
                \begin{align*}
                    &f(z) = f(z_{0}) + \delta_{f}(z)(z - z_{0})\\
                    &g(z) = g(z_{0}) + \delta_{g}(z)(z - z_{0})
                \end{align*}
            </p>
            <p>
                この事から，次式が成り立つ．
                \begin{align*}
                    &\alpha f(z) = \alpha f(z_{0}) + \alpha \delta_{f}(z)(z - z_{0})\\
                    &f(z) + g(z) = f(z_{0}) + g(z_{0}) + \{\delta_{f}(z) + \delta_{g}\}(z - z_{0})\\
                    &f(z)g(z) = f(z_{0})g(z_{0}) + \{f(z)\delta_{g}(z) + \delta_{f}(z)g(z)\}(z - z_{0}) + o(|z - z_{0}|)\\
                    &\frac{1}{g(z)} = \frac{1}{g(z_{0}) + \delta_{g}(z)(z - z_{0})}\\
                    &=\frac{1}{g(z_{0})}\frac{1}{1 + \frac{\delta_{g}(z)}{g(z_{0})}}\\
                    &=\frac{1}{g(z_{0})} - \frac{\delta_{g}(z)}{g(z_{0})^{2}}
                \end{align*}
            </p>
            <p>[(ii)]</p>
            <p>
                \begin{align*}
                    g(f(z)) &= g(f(z_{0}) + \delta_{f}(z)(z - z_{0}))\\
                    &= g(f(z_{0})) + \delta_{g}(f(z_{0} + \delta_{f}(z)(z - z_{0})))\delta_{f}(z)(z - z_{0}) + o(|z - z_{0}|)
                \end{align*}
            </p>
            <p>Q.E.D.</p>
            <p>定理1</p>
            <p>
                f(z)が$z_{0}$の近傍で$C^{1}$級ならば，f(z)が$z_{0}$で複素微分可能
                $\Leftrightarrow (\frac{\partial f}{\partial \bar{z}})_{z_{0}} = 0$
            </p>
            <p>証明</p>
            <p>
                次の様に$\delta_{f}(z)$を定める．
                \begin{align*}
                    \delta_f(z) &= f(z) - f(z_{0})\\
                    &= (\frac{\partial f}{\partial z})_{z_{0}} + (\frac{\partial f}{\partial \bar{z}})_{z_{0}}\frac{\bar{z} - \bar{z_{0}}}{z - z_{0}}
                    + \frac{o(|z - z_{0})}{z - z_{0}}
                \end{align*}
            </p>
            <p>[$\Leftarrow$]</p>
            <p>
                $\frac{\partial f}{\partial \bar{z}} = 0$であるとする．
                すると次の事を得る．
                \begin{align*}
                    \lim_{z \rightarrow z_{0}}\delta_{f}(z) = (\frac{\partial f}{\partial z})_{z_{0}}
                \end{align*}
            </p>
            <p>[$\Rightarrow$]</p>
            <p>
                対偶を示す．
                $(\frac{\partial f}{\partial \bar{z}})_{z_{0}} \not= 0$であるとする．すると次の事が分かる．
                $z_{n} = z_{0} + \frac{1}{n}$および，$z_{n}^{'} = z_{0} + \frac{i}{n}$
                の様に定める．すると次の事が成り立つ．
                \begin{align*}
                    \left\{
                        \begin{array}{l}
                            \lim_{n \rightarrow \infty}\delta_{f}(z_{n}) = (\frac{\partial f}{\partial z})_{z_{0}} 
                            + (\frac{\partial f}{\partial \bar{z}})_{z_{0}}\\
                            \lim_{n \rightarrow \infty}\delta_{f}(z_{n}^{'}) = (\frac{\partial f}{\partial z})_{z_{0}} 
                            - (\frac{\partial f}{\partial \bar{z}})_{z_{0}}\\
                        \end{array}
                    \right.
                \end{align*}
            </p>
            <p>
                よって，$(\frac{\partial f}{\partial \bar{z}})_{z_{0}} \not= 0$
                が成り立つならば，微分不可能であることが示された．
            </p>
            <p>Q.E.D.</p>
            <p>問2</p>
            <p>
                f(z)が複素微分可能なとき，$\frac{df}{dz} = \frac{\partial f}{\partial z}$
                が分かったが，さらに次の式が成り立つ．
                \begin{align*}
                    \frac{df}{dz} = \frac{\partial f}{\partial x} = -i\frac{\partial f}{\partial y}
                \end{align*}
            </p>
            <p>証明</p>
            <p>
                \begin{align*}
                    \frac{df}{dz} &= \frac{1}{2}(\frac{\partial f}{\partial x} - i\frac{\partial f}{\partial y})\\
                    &=
                    \frac{1}{2}\{
                            (\frac{\partial u}{\partial x} + \frac{\partial v}{\partial y})
                            + i (-\frac{\partial u}{\partial y} + \frac{\partial v}{\partial x})
                        \}
                \end{align*}
            </p>
            <p>
                また，fは複素微分可能なので$\frac{\partial f}{\partial \bar{z}} = 0$．
                ゆえに，次の式が成り立つ．
                \begin{align*}
                    \left\{
                        \begin{array}{l}
                            &\frac{\partial u}{\partial x} = \frac{\partial v}{\partial y}\\
                            &\frac{\partial u}{\partial y} = -\frac{\partial v}{\partial x}
                        \end{array}
                    \right.
                \end{align*}
            </p>
            <p>
                ゆえに，この事を用いる．すると次の事が得られる．
                \begin{align*}
                    \frac{df}{dz} = \frac{\partial f}{\partial x} = -i\frac{\partial f}{\partial y}
                \end{align*}
            </p>
            <p>Q.E.D.</p>
            <p>
                系1.$|f^{'}(z_{0})|^{2}$は写像$(x,y) \mapsto (u,v)$の
                ヤコビ行列式に等しい．
                \begin{align*}
                    \begin{vmatrix}
                        \frac{\partial u}{\partial x} & \frac{\partial u}{\partial y}\\
                        \frac{\partial v}{\partial x} & \frac{\partial v}{\partial y}\\
                    \end{vmatrix}
                \end{align*}
            </p>
            <p>証明</p>
            <p>
                \begin{align*}
                    |\frac{df}{dz}|^{2} &= (\frac{\partial u}{\partial x})^{2} + (\frac{\partial v}{\partial x})^{2}\\
                        &= \frac{\partial u}{\partial x}\frac{\partial v}{\partial y} - \frac{\partial u}{\partial y}\frac{\partial v}{\partial x}
                \end{align*}
            </p>
            <p>Q.E.D.</p>
            <p>問3</p>
            <p>
                f(z)が領域$\mathscr{D}$で$C^{1}$級で複素微分可能
                とし，f(z)の値は常に実数とすると，f(z)は定数関数．
            </p>
            <p>証明</p>
            <p>
                f(z)が実関数なので，$\frac{\partial v}{\partial x} = \frac{\partial v}{\partial y} = 0$
                またf(z)が複素微分可能なので，次の事が成り立つ．
                \begin{align*}
                    \left\{
                        \begin{array}{l}
                            \frac{\partial u}{\partial x} = 0\\
                            \frac{\partial u}{\partial y} = 0
                        \end{array}
                    \right.
                \end{align*}
            </p>
            <p>
                よって$\frac{\partial u}{\partial x} = 0$よりあるyを変数とする
                関数u(x,y) = h(y)が成り立つ．
                また，$\frac{\partial u}{\partial y} = 0$より次の事が分かるので証明が完了する．
                h(y) = A = const.
            </p>
            <p>Q.E.D.</p>
            <p>定義3.複素微分可能</p>
            <p>
                f(z)が開集合$\mathscr{D}$において，$C^{1}$級であり，各点で複素微分可能であるとき，
                f(z)は$\mathscr{D}$で正則と言います．
            </p>
            <p>正則関数の例1</p>
            <p>
                $z^{n}(n = 0,\pm 1,\pm 2,\pm 3,...)$は全平面(n < 0の時は，
                原点を除く)で正則で$(z^{n})^{'} = n z^{n - 1}$
            </p>
            <p>証明</p>
            <p>n=0の場合は明らか．</p>
            <p>n=1の場合は次の事から明らか</p>
            <p>
                \begin{align*}
                    \left\{
                        \begin{array}{l}
                            \frac{\partial u}{\partial x} = \frac{\partial v}{\partial y} = 1\\
                            \frac{\partial u}{\partial y} = -\frac{\partial v}{\partial x} = 0
                        \end{array}
                    \right.
                \end{align*}
            </p>
            <p>
                次に0,1,2,...,nまで成り立つと仮定する．すると$z^{n + 1}$の場合は
                $z^{n + 1} = z \cdot z^{n}$とz,$z^{n}$が正則なので$z^{n + 1}$
                も正則．
            </p>
            <p>
                また，$\frac{1}{z} = \frac{x - iy}{x^{2} + y^{2}}$
                より，
                \begin{align*}
                    \frac{\partial u}{\partial x} &= \frac{1}{x^{2}+y^{2}} - 2\frac{x^{2}}{(x^{2}+y^{2})^{2}}\\
                    &= \frac{-x^{2} + y^{2}}{(x^{2} + y^{2})^{2}}\\
                \end{align*}
            </p>
            <p>
                \begin{align*}
                    \frac{\partial v}{\partial y}
                    &=
                    -\frac{1}{x^{2} + y^{2}} +2\frac{y^{2}}{(x^{2} + y^{2})^{2}}\\
                    &=
                    \frac{-x^{2} + y^{2}}{(x^{2} + y^{2})^{2}}\\
                    &=
                    \frac{\partial u}{\partial x}
                \end{align*}
            </p>
            <p>
                \begin{align*}
                    \frac{\partial u}{\partial y} 
                    &=
                    -2\frac{xy}{(x^{2} + y^{2})}\\
                \end{align*}
            </p>
            <p>
                \begin{align}
                    -\frac{\partial v}{\partial x}
                    &= -2\frac{xy}{(x^{2} + y^{2})}
                \end{align}
            </p>
            <p>
                より，$\frac{1}{z}$は原点を除いて，コーシー・リーマン方程式を
                満たす．ゆえに$\frac{1}{z}$は正則関数．
            </p>
            <p>
                次に-1,-2,-3,...,-nまで正しいとすると，$z^{-1},z^{-n}$が正則
                なので，$z^{-(n + 1)} = z^{-1}\cdot  z^{-n}$は正則．
            </p>
            <p>Q.E.D.</p>
        
        </div>
        <div class="section">
            <h3>コーシーの積分公式</h3>
            この節では，f(z)は開集合$\tilde{\mathscr{D}}(\subset C)$で$C^{1}$
            級とし，$\mathscr{D}$は$\bar{\mathscr{D}} \subset \tilde{\mathscr{D}}$
            となる有界領域で境界$\partial D$は有限個の正則ジョルダン閉曲線の和であると
            します．
            この時，次式が成り立つ．
            \begin{align*}
                \int_{\partial \mathscr{D}}f(z)dz 
                = 2i \int\int_{\mathscr{D}}\frac{\partial f}{\partial \bar{z}}dxdy
            \end{align*}
            <p>補題4.グリーンの定理</p>
            <p>$P(x,y),Q(x,y)$を領域$\mathscr{D} \subset \mathbb{R}^{2}$で
                2変数の$C^{1}$級の関数であるとする．
                すると次式が成り立つ．
                \begin{align*}
                    \int\int_{\mathscr{D}}(\frac{\partial Q(x,y)}{\partial x}
                     - \frac{\partial P(x,y)}{\partial y})dxdy 
                    =
                    \int_{\partial \mathscr{D}}(P(x,y(x))dx + Q(x(y),y)dy)
                \end{align*}
            </p>
            <p>証明</p>
            <p>[(i)]$\int\int_{\mathscr{D}}\frac{\partial Q}{\partial x}dxdy
                =\int_{\partial \mathscr{D}}Qdy$</p>
            <p>
                $\partial \mathscr{D}$に接するx軸に平行な2直線$l_{1},l_{2}$で
                $C_{1} \cap C_{2} = \partial \mathscr{D}$の様に分割する．ただし，
                y成分が同一で$x$成分が小さい方を$C_{1}$大きい方を$C_{2}$とする．
                また，$l_{1}$とy軸の交点のy成分をc,$l_{2}$とy軸との交点のy成分を
                dとする．そして，y成分の大きさが$y \in [c,d]$を満たすx軸に平行な
                直線lを描き，$C_{1},C_{2}$との交点の座標を$(x_1(y),y),(x_2(y),y)$とする．
                すると，次の様に計算できる．
                \begin{align*}
                    \int\int_{\mathscr{D}}\frac{\partial Q}{\partial y}dxdy &= 
                    \int_{c}^{d}\{Q(x_{2}(y),y) - Q(x_{1}(y),y)\}dy\\
                    &=\int_{\partial \mathscr{D}}Q(x(y),y)dy
                \end{align*}
            </p>
            <p>
                [(ii)]$\int\int_{\mathscr{D}}\frac{\partial P}{\partial y}dxdy
                =-\int_{\partial \mathscr{D}}Pdx$
            </p>
            <p>
                $\partial \mathscr{D}$に接するy軸に平行な2直線$l_{1},l_{2}$で
                $C_{1} \cap C_{2} = \partial \mathscr{D}$の様に分割する．ただし，
                x成分が同一で$y$成分が小さい方を$C_{1}$大きい方を$C_{2}$とする．
                また，$l_{1}$とx軸の交点のx成分をa,$l_{2}$とx軸との交点のx成分を
                bとする．そして，x成分の大きさが$x \in [a,b]$を満たすy軸に平行な
                直線lを描き，$C_{1},C_{2}$との交点の座標を$(x,y_{1}(x)),(x,y_{2}(x))$とする．
                すると，次の様に計算できる．
                \begin{align*}
                    \int\int_{\mathscr{D}}\frac{\partial P}{\partial x}dxdy &= 
                    \int_{c}^{d}\{P(x,y_{2}(x)) - P(x,y_{1}(x))\}dx\\
                    &=-\int_{\partial \mathscr{D}}P(x,y(x))dy
                \end{align*}
            </p>
            <p>Q.E.D.</p>
            <p>
                $\int_{\partial \mathscr{D}}f(z)dz = 2i\int\int_{\mathscr{D}}\frac{\partial f}{\partial \bar{z}}dxdy$
                の証明
            </p>
            <p>
                $f = u + iv,z = x + iy,dz = dx + idy$とおく．すると次のように計算できるので
                証明完了．
                \begin{align*}
                    \int_{\partial \mathscr{D}}fdz &=
                    \int_{\partial \mathscr{D}}(u + iv)(dx + idy)\\
                    &= 
                    \int{\partial \mathscr{D}}\{
                            (u+iv)dx+i(u+iv)dy
                        \}\\
                    &=
                    \int\int_{\mathscr{D}}\{i\frac{\partial (u + iv)}{\partial x}
                    -\frac{\partial (u + iv)}{\partial y}\}dxdy\\
                    &= 
                    2i\int\int_{\mathscr{D}}\frac{1}{2}\{
                            (\frac{\partial (u + iv)}{\partial x} + i\frac{\partial (u + iv)}{\partial y})
                        \}dxdy\\
                    &=
                    2i \int\int_{\mathscr{D}} \frac{\partial f}{\partial \bar{z}}
                \end{align*}
            </p>
            <p>
                Q.E.D.
            </p>
            
        </div>
    </div>
    
@endsection