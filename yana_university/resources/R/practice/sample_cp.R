set.seed(1)

#データの発生
x<-c(rnorm(50,-1,0.5),rnorm(50,1,0.5),rnorm(50,-1,0.5),rnorm(50,1,0.5))
y<-c(rnorm(50,-1,0.5),rnorm(50,1,0.5),rnorm(50,1,0.5),rnorm(50,-1,0.5))
labels<-c(rep("1",100),rep("2",100))

#データと正解を分ける
xors=data.frame(x=x,y=y,label=as.factor(labels))
no_label_xors=xors[,-3]
label_xors=xors[,3]

#以降で使用するパラメータの定義
xlimit=c(-3,3)
ylimit=c(-3,3)

#判別境界を知るためにグリッドデータを発生させておく
#グリッドデータの各値を判別させて、色を塗って分けさせる
px <- seq(-3, 3, 0.01)
py <- seq(-3, 3, 0.01)
pgrid <- expand.grid(px, py)
names(pgrid) <- c("x", "y")

plot(xors$x,xors$y,type="n")
points(xors$x[xors$label==1],xors$y[xors$label==1],xlim=xlimit,ylim=ylimit,col="red")
points(xors$x[xors$label==2],xors$y[xors$label==2],xlim=xlimit,ylim=ylimit,col="green")
#赤と緑が分別したいデータ
#ただし部分的に被っているところがあり、分別するのが難しい
