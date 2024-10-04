# 交差検証法
# ライブラリ読み込み
library(mlbench)
library(kernlab)
# データ数
n <- 200
# k-Fold Cross Validation
# k = 10
k <- 10
# データ生成
dat <- mlbench.spirals(n, cycles = 1.2, sd = 0.16)
x <- dat$x; y <- dat$classes
idx <- sample(k, n, replace = TRUE)
sigma.list <- seq(0.1, 15, by = 0.1)
cv <- c()
for (sigma in sigma.list) {
    err_estimate <- c()
    for ( j in 1:k) {
        # 交互検証法で推定に使うデータ
        tmpx <- x[idx != j, ]; tmpy <- y[idx != j]
        rbfsvm <- ksvm(tmpx, tmpy, type = "C-svc", kernel = "rbfdot", kpar = list(sigma = sigma))
        rbfpred <- predict(rbfsvm, x[idx == j,])
        err_estimate <- c(err_estimate, mean(y[idx == j] != rbfpred))
    }
    cv <- c(cv, mean(err_estimate))
}
sigma.list[which.min(cv)]
