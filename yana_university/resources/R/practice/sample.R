# 分類例
#疑似乱数の種を生成
set.seed(1)
# データ作成
x <- c(rnorm(50, -1, 0.5), rnorm(50, 1, 0.5), rnorm(50, -1, 0.5), rnorm(50, 1, 0.5))
y <- c(rnorm(50, -1, 0.5), rnorm(50, 1, 0.5), rnorm(50, 1, 0.5), rnorm(50, -1, 0.5))
labels <- c(rep("1", 100), rep("2", 100))

# データと正解を分ける
xors <- data.frame(x=x, y=y, label=as.factor(labels))
# 座標データ取得　[, -3]で3列目を削除することを意味。
no_label_xors <- xors[, -3]
# ラベルデータ取得
label_xors <- xors[, 3]

# 以下使用するパラメータ
xlimit <- c(-3, 3)
ylimit <- c(-3, 3)

# 判別境界を知るためにグリッドデータを発生させておく
# グリッドデータの各値を判別させて色を塗って分ける
px <- seq(-3, 3, 0.01)
py <- seq(-3, 3, 0.01)
pgrid <- expand.grid(px, py)
names(pgrid) <- c("x", "y")

# points(xors$x[xors$label==1], xors$y[xors$label==1], xlim=xlimit, ylim=ylimit, col="red")
# points(xors$x[xors$label==2], xors$y[xors$label==2], xlim=xlimit, ylim=ylimit, col="red")
# points(xors$x[xors$label==1], xors$y[xors$label==2], xlim=xlimit, ylim=ylimit, col="green")
# points(xors$x[xors$label==2], xors$y[xors$label==1], xlim=xlimit, ylim=ylimit, col="green")

plot(xors$x,xors$y,type="n")
points(xors$x[xors$label==1],xors$y[xors$label==1],xlim=xlimit,ylim=ylimit,col="red")
points(xors$x[xors$label==2],xors$y[xors$label==2],xlim=xlimit,ylim=ylimit,col="green")




