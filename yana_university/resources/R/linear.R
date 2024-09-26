# スカラー
# 変数xに4を代入する
x <- 4
# xの中身を表示する
x
# 変数を使って計算する
# 
(y <- -3.5)
x + y
# 累乗を計算する
x^10
x^100
# 複素数の計算
x <- 1 + 2i
y <- 2 + 1i
x + y
x * y
# 文字列の扱い
(y <- "foo")
z <- "bar"
# 関数paste()で文字列の結合を行える
paste(y, z)
# 空白を入れずに結合
paste(y, z, sep = "")
# 論理演算
F
TRUE
as.numeric(T)
as.numeric(F)
# ベクトル
(x <- c(0, 1, 2, 3, 4))
(y <- c("foo", "bar"))
(z <- c("foo", 1))
x[1]
x[c(1, 3, 5)]
# 0から3まで0.5刻みの系列を作る
seq(0, 3, by = 0.5)
# 0から3までの長さ5の系列を系列を作る
seq(0, 3, length = 5)
1: 10
x <- 10:1
x
x[3:8]
rep(1, 7)
rep(c("a", "b", "c"), 3)
rep(c(1, 2, 3), each = 3)

(x <- seq(0, 2, by = 0.3))
length(x)
(y <- 2:5)
# ベクトル結合
(z <- c(x, y))
# ベクトル反転
rev(z)
#行列生成
(x <- 1:8)
(A <- matrix(x, 2, 4))
(B <- matrix(x, 2, 4, byrow = TRUE))
A + B
A %*% t(B)