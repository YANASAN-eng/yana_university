# ベースイメージとしてPython 3.9を使用
FROM python:3.9-bullseye

# 必要なパッケージをインストール
RUN pip install numpy
RUN pip install alkana
RUN pip install alphabet2kana
RUN pip install fastapi uvicorn requests
RUN pip install requests
RUN pip install urllib3
RUN pip install httpx
RUN pip install flask_cors
RUN pip install transformers datasets torch
RUN pip install accelerate -U
RUN pip install transformers[torch]
RUN pip install tensorflow
RUN pip install nltk

# ワーキングディレクトリを設定
WORKDIR /usr/src/app

# FastAPIサーバーを起動する
CMD ["uvicorn", "sample:app", "--host", "0.0.0.0", "--port", "8900"]
