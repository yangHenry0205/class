
import pandas as pd
import datetime

df = pd.read_csv("./data/edu_bigdata_imp1.csv",encoding="big5",low_memory=False)

df_filtered = df["dp001_review_sn"].value_counts()

max_view_video_sn = df_filtered.idxmax()

print(int(max_view_video_sn))