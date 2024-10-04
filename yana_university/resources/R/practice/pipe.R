# pipeを使ってみる
library(magrittr)
library(dplyr)
cars$wether <- sample(c("sunny", "rainy"), nrow(cars), replace = TRUE)
head(cars)
names(cars)
# 晴れの日に走る車の平均速度を表示
speeds <- cars$speed[cars$wether == "sunny"]
mean(speeds)
# 同じことはpipeを使ってもできる
cars$speed[cars$wether == "sunny"] %>% mean()