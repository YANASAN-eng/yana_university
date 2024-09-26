library(tidyverse)
# palmerpenguinsデータ
library(palmerpenguins)
library(dplyr)
# penguinsのデータサイズ確認
dim(penguins)
# 行数確認
nrow(penguins)
# 列数
ncol(penguins)
# 変数名確認(列名)
names(penguins)
#データセットの基本情報を確認する。
#データセットを読み込んだ直後に、毎回これを実行することを推奨。
# データの先頭n行目まで取得
head(penguins)
# データセットの最後部からn行まで取得
tail(penguins, n = 3)
# 要約(基本的な記述統計情報を表示)
summary(penguins)
# Question1
# くちばしの長さ(bill_length_mm)とくちばしの厚み(bill_depth_mm)
# からペンギンの種類(species)を予測
with(penguins, table(species))
# mutate関数で列を変換
penguins_s1 <- penguins %>%
    mutate(species = case_when(
        species == "Adelie" ~ 1L,
        species == "Chinstrap" ~ 2L,
        TRUE ~ 3L,
    )) %>%
    mutate(species = factor(
        species,
        levels = 1:3,
        labels = c("アデリー", "ヒゲ", "ジェンツー"))) %>%
    dplyr::select(species, bill_length_mm, bill_depth_mm) %>%
    na.omit()
# 分類するのに使用する変数の事を特徴量(feature)、分類するクラス名を
# ラベル(label)という。
# 結果を図示する。
p1 <- ggplot(penguins_s1, 
    aes(x = bill_length_mm, y = bill_depth_mm)) + 
    geom_point(aes(color = species,
        shape = spacies)) +
    scale_color_brewer(palette = "Accent") +
    labs(x = "くちばしの長さ (mm)",
        y = "くちばしの厚み (mm)",
        color = "ペンギンの種類",
        shape = "ペンギンの種類")
plot(p1)