
import pandas as pd
import datetime

df = pd.read_csv("./data/edu_bigdata_imp1.csv",encoding="big5",low_memory=False)

df_filtered = df[df["PseudoID"]==71]
ans =pd.to_datetime(df_filtered["dp001_review_start_time"]).dt.date.unique()

for i in ans:
    print(i.strftime('%Y-%m-%d'))