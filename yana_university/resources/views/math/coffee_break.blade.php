@extends('layouts.lesson_template')

@section('title','コーヒーブレイク')

@section('sentences')
    <h1>コーヒーブレイク</h1>
    <div class="chapter">
        <h2>無限べき乗の収束と発散</h2>
    </div>
    <div class="chapter">
        <h2>$\int_{0}^{1}(x^{x})^{(x^{x})^{(x^{x})\cdots}}dx$について</h2>
        <p>
            まっ数にて非常に興味深い式が上がっていたのでこれに関して考察してみます．
        </p>
        <p>
            まず初めに次のようにyを定めます．
            \begin{align*}
                y = (x^{x})^{(x^{x})^{(x^{x})\cdots}}
            \end{align*}
        </p>
        <p>
            するとyの決め方から明らかに次の式が成り立ちます．
            \begin{align*}
                y = x^{xy}
            \end{align*}
        </p>
        <p>
            さらに両辺対数を取って，次のような式を得ます．
            \begin{align*}
                &\log{y} = xy \log{x}\\
                &\frac{1}{y} \log{y} = x \log{x}\\
                &e^{-\log{y}} (-\log{y}) = -x \log{x}\\
            \end{align*}
        </p>
        <p>
            次にランベルトの関数wについて考えます．
            \begin{align*}
                &f(x) = x^{x}\\
                &w(x) = f^{-1}(x)\\
            \end{align*}
        </p>
        <p>
            wの決め方から容易に次の事実が分かります．
            \begin{align*}
                &f(w(x)) = w(x) e^{w(x)} = x\\
                &w(f(x)) = w(x e^{x}) = x
            \end{align*}
        </p>
        <p>
            以上の事を踏まえてランベルト関数を用いると次の事が分かります．
            \begin{align*}
                &w(e^{-\log{y}}(-\log{y})) = w(x \log{x})\\
                &\log{y} = -w(-x \log{x})\\
                &y = e^{-w(-x \log{x})}
            \end{align*}
        </p>
        <p>
            右辺は，$w(x)e^{w(x)} = x$を用いることで，さらに変形出来て，次のように
            書けます．
            \begin{align*}
                y = \frac{w(-x\log{x})}{-x\log{x}}
            \end{align*}
        </p>
        <p>
            以上の事から，結局求める積分は次のように書き直せる事が分かります．
            \begin{align*}
                \int_{0}^{1}\frac{w(-x\log{x})}{-x\log{x}}dx
            \end{align*}
        </p>
        <p>
            補題(ラグランジュの反転公式)
            f(x)が原点で解析的で$f(0),f^{'}(0)\not= 0$を満たすとき，次式が成り立つ．
            \begin{align*}
                f^{-1}(x) = \Sigma_{n = 1}^{\infty}\lim_{t \rightarrow 0}(\frac{d}{dt})^{n-1}
                (\frac{t}{f(t)})^{n}\frac{x^{n}}{n!}
            \end{align*}
        </p>
        <p>証明</p>
        <p>
            以下，f(x)をローラン展開した時の$x^{n}$の係数を$[x^{n}]f(x)$で表す．
        </p>
        <p>$f(x) = \Sigma_{n=\infty}^{\infty}a_{n}x^{n}$より，
            $f^{'}(x) = \Sigma_{n = \infty}^{\infty}na_{n} x^{n -1}$が
            成り立つので，$[x^{-1}]f^{'}(x) = 0$を得る．
            また，$\lim_{x \rightarrow 0}\frac{xf^{'}(x)}{f(x)} = 
            \lim_{x \rightarrow 0}\frac{xf^{''} + f^{'}(x)}{f^{'}(x)} = 1$
            より$[x^{-1}]\frac{f^{'}(x)}{f(x)} = 1$を得る．
        </p>
        <p>
            仮定よりf(0) = 0なので，$f^{-1}(0) = 0$ゆえに，$f^{-1}$は次のように
            マクローリン展開できることが分かります．
            \begin{align*}
                f^{-1}(x) = \Sigma_{n = 1}^{\infty}c_{n}x^{n}
            \end{align*}
        </p>
        <p>
            xにf(x)を代入すると次式を得ます．
            \begin{align*}
                &x = \Sigma_{n = 1}^{\infty}c_{n}(f(x))^{n}\\
                &1 = \Sigma_{n = 1}^{\infty}nc_{n}(f(x))^{n-1}f^{'}(x)\\
                &(f(x))^{-k}  = \Sigma_{n = 1}^{\infty}nc_{n}(f(x))^{n-k-1}f^{'}(x)\\
                &(f(x))^{-k}  = kc_{k}\frac{f^{'}(x)}{f(x)} + \Sigma_{n = 1,n\not=k}^{\infty}\frac{n}{n-k}c_{n}((f(x))^{n-k})^{'}\\
            \end{align*}
        </p>
        <p>
            よって最終的に，次の式を得る．
            \begin{align*}
                &[x^{-1}]f(x)^{-k} = kc_{k} = k [x^k]f^{-1}(x)\\
                &[x^{k}]f^{-1}(x) = \frac{1}{k}[x^{-1}](f(x))^{-k}
                =\frac{1}{k}[x^{k-1}](\frac{x}{f(x)})^{-k}\\
                &=\frac{1}{k!}\lim_{t \rightarrow 0}(\frac{d}{dt})^{k-1}(\frac{t}{f(t)})^{-k}
            \end{align*}
        </p>
        <p>Q.E.D.</p>
        <p>
            ラグランジュの反転公式よりランベルト関数のマクローリン展開は次の
            様に書けます．
            \begin{align*}
                w(x) &= \Sigma_{n = 1}^{\infty}\frac{1}{n!}
                \lim_{t \rightarrow 0}(\frac{d}{dt})^{n-1}(\frac{t}{t e^{t}})^{-n}x^{n}\\
                &=
                \Sigma_{n = 1}^{\infty}\frac{1}{n!}(-1)^{n - 1}(n)^{n - 1}x^{n}
            \end{align*}
        </p>
        <p>
            この結果を積分に代入して,次式を得る．
            \begin{align*}
                \int_{0}^{1}\frac{w(-x\log{x})}{-x\log{x}}dx &=
                \Sigma_{n = 1}^{\infty}\frac{(-n)^{n-1}}{n!}\int_{0}^{1}
                    (-x \log{x})^{n-1}dx\\
                &=
                \Sigma_{n = 1}^{\infty}\frac{n^{n-1}}{n!}\int_{0}^{1}
                (x \log{x})^{n - 1}dx\\
                &=
                \Sigma_{n = 1}^{\infty}\frac{n^{n-1}}{n!}(-1)^{n-1}\frac{(n-1)!}{n^n}\\
                &=
                \Sigma_{n = 1}^{\infty}\frac{(-1)^{n-1}}{n^2}\\
                &=
                (1 - \frac{1}{2})\zeta(2)\\
                &= 
                \frac{\pi}{12}
            \end{align*}
        </p>
    </div>
    <div class="chapter">
        <h2>
            $\int_{a}^{b}(f(x)^{g(x)})^{(f(x)^{g(x)})^{(f(x)^{g(x)})\cdots}}dx$
            について
        </h2>
        <p>
            $h(x)=(f(x)^{g(x)})^{(f(x)^{g(x)})^{(f(x)^{g(x)})\cdots}}dx$
            と置く．すると次式が成り立つ．
            \begin{align*}
                h(x) = f(x)^{g(x)h(x)}
            \end{align*}
        </p>
        <p>
            ゆえに，両辺対数をとって次式が成り立つ．
            \begin{align*}
                &\log{h(x)} = g(x)h(x) \log{f(x)}\\
                &e^{-\log{h(x)}}(-\log{h(x)})
                = -g(x) \log{f(x)}
            \end{align*}
        </p>
        <p>
            両辺をランベルト関数wの中に入れて次式を得る．
            \begin{align*}
                &-\log{h(x)} = w(-g(x) \log{f(x)})\\
                &h(x) = e ^ {-w(-g(x) \log{f(x)})}\\
                &h(x) = \frac{w(-g(x) \log{f(x)})}{-g(x) \log{f(x)}}
            \end{align*}
        </p>
        <p>
            次に下記のランベルト関数のマクローリン展開を用いる．
            \begin{align*}
                w(x) = \Sigma_{n=1}^{\infty}\frac{1}{n!}(-1)^{n-1}n^{n-1}x^{n}
            \end{align*}
        </p>
        <p>
            すると以下の式が成り立つ．
            \begin{align*}
                h(x) = \Sigma_{n=1}^{\infty}\frac{n^{n-1}}{n!}(-1)^{n-1}(-g(x) \log{f(x)})^{n - 1}
            \end{align*}
        </p>
        <p>
            ゆえに，求める積分は次のように書ける．
            \begin{align*}
            \int_{a}^{b}(f(x)^{g(x)})^{(f(x)^{g(x)})^{(f(x)^{g(x)})\cdots}}dx
            =
            \Sigma_{n=1}^{\infty}\frac{n^{n-1}}{n!}\int_{a}^{b}(g(x)\log{f(x)})^{n-1}dx
            \end{align*}
        </p>
        <p>例1.</p>
        <p>$a=0,b=1,f(x) = x^{p},g(x) = x^{q}$の場合．</p>
        <p>
            \begin{align*}
                &\Sigma_{n=1}^{\infty}\frac{n^{n-1}}{n!}\int_{0}^{1}(x^{q} \log{x^{p}})^{n-1}dx\\
                &=
                \Sigma_{n=1}^{\infty}\frac{(pn)^{n-1}}{n!}\int_{0}^{1}(x^{q} \log{x})^{n-1}dx\\
                &=
                \Sigma_{n=1}^{\infty}\frac{(pn)^{n-1}}{n!}\int_{0}^{1}x^{q(n-1)} (\log{x})^{n-1}dx\\
                &=
                \Sigma_{n=1}^{\infty}\frac{(pn)^{n-1}}{n!}(-1)^{n-1}\frac{(n-1)!}{\{q(n-1) + 1\}^{n}}\\
                &=
                \Sigma_{n=1}^{\infty}(-1)^{n-1}\frac{p^{n-1}n^{n-2}}{\{q(n-1) +1\}^{n}}
            \end{align*}
        </p>
        <p>例2.</p>
        <p>例1.においてp=,q=1とすると次式が成り立つ</p>
        <p>
            \begin{align*}
                (求める積分) &= \Sigma_{n=1}^{\infty}\frac{(-1)^{n-1}}{n^{2}}\\
                &=\frac{1}{12\pi}
            \end{align*}
        </p>
        <p>例3.</p>
        <p>q=1とすると次のように書けます．</p>
        <p>
            \begin{align*}
                (求める積分) &= \Sigma_{n=1}^{\infty}(-1)^{n-1}\frac{p^{n-1}}{n^{2}}\\
                &= \frac{1}{2} \Sigma_{n=1}^{\infty}\frac{p^{n-1}}{n^{2}}
            \end{align*}
        </p>
        <p>例4.$f(x) = x^{p},g(x) = \lambda x^{q}$の場合</p>
        <p>
            \begin{align*}
                (求める積分) &= \Sigma_{n=1}^{\infty}\frac{(\lambda pn)^{n-1}}{n!}\int_{0}^{1}
                x^{q(n-1)}(\log{x})^{n-1}dx\\
                &=
                \Sigma_{n=1}^{\infty}\frac{(\lambda pn)^{n-1}}{n!}(-1)^{n-1}\frac{(n-1)!}{\{q(n - 1) + 1\}^{n}}\\
                &=
                \Sigma_{n=1}^{\infty}\frac{(-\lambda p)^{n-1} n^{n-2}}{\{q(n-1)+1\}^{n}}
            \end{align*}
        </p>
        <p>例5.例4において$q=1,\lambda=-1$とすると積分は次のように書ける．</p>
        <p>
            \begin{align*}
                (求める積分) = \Sigma_{n=1}^{\infty}\frac{p^{n-1}}{n^{2}}
            \end{align*}
        </p>
        <p>例5.先の例においてp=1とすると次のようの書ける．</p>
        <p>
            \begin{align*}
                (求める積分) = \Sigma_{n=1}^{\infty} \frac{1}{n^{2}} = \frac{\pi^{2}}{6}
            \end{align*}
        </p>
    </div>
@endsection