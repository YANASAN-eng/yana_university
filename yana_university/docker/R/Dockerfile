# ベースとするイメージ
FROM rocker/tidyverse:3.6.3

# OS環境を日本語ロケールに切り替える
ENV LANG=ja_JP.UTF-8
ENV LC_ALL=ja_JP.UTF-8

# Update sources to point to Debian archived repositories
RUN sed -i 's|http://deb.debian.org/debian|http://archive.debian.org/debian|' /etc/apt/sources.list && \
    sed -i 's|http://security.debian.org/debian-security|http://archive.debian.org/debian-security|' /etc/apt/sources.list && \
    sed -i '/deb.*-security/s/^/#/' /etc/apt/sources.list && \
    echo 'Acquire::Check-Valid-Until "false";' > /etc/apt/apt.conf.d/99no-check-valid-until && \
    apt-get update && apt-get install -y \
    fonts-ipaexfont \
    fonts-noto-cjk

# Configure locale
RUN sed -i '$d' /etc/locale.gen && \
    echo "ja_JP.UTF-8 UTF-8" >> /etc/locale.gen && \
    locale-gen ja_JP.UTF-8 && \
    /usr/sbin/update-locale LANG=ja_JP.UTF-8 LANGUAGE="ja_JP:ja"

# Set timezone to Tokyo
RUN ln -sf /usr/share/zoneinfo/Asia/Tokyo /etc/localtime

RUN apt-get update && apt-get install libharfbuzz-dev -y

# Rパッケージをインストール
RUN R -e "install.packages('tidyverse', repos='https://cloud.r-project.org/')"